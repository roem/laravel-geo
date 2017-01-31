+function ($) {
    'use strict';

    // CLASS DEFINITION
    // ======================

    var LaravelGeoRegistry = {
        _adapters: {},

        registerAdapter: function (name, adapter) {
            this._adapters[name] = adapter;
        },
        unregisterAdapter: function (name) {
            this._adapters[name] = null;
        }
    }

    var LaravelGeo = function (element, options) {
        this.options = $.extend({}, LaravelGeo.Defaults, options)

        this.mapobject = null
        this.$element = $(element)

        this.init()
    }

    LaravelGeo.Version = '0.0.1'

    LaravelGeo.Defaults = {
        adapter: null,
        wrapperClass: 'laravelGeo',
        mapApi: '/maps/',
        map: null,
        marker: null
    }

    /**
     * Initializes the media.
     * @protected
     */
    LaravelGeo.prototype.init = function () {
        if (typeof this.$element.attr('id') === 'undefined') {
            this.$element.attr('id', 'laravelGeo__Map--' + this.options.map)
        }

        var id = this.$element.attr('id')
        var adapterClass = $.fn.laravelGeo.registry._adapters[this.options.adapter]

        if (this.options.map != null) {
            $.get(this.options.mapApi + 'map/' + this.options.map, function (data) {
                adapterClass(id, data);
            });
        } else {
            $.get(this.options.mapApi + 'marker/' + this.options.marker, function (data) {
                adapterClass(id, data);
            });
        }

        return this;
    }

    LaravelGeo.prototype.getMap = function () {
        return this.mapobject;
    }

    LaravelGeo.prototype.reset = function () {
        this.destroy()
        this.init()
    }

    LaravelGeo.prototype.destroy = function () {
        this.$element.removeData('laravelGeo')
        this.$element.html('')
    }

    // GLIDE PLUGIN DEFINITION
    // =======================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('laravelGeo')
            var options = $.extend({}, LaravelGeo.Defaults, $this.data(), typeof option == 'object' && option)

            if (!data && /getMap|reset|destroy/.test(option)) return
            if (!data) $this.data('laravelGeo', (data = new LaravelGeo(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }

    $.fn.laravelGeo = Plugin
    $.fn.laravelGeo.Constructor = LaravelGeo
    $.fn.laravelGeo.registry = LaravelGeoRegistry

    $(document).ready(function () {
        $('.' + LaravelGeo.Defaults.wrapperClass + '[data-toggle="autoload"]').each(function () {
            var $element = $(this)
            var data = $element.data()

            Plugin.call($element, data)
        })
    })

}(jQuery);
