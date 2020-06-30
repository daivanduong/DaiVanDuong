<!DOCTYPE html>
<html ng-app="myApp">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Store Admin  @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('front-end/css/icon.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('front-end/css/materialize.min.css') }}"  media="screen,projection"/>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/style.css') }}">
    <script src="{{ URL::asset('front-end/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('front-end/js/materialize.min.js') }}"></script>
<link href="{{ URL::asset('back-end/owl-carousel/owl.carousel.min.css' )}}"  rel="stylesheet" />
<link href="{{ URL::asset('back-end/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('back-end/css/style.css' )}}" rel="stylesheet") />
<script src="{{ URL::asset('back-end/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('lib/angular.min.js') }}"></script>
<script src="{{ URL::asset('lib/app.js') }}"></script>
  <script src="{{ URL::asset('lib/tinymce/tinymce.min.js') }}"></script>
    <link rel="icon" href="{{ URL::asset('html/images/icon.ico') }}" type="image/x-icon">
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body >

    @section('header')
    <div class="row">
     <nav>
        <div class="nav-wrapper" style="background-color: #FE642E">
            <div class="container">
                <a href="{{ route('homepage') }}" class="brand-logo">
                    <img src="{{URL::asset('html/images/book-store.png')}}" width="100" height="90%" style="margin-top: 5%;">
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                    @else
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="{{ route('save.index') }}">Sách mua sau</a></li>
                            <li><a href="{{ route('changePassword') }}">Đổi mật khẩu</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    @endif
                </ul>
            </div>
        </div>
      </nav>
    </div>
    {{-- end row --}}
    <div class="row">
        <div class="owl-carousel owl-carousel-menu " style="border-bottom: 1px solid #e0e0e0">
            <div class="item @if (Request::url()==route('dashboard'))
                    active
                @else
                    
                @endif">
                <a href="{{ route('dashboard') }}"><i class="material-icons">dashboard</i><span>Bảng điều khiển</span></a>
            </div>
            <div class="item">
                <a href="{{ route('book.index') }}"><i class="material-icons">library_books</i><span>Sách</span></a>
            </div>
            <div class="item">
                <a href="{{ route('user.index') }}"> <i class="material-icons">supervisor_account</i><span>Tài khoản</span></a>
            </div>
            <div class="item">
                <a href="{{ route('category.index') }}"><i class="material-icons">format_list_numbered</i> <span>Danh mục</span></a>
            </div>
            <div class="item">
                <a href="{{ route('author.index') }}"> <i class="material-icons">perm_contact_calendar</i><span>Tác giả</span></a>
            </div>
            <div class="item">
                <a href="{{ route('company.index') }}"> <i class="material-icons">business</i> <span>Nhà cung cấp</span></a>
            </div>
            <div class="item">
                <a href="{{ route('comment.index') }}"><i class="material-icons">comment</i> <span>Comment</span></a>
            </div>
            <div class="item">
                <a href="{{ route('order.index') }}"><i class="material-icons">format_list_numbered</i> <span>Đơn hàng</span></a>
            </div>
            <div class="item">
                <a href="{{ route('slide.index') }}">  <i class="material-icons">photo_size_select_actual</i><span>Slide</span></a>
            </div>
        </div>
    </div>
    @show
    <div class="row">
        @yield('left-sidebar')
        @yield('content')
    </div>
    @section('footer')
    @show
<script src="{{ URL::asset('back-end/js/script-admin.js') }}"></script>
</body>
</html>