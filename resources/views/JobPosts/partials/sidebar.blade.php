<<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
    <div class="list-group">
        {{--<a href="#" class="list-group-item active">خانه</a>--}}
        {{--<a href="/companies/{{$company->id}}/edit" class="list-group-item">edit</a>--}}
        {{--<a href="/JobPosts/create" class="list-group-item">add job post</a>--}}
        {{--<li>--}}


            {{--<a--}}
                    {{--href="#"--}}
                    {{--onclick="--}}
                  {{--var result = confirm('Are you sure you wish to delete this Company?');--}}
                      {{--if( result ){--}}
                              {{--event.preventDefault();--}}
                              {{--document.getElementById('delete-form').submit();--}}
                      {{--}--}}
                          {{--"--}}
            {{-->--}}
                {{--Delete--}}
            {{--</a>--}}
        @foreach($job_posts-> user_id == auth::user()->id() )
            <div class="col-md-6 col-lg-6 col-md-offset-3">
                <div class="panel panel-primary  ">
                    <div class="panel-heading">job posts <a  class="pull-right btn btn-primary btn-sm" href="/job_posts/create">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>  Create new</a> </div>

                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($job_posts as $job_post)
                                <li class="list-group-item"><a href="job_posts/{{$job_post->id}}"> {{$job_post->title}} </a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

            {{--<form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}"--}}
                  {{--method="POST" style="display: none;">--}}
                {{--<input type="hidden" name="_method" value="delete">--}}
                {{--{{ csrf_field() }}--}}
            {{--</form>--}}




        {{--</li>        <a href="#" class="list-group-item">add new user</a>--}}
        {{--<a href="#" class="list-group-item">کارکنان</a>--}}
        {{--<a href="#" class="list-group-item">کاربران</a>--}}
        {{--<a href="#" class="list-group-item">پروفایل</a>--}}

    </div>
</div>

