<style>
    .nav-custom {
        overflow: scroll;
        /* Enable scrolling */
        /* Hide scrollbar for Chrome, Safari, and Opera */
        scrollbar-width: thin;
        /* Hide scrollbar for Firefox */
        scrollbar-color: transparent transparent;
        height: calc(100vh - 70px) !important;
    }

    .accordion-item:hover {
        cursor: pointer;
    }

    .nav-custom::-webkit-scrollbar {
        width: 0;
        /* Set the width of scrollbar to zero */
        height: 0;
        /* Set the height of scrollbar to zero */
    }

    .nav-custom li {
        margin: 4px 0;
        /* Margin on the top and bottom */
        border-radius: 4px;
        /* Rounded corners */
        transition: background-color 0.3s;
        /* Smooth transition effect */
    }

    /* Hover effect for list items */
    .nav-custom li:hover {
        background-color: #eeeeee;
        /* Grey background on hover */
    }

    .special-ul:hover {
        background-color: #f6f7f8;
    }

    .accordion-item {
        position: relative;

    }

    .text-shape {
        color: #ff7034 !important;
    }

    .accordion-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    .accordion-divider {
        position: absolute;
        top: 45px !important;
        bottom: 20px;
        left: 22px !important;
        /* Adjust this value according to your design */
        width: 0.1px !important;
        background-color: rgba(238, 238, 238, 0.51);
        z-index: 10;

    }

    .accordion-divider-top {
        left: 31px !important;
        top: 20px !important;
        bottom: 38px !important;
    }

    .accordion-body {
        padding-left: 40px;
        /* Adjust this value according to your design */
    }

    .accordion-body ul.list-unstyled {
        font-size: 12px;
        /* Adjust font size of sub-items */
    }

    .accordion-button:hover .ti,
    .accordion-button:hover span,
    .accordion-button:not(.collapsed) span,
    .accordion-button:not(.collapsed) .ti {
        color: #ff7034 !important;
        /* Change the color to orange on hover and when active */
    }

    .navbar-search-suggestion {
        display: none !important;
    }

    .search-bar {
        position: relative;
    }
    .search-bar input{
        display: block;
        position: relative;
        padding: 9px 10px 9px 46px;
        background-color: #FFFFFF;
        color: #919191;
        font-size: 14px;
        font-weight: 400;
        line-height: 21px;
        border: 1px solid #eaeef5;
        outline: none;
        -webkit-border-radius: 6px 6px 6px 6px;
        -moz-border-radius: 6px 6px 6px 6px;
        -ms-border-radius: 6px 6px 6px 6px;
        -o-border-radius: 6px 6px 6px 6px;
        border-radius: 6px 6px 6px 6px;
        -webkit-transition: all .4s ease-out;
        -moz-transition: all .4s ease-out;
        -ms-transition: all .4s ease-out;
        -o-transition: all .4s ease-out;
        transition: all .4s ease-out;
    }

    .search-icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #aaa;
        transition: color 0.3s;
        /* Add transition for color change */
        z-index: 10;
    }

    .search-input {
        padding-left: 30px;
        /* Adjust this value as needed */
    }

    .card-serach {
        padding-left: 30px;
        /* Adjust this value as needed */
    }

    .left-search {
        padding-left: 30px;
        /* Adjust this value as needed */
    }

    .search-input:focus~.search-icon {
        color: blue;
        /* Change color when input is focused */
    }

    .custom-menu-text {

        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 19px;

        color: #263238;
    }

    .selected {
        background-color: #f6f7f8 !important;
    }

    .nav-custom {
        scrollbar-width: thin;
        scrollbar-color: #e8e8e8 white;
        border-right: 1px solid #f0f0f0;
    }

    .nav-custom::-webkit-scrollbar-thumb {
        border-radius: 20px;
    }

    .custom-tab-heading
    {


        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 19px;
        align-items: center;
        color: #263238;
    }
    .inner-divider
    {
        top: 50px !important;
        bottom: 20px;
        left:3px !important;
    }
    .menu-link:hover svg path,.menu-link:hover svg rect,.accordion-button:hover svg path,.accordion-button:not(.collapsed) svg path
    {

        stroke:#ff7034;
    }
    .menu-link-filled:hover svg path,.menu-link-filled:hover svg rect
    {
        fill:#ff7034;
        stroke:#ff7034;
    }
    .menu-link:hover span,.menu-link.selected
    {
        color:#ff7034 !important;
    }
    .catName,.catNameDrop
    {
        font-size: 14px;
        font-weight: 500;
        color: #78889b;
        margin: 0px 3px !important;
        padding: 10px 0 10px 4px !important;
    }
    .accordion-item.inner
    {
        padding: 25px 0 25px 5px;
        margin-left: 5px;
    }
    .accordion-item.selected .catName
    {
        color: #263238;
    }
    .accordion-item.inner:hover .catName

    {
        background-color: #f6f7f8 !important;
    }
    .accordion-item.inner:hover .catNameDrop,  .accordion-item.inner:hover .catName
    {
        color: #263238;
    }

    .special-ul
    {
        font-weight: 500;
        padding:10px 15px 10px 5px;
        margin-left:15px;
    }
    .special-ul:hover
    {
        color: #263238;
        font-weight:600;
    }

    .menu-link.active span
    {
        color:#ff7034 !important;
    }
    .menu-link.active svg path,.menu-link.active svg rect
    {
        stroke:#ff7034 !important;
    }
    .menu-link-filled.active svg path
    {
        stroke:#ff7034 !important;
        fill: #ff7034 !important;
    }
    .accordion-item:hover > .catName
    {
        color: #263238 !important;
    }
