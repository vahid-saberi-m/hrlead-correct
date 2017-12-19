@extends('users.show')
@section('section')
    <div class="row">
        <div class="col-md-9 pull-right">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$user->name}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('user.update', [$user-> id])}}" method="post">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">ایمیل</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
                                       value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">پسوورد</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                                       value="{{$user->password}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPosition" class="col-sm-2 control-label">پوزیشن</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPosition" placeholder="پوزیشن"
                                       value="{{$user->position}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="inputImage" class="col-sm-2 control-label">عکس</label>
                                <div class="col-md-5">
                                    <input type="file" class="form-control" id="inputImage" value="{{$user->image}}">
                                </div>
                                <div class="col-md-7 ">
                                    <img src="/images/user images/{{$user->image}}"
                                         class="user-image img-circle pull-right" height="90px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-info pull-right">Sign in</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>

        </div>

    </div>







@endsection
