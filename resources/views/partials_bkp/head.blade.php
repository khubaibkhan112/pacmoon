<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta charset="utf-8" />
<title>Shape CMS</title>
<meta charset="UTF-8" />
<link rel="shortcut icon" href="https://d19000.setshape.com/favicon.ico">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet" />

<meta name="description" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="main_url" content="{{route('home')}}" />

{{-- Palleon CSS --}}
<link href="{{ asset('palleon/css/style.css') }}" rel="stylesheet" type="text/css" />

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico" />
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
<!-- Icons -->
<link rel="stylesheet" href="{{ asset('backend/vendor/fonts/fontawesome.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/fonts/tabler-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/fonts/flag-icons.css') }}" />


<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
<!-- Core CSS -->
<link rel="stylesheet"href="{{ asset('backend/vendor/css/rtl/core.css') }}" class="template-customizer-core-css">
<link rel="stylesheet"href="{{ asset('backend/vendor/css/rtl/theme-default.css') }}"
    class="template-customizer-theme-css">
<link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}">
<!-- Vendors CSS -->

<link rel="stylesheet" href="{{ asset('backend/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/dropzone/dropzone.css')}}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/node-waves/node-waves.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/swiper/swiper.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/toastr/toastr.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<!-- Page CSS -->
<link rel="stylesheet" href="{{ asset('backend/vendor/css/pages/cards-advance.css') }}" />
{{-- Custom Style  --}}
<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

<!-- Helpers -->
<script src="{{ asset('backend/vendor/js/helpers.js') }}"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<script src="{{ asset('backend/vendor/js/template-customizer.js') }}"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('backend/js/config.js') }}"></script>
<script src="{{ asset('backend/js/jsPDF.js') }}"></script>
<link rel="stylesheet" href="{{asset('backend/css/jquery.mCustomScrollbar.css')}}" />
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
