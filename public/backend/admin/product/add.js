$(function() {

    $("#product-promotions").repeatable({
        addTrigger: 'button.add-promotion',
        deleteTrigger: 'button.delete-promotion',
        template: "#product-promotion",
        afterAdd:function () {
            $('.promotion-reservation').daterangepicker({
                autoApply: true,
                minDate: moment(),
                "locale": {
                    "format": "DD/MM/YYYY",
                }
            });
            $('input.promotion').on('keyup', function() {
                var val = $(this).val().trim();
                $(this).closest('.box').find('.box-header .box-title').text(val);
            });
        }
    });

    $("#product_details").repeatable({
        addTrigger: 'button.add',
        deleteTrigger: 'button.delete',
        max: 5,
        min: 1,
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
            $('.reservation').daterangepicker({
                autoApply: true,
                autoUpdateInput: false,
                minDate: moment(),
                "locale": {
                    "format": "DD/MM/YYYY",
                }
            });
            $('.reservation').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });
            $('.reservation').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
            $('input.currency').autoNumeric('init', {
                aSep: '.',
                aDec: ',',
                aPad: false,
                lZero: 'deny',
                vMin: '0'
            });
            $('input.color').on('keyup', function() {
                var val = $(this).val().trim();
                if(val !== '') val = ' - ' + val;
                var name = $('input[name="name"]').val().trim();
                $(this).closest('.box').find('.box-header .box-title span.name').text(name);
                $(this).closest('.box').find('.box-header .box-title span.color').text(val);
            });
        },
        beforeDelete: function(target) {
            $(target).find('.product-detail-images').fileinput('destroy');
        }
    });

    $(".product-detail-images").fileinput({
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
});
