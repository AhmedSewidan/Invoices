<!-- Title -->
<title> Invoices </title>
<!-- Favicon -->
<link rel="icon" href="{{ URL::asset('assets/img/brand/favicon.png') }}" type="image/x-icon" />
<!-- Icons css -->
<link href="{{ URL::asset('assets/css/icons.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/my-css.css') }}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{ URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
<!--  Sidebar css -->
<link href="{{ URL::asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{ URL::asset('assets/css-rtl/sidemenu.css') }}">
@yield('css')
<!--- Style css -->
<link href="{{ URL::asset('assets/css-rtl/style.css') }}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{ URL::asset('assets/css-rtl/style-dark.css') }}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{ URL::asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet">
<!---Google Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Reem+Kufi:wght@400;700&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
@yield('styles')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('a91009bb8cd5e3a74e33', {
        cluster: 'eu'
    });
</script>
<script src="{{ asset('assets/js/pusherNotifications.js') }}"></script>



@if (app()->getLocale() == 'en')
    <link href="{{ URL::asset('assets/css-ltr/animate.css') }}" rel="stylesheet">
@elseif (app()->getLocale() == 'ar')
    <link href="{{ URL::asset('assets/css-rtl/animate.css') }}" rel="stylesheet">
@endif


<link href="{{ URL::asset('assets/css/my-css.css') }}" rel="stylesheet">

@livewireStyles


<style>
    .spinner {
        position: absolute;
    }

    .spinner-border {
        position: relative;
        top: 8px;
        right: 11px;
        width: 25px;
        height: 25px;
        color: black
    }

    .alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        opacity: .85;
        transition: opacity 0.3s ease-in-out;
        animation: fadeOut 3s forwards;
        animation-delay: 3s;
    }

    .alert-success {
        background-color: #28a745;
        color: white;
    }

    .alert-danger {
        background-color: #dc3545;
        color: white;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    /* تأثير الإضاءة على الرابط */
    .notification-link.highlight-new-notification {
        animation: highlight-animation 1s ease-in-out;
    }

    /* تعريف الأنيميشن */
    @keyframes highlight-animation {
        0% {
            background-color: #ecf0fa;
            transform: scale(1);
        }

        50% {
            background-color: #c6cad6;
            transform: scale(1.05);
        }

        100% {
            background-color: #ecf0fa;
            transform: scale(1);
        }
    }
    .cyrcle-nice{
        height: 40px;
        width: 40px;
        text-align: center;
        border-radius: 50%;
        line-height: 40px;
        font-size: 18px;
    }
</style>
