@extends('app')
@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 pull-left" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html">
<form method="post" action="{{route('companies.update', [$company-> id])}}">
    <input type="hidden" name="_method" value="put">
    {{csrf_field()}}
        <div class="form-group">
            <lable for="company-name">نام شرکت</lable><span class="required">*</span></label>
                <input placeholder="نام شرکت را وارد نمایید"
                       id="company-name"
                       required
                       name="name"
                       spellcheck="false"
                       class="form-control"
                       value="{{$company->name}}"
                />
        </div>

    <div class="form-group">
        <lable for="company-size">تعداد کارکنان</lable><span class="required">*</span></label>
        <input placeholder=""
               id="company_size"
               required
               name="company_size"
               spellcheck="false"
               class="form-control"
               value="{{$company->company_size}}"
        />
    </div>


        <div class="form-group">
            <lable for="company-website">آدرس وبسایت</lable><span class="required">*</span></label>
            <input placeholder="example.com"
                   id="company-website"
                   required
                   name="website"
                   spellcheck="false"
                   class="form-control"
                   value="{{$company->website}}"
            />



    <div class="form-group">
        <lable for="company_slogan">شعار استخدامی</lable><span class="required">*</span></label>
        <input placeholder="کنار ما کار کنید"
                  id="company_slogan"
                  required
                  name="slogan"
                  spellcheck="false"
                  class="form-control"
                  value="{{$company->slogan}}"
        />
    </div>
            <div class="form-group">
                <lable for="company_logo">لوگوی شرکت</lable><span class="required">*</span></label>
                <input
                        type="file"
                       id="company_logo"
                       required
                       name="logo"
                       class="form-control"
                       value="{{$company->logo}}"
                />
            </div>
            <div class="form-group">
                <lable for="company_message_title">عنوان پیام</lable><span class="required">*</span></label>
                <input placeholder="در یک فضای خلاق در کنار ما باشید"
                       id="company_message_title"
                       required
                       name="message_title"
                       spellcheck="false"
                       class="form-control"
                       value="{{$company->message_title}}"
                />
            </div>

            <div class="form-group">
                <lable for="company_message_content">متن پیام</lable><span class="required">*</span></label>
                <textarea id="company_message_content"
                       required
                       name="message_content"
                       spellcheck="false"
                       class="form-control">
                    {{$company->message_content}}
                </textarea>
            </div>

            <div class="form-group">
                <lable for="main_photo">عکس اصلی صفحه</lable><span class="required">*</span></label>
                <input
                        type="file"
                        id="main_photo"
                        required
                        name="logo"
                        class="form-control"
                        value="{{$company->main_photo}}"
                />

                <div class="form-group">
                    <lable for="about_us">درباره ما</lable><span class="required">*</span></label>
                    <textarea id="about_us"
                              required
                              name="about_us"
                              spellcheck="false"
                              class="form-control">
                    {{$company->about_us}}
                </textarea>
                </div>

                <div class="form-group">
                    <lable for="why_us">چرا اینجا؟</lable><span class="required">*</span></label>
                    <textarea id="about_us"
                              required
                              name="why_us"
                              spellcheck="false"
                              class="form-control">
                    {{$company->why_us}}
                </textarea>
                </div>

                <div class="form-group">
                    <lable for="recruiting_steps">مراحل استخدام</lable><span class="required">*</span></label>
                    <textarea id="recruiting_steps"
                              required
                              name="recruiting_steps"
                              spellcheck="false"
                              class="form-control">
                    {{$company->recruiting_steps}}
                </textarea>
                </div>



                <div class="form-group">
                    <lable for="address">آدرس شرگت</lable><span class="required">*</span></label>
                    <input placeholder="در یک فضای خلاق در کنار ما باشید"
                           id="address"
                           required
                           name="address"
                           spellcheck="false"
                           class="form-control"
                           value="{{$company->address}}"
                    />
                </div>

                <div class="form-group">
                    <lable for="email">آدرس ایمیل</lable><span class="required">*</span></label>
                    <input placeholder="در یک فضای خلاق در کنار ما باشید"
                           id="email"
                           required
                           name="email"
                           spellcheck="false"
                           class="form-control"
                           value="{{$company->email}}"
                    />
                </div>

                <div class="form-group">
                    <lable for="phone_number">تلفن</lable><span class="required">*</span></label>
                    <input
                           id="phone_number"
                           required
                           name="phone_number"
                           spellcheck="false"
                           class="form-control"
                           value="{{$company->phone_number}}"
                    />
                </div>

                <div class="form-group">
                    <lable for="location">موقعیت</lable><span class="required">*</span></label>
                    <input
                            id="location"
                            required
                            name="phone_number"
                            spellcheck="false"
                            class="form-control"
                            value="{{$company->phone_number}}"
                    />
                </div>
                <div class="form-group">

                    <button type="submit">اعمال تغییرات</button>
                </div>












            <!-- Site footer -->
            <footer class="footer">

            </footer>


        @endsection


    <<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
        <div class="list-group">
            <a href="#" class="list-group-item active">خانه</a>
            <a href="/companies/{{$company->id}}/edit" class="list-group-item">edit</a>
            <a href="#" class="list-group-item">delete</a>
            <a href="#" class="list-group-item">add new user</a>
            {{--<a href="#" class="list-group-item">کارکنان</a>--}}
            {{--<a href="#" class="list-group-item">کاربران</a>--}}
            {{--<a href="#" class="list-group-item">پروفایل</a>--}}

        </div>
    </div>

