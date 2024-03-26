<style>
    .icon-setting,.icon-checklist,.icon-report,.icon-computer,.icon-notification
    {
        margin-right: 15px;
    }
    .tooltip-container {
        position: relative;
        display: inline-block;
    }

    .tooltip-text {
        visibility: hidden;
        background-color: #263238;
        font-size: 12px;
        color: white;
        text-align: center;
        padding: 5px 10px; /* Padding for the content */
        border-radius: 6px;
        position: absolute;
        z-index: 1;
        top: 100%; /* Positioned below the container */
        right: 0; /* Positioned at the right side of the container */
        margin-top: 8px; /* Adjust as needed */
        opacity: 0;
        transition: opacity 0.3s;
        width: auto; /* Adjusts width based on content */
        white-space: nowrap; /* Prevents text from wrapping */
    }

    .tooltip-container:hover .tooltip-text {
        visibility: visible;
        opacity: 1;
    }
    .menu-inner
    {
        scrollbar-width: none !important;
    }

</style>
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme d-block d-lg-none" id="layout-navbar" style="background-color: #282828 !important;">
    <div class="container-xxl">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <i class="ti ti-menu-2 ti-sm"></i>
            </button>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown d-flex">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ !isset(auth()->user()->photo) ? 'https://d19000.setshape.com/crmdocs/user-profile-default.svg' :  ((auth()->user()->is_photo ==1) ? asset('/uploads/users/'.auth()->user()->photo) : auth()->user()->photo)  }}" alt class="rounded-circle profileauto" style="width: 42px !important; height: 42px !important;" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{route('profile.edit')}}">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ !isset(auth()->user()->photo) ? 'https://d19000.setshape.com/crmdocs/user-profile-default.svg' :  ((auth()->user()->is_photo ==1) ? asset('/uploads/users/'.auth()->user()->photo) : auth()->user()->photo)  }}" alt class="h-auto rounded-circle profileauto" style="width: 42px !important; height: 42px !important;" />


                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{Auth()->user()->name}}</span>
                                        <small class="text-muted">User</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('profile.edit')}}">
                                <i class="ti ti-user-check me-2 ti-sm"></i>
                                <span class="align-middle">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="ti ti-logout me-2 ti-sm"></i>
                                    <span class="align-middle">Log Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
        <!-- Search Small Screens -->
        <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
            <input type="text" class="form-control search-input border-0 container-xxl" placeholder="Search..." aria-label="Search...">
            <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
        </div>
    </div>
