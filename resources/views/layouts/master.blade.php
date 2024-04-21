<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer">

@include('partials.head')

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      @include('partials.sidebar')
      <div class="layout-page">
        @include('partials.navbar')
        <div class="content-wrapper" id="app">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  @include('partials.scripts')

  @vite(['resources/js/app.js'])
</body>

</html>