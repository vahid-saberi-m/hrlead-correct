@extends('app')
@section('content')
<div class="col-md-6 col-lg-6 col-md-offset-3">
    <div class="panel panel-primary  ">
        <div class="panel-heading">job posts <a  class="pull-right btn btn-primary btn-sm" href="/job_posts/create">
                <i class="fa fa-plus-square" aria-hidden="true"></i>  Create new</a> </div>

            <div class="panel-body">
            <ul class="list-group">
                @foreach($job_posts as $job_post)
                    <li class="list-group-item"><a href="job_posts/{{$job_post->id}}"> {{$job_post->title}} </a></li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
@endsection
