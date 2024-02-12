$(document).ready(function() {
    $('.decrease').on('click', function(event) {
        event.preventDefault();
        let itemId = $(this).data('id');
        let url = $(this).data('url');
        let spanElement = $(`.stt[data-item-id="${itemId}"]`);
        // let spanElement1 = $(`.stt-proj[data-item-id="${itemId}"]`);
        // let spanElement2 = $(`.stt-sche[data-item-id="${itemId}"]`);
        // let spanElement3 = $(`.stt-lib[data-item-id="${itemId}"]`);
        // let spanElement4 = $(`.stt-emp[data-item-id="${itemId}"]`);
        // let spanElement5 = $(`.stt-slider[data-item-id="${itemId}"]`);

        $.ajax({
            type: 'GET',
            url: url,
            data: {id: itemId}, // Gửi id của item và hành động giảm
            success: function(response) {
                // Update số thứ tự trong HTML với dữ liệu mới từ response
                spanElement.text(response.data_stt);
                // spanElement1.text(response.data);
                // spanElement2.text(response.data);
                // spanElement3.text(response.data);
                // spanElement4.text(response.data);
                // spanElement5.text(response.data);
            },
        });
    });
});

$(document).ready(function() {
    $('.increase').on('click', function(event) {
        event.preventDefault();
        let itemId = $(this).data('id');
        let url = $(this).data('url');
        let spanElement = $(`.stt-proc[data-item-id="${itemId}"]`);
        let spanElement1 = $(`.stt-proj[data-item-id="${itemId}"]`);
        let spanElement2 = $(`.stt-sche[data-item-id="${itemId}"]`);
        let spanElement3 = $(`.stt-lib[data-item-id="${itemId}"]`);
        let spanElement4 = $(`.stt-emp[data-item-id="${itemId}"]`);
        let spanElement5 = $(`.stt-slider[data-item-id="${itemId}"]`);

        $.ajax({
            type: 'GET',
            url: url,
            data: {id: itemId}, // Gửi id của item và hành động giảm
            success: function(response) {
                // Update số thứ tự trong HTML với dữ liệu mới từ response
                spanElement.text(response.data_proc);
                spanElement1.text(response.data_proj);
                spanElement2.text(response.data_sche);
                spanElement3.text(response.data_lib);
                spanElement4.text(response.data_emp);
                spanElement5.text(response.data_slider);
            },
        });
    });
});
