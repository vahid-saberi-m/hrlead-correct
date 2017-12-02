
<!DOCTYPE html>

<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Propeller Basic HTML Template</title>

    <!-- Bootstrap css-->


    <!--Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Propeller css -->
    <link href="css/propeller.min.css" rel="stylesheet">
</head>




<body>
<h1></h1>
<link href="{{ asset('css/propeller.min.css') }}" rel="stylesheet">

<!-- jQuery before Propeller.js -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/propeller.min.js"></script>
</body>
<<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
    <div class=".pmd-sidebar-right-fixed">
        <a href="#" class="list-group-item active">خانه</a>
        {{--<a href="/companies/{{$company->id}}/edit" class="list-group-item">اطلاعات صفحه اصلی</a>--}}
        <a href="/job_posts/create" class="list-group-item">add job post</a>
        <a href="/companies/{{$user->company_id,['user'=>$user]}}/edit" class="list-group-item">اطلاعات صفحه اصلی</a>
        {{--<a href="/JobPosts" class="list-group-item">آگهی های در انتظار تایید</a>--}}


            <a class="list-group-item"
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

            {{--<form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}"--}}
                  {{--method="POST" style="display: none;">--}}
                {{--<input type="hidden" name="_method" value="delete">--}}
                {{--{{ csrf_field() }}--}}
            {{--</form>--}}




        </>        <a href="#" class="list-group-item">add new user</a>
        <a href="#" class="list-group-item">کارکنان</a>
        <a href="#" class="list-group-item">کاربران</a>
        <a href="#" class="list-group-item">پروفایل</a>


    </div>
</div>

</html>
<aside class="pmd-sidebar sidebar-custom sidebar-default pmd-sidebar-left pmd-z-depth sidebar-hide-custom pmd-sidebar-left-fixed pmd-sidebar-open" role="navigation" style="position: absolute;">
    <ul class="nav pmd-sidebar-nav">
        </ul>
</aside>