</nav>
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme
  flex-row w-full justify-content-between align-items-center h-px-75 d-none d-lg-flex {{request()->is('editor') || request()->is('editor/*')  ? 'position-fixed' : ''}}" style="padding: 10px 35px 10px 35px !important; z-index: 999 !important; width: 100vw !important;">
        <div class="row col-7 flex-nowrap">
            <div class="col-auto justify-content-start align-items-center d-flex border border-dark" style="padding-right: 20px;
       border-width: 0 1px 0 0 !important;">
                <div class="ss-shape__logo"> <a href="/"> <svg class="shape-logo" width="26" height="34" viewBox="0 0 26 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 34L9.16254e-06 34C6.42474 23.5758 6.42474 10.4242 9.16254e-06 1.83113e-05L0 0L26 17L0 34Z" fill="#FF7043"></path>
                            <path d="M12.3395 25.9318C14.9747 24.2088 15.5104 20.5718 13.4837 18.1632L2.60661 5.23633L2.60605 5.238C6.25479 14.5989 5.38783 25.2582 0 34L12.3395 25.9318L12.3395 25.9318Z" fill="url(#paint0_linear_882_60366)"></path>
                            <defs>
                                <linearGradient id="paint0_linear_882_60366" x1="-5.43855" y1="28.5655" x2="10.2456" y2="12.8696" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF7043"></stop>
                                    <stop offset="0.21689" stop-color="#FF643C"></stop>
                                    <stop offset="0.60152" stop-color="#FF462A"></stop>
                                    <stop offset="1" stop-color="#FF2114"></stop>
                                </linearGradient>
                            </defs>
                        </svg> </a>
                </div>
            </div>
            <div class="col-11 d-flex justify-content-start">
                <div class="container-xxl d-flex h-100">
                    <ul class="menu-inner">
                        <!-- Dashboards -->
                        <li class="menu-item {{request()->is('admin') || request()->is('admin/*') ? 'active' : ''}}">
                            <a href="{{ route('admin.index') }}" class="menu-link">

                                {{--                            <i class="menu-icon tf-icons ti ti-dashboard"></i>--}}
                                <div data-i18n="Dashboard">Dashboard</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-5 d-flex flex-row justify-content-end align-items-center">
           <style>

                .search-bar-upper {
                    position: relative;
                    border-radius: 1000px;
                    display: block !important;
                }
                @media screen and (min-width: 992px) and (max-width: 1200px)
                {
                    .search-bar-upper{
                        display: none !important;
                    }
                }
                .search-bar-upper input
                {
                    background-color: #35383d;
                    border-color: #35383d;
                    border-radius: 1000px;
                }
                .search-icon {
                    position: absolute;
                    top: 50%;
                    left: 10px;
                    transform: translateY(-50%);
                    color: #aaa;
                    transition: color 0.3s; /* Add transition for color change */
                    z-index: 10;
                }
                .search-input {
                    padding-left: 30px; /* Adjust this value as needed */
                }
                .card-serach {
                    padding-left: 30px; /* Adjust this value as needed */
                }
                .left-search {
                    padding-left: 30px; /* Adjust this value as needed */
                }
                .search-input:focus ~ .search-icon {
                    color: blue; /* Change color when input is focused */
                }
            </style>
            <div class="search-bar-upper mx-2 d-lg-block d-md-none">
                <i class="tf-icons ti ti-search search-icon"></i>
                <input type="text" class="form-control left-search" oninput="searchMenu(this.value)" placeholder="Search...">
                {{-- <input type="text" class="form-control search-input" placeholder="Search..." oninput="searchMenu(this)"> --}}
        </div>


            <svg style="margin-right: 15px;" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="18" cy="18" r="18" fill="#FF7043"/>
                <path d="M18.0002 11V25" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.0002 18H25.0002" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <svg style="margin-right: 15px;" width="1" height="40" viewBox="0 0 1 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line opacity="0.2" x1="0.5" y1="2.18557e-08" x2="0.499998" y2="40" stroke="white"/>
            </svg>

            <div class="d-flex flex-row custom-icons">
                <style>
                    .custom-icons svg:hover
                    {
                        transform: scale(1.2) !important;
                    }
                </style>
                <a href="https://d19000.setshape.com/task-manager" class="tooltip-container">
                    <svg class="icon-checklist" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.6">
                            <path d="M3.25 5.25C3.25 4.14543 4.14543 3.25 5.25 3.25H20.75C21.8546 3.25 22.75 4.14543 22.75 5.25V20.75C22.75 21.8546 21.8546 22.75 20.75 22.75H5.25C4.14543 22.75 3.25 21.8546 3.25 20.75V5.25Z" stroke="white" stroke-width="1.5"/>
                            <path d="M7.42773 9.28568L9.28488 11.1428L12.9992 7.89282" stroke="white" stroke-width="1.5"/>
                            <path d="M7.42773 15.7857L9.28488 17.6428L12.9992 14.3928" stroke="white" stroke-width="1.5"/>
                            <path d="M14.8574 10.6786H18.1074" stroke="white" stroke-width="1.5" stroke-linecap="square"/>
                            <path d="M14.8574 17.1786H18.1074" stroke="white" stroke-width="1.5" stroke-linecap="square"/>
                        </g>
                    </svg>
                    <span class="tooltip-text">Task</span>
                </a>
                <a href="https://d19000.setshape.com/reports" class="tooltip-container">
                    <svg class="icon-report" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.6">
                            <path d="M6.64258 23.2143H19.3569C20.4614 23.2143 21.3569 22.3189 21.3569 21.2143V8.25705C21.3569 7.72662 21.1462 7.21791 20.7711 6.84284L17.2998 3.37155C16.9247 2.99648 16.416 2.78577 15.8856 2.78577H6.64258C5.53801 2.78577 4.64258 3.68119 4.64258 4.78576V21.2143C4.64258 22.3189 5.53801 23.2143 6.64258 23.2143Z" stroke="white" stroke-width="1.5"/>
                            <path d="M9.28516 18.5714V16.7142" stroke="white" stroke-width="1.5" stroke-linecap="square"/>
                            <path d="M16.7148 18.5715V14.8572" stroke="white" stroke-width="1.5" stroke-linecap="square"/>
                            <path d="M13 18.5714V12.0714" stroke="white" stroke-width="1.5" stroke-linecap="square"/>
                            <path d="M15.7852 3.71423V6.35709C15.7852 7.46166 16.6806 8.35709 17.7852 8.35709H20.428" stroke="white" stroke-width="1.5"/>
                        </g>
                    </svg>
                    <span class="tooltip-text">Reports</span>
                </a>

                <a href="https://d19000.setshape.com/manage-portal" class="tooltip-container">
                    <svg class="icon-computer" style="transform: translateY(2px);" width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.8295 11C15.4177 9.83481 14.3064 9 13.0002 9C11.694 9 10.5827 9.83481 10.1709 11" stroke="#9fa1a3" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round"/>
                        <path d="M11 7C11 5.89543 11.8954 5 13 5C14.1046 5 15 5.89543 15 7C15 8.10457 14.1046 9 13 9C11.8954 9 11 8.10457 11 7Z" stroke="#9fa1a3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="1.28418" y="1" width="23.4316" height="14" rx="1.06151" stroke="#9fa1a3" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M11 15H16V19H11V15Z" stroke="#9fa1a3" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M19 19H8" stroke="#9fa1a3" stroke-width="1.5" stroke-linecap="square"/>
                    </svg>
                    <span class="tooltip-text">Portal</span>
                </a>
                <a href="https://d19000.setshape.com/" class="tooltip-container">
                    <svg class="icon-notification" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.7528 22.7648C8.96447 21.0964 8.51168 19.2749 8.42901 17.4038H8.66385C8.78818 17.4038 8.91205 17.419 9.03268 17.4492L13.934 18.6745C13.9645 19.4164 14.0576 19.7987 14.2672 20.2253C14.6622 21.0293 14.4967 22.1368 13.5848 22.6579L12.1342 23.4868C11.3089 23.9584 10.1921 23.6945 9.7528 22.7648Z" fill="#9fa1a3"/>
                        <path d="M21.4078 18.9968L13.9303 17.1274L9.78906 16.0921V5.96537L21.4078 3.0607C22.0812 2.89235 22.7434 3.08553 23.2146 3.49996C23.5715 3.81382 23.8189 4.25458 23.8788 4.76131C23.8881 4.8397 23.8929 4.91966 23.8929 5.00099L23.8929 17.0565C23.8929 17.7071 23.5872 18.2711 23.1237 18.6329C22.6602 18.9948 22.0389 19.1546 21.4078 18.9968Z" fill="#9fa1a3"/>
                        <path d="M8.28906 6.15372H7.875C5.18262 6.15372 3.00001 8.33632 3 11.0287C3 13.7211 5.18264 15.9038 7.87507 15.9038H8.28906V6.15372Z" fill="#9fa1a3"/>
                    </svg>
                    <span class="tooltip-text">Dashboard</span>
                </a>
                <a href="https://d19000.setshape.com/users" class="tooltip-container">
                    <svg class="icon-setting" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.6">
                            <circle cx="12.9994" cy="13.0001" r="3.71429" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M10.5744 23.5932L10.4076 24.3244L10.5744 23.5932ZM20.9558 20.3989L20.4067 19.8881L20.9558 20.3989ZM23.387 16.1951L24.1039 16.4153L23.387 16.1951ZM23.3868 9.80468L22.6699 10.025L23.3868 9.80468ZM20.9556 5.60105L21.5047 5.09017L20.9556 5.60105ZM10.5742 2.407L10.4075 1.67576L10.5742 2.407ZM5.04266 5.60191L5.59181 6.11273L5.04266 5.60191ZM2.61254 16.1964L1.89564 16.4168L2.61254 16.1964ZM2.61266 9.80331L1.89577 9.58293L2.61266 9.80331ZM15.4269 23.5927L15.26 22.8615L15.4269 23.5927ZM15.427 2.40749L15.5939 1.67629L15.427 2.40749ZM5.04249 20.3981L4.49333 20.9089L5.04249 20.3981ZM1.89564 16.4168C2.41702 18.1131 3.31589 19.643 4.49333 20.9089L5.59165 19.8872C4.56517 18.7837 3.78288 17.4513 3.32944 15.9761L1.89564 16.4168ZM2.18561 10.452C3.91539 11.71 3.91539 14.2893 2.18561 15.5474L3.06787 16.7605C5.62131 14.9034 5.62131 11.096 3.06787 9.23892L2.18561 10.452ZM4.49351 5.09109C3.31608 6.35688 2.4172 7.88672 1.89577 9.58293L3.32956 10.0237C3.78303 8.54851 4.56533 7.21623 5.59181 6.11273L4.49351 5.09109ZM9.79936 2.36094C9.57477 4.48798 7.34104 5.77763 5.38667 4.9086L4.77722 6.27921C7.66219 7.56203 10.9595 5.65831 11.2911 2.51844L9.79936 2.36094ZM12.9995 1.38528C12.1093 1.38528 11.2416 1.48557 10.4075 1.67576L10.7409 3.13823C11.4664 2.9728 12.2223 2.88528 12.9995 2.88528L12.9995 1.38528ZM15.5939 1.67629C14.759 1.48575 13.8906 1.38528 12.9995 1.38528L12.9995 2.88528C13.7775 2.88528 14.534 2.97296 15.2602 3.13868L15.5939 1.67629ZM20.6137 4.90818C18.6594 5.7772 16.4256 4.48755 16.201 2.36051L14.7093 2.51801C15.0409 5.65788 18.3382 7.5616 21.2232 6.27878L20.6137 4.90818ZM24.1038 9.5844C23.5823 7.88719 22.6829 6.3565 21.5047 5.09017L20.4065 6.11193C21.4337 7.2159 22.2164 8.54892 22.6699 10.025L24.1038 9.5844ZM23.8143 15.5474C22.0846 14.2893 22.0846 11.71 23.8143 10.452L22.9321 9.23892C20.3787 11.096 20.3787 14.9034 22.9321 16.7605L23.8143 15.5474ZM21.5049 20.9098C22.6831 19.6434 23.5825 18.1126 24.1039 16.4153L22.67 15.9748C22.2165 17.4509 21.4338 18.784 20.4067 19.8881L21.5049 20.9098ZM16.201 23.6395C16.4256 21.5124 18.6594 20.2228 20.6137 21.0918L21.2232 19.7212C18.3382 18.4384 15.0409 20.3421 14.7093 23.482L16.201 23.6395ZM12.9995 24.6149C13.8905 24.6149 14.7589 24.5144 15.5937 24.3239L15.26 22.8615C14.5339 23.0272 13.7774 23.1149 12.9995 23.1149L12.9995 24.6149ZM10.4076 24.3244C11.2418 24.5146 12.1094 24.6149 12.9995 24.6149L12.9995 23.1149C12.2224 23.1149 11.4666 23.0274 10.7411 22.862L10.4076 24.3244ZM5.38667 21.0914C7.34104 20.2224 9.57477 21.512 9.79936 23.6391L11.2911 23.4816C10.9595 20.3417 7.66219 18.438 4.77722 19.7208L5.38667 21.0914ZM10.7411 22.862C11.0393 22.9299 11.2592 23.18 11.2911 23.4816L9.79936 23.6391C9.8346 23.9728 10.0779 24.2493 10.4076 24.3244L10.7411 22.862ZM20.4067 19.8881C20.616 19.6631 20.9442 19.5972 21.2232 19.7212L20.6137 21.0918C20.9183 21.2273 21.2765 21.1552 21.5049 20.9098L20.4067 19.8881ZM22.9321 16.7605C22.6864 16.5818 22.5804 16.2664 22.67 15.9748L24.1039 16.4153C24.2028 16.0932 24.0858 15.7448 23.8144 15.5474L22.9321 16.7605ZM22.6699 10.025C22.5803 9.73323 22.6863 9.41768 22.9321 9.23892L23.8143 10.452C24.0857 10.2547 24.2027 9.90635 24.1038 9.5844L22.6699 10.025ZM21.2232 6.2788C20.9441 6.40286 20.6158 6.3369 20.4065 6.11193L21.5047 5.09017C21.2764 4.84479 20.9183 4.77277 20.6138 4.90816L21.2232 6.2788ZM11.2911 2.51845C11.2592 2.82014 11.0392 3.07022 10.7409 3.13823L10.4075 1.67576C10.0779 1.75092 9.83459 2.02729 9.79936 2.36093L11.2911 2.51845ZM5.59181 6.11273C5.383 6.33721 5.05552 6.40296 4.77722 6.27921L5.38667 4.9086C5.08145 4.77288 4.7224 4.84503 4.49351 5.09109L5.59181 6.11273ZM3.32944 15.9761C3.41893 16.2672 3.3131 16.5821 3.06787 16.7605L2.18562 15.5474C1.91374 15.7451 1.79647 16.0941 1.89564 16.4168L3.32944 15.9761ZM3.06787 9.23892C3.31323 9.41736 3.4191 9.7324 3.32956 10.0237L1.89577 9.58293C1.79663 9.90544 1.91384 10.2544 2.18562 10.452L3.06787 9.23892ZM14.7093 23.482C14.7412 23.18 14.9614 22.9296 15.26 22.8615L15.5937 24.3239C15.9229 24.2488 16.1659 23.9727 16.201 23.6395L14.7093 23.482ZM15.2602 3.13868C14.9615 3.07053 14.7412 2.82012 14.7093 2.51801L16.201 2.36051C16.1659 2.02735 15.923 1.75139 15.5939 1.67629L15.2602 3.13868ZM4.77722 19.7208C5.05545 19.5971 5.38288 19.6628 5.59165 19.8872L4.49333 20.9089C4.72227 21.155 5.08139 21.2271 5.38667 21.0914L4.77722 19.7208Z" fill="white"/>
                        </g>
                    </svg>
                    <span class="tooltip-text">Settings</span>
                </a>
            </div>
            <svg style="margin-right: 15px;" width="1" height="40" viewBox="0 0 1 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line opacity="0.2" x1="0.5" y1="2.18557e-08" x2="0.499998" y2="40" stroke="white"/>
            </svg>
            <li class="nav-item navbar-dropdown dropdown-user dropdown d-flex">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ !isset(auth()->user()->photo) ? 'https://d19000.setshape.com/crmdocs/user-profile-default.svg' :  ((auth()->user()->is_photo ==1) ? asset('/uploads/users/'.auth()->user()->photo) : auth()->user()->photo)  }}" alt class="rounded-circle profileauto" style="width: 42px !important; height: 42px !important;" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{route('profile.edit')}}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ !isset(auth()->user()->photo) ? 'https://d19000.setshape.com/crmdocs/user-profile-default.svg' :  ((auth()->user()->is_photo ==1) ? asset('/uploads/users/'.auth()->user()->photo) : auth()->user()->photo)  }}" alt class="h-auto rounded-circle profileauto" style="width: 42px !important; height: 42px !important;" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block">{{Auth()->user()->name}}</span>
                                    <small class="text-muted">User</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('profile.edit')}}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </div>
