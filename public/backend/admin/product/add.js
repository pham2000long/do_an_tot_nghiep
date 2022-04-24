$(function() {
    $("#product-promotions").repeatable({
        addTrigger: 'button.add-promotion',
        deleteTrigger: 'button.delete-promotion',
        template: "#product-promotion",
        afterAdd:function () {
            $('.promotion-reservation').daterangepicker({
                opens: 'left',
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
});
