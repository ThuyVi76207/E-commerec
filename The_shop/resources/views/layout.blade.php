<!DOCTYPE html>
<html>
    <title>W-beak Mua sắm online</title>
    <meta charset="utf-8">
    <base href="{{asset('')}}">
    <link rel="stylesheet" type="text/css" href="admins/product/index/list.css">
    <!-- Latest compiled and minified CSS -->
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>  
    <link rel="stylesheet" href="{{ asset('admins/product/index/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/product/index/base.css') }}">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>

</head>
<body>

<header class="header">
    <div class="grid">
            <nav class="header__navbar">
            <ul class="header__list">
                <li class="header__item header__item--hasqr header__item--separate">
                    Vào cửa hàng trên ứng dụng W-break
                    
                    <div class="header__qr">
                        <img src="{{ asset('images/img/QR.png') }}" alt="QR" class="header__qr-img">
                        <div class="header__qr-apps">
                            <a href="#" class="header__qr-link">
                                <img src="{{ asset('images/img/Appstore.png') }}" alt="App Store" class="header__qr-down-img">
                            </a>
                            <a href="#" class="header__qr-link">
                                <img src="{{ asset('images/img/GGPlay.png') }}" alt="Google Play" class="header__qr-down-img">
                            </a>
                        </div>
                    </div>
                </li>
                <li class="header__item">
                    <span class="connectM">Kết nối</span>
                    
                    <a href="" class="header__item-icon">
                        <i class="header__navbar-icon fab fa-facebook"></i>
                    </a>
                    <a href="" class="header__item-icon">
                        <i class="header__navbar-icon fab fa-instagram"></i>
                    </a>
                </li>
            </ul>

            <ul class="header__list">
                <li class="header__item header__item--has-notify">
                    <a href="" class="header__item-link">
                        <i class="header__navbar-icon fas fa-bell"></i>
                        Thông báo
                    </a>
                    <div class="header__notify">
                        <header class="header__notify-header">
                            <h3>Thông báo mới nhận</h3>
                        </header>
                        <ul class="header__notify-list">
                            <li class="header__notify-item header__notify-item--viewed">
                                <a class="header__notify-link" href="#">
                                    <span></span>
                                    <img src=" {{ asset('images/img/Mỹ phẩm Ohui.jpg') }}" alt="Ohui" class="header__notify-img">
                                    <div class="header__notify-info">
                                        <span class="header__notify-name">Mỹ phẩm Ohui chính hãng</span>
                                        <span class="header__notify-descriotion">Mô tả mỹ phẩm Ohui chính hãng</span>
                                    </div>
                                </a>
                            </li>
                            <li class="header__notify-item header__notify-item--viewed">
                                <a class="header__notify-link" href="#">
                                    <span></span>
                                    <img src="{{ asset('images/img/Mỹ phẩm Ohui.jpg') }}" alt="Ohui" class="header__notify-img">
                                    <div class="header__notify-info">
                                        <span class="header__notify-name">Mỹ phẩm Ohui chính hãng</span>
                                        <span class="header__notify-descriotion">Set OHUI Dưỡng Trắng Hồng Rạng Rỡ Và mờ Thâm Extreme White</span>
                                    </div>
                                </a>
                            </li>
                            <li class="header__notify-item header__notify-item--viewed">
                                <a class="header__notify-link" href="#">
                                    <span></span>
                                    <img src="{{ asset('images/img/Mỹ phẩm Ohui.jpg') }}" alt="Ohui" class="header__notify-img">
                                    <div class="header__notify-info">
                                        <span class="header__notify-name">Son môi  Maybeline</span>
                                        <span class="header__notify-descriotion">Môi căng mềm, quyến rũ với màu sắc mổi bột luôn là điều mà các quý cô mong ước</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <footer class="header__notify-footer">
                            <a href="#" class="header__notify-footer-btn">Xem tất cả</a>
                        </footer>
                    </div>
                </li>
                <li class="header__item">
                    <a href="" class="header__item-link">
                        <i class="header__navbar-icon far fa-question-circle"></i>
                        Trợ giúp
                    </a>
                </li>
                <!-- <li class="header__item header__item--bold header__item--separate">Đăng ký</li>
                <li class="header__item header__item--bold">Đăng nhập</li> -->
            
                <li class="header__navbar-item header__navbar-user">
                    <img src="{{ asset('images/img/avatar.png') }}" alt="" class="header__navbar-user-avatar-img">
                    <span class="header__navbar-user-name">Thảo Vy</span>
                

                    <ul class="header__navbar-user-menu">
                        <li class="header__navbar-user-item">
                            <a href="">Tài khoản của tôi</a>
                        </li>
                        <li class="header__navbar-user-item">
                            <a href="">Địa chỉ của tôi</a>
                        </li>
                        <li class="header__navbar-user-item">
                            <a href="">Đơn mua</a>
                        </li>
                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                            <a href="">Đăng xuất</a>
                        </li>
                    </ul>
                </li>


            
            </ul>
        </nav>
        
        <div class="header-with-search">
            <div class="header__logo">
                <a href="#" class="header__logo-link">
                    <h2>W-break</h2>
                </a>
            </div>

            <form class="header__search" method="get" id="search" action="{{ route('search') }}">
                <div class="header__search-input-wrap">
                    <input type="text" value="" name="key" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm">
                </div>
                <div class="header__search-select">
                    <span class="header__search-select-label">Trong shop</span>
                    <i class="header__search-select-icon fas fa-chevron-down"></i>
                    
                    <ul class="header__search-option">
                        <li class="header__search-option-item header__search-option-item--active">
                            <span>Trong shop</span>
                            <i class="fas fa-check"></i>
                        </li>
                        <li class="header__search-option-item">
                            <span>Ngoài shop</span>
                            <i class="fas fa-check"></i>
                        </li>     
                    </ul>
                
                </div>
                <button class="header__search-btn">
                    <i class="header__search-btn-icon fas fa-search"></i>
                </button>

            </form>
            <!-- Cart Layout -->
            <div class="header__cast">
                <a href="{{ route('showCart') }}">
                    <div class="header__cast-wrap">
                        <i class="header__cast-icon fas fa-shopping-cart"></i>
                        <span class="header__cart-notice" >3</span>
                    </div>
                </a>
            </div>
        </div>          
    </div>
    
