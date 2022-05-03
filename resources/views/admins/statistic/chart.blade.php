<div class="box-header with-border">
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <h3 class="box-title"></h3>

        <div class="form-action">
            <form action="{{ route('statistic.edit') }}" method="POST" accept-charset="utf-8">
                @csrf
                <div class="row" style="margin-right: -5px; margin-left: -5px;">
                    <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right: 5px; padding-left: 5px;">
                        <select class="form-control change-statistic" name="month">
                            <option value="">-- Chọn Tháng --</option>
                            @for ($i = 0; $i < 12; $i++)
                                <option value="{{ $i + 1 }}">Tháng {{ $i + 1 }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right: 5px; padding-left: 5px;">
                        <select class="form-control change-statistic" name="year">
                            <option value="">-- Chọn Năm --</option>
                            @for ($i = 0; $i < 12; $i++)
                                <option value="{{ date('Y') - $i }}">Năm {{ date('Y') - $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div id="print">
        <div class="box box-default box-chart">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Biểu Đồ Kinh Doanh Tháng {{ date('m').' Năm '.date('Y') }}</h3>
            </div>
            <div class="box-body custom-chart-gap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" style="height: 300px;"></canvas>
                        </div>
                        <p class="text-center">
                            <i>Hình 1: Biểu đồ doanh số bán hàng</i>
                        </p>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="chart" style="margin-bottom: 10px;">
                            <!-- Sales Chart Canvas -->
                            <div id="quantityChart" style="width: 200px; height: 200px; margin: 0 auto;"></div>
                        </div>
                        <!-- /.chart-responsive -->
                        <p class="text-center">
                            <i>Hình 2: Thị phần sản phẩm bán được theo nhà sản xuất</i>
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="chart" style="margin-bottom: 10px;">
                            <!-- Sales Chart Canvas -->
                            <div id="revenueChart" style="width: 200px; height: 200px; margin: 0 auto;"></div>
                        </div>
                        <!-- /.chart-responsive -->
                        <p class="text-center">
                            <i>Hình 3: Thị phần doanh thu theo nhà sản xuất</i>
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="chart" style="margin-bottom: 10px;">
                            <!-- Sales Chart Canvas -->
                            <div id="profitChart" style="width: 200px; height: 200px; margin: 0 auto;"></div>
                        </div>
                        <!-- /.chart-responsive -->
                        <p class="text-center">
                            <i>Hình 4: Thị phần lợi nhuận theo nhà sản xuất</i>
                        </p>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <div class="box-footer">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-sm-3 col-xs-3">
                        <div class="description-block border-right description-order">
                            <h5 class="description-header">{{ $statistic['count_orders'] }}</h5>
                            <span class="description-text">ĐƠN HÀNG</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <div class="col-sm-3 col-xs-3">
                        <div class="description-block border-right description-product">
                            <h5 class="description-header">{{ $statistic['count_products'] }}</h5>
                            <span class="description-text">SẢN PHẨM BÁN RA</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-xs-3">
                        <div class="description-block border-right description-revenue">
                            <h5 class="description-header"><span style="color: #f30;">{{ number_format($statistic['total_revenue'],0,',','.').' VNĐ' }}</span></h5>
                            <span class="description-text">DOANH THU THÁNG</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-xs-3">
                        <div class="description-block description-profit">
                            <h5 class="description-header"><span style="color: #f30;">{{ number_format($statistic['total_profit'],0,',','.').' VNĐ' }}</span></h5>
                            <span class="description-text">LỢI NHUẬN THÁNG</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
        <div class="box box-default box-table" style="margin-top: 25px;">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Danh Sách Sản Phẩm Xuất Kho Tháng {{ date('m').' Năm '.date('Y') }}</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">STT</th>
                            <th style="vertical-align: middle;">Mã Sản Phẩm</th>
                            <th style="vertical-align: middle;">Tên Sản Phẩm</th>
                            <th style="vertical-align: middle;">Mầu Sắc</th>
                            <th style="vertical-align: middle;">Đơn Hàng</th>
                            <th style="vertical-align: middle;">Ngày Xuất</th>
                            <th style="text-align: center; vertical-align: middle;">Số Lượng</th>
                            <th style="vertical-align: middle;">Giá Nhập</th>
                            <th style="vertical-align: middle;">Giá Xuất</th>
                            <th style="vertical-align: middle;">Doanh Thu</th>
                            <th style="vertical-align: middle;">Lợi Nhuận</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $price = 0; ?>
                        <?php $profit = 0; ?>
                        @foreach($statistic['order_details'] as $key => $order_detail)
                            <?php $price = $price + $order_detail->price * $order_detail->quantity; ?>
                            <?php $profit = $profit + $order_detail->quantity * ($order_detail->price - $order_detail->productDetail->product->import_price); ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">{{ $key + 1 }}</td>
                                <td style="vertical-align: middle;">{{ '#'.$order_detail->productDetail->product->sku_code }}</td>
                                <td style="vertical-align: middle;">{{ $order_detail->productDetail->product->name }}</td>
                                <td style="vertical-align: middle;">{{ $order_detail->productDetail->color }}</td>
                                <td style="vertical-align: middle;">{{ '#'.$order_detail->order->order_code }}</td>
                                <td style="vertical-align: middle;">{{ date_format($order_detail->created_at, 'd/m/Y') }}</td>
                                <td style="text-align: center; vertical-align: middle;">{{ $order_detail->quantity }}</td>
                                <td style="vertical-align: middle;"><span style="color: #f30;">{{ number_format($order_detail->productDetail->product->import_price,0,',','.') }} VNĐ</span></td>
                                <td style="vertical-align: middle;"><span style="color: #f30;">{{ number_format($order_detail->price,0,',','.') }} VNĐ</span></td>
                                <td style="vertical-align: middle;"><span style="color: #f30;">{{ number_format($order_detail->price * $order_detail->quantity,0,',','.') }} VNĐ</span></td>
                                <td style="vertical-align: middle;"><span style="color: #f30;">{{ number_format($order_detail->quantity * ($order_detail->price - $order_detail->productDetail->product->import_price),0,',','.') }} VNĐ</span></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="11" style="text-align: right;">
                                <i style="margin-right: 10px;">*Tổng Doanh Thu = <span style="color: #f30;">{{ number_format($price,0,',','.') }} VNĐ</span></i>
                                <i>*Tổng Lợi Nhuận = <span style="color: #f30;">{{ number_format($profit,0,',','.') }} VNĐ</span></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./box-body -->
<div class="box-footer">
    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-success btn-print pull-right"><i class="fa fa-print"></i> In Báo Cáo</button>
        </div>
    </div>
</div>
<!-- /.box-footer -->
