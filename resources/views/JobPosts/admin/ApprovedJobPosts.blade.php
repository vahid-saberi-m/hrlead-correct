@extends('users.show')
@section('section')

    @foreach($jobposts as $jobpost)
        @if($jobpost->approval == 1 && $jobpost->is_active==1 )
            <div class="col-md-9 pull-right">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title pull-left">{{$jobpost->title}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="pull-left">
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
                            <div class="row">
                                <form method="post" action="{{route('jobposts.approved', [$jobpost])}}">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                    <div class="col-lg-6">
                                        {{--<input type="hidden" value="1" name="approval"/>--}}
                                        <button type="submit" class="btn btn-block btn-success">تایید</button>
                                    </div>

                                    <div class="col-lg-6">
                                        {{--<input type="hidden" value="0" name="approval"/>--}}
                                        <button type="submit" class="btn btn-block btn-danger">رد</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif
        @endforeach
        <div class="pull right">
        <h1>آگهی های منقضی شده:</h1>
        </div>

        @foreach($jobposts as $jobpost)
            @if($jobpost->approval == 1 && $jobpost->is_active!=1 )
                <div class="col-md-9 pull-right">
                    <div class="box box-default collapsed-box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title pull-left">{{$jobpost->title}} {{$jobpost->is_approved}}</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="pull-left">
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
                                <div class="row">
                                    <form method="post" action="{{route('jobposts.approved', [$jobpost])}}">
                                        {{csrf_field()}}
                                        {{ method_field('PUT') }}
                                        <div class="col-lg-6">
                                            {{--<input type="hidden" value="1" name="approval"/>--}}
                                            <button type="submit" class="btn btn-block btn-success">تایید</button>
                                        </div>

                                        <div class="col-lg-6">
                                            {{--<input type="hidden" value="0" name="approval"/>--}}
                                            <button type="submit" class="btn btn-block btn-danger">رد</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
    @endforeach
    <!-- /.box-body -->
    <!-- /.box -->
@endsection