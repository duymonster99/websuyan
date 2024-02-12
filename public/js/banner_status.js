$(document).ready(function () {
    $(".status_slider").change(function () {
        let status = $(this).val();
        let banner_id = $(this).data("id");
        let url = $(this).data("url");

        $.ajax({
            method: "GET",
            url: url,
            data: {
                id: banner_id,
                status_banner: status,
            },
            success: function (data) {},
        });

    });
});
