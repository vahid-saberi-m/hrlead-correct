@extends('users.show')
@section('section')


    <section class=" col-md-9 pull-right">
        <div class="well  text-right">
            <strong>
                آگهی های فعال
            </strong>
        </div>
        @foreach($jobposts as $jobpost)
            @if($jobpost->approval == 1 && $jobpost->is_active==1 )
                <div>

                    <div class="box box-success text-right	">
                        <div class="box-header with-border">
                            <a href="/jobposts/{{$jobpost->id}}">
                                <h3 class="box-title pull-right">{{$jobpost->title}}</h3>

                            </a>
                            <div class="pull-left ">
                                <div class="box-tools ">
                                    <button type="button" class="btn btn-box-tool " data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="pull-right">
                                <strong>شرح موقعیت شغلی</strong>
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
                                    <div class="pull-right col-md-6"></div>
                                    <div class=" col-md-3">
                                        <form method="post"
                                              action="{{ route('jobposts.rejected', ['job_post' => $jobpost->id ])}}">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <input type="hidden" name="approved" value="0">
                                            <div class="form-group">
                                                <button type="submit" class="btn  btn-danger">اعلام انقضا</button>
                                            </div>
                                        </form>
                                        <a href="/jobposts/{{$jobpost->id}}/edit"><button type="button"  class="btn  btn-warning">ویرایش</button></a>
                                    </div>

                                </div>
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>{{$jobpost->Applications()->count()}}</th>
                                        <th>تعداد رزومه های دریافتی</th>
                                    </tr>
                                    </tbody>
                                    <td><strong> {{$jobpost->user->name}}</strong></td>
                                    <td><strong>منتشر کننده </strong></td>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            @endif
        @endforeach
        <div class="well  text-right">
            <strong>
                آگهی های منقضی شده
            </strong>
        </div>
        <div></div>

        @foreach($jobposts as $jobpost)
            @if($jobpost->approval == 1 && $jobpost->is_active!=1 )
                <section class="box box-default collapsed-box box-solid text-right col-md-9	">
                    <div class="box-header with-border">
                        <a href="/jobposts/{{$jobpost->id}}">
                            <h3 class="box-title pull-right">{{$jobpost->title}}</h3>

                        </a>

                        <div class="pull-left ">
                            <div class="box-tools ">
                                <button type="button" class="btn btn-box-tool " data-widget="collapse">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
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
                                <div class="pull-right col-md-6"></div>
                                <div class=" col-md-3">
                                    <form method="post"
                                          action="{{ route('jobposts.reactive', ['job_post' => $jobpost->id ])}}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <input type="hidden" name="approved" value="0">
                                        <label class="pull-right" for="date"><strong> تا تاریخ:</strong></label>
                                        <input type="date" name="expiration_date" id="date">
                                        <div class="form-group">
                                            <button type="submit" class="btn  btn-success">بازنشر</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach
    </section>

    <!-- /.box-body -->
    <!-- /.box -->
@endsection