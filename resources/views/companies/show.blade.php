@extends('layouts/app')
@section('content')




    <div class="callout callout-info">
        <a href="//{{$company->website}}">
            <img class="pull-right margin " src="/images/logos/{{$company->logo}}" alt="{{$company->name}}"
                 style="width:82px;height:82px;border:2;">
        </a>
        <h1>{{$company->name}}</h1>
        <h4>{{$company->slogan}}</h4>
    </div>
    <div>

        <div class="row">

            <div class="carousel-inner">
                <div class="big-img " >
                        <div class="item active jumbotron text-center "
                             style="background-image: url(/images/companyImages/{{$company->main_photo}} ); background-size:100% ; height: 546px;">
                            <div class="container" style="">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-4 ">
                                        <div class="box" style="opacity: 0.9; width: 300px; height: 150px; ">
                                            <div class="carousel-content">
                                                <h2 class="animation animated-item-1">به <span>{{$company->name}}</span>
                                                    بپیوندید
                                                </h2>
                                                <p class="animation animated-item-2">{{$company->slogan}}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-12 text-right">
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

        @foreach($jobposts as $jobpost)
            @if($jobpost->approval == 1)
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
                        <div class="box-body text-right" style="">
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
                            <button type="button" class="btn btn-social btn-google" data-toggle="modal"
                                    data-target="#{{$jobpost->id}}">
                                <i class="fa fa-google-plus  "></i> رزومه خود را بفرستید
                            </button>
                            <div class="modal fade" id="{{$jobpost->id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">{{$jobpost->title}}</h4>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('candidate.apply', ['jobpost'=> $jobpost]) }}" method="post" enctype="multipart/form-data">
                                              {{ csrf_field() }}
                                              {{ method_field('POST') }}
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">ایمیل خود را وارد نمایید</label>
                                                  <input type="email" class="form-control"  id="exampleInputEmail1" name="email" placeholder="email" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">شماره تماس</label>
                                                  <input type="number" class="form-control" id="exampleInputEmail1" name="phone" placeholder="" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">رزومه شما</label>
                                                  <input type="file" class="form-control" id="cv" name="cv" placeholder="" required >
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">نام و نام خانوادگی</label>
                                                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">آخرین شرکتی که در آن فعالیت داشته اید</label>
                                                  <input type="text" class="form-control" name="company" id="exampleInputEmail1" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">عنوان شغلی</label>
                                                  <input type="text" class="form-control" name="position" id="exampleInputEmail1" required>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">چند سال سابقه کار دارید؟</label>
                                                  <input type="number" class="form-control" name="experience" id="exampleInputEmail1" required >
                                              </div>
                                              <div class="form-group">
                                                  <label>آخرین مدرک تحصیلی</label>
                                                  <select class="form-control" name="degree">
                                                      <option>دیپلم</option>
                                                      <option>کاردانی</option>
                                                      <option >کارشناسی</option>
                                                      <option>کارشناسی ارشد</option>
                                                      <option>دکتری</option>
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">رشته تحصیلی</label>
                                                  <input type="text" class="form-control" name="education" id="exampleInputEmail1" required >
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">دانشگاه محل تحصیل</label>
                                                  <input type="text" class="form-control" name="university" id="exampleInputEmail1" required >
                                              </div>

                                            <button type="submit" class="btn btn-primary pull-left">ثبت اطلاعات</button>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left"
                                                    data-dismiss="modal">خروج
                                            </button>
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
        @endif
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
            <p>powered by <a href="hrlead.ir>">HRLead.ir</a></p>
        </footer>

    </div>
    </div>
    {{--@if(Auth::check() && auth()->user()->company_id == $company->id )--}}
    {{--@include('companies/partials/sidebar')--}}
    {{--@endif--}}
@endsection
