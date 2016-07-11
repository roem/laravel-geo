!function ($) {
    "use strict";

    var LARAVELGEO_VERSION = '0.0.1';

// Global Foundation object
// This is attached to the window, or used as a module for AMD/Browserify
    var LaravelGeo = {
        version: LARAVELGEO_VERSION,

        /**
         * Stores initialized plugins.
         */
        _plugins: {},

        /**
         * Stores generated unique ids for plugin instances
         */
        _uuids: [],

        /**
         * Defines a Foundation plugin, adding it to the `Foundation` namespace and the list of plugins to initialize when reflowing.
         * @param {Object} plugin - The constructor of the plugin.
         */
        plugin: function(plugin, name) {
            // Object key to use when adding to global Foundation object
            // Examples: Foundation.Reveal, Foundation.OffCanvas
            var className = (name || functionName(plugin));
            // Object key to use when storing the plugin, also used to create the identifying data attribute for the plugin
            // Examples: data-reveal, data-off-canvas
            var attrName  = hyphenate(className);

            // Add to the Foundation object and the plugins list (for reflowing)
            this._plugins[attrName] = this[className] = plugin;
        },

        registerPlugin: function (plugin, name) {
            var pluginName = name ? hyphenate(name) : functionName(plugin.constructor).toLowerCase();
            plugin.uuid = this.GetYoDigits(6, pluginName);

            if(!plugin.$element.attr('data-' + pluginName)){ plugin.$element.attr('data-' + pluginName, plugin.uuid); }
            if(!plugin.$element.data('lgPlugin')){ plugin.$element.data('lgPlugin', plugin); }
            /**
             * Fires when the plugin has initialized.
             * @event Plugin#init
             */
            plugin.$element.trigger('init.lg.' + pluginName);

            this._uuids.push(plugin.uuid);

            return;
        },
        unregisterPlugin: function(plugin){
            var pluginName = hyphenate(functionName(plugin.$element.data('lgPlugin').constructor));

            this._uuids.splice(this._uuids.indexOf(plugin.uuid), 1);
            plugin.$element.removeAttr('data-' + pluginName).removeData('lgPlugin')
            /**
             * Fires when the plugin has been destroyed.
             * @event Plugin#destroyed
             */
                .trigger('destroyed.lg.' + pluginName);
            for(var prop in plugin){
                plugin[prop] = null;//clean up script to prep for garbage collection.
            }
            return;
        },
        GetYoDigits: function(length, namespace){
            length = length || 6;
            return Math.round((Math.pow(36, length + 1) - Math.random() * Math.pow(36, length))).toString(36).slice(1) + (namespace ? '-' + namespace : '');
        }
    };

    var laravelgeo = function (element, options) {
        this.options = $.extend({}, LaravelGeo.Defaults, options)

        console.log('Geo');
    }

    window.LaravelGeo = LaravelGeo;
    $.fn.laravelgeo = laravelgeo;

    function functionName(fn) {
        if (Function.prototype.name === undefined) {
            var funcNameRegex = /function\s([^(]{1,})\(/;
            var results = (funcNameRegex).exec((fn).toString());
            return (results && results.length > 1) ? results[1].trim() : "";
        }
        else if (fn.prototype === undefined) {
            return fn.constructor.name;
        }
        else {
            return fn.prototype.constructor.name;
        }
    }
    
    function hyphenate(str) {
        return str.replace(/([a-z])([A-Z])/g, '$1-$2').toLowerCase();
    }

}(jQuery);
