<?php

namespace Renatomefi\FormBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Class Form
 * @package Renatomefi\FormBundle\Document
 * @ODM\Document
 */
class FormField extends ProtocolEmbed
{
    /**
     * @ODM\String
     */
    protected $name;

    /**
     * @ODM\Hash
     */
    protected $options;

    /**
     * @ODM\String
     */
    protected $freeTextOption;

    /**
     * @ODM\EmbedMany(targetDocument="FormFieldDepends")
     */
    protected $dependsOn;

    public function __construct()
    {
        parent::__construct();
        $this->dependsOn = new ArrayCollection();
        $this->options = [];
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set options
     *
     * @param Array $options
     * @return self
     */
    public function setOptions(Array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Get options
     *
     * @return Array $options
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set Free text option
     * Reference to $this->options key, numeric or string
     *
     * @param string $option
     * @return self
     * @throws DocumentNotFoundException
     */
    public function setFreeTextOption($option)
    {
        if (!$this->options[$option]) {
            throw new DocumentNotFoundException('No reference for options found with: ' . $option);
        }
        $this->freeTextOption = $option;
        return $this;
    }

    /**
     * Get Free text option
     *
     * @return string $option
     */
    public function getFreeTextOption()
    {
        return $this->freeTextOption;
    }
    

    /**
     * Add dependsOn
     *
     * @param \Renatomefi\FormBundle\Document\FormFieldDepends $dependsOn
     */
    public function addDependsOn(FormFieldDepends $dependsOn)
    {
        $this->dependsOn[] = $dependsOn;
    }

    /**
     * Remove dependsOn
     *
     * @param \Renatomefi\FormBundle\Document\FormFieldDepends $dependsOn
     */
    public function removeDependsOn(FormFieldDepends $dependsOn)
    {
        $this->dependsOn->removeElement($dependsOn);
    }

    /**
     * Get dependsOn
     *
     * @return \Doctrine\Common\Collections\Collection $dependsOn
     */
    public function getDependsOn()
    {
        return $this->dependsOn;
    }
}