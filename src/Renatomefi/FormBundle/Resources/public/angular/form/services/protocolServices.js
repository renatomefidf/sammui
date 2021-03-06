'use strict';

angular.module('sammui.protocolServices', ['ngResource'])
    .service('protocolData', ['$filter', 'localStorageService', 'formProtocolManage', 'formPagesTemplate', 'formActionsTemplates',
        function ($filter, localStorageService, formProtocolManage, formPagesTemplate, formActionsTemplates) {
            var originalData = {};
            var currentData = {};

            var controllerScope;

            var storagePrefix = 'protocol.';

            var updateStorage = function (protocolId, changes) {
                localStorageService.set(storagePrefix + protocolId, currentData[protocolId]);
                console.debug('Local storage for "' + protocolId + '" has been updated with changes', changes);
            };

            var prepareFieldValuesHashMap = function (fieldValues) {
                var tempObj = {};

                for (var i = 0; i < fieldValues.length; i++) {
                    tempObj[fieldValues[i].field.id] = i;
                }

                return tempObj;
            };

            var prepareFieldsHashMap = function (fields) {
                var tempObj = {};

                for (var i = 0; i < fields.length; i++) {
                    if (tempObj[fields[i].name]) {
                        console.warn('Form fields with name conflict: ' + fields[i].name + ' replacing it under ' + i);
                    }
                    tempObj[fields[i].name] = i;
                }

                return tempObj;
            };

            var publicFunctions = {};

            publicFunctions.setScope = function (scope) {
                controllerScope = scope;
            };

            publicFunctions.getData = function (protocolId) {

                if (!currentData[protocolId]) {

                    currentData[protocolId] = formProtocolManage.get({protocolId: protocolId});

                    currentData[protocolId].$promise.then(function (data) {
                        data.field_values_hashmap_field = prepareFieldValuesHashMap(data.field_values);
                        data.form.fields_hashmap_name = prepareFieldsHashMap(data.form.fields);
                        data.form.groups = {};
                        $filter('unique')(data.form.pages, 'group').map(function (page) {
                            data.form.groups[page.group] = $filter('translate')('form-' + data.form.name + '-group-' + page.group);
                        });

                        originalData[protocolId] = angular.copy(data);

                        formPagesTemplate.preload(data.form);
                        formActionsTemplates.preload();

                        localStorageService.set(storagePrefix + protocolId, currentData[protocolId]);

                        Object.observe(currentData[protocolId], function (changes) {
                            if (changes[0].name === 'field_values') {
                                data.field_values_hashmap_field = prepareFieldValuesHashMap(data.field_values);

                                if (controllerScope) {
                                    controllerScope.$broadcast('event:protocol-field_values-updated');
                                }
                            }
                            updateStorage(protocolId, changes);
                        });

                        currentData[protocolId].form.fields.map(function (item) {
                            //initializing value for all fields
                            item.value = null;
                            Object.observe(item, function (changes) {
                                updateStorage(protocolId, changes);
                            });
                        });
                    });
                }

                return currentData[protocolId];
            };

            publicFunctions.getOriginalData = function (protocolId) {
                if (!currentData[protocolId]) {
                    this.getData(protocolId);
                }

                return originalData[protocolId];
            };

            publicFunctions.reloadOriginalData = function (protocolId) {
                originalData[protocolId] = formProtocolManage.get({protocolId: protocolId});
            };

            publicFunctions.replaceDataByOriginal = function (protocolId, reload) {
                reload = reload || false;

                if (reload === true) {
                    this.reloadOriginalData(protocolId);
                }

                currentData[protocolId] = angular.copy(originalData[protocolId]);
            };

            return publicFunctions;
        }])
    .factory('formProtocolManage', function ($resource) {
        return $resource('/form/protocol/:protocolId', {protocolId: '@protocolId'}, {
            'get': {
                cache: false
            }
        });
    })
    .factory('formProtocolUser', function ($resource) {
        return $resource('/form/protocol/:action/:protocolId/users/:userName',
            {
                action: '@action',
                protocolId: '@protocolId',
                userName: '@userName'
            }, {
                'add': {
                    method: 'PATCH',
                    params: {action: 'adds'}
                },
                'remove': {
                    method: 'PATCH',
                    params: {action: 'removes'}
                }
            });
    })
    .factory('formProtocolLock', function ($resource) {
        return $resource('/form/protocol/publishes/:protocolId/locks/:lock',
            {
                protocolId: '@protocolId'
            }, {
                'lock': {
                    method: 'PATCH',
                    params: {lock: true}
                },
                'unlock': {
                    method: 'PATCH',
                    params: {lock: false}
                }
            }
        );
    })
    .factory('formProtocolComment', function ($resource) {
        return $resource('/form/protocol/:action/:protocolId/:var/:commentId',
            {
                action: '@action',
                protocolId: '@protocolId',
                commentId: '@commentId',
                var: '@var'
            }, {
                'add': {
                    method: 'PATCH',
                    isArray: true,
                    params: {action: 'adds', var: 'comment'}
                },
                'remove': {
                    method: 'PATCH',
                    isArray: true,
                    params: {action: 'removes', var: 'comments'}
                }
            });
    })
    .factory('formProtocolConclusion', function ($resource) {
        return $resource('/form/protocol/conclusions/:protocolId',
            {
                protocolId: '@protocolId'
            }, {
                'save': {
                    method: 'PATCH'
                }
            });
    })
    .factory('formProtocolFields', function ($resource) {
        return $resource('/form/protocol/fields/:protocolId/save',
            {
                protocolId: '@protocolId'
            }, {
                'save': {
                    method: 'PATCH'
                }
            });
    })
    .factory('formProtocol', function ($resource) {
        return $resource('/form/protocol/:formId', {formId: '@formId'}, {
            'generate': {
                method: 'POST'
            }
        });
    })
    .factory('formProtocols', function ($resource) {
        return $resource('/form/protocol/forms/:formId', {formId: '@id'}, {
            'query': {
                method: 'GET',
                isArray: false
            }
        });
    });