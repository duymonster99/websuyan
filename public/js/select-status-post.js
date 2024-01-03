$(document).ready(function () {
    $(".status_home").change(function(){
        let status = $(this).val();
        let post_id = $(this).data('id');
        let url = $(this).data('url');
        // alert(post_id);

        $.ajax({
            method: "GET",
            url: url,
            data: {
                id: post_id,
                status_home: status,
            },
            success: function(data){

            }
        });
    });
})

$(document).ready(function () {
    $(".status_page").change(function(){
        let status = $(this).val();
        let post_id = $(this).data('id');
        let url = $(this).data('url');
        // alert(url);

        $.ajax({
            method: "GET",
            url: url,
            data: {
                id: post_id,
                status_page: status,
            },
            success: function(data){

            }
        });
    });
})

$(document).ready(function () {
    $(".status_slider").change(function(){
        let status = $(this).val();
        let id = $(this).data('id');
        let url = $(this).data('url');
        // alert(url);

        $.ajax({
            method: "GET",
            url: url,
            data: {
                id: id,
                status_banner: status,
            },
            success: function(data){

            }
        });
    });
})
