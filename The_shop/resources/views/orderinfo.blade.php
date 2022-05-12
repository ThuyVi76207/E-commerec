@extends('layout')

@section('content')
    <div class="content-wrapper" style="margin-left: 0">
    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="margin-top: 15px">THÔNG TIN ĐẶT HÀNG</h5>
                        <hr style="size: 20px" />
                    </div>
                    <div class="col-md-12">
                        <form action="{{route('sendMail')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Họ và tên người nhận</label>
                                <input type="text" class="form-control"
                                       name = "name" placeholder="Nhập họ và tên người nhận">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control"
                                       name = "email" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control"
                                       name = "phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ nhận hàng</label>
                                <input type="text" class="form-control"
                                       name = "address" placeholder="Nhập địa chỉ nhận hàng">
                            </div>
                            <button type="submit" class="btn btn-danger">Xác nhận đơn hàng</button>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <h5 style="margin-top: 15px">PHƯƠNG THỨC THANH TOÁN</h5>
                        <hr style="size: 20px" />
                        <select id="payment_id" name="payment_name">
                            <option value="offline">Tiền mặt</option>
                            <option value="online">Thanh toán Online</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <hr style="size: 20px" />
                        <div class="col-sm-6" style="display: flex; float: left">
                            @php
                                $vnd_to_usd = $total/22968;
                            @endphp
                            <div id="paypal-button"></div>
                            <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
                        </div>
{{--                        <div class="col-sm-6" style=" float: right">--}}
{{--                            <a href="{{route('customerInfo')}}" class="btn btn-danger" style="font-size: 18px">XÁC NHẬN THANH TOÁN</a>--}}
{{--                        </div>--}}

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        let usd = document.getElementById('vnd_to_usd').value;
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AYvxQSpVbVQshW7_8MmC38srSzkX353gpQCPP8ckMiHNTpoJJ9q4QQ5EWckXb3gCZeP3inmVrxOiT6VO',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: `${usd}`,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window.alert('Cảm ơn bạn đã mua hàng!');
                });
            }
        }, '#paypal-button');

    </script>

@endsection




