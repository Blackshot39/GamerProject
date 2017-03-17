
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - GamerProject</title>
 <link rel="icon" type="image/png" href="{{url('/').'/favicon.ico'}}" />
    <!-- Bootstrap Core CSS -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{url('css/perso.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    
    <!-- BaguetteBox CSS image -->
    <link href="{{url('css/baguetteBox.min.css')}}" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Administration du site</a>
            </div>
            <!-- /.navbar-header -->

           <!-- Partie buguer -->
           
           
           
           
 @if (Auth::check()==true)
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class="fa fa-external-link-square"></i> Site public</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Tableau de bord</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users"></i> Utilisateurs</a>
                        </li>
                        <li>                        
                            <a href="#"><i class="fa fa-newspaper-o"></i> Actualités<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Afficher</a> <!-- voir/modifier/supprimer-->
                                </li>
                                <li>
                                    <a href="#">Créer</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                        
                        <li>
                            <a href="#"><i class="fa fa fa-star"></i> Promotions<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Afficher</a> <!-- voir/modifier/supprimer-->
                                </li>
                                <li>
                                    <a href="#">Créer</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-quote-right"></i> Présentation entreprise (accueil)</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i> Moyens de contact</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-balance-scale"></i> Mentions légales</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-clock-o"></i> Horaires<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Afficher</a> <!-- voir/modifier/supprimer-->
                                </li>
                                <li>
                                    <a href="#">Ajouter</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar"></i> Période spéciales<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Afficher</a> <!-- voir/modifier/supprimer-->
                                </li>
                                <li>
                                    <a href="#">Ajouter</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-picture-o"></i> Images<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Afficher</a> <!-- voir/modifier/supprimer-->
                                </li>
                                <li>
                                    <a href="#">Créer</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-folder"></i> Galeries<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Afficher</a> <!-- voir/modifier/supprimer-->
                                </li>
                                <li>
                                    <a href="#">Créer</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            @endif
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">               
                <div class="row">
                    <div class="col-lg-12">
<!--                        <h1 class="page-header">Blank</h1>-->
<br/>
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
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{url('js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('js/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('js/sb-admin-2.js')}}"></script>

    <!-- BaguetteBox Script - https://github.com/feimosi/baguetteBox.js by feimosi -->
    <script src="{{url('js/baguetteBox.min.js')}}"></script>
    <script>
window.onload = function() {
//    if (typeof oldIE === 'undefined' && Object.keys) {
//        hljs.initHighlighting();
//    }
if ( typeof oldIE === 'undefined' && Object.keys && typeof hljs !== 'undefined') {
        hljs.initHighlighting();
   }

    baguetteBox.run('.baguetteBoxOne');
    baguetteBox.run('.baguetteBoxTwo');
    baguetteBox.run('.baguetteBoxThree', {
        animation: 'fadeIn',
        noScrollbars: true
    });
    baguetteBox.run('.baguetteBoxFour', {
        buttons: false
    });
    baguetteBox.run('.baguetteBoxFive', {
        captions: function(element) {
            return element.getElementsByTagName('img')[0].alt;
        }
    });
};
</script>
    

</body>

</html>
