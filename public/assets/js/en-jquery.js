
$(document).ready(function () {

    const $sidebar = $('.app-sidebar.sidebar-scroll');

    const $header = $('.main-header');
    const $containerFluid = $('.main-content .container-fluid');
    const $toggleButton = $('.app-sidebar__toggle'); // Adjust this selector to match the button that toggles the sidebar

    $toggleButton.on('click', function () {

        $toggleButton.toggleClass('toggleButton');
        $header.toggleClass('behind-sidebar');
        $containerFluid.toggleClass('goLeft-sidebar');

    });

    
    // const $notificationsButton = $('.dropdown.main-header-message.right-toggle');
    // const $notifications       = $('.sidebar.sidebar-left.sidebar-animate');
    
    // $notificationsButton.on('click', function () {

    //     // $sidebar.css('background', 'red');

    // });



});