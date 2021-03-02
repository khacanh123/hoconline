<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Học 24H</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<style>
    .header{
			border-top: 3px solid #28a745;
			background: #495057;
			color: #fff;
			width: 70%;
			padding: 1%;
		}
		.header-left i{
			margin-left: 5%;
		}
		.header-right h4{
			text-align: right;
			margin-right: 10%;
			line-height: 2; 
		}
		.content{
			background: #28a745;
			width: 70%;
		}
		.content .form-content{
			padding:10%;
		}
		.content .form-content .input-group .input-group-text{
			background:#333;
			color:#fff;
			border:none;
			border-radius:0;
			font-weight: 600;
		}
		.content .form-content .input-group input{
			    border-radius: 0;
		}
		.content .form-content .input-group input:focus{
			border-color: transparent;
		}
		.content .form-content h4{
			margin-bottom:5%;
		}
		.content .form-content button{
			background: #333;
			color: #fff;
			border-radius: 0;
			width: 20%;
			font-weight: 600;
		}
</style>
<body>
<div class="container header">
		<div class="row">
			<div class="col-md-6 header-left">
				<i class="fab fa-canadian-maple-leaf fa-3x"></i>
			</div>
			<div class="col-md-6 header-right">
				<h4>Học 24H - Học online mọi lúc mọi nơi.</h4>
			</div>
		</div>		
	</div>
	<div class="container content">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
            @if($message = Session::get('message'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form action="{{route('login')}}" method="post">
       @csrf
			<div class="form-content">
			<h4>Vui lòng điền thông tin</h4>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Email</span>
				  </div>
				  <input type="email" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="email" required>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon2">Mật khẩu</span>
				  </div>
				  <input type="password" class="form-control" name="password" aria-label="Password" aria-describedby="basic-addon2" required>
				</div>
				<div class="input-group mb-3">
					<button type="submit" class="btn btn-default">Đăng nhập</button>
				</div>
                <div class="input-group mb-3">
					<button type="button" class="btn btn-default signup">Đăng ký tài khoản</button>
				</div>
			</div>
            <form>
		</div>
        <script>
            $(document).on('click','.signup', function(){
                location.href = '/dang-ky';
            })
        </script>
</body>
</html>