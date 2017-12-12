@extends('users.show')
@section('section')
    @foreach($jobposts as $jobpost)
        @if($jobpost->approval != 1)
            <div class="col-md-9 pull-right">
                <div class="box box-warning">
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
                                <form method="post" action="{{ route('jobposts.approved', ['job_post' => $jobpost->id ])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="approved" value="1">
                                    <div class="form-group">
                                        <button type="submit" class="btn  btn-success">تایید</button>
                                    </div>
                                </form>
                                <form method="post" action="{{ route('jobposts.rejected', ['job_post' => $jobpost->id ])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="approved" value="0">
                                    <div class="form-group">
                                        <button type="submit" class="btn  btn-danger">رد</button>
                                    </div>
                                </form>
                                {{--<form method="post" action="{{route('jobposts.approved', [$jobpost-> id])}}">--}}
                                    {{--<input type="hidden" name="_method" value="patch">--}}
                                    {{--<input type="hidden" name="approved" value="1">--}}
                                {{--<form method="post" action="{{route('jobposts.approved', [$jobpost])}}">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--<div class="form-group">--}}
                                        {{--<input type="hidden" value="1" name="approval"/>--}}
                                        {{--<button type="submit" class="btn btn-block btn-success">تایید</button>--}}
                                    {{--</div>--}}
                                {{--</form>--}}

                                    {{--<div class="col-lg-6">--}}
                                        {{--<input type="hidden" value="0" name="approval"/>--}}
                                        {{--<button type="submit" class="btn btn-block btn-danger">رد</button>--}}
                                    {{--</div>--}}

                                {{--</form>--}}
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