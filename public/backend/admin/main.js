$(document).ready(function() {
    $("#data_table").DataTable();
});

$(function() {
    $('.switch-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var slide_id = $(this).data('id');
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
            url: "{{ route('slide.updateStatus') }}",
            success: function(data) {
                alert(data.success)
            },
            error: function(data) {
                alert(data.error)
            }
        })
    })
});

$('.sweetalert-delete').on('click', function(){
    swal({
        title: "Bạn có chắc muốn xóa?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            let urlRequest = $(this).data('url');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                dataType: "JSON",
                url: urlRequest,
                success: function(data) {
                    console.log(data.success)
                }
            });
            swal("Bạn đã xóa thành công!", {
                icon: "success",
            }).then((value) => {
                location.reload();
            });
        }
    });
});
