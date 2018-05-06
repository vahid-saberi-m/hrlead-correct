@foreach($jobposts as $jobpost)
    @if($jobpost->approval == 0)
        <div class="col-md-9  text-right" dir="rtl">
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
                                <button type="button" class="btn approval btn-success" value="1" id="{{$jobpost->id}}">تایید</button>
                            </div>
                            <div class=" col-md-3">
                                <button type="button" class="btn approval btn-danger" value="2" id="{{$jobpost->id}}">رد</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
@endforeach
@foreach($jobposts as $jobpost)
    @if($jobpost->approval == 2)
        <div class="col-md-9  text-right" dir="rtl">
            <div class="box box-danger">
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
                                <button type="button" class="btn approval btn-success" value="1" id="{{$jobpost->id}}">انتشار</button>
                            </div>
                            <div class=" col-md-3">
                                <button type="button" class="btn delete btn-danger" value="2" id="{{$jobpost->id}}">حذف</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
@endforeach
<script>
    $('.approval ').click(function (e) {
        e.preventDefault();
        var status= $(this).attr('value');
        var id= $(this).attr('id');
        var data = {
            "_token": "{{ csrf_token() }}",
            approval: status
        };
        var url = '/jobposts/' + id + '/approval' ;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: data,
            success: function (mydata) {
                $mydata = $(mydata);
                $('#section1' ).fadeOut().html($mydata).fadeIn();
                // alert(data.success);
            },
            failure: function (t) {
                console.log(t)
            }

        });


    })
</script>

<script>
    $('.delete ').click(function (e) {
        e.preventDefault();
        var id= $(this).attr('id');
        var data = {
            "_token": "{{ csrf_token() }}",
        };
        var url = '/jobposts/' + id + '/delete' ;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: url,
            data: data,
            success: function (mydata) {
                $mydata = $(mydata);
                $('#section1' ).fadeOut().html($mydata).fadeIn();
            },
            failure: function (t) {
                console.log(t)
            }

        });
    })
</script>