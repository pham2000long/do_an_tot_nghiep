$(function() {
    $("#product_details").repeatable({
        addTrigger: 'button.add',
        deleteTrigger: 'button.delete-product-detail',
        max: 5,
        template: "#product-detail",
        afterAdd:function () {
            $(".product-detail-images").fileinput({
                theme: "explorer-fa",
                required: true,
                showUpload: false,
                showCaption: false,
                showClose: false,
                maxFileCount: 8,
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                initialPreviewAsData: true,
                maxFileSize: 1000,
                overwriteInitial: false,
                removeFromPreviewOnError: true,
            });
        }
    });
});