</style>
<div class="nav-custom d-flex flex-column justify-content-between" style="overflow-y:scroll; margin-top: 70px;">
    <div class="" style="overflow-x: hidden;padding:30px 28px 30px 32px;">
        <div class="col-12">
            <div class="search-bar mx-2">
                <i class="tf-icons ti ti-search search-icon"></i>
                <input type="text" class="form-control left-search" oninput="searchMenu(this.value)"
                       placeholder="Search...">
                {{-- <input type="text" class="form-control search-input" placeholder="Search..." oninput="searchMenu(this)"> --}}
            </div>
        </div>
        <div class="col-12">
            <hr style="border-color: #eeeeee !important;">
        </div>
        <div class="col-12 align-items-center">
            <div class="menu-link d-flex flex-row align-items-center mt-2 @if (request()->is('template_admin/my-templates')) active @endif"
                 style="padding:8px 0 8px 10px !important; margin-right: 40px !important; border-radius: 8px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <rect width="6" height="8" transform="matrix(1 0 0 -1 4 20)" stroke="#78889B"
                          stroke-width="1.7" stroke-linecap="square" />
                    <rect width="6" height="4" transform="matrix(1 0 0 -1 4 8)" stroke="#78889B"
                          stroke-width="1.7" stroke-linecap="square" />
                    <rect width="6" height="4" transform="matrix(1 0 0 -1 14 20)" stroke="#78889B"
                          stroke-width="1.7" stroke-linecap="square" />
                    <rect width="6" height="8" transform="matrix(1 0 0 -1 14 12)" stroke="#78889B"
                          stroke-width="1.7" stroke-linecap="square" />
                </svg>
                <div>
                    <a href="{{ route('admin.template.index', ['cat_id' => 'my-templates']) }}"
                       class="{{ $category_id == 'my-templates' ? 'text-shape' : 'text-dark' }}">
                        <span class="custom-menu-text cursor-pointer" style="margin-left: 15px !important;">My
                            Templates</span>
                    </a>
                </div>
            </div>
            <div class="menu-link d-flex flex-row align-items-center mt-2 "
                 style="padding:8px 0 8px 10px !important; margin-right: 40px !important; border-radius: 8px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.368 4.15137V17.6133H2.63196V4.15137H8.552" stroke="#78889B" stroke-width="1.8"
                          stroke-linecap="square" />
                    <path d="M9.0022 17.6133H14.9976L16.4976 21.0977H7.5022L9.0022 17.6133Z" stroke="#78889B"
                          stroke-width="1.8" stroke-linecap="square" />
                    <path
                        d="M14.5522 3.71333C15.4044 2.86541 16.7821 2.86715 17.6322 3.71722V3.71722C18.4821 4.56714 18.4841 5.94456 17.6365 6.79684L11.2801 13.1885L8.16081 13.1885V10.0726L14.5522 3.71333Z"
                        stroke="#78889B" stroke-width="1.8" stroke-linecap="square" />
                    <path d="M13.5925 5.08101L16.4926 7.98112" stroke="#78889B" stroke-width="1.8"
                          stroke-linecap="square" />
                </svg>

                <div>
                    <a href="{{ route('editor.index') }}" class="text-dark">
                        <span class="custom-menu-text cursor-pointer" style="margin-left: 15px !important;">Build Your
                            Own Content</span>
                    </a>
                </div>

            </div>
            <div class="menu-link d-flex flex-row align-items-center mt-2 {{ $category_id == 'favourites' ? 'active' : '' }}"
                 style="padding:8px 0 8px 10px !important; margin-right: 40px !important; border-radius: 8px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.42223 5.52801C3.48484 7.46987 3.56744 10.7692 5.42229 13.5385C7.27714 16.3077 12.5 20 12.5 20C12.5 20 17.7227 16.3077 19.5777 13.2308C21.4326 10.1538 21.5151 7.46987 19.5778 5.52801C17.637 3.58274 14.5449 3.49483 12.5 5.26425C10.4551 3.49483 7.36301 3.58274 5.42223 5.52801Z"
                        stroke="#78889B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <div>

                    <a href="{{ route('admin.template.index', ['cat_id' => 'favourites']) }}"
                       class="{{ $category_id == 'favourites' ? 'text-shape' : 'text-dark' }}"><span
                            class="custom-menu-text cursor-pointer" style="margin-left: 15px !important;">My
                            Favourites</span></a>

                </div>
            </div>
            <div class="menu-link menu-link-filled d-flex flex-row align-items-center mt-2 @if (request()->is('template_admin/popular')) active @endif"
                 style="padding:8px 0 8px 10px !important; margin-right: 40px !important; border-radius: 8px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.7576 3.4967C11.1434 2.83443 12.1001 2.83443 12.4858 3.4967L14.6328 7.18273C14.7741 7.42533 15.0108 7.59736 15.2852 7.65678L19.4543 8.55958C20.2034 8.72178 20.499 9.63171 19.9883 10.2032L17.1462 13.3841C16.9591 13.5935 16.8687 13.8718 16.8969 14.1511L17.3266 18.3951C17.4038 19.1576 16.6298 19.72 15.9285 19.4109L12.025 17.6908C11.7681 17.5776 11.4754 17.5776 11.2185 17.6908L7.315 19.4109C6.61366 19.72 5.83963 19.1576 5.91683 18.3951L6.34653 14.1511C6.37482 13.8718 6.28438 13.5935 6.09731 13.3841L3.25512 10.2032C2.74447 9.63171 3.04012 8.72178 3.78917 8.55958L7.95823 7.65678C8.23263 7.59736 8.4694 7.42533 8.6107 7.18273L10.7576 3.4967Z"
                        fill="#78889B" />
                </svg>
                <div>
                    <a href="{{ route('admin.template.index', ['cat_id' => 'popular']) }}"
                       class="{{ $category_id == 'popular' ? 'text-shape' : 'text-dark' }}"><span
                            class="custom-menu-text cursor-pointer" style="margin-left: 15px !important;">Most Popular
                            Templates</span></a>
                </div>
            </div>
            {{--        <div class="accordion mt-3" id="accordionMenu1"> --}}
            {{--            <div class="accordion-item" data-bs-toggle="collapse" data-bs-target="#collapse-new"> --}}
            {{--                <div class="accordion-divider"></div> --}}
            {{--                <div class="accordian-header"> --}}

            {{--                </div> --}}
            {{--                <div id="collapse-new" class="accordion-collapse collapse"> --}}
            {{--                    <div class="accordion"> --}}
            {{--                        <div class="accordion-item" data-bs-toggle="collapse" data-bs-target="#collapse-inner"> --}}
            {{--                            <div class="accordion-divider"></div> --}}
            {{--                            new new --}}
            {{--                        </div> --}}
            {{--                        <div class="accordion-collapse collapse" id="collapse-inner"> --}}
            {{--                            inner --}}
            {{--                        </div> --}}
            {{--                    </div> --}}
            {{--                </div> --}}
            {{--            </div> --}}


            {{--        </div> --}}
        </div>
        <div class="col-12">
            <div class="accordion" id="accordionMenu">

                <div
                    class="accordion-item {{ !in_array($category_id, ['popular', 'favourites', 'my-designs']) ? 'active ' : '' }} accordion-main">
                    <div class="accordion-divider"></div> <!-- Vertical Divider -->
                    <div class="accordion-header" id="heading-all">
                        <button
                            class="accordion-button {{ !in_array($category_id, ['popular', 'favourites', 'my-designs']) ? '' : 'collapsed' }}"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapse-all"
                            aria-expanded=" {{ !in_array($category_id, ['popular', 'favourites', 'my-designs']) ? 'true' : 'false' }}"
                            aria-controls="collapse-all"
                            style="padding: 24px 0 0 10px !important;">
                            <svg style="margin-top: -3px;" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.5 4H9.5L13 6.5H21.5V20H2.5V4Z" stroke="#78889B" stroke-width="1.7" />
                                <path d="M2.5 9H9.5L13 6.5H18.5" stroke="#78889B" stroke-width="1.7"
                                      stroke-linejoin="round" />
                            </svg>

                            <span class="custom-tab-heading" style="margin-left: 15px;">All Templates</span>
                        </button>
                    </div>
                    <div id="collapse-all"
                         class="accordion-collapse {{ !in_array($category_id, ['popular', 'favourites', 'my-designs']) ? 'show' : '' }} collapse"
                         aria-labelledby="heading-all" data-bs-parent="#accordionMenu-collapse">
                        <div class="accordion-body">
                            <ul class="list-unstyled mb-0">
                                {{-- <div class="accordion-divider"></div>
                                <div id="collapse-allcat" class="accordion-collapse collapse {{ $category_id == 'all' ? 'show' : '' }}" aria-labelledby="heading-all" data-bs-parent="#heading-all" >
                                    <a href="{{ route('admin.template.index', ['cat_id' => 'all']) }}" class="{{ $category_id == 'all' ? 'text-shape' : 'text-dark' }}">
                                        <ul class="{{ $category_id == 'all' ? 'selected special-ul pt-2 pb-2 mb-1 mt-1' : 'pt-2 pb-2 mb-1 mt-1 special-ul' }}">
                                            Browse All
                                        </ul>
                                    </a>
                                </div> --}}
                                <a href="{{ route('admin.template.index', ['cat_id' => 'all']) }}">
                                    <div class="accordion parentAccord" id="categoryMenu_allcat">
                                        <div class="accordion-divider"></div>
                                        <ul class= "accordion-item inner p-0 m-0 " style=" margin-left: 5px;">
                                            <div class="catName border-2 {{ $category_id == 'all' ? 'text-shape' : '' }}">
                                                Browse All
                                            </div>
                                        </ul>

                                    </div>
                                </a>

                                @foreach ($categories as $category)
                                    <div class="accordion parentAccord" id="categoryMenu{{ $category->id }}">
                                        <div class="accordion-divider"></div>
                                        <ul class= "accordion-item inner p-0 m-0" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $category->id }}" aria-expanded="false"
                                            aria-controls="collapse{{ $category->id }}">
                                            <div class="catName catNameDrop border-2">
                                                {{ $category->title }}
                                            </div>
                                            <div id="collapse{{ $category->id }}"
                                                 class="accordion-collapse collapse {{ $category_id == $category->id ? 'show' : '' }}"
                                                 aria-labelledby="heading{{ $category->id }}"
                                                 data-bs-parent="#categoryMenu{{ $category->id }}">
                                                <a href="{{ route('admin.template.index', ['cat_id' => $category->id]) }}"
                                                   class="{{ $category_id == $category->id && $sub_category_id == '' ? 'text-shape' : 'text-dark' }}">
                                                    <ul
                                                        class="{{ $category_id == $category->id && $sub_category_id ? 'selected special-ul pt-2 pb-2 mb-1 mt-1 ml-1' : 'pt-2 pb-2 mb-1 mt-1 ml-1 special-ul' }}">
                                                        Browse All
                                                    </ul>
                                                </a>
                                            </div>
                                            @foreach ($category->sub_categories as $sub_category)
                                                <div class="accordion-divider inner-divider"></div>
                                                <div id="collapse{{ $category->id }}"
                                                     class="accordion-collapse collapse {{ $category_id == $category->id ? 'show' : '' }}"
                                                     aria-labelledby="heading{{ $category->id }}"
                                                     data-bs-parent="#categoryMenu{{ $category->id }}">
                                                    <a href="{{ route('admin.template.index', ['cat_id' => $category->id, 'sub_cat_id' => $sub_category->id]) }}"
                                                       class="{{ $sub_category_id == $sub_category->id ? 'text-shape' : 'text-dark' }}">
                                                        <ul
                                                            class="{{ $sub_category_id == $sub_category->id ? 'selected border-2 special-ul pt-2 pb-2 mb-1 mt-1 ml-3' : 'pt-2 pb-2 mb-1 mt-1 border-2 special-ul ml-3' }}">
                                                            {{ $sub_category->name }}
                                                        </ul>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </ul>

                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="setting-panel" style="position: absolute; bottom: 0; width: 100%;z-index: 100;background: white;padding-right: 30px;padding-left:30px;">
        <hr style="border-color: #eeeeee !important;margin: 0 30px 0 0;">
        <div class="accordion" id="accordionMenu-settings">
            <div class="col-12">
                <div class="d-flex flex-row align-items-center mt-2 @if (request()->is('/designs')) selected @endif"
                    style="padding:8px 0 8px 10px !important; margin-right: 40px !important; border-radius: 8px;">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12.9994" cy="13.0001" r="3.71429" stroke="#78889B" stroke-width="1.5"
                            stroke-linejoin="round" />
                        <path
                            d="M10.5744 23.5932L10.4077 24.3244L10.5744 23.5932ZM20.9558 20.3989L20.4067 19.8881L20.9558 20.3989ZM23.387 16.1951L24.1039 16.4153L23.387 16.1951ZM23.3869 9.80468L22.6699 10.025L23.3869 9.80468ZM20.9556 5.60105L21.5047 5.09017L20.9556 5.60105ZM10.5742 2.407L10.7409 3.13823L10.5742 2.407ZM5.04269 5.60191L5.59184 6.11273L5.04269 5.60191ZM2.61257 16.1964L1.89567 16.4168L2.61257 16.1964ZM2.61269 9.80331L1.8958 9.58293L2.61269 9.80331ZM15.4269 23.5927L15.26 22.8615L15.4269 23.5927ZM15.4271 2.40749L15.5939 1.67629L15.4271 2.40749ZM5.04252 20.3981L4.49336 20.9089L5.04252 20.3981ZM1.89567 16.4168C2.41705 18.1131 3.31592 19.643 4.49336 20.9089L5.59168 19.8872C4.5652 18.7837 3.78291 17.4513 3.32947 15.9761L1.89567 16.4168ZM2.18564 10.452C3.91542 11.71 3.91542 14.2893 2.18564 15.5474L3.0679 16.7605C5.62134 14.9034 5.62134 11.096 3.0679 9.23892L2.18564 10.452ZM4.49354 5.09109C3.31611 6.35688 2.41723 7.88672 1.8958 9.58293L3.32959 10.0237C3.78306 8.54851 4.56536 7.21623 5.59184 6.11273L4.49354 5.09109ZM9.79939 2.36094C9.5748 4.48798 7.34107 5.77763 5.3867 4.9086L4.77725 6.27921C7.66222 7.56203 10.9596 5.65831 11.2911 2.51844L9.79939 2.36094ZM12.9996 1.38528C12.1094 1.38528 11.2417 1.48557 10.4075 1.67576L10.7409 3.13823C11.4665 2.9728 12.2223 2.88528 12.9996 2.88528L12.9996 1.38528ZM15.5939 1.67629C14.7591 1.48575 13.8906 1.38528 12.9996 1.38528L12.9996 2.88528C13.7775 2.88528 14.534 2.97296 15.2602 3.13868L15.5939 1.67629ZM20.6138 4.90818C18.6594 5.7772 16.4257 4.48755 16.2011 2.36051L14.7094 2.51801C15.0409 5.65788 18.3382 7.5616 21.2232 6.27878L20.6138 4.90818ZM24.1038 9.5844C23.5823 7.88719 22.6829 6.3565 21.5047 5.09017L20.4066 6.11193C21.4337 7.2159 22.2164 8.54892 22.6699 10.025L24.1038 9.5844ZM23.8144 15.5474C22.0846 14.2893 22.0846 11.71 23.8144 10.452L22.9321 9.23892C20.3787 11.096 20.3787 14.9034 22.9321 16.7605L23.8144 15.5474ZM21.5049 20.9098C22.6831 19.6434 23.5825 18.1126 24.1039 16.4153L22.6701 15.9748C22.2166 17.4509 21.4339 18.784 20.4067 19.8881L21.5049 20.9098ZM16.2011 23.6395C16.4257 21.5124 18.6594 20.2228 20.6138 21.0918L21.2232 19.7212C18.3382 18.4384 15.0409 20.3421 14.7094 23.482L16.2011 23.6395ZM12.9996 24.6149C13.8905 24.6149 14.7589 24.5144 15.5938 24.3239L15.26 22.8615C14.5339 23.0272 13.7775 23.1149 12.9996 23.1149L12.9996 24.6149ZM10.4077 24.3244C11.2418 24.5146 12.1094 24.6149 12.9996 24.6149L12.9996 23.1149C12.2224 23.1149 11.4666 23.0274 10.7411 22.862L10.4077 24.3244ZM5.3867 21.0914C7.34107 20.2224 9.5748 21.512 9.79939 23.6391L11.2911 23.4816C10.9596 20.3417 7.66222 18.438 4.77725 19.7208L5.3867 21.0914ZM10.7411 22.862C11.0393 22.9299 11.2593 23.18 11.2911 23.4816L9.79939 23.6391C9.83463 23.9728 10.078 24.2493 10.4077 24.3244L10.7411 22.862ZM20.4067 19.8881C20.616 19.6631 20.9442 19.5972 21.2232 19.7212L20.6138 21.0918C20.9183 21.2273 21.2766 21.1552 21.5049 20.9098L20.4067 19.8881ZM22.9321 16.7605C22.6865 16.5818 22.5805 16.2664 22.6701 15.9748L24.1039 16.4153C24.2029 16.0932 24.0858 15.7448 23.8144 15.5474L22.9321 16.7605ZM22.6699 10.025C22.5803 9.73323 22.6863 9.41768 22.9321 9.23892L23.8144 10.452C24.0857 10.2547 24.2027 9.90635 24.1038 9.5844L22.6699 10.025ZM21.2232 6.2788C20.9441 6.40286 20.6159 6.3369 20.4066 6.11193L21.5047 5.09017C21.2764 4.84479 20.9183 4.77277 20.6138 4.90816L21.2232 6.2788ZM11.2911 2.51845C11.2592 2.82014 11.0392 3.07022 10.7409 3.13823L10.4075 1.67576C10.0779 1.75092 9.83462 2.02729 9.79939 2.36093L11.2911 2.51845ZM5.59184 6.11273C5.38303 6.33721 5.05555 6.40296 4.77725 6.27921L5.3867 4.9086C5.08148 4.77288 4.72243 4.84503 4.49354 5.09109L5.59184 6.11273ZM3.32947 15.9761C3.41896 16.2672 3.31313 16.5821 3.0679 16.7605L2.18565 15.5474C1.91377 15.7451 1.7965 16.0941 1.89567 16.4168L3.32947 15.9761ZM3.0679 9.23892C3.31326 9.41736 3.41913 9.7324 3.32959 10.0237L1.8958 9.58293C1.79666 9.90544 1.91387 10.2544 2.18565 10.452L3.0679 9.23892ZM14.7094 23.482C14.7413 23.18 14.9615 22.9296 15.26 22.8615L15.5938 24.3239C15.9229 24.2488 16.1659 23.9727 16.2011 23.6395L14.7094 23.482ZM15.2602 3.13868C14.9615 3.07053 14.7413 2.82012 14.7094 2.51801L16.2011 2.36051C16.1659 2.02735 15.923 1.75139 15.5939 1.67629L15.2602 3.13868ZM4.77725 19.7208C5.05548 19.5971 5.38291 19.6628 5.59168 19.8872L4.49336 20.9089C4.7223 21.155 5.08142 21.2271 5.3867 21.0914L4.77725 19.7208Z"
                            fill="#78889B" />
                    </svg>
                    <div>

                        <a href="{{ route('designs.index') }}"
                            class="{{ request()->is('/designs') ? 'text-shape' : 'text-dark' }}">
                            <span class="custom-menu-text cursor-pointer"
                                style="margin-left: 15px !important;">Settings</span>
                        </a>
                    </div>
                </div>
                {{-- <div class="accordion" id="accordionMenu">
                        <div class="accordion-item">
                            <div id="collapse-settings" class="accordion-collapse collapse" aria-labelledby="heading-settings" data-bs-parent="#accordionMenu-settings" >
                                <div class="accordion-body">
                                    <ul class="list-unstyled mb-0">

                                        <ul class="'pt-2 pb-2 mb-0 mt-0">
                                            <a href="{{ route('profile.edit') }}" class="text-dark">settings</a>
                                        </ul>

                                    </ul>
                                </div>
                            </div>
                            <div class="accordion-divider"></div> <!-- Vertical Divider -->
                            <div class="accordion-header" id="heading-settings">
                                <button class="accordion-button collapsed" type="button" >
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12.9994" cy="13.0001" r="3.71429" stroke="#78889B" stroke-width="1.5" stroke-linejoin="round"/>
                                        <path d="M10.5744 23.5932L10.4077 24.3244L10.5744 23.5932ZM20.9558 20.3989L20.4067 19.8881L20.9558 20.3989ZM23.387 16.1951L24.1039 16.4153L23.387 16.1951ZM23.3869 9.80468L22.6699 10.025L23.3869 9.80468ZM20.9556 5.60105L21.5047 5.09017L20.9556 5.60105ZM10.5742 2.407L10.7409 3.13823L10.5742 2.407ZM5.04269 5.60191L5.59184 6.11273L5.04269 5.60191ZM2.61257 16.1964L1.89567 16.4168L2.61257 16.1964ZM2.61269 9.80331L1.8958 9.58293L2.61269 9.80331ZM15.4269 23.5927L15.26 22.8615L15.4269 23.5927ZM15.4271 2.40749L15.5939 1.67629L15.4271 2.40749ZM5.04252 20.3981L4.49336 20.9089L5.04252 20.3981ZM1.89567 16.4168C2.41705 18.1131 3.31592 19.643 4.49336 20.9089L5.59168 19.8872C4.5652 18.7837 3.78291 17.4513 3.32947 15.9761L1.89567 16.4168ZM2.18564 10.452C3.91542 11.71 3.91542 14.2893 2.18564 15.5474L3.0679 16.7605C5.62134 14.9034 5.62134 11.096 3.0679 9.23892L2.18564 10.452ZM4.49354 5.09109C3.31611 6.35688 2.41723 7.88672 1.8958 9.58293L3.32959 10.0237C3.78306 8.54851 4.56536 7.21623 5.59184 6.11273L4.49354 5.09109ZM9.79939 2.36094C9.5748 4.48798 7.34107 5.77763 5.3867 4.9086L4.77725 6.27921C7.66222 7.56203 10.9596 5.65831 11.2911 2.51844L9.79939 2.36094ZM12.9996 1.38528C12.1094 1.38528 11.2417 1.48557 10.4075 1.67576L10.7409 3.13823C11.4665 2.9728 12.2223 2.88528 12.9996 2.88528L12.9996 1.38528ZM15.5939 1.67629C14.7591 1.48575 13.8906 1.38528 12.9996 1.38528L12.9996 2.88528C13.7775 2.88528 14.534 2.97296 15.2602 3.13868L15.5939 1.67629ZM20.6138 4.90818C18.6594 5.7772 16.4257 4.48755 16.2011 2.36051L14.7094 2.51801C15.0409 5.65788 18.3382 7.5616 21.2232 6.27878L20.6138 4.90818ZM24.1038 9.5844C23.5823 7.88719 22.6829 6.3565 21.5047 5.09017L20.4066 6.11193C21.4337 7.2159 22.2164 8.54892 22.6699 10.025L24.1038 9.5844ZM23.8144 15.5474C22.0846 14.2893 22.0846 11.71 23.8144 10.452L22.9321 9.23892C20.3787 11.096 20.3787 14.9034 22.9321 16.7605L23.8144 15.5474ZM21.5049 20.9098C22.6831 19.6434 23.5825 18.1126 24.1039 16.4153L22.6701 15.9748C22.2166 17.4509 21.4339 18.784 20.4067 19.8881L21.5049 20.9098ZM16.2011 23.6395C16.4257 21.5124 18.6594 20.2228 20.6138 21.0918L21.2232 19.7212C18.3382 18.4384 15.0409 20.3421 14.7094 23.482L16.2011 23.6395ZM12.9996 24.6149C13.8905 24.6149 14.7589 24.5144 15.5938 24.3239L15.26 22.8615C14.5339 23.0272 13.7775 23.1149 12.9996 23.1149L12.9996 24.6149ZM10.4077 24.3244C11.2418 24.5146 12.1094 24.6149 12.9996 24.6149L12.9996 23.1149C12.2224 23.1149 11.4666 23.0274 10.7411 22.862L10.4077 24.3244ZM5.3867 21.0914C7.34107 20.2224 9.5748 21.512 9.79939 23.6391L11.2911 23.4816C10.9596 20.3417 7.66222 18.438 4.77725 19.7208L5.3867 21.0914ZM10.7411 22.862C11.0393 22.9299 11.2593 23.18 11.2911 23.4816L9.79939 23.6391C9.83463 23.9728 10.078 24.2493 10.4077 24.3244L10.7411 22.862ZM20.4067 19.8881C20.616 19.6631 20.9442 19.5972 21.2232 19.7212L20.6138 21.0918C20.9183 21.2273 21.2766 21.1552 21.5049 20.9098L20.4067 19.8881ZM22.9321 16.7605C22.6865 16.5818 22.5805 16.2664 22.6701 15.9748L24.1039 16.4153C24.2029 16.0932 24.0858 15.7448 23.8144 15.5474L22.9321 16.7605ZM22.6699 10.025C22.5803 9.73323 22.6863 9.41768 22.9321 9.23892L23.8144 10.452C24.0857 10.2547 24.2027 9.90635 24.1038 9.5844L22.6699 10.025ZM21.2232 6.2788C20.9441 6.40286 20.6159 6.3369 20.4066 6.11193L21.5047 5.09017C21.2764 4.84479 20.9183 4.77277 20.6138 4.90816L21.2232 6.2788ZM11.2911 2.51845C11.2592 2.82014 11.0392 3.07022 10.7409 3.13823L10.4075 1.67576C10.0779 1.75092 9.83462 2.02729 9.79939 2.36093L11.2911 2.51845ZM5.59184 6.11273C5.38303 6.33721 5.05555 6.40296 4.77725 6.27921L5.3867 4.9086C5.08148 4.77288 4.72243 4.84503 4.49354 5.09109L5.59184 6.11273ZM3.32947 15.9761C3.41896 16.2672 3.31313 16.5821 3.0679 16.7605L2.18565 15.5474C1.91377 15.7451 1.7965 16.0941 1.89567 16.4168L3.32947 15.9761ZM3.0679 9.23892C3.31326 9.41736 3.41913 9.7324 3.32959 10.0237L1.8958 9.58293C1.79666 9.90544 1.91387 10.2544 2.18565 10.452L3.0679 9.23892ZM14.7094 23.482C14.7413 23.18 14.9615 22.9296 15.26 22.8615L15.5938 24.3239C15.9229 24.2488 16.1659 23.9727 16.2011 23.6395L14.7094 23.482ZM15.2602 3.13868C14.9615 3.07053 14.7413 2.82012 14.7094 2.51801L16.2011 2.36051C16.1659 2.02735 15.923 1.75139 15.5939 1.67629L15.2602 3.13868ZM4.77725 19.7208C5.05548 19.5971 5.38291 19.6628 5.59168 19.8872L4.49336 20.9089C4.7223 21.155 5.08142 21.2271 5.3867 21.0914L4.77725 19.7208Z" fill="#78889B"/>
                                    </svg>
                                    <a href="{{ route('profile.edit') }}" class="text-dark"> <span style="margin-left: 15px;">Settings</span></a>

                                </button>
                            </div>

                        </div>
                </div> --}}
            </div>

        </div>
    </div>
</div>
@push('script')
    <script>
        function searchMenu(input) {
            console.log(input, 'Here');

            var filter = input.trim().toLowerCase();
            var isEmpty = filter === '';

            $('.parentAccord').each(function() {
                var categoryText = $(this).find('.accordion-item > .catName').text().toLowerCase();
                // alert(categoryText +"  cattext");
                var found = false;
                $(this).find('.special-ul').each(function() {
                    var subCategoryText = $(this).text().toLowerCase();
                    // alert(subCategoryText + " subcatTexr");
                    if (subCategoryText.includes(filter)) {
                        // alert("found");
                        found = true;
                        return false; // Exit the inner loop if a match is found
                    }
                });
                // alert(categoryText.includes(filter) + "is true");
                if (categoryText.includes(filter) || found) {
                    // alert("found1");
                    console.log($(this).html(), "this");
                    $(this).show();
                    // $(this).trigger('click');
                    $(this).parents('.accordion-main').show();
                } else {
                    $(this).hide();
                }
            });
        }
    </script>
@endpush
