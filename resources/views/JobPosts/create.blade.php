@extends('layouts/app')
@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 pull-left" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html">
        <form method="post" action="{{route('jobposts.store')}}">
            {{csrf_field()}}
            {{--<div class="form-group">--}}
                <lable for="job_post_title">عنوان شغل</lable><span class="required">*</span></label>
                <input placeholder=""
                       id="job_post_title"
                       required
                       name="job_post_title"
                       spellcheck="false"
                       class="form-control"

                />
            <input type="hidden"
                   name="company_id"
                   value="{{$company_id}}"

            />

            <lable for="location">موقعیت مکانی</lable><span class="required">*</span></label>
            <input placeholder=""
                   id="location"
                   required
                   name="location"
                   spellcheck="false"
                   class="form-control"
                   value="تهران"
            />



            <div class="form-group">
                <lable for="summary">پیش نمایش</lable><span class="required">*</span></label>
                <input placeholder=""
                       id="summary"
                       required
                       name="summary"
                       spellcheck="false"
                       class="form-control"

                />
            </div>

            <div class="form-group">
                <lable for="description">شرح شغل</lable><span class="required">*</span></label>
                <textarea id="description"
                          required
                          name="description"
                          spellcheck="false"
                          class="form-control">
                </textarea>
            </div>

            <div class="form-group">
                <lable for="requirements">ویژگی های مورد نیاز</lable><span class="required">*</span></label>
                <textarea id="requirements"
                          required
                          name="requirements"
                          spellcheck="false"
                          class="form-control">
                </textarea>
            </div>


                <div class="form-group">
                    <lable for="benefits">مزایا</lable><span class="required">*</span></label>
                    <textarea id="benefits"
                              required
                              name="benefits"
                              spellcheck="false"
                              class="form-control">
                </textarea>
                </div>

                <div class="form-group">
                    <lable for="publish_date">تاریخ انتشار</lable><span class="required">*</span></label>
                    <input
                            type="date"
                            id="publish_date"
                            required
                            name="publish_date"
                            class="form-control"
                    />

                    <div class="form-group">
                    <lable for="expiration_date">تاریخ انقضا</lable><span class="required">*</span></label>
                    <input
                            type="date"
                            id="expiration_date"
                            required
                            name="expiration_date"
                            class="form-control"
                    />


                        <button type="submit">ثبت آگهی</button>
                    </div>
            </div>
        </form>
    </div>
                    <!-- Site footer -->
                    <footer class="footer">

                    </footer>

                    @endsection


                   {{--@include('companies/partials/sidebar')--}}

