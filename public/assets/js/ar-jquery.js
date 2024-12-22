
$(document).ready(function () {

    const $header = $('.main-header');
    const $containerFluid = $('.main-content .container-fluid');
    const $toggleButton = $('.app-sidebar__toggle'); // Adjust this selector to match the button that toggles the sidebar

    $toggleButton.on('click', function () {

        $header.toggleClass('behind-sidebar');
        $containerFluid.toggleClass('goLeft-sidebar');
    });

    const $element = $('.main-sidemenu'); // حدد العنصر الذي تريد التحقق منه

    
    $element.hover(
        function() {
            $header.toggleClass('behind-sidebar');
            $containerFluid.toggleClass('goLeft-sidebar');
        },
        function() {
            $header.toggleClass('behind-sidebar');
            $containerFluid.toggleClass('goLeft-sidebar');
        }
    );

});