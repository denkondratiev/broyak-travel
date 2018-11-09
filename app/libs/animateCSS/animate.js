var $window = $(window);
var $elemEven = $(".timeline-block:even");
var $elemOdd = $(".timeline-block:odd");

    function isScrolledIntoView($elemEven, $elemOdd, $window) {
        var docViewTop = $window.scrollTop();
        var docViewBottom = docViewTop + $window.height();

        var elemTopEven = $elemEven.offset().top;
        var elemTopOdd = $elemOdd.offset().top;
        var elemBottomEven = elemTopEven + $elemEven.height();
        var elemBottomOdd = elemTopOdd + $elemOdd.height();
        

        return ((elemBottomEven <= docViewBottom) && (elemTopEven >= docViewTop));
        return ((elemBottomOdd <= docViewBottom) && (elemTopOdd >= docViewTop));
    
    }


$(document).on("scroll", function () {
    if (isScrolledIntoView($elemEven, $elemOdd, $window)) {
        $elemEven.addClass("animated fadeInLeft");
        $elemOdd.addClass("animated fadeInRight");
    }

});