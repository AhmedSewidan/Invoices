<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/logo.png') }}"
                        class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                        class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                        class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="{{ __('messages.search-stat') }}" type="search"> <button
                    class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>


                <div class="dropdown nav-itemd-none d-md-flex">
                    <div class='flag-countiner' id="flag-toggle-div">
                        <p class="my-auto">{{ __('messages.lang') }}</p>
                        <span class="avatar country-Flag mr-0 align-self-center bg-transparent">
                            <img src="{{ __('messages.flag') }}" alt="img">
                        </span>
                    </div>
                    <div class="flags-select-div toggle">
                        <a href="{{ route('locale', ['locale' => 'en']) }}" class="dropdown-item d-flex">
                            <span class="avatar  ml-3 align-self-center bg-transparent flag">
                                <img src="{{ asset('assets/img/flags/us_flag.jpg') }}" alt="img">
                            </span>
                            <div class="d-flex">
                                <span class="mt-2 lang">English</span>
                            </div>
                        </a>
                        <a href="{{ route('locale', ['locale' => 'ar']) }}" class="dropdown-item d-flex ">
                            <span class="avatar  ml-3 align-self-center bg-transparent flag">
                                <img src="{{ asset('assets/img/flags/egypt.jpg') }}" alt="img">
                            </span>
                            <div class="d-flex">
                                <span class="mt-2 lang">العربية</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        @php
                            $userNotification = Auth::user()->notifications()->latest()->take(3)->get();
                            $notificationCount = Auth::user()->notifications()->count();
                        @endphp
                        @if ($notificationCount)
                            <span class="pulse notification-count">{{ $notificationCount }}</span>
                        @else
                            <span class="notification-count"></span>
                        @endif
                    </a>
                    <div class="dropdown-menu" style="width: min-content">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications
                                </h6>
                                <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All
                                    Read</span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">
                                You have <span class="p-notification-count">{{ $notificationCount }}</span>
                                unread
                                Notifications</p>
                        </div>
                        <div class="main-notification-list dropdown-notifications"
                            style="max-height: 290px;height: auto;overflow-y: auto;">
                            @if ($notificationCount)
                                @foreach ($userNotification as $notification)
                                    <a class="d-flex p-3 border-bottom notification-link" href="#"
                                        data-id="{{ $notification->data['post_id'] }}">
                                        <div class="notifyimg bg-pink cyrcle-nice">
                                            <i class="la la-file-alt text-white"></i>
                                        </div>
                                        <div class="mr-3">
                                            <h5 class="notification-label mb-1">
                                                {{ $notification->data['username'] . ' Commented on your post' }}</h5>
                                            <div class="notification-subtext">{{ $notification->data['comment'] }}
                                            </div>
                                        </div>
                                        <div class="mr-auto">
                                            <i class="las la-angle-left text-left text-muted"></i>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <h4 id="empty-notification"
                                    style="background-color: #fffb01; color:white; text-align:center; padding:8px;
                                margin-bottom: 0;font-weight: bolder;">
                                    No notifications till now
                                </h4>
                            @endif
                        </div>
                        <div class="dropdown-footer" id="view-all-notifications"
                            style="cursor: pointer;height: 40px;">
                            <span id="span-view-all" style="color: #0958ff;font-weight: bolder;letter-spacing: 2px;">
                                VIEW ALL
                            </span>
                        </div>
                    </div>
                </div>
                <style>
                    .pulse {
                        display: block;
                        position: absolute;
                        top: 4px;
                        right: 5px;
                        width: 16px;
                        /* قم بتعديل الحجم */
                        height: 16px;
                        /* قم بتعديل الحجم */
                        border-radius: 50%;
                        background: #22c03c;
                        cursor: pointer;
                        box-shadow: 0 0 0 rgba(34, 192, 60, 0.9);
                        animation: pulse 2s infinite;
                        animation-duration: 2s;
                        animation-iteration-count: infinite;
                        animation-timing-function: ease-out;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 10px;
                        /* حجم الرقم داخل الدائرة */
                        color: white;
                        /* لون الرقم */
                        font-weight: bolder;
                    }

                    .pulse span {
                        display: inline-block;
                    }
                </style>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg></a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt="user"
                            src="{{ URL::asset('assets/img/users/ahmed.jpg') }}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt="user"
                                        src="{{ URL::asset('assets/img/users/ahmed.jpg') }}" class=""></div>
                                <div class="mr-3 my-auto">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <span>{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
                        <a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit Profile</a>
                        <a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
                        <a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
                        <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>

                        {{-- <form method="POST" action="{{ route('logout') }}">
							@csrf

							<x-dropdown-link :href="route('logout')"
									onclick="event.preventDefault();
												this.closest('form').submit();">
								<i class="bx bx-log-out">Sign Out</i> 
							</x-dropdown-link>
						</form> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-log-out"></i>Sign
                            Out</a>
                    </div>
                </div>
                <div class="dropdown main-header-message {{ __('messages.left-right') }}-toggle">
                    <a class="nav-link pr-0" id="notification-slider"
                        data-toggle="sidebar-{{ __('messages.left-right') }}"
                        data-target=".sidebar-{{ __('messages.left-right') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var viewAllButton = document.getElementById('view-all-notifications');
            var pInViewAllButton = document.getElementById('span-view-all');

            if (viewAllButton && pInViewAllButton) {
                viewAllButton.addEventListener('click', function() {
                    pInViewAllButton.innerHTML = `
                        <div class="spinner-border" role="status">
                            <span class="sr-only"></span>
                        </div>
                `;
                });
            }
        });
    </script>
@endpush
<!-- /main-header -->
