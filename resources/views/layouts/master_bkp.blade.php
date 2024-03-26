<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('backend') }}/" data-template="horizontal-menu-template">

<head>
    <!-- BEGIN: Head-->
    @include('partials.head')
    @stack('css')
    <!-- END: Head-->
</head>
<!-- BEGIN: Body-->

<body>

<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">       
        @include('partials.sidebar')
        <div class="layout-page">
            <!-- Content wrapper -->
            <div class="content-wrapper">

                @yield('content')
              
                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>
    </div>
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
<div class="drag-target" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
@include('partials.script')
@stack('script')
<div id="template-customizer" class="invert-bg-white" style="visibility: visible"> <a href="javascript:void(0)" class="template-customizer-open-btn" tabindex="-1"></a> </div>
</body>
<!-- END: Body-->

</html>
