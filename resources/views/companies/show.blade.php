@extends('layouts/app')
@section('content')



    <div class="callout callout-info">
        <a href="//{{$company->website}}">
            <img class="pull-right margin " src="/images/{{$company->logo}}" alt="{{$company->name}}"
                 style="width:82px;height:82px;border:2;">
        </a>
        <h1>{{$company->name}}</h1>
        <h4>{{$company->slogan}}</h4>

        <p></p>

    </div>


    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{$company->message_title}}</h3>
        </div>
        <div class="box-body">
            {{$company->message_content}}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">{{$company->name}} در یک نگاه</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    درباره ما
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body">
                                {{$company->about_us}}
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-danger">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    چرا اینجا؟
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                                {{$company->why_us}}
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    مراحل مصاحبه و استخدام
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="box-body">
                                {{$company->recruitment_steps}}
                            </div>
                        </div>
                    </div>

                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
                                    تماس با ما
                                </a>
                            </h4>
                        </div>
                        <div id="collapsefour" class="panel-collapse collapse">
                            <div class="box-body">
                                آدرس:{{$company->address}}
                                <br>
                                شماره تلفن: {{$company->phone_number}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    @foreach($JobPosts as $jobPost)
        <div class="col-md-12">
            <div class="box box-default box-solid collapsed-box ">
                <div class="box-header with-border ">
                    <h3 class="box-title  "></h3>
                    <div class="box-tools pull-right ">
                        <button type="button" class="btn btn-box-tool " data-widget="collapse">
                            {{$jobPost->title}} <i class="fa fa-plus "></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <strong>شرح موقعیت شغلی:</strong>
                    <hr>
                    {{$jobPost->description}}
                    <br> <br> <br> <br>
                    <strong>ویژگی های مورد نیاز</strong>
                    <hr>
                    {{$jobPost->requirements}}
                    <br> <br> <br> <br>
                    <strong>مزایا:</strong>
                    <hr>
                    {{$jobPost->benefits}}
                    <br> <br> <br> <br>
                    <button type="button" class="btn btn-social btn-google" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-google-plus  "></i> رزومه خود را بفرستید</button>
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
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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
    @endforeach




    {{--<div class="col-lg-9 col-md-9 col-sm-9 pull-right">--}}
    {{--<div class="container">--}}


    {{--<!-- The justified navigation menu is meant for single line per list item.--}}
    {{--Multiple lines will require custom code not provided by Bootstrap. -->--}}

    {{--<!-- Jumbotron -->--}}
    {{--<div class="jumbotron">--}}
    {{--<h1>{{$company->name}}</h1>--}}
    {{--<p class="lead">{{$company->slogan}}</p>--}}
    {{--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>--}}
    {{--</div>--}}

    {{--<!-- Example row of columns -->--}}
    {{--<div class="row">--}}
    {{--@foreach($company->job_posts as $job_post)--}}
    {{--<div class="col-lg-4">--}}
    {{--<h2>{{$job_post->title}}</h2>--}}
    {{--<p class="text-danger">{{$job_post->summary}}</p>--}}
    {{--<p><a class="btn btn-primary" href="/job_posts/{{$job_post->id}}" role="button">View details »</a></p>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--</div>--}}

    <!-- Site footer -->
    <footer class="footer">
        <p>powered by <a href="hrlead.ir>">HRLead.ir</a> </p>
    </footer>

    </div>
    </div>
    {{--@if(Auth::check() && auth()->user()->company_id == $company->id )--}}
    {{--@include('companies/partials/sidebar')--}}
    {{--@endif--}}
@endsection
