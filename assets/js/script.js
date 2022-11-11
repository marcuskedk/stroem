
$(function() {
    $('.stroem-preloader').delay(200).fadeOut('slow');
    
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('.nav-link');
    const menuItem2 = document.querySelectorAll('.dropdown-item');
    const menuItem3 = document.querySelectorAll('.list-group-stroem');
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
        if(menuItem3[i].href === currentLocation){
            menuItem3[i].classList.toggle("active");
        } else if (currentLocation.indexOf(menuItem3[i].getAttribute("data-url")) > -1){
            menuItem3[i].classList.toggle("active");
        }
    }

    $("#accountEditForm").submit(function( event ) {
        $.ajax({
            url: 'http://localhost:5333/user/admin/' + sessionStorage.getItem('userId'),
            type: 'PUT',
            contentType: 'application/x-www-form-urlencoded',
            data: {
                name: $(this).find('[name="name"]').val(),
                email: $(this).find('[name="email"]').val(),
            },
            success: function(data) {
                window.location = './admin?page=account';
            },
            error: function(err) {
                $('.error-message').html('<div class="alert alert-danger mb-0 rounded-1 py-2 px-3">' + err.responseJSON.message + '</div>');
            }
        });
        event.preventDefault();
    });

    $("#loginForm").submit(function( event ) {
        $.ajax({
            url: 'http://localhost:5333/login/login',
            type: 'POST',
            contentType: 'application/x-www-form-urlencoded',
            data: {
                email: $(this).find('[name="email"]').val(),
                password: $(this).find('[name="password"]').val(),
            },
            success: function(data) {
                sessionStorage.setItem('userId', data.users_id)
                window.location = './admin?status=loggedin&w=' + data.users_id;
            },
            error: function(err) {
                $('.error-message').html('<div class="alert alert-danger mb-0 rounded-1 py-2 px-3">Forkert email eller adgangskode!</div>');
            }
        });
        event.preventDefault();
    });

    $("#bookForm").submit(function( event ) {
        $.ajax({
            url: 'http://localhost:5333/booking',
            type: 'POST',
            contentType: 'application/x-www-form-urlencoded',
            data: {
                name: $(this).find('[name="name"]').val(),
                email: $(this).find('[name="email"]').val(),
                phone: $(this).find('[name="phone"]').val(),
            },
            success: function(data) {
                // sessionStorage.setItem("userId", data.users_id);
                // $.session.set("userId", data.users_id);
                console.log(data)
            },
            error: function(err) {
                $('.error-message').html('<div class="alert alert-danger mb-0 rounded-1 py-2 px-3">Noget er gået galt, prøv igen!</div>');
            }
        });
        // $.ajax({
        //     url: 'http://localhost:5333/login/loggedin',
        //     type: 'GET',
        //     contentType: 'application/x-www-form-urlencoded',
        //     success: function(data) {
        //         console.log(data)
        //     }
        // });
        // $.ajax({
        //     url: 'http://localhost:5333/news/comment/admin/6363a9e62632dd14e3c98d95/636ddd619a4641d412d9fa23',
        //     type: 'DELETE',
        //     // contentType: 'application/x-www-form-urlencoded',
        //     success: function(data) {
        //         console.log(data)
        //     }
        // });
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