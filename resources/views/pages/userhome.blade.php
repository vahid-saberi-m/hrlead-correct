@extends('layouts/app')
@section('content')
    <html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>HR Lead</title>

    </head>

    <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">HR Lead</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

        <aside class="pmd-sidebar sidebar-custom sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-z-depth sidebar-hide-custom" role="navigation" style="position: absolute;">
            <ul class="nav pmd-sidebar-nav">
                <!-- My Account -->
                <li class="dropdown pmd-dropdown pmd-user-info">
                    <a aria-expanded="false" data-sidebar="true" data-toggle="dropdown" class="btn-user dropdown-toggle media" href="javascript:void(0);">
                        <div class="media-left">
                            <img width="40" height="40" alt="avatar" src="http://propeller.in/assets/images/avatar-icon-40x40.png">
                        </div>
                        <div class="media-body media-middle">D,Material Admin</div>
                        <div class="media-right media-middle"><i class="material-icons pmd-sm">more_vert</i></div>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="pmd-ripple-effect" href="javascript:void(0);" tabindex="-1"><i class="material-icons media-left media-middle">person</i> <span class="media-body">View Profile</span></a></li>
                        <li> <a class="pmd-ripple-effect" href="javascript:void(0);" tabindex="-1"><i class="material-icons media-left media-middle">settings</i> <span class="media-body">Settings</span></a></li>
                        <li> <a class="pmd-ripple-effect" href="javascript:void(0);" tabindex="-1"><i class="material-icons media-left media-middle">history</i> <span class="media-body">Logout</span></a></li>
                    </ul>
                </li>
                <li> <a class="pmd-ripple-effect" href="javascript:void(0);"><i class="material-icons media-left media-middle">delete</i> <span class="media-body">Trash</span></a> </li>
                <li> <a class="pmd-ripple-effect" href="javascript:void(0);"><i class="material-icons media-left media-middle">notifications</i> <span class="media-body">Spam</span></a> </li>
                <li> <a class="pmd-ripple-effect" href="javascript:void(0);"><i class="material-icons media-left media-middle">notifications</i> <span class="media-body">Follow Up</span></a> </li>
            </ul>
        </aside>

        <div class="row row-offcanvas row-offcanvas-right">

            <div class="col-xs-12 col-sm-9">
                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                </p>
                <div class="jumbotron">
                    <h1>{{auth()->user()-> name}}</h1>
                    <p>{{auth()->user()-> position}}</p>
                    <p>{{auth()->user()-> company ->name}}</p>
                </div>
                <div class="row">


                    {{--@foreach($cv_folders as $cv_folder )--}}
                    <div class="col-xs-6 col-lg-4">
                        {{--<h2>{{$cv_folder->name}}</h2>--}}
                        {{--<p>{{$cv_folders-> summary }} </p>--}}
                        {{--<p><a class="btn btn-default" href="#" role="button">View details »</a></p>--}}

                        {{--@endforeach--}}
                    </div>

                {{--</div><!--/row-->--}}
                <!--/.col-xs-12.col-sm-9-->

                    <div class="col-xs-6 col-sm-4 sidebar-offcanvas pull-right" id="sidebar">
                        <div class="list-group">
                            <a href="#" class="list-group-item active">آگهی های شغلی شما</a>
                            <?php $jobPosts = auth()->user()-> jobPosts; ?>
                            @foreach($jobPosts as $jobPost )
                                <a href="job_posts/{{$jobPost->id}}" class="list-group-item">{{$jobPost->title}}</a>
                            @endforeach
                        </div>
                    </div><!--/row-->
                </div><!--/row-->
            </div>
    </body> <!--/.sidebar-offcanvas-->
    {{--</div><!--/row-->--}}

    {{--<hr>--}}

    {{--<footer>--}}
    {{--<p>© 2016 Company, Inc.</p>--}}
    {{--</footer>--}}

    {{--</div><!--/.container-->--}}


    {{--<!-- Bootstrap core JavaScript--}}
    {{--================================================== -->--}}
    {{--<!-- Placed at the end of the document so the pages load faster -->--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
    {{--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>--}}
    {{--<script src="../../dist/js/bootstrap.min.js"></script>--}}
    {{--<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->--}}
    {{--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>--}}
    {{--<script src="offcanvas.js"></script>--}}

    </html>


@endsection