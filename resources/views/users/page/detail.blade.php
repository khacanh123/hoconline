@extends('users.master')
@section('content')

<div style="background-color: #097890; color:#fff; width:100%">

<div class="content-des">
    <h3>{{$detail->name}}</h3>
  <p>{{$detail->description}}</p>  
</div>

</div>
<div class="detail-course">
    <div class="row">
        <div class="col-lg-8 col-xs-8 col-sm-12">
            <h4 style="text-align: center;">Danh mục bài giảng</h4>
            <div id="list-course">
                @foreach($list as $value)
				<li class="list-group-item lesson"  data-lesson="{{$value->id}}">{{$value->name}}</li>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4 col-xs-4 col-sm-12">
        <div class="card card-style">
            <div class="card-body">
            <div class="block-price">
            <span class="big-price">{{number_format($detail->price_sale)}}<sup>đ</sup></span>
            <span class="small-price">{{number_format($detail->price)}}<sup>đ</sup></span>
        </div>
        <br>
        <div class="button-p1">
            <button class="btn"><a href="" class="button-p2">Đăng ký học</a></button>
            <button class="btn"><a href="" class="button-p3">
                <i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng
            </a></button>
        </div>
        <div class="block-ulti">
            <ul style="font-size: 16px;">
                <li><i class="fa fa-clock-o" aria-hidden="true"></i> Thời lượng:
                    <p>{{$detail->time}}</p>
                </li>
                <li><i class="fa fa-play-circle" aria-hidden="true"></i> Số bài giảng:
                    <p>{{$detail->number_lesson}}</p>
                </li>
                
            </ul>
            
				
            </div>

            <div class="clearfix"></div>
            <div style="text-align: center;">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Học thử</button>
            </div>
        </div>

            </div>
        </div>
        </div>
    </div>
</div>
<!--modal-->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">{{$list[0]->name}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <iframe width="450" height="315" src="{{$list[0]->video_url}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
  
        <!-- Modal footer -->
        
  
      </div>
    </div>
  </div>
@endsection