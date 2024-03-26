$(document).ready(function() {
    $('#user_table').DataTable();
    $('#office_table').DataTable();
    $('#department_table').DataTable();
    $('#role_table').DataTable();
    $('#template_table').DataTable();

    $('.menu-toggles').click(function() {
        $(this).closest('.menu-items').toggleClass('open');
        $('.menu-items').not($(this).closest('.menu-items')).removeClass('active');
        $(this).closest('.menu-items').toggleClass('active');
    });
});

    $('.add-to-wishlist').on('click', function () {
        var templateId = $(this).data('template-id');
        var csrf = $('meta[name="csrf-token"]').attr("content");
        var mainUrl = $('meta[name="main_url"]').attr(
                        "content"
                    );

    });


    // $('.remove-from-wishlist').on('click', function () {

    // });

