@extends('users.show')
@section('section')
    @foreach($jobposts as $jobpost)
        @if($jobpost->approval != 1)
            <div class="col-md-9 pull-right text-right	">
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
                            <div class="row">
                                <div class=" col-md-3">
                                    <form method="post"
                                          action="{{ route('jobposts.approved', ['job_post' => $jobpost->id ])}}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <input type="hidden" name="approved" value="1">
                                        <div class="form-group">
                                            <button type="submit" class="btn  btn-success">تایید</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="pull-right col-md-6"></div>
                                <div class=" col-md-3">
                                    <form method="post"
                                          action="{{ route('jobposts.rejected', ['job_post' => $jobpost->id ])}}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <input type="hidden" name="approved" value="0">
                                        <div class="form-group">
                                            <button type="submit" class="btn  btn-danger">رد</button>
                                        </div>
                                    </form>
                                </div>
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