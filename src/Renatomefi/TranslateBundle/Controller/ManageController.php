<?php

namespace Renatomefi\TranslateBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Renatomefi\TranslateBundle\Document\Language;
use Renatomefi\TranslateBundle\Document\Translation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Class ManageController
 * @package Renatomefi\TranslateBundle\Controller
 */
class ManageController extends FOSRestController
{

    /**
     * Find and retrieve a language from Language repository
     *
     * @param $lang
     * @param bool $notFoundException Throw an exception if language is not found
     */
    public function getLang($lang = null, $notFoundException = false)
    {
        $languageDM = $this->get('doctrine_mongodb')->getRepository('TranslateBundle:Language');

        if (null == $lang) {
            $language = $languageDM->findAll();
            $exception = 'No Languages found';
        } else {
            $language = $languageDM->findOneByKey($lang);
            $exception = 'Language not found: ' . $lang;
        }

        if (TRUE === $notFoundException && $language === null) {
            throw $this->createNotFoundException($exception);
        }

        return $language;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getLangsInfoAction()
    {
        $languageDM = $this->get('doctrine_mongodb')->getRepository('TranslateBundle:Language');

        $result = $languageDM->createQueryBuilder()
            ->hydrate(false)
            ->sort('key', 'asc')
            ->getQuery()
            ->execute()
            ->toArray();

        $view = $this->view($result);
        return $this->handleView($view);
    }

    /**
     * @param $lang
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postLangAction($lang)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();

        $language = new Language();
        $language->setKey($lang);
        $language->setLastUpdate(new \MongoDate());
        $dm->persist($language);

        try {
            $dm->flush();
        } catch (\Exception $e) {
            if ($e instanceof \MongoCursorException)
                throw new ConflictHttpException('Duplicate entry for lang: ' . $lang, $e);
        }

        $view = $this->view($language);

        return $this->handleView($view);
    }

    /**
     * @param Request $request
     * @param $lang
     * @param $key
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postLangKeyAction(Request $request, $lang, $key)
    {
        $language = $this->getLang($lang, true);

        $documentManager = $this->get('doctrine_mongodb')->getManager();

        $translation = new Translation();
        $translation->setLanguage($language);
        $translation->setKey($key);
        $translation->setValue($request->get('value'));

        $documentManager->persist($translation);

        try {
            $documentManager->flush();
        } catch (\Exception $e) {
            if ($e instanceof \MongoCursorException)
                throw new ConflictHttpException('Duplicate entry for lang: ' . $lang . ' with key: ' . $key, $e);
        }

        $language->setLastUpdate(new \MongoDate());
        $documentManager->getRepository('TranslateBundle:Language');
        $documentManager->flush($language);

        $view = $this->view($translation);

        return $this->handleView($view);
    }

    /**
     * @param Request $request
     * @param $lang
     * @param $key
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function putLangKeyAction(Request $request, $lang, $key)
    {
        $language = $this->getLang($lang, true);

        $translationRepo = $this->get('doctrine_mongodb')->getRepository('TranslateBundle:Translation');

        $result = $translationRepo->createQueryBuilder()
            ->update()
            ->field('value')->set($request->get('value'))
            ->field('language')->references($language)
            ->field('key')->equals($key)
            ->getQuery()
            ->execute();

        if (FALSE === $result['updatedExisting']) {
            throw $this->createNotFoundException("No key \"$key\" found for lang \"$lang\"");
        }

        // I don't know if it's safe to call another action liked this in SF2
        // Any suggestions to reuse the code?
        return $this->getLangKeyAction($lang, $key);

    }

    /**
     * @param $lang
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getLangKeysAction($lang)
    {
        $language = $this->getLang($lang, true);

        $translations = $language->getTranslations();

        $view = $this->view($translations);

        return $this->handleView($view);
    }

    /**
     * @param $lang
     * @param $key
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getLangKeyAction($lang, $key)
    {
        $language = $this->getLang($lang, true);

        $translationRepo = $this->get('doctrine_mongodb')->getRepository('TranslateBundle:Translation');

        $result = $translationRepo->createQueryBuilder()
            ->field('language')->references($language)
            ->field('key')->equals($key)
            ->hydrate(true)
            ->getQuery()
            ->getSingleResult();

        if (!$result) {
            throw $this->createNotFoundException("No key \"$key\" found for lang \"$lang\"");
        }

        $view = $this->view($result);

        return $this->handleView($view);
    }

    /**
     * @param $lang
     * @param $key
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteLangKeyAction($lang, $key)
    {
        $language = $this->getLang($lang, true);

        $dm = $this->get('doctrine_mongodb');
        $translationRepo = $dm->getRepository('TranslateBundle:Translation');

        $ts = $translationRepo->createQueryBuilder()
            ->remove()
            ->field('language')->references($language)
            ->field('key')->equals($key)
            ->getQuery()
            ->execute();

        $view = $this->view($ts);

        return $this->handleView($view);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getLangsAction()
    {
        $view = $this->view($this->getLang(null, true));

        return $this->handleView($view);
    }

    /**
     * @param $lang
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getLangAction($lang)
    {
        $view = $this->view($this->getLang($lang, true));

        return $this->handleView($view);
    }

    /**
     * @param $lang
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteLangAction($lang)
    {
        $lang = $this->getLang($lang, true);

        $langRepo = $this->get('doctrine_mongodb')->getRepository('TranslateBundle:Language');

        $delete = $langRepo->createQueryBuilder()
            ->remove()
            ->field('key')->equals($lang->getKey())
            ->getQuery()
            ->execute();

        $view = $this->view($delete);

        return $this->handleView($view);
    }
}
