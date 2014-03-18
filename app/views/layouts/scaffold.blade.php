<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

		@yield('header')

	  	<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>
	</head>

	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">BS Asset</a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>{{ link_to_route('phones.index', 'Phones') }}</li>
						<li>{{ link_to_route('accessories.index', 'Accessories') }}</li>
						<li>{{ link_to_route('simcards.index', 'Sim Cards') }}</li>

						@if(!Auth::guest() && Auth::user()->isAdminRole())
						    <li>{{ link_to_route('transactions.index', 'Transactions') }}</li>
						@endif
					</ul>

					@if(Auth::guest())

						{{ Form::open([ 'route' => 'login.auth', 
										'class' => 'navbar-form navbar-right',
										'role'	=> 'form' ]) }}
						
						{{ Form::text('username','', [ 'class' => 'form-control', 'placeholder' => 'username']) }}
						{{ Form::text('password','', [ 'class' => 'form-control', 'placeholder' => 'password']) }}
						{{ Form::submit('Login', [ 'class' => 'btn btn-primary' ]) }}
						
						{{ Form::close() }}

					@else

						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								{{ link_to_route('users.show', 
											"hello, ".Auth::user()->name, 
											Auth::user()->id,
											[ "class" => "dropdown-toggle", "data-toggle" => "dropdown"]) 
								}}

								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
								</ul>	
							</li>
						</ul>

					@endif	
				</div>
			</div>
		</nav>

		<div class="container">

			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')

		</div>

	</body>

</html>