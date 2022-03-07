$(function () {
    $('#slider').owlCarousel({
       
       
        margin: 50,
        
        rtl: true,
        nav: true,
        autoWidth:true,
    });
    // slider nav buttons 
    $('#slider span[aria-label="Previous"]').html('<i class="fas fa-arrow-alt-circle-right"></i>');
    $('#slider span[aria-label="Next"]').html('<i class="fas fa-arrow-alt-circle-left"></i>');


    $('#slider2').owlCarousel({
       
       
        margin: 50,
        
        rtl: true,
        nav: true,
        autoWidth:true,
    });
    // slider2 nav buttons 
    $('#slider2 span[aria-label="Previous"]').html('<i class="icofont-thin-left"></i>');
    $('#slider2 span[aria-label="Next"]').html('<i class="icofont-thin-right"></i>');


    $('#slider3').owlCarousel({
        margin: 50,
        rtl: true,
        nav: true,
        autoWidth:true,
    });
    // slider3 nav buttons 
    $('#slider3 span[aria-label="Previous"]').html('<i class="fas s_Ar fa-chevron-right"></i>');
    $('#slider3 span[aria-label="Next"]').html('<i class="fas s_Ar fa-chevron-left"></i>');

    $(document).on('keyup','.number-active > input', function() {
        if($(this).length > 0) {
           $(this).addClass('active');
           $(this).prev().focus()

        } else {
           $(this).removeClass('active')

        }
    })

});