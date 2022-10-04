<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | PUSBIN JFA - Konsultasi Online</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('adminlte/dist/img/pusbin.png')}}">
</head>

<body>

	    @if (session('error'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif

    @if (session('error2'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error2') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif

    @if (session('error3'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error3') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif

    @if (session('error4'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error4') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif

    @if (session('errory'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('errory') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif
	
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{asset('assets/img/bpkp.png')}}" alt="Klorofil Logo" style="width:150px;height:75px;"></div>
								<p class="lead"></p>
							</div>
							<!-- <form method="POST" action="{{ route('login') }}"> -->
							<form method="POST" action="{{ action('App\Http\Controllers\LoginController@otentikasi') }}">
                       		 @csrf
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Username</label>
									<input name="username" type="text" class="form-control" id="signin-email"  placeholder="Email">
									@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Login') }}
                                </button>
                                <br>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Media Layanan Konsultasi Online JFA</h1>
							<p>by Pusat Pembinaan Jabatan Fungsional Auditor</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
