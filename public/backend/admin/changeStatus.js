$(function () {
    $('.switch-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var slide_id = $(this).data('id');
        let urlRequest = $(this).data('url');
        console.log(slide_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            data: {
                'id': slide_id,
                'status': status
            },
            dataType: "JSON",
            url: urlRequest,
            success: function(data) {
                alert(data.success)
            },
            error: function(data) {
                alert(data.error)
            }
        })
    });
});

$(document).ready(function changeStatus() {
    $("#data_table").DataTable();
});
