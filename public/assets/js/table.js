
$(document).ready(function(){

    // $(window).on('scroll', function() {
    //     if ($(window).scrollTop() + $(window).height() >= $(document).height() - 20) {
    //         console.log('scroll');
    //     }
    // });

    // Get the button
    $('#scrollToTopBtn').hide();

    // إظهار الزر عند التمرير 100 بيكسل لأسفل
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#scrollToTopBtn').fadeIn();
        } else {
            $('#scrollToTopBtn').fadeOut();
        }
    });

    // عند النقر على الزر، التمرير بسلاسة لأعلى الصفحة
    $('#scrollToTopBtn').click(function() {
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });

    
    $('.dropdown-toggles').click(function(event){
        event.stopPropagation(); // Prevents the click event from bubbling up
        var $dropdownMenu = $(this).next('.dropdown-menu-invoice');
        
        $('.dropdown-menu-invoice').not($dropdownMenu).hide();
        
        $dropdownMenu.toggle();
    });

    $('.dropdown.nav-itemd-none.d-md-flex').click(function(event){
        event.stopPropagation();
        $('.flags-select-div').toggleClass('toggle');  
    });

    $(document).click(function() {
        $('.dropdown-menu-invoice').hide();    
        $('.flags-select-div').addClass('toggle');  
    });  
    
    
});