@extends('layout')


@section('content')
    <div class="card">
        <div class="container-fliud">
            <form action="{{route('cart', ['id'=>$products->id])}}">
                @csrf
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <img id="mainImg" src="{{$products->feature_image_path}}" alt="Lỗi">
                        <div class="thumbnail flex">
                            @foreach($productImage as $imageItem)
                                <div><img src="{{$imageItem->image_path}}" alt="Lỗi"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{$products->name}}</h3>
                        <p class="product-description">{{$products->content}}</p>
                        <h4 class="price">current price: <span>{{number_format($products->price)}}</span> VNĐ</h4>
                        <div class="action">
{{--                            <a href="{{route('detail',['id'=>$products->id])}}"--}}
{{--                               data-url="{{route('cart', ['id'=>$products->id])}}"--}}
{{--                               class="btn btn-primary add_to_cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>--}}
                            <button id="add_to_cart" data-url="{{route('cart', ['id'=>$products->id])}}" type="submit"
                                    class="btn btn-default">
                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                            <a href="{{route('showCart')}}" class="btn btn-danger">Mua ngay</a>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
{{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.1.1.min.js">--}}
    <script>
        $(document).ready(function() {
            $(".thumbnail img").click(function() {
                $("#mainImg").attr("src", $(this).attr("src"))
            })
        })
        function addTocart(event) {
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function (data) {
                    if(data.code === 200) {
                        alert('Thêm sản phẩm thành công')
                    }
                },
                error: function () {

                }
            });
        }
        $(function (){
            $("#add_to_cart").on('click', addTocart);
        })
        // $(document).click(function (event) {
        //     // $(".add_to_cart").click(addTocart());
        //     addTocart(event);
        // });
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
@endsection

