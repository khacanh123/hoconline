@include('admin.layout.header')
<body class="sb-nav-fixed">
        @include('admin/layout/navbar');
        @include('admin/layout/slidebar');

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>
    <script type="text/javascript">
		$('#submit1').click(function(){
			var loai = $('#loai').val();
			var gia = $('#gia').val();
				if (loai == '' || gia == '') {
					toarst("error","Vui Lòng Nhập Đầy Đủ Thông Tin ","Thông Báo");
					return false;
				}
				$('#submit1').prop('disabled', true)
				$.post('tainguyen.php', {
					loai: loai,
					gia: gia
				}, function(data, status) {
					$("#trave1").html(data);
					$('#submit1').prop('disabled', false);
				});
			});
</script>
   @include('admin.layout.foot')
</body>