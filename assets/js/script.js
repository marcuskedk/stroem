(function () {
    $('.stroem-preloader').delay(200).fadeOut('slow');
}());

if (document.querySelector(".navbar-first")) {
    document.addEventListener("DOMContentLoaded", function(){
        window.addEventListener('scroll', function() {
            if (window.scrollY > document.querySelector(".navbar-first").offsetHeight) {
                document.querySelector('.stroem-header').classList.add('header-fixed');
            } else {
                document.querySelector('.stroem-header').classList.remove('header-fixed');
            } 
        });
        window.addEventListener('scroll', function() {
            if (window.scrollY > document.querySelector(".stroem-header").offsetHeight) {
                document.querySelector('.go-to-top').classList.add('show');
            } else {
                document.querySelector('.go-to-top').classList.remove('show');
            } 
        });
    });
}

if (document.querySelector('.testimonial-slider')) {
    let gamesSlider = tns({
        container: ".testimonial-slider",
        items: 3,
        slideBy: 1,
        speed: 2500,
        // loop: true,
        "mouseDrag": true,
        // "autoplay": true,
        "arrowKeys": false,
        "swipeAngle": false,
        "navAsThumbnails": false,
        "autoplayTimeout": 3000,
        "autoplayDirection": "forward",
        // responsive: {
        //     1300: {
        //         items: 12
        //     },
        //     685: {
        //         items: 5
        //     },
        //     410: {
        //         items: 2
        //     },
        //     0: {
        //         items: 1
        //     }
        // }
    })
};