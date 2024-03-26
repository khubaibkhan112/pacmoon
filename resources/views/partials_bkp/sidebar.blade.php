<style>
    .icon-setting,.icon-checklist,.icon-report,.icon-computer,.icon-notification
    {
        margin-right: 15px;
    }
    .layout-navbar
    {
        font-size: 14px !important;
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

    .ss-shape__logo:after {
        content: "";
        position: absolute;
        width: 1px;
        height: 40px;
        background-color: var(--white);
        top: 0;
        right: -14px;
        z-index: 1;
        opacity: 0.20;
        display: initial;
    }


</style>

<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme d-block d-lg-none" id="layout-navbar" style="background-color: #282828 !important;font-size: 14px !important;">
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
                        <div class="avatar">
                            <img src="{{ !isset(auth()->user()->photo) ? 'https://d19000.setshape.com/crmdocs/user-profile-default.svg' :  ((auth()->user()->is_photo ==1) ? asset('/uploads/users/'.auth()->user()->photo) : auth()->user()->photo)  }}" alt class="rounded-circle profileauto" style="width: 42px !important; height: 42px !important;" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            {{-- <a class="dropdown-item" href="{{route('profile.edit')}}"> --}}
                            <a class="dropdown-item" href="https://d19000.setshape.com/profile/{{ auth()->user()->shape_user_id }}?tab=personal-info">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="{{ !isset(auth()->user()->photo) ? 'https://d19000.setshape.com/crmdocs/user-profile-default.svg' :  ((auth()->user()->is_photo ==1) ? asset('/uploads/users/'.auth()->user()->photo) : auth()->user()->photo)  }}" alt class="h-auto rounded-circle profileauto" style="width: 42px !important; height: 42px !important;" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{Auth()->user()->name}}</span>
                                        <small class="text-muted">{{Auth()->user()->roles()->first()->name}}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            {{-- <a class="dropdown-item" href="{{route('profile.edit')}}"> --}}
                            <a class="dropdown-item" href="https://d19000.setshape.com/profile/{{ auth()->user()->shape_user_id }}?tab=personal-info">

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
  flex-row w-full justify-content-between align-items-center d-none d-lg-flex {{request()->is('editor') || request()->is('editor/*') || request()->is('co-branding') || request()->is('co-branding/*')  ? 'position-fixed' : ''}}" style="padding: 14px 24px 8px 24px !important; z-index: 999 !important; width: 100vw !important;">
        <div class="row col-lg-7 flex-nowrap custom-width" style="margin-top: -2px;">
            <div class="col-auto justify-content-start align-items-center d-flex" style="margin-top: -4px;">
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
                <svg style="margin-left: 13px; margin-bottom:-2px;" width="1" height="40" viewBox="0 0 1 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line opacity="0.2" x1="0.5" y1="2.18557e-08" x2="0.499998" y2="40" stroke="white"/>
                </svg>
            </div>
            <div class="col-11 d-flex justify-content-start px-0">
                <div class="container-xxl d-flex h-100 px-0">
                    <style>
                        /*.navbar-nav li:hover > .dropdown-menu {*/
                        /*    display: block;*/
                        /*}*/
                        .navbar li .nav-link
                        {
                            color:white !important;

                        }
                        .navbar .dropdown-submenu {
                            position:relative;
                        }
                        .navbar .dropdown-submenu > .dropdown-menu {
                            top: 0;
                            left: 100%;
                            margin-top:-6px;
                        }

                        /* rotate caret on hover */
                        .navbar .dropdown-menu > li > a:hover:after {

                            transform: rotate(90deg);
                        }
                        .navbar .dropdown-menu
                        {   width: 250px;
                            max-height: 300px;
                            Padding: 0;
                            list-style-type: none;
                            overflow: visible;

                        }
                        .dropdown-inner
                        {
                            max-height: 290px;
                            overflow: hidden;
                        }
                        /* CSS for adding pointed edge on top of dropdown */
                        .navbar .dropdown-menu::before {
                            content: '';
                            position: absolute;
                            top: -7px;
                            left: 5%;
                            width: 5px;
                            height: 5px;
                            border-left: 10px solid transparent;
                            border-right: 10px solid transparent;
                            border-bottom: 10px solid white; /* Adjust color if needed */
                            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
                            z-index: 999999999;
                        }
                        /*.dropdown-item::before{*/
                        /*    content: "";*/
                        /*    width: 4px;*/
                        /*    height: 41px;*/
                        /*    background-color: #ff7034;*/
                        /*    -webkit-border-radius: 0px 8px 8px 0px;*/
                        /*    -moz-border-radius: 0px 8px 8px 0px;*/
                        /*    -ms-border-radius: 0px 8px 8px 0px;*/
                        /*    -o-border-radius: 0px 8px 8px 0px;*/
                        /*    border-radius: 0px 8px 8px 0px;*/
                        /*    position: relative;*/
                        /*    top: 1px;*/
                        /*    left: 10px;*/
                        /*}*/
                        .nav-link
                        {

                            font-size: 1rem;
                            line-height: 1.2rem;
                            font-weight: 400;
                            color: var(--white);
                            text-decoration: none;
                            margin-right:16px;
                        }

                        .navbar .li a{
                        color:#263238;
                    }
                        .navbar .li:hover a
                    {
                        color:#ff7034;
                    }
                        .navbar .dropdown-item:hover
                    {
                        background:white !important;
                        border-left: 4px solid #ff7034;
                        margin-left:-1px;
                    }
                        .navbar .dropdown-header
                    {
                        color: #263238;
                        padding: 5px 0;
                        margin: 8px 0 8px 20px;
                        font-size: 16px;
                        font-weight: 600;
                    }
                        .navbar .dropdown-item{
                        border-radius:0 !important;

                    }
                        .navbar-nav .dropdown-toggle::after {
                            transition: transform 0.3s ease;

                        }
                        .navbar-nav .dropdown-toggle.rotated::after {
                            transform: translateY(3px) rotate(226deg) ;

                        }

                        .navbar-nav .dropdown-toggle.hovered::after {
                            transform:translateY(3px) rotate(226deg) ;
                        }
                        .shape-button

                        {
                            color:#fff;
                            background-color: #ff7034;
                            font-size: .8125rem;
                            -webkit-border-radius: 30px 30px 30px 30px;
                            -moz-border-radius: 30px 30px 30px 30px;
                            -ms-border-radius: 30px 30px 30px 30px;
                            -o-border-radius: 30px 30px 30px 30px;
                            border-radius: 30px 30px 30px 30px;
                            padding: 3px 12px;
                            border: none;
                            font-weight: 500;
                        }
                    .dropdown-menu
                    {
                        transform: translate(0px,0) !important;
                    }

                    </style>

                    <nav class="navbar navbar-expand-md bg-transparent" style="margin-left:-2px;">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkLeads" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Leads</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkLeads">
                                        <div class="dropdown-inner">
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=64">Call Queue</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=339">April</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=351">Test</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=378">Call Queue - Copy</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=354">Test</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=196">New Leads</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=310">Verse Qualified</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=325">Facebook</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=322">Source</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=199">Attempting Contact-</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=205">Interested – Pitched (HOT)</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=202">Appointment Scheduled</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=214">Credit Repair</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=316">IP Target Marketing</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=331">New Leads Categorized</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=238">Nurture</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=358">Test lead</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=360">Recent Text Engagement</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads?pid=366">Testing</a>--}}
{{--                                            <div class="dropdown-divider"></div>--}}
                                            <h6 class="dropdown-header">Database View</h6>
                                            <a class="dropdown-item" href="https://d19000.setshape.com/leads">All Leads</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- Repeat the same structure for other menu items -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkApplications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Applications</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkApplications">
                                        <div class="carrot"></div>
                                        <div class="dropdown-inner">
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/applications?pid=70">Pipeline View</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/applications?pid=220">Pre-Qualified</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/applications?pid=223">Applications</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/applications?pid=232">Borrower Docs</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/applications?pid=235">Pre-Approved</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/applications?pid=181">Nurture</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/applications?pid=364">Test2</a>--}}
{{--                                            <div class="dropdown-divider"></div>--}}
                                            <h6 class="dropdown-header">Database View</h6>
                                            <a class="dropdown-item" href="https://d19000.setshape.com/applications">All Applications</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- Repeat the same structure for other menu items -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkLoans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loans</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkLoans">
                                        <div class="dropdown-inner">
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/loans?pid=190">Active Loans Pipeline</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/loans?pid=241">Registered</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/loans?pid=268">Refi Targeting</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/loans?pid=244">Processing</a>--}}
                                            <!-- Add more items as needed -->
{{--                                            <div class="dropdown-divider"></div>--}}
                                            <h6 class="dropdown-header">Database View</h6>
                                            <a class="dropdown-item" href="https://d19000.setshape.com/loans">All Loans</a>
                                        </div>
                                    </div>
                                    <div class="carrot"></div>
                                </li>
                                <!-- Repeat the same structure for other menu items -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkReferralPartners" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Referral Partners</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkReferralPartners">
                                        <div class="carrot"></div>
{{--                                        <a class="dropdown-item" href="https://d19000.setshape.com/referral-partners?pid=334">Las Vegas Partners</a>--}}
{{--                                        <a class="dropdown-item" href="https://d19000.setshape.com/referral-partners?pid=85">All Partners (Organized)</a>--}}
{{--                                        <a class="dropdown-item" href="https://d19000.setshape.com/referral-partners?pid=103">VIP Referral Partners</a>--}}
{{--                                        <!-- Add more items as needed -->--}}
{{--                                        <div class="dropdown-divider"></div>--}}
                                        <h6 class="dropdown-header">Database View</h6>
                                        <a class="dropdown-item" href="https://d19000.setshape.com/referral-partners">All Referral Partners</a>
                                    </div>
                                </li>
                                <!-- Repeat the same structure for other menu items -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkContacts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contacts</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkContacts">
                                        <div class="dropdown-inner">
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/contacts?pid=88">All Associates (Organized)</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/contacts?pid=109">General</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/contacts?pid=112">Title Agents</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/contacts?pid=116">Transactional Coordinators</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/contacts?pid=94">Business Associates</a>--}}
{{--                                            <a class="dropdown-item" href="https://d19000.setshape.com/contacts?pid=97">General Contacts</a>--}}
{{--                                            <!-- Add more items as needed -->--}}
{{--                                            <div class="dropdown-divider"></div>--}}
                                            <h6 class="dropdown-header">Database View</h6>
                                            <a class="dropdown-item" href="https://d19000.setshape.com/contacts">All Contacts</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
{{--                        <button class="shape-button">--}}
{{--                            Get Lead--}}
{{--                        </button>--}}
                    </nav>
{{--                    <ul class="menu-inner">--}}
{{--                        <!-- Dashboards -->--}}
{{--                        <li class="menu-item {{request()->is('admin') || request()->is('admin/*') ? 'active px-0' : ''}}">--}}
{{--                            <a href="{{ route('admin.index') }}" class="menu-link">--}}

