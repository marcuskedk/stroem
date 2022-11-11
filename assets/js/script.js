
$(function() {
    $('.stroem-preloader').delay(200).fadeOut('slow');
    
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('.nav-link');
    const menuItem2 = document.querySelectorAll('.dropdown-item');
    const menuItem3 = document.querySelectorAll('.list');
    const menuItem3a = document.querySelectorAll('.list a');
    const menuLength = menuItem.length
    const menuLength2 = menuItem2.length
    const menuLength3 = menuItem3.length
    for (let i = 0; i < menuLength; i++) {
        if(menuItem[i].href === currentLocation){
            menuItem[i].classList.toggle("active");
        } else if (currentLocation.indexOf(menuItem[i].getAttribute("data-url")) > -1){
            menuItem[i].classList.toggle("active");
        }
    }
    for (let i = 0; i < menuLength2; i++) {
        if(menuItem2[i].href === currentLocation){
            menuItem2[i].classList.toggle("active");
        }
    }
    for (let i = 0; i < menuLength3; i++) {
        if(menuItem3a[i].href === currentLocation){
            menuItem3[i].classList.toggle("active");
        }
    }

    $("#loginForm").submit(function( event ) {
        alert( "Handler for .submit() called." );
        event.preventDefault();
    });

    $("#bookForm").submit(function( event ) {
        alert( "Handler for .submit() called." );
        event.preventDefault();
    });
});

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
        loop: true,
        "mouseDrag": true,
        "autoplay": true,
        "arrowKeys": false,
        "swipeAngle": false,
        "navAsThumbnails": false,
        "autoplayTimeout": 5000,
        "autoplayDirection": "forward",
        responsive: {
            992: {
                items: 3
            },
            575: {
                items: 2
            },
            0: {
                items: 1
            }
        }
    })
};