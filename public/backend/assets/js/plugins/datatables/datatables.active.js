(function ($) {
    "use strict";

    /*Default*/
    if( $('.data-table-default').length ) {
        $('.data-table-default').DataTable({
            responsive: true,
            language: {
                paginate: {
                    previous: '<i class="zmdi zmdi-chevron-left"></i>',
                    next:     '<i class="zmdi zmdi-chevron-right"></i>'
                }
            }
        });
    }

    /*Export Buttons*/
    if( $('.data-table-export').length ) {
        $('.data-table-export').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend:    'copy',
                    text:      '<i class="fa fa-files-o" width="100%"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'csv',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'excel',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'pdf',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print'
                },
            ],
            language: {
                paginate: {
                    previous: '<i class="zmdi zmdi-chevron-left"></i>',
                    next:     '<i class="zmdi zmdi-chevron-right"></i>'
                }
            }
        });
    }

})(jQuery);

