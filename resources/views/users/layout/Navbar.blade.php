<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Học24h</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Trang chủ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Khóa học mới</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog Học24h</a>
          </li>
          @if(Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="#">Xin chào: {{Auth::user()->name}}</a>
          </li>
          @endif
          <li class="nav-item">
          <ul class="nav navbar-nav navbar-right" style="margin-top:8px">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:rgba(255,255,255,.5)" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> <i class="fa fa-shopping-cart"></i> Giỏ hàng <sup id="numberItem"></sup><span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-cart " role="menu">
          <div class="text-center">
              <li><a  href="">Xem trong giỏ hàng</a></li> 
              </div>
            <div class="list-cart">
            <div id="cart-item" style="">
                @foreach($cart as $value)
              <li class="nav-item"> <div class="item item-cart"> <div class="item-left"> <a href="/detail/{{$value->id}}">{{ $value->name }}</a><p>{{ number_format($value->price) }}</p>  </div> </div> <div class="item-right"><button class="btn btn-xs btn-danger pull-right delete-cart" data-id="{{$value->id}}">x</button> </div></li>
              @endforeach
              </div>
            </div>
              
              
             
          </ul>
          </li>
          
        </ul>@if(Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="/dang-xuat">Đăng xuất</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/dang-nhap">Đăng nhập</a>
          </li>
          @endif
      </div>
    </div>
  </nav>
