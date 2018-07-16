$(document).ready( function () {
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var slides = $(".mySlides");
        var dots = $(".dot");
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;

        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        for (var i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 1000);
    }

    $('#logout' ).click(function( event ) {
        event.preventDefault();
        $('#logout-form').submit();
    });
});
