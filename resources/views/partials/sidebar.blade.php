<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="https://pbs.twimg.com/profile_images/1469866962645880834/-uD_orAt_normal.jpg" class="rounded-full" alt="mingo" height="22" width="32">
      </span>
      <span class="app-brand-text demo menu-text fw-bold">Pacmoon</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item">
      <a href="{{route('home')}}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-home"></i>
        <div data-i18n="Dashboards">Dashboards</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{route('points.index')}}" class="menu-link {{request()->segment(1)=="points" ? 'active' : ''}}">
        <i class="menu-icon tf-icons ti ti-star"></i>
        <div data-i18n="Points">Points</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{route('quests.index')}}" class="menu-link {{request()->segment(1)=="quests" ? 'active' : ''}}">
        <i class="menu-icon tf-icons ti ti-shield-question"></i>
        <div data-i18n="Quests">Quests</div>
      </a>
    </li>
  </ul>
</aside>