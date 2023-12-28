$(document).ready(function(){
    $('.status_acc').change(function(){
        let status = $(this).val();
        let id = $(this).data('id');
        let url = $(this).data('url');

        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: id,
                acc_type: status,
            },
            success: function(data){

            },
        });
    });
});
