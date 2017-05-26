<!DOCTYPE html>
<html>
<head>
<title>Login Hệ Thống Quản Trị</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="{{asset('')}}">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="ad/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="lgin/css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
	<!-- main -->
	<div class="main"> 
		<h1>Đăng Nhập Hệ Thống</h1>
		<div class="login-form"> 
			<h2>Đăng Nhập Hệ Thống</h2> 
			<div class="agileits-top">
				@if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $loi)
                            {{$loi}}<br/>
                        @endforeach
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
				<form action="admin/dang-nhap.html" method="post">
					<div class="styled-input">
						<input type="text" name="email" required=""/>
						<label>Email</label>
						<span></span>
					</div>
					<div class="styled-input">
						<input type="password" name="password" required=""> 
						<label>Password</label>
						<span></span>
					</div> 
					<div class="wthree-text"> 
						
						<div class="clear"> </div>
					</div> 
					<input name="_token" value="{{csrf_token()}}" type="hidden">
					<div class="agileits-bottom">
				
						<input type="submit" value="Sign In">
				
					</div>
				</form>
				
			</div>
				
		</div>	
	</div>	
	<!-- //main -->

</body>
</html>