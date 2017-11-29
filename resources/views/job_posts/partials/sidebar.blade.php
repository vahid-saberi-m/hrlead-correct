<<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
    <div class="list-group">
        <a href="#" class="list-group-item active">خانه</a>
        <a href="/companies/{{$company->id}}/edit" class="list-group-item">edit</a>
        <a href="/job_posts/create" class="list-group-item">add job post</a>
        <li>


            <a
                    href="#"
                    onclick="
                  var result = confirm('Are you sure you wish to delete this Company?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
            >
                Delete
            </a>

            <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}"
                  method="POST" style="display: none;">
                <input type="hidden" name="_method" value="delete">
                {{ csrf_field() }}
            </form>




        </li>        <a href="#" class="list-group-item">add new user</a>
        {{--<a href="#" class="list-group-item">کارکنان</a>--}}
        {{--<a href="#" class="list-group-item">کاربران</a>--}}
        {{--<a href="#" class="list-group-item">پروفایل</a>--}}

    </div>
</div>

