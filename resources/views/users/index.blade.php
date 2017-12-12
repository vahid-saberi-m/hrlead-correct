@extends('users.show')
@section('section')
    <div class="col-md-9 pull-right">
        @foreach($companyusers as $companyuser)
            @if($companyuser->role == 'admin')
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$companyuser->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-tools -->
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row>">
                        <div class="col-md-2  image " id="user-image">
                            <img src="/images/user images/{{$companyuser->image}}" class="user-image img-circle"
                                 height="70px">
                        </div>
                        <div class="col-md-4 text-center info">
                            <h2>{{$companyuser->name}}</h2>
                            <P>{{$companyuser->position}}</P>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-2 text-center">
                            {{--<BUTTON class="button-group">--}}
                            <span class="badge badge-pill badge-success">admin</span>
                            {{--<button type="button" class="btn btn-block btn-danger">لغو عضویت</button>--}}
                            {{--</BUTTON>--}}

                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        @foreach($companyusers as $companyuser)
            @if($companyuser->is_approved != 1 && $companyuser->role != 'admin')
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$companyuser->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row>">
                        <div class="col-md-2  image " id="user-image">
                            <img src="/images/user images/{{$companyuser->image}}" class="user-image img-circle"
                                 height="70px">
                        </div>
                        <div class="col-md-4 info">
                            <h2>{{$companyuser->name}}</h2>
                            <P>{{$companyuser->position}}</P>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <BUTTON class="button-group">
                                <form method="post"
                                      action="{{ route('users.approved', ['companyuser' => $companyuser->id ])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="approved" value="1">
                                    <div class="form-group">
                                        <button type="submit" class="btn  btn-success">تایید</button>
                                    </div>
                                </form>
                                <form method="post"
                                      action="{{ route('users.rejected', ['companyuser' => $companyuser->id ])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="approved" value="0">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-danger">رد</button>
                                    </div>
                                </form>
                            </BUTTON>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @endif
        @endforeach
        @foreach($companyusers as $companyuser)
            @if($companyuser->is_approved == 1 && $companyuser->role != 'admin')
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$companyuser->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row>">
                        <div class="col-md-2  image " id="user-image">
                            <img src="/images/user images/{{$companyuser->image}}" class="user-image img-circle"
                                 height="70px">
                        </div>
                        <div class="col-md-4 info">
                            <h2>{{$companyuser->name}}</h2>
                            <P>{{$companyuser->position}}</P>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-2">
                            <form method="post"
                                  action="{{ route('users.rejected', ['companyuser' => $companyuser->id ])}}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="approved" value="0">
                                <div class="form-group">
                                    <button type="submit" class="btn  btn-danger">لغو عضویت</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
            <!-- /.box -->
            @endif
        @endforeach
    </div>
@endsection