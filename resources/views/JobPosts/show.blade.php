@extends('layouts/app')
@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 pull-left">
        <div class="container">




            <!-- The justified navigation menu is meant for single line per list item.
                 Multiple lines will require custom code not provided by Bootstrap. -->

            <!-- Jumbotron -->
            <div class="jumbotron">
                <h1>{{$JobPost->title}}</h1>
                <p class="lead">{{$JobPost->summary}}</p>
                {{--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>--}}
            </div>

            <div>
                <?php
                //                $id= $JobPost->id;
                use App\Models\JobPost;
                //                    $cv_folders = $JobPost-> user-> JobPosts->map(function($JobPost){
                //                          return $JobPost->cv_folders;
                //                    });
                //                $cv_folders = $JobPost->cv_folder;
                ?>

                @foreach($JobPost->cv_folders as $cv_folder)
                    <h1>{{$cv_folder->name}}</h1>
                    <p>id: {{$cv_folder->id}}</p>
                    <p class="lead">{{$cv_folder->user_id}}</p>
                @endforeach

                @foreach($cvFolders as $cvFolder)
                    <h1>{{$cv_folder->name}}</h1>
                    <p>id: {{$cv_folder->id}}</p>
                    <p class="lead">{{$cv_folder->user_id}}</p>
                @endforeach


            </div>
            <!-- Example row of columns -->
            <div class="row">
                {{--@foreach($JobPosts as $JobPost)--}}
                {{--<div class="col-lg-4">--}}
                {{--<h2>{{$JobPost->title}}</h2>--}}
                {{--<p class="text-danger">{{$JobPost->summary}}</p>--}}
                {{--<p><a class="btn btn-primary" href="/JobPosts/{{$JobPost->id}}" role="button">View details »</a></p>--}}
                {{--</div>--}}
                {{--@endforeach--}}
            </div>

            <!-- Site footer -->
            <footer class="footer">
                <p>© 2016 Company, Inc.</p>
            </footer>

        </div>
    </div>
@endsection

{{--@include('JobPosts/partials/sidebar')--}}

