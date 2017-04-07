<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title id="titre">Lucid</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{url('css/front.css')}}" />
        <link rel="stylesheet" href="{{url('css/perso.css')}}" />
         <!-- Custom Fonts -->
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<!-- DataTable (filtertable)-->
    

    
    
	<script src="{{url('js/jquery.min.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>
	<script src="{{url('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('js/dataTables.bootstrap.min.js')}}"></script>
	<script> //script pour les DataTables (tableau dynamique)
            $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
	
</head>
<body>
<div class="wrapper">
	<header class="header">
		<nav class="navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav">
						<span class="sr-only">Toggle navigation</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>
					</button>

					<a  class="navbar-brand" href="{{route('homePublic.index')}}">GamerProject</a>
                                        
				</div><!-- /.navbar-header -->

				<div class="collapse navbar-collapse" id="nav">
					<ul class="nav navbar-nav navbar-right">
						<li class="active">
							<a href="{{route('homePublic.index')}}">Home</a>
						</li>
						
						<li>
							<a href="#section-features">Forum</a>
						</li>
						
						<li>
							<a href="{{route('jeu.indexFront')}}">Jeux</a>
						</li>
						
						<li>
							<a href="#section-testimonials">Testimonials</a>
						</li>
						
						<li>
							<a href="#section-pricing">Pricing</a>
						</li>
						
						<li>
							<a href="#section-contacts">Contact</a>
						</li>
                                                <li>
							<a href="{{route('login')}}">Login</a>
						</li>
					</ul>
				</div>
			</div><!-- /.container -->
		</nav><!-- /.navbar navbar-default -->

		@if (Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error') }}
                </div>
                @endif
                
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success') }}
                </div>
                @endif

                 @if (Session::has('warning'))
                <div class="alert alert-warning">
                    {{Session::get('warning') }}
                </div>
                @endif
                
		 @yield('content')

	

	<footer class="footer">
		<div class="container">
			<div class="footer-socials">
				<ul>
					<li>
						<a href="#" class="link-behance">behance</a>
					</li>
					
					<li>
						<a href="#" class="link-dribble">dribble</a>
					</li>
					
					<li>
						<a href="#" class="link-twitter">twitter</a>
					</li>
					
					<li>
						<a href="#" class="link-facebook">facebook</a>
					</li>
					
					<li>
						<a href="#" class="link-linkedin">linkedin</a>
					</li>
				</ul>
			</div><!-- /.footer-socials -->

			<p class="copyright">Copyright &copy; 2014 <a href="http://www.lucidsitedesigns.com/">Lucid</a> Onepage Theme</p><!-- /.copyright -->
		</div><!-- /.container -->
	</footer><!-- /.footer -->
</div><!-- /.wrapper -->
</body>
</html>

