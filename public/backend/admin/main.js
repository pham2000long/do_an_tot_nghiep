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

$('.sweetalert-delete-temp').on('click', function(){
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
                    type: "POST",
                    dataType: "JSON",
                    url: urlRequest,
                    success: function(data) {
                        console.log(data)
                        console.log(data.success)
                    },
                });
                swal("Bạn đã xóa thành công!", {
                    icon: "success",
                }).then((value) => {
                    location.reload();
                });
            }
        });
});
