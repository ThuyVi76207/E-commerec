@extends('layout')
@section('content')
<div class="slideshow-containers">
        @for($i = 1; $i<=6;$i++)
            <div class="mySlides fades">
                <img src="images/thpanner/{{$i}}.jpg" alt="hinh anh" style="width:100%">
            </div>
        @endfor
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>


    <br>
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <br>
    <h4 class="sp-title"> >>> Sản phẩm được tìm thấy</h4>
    <div class="row">
        @foreach($product as $productItem)
            <div class="product col-md-2">
                <a href="{{route('detail',['id'=>$productItem->id])}}"><img src="{{$productItem->feature_image_path}}" alt="Hinh san pham" height="150px" width="100%"></a>
                <a href="{{route('detail',['id'=>$productItem->id])}}"><p class="card-text content-font" style="color: #0c0c0d;">{{$productItem->name}}</p></a>
                <br>
                <a href="{{route('detail', ['id'=>$productItem->id])}}"><p class="card-text content-font" style="color: #ff5847;">{{number_format($productItem->price)}}<span> đ</span></p></a>
            </div>
        @endforeach
    </div>
@endsection