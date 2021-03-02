@extends('users.master')
@push('slideshow')
    @include('users.layout.slideshow')
@endpush
@section('content')
@foreach($list as $value)
<div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" height="150" src="{{$value->image}}" alt=""></a>
              <div class="card-body">
                <h6 class="card-title">
                  <a href="/detail/{{$value->id}}">{{$value->name}}</a>
                </h6>
                <h5>{{number_format($value->price_sale)}}</h5>
                <div class="btn-cart">
                  <button class="btn btn-success add-cart" data-id="{{$value->id}}" data-price="{{$value->price_sale}}" data-name="{{$value->name}}"><i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                </div>
                
                </div>
              <div class="card-footer">
                <small class="text-muted">★ ★ ★ ★ ☆</small>
              </div>
            </div>
          </div>
          @endforeach
          {{$list->links()}}
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
    <div class="row">
      <div class="col-sm-6">
        <h5 style="text-align: center; margin-top: 60px;">Đừng bỏ lỡ chương trình <span style="color: red;font-style: italic;">Vòng Quay May Mắn</span> của HOC24H nhé bạn thân yêu ơi!</h5>
        <div style="text-align: center; margin-top: 20px;">
          <a href="/quay-so">
          <button class="btn btn-danger" style="font-style: 18px; font-weight: bold;">Quay Ngay Nhận Quà Nào</button>
          </a>
          
        </div>
      </div>
      <div class="col-sm-6">
        <img src="https://www.grab.com/vn/wp-content/uploads/sites/11/2017/08/Wheel-of-Fortune-Landing-Page-Banner-1920X675-Vietnam-1.jpg" width="100%" alt="">
      </div>
    </div>
  </div>

</div>
@push('modal')
<script src="http://127.0.0.1:8000/vendor/loadmodal.js"></script>
@endpush
@endsection