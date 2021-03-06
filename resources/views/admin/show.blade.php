@extends('app')
@section('content')
<div class="col-lg-9 col-md-9 col-sm-9 pull-left">
        <div class="container">


        <!-- The justified navigation menu is meant for single line per list item.
             Multiple lines will require custom code not provided by Bootstrap. -->

        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>{{$user->name}}</h1>
            <p class="lead">{{$user->position}}</p>
            {{--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>--}}
        </div>

        <!-- Example row of columns -->
        <div class="row">
            @foreach($user->job_posts as $job_post)
                <div class="col-lg-4">
                    <h2>{{$job_post->title}}</h2>
                    <p class="text-danger">{{$job_post->summary}}</p>
                    <p><a class="btn btn-primary" href="/JobPosts/{{$job_post->id}}" role="button">View details »</a></p>
                </div>
            @endforeach
        </div>

        <!-- Site footer -->
        <footer class="footer">
            <p>© 2016 Company, Inc.</p>
        </footer>

    </div>
        @endsection
</div>

@include('admin/partials/sidebar')

