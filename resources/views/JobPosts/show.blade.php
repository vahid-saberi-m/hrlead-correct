@extends('users.show')
@section('section')
    {{--    {{dd($jobpost->title)}}--}}
    <div class="col-lg-9 col-md-9 col-sm-9 pull-right">
        {{--<div class="container">--}}


        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box ">
                <div class="box-header with-border ">
                    <h3 class="box-title  "></h3>
                    <div class="box-tools pull-right ">
                        <button type="button" class="btn btn-box-tool " data-widget="collapse">
                            {{$jobpost->title}} <i class="fa fa-plus "></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <div class="pull-right">
                        <strong>شرح موقعیت شغلی:</strong>
                        <hr>
                        {{$jobpost->description}}
                        <br> <br> <br> <br>
                        <strong>ویژگی های مورد نیاز</strong>
                        <hr>
                        {{$jobpost->requirements}}
                        <br> <br> <br> <br>
                        <strong>مزایا:</strong>
                        <hr>
                        {{$jobpost->benefits}}
                        <br> <br> <br> <br>
                    </div>
                    <div class="modal fade" id="modal-default" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Default Modal</h4>
                                </div>
                                <div class="modal-body">
                                    <p>One fine body…</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close
                                    </button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


        {{--@foreach($jobpost->cv_folders as $cv_folder)--}}
        {{--<h1>{{$cv_folder->name}}</h1>--}}
        {{--<p>id: {{$cv_folder->id}}</p>--}}
        {{--<p class="lead">{{$cv_folder->user_id}}</p>--}}
        {{--@endforeach--}}

        @foreach($cvfolders as $cvFolder)
            <h1>{{$cvFolder->name}}</h1>
            <p>id: {{$cvFolder->id}}</p>
            <p class="lead">{{$cvFolder->user_id}}</p>
        @endforeach


    </div>
    <!-- Example row of columns -->
    <div class="row">
        {{--@foreach($jobposts as $jobpost)--}}
        {{--<div class="col-lg-4">--}}
        {{--<h2>{{$jobpost->title}}</h2>--}}
        {{--<p class="text-danger">{{$jobpost->summary}}</p>--}}
        {{--<p><a class="btn btn-primary" href="/JobPosts/{{$jobpost->id}}" role="button">View details »</a></p>--}}
        {{--</div>--}}
        {{--@endforeach--}}
    </div>

    <!-- Site footer -->
    <footer class="footer">
        <p></p>
    </footer>

    </div>
    </div>
@endsection

{{--@include('JobPosts/partials/sidebar')--}}

