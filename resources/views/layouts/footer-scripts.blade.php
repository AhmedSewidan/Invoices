@stack('scripts')
{{-- Ask For permitions to send notifications --}}
<script>
    if (Notification.permission === 'granted') {
        console.log('Permission granted for push notifications.');
    } else {
        Notification.requestPermission().then(function(permission) {
            if (permission === 'granted') {
                console.log('User granted permission for push notifications.');
            } else {
                console.log('User denied permission for push notifications.');
            }
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/swl.js') }}"></script>

@livewireScripts
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/ionicons/ionicons.js') }}"></script>
<!-- Moment js -->
<script src="{{ URL::asset('assets/plugins/moment/moment.js') }}"></script>

<!-- Rating js-->
<script src="{{ URL::asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/rating/jquery.barrating.js') }}"></script>

<!--Internal  Perfect-scrollbar js -->
{{-- <script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script> --}}
<!--Internal Sparkline js -->
<script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{ URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- right-sidebar js -->
<script src="{{ URL::asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>
<!-- Eva-icons js -->
<script src="{{ URL::asset('assets/js/eva-icons.min.js') }}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{ URL::asset('assets/js/sticky.js') }}"></script>
<!-- custom js -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script><!-- Left-menu js-->
<script src="{{ URL::asset('assets/plugins/side-menu/sidemenu.js') }}"></script>
<script src="{{ URL::asset('assets/js/table.js') }}"></script>

<script src="{{ URL::asset('assets/js/ajax.js') }}"></script>

{{-- alerts --}}
<script src="{{ URL::asset('assets/js/my-JS.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (app()->getLocale() == 'ar')
    <script src="{{ URL::asset('assets/plugins/sidebar/sidebar-rtl.js') }}"></script>
    <script src="{{ URL::asset('assets/js/ar-jquery.js') }}"></script>
@elseif (app()->getLocale() == 'en')
    <script src="{{ URL::asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ URL::asset('assets/js/en-jquery.js') }}"></script>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        $('#delete-user').on('click', function() {

            Swal.fire({
                title: "@lang('Are you sure?')",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });

            console.log('clicked on delete');
        });

    });
</script>


{{-- Regester notification --}}
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js')
            .then(function(registration) {
                console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch(function(error) {
                console.log('Service Worker registration failed:', error);
            });
    }
</script>


{{-- Pusher channel --}}
<script>
    // Echo.private(`private-new-comment.${userId}`)
    // .listen('.comment.sent', (e) => {
    //     console.log('رسالة جديدة:', e.message);
    //     alert(JSON.stringify(e));
    // });
</script>

<script>
    var authUser = @json(auth()->user());
    var spanNotificationCount = $('.notification-count');
    var pNotificationCount = $('.p-notification-count');
    var existingNotifications = $('.dropdown-notifications');
    var notificationCount = parseInt(spanNotificationCount.text()) || 0;
    var notificationSound = new Audio('assets/sounds/notification-1.mp3');

    var channel = pusher.subscribe('new-comment');

    function setNotificationCount(notificationCount) {
        spanNotificationCount.text(notificationCount);
        pNotificationCount.text(notificationCount);
    }

    function sendNotification(data) {
        Notification.requestPermission();

        var commentSent = data.username + " ارسل تعليق جديد ";
        if (Notification.permission === 'granted') {
            const notificationData = {
                title: "تعليق جديد",
                body: commentSent,
                icon: '{{ asset('assets/img/brand/favicon.png') }}',
                badge: '{{ asset('assets/img/brand/favicon.png') }}'
            };
            navigator.serviceWorker.ready.then(function(registration) {
                registration.showNotification(notificationData.title, notificationData);
            });
        }
        toastr.info(commentSent);
        notificationSound.play().catch(error => {
            console.error('Error playing notification sound:', error);
        });
    }

    function notificationContent(data) {
        if (!spanNotificationCount.hasClass('pulse')) {
            spanNotificationCount.addClass('pulse');
        }
        if ($('#empty-notification').length) {
            $('#empty-notification').remove();
        }

        var newNotifications = $(`
                    <a class="d-flex p-3 border-bottom notification-link" href="#" data-post-id="${data.post_id}">
                        <div class="notifyimg bg-pink cyrcle-nice">
                            <i class="la la-file-alt text-white"></i>
                        </div>
                        <div class="mr-3">
                            <h5 class="notification-label mb-1">
                                ${data.username} Commented on your post
                            </h5>
                            <div class="notification-subtext">${data.comment}</div>
                        </div>
                        <div class="mr-auto">
                            <i class="las la-angle-left text-left text-muted"></i>
                        </div>
                    </a>`);

        newNotifications.addClass('highlight-new-notification');
        existingNotifications.prepend(newNotifications);

        // setTimeout(function() {
        //     newNotifications.removeClass('highlight-new-notification');
        // }, 3000);

        return newNotifications;
    }

    $(document).ready(function() {
        channel.bind('comment.sent', function(data) {
            commentData = data.commentData;
            if (authUser && authUser.id == data.userId) {
                setNotificationCount(notificationCount + 1);
                var content = notificationContent(data.commentData);
                sendNotification(data.commentData);
            }
        });
    });
</script>


{{-- Polling to update notifications --}}
<script>
    // setInterval(function() {
    //     $.ajax({
    //         url: '/check-new-comments',
    //         method: 'GET',
    //         success: function(data) {
    //             if (data) {
    //                 existingNotifications.empty();
    //                 setNotificationCount(data.commentsCount);
    //                 data.commentData.forEach(element => {
    //                     var content = notificationContent(element.data);

    //                 });
    //                 console.log("________Updated________");
    //             }
    //         }
    //     });

    // }, 50000);
</script>

{{-- Listen to show-message  --}}
<script>
    window.addEventListener('show-message', (data) => {
        const message = data.detail.message;
        const type = data.detail.type;
        toastr[type](message);
    });
</script>
