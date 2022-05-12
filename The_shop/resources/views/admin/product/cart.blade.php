@extends('layout')

@section('content')
<body>
<div class="cart_wrapper">
    <div class="cart" data-url="{{route('deleteCart')}}">
        <div class="container">
            <div class="row">
                <table class="table update_cart_url" data-url="{{route('updateCart')}}">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($carts as $id => $cartItem)
                        @php
                            $total += $cartItem['price'] * $cartItem['quantity'];
                        @endphp
                        <tr>
                            <th scope="row">{{$id}}</th>
                            <td><img style="width: 100px; height: 100px" src="{{$cartItem['feature_image_path']}}" alt="loi"></td>
                            <td>{{$cartItem['name']}}</td>
                            <td>{{number_format($cartItem['price'])}}</td>
                            <td>
                                <input class="quantity" type="number" value="{{$cartItem['quantity']}}" min="1">
                            </td>
                            <td>{{number_format($cartItem['price'] * $cartItem['quantity'])}} VNĐ</td>
                            <td>
                                <a href="" data-id="{{$id}}" class="btn btn-primary cart_update">Cập nhật</a>
                                <a href="" data-id="{{$id}}" class="btn btn-danger cart_delete">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="col-md-12">
                    <hr style="size: 5px;"/>
                </div>
                <div class="col-md-12">
                    <br>
                    <h3>Tổng thành tiền: {{number_format($total)}} VNĐ</h3>
{{--                    @php--}}
{{--                        $vnd_to_usd = $total/22968;--}}
{{--                    @endphp--}}
{{--                    <div id="paypal-button"></div>--}}
{{--                    <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">--}}
                    <a href="{{route('orderInfo')}}" class="btn btn-danger" style="font-size: 20px">THANH TOÁN</a>
                </div>
            </div>
        </div>
    </div>
</div>





{{--<script src="admin-pro/product/index/list.js"></script>--}}
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

<script>
    function cartUpdate(event) {
        event.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).data('id');
        let quantity = $(this).parents('tr').find('input.quantity').val();
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {id: id, quantity: quantity},
            success: function (data) {
                if(data.code === 200) {
                    $('.cart_wrapper').html(data.cart_component);
                    alert('Cập nhật thành công');
                }
            },
            error: function () {

            }
        });
    }

    function cartDelete(event)
    {
        event.preventDefault();
        let urlDelete = $('.cart').data('url');
        let id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: urlDelete,
            data: {id: id},
            success: function (data) {
                if(data.code === 200) {
                    $('.cart_wrapper').html(data.cart_component);
                    alert('Xóa thành công');
                }
            },
            error: function () {

            }
        });
    }
    $(function () {
        $(document).on('click', '.cart_update', cartUpdate);
        $(document).on('click', '.cart_delete', cartDelete);
    })
</script>

{{--<script>--}}
{{--    let usd = document.getElementById('vnd_to_usd').value;--}}
{{--    paypal.Button.render({--}}
{{--        // Configure environment--}}
{{--        env: 'sandbox',--}}
{{--        client: {--}}
{{--            sandbox: 'AYvxQSpVbVQshW7_8MmC38srSzkX353gpQCPP8ckMiHNTpoJJ9q4QQ5EWckXb3gCZeP3inmVrxOiT6VO',--}}
{{--            production: 'demo_production_client_id'--}}
{{--        },--}}
{{--        // Customize button (optional)--}}
{{--        locale: 'en_US',--}}
{{--        style: {--}}
{{--            size: 'small',--}}
{{--            color: 'gold',--}}
{{--            shape: 'pill',--}}
{{--        },--}}

{{--        // Enable Pay Now checkout flow (optional)--}}
{{--        commit: true,--}}

{{--        // Set up a payment--}}
{{--        payment: function(data, actions) {--}}
{{--            return actions.payment.create({--}}
{{--                transactions: [{--}}
{{--                    amount: {--}}
{{--                        total: `${usd}`,--}}
{{--                        currency: 'USD'--}}
{{--                    }--}}
{{--                }]--}}
{{--            });--}}
{{--        },--}}
{{--        // Execute the payment--}}
{{--        onAuthorize: function(data, actions) {--}}
{{--            return actions.payment.execute().then(function() {--}}
{{--                // Show a confirmation message to the buyer--}}
{{--                window.alert('Cảm ơn bạn đã mua hàng!');--}}
{{--            });--}}
{{--        }--}}
{{--    }, '#paypal-button');--}}

{{--</script>--}}
@endsection
