'use strict'

angular.forEach({
    hover: function hoverFn(element, fnEnter, fnLeave) {
        angular.element(element).bind('mouseenter', fnEnter).bind('mouseleave', fnLeave ||fnEnter);
    }
    // We can have here more extension functions

}, function(fn, name){

    /**
     * chaining functions
     */
    var JQLite = angular.element;

    JQLite.prototype[name] = function(arg1, arg2, arg3) {
        var value;

        for(var i=0; i < this.length; i++) {
            if (angular.isUndefined(value)) {
                value = fn(this[i], arg1, arg2, arg3);
                if (angular.isUndefined(value)) {
                    // any function which returns a value needs to be wrapped
                    value = JQLite(value);
                }
            } else {
                jqLiteAddNodes(value, fn(this[i], arg1, arg2, arg3));
            }
        }

        return angular.isDefined(value) ? value : this;
    };

});

