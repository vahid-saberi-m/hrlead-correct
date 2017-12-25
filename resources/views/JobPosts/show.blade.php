@extends('users.show')
@section('section')
    {{--    {{dd($jobpost->title)}}--}}
    <div class="col-lg-9 col-md-9 col-sm-9 pull-right"  style="background-image:url('/images/bck.jpg');min-height: 846px;">
        {{--<div class="container">--}}


        <div class="col-md-12">
            <div class="box box-success box-solid collapsed-box ">
                <div class="box-header with-border ">
                    <h3 class="box-title  "></h3>
                    <div class="box-tools pull-right ">
                        <button type="button" class="btn btn-box-tool " data-widget="collapse">
                            <strong>{{$jobpost->title}} </strong> <i class="fa fa-plus "></i>
                        </button>
                    </div>
                    <div class="col-md-2">
                        <a class="button btn-block btn-success" href="/jobposts/{{$jobpost->id}}/edit"> ویرایش
                        </a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body"  >
                    <div class="pull-right text-right">
                        <strong>شرح موقعیت شغلی</strong>
                        <hr>
                        {{$jobpost->description}}
                        <br> <br> <br> <br>
                        <strong>ویژگی های مورد نیاز</strong>
                        <hr>
                        {{$jobpost->requirements}}
                        <br> <br> <br> <br>
                        <strong>مزایا</strong>
                        <hr>
                        {{$jobpost->benefits}}
                        <br> <br> <br> <br>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="row">
            @foreach($cvfolders as $cvfolder)
                <div class="col-md-3 pull-left dropzone " id="{{$cvfolder->id}}" >
                    <div class="box box-info box-solid ">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{$cvfolder->name}}</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body " id="{{$cvfolder->id}}box" style="min-height: 546px;"  >
                                <div class="row>">
                                    <div class="col-md-12" >

                                        @foreach( $applications as $application)
                                            <div>
                                                @if($application->cv_folder_id == $cvfolder->id)
                                                    <div href="#chairs_modal" data-toggle="modal" data-target="#modal"
                                                       id="{{$application->id}}" class="application">
                                                        <div class="box">
                                                            <div class="box-body" onclick="">
                                                                <div class="row">
                                                                    <div class="col-md-9 pull-right ">
                                                                        <strong class="pull-right">{{$application->candidate->name}}</strong>
                                                                        <br>
                                                                        <p class="text-right">{{$application->candidate->position}}</p>
                                                                    </div>
                                                                    <div class="pull-left col-md-3">
                                                                        <small>{{$application->candidate->company}}</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>

                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="modal fade " id="modal" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">{{$jobpost->title}}</h4>
                    </div>
                    <div class="row" id="application">


                    </div>
                </div>
            </div>
        </div>
        <div id="test"><a href="">click me</a>

        </div>
        <div id="testresult">

        </div>

        <script>
            $(function() {
                // Change this selector to find whatever your 'boxes' are
                var boxes = $("div");

                // Set up click handlers for each box
                boxes.drop(function() {
                    var el = $(this), // The box that was clicked
                        max = 0;
                    // Find the highest z-index
                    boxes.each(function() {
                        // Find the current z-index value
                        var z = parseInt( $( this ).css( "z-index" ), 10 );
                        // Keep either the current max, or the current z-index, whichever is higher
                        max = Math.max( max, z );
                    });

                    // Set the box that was clicked to the highest z-index plus one
                    el.css("z-index", max + 1 );
                });
            });

        </script>

        <script>
            $(document).ready(function () {
                    $('.application').draggable({
                        helper: 'clone',
                    });
                    $('.dropzone').droppable({
                        drop:function (event,ui) {
                        var id= $(ui.draggable).attr('id');
                        var box=$(this).attr('id');
                        $.ajax({
                           url: '/application/'+id +'/'+box,
                            type:'GET',
                            data: {"cv_folder_id": box},
                            success: function (data) {
                                console.log(data);
                                $(ui.draggable).detach();
                                $('#'+box+'box').append(ui.draggable);
                                $('#'+box+'box').draggable({
                                    helper: 'clone'
                                });

                            }
                            , error: function (data) {
                                console.log(data);


                            }
                        });

                        }
                    });

                }
            )
        </script>



        <script>
            $(document).ready(
                $('.application').click(
            function () {
                var ids= $(this).attr('id');
                var url = '/apps/show/' + ids;
                $.ajax({url:url,
                    success: function (dat) {
                        // console.log(data);
                        $('#application').load(dat)
                    },
                    error: function (dat) {
                        console.log(dat);
                        $('#application').append('<br>' + data.statusText);

                    }
                });

            }
            ))


        </script>


        {{--<script>--}}
        {{--var url='/application/6'--}}
        {{--$('#test a').click(function (e) {--}}
        {{--e.preventDefault();--}}
        {{--$.ajax(url,{--}}
        {{--success: function (data) {--}}
        {{--console.log(data);--}}
        {{--$('#testresult').load(url)--}}
        {{--},--}}
        {{--error: function (data) {--}}
        {{--console.log(data);--}}
        {{--$('#testresult').append('<br>'+ data.statusText);--}}

        {{--}--}}
        {{--})--}}

        {{--// console.log('clicked');--}}
        {{--// $('#testresult').load(url, function (xhr) {--}}
        {{--//     console.log(xhr);--}}
        {{--//--}}
        {{--// })--}}
        {{--})--}}

        {{--</script>--}}

        {{--<script>--}}
        {{--function loadApp(str) {--}}
        {{--var xhttp;--}}

        {{--xhttp = new XMLHttpRequest();--}}
        {{--xhttp.onreadystatechange = function() {--}}
        {{--if (this.readyState == 4 && this.status == 200) {--}}
        {{--document.getElementById("application").innerHTML = this.responseXML;--}}
        {{--}--}}
        {{--};--}}
        {{--xhttp.open("GET", "applications/"+str, true);--}}
        {{--xhttp.send();--}}

        {{--}--}}

        {{--</script>--}}


    </div>
    <!-- Example row of columns -->

@endsection

{{--@include('JobPosts/partials/sidebar')--}}

