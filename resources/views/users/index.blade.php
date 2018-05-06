<div class="col-md-9 pull-right">
    @foreach($admins as $admin)
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">{{$admin->name}}</h3>

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
                        <img src="/images/user images/{{$admin->image}}" class="user-image img-circle"
                             height="70px">
                    </div>
                    <div class="col-md-4 text-center info">
                        <h2>{{$admin->name}}</h2>
                        <P>{{$admin->position}}</P>
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
    @endforeach
    @foreach($weightingUsers as $weightingUser)
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">{{$weightingUser->name}}</h3>

                <div class="box-tools ">
                    <button type="button" class="btn btn-box-tool pull-left " data-widget="collapse"><i
                                class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row>">
                    <div class="col-md-2  image " id="user-image">
                        <img src="/images/user images/{{$weightingUser->image}}" class="user-image img-circle"
                             height="70px">
                    </div>
                    <div class="col-md-4 info">
                        <h2>{{$weightingUser->name}}</h2>
                        <P>{{$weightingUser->position}}</P>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="button" id="{{$weightingUser->id}}" class="approval btn btn-block btn-success"
                                    value="1">تایید
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="button" id="{{$weightingUser->id}}" class="approval btn btn-block btn-danger"
                                    value="0">رد
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    @endforeach
    <div id="approved">
        @foreach($companyUsers as $companyUser)
            @if($companyUser->is_approved == 1 && $companyUser->role != 'admin')
                <div class="box box-info box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$companyUser->name}}</h3>

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
                                <img src="/images/user images/{{$companyUser->image}}" class="user-image img-circle" height="70px">
                            </div>
                            <div class="col-md-4 info">
                                <h2>{{$companyUser->name}}</h2>
                                <P>{{$companyUser->position}}</P>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="approved" value="0">
                                <div class="form-group">
                                    <button type="submit" class="btn  btn-danger">لغو عضویت</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<script>
    $('.approval').click(function () {
        var url = '/users/' + $(this).attr('id') + '/approval';
        var approval = $(this).attr('value');
        1
        var data = {
            approval: approval
        };
        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: data,
            success: function (mydata) {
                // $('#section1' ).fadeOut().html(mydata).fadeIn();
                alert('ok');
            },
            failure: function (t) {
                console.log(t)
            }

        });
    })
</script>