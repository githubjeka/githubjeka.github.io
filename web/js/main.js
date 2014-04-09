$(document).ready(function () {

    var sync1 = $("#owl-one");
    var sync2 = $("#owl-row");
    var sync3 = $("#owl-simple");

    sync1.owlCarousel({
        singleItem: true,
        slideSpeed: 1000,
        lazyLoad: true,
        navigation: true,
        pagination: false,
        afterAction: syncPosition,
        responsiveRefreshRate: 200,
        navigationText: ['<span class="fa fa-arrow-circle-o-left fa-2x"></span>', '<span class="fa fa-arrow-circle-o-right fa-2x"></span>']
    });

    sync2.owlCarousel({
        lazyLoad: true,
        items : 8,
        itemsDesktop: [1200, 7],
        itemsDesktopSmall: [979,5],
        itemsTablet: [768, 4],
        itemsMobile: false,
        pagination: false,
        responsiveRefreshRate: 100,
        afterInit: function (el) {
            el.find(".owl-item").eq(0).addClass("synced");
        }
    });

    sync3.owlCarousel({
        items: 7,
        lazyLoad: true,
        itemsDesktop: [1199, 10],
        itemsDesktopSmall: [979, 10],
        itemsTablet: [768, 8],
        itemsMobile: [479, 4]
    });

    function syncPosition(el) {
        var current = this.currentItem;
        sync2
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced")
        if (sync2.data("owlCarousel") !== undefined) {
            center(current)
        }
    }

    sync2.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo", number);
    });

    function center(number) {
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for (var i in sync2visible) {
            if (num === sync2visible[i]) {
                var found = true;
            }
        }

        if (found === false) {
            if (num > sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", num - sync2visible.length + 2)
            } else {
                if (num - 1 === -1) {
                    num = 0;
                }
                sync2.trigger("owl.goTo", num);
            }
        } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", sync2visible[1])
        } else if (num === sync2visible[0]) {
            sync2.trigger("owl.goTo", num - 1)
        }

    }

});