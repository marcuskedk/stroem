(function () {
    $('.stroem-preloader').delay(200).fadeOut('slow');
}());

if (document.querySelector(".navbar-first")) {
    document.addEventListener("DOMContentLoaded", function(){
        window.addEventListener('scroll', function() {
            if (window.scrollY > document.querySelector(".navbar-first").offsetHeight) {
                document.querySelector('.second-container').classList.add('fixed-top');
            } else {
                document.querySelector('.second-container').classList.remove('fixed-top');
            } 
        });
    }); 
}