</header>

@yield('header')

<div class="container">
    <br>
    @yield('content')
</div>

<br>

<footer class="footer">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-2-4">
                <h3 class="h3 footer__heading">Chăm sóc khách hàng</h3>
                <ul class="footer__list">
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">Trung tâm trợ giúp</a>
                    </li>
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">W-break Mail</a>
                    </li>
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">Hướng dẫn mua hàng</a>
                    </li>
                </ul>
            </div>
            <div class="grid__column-2-4">
                <h3 class="h3 footer__heading">Giới thiệu</h3>
                <ul class="footer__list">
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">Giới thiệu</a>
                    </li>
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">Tuyển dụng</a>
                    </li>
                        <a href="" class="footer-item_link">Điều khoản</a>
                    </li>
                </ul>
            </div>
            <div class="grid__column-2-4">
                <h3 class="h3 footer__heading">Danh mục</h3>
                <ul class="footer__list">
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">Trang điểm mặt</a>
                    </li>
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">Trang điểm môi</a>
                    </li>
                        <a href="" class="footer-item_link">Trang điểm mắt</a>
                    </li>
                </ul>
            </div>
            <div class="grid__column-2-4">
                <h3 class="h3 footer__heading">Theo dõi chúng tôi</h3>
                <ul class="footer__list">
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">
                            <i class="footer-item_icon fab fa-facebook"></i>
                            Facebook
                        </a>
                    </li>
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">
                            <i class="footer-item_icon fab fa-instagram"></i>
                            Instagram
                        </a>
                    </li>
                    <li class="footer__list-item">
                        <a href="" class="footer-item_link">
                            <i class="footer-item_icon fab fa-linkedin"></i>
                            Linkedin
                        </a>
                    </li>
                </ul>
            </div>
            <div class="grid__column-2-4">
                <h3 class="h3 footer__heading">Vào cửa hàng trên ứng dụng</h3>
                <div class="footer__download">
                    <img src="{{ asset('images/img/QR.png') }}" alt="Download" class="footer__download-qr">
                    <div class="footer__download-apps">
                        <a href="" class="footer__download-app-link">
                            <img src="{{ asset('images/img/Appstore.png') }}" alt="Appstore" class="footer__download-app-img">
                        </a> 
                        <a href="" class="footer__download-app-link">   
                            <img src="{{ asset('images/img/GGPlay.png') }}" alt="GGPlay" class="footer__download-app-img">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="grid">
            <p class="footer__text">© 2022 W-break. Tất cả các quyền được bảo lưu.</p>
        </div>
    </div>
</footer>


<script src="admins/product/index/list.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
