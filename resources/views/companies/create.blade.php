@extends('layouts/app')
@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 pull-left" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html">
        <form method="post" action="{{route('companies.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{--<div class="form-group">--}}
                <lable for="company-name">نام شرکت</lable><span class="required">*</span></label>
                <input placeholder="نام شرکت را وارد نمایید"
                       id="company-name"
                       required
                       name="name"
                       spellcheck="false"
                       class="form-control"

                />


            <div class="form-group">
                <lable for="company-size">تعداد کارکنان</lable><span class="required">*</span></label>
                <input placeholder=""
                       id="company_size"
                       required
                       name="company_size"
                       spellcheck="false"
                       class="form-control"

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

                />
                </div>



                <div class="form-group">
                    <lable for="company_slogan">شعار استخدامی</lable><span class="required">*</span></label>
                    <input placeholder="کنار ما کار کنید"
                           id="company_slogan"
                           required
                           name="slogan"
                           spellcheck="false"
                           class="form-control"

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

                    />
                </div>

                <div class="form-group">
                    <lable for="company_message_content">متن پیام</lable><span class="required">*</span></label>
                    <textarea id="company_message_content"
                              required
                              name="message_content"
                              spellcheck="false"
                              class="form-control">
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
                    />

                    <div class="form-group">
                        <lable for="about_us">درباره ما</lable><span class="required">*</span></label>
                        <textarea id="about_us"
                                  required
                                  name="about_us"
                                  spellcheck="false"
                                  class="form-control">
                </textarea>
                    </div>

                    <div class="form-group">
                        <lable for="why_us">چرا اینجا؟</lable><span class="required">*</span></label>
                        <textarea id="about_us"
                                  required
                                  name="why_us"
                                  spellcheck="false"
                                  class="form-control">
                </textarea>
                    </div>

                    <div class="form-group">
                        <lable for="recruiting_steps">مراحل استخدام</lable><span class="required">*</span></label>
                        <textarea id="recruiting_steps"
                                  required
                                  name="recruiting_steps"
                                  spellcheck="false"
                                  class="form-control">
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
                        />
                    </div>
                    <div class="form-group">

                        <button type="submit">اعمال تغییرات</button>
                    </div>
            </div>
        </form>
    </div>
                    <!-- Site footer -->
                    <footer class="footer">

                    </footer>

                    @endsection


                   {{--@include('companies/partials/sidebar')--}}