</aside>

<style>
    .accordion-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #FF7043; /* Orange color */
    }

    .accordion-divider {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 27px; /* Adjusted to align with the icons */
        width: 1px;
        background-color: rgba(204, 204, 204, 0.51);
        z-index: 10;
    }

    .accordion-body {
        padding-left: 40px;
    }

    /* Change color of accordion button and icon on hover */
    .accordion-button:hover,
    .accordion-button:hover .accordion-icon {
        color: #FF7043; /* Orange color */
    }
</style>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
        <h5 id="offcanvasMenuLabel" class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Move your menu content here -->
        <ul class="menu-inner overflow-auto">
            <div class="container-xxl d-flex h-100 flex-column p-0">
                <style>
                    .nav {
                        overflow: auto; /* Enable scrolling */
                        /* Hide scrollbar for Chrome, Safari, and Opera */
                        scrollbar-width: none;
                        /* Hide scrollbar for Firefox */
                        scrollbar-color: transparent transparent;
                    }

                    .nav::-webkit-scrollbar {
                        width: 0; /* Set the width of scrollbar to zero */
                        height: 0; /* Set the height of scrollbar to zero */
                    }

                    .accordion-item {
                        position: relative;
                    }

                    .accordion-icon {
                        position: absolute;
                        left: 10px;
                        top: 50%;
                        transform: translateY(-50%);
                        color: #ff7034; /* Orange color */
                    }

                    .accordion-divider {
                        position: absolute;
                        top: 30px;
                        bottom: 25px;
                        left: 27px; /* Adjusted to align with the icons */
                        width: 1px;
                        background-color: rgba(204, 204, 204, 0.51);
                        z-index: 10;
                    }

                    .accordion-body {
                        padding-left: 40px; /* Adjust this value according to your design */
                    }

                    .accordion-button:hover .ti,
                    .accordion-button:hover span,
                    .accordion-button:not(.collapsed) span,
                    .accordion-button:not(.collapsed) .ti {
                        color: #ff7034 !important; /* Change the color to orange on hover and when active */
                    }
                </style>

                <div class="ss-shape__logo"> <a href="/"> <svg width="26" height="34" viewBox="0 0 26 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 34L9.16254e-06 34C6.42474 23.5758 6.42474 10.4242 9.16254e-06 1.83113e-05L0 0L26 17L0 34Z" fill="#FF7043"></path>
                            <path d="M12.3395 25.9318C14.9747 24.2088 15.5104 20.5718 13.4837 18.1632L2.60661 5.23633L2.60605 5.238C6.25479 14.5989 5.38783 25.2582 0 34L12.3395 25.9318L12.3395 25.9318Z" fill="url(#paint0_linear_882_60366)"></path>
                            <defs>
                                <linearGradient id="paint0_linear_882_60366" x1="-5.43855" y1="28.5655" x2="10.2456" y2="12.8696" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF7043"></stop>
                                    <stop offset="0.21689" stop-color="#FF643C"></stop>
                                    <stop offset="0.60152" stop-color="#FF462A"></stop>
                                    <stop offset="1" stop-color="#FF2114"></stop>
                                </linearGradient>
                            </defs>
                        </svg> </a>
                    <span> Shape </span>
                </div>
                <div class="accordion mt-3" id="accordionMenu">
                    <!-- Dashboards -->
                    <div class="accordion-item">
                        <div class="accordion-divider"></div> <!-- Vertical Divider -->
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDashboard" aria-expanded="false" aria-controls="collapseDashboard">
                                <i class="tf-icons ti ti-dashboard mr-10"></i>
                                <span style="margin-left: 15px; font-size: 13px;">Dashboard</span>
                            </button>
                        </div>
                        <div id="collapseDashboard" class="accordion-collapse collapse" aria-labelledby="headingDashboard" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('admin.index') }}" style="font-size: 12px;">Dashboard Home</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    {{-- @if(in_array($userRole->slug,['super-admin','company-admin','developer','admin'])) --}}
                    <!-- Designs -->
                    <div class="accordion-item">
                        <div class="accordion-divider"></div> <!-- Vertical Divider -->
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDesigns" aria-expanded="false" aria-controls="collapseDesigns">
                                <i class="tf-icons ti ti-layers-intersect mr-10"></i>
                                <span style="margin-left: 15px; font-size: 13px;">Designs</span>
                            </button>
                        </div>
                        <div id="collapseDesigns" class="accordion-collapse collapse" aria-labelledby="headingDesigns" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('editor.index') }}" style="font-size: 12px;">Add Designs</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('designs.index') }}" style="font-size: 12px;">Designs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Design Types -->
                    <div class="accordion-item">
                        <div class="accordion-divider"></div> <!-- Vertical Divider -->
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDesignTypes" aria-expanded="false" aria-controls="collapseDesignTypes">
                                <i class="tf-icons ti ti-layers-intersect mr-10"></i>
                                <span style="margin-left: 15px; font-size: 13px;">Design Types</span>
                            </button>
                        </div>
                        <div id="collapseDesignTypes" class="accordion-collapse collapse" aria-labelledby="headingDesignTypes" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('designs-types.create') }}" style="font-size: 12px;">Add Design Type</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('designs-types.index') }}" style="font-size: 12px;">Design Types</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-divider"></div> <!-- Vertical Divider -->
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                                <i class="tf-icons ti ti-category mr-10"></i>
                                <span style="margin-left: 15px; font-size: 13px;">Category</span>
                            </button>
                        </div>
                        <div id="collapseCategory" class="accordion-collapse collapse" aria-labelledby="headingCategory" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('categories.create') }}" style="font-size: 12px;">Add Category</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('categories.index') }}" style="font-size: 12px;">Category</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Users -->
                    <div class="accordion-item">
                        <div class="accordion-divider"></div> <!-- Vertical Divider -->
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                                <i class="tf-icons ti ti-users mr-10"></i>
                                <span style="margin-left: 15px; font-size: 13px;">Users</span>
                            </button>
                        </div>
                        <div id="collapseUsers" class="accordion-collapse collapse" aria-labelledby="headingUsers" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('user.create') }}" style="font-size: 12px;">Add Users</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.index') }}" style="font-size: 12px;">Users</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Offices -->
                    <div class="accordion-item">
                        <div class="accordion-divider"></div> <!-- Vertical Divider -->
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOffices" aria-expanded="false" aria-controls="collapseOffices">
                                <i class="tf-icons ti ti-gizmo mr-10"></i>
                                <span style="margin-left: 15px; font-size: 13px;">Offices</span>
                            </button>
                        </div>
                        <div id="collapseOffices" class="accordion-collapse collapse" aria-labelledby="headingOffices" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('offices.create') }}" style="font-size: 12px;">Add Office</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('offices.index') }}" style="font-size: 12px;">Offices</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Departments -->
                    <div class="accordion-item">
                        <div class="accordion-divider"></div> <!-- Vertical Divider -->
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDepartments" aria-expanded="false" aria-controls="collapseDepartments">
                                <i class="tf-icons ti ti-table mr-10"></i>
                                <span style="margin-left: 15px; font-size: 13px;">Departments</span>
                            </button>
                        </div>
                        <div id="collapseDepartments" class="accordion-collapse collapse" aria-labelledby="headingDepartments" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('departments.create') }}" style="font-size: 12px;">Add Department</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('departments.index') }}" style="font-size: 12px;">Departments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Setup -->
                    <div class="accordion-item">
                        <div class="accordion-divider"></div> <!-- Vertical Divider -->
                        <div class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSetup" aria-expanded="false" aria-controls="collapseSetup">
                                <i class="tf-icons ti ti-settings mr-10"></i>
                                <span style="margin-left: 15px; font-size: 13px;">Setup</span>
                            </button>
                        </div>
                        <div id="collapseSetup" class="accordion-collapse collapse" aria-labelledby="headingSetup" data-bs-parent="#accordionMenu">
                            <div class="accordion-body">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('roles.index') }}" style="font-size: 12px;">Role & Permissions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Add more accordion items for other menu categories -->
                </div>
            </div>
        </ul>
    </div>
</div>
