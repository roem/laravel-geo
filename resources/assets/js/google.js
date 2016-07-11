/**
 * Dropdown module.
 * @module foundation.dropdown
 * @requires foundation.util.keyboard
 * @requires foundation.util.box
 * @requires foundation.util.triggers
 */
!function ($, LaravelGeo) {
    'use strict';
    /**
     * Creates a new instance of a dropdown.
     * @class
     * @param {jQuery} element - jQuery object to make into a dropdown.
     *        Object should be of the dropdown panel, rather than its anchor.
     * @param {Object} options - Overrides to the default plugin settings.
     */
    function Google(element, options) {
        this._init();

        LaravelGeo.registerPlugin(this, 'google');
    }

    Google.defaults = {
        /**
         * Amount of time to delay opening a submenu on hover event.
         * @option
         * @example 250
         */
        hoverDelay: 250,
        /**
         * Allow submenus to open on hover events
         * @option
         * @example false
         */
        hover: false,
        /**
         * Don't close dropdown when hovering over dropdown pane
         * @option
         * @example true
         */
        hoverPane: false,
        /**
         * Number of pixels between the dropdown pane and the triggering element on open.
         * @option
         * @example 1
         */
        vOffset: 1,
        /**
         * Number of pixels between the dropdown pane and the triggering element on open.
         * @option
         * @example 1
         */
        hOffset: 1,
        /**
         * Class applied to adjust open position. JS will test and fill this in.
         * @option
         * @example 'top'
         */
        positionClass: '',
        /**
         * Allow the plugin to trap focus to the dropdown pane if opened with keyboard commands.
         * @option
         * @example false
         */
        trapFocus: false,
        /**
         * Allow the plugin to set focus to the first focusable element within the pane, regardless of method of opening.
         * @option
         * @example true
         */
        autoFocus: false,
        /**
         * Allows a click on the body to close the dropdown.
         * @option
         * @example false
         */
        closeOnClick: false
    };
    /**
     * Initializes the plugin by setting/checking options and attributes, adding helper variables, and saving the anchor.
     * @function
     * @private
     */
    Google.prototype._init = function () {
        var $id = this.$element.attr('id');

        console.log('Google');
    };

    LaravelGeo.plugin(Google, 'google');
}(jQuery, window.Foundation);
