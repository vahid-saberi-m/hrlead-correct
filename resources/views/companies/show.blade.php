@extends('layouts/app')
@section('content')

    <div class="callout callout-info text-right">
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
                <div class="big-img ">
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
    @foreach($jobPosts as $joPpost)
        @if($jobPost->approval == 1)
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
                    <div class="box-body text-right" style="">
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
                        <button type="button" class="btn btn-social apply btn-google" data-toggle="modal"
                                data-target=".modal" id="{{$jobPost->id}}" value="{{$jobPost->title}}" >
                            <i class="fa fa-google-plus  "></i> رزومه خود را بفرستید
                        </button>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        @endif
    @endforeach
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border text-right">
                <h3 class="box-title ">اخبار و رویدادها</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach($events as $event)
                        <div class="item">
                            <img src="/{{$event->main_photo}}"text="{{$event->title}}"  >
                            <div class="carousel-caption">
                                First Slide
                            </div>
                        </div>
                        @endforeach
                        <div class="item">
                            <img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">

                            <div class="carousel-caption">
                                Second Slide
                            </div>
                        </div>
                        <div class="item active">
                            <img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">

                            <div class="carousel-caption">
                                Third Slide
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
                    </a>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="modal fade" id="" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <strong id="header"></strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" id="modal">
                    <form class="form">
                        <div class="form-group">
                            {{csrf_field()}}
                            <label for="exampleInputEmail1">ایمیل خود را وارد نمایید</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="email"
                                   required>
                        </div>

                        <button type="button" id="" class="btn btn-primary btn-submit pull-left">
                            ثبت اطلاعات
                        </button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Site footer -->
    <footer class="footer">
        {{--<p>powered by <a href="hrlead.ir>">HRLead.ir</a></p>--}}
    </footer>
    <script>
        $('.apply').click( function () {
            var id= $(this).attr('id');
            var title= $(this).attr('value');
            $('#header').html( title );
            $('.btn-primary').attr('id', id)
            }

        )
    </script>
    <script type="text/javascript">
        $(".btn-submit").click(function (e) {
            e.preventDefault();
            var jobpost = $(this).attr('id');
            var email = $('#email').val();
            var data = {"_token": "{{ csrf_token() }}", email: email};
            var url = '/candidate/checkemail/' + jobpost;
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function (mydata) {
                    $mydata = $(mydata);
                    $('.modal-body').fadeOut().html($mydata).fadeIn();
                    // alert(data.success);
                }

            });


        });

    </script>
    <script>
        function checkEmail(id) {
            console.log(id);
        }
    </script>

@endsection
