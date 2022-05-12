<div class="container">
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <h3>THƯƠNG MẠI ĐIỆN TỬ W-BREAK</h3>
            <p>Địa chỉ: 371 Nguyễn Kiệm, Phường 03, Quận Gò Vấp, Tp. Hồ Chí Minh</p>
            <p>Số điện thoại: 085964858 - Website: <a href="{{route('product')}}">www.w-break.com</a></p>
            <h3>HÓA ĐƠN BÁN HÀNG</h3>
            <span>&#10046;&#10046;&#10046;</span>
            <p>Tên khách hàng: {{$name}}</p>
            <p>SĐT: {{$phone}}</p>
            <p>Địa chỉ nhận: {{$address}}</p>
            <hr style="border-style: none none dashed; width: 50%" />
            <table width="100%">
                <tr>
                    <th width="25%"></th>
                    <th >Tên sản phẩm</th>
                    <th >Số lượng</th>
                    <th >Đơn giá</th>
                    <th >Thành tiền</th>
                    <th width="25%"></th>
                </tr>
                <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($carts as $cartItem)
                    @php
                        $total += $cartItem['price'] * $cartItem['quantity'];
                    @endphp
                    <tr>
                        <td></td>
                        <td>{{$cartItem['name']}}</td>
                        <td>{{$cartItem['quantity']}}</td>
                        <td>{{number_format($cartItem['price'])}}</td>
                        <td>{{number_format($cartItem['price'] * $cartItem['quantity'])}} VNĐ</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr style="border-style: none none dashed; width: 50%" />
            <h4>Tổng tiền: {{number_format($total)}} VNĐ</h4>
            <p>Mọi thắc mắc xin vui lòng liên hệ tổng đài: 1800 2060</p>
            <p>Xin cảm ơn quý khách!</p>
            <p>Hóa đơn đã xuất nếu thay đổi vui lòng báo lại trong ngày.</p>
        </div>

    </div>
</div>
