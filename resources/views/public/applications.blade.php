

    <div class="col-md-4 pull-right">
        <div id="currentCandidate">
            <div class="box">
                <div class="pull-right">
                    <strong> {{$candidate->name}} </strong>
                    <span><p>{{$candidate->education}}</p></span>
                    <p>> سابقه کار: {{$candidate->experience}} سال</p>
                </div>
                <div class="pull-left">
                    <strong>{{$candidate->company}}</strong>
                    <br> {{$candidate->position}}
                </div>
            </div>
            <div class="box">
                <div class="row">
                    {{--@foreach($cvfolders as $folder)--}}
                        {{--@if($folder->id != $cvfolder->id)--}}

                            {{--<button class="btn btn-info btn-xs col-sm-4" id="cvfolder"--}}
                                    {{--onclick="cvFolderUpdate('{{$application->id}}','{{$folder->id}}')">{{$folder->name}}</button>--}}

                        {{--@endif--}}
                    {{--@endforeach--}}
                </div>
            </div>
        </div>
        <hr>
        <div class="box  ">
            <div class="box-body">
                <div class="row>">
                    <div class="col-md-12">

                        @foreach( $applications as $app)
                            <div>
                                <a href=""
                                   onclick="">
                                    <div class="box">
                                        <div class="box-body" onclick="">
                                            <div class="row">
                                                <div class="col-md-9 pull-right ">
                                                    <strong class="pull-right">{{$app->candidate->name}}</strong>
                                                    <br>
                                                    <p class="text-right">{{$app->candidate->position}}</p>
                                                </div>
                                                <div class="pull-left col-md-3">
                                                    <small>{{$app->candidate->company}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-4"></div>
                {{$application->id}}
            </div>
        </div>


    </div>
    </div>
    <script>
        function cvFolderUpdate(applicationId, cvfolderid) {
            $('#cvfolder').click(function () {
                var newcvfolder = '/application/' + applicationId + '/' + cvfolderid;
                $.ajax({
                    url: newcvfolder,
                    type: 'GET' ,
                    data: {"cv_folder_id": cvfolderid},
                    success: function (data) {
                        console.log(data);
                        $('#currentCandidate').hide();

                    }
                    , error: function (data) {
                        console.log(data);


                    }

                })

            })


        }
    </script>