{{--                                --}}{{--                            <i class="menu-icon tf-icons ti ti-dashboard"></i>--}}
{{--                                <div data-i18n="Dashboard">Dashboard</div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        @can('designs-list')--}}
{{--                            <!-- designs -->--}}
{{--                            <li class="menu-item {{request()->is('designs') || request()->is('designs/*') || request()->is('editor')  ? 'active' : ''}}">--}}
{{--                                <a href="" class="menu-link menu-toggle">--}}
{{--                                    --}}{{--                            <i class="menu-icon tf-icons ti ti-layers-intersect"></i>--}}
{{--                                    <div data-i18n="Designs">Designs</div>--}}
{{--                                </a>--}}
{{--                                <ul class="menu-sub">--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('editor.index')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-playlist-add"></i>--}}
{{--                                            <div data-i18n="Add Designs">Add Designs</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('designs.index')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-layers-intersect"></i>--}}
{{--                                            <div data-i18n="Designs">Designs</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @can('designs-types-list')--}}
{{--                            --}}{{-- designs Types --}}
{{--                            <li class="menu-item {{request()->is('designs-types/*') || request()->is('designs-types') ? 'active' : '' }} ">--}}
{{--                                <a href="javascript:void(0)" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-icon tf-icons ti ti-layers-intersect"></i>--}}
{{--                                    <div data-i18n="Designs Types">Designs Types</div>--}}
{{--                                </a>--}}

{{--                                <ul class="menu-sub">--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('designs-types.create')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-playlist-add"></i>--}}
{{--                                            <div data-i18n="Add Designs Type">Add Designs Type</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('designs-types.index')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-layers-intersect"></i>--}}
{{--                                            <div data-i18n="Designs Types">Designs Types</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @can('category-list')--}}
{{--                            --}}{{-- Category --}}
{{--                            <li class="menu-item {{request()->is('categories') || request()->is('categories/*') ? 'active' : ''}}">--}}
{{--                                <a href="javascript:void(0)" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-icon tf-icons ti ti-category"></i>--}}
{{--                                    <div data-i18n="Categories">Categories</div>--}}
{{--                                </a>--}}

{{--                                <ul class="menu-sub">--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('categories.create')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-playlist-add"></i>--}}
{{--                                            <div data-i18n="Add Category">Add Category</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('categories.index')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-category"></i>--}}
{{--                                            <div data-i18n="Categories">Categories</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @can("user-list")--}}
{{--                            <!-- --}}{{-- Users --}}{{-- -->--}}
{{--                            <li class="menu-item {{request()->is('user') || request()->is('user/*') ? 'active' : ''}} {{request()->is('user.create') ? 'active' : ''}}">--}}
{{--                                <a href="javascript:void(0)" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-icon tf-icons ti ti-users"></i>--}}
{{--                                    <div data-i18n="Users">Users</div>--}}
{{--                                </a>--}}

{{--                                <ul class="menu-sub">--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('user.create')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-playlist-add"></i>--}}
{{--                                            <div data-i18n="Add Users">Add Users</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('user.index')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-users"></i>--}}
{{--                                            <div data-i18n="Users">Users</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        --}}{{-- Offices Routes --}}
{{--                        @can('office-list')--}}
{{--                            <li class="menu-item {{request()->is('offices') || request()->is('offices/*') ? 'active' : ''}}">--}}
{{--                                <a href="javascript:void(0)" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-icon tf-icons ti ti-gizmo"></i>--}}
{{--                                    <div data-i18n="Offices">Offices</div>--}}
{{--                                </a>--}}
{{--                                <ul class="menu-sub">--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('offices.create')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-playlist-add"></i>--}}
{{--                                            <div data-i18n="Add Office">Add Office</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('offices.index')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-gizmo"></i>--}}
{{--                                            <div data-i18n="Offices">Offices</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @can('department-list')--}}
{{--                            --}}{{-- Departments Routes --}}
{{--                            <li class="menu-item {{request()->is('departments') || request()->is('departments/*') ? 'active' : ''}}">--}}
{{--                                <a href="javascript:void(0)" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-icon tf-icons ti ti-table"></i>--}}
{{--                                    <div data-i18n="Departments">Departments</div>--}}
{{--                                </a>--}}
{{--                                <ul class="menu-sub">--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('departments.create')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-playlist-add"></i>--}}
{{--                                            <div data-i18n="Add Department">Add Department</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('departments.index')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-table"></i>--}}
{{--                                            <div data-i18n="Departments">Departments</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @if(auth()->user()->id == 1)--}}
{{--                            <li class="menu-item {{request()->is('companies') ? 'active' : ''}}">--}}
{{--                                <a href="javascript:void(0)" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-icon tf-icons ti ti-settings"></i>--}}
{{--                                    <div data-i18n="Companies">Companies</div>--}}
{{--                                </a>--}}
{{--                                <ul class="menu-sub">--}}
{{--                                    <li class="menu-item">--}}
{{--                                        <a href="{{route('companies.index')}}" class="menu-link">--}}
{{--                                            <i class="menu-icon tf-icons ti ti-components"></i>--}}
{{--                                            <div data-i18n="Companies">Companies</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @can('setup-list')--}}
{{--                            <li class="menu-item {{request()->is('roles') ? 'active' : ''}}">--}}
{{--                                <a href="javascript:void(0)" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-icon tf-icons ti ti-settings"></i>--}}
{{--                                    <div data-i18n="Setup">Setup</div>--}}
{{--                                </a>--}}
{{--                                @can('role-permission-create')--}}
{{--                                    <ul class="menu-sub">--}}
{{--                                        <li class="menu-item">--}}
{{--                                            <a href="{{route('roles.index')}}" class="menu-link">--}}
{{--                                                <i class="menu-icon tf-icons ti ti-components"></i>--}}
{{--                                                <div data-i18n="Role & Permissions">Role & Permissions</div>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                @endcan--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                    </ul>--}}
                </div>
            </div>
        </div>

        <div class="col-lg-5 d-flex flex-row justify-content-end align-items-center custom-width-2">
{{--            <svg style="margin-right: 15px;" width="247" height="40" viewBox="0 0 247 40" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <rect width="247" height="40" rx="20" fill="#35383D"/>--}}
{{--                <path opacity="0.6" d="M49.946 22.41C50.002 22.6713 50.114 22.914 50.282 23.138C50.4593 23.362 50.6973 23.544 50.996 23.684C51.2947 23.824 51.6633 23.894 52.102 23.894C52.7553 23.894 53.236 23.7447 53.544 23.446C53.8613 23.138 54.02 22.7787 54.02 22.368C54.02 22.032 53.922 21.7567 53.726 21.542C53.5393 21.318 53.278 21.1313 52.942 20.982C52.6153 20.8233 52.2373 20.6833 51.808 20.562C51.4347 20.45 51.066 20.3333 50.702 20.212C50.3473 20.0813 50.0253 19.9227 49.736 19.736C49.4467 19.54 49.218 19.2927 49.05 18.994C48.882 18.686 48.798 18.3033 48.798 17.846C48.798 17.2767 48.9333 16.7867 49.204 16.376C49.4747 15.9653 49.8527 15.6527 50.338 15.438C50.8327 15.214 51.402 15.102 52.046 15.102C52.5873 15.102 53.0727 15.1813 53.502 15.34C53.9313 15.4893 54.2907 15.7087 54.58 15.998C54.8787 16.278 55.098 16.6187 55.238 17.02L53.964 17.482C53.908 17.2767 53.7913 17.0853 53.614 16.908C53.4367 16.7213 53.2127 16.572 52.942 16.46C52.6713 16.348 52.368 16.292 52.032 16.292C51.6867 16.2827 51.374 16.3387 51.094 16.46C50.8233 16.572 50.604 16.7353 50.436 16.95C50.2773 17.1647 50.198 17.4213 50.198 17.72C50.198 18.0467 50.2913 18.3033 50.478 18.49C50.6647 18.6767 50.912 18.8307 51.22 18.952C51.5373 19.0733 51.8827 19.19 52.256 19.302C52.648 19.4233 53.0307 19.554 53.404 19.694C53.7773 19.834 54.1133 20.0113 54.412 20.226C54.72 20.4407 54.9673 20.7113 55.154 21.038C55.3407 21.3553 55.434 21.7567 55.434 22.242C55.434 22.7647 55.3127 23.2407 55.07 23.67C54.8273 24.0993 54.4587 24.4447 53.964 24.706C53.4787 24.9673 52.8673 25.098 52.13 25.098C51.5233 25.098 50.9773 25.0047 50.492 24.818C50.0067 24.6313 49.6053 24.3747 49.288 24.048C48.98 23.712 48.7747 23.3247 48.672 22.886L49.946 22.41ZM60.1398 25.098C59.4678 25.098 58.8704 24.944 58.3478 24.636C57.8344 24.3187 57.4284 23.8847 57.1298 23.334C56.8404 22.7833 56.6958 22.1533 56.6958 21.444C56.6958 20.7627 56.8404 20.156 57.1298 19.624C57.4191 19.092 57.8158 18.672 58.3198 18.364C58.8331 18.056 59.4118 17.902 60.0558 17.902C60.7091 17.902 61.2878 18.0467 61.7918 18.336C62.2958 18.616 62.6878 19.0127 62.9678 19.526C63.2478 20.03 63.3831 20.6133 63.3738 21.276C63.3738 21.388 63.3691 21.5047 63.3598 21.626C63.3504 21.738 63.3364 21.864 63.3178 22.004H58.1378C58.1658 22.3773 58.2684 22.7087 58.4458 22.998C58.6324 23.278 58.8658 23.4973 59.1458 23.656C59.4351 23.8147 59.7618 23.894 60.1258 23.894C60.5924 23.894 60.9984 23.8053 61.3438 23.628C61.6891 23.4413 61.9318 23.194 62.0718 22.886L63.2198 23.292C62.9398 23.8613 62.5291 24.3047 61.9878 24.622C61.4558 24.9393 60.8398 25.098 60.1398 25.098ZM61.9318 20.87C61.9318 20.534 61.8478 20.2307 61.6798 19.96C61.5118 19.6893 61.2831 19.4793 60.9938 19.33C60.7138 19.1713 60.3964 19.092 60.0418 19.092C59.7244 19.092 59.4304 19.1713 59.1598 19.33C58.8984 19.4793 58.6744 19.6893 58.4878 19.96C58.3104 20.2213 58.1984 20.5247 58.1517 20.87H61.9318ZM69.2604 25L69.1484 23.978C68.9338 24.3327 68.6538 24.608 68.3084 24.804C67.9724 24.9907 67.5338 25.084 66.9924 25.084C66.4884 25.084 66.0591 25.0047 65.7044 24.846C65.3498 24.678 65.0744 24.4493 64.8784 24.16C64.6918 23.8613 64.5984 23.516 64.5984 23.124C64.5984 22.536 64.8178 22.0507 65.2564 21.668C65.6951 21.276 66.3298 21.0333 67.1604 20.94L69.1484 20.716V20.17C69.1484 19.8713 69.0271 19.6193 68.7844 19.414C68.5418 19.1993 68.1918 19.092 67.7344 19.092C67.3051 19.092 66.9411 19.1947 66.6424 19.4C66.3438 19.596 66.1431 19.89 66.0404 20.282L64.8644 19.862C65.0418 19.246 65.3871 18.7653 65.9004 18.42C66.4231 18.0747 67.0531 17.902 67.7904 17.902C68.6678 17.902 69.3351 18.1213 69.7924 18.56C70.2498 18.9987 70.4784 19.5773 70.4784 20.296V25H69.2604ZM69.1484 21.794L67.2304 22.032C66.8198 22.088 66.5118 22.2047 66.3064 22.382C66.1011 22.55 65.9984 22.774 65.9984 23.054C65.9984 23.3153 66.0964 23.5347 66.2924 23.712C66.4978 23.88 66.7824 23.964 67.1464 23.964C67.5944 23.964 67.9678 23.88 68.2664 23.712C68.5651 23.544 68.7844 23.3107 68.9244 23.012C69.0738 22.704 69.1484 22.3493 69.1484 21.948V21.794ZM72.3732 18H73.5772L73.6612 18.938C73.8572 18.6953 74.0812 18.4947 74.3332 18.336C74.5946 18.168 74.8746 18.0513 75.1732 17.986C75.4812 17.9207 75.7986 17.9253 76.1252 18V19.246C75.8172 19.1713 75.5186 19.162 75.2292 19.218C74.9399 19.274 74.6786 19.3953 74.4452 19.582C74.2212 19.7593 74.0392 19.9973 73.8992 20.296C73.7592 20.5947 73.6892 20.954 73.6892 21.374V25H72.3732V18ZM80.3185 25.098C79.6465 25.098 79.0538 24.9487 78.5405 24.65C78.0271 24.342 77.6258 23.922 77.3365 23.39C77.0565 22.858 76.9165 22.2373 76.9165 21.528C76.9165 20.8093 77.0611 20.1793 77.3505 19.638C77.6398 19.0967 78.0411 18.672 78.5545 18.364C79.0678 18.056 79.6651 17.902 80.3465 17.902C81.0651 17.902 81.6951 18.07 82.2365 18.406C82.7871 18.742 83.1838 19.1947 83.4265 19.764L82.2365 20.184C82.0965 19.8573 81.8585 19.596 81.5225 19.4C81.1958 19.204 80.8225 19.106 80.4025 19.106C79.9731 19.106 79.6045 19.2087 79.2965 19.414C78.9885 19.61 78.7505 19.89 78.5825 20.254C78.4145 20.6087 78.3305 21.0287 78.3305 21.514C78.3305 22.242 78.5171 22.8207 78.8905 23.25C79.2638 23.6793 79.7678 23.894 80.4025 23.894C80.8225 23.894 81.1958 23.8007 81.5225 23.614C81.8585 23.4273 82.1105 23.1707 82.2785 22.844L83.4545 23.264C83.1931 23.824 82.7825 24.272 82.2225 24.608C81.6625 24.9347 81.0278 25.098 80.3185 25.098ZM85.0607 14.92H86.3767V18.77C86.6007 18.4993 86.8901 18.2893 87.2447 18.14C87.5994 17.9813 87.9914 17.902 88.4207 17.902C88.9434 17.902 89.4007 18.0187 89.7927 18.252C90.1941 18.476 90.5067 18.8167 90.7307 19.274C90.9547 19.722 91.0667 20.282 91.0667 20.954V25H89.6807V21.122C89.6807 20.4687 89.5454 19.9693 89.2747 19.624C89.0041 19.2787 88.6074 19.106 88.0847 19.106C87.5434 19.106 87.1234 19.2833 86.8247 19.638C86.5261 19.9927 86.3767 20.5107 86.3767 21.192V25H85.0607V14.92ZM93.7048 25.084C93.4528 25.084 93.2381 24.9953 93.0608 24.818C92.8834 24.6407 92.7948 24.426 92.7948 24.174C92.7948 23.9127 92.8834 23.6933 93.0608 23.516C93.2381 23.3387 93.4528 23.25 93.7048 23.25C93.9568 23.25 94.1714 23.3387 94.3488 23.516C94.5261 23.6933 94.6148 23.9127 94.6148 24.174C94.6148 24.426 94.5261 24.6407 94.3488 24.818C94.1714 24.9953 93.9568 25.084 93.7048 25.084ZM97.1774 25.084C96.9254 25.084 96.7107 24.9953 96.5334 24.818C96.3561 24.6407 96.2674 24.426 96.2674 24.174C96.2674 23.9127 96.3561 23.6933 96.5334 23.516C96.7107 23.3387 96.9254 23.25 97.1774 23.25C97.4294 23.25 97.6441 23.3387 97.8214 23.516C97.9987 23.6933 98.0874 23.9127 98.0874 24.174C98.0874 24.426 97.9987 24.6407 97.8214 24.818C97.6441 24.9953 97.4294 25.084 97.1774 25.084ZM100.65 25.084C100.398 25.084 100.183 24.9953 100.006 24.818C99.8287 24.6407 99.7401 24.426 99.7401 24.174C99.7401 23.9127 99.8287 23.6933 100.006 23.516C100.183 23.3387 100.398 23.25 100.65 23.25C100.902 23.25 101.117 23.3387 101.294 23.516C101.471 23.6933 101.56 23.9127 101.56 24.174C101.56 24.426 101.471 24.6407 101.294 24.818C101.117 24.9953 100.902 25.084 100.65 25.084Z" fill="white"/>--}}
{{--                <g opacity="0.6">--}}
{{--                    <path d="M25.1667 25.8333C28.8486 25.8333 31.8333 22.8486 31.8333 19.1667C31.8333 15.4848 28.8486 12.5 25.1667 12.5C21.4848 12.5 18.5 15.4848 18.5 19.1667C18.5 22.8486 21.4848 25.8333 25.1667 25.8333Z" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                    <path d="M33.5 27.4999L29.875 23.8749" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                </g>--}}
{{--            </svg>--}}
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
                    .custom-width
                    {width: 66.67% !important;}
                    .custom-width-2
                    {
                        width: 33.33% !important;
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
                .search-input::placeholder
                {
                    font-size:8px !important;
                }
            </style>
            <div class="search-bar-upper mx-2 d-lg-block d-md-none col-5">
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
                            <path d="M9.7528 22.7648C8.96447 21.0964 8.51168 19.2749 8.42901 17.4038H8.66385C8.78818 17.4038 8.91205 17.419 9.03268 17.4492L13.934 18.6745C13.9645 19.4164 14.0576 19.7987 14.2672 20.2253C14.6622 21.0293 14.4967 22.1368 13.5848 22.6579L12.1342 23.4868C11.3089 23.9584 10.1921 23.6945 9.7528 22.7648Z" fill="white"/>
                            <path d="M21.4078 18.9968L13.9303 17.1274L9.78906 16.0921V5.96537L21.4078 3.0607C22.0812 2.89235 22.7434 3.08553 23.2146 3.49996C23.5715 3.81382 23.8189 4.25458 23.8788 4.76131C23.8881 4.8397 23.8929 4.91966 23.8929 5.00099L23.8929 17.0565C23.8929 17.7071 23.5872 18.2711 23.1237 18.6329C22.6602 18.9948 22.0389 19.1546 21.4078 18.9968Z" fill="white"/>
                            <path d="M8.28906 6.15372H7.875C5.18262 6.15372 3.00001 8.33632 3 11.0287C3 13.7211 5.18264 15.9038 7.87507 15.9038H8.28906V6.15372Z" fill="white"/>
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
                    <a class="nav-link dropdown-toggle dropdown-toggle-end hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar">
                            <img src="{{ !isset(auth()->user()->photo) ? 'https://d19000.setshape.com/crmdocs/user-profile-default.svg' :  ((auth()->user()->is_photo ==1) ? asset('/uploads/users/'.auth()->user()->photo) : auth()->user()->photo)  }}" alt class="rounded-circle profileauto" style="width: 42px !important; height: 42px !important;" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            {{-- <a class="dropdown-item" href="{{route('profile.edit')}}"> --}}
                            <a class="dropdown-item" href="https://d19000.setshape.com/profile/{{ auth()->user()->shape_user_id }}?tab=personal-info">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="{{ !isset(auth()->user()->photo) ? 'https://d19000.setshape.com/crmdocs/user-profile-default.svg' :  ((auth()->user()->is_photo ==1) ? asset('/uploads/users/'.auth()->user()->photo) : auth()->user()->photo)  }}" alt class="h-auto rounded-circle profileauto" style="width: 42px !important; height: 42px !important;" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{Auth()->user()->name}}</span>
                                        <small class="text-muted">{{Auth()->user()->roles()->first()->name}}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            {{-- <a class="dropdown-item" href="{{route('profile.edit')}}"> --}}
                            <a class="dropdown-item" href="https://d19000.setshape.com/profile/{{ auth()->user()->shape_user_id }}?tab=personal-info">
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
@push('script')
    <script>
        (function($){
            $(window).on("load",function(){
                $(".dropdown-inner").mCustomScrollbar({
                    theme:"minimal-dark",
                    scrollButtons:{
                        enable:true
                    }
                });
            });
        })(jQuery);
    </script>
    @if(request()->is('editor') || request()->is('editor/*') || request()->is('co-branding') || request()->is('co-branding/*'))
        <script>
            $(document).ready(function() {
                // Quick toggle to fix initial position

                // Handle click event on dropdown toggle
                $('.navbar-nav .dropdown-toggle').on('click', function() {
                    var $dropdownMenu = $(this).next('.dropdown-menu');
                    var isOpen = $dropdownMenu.is(':visible');

                    // Close all other open dropdowns
                    $('.navbar-nav .dropdown-menu').not($dropdownMenu).hide();
                    $('.navbar-nav .dropdown-toggle').removeClass('rotated');

                    // Toggle the display of the dropdown menu
                    if (!isOpen) {
                        $dropdownMenu.stop(true, true).fadeIn('fast').show();
                        $(this).addClass('rotated');
                    } else {
                        $dropdownMenu.hide();
                        $(this).removeClass('rotated');
                    }
                });

                // Close dropdown menus when clicking outside
                $(document).on('click', function(event) {
                    var isClickInside = $('.navbar-nav').has(event.target).length > 0;
                    if (!isClickInside) {
                        $('.navbar-nav .dropdown-menu').hide();
                        $('.navbar-nav .dropdown-toggle').removeClass('rotated');
                    }
                });

                // Rotate dropdown toggle icon on hover
                $('.navbar-nav .dropdown-toggle').on('mouseenter', function() {
                    $(this).addClass('hovered');
                }).on('mouseleave', function() {
                    $(this).removeClass('hovered');
                });
            });
        </script>



    @else
        <script>
            $(document).ready(function() {
                // Handle click event on dropdown toggle
                $('.navbar-nav .dropdown-toggle').on('click', function() {
                    var $dropdownMenu = $(this).next('.dropdown-menu');
                    var isOpen = $dropdownMenu.is(':visible');

                    // Close all other open dropdowns
                    $('.navbar-nav .dropdown-menu').not($dropdownMenu).slideUp('fast');
                    $('.navbar-nav .dropdown-toggle').removeClass('rotated');

                    // Toggle the display of the dropdown menu
                    if (!isOpen) {
                        $dropdownMenu.stop(true, true).fadeIn('fast').slideDown('fast');
                        $(this).addClass('rotated');
                    } else {
                        $dropdownMenu.slideUp('fast');
                        $(this).removeClass('rotated');
                    }
                });

                // Close dropdown menus when clicking outside
                $(document).on('click', function(event) {
                    var isClickInside = $('.navbar-nav').has(event.target).length > 0;
                    if (!isClickInside) {
                        $('.navbar-nav .dropdown-menu').slideUp('fast');
                        $('.navbar-nav .dropdown-toggle').removeClass('rotated');
                    }
                });

                // Rotate dropdown toggle icon on hover
                $('.navbar-nav .dropdown-toggle').on('mouseenter', function() {
                    $(this).addClass('hovered');
                }).on('mouseleave', function() {
                    $(this).removeClass('hovered');
                });
            });
        </script>
    @endif




@endpush
