@extends('users.show')
@section('section')
        @foreach($users as $user)
            <div class="col-md-9 pull-right">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$user->name}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                            <div class="pull-left image">
                        <img src="/images/user images/{{$user->image}}" class="user-image img-circle" height="70px">
                            </div>
                        <div class="info">
                            <h2>{{$user->name}}</h2>
                            <h3>{{$user->position}}</h3>
                            <div class="col-md-9" >

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        @endforeach

    @endsection