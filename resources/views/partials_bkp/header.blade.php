 <!-- Navbar -->
 <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
     <div class="container-xxl">
         <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
             <a href="index.html" class="app-brand-link gap-2">
                 <span class="app-brand-logo demo">
                     <?xml version="1.0" encoding="UTF-8"?><svg id="a" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 75.4 75">
                         <defs>
                             <style>
                                .c {
                                    fill: url(#b);
                                }
                                .d {
                                    fill: #ff7043;
                                }
                             </style>
                             <linearGradient id="b" x1="-1.68" y1="13.6" x2="32.59" y2="47.86" gradientTransform="translate(0 76) scale(1 -1)" gradientUnits="userSpaceOnUse">
                                 <stop offset="0" stop-color="#ff7043" />
                                 <stop offset=".22" stop-color="#ff643c" />
                                 <stop offset=".6" stop-color="#ff462a" />
                                 <stop offset="1" stop-color="#ff2114" />
                             </linearGradient>
                         </defs>
                         <path class="d" d="M10.2,74.27h0C24.22,51.5,24.22,22.77,10.2,0h0s56.75,37.14,56.75,37.14L10.2,74.27Z" />
                         <path class="c" d="M37.13,56.65c5.75-3.76,6.92-11.71,2.5-16.97L15.89,11.44h0c7.96,20.45,6.07,43.74-5.69,62.83l26.93-17.62h0Z" />
                     </svg>
                 </span>
                 <span class="app-brand-text demo menu-text fw-bold">Shape</span>
             </a>
             <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                 <i class="ti ti-x ti-sm align-middle"></i>
             </a>
         </div>
         <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
             <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                 <i class="ti ti-menu-2 ti-sm"></i>
             </a>
         </div>
         <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
             <ul class="navbar-nav flex-row align-items-center ms-auto">
                 <li class="nav-item navbar-dropdown dropdown-user dropdown">
                     <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                         <div class="avatar avatar-online">
                             <img src="{{ asset('backend/img/avatars/1.png') }}" alt class="h-auto rounded-circle" />
                         </div>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end">
                         <li>
                             <a class="dropdown-item" href="pages-account-settings-account.html">
                                 <div class="d-flex">
                                     <div class="flex-shrink-0 me-3">
                                         <div class="avatar avatar-online">
                                             <img src="{{ asset('backend/img/avatars/1.png') }}" alt class="h-auto rounded-circle" />
                                         </div>
                                     </div>
                                     <div class="flex-grow-1">
                                         <span class="fw-medium d-block">John Doe</span>
                                         <small class="text-muted">Admin</small>
                                     </div>
                                 </div>
                             </a>
                         </li>
                         <li>
                             <div class="dropdown-divider"></div>
                         </li>
                         <li>
                             <a class="dropdown-item" href="pages-profile-user.html">
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
             <input type="text" class="form-control search-input border-0" placeholder="Search..." aria-label="Search..." />
             <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
         </div>
     </div>
 </nav>
 <!-- / Navbar -->
