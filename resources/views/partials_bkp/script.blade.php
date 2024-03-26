<script src="{{ asset('backend/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('backend/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('backend/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('backend/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{ asset('backend/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{ asset('backend/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('backend/vendor/libs/select2/select2.js')}}"></script>
<script src="{{ asset('backend/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{ asset('backend/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
    
<!-- Main JS -->
<script src="{{ asset('backend/js/main.js') }}"></script>
{{-- Custom JS --}}
<script src="{{ asset('backend/js/app.js') }}"></script>

<script src="{{ asset('backend/js/ui-toasts.js') }}"></script>

<script src="{{ asset('backend/vendor/libs/toastr/toastr.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('backend/js/dashboards-analytics.js') }}"></script>
<script src="{{ asset('backend/js/forms-selects.js')}}"></script>
<script>
    function saveAsPdf(base64Image, img_width, img_height,filename) {
        // Access jsPDF from the global scope
        const { jsPDF } = window.jspdf;

        // Calculate the scaled width and height of the image
        const scaleFactor = 72 / 25.4; // Convert mm to inches
        const widthInInches = img_width / 25.4;
        const heightInInches = img_height / 25.4;

        // Create a jsPDF instance with the calculated dimensions
        const doc = new jsPDF({
            orientation: widthInInches > heightInInches ? 'landscape' : 'portrait',
            unit: 'in',
            format: [widthInInches + 0.5, heightInInches + 0.5] // Add some padding
        });

        // Parameters: base64Image, format, x, y, width, height
        doc.addImage(base64Image, 'JPEG', 0.25, 0.25, widthInInches, heightInInches);

    // Save the PDF
    filename=filename+'.pdf';
    doc.save(filename);
}
    function getPexelsImages(searchtext,page){

                    var mainUrl = $('meta[name="main_url"]').attr(
                            "content"
                        );
                        // var csrf = $('meta[name="csrf-token"]').attr("content");
                        // var formData = new FormData();
                        // formData.append("name", name);
                        // formData.append("image", imageDataURL);
                        $.ajax({
                            url: mainUrl + "/search_images/" + searchtext + "/" + page,
                            type: "GET",
                            // headers: {
                            //     "X-CSRF-TOKEN": csrf,
                            // },
                            // data: formData,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                // alert('sending');
                                $('#pexels-images').html(`<div id="palleon-mini-loader" class="palleon-loader-wrap mt-4" >
                                    <div class="palleon-loader-inner-mini">
                                        <div class="palleon-loader"></div>
                                    </div>
                                </div>`);
                            },
                            success: function (response) {
                                // console.log(response);
                                $('#pexels-images').html(response);
                                $('#palleon-mini-loader').hide();
                                // $('#palleon-library-my').hide();
                            },
                            error: function (error) {
                                 console.error(error);
                            },
                        });
    }
    function  searchImages(){
        var search= $("#pexels-search").val();
        if(search != ""){
            var page=1;
            getPexelsImages(search,page);
        }

    }
    $( "#pexels-images" ).delegate( ".change-page", "click", function() {
        var page = $( this ).attr( "page" );
        var searchtext = $( this ).attr( "text" );
        if ($(this).hasClass('next')) {
            page = parseInt(page) + 1;
        } else if ($(this).hasClass('prev')) {
            page = parseInt(page) - 1;
        }
        getPexelsImages(searchtext, page);
    });
    $('.image-tabs-change').click(function(){
        let target = $(this).attr('data-target');
        let inactive = '';
        let inactiveFound = false; // Flag to track if inactive element is found

        $('.image-tabs-change').each(function() {
            let other = $(this).attr('data-target');
            if (target !== other && !inactiveFound) { // Check if inactive element is found
                inactive = other;
                inactiveFound = true; // Set flag to true once inactive element is found
            }
        });

        $('#pexels-images').appendTo($(target + '> .append-div' ));
        $(inactive).find('#pexels-images').detach();

        // alert(inactive);
    });
    //const base64Image = 'data:image/png;base64,i VBORw0K...'; // Your base-64 image string here
    //createPDFWithBase64Image(base64Image);
    //saveAsPdf(base64Image);
</script>
<!-- JavaScript for handling active class -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add 'active' class to the current main category based on the URL
        const currentMainCategory = document.querySelector('.menu-items.active');
        if (currentMainCategory) {
            currentMainCategory.classList.add('active');
        }
        // Add 'active' class to the current sub-category based on the URL
        const currentSubCategory = document.querySelector('.menu-sub .menu-items.active');
        if (currentSubCategory) {
            currentSubCategory.closest('.menu-items').classList.add('active');
        }
    });
</script>

<script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script src="{{asset('backend/js/jquery.mCustomScrollbar.js')}}"></script>
<script>
    (function($){
        $(window).on("load",function(){
            $(".body").mCustomScrollbar({
                theme:"minimal-dark",
                scrollButtons:{
                    enable:true
                }
            });
        });
    })(jQuery);
</script>
