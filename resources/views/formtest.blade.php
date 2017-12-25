@extends('layouts.app')
@section('content')
<form action="/candidate/checkemail/4" method="post">
{{csrf_token()}}
    {{ csrf_field() }}
    <div class="form-group" >
        <label for="exampleInputEmail1">ایمیل خود را وارد نمایید</label>
        <input type="email" class="form-control" id="Email1" name="email" placeholder="email"
               required>
    </div>

    <button  type="submit" id="" class="btn btn-primary btn-submit pull-left" onsubmit="checkEmail()">ثبت اطلاعات</button>
</form>
    @endsection