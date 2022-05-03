@extends('admins.layouts.main', ['title' => 'Thống kê doanh thu'])

@section('css')
    <style>
        .card.card-custom {
            border: 0;
        }
        .custom-chart-gap {
            display: flex;
            flex-direction: column;
            row-gap: 50px;
        }
        .box-footer {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-top: 3px solid #f4f4f4;
            border-bottom: 3px solid #f4f4f4;
            padding: 10px;
        }
        .col-xs-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
            width: 100%;
        }
        .description-block {
            display: block;
            margin: 10px 0;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <!-- Invoice List Start -->
    <div class="card card-custom">
        <div class="card-body" style="background-color: #fafafa; border-radius: 0.5rem; border: 1px solid #EBEDF3;">
            <div class="row">
                <div class="col-12 mb-30">
                    <div class="box">
                        @include('admins.statistic.chart')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice List End -->
@endsection

@section('js')
    <script src="{{ asset('backend/admin/statistic/statistic.js') }}"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backend/assets/js/chart/chart.js') }}"></script>
    <!-- FLOT CHARTS -->
    <script src="{{ asset('backend/assets/js/chart/jquery.flot.js') }}"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="{{ asset('backend/assets/js/chart/jquery.flot.resize.js') }}"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="{{ asset('backend/assets/js/chart/jquery.flot.pie.js') }}"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="{{ asset('backend/assets/js/chart/jquery.flot.categories.js') }}"></script>

    <script>
        $(document).ready(function(){
            // -----------------------
            // - MONTHLY SALES CHART -
            // -----------------------

            // Get context with jQuery - using jQuery's .get() method.
            var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
            // This will get the first returned node in the jQuery collection.
            var salesChart = new Chart(salesChartCanvas);

            var salesChartData = {
                labels : {!! json_encode($statistic['labels'] ) !!},
                datasets: [
                    {
                        label               : 'Doanh Số Bán Hàng',
                        fillColor           : 'rgba(60,141,188,0.9)',
                        strokeColor         : 'rgba(60,141,188,0.8)',
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : {!! json_encode($statistic['revenues'] ) !!}
                    }
                ]
            };

            var salesChartOptions = {
                // Boolean - If we should show the scale at all
                showScale               : true,
                scaleLabel              : function(label) {
                    return formatMoney(label.value);
                },
                tooltipTemplate        : function(label) {
                    return label.label.toString() + " : " + formatMoney(label.value);
                },
                tooltipFontSize: 12,
                // Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines      : false,
                // String - Colour of the grid lines
                scaleGridLineColor      : 'rgba(0,0,0,.05)',
                // Number - Width of the grid lines
                scaleGridLineWidth      : 1,
                // Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                // Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines  : true,
                // Boolean - Whether the line is curved between points
                bezierCurve             : true,
                // Number - Tension of the bezier curve between points
                bezierCurveTension      : 0.3,
                // Boolean - Whether to show a dot for each point
                pointDot                : false,
                // Number - Radius of each point dot in pixels
                pointDotRadius          : 4,
                // Number - Pixel width of point dot stroke
                pointDotStrokeWidth     : 1,
                // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius : 20,
                // Boolean - Whether to show a stroke for datasets
                datasetStroke           : true,
                // Number - Pixel width of dataset stroke
                datasetStrokeWidth      : 2,
                // Boolean - Whether to fill the dataset with a color
                datasetFill             : true,
                // String - A legend template
                legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio     : true,
                // Boolean - whether to make the chart responsive to window resizing
                responsive              : true
            };

            // Create the line chart
            var myChart = salesChart.Line(salesChartData, salesChartOptions);

            // ---------------------------
            // - END MONTHLY SALES CHART -
            // ---------------------------

            /* DONUT CHART */
            var options = {
                series: {
                    pie: { show: true, radius: 1, innerRadius: 0.5,
                        label: {
                            show: true, radius: 2 / 3, formatter: labelFormatter, threshold: 0.1
                        }
                    }
                },
                colors: ['#3498db', '#2ecc71', '#e67e22', '#e74c3c', '#f1c40f', '#9b59b6', '#34495e'],
                legend: { show: false }
            };

            var quantityData = [
                    @foreach($statistic['supplier'] as $key => $supplier)
                { label: '{{ $key }}', data: {{ $supplier['quantity'] }} },
                @endforeach
            ];

            var quantityChart = $.plot('#quantityChart', quantityData, options);

            var revenueData = [
                    @foreach($statistic['supplier'] as $key => $supplier)
                { label: '{{ $key }}', data: {{ $supplier['quantity'] }} },
                @endforeach
            ];

            var revenueChart = $.plot('#revenueChart', revenueData, options);

            var profitData = [
                    @foreach($statistic['supplier'] as $key => $supplier)
                { label: '{{ $key }}', data: {{ $supplier['profit'] }} },
                @endforeach
            ];

            var profitChart = $.plot('#profitChart', profitData, options);
            /* END DONUT CHART */

            $('select.change-statistic').on('change', function() {
                $(this).closest('.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                var url = $(this).closest('form').attr('action');
                var data = $(this).closest('form').serialize();
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    success: function(data) {
                        $('div.overlay').remove();
                        $('#print .box-chart .box-title').text(data.text.title1);
                        $('#print .box-table .box-title').text(data.text.title2);
                        $('#print .box-chart .description-order .description-header').text(data.count_orders);
                        $('#print .box-chart .description-product .description-header').text(data.count_products);
                        $('#print .box-chart .description-revenue .description-header span').text(formatMoney(data.total_revenue));
                        $('#print .box-chart .description-revenue .description-text').text(data.text.revenue);
                        $('#print .box-chart .description-profit .description-header span').text(formatMoney(data.total_profit));
                        $('#print .box-chart .description-profit .description-text').text(data.text.profit);

                        myChart.destroy();

                        var salesChartData = {
                            labels  : data.labels,
                            datasets: [
                                {
                                    label               : 'Doanh Số Bán Hàng',
                                    fillColor           : 'rgba(60,141,188,0.9)',
                                    strokeColor         : 'rgba(60,141,188,0.8)',
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : data.revenues
                                }
                            ]
                        };

                        myChart = salesChart.Line(salesChartData, salesChartOptions);

                        quantityData = [];
                        revenueData = [];
                        profitData = [];

                        $.each(data.supplier, function(key,value){
                            quantityData.push({ label: key, data: value.quantity });
                            revenueData.push({ label: key, data: value.revenue });
                            profitData.push({ label: key, data: value.profit });
                        });

                        quantityChart.destroy();
                        revenueChart.destroy();
                        profitChart.destroy();

                        quantityChart = $.plot('#quantityChart', quantityData, options);
                        revenueChart = $.plot('#revenueChart', revenueData, options);
                        profitChart = $.plot('#profitChart', profitData, options);

                        $('.box-table table tbody').empty();

                        var price = 0;
                        var profit = 0;

                        $.each(data.order_details, function(key,value){

                            price = price + value.price * value.quantity;
                            profit = profit + value.quantity * (value.price - value.product_detail.product.import_price);

                            $('.box-table table tbody').append(
                                '<tr>' +
                                '<td style="text-align: center; vertical-align: middle;">' + (key + 1) +'</td>' +
                                '<td style="vertical-align: middle;"> #' + value.product_detail.product.sku_code + '</td>' +
                                '<td style="vertical-align: middle;">' + value.product_detail.product.name + '</td>' +
                                '<td style="vertical-align: middle;">' + value.product_detail.color + '</td>' +
                                '<td style="vertical-align: middle;"> #' + value.order.order_code + '</td>' +
                                '<td style="vertical-align: middle;">' + formatDate(value.created_at) + '</td>' +
                                '<td style="text-align: center; vertical-align: middle;">' + value.quantity + '</td>' +
                                '<td style="vertical-align: middle;">' +
                                '<span style="color: #f30;">' +
                                formatMoney(value.product_detail.product.import_price) +
                                '</span>' +
                                '</td>' +
                                '<td style="vertical-align: middle;">' +
                                '<span style="color: #f30;">' +
                                formatMoney(value.price) +
                                '</span>' +
                                '</td>' +
                                '<td style="vertical-align: middle;">' +
                                '<span style="color: #f30;">' +
                                formatMoney(value.price * value.quantity) +
                                '</span>' +
                                '</td>' +
                                '<td style="vertical-align: middle;">' +
                                '<span style="color: #f30;">' +
                                formatMoney(value.quantity * (value.price - value.product_detail.product.import_price)) +
                                '</span>' +
                                '</td>' +
                                '</tr>'
                            );
                        });

                        $('.box-table table tbody').append(
                            '<tr>' +
                            '<td colspan="11" style="text-align: right;">' +
                            '<i style="margin-right: 10px;">*Tổng Doanh Thu = <span style="color: #f30;">' + formatMoney(price) + '</span></i>' +
                            '<i>*Tổng Lợi Nhuận = <span style="color: #f30;">' + formatMoney(profit) + '</span></i>' +
                            '</td>' +
                            '</tr>'
                        );
                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        Swal.fire({
                            title: 'Thất bại',
                            text: errors.msg,
                            type: 'error'
                        })
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.btn-print').click(function(){
                printJS({
                    printable: 'print',
                    type: 'html',
                    documentTitle: ' ',
                    header: 'Báo Cáo Tình Hình Kinh Doanh Website PhoneStore',
                    headerStyle: 'font-size: 14px; margin: 20px;',
                    style: '.box { margin: 20px; padding: 20px; border-top: none; box-shadow: none; } ' +
                        '@media print { .box-footer { page-break-after: always; } } ' +
                        'table { page-break-inside:auto } ' +
                        'tr { page-break-inside:avoid; page-break-after:auto }' +
                        '#salesChart { width: 100% !important; height: auto !important; }',
                    css: [
                        '{{ asset('backend/admin/statistic/bootstrap.min.css') }}',
                        '{{ asset('backend/assets/admin/statistic/statistic.css') }}'
                    ]
                });
            });
        });
    </script>
@endsection
