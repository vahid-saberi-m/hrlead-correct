<div class="col-lg-7 col-md-7 col-sm-7 text-right pull-right ">
    <form class="theform" id="{{$company->id}}" action="{{route('company.update', $company->id )}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="company-name">نام شرکت
            <span class="required">*</span></label>
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
            <label for="company-name">تعداد کارکنان
                <span class="required">*</span></label>
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
            <label for="company-name">آدرس وبسایت
                <span class="required">*</span></label>
            <input placeholder="example.com"
                   id="company-website"
                   required
                   name="website"
                   spellcheck="false"
                   class="form-control"
                   value="{{$company->website}}"
            />
        </div>


        <div class="form-group">
                <label for="company-name">شعار استخدامی
                    <span class="required">*</span></label>
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
            <label for="company-name">لوگوی شرکت
                <span class="required">*</span></label>
            <input
                    type="file"
                    id="logo"
                    required
                    name="logo"
                    class="form-control"
                    title="{{$company->logo}}"
            />
        </div>
        <div class="form-group">
            <label for="company-name">عنوان پیام
                <span class="required">*</span></label>
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
            <label for="company-name">متن پیام
                <span class="required">*</span></label>
            <textarea id="company_message_content"
                      required
                      name="message_content"
                      spellcheck="false"
                      class="form-control">
                    {{$company->message_content}}
                </textarea>
        </div>

        <div class="form-group">
            <label for="company-name">عکس اصلی صفحه
                <span class="required">*</span></label>
            <input
                    type="file"
                    id="main_photo"
                    required
                    name="main_photo"
                    class="form-control"
                    title="{{$company->main_photo}}"
            />
        </div>

        <div class="form-group">
            <label for="company-name">درباره ما
                <span class="required">*</span></label>
            <textarea id="about_us"
                      required
                      name="about_us"
                      spellcheck="false"
                      class="form-control">
                               {{$company->about_us}}
                         </textarea>
        </div>

        <div class="form-group">
            <label for="company-name">چرا اینجا؟
                <span class="required">*</span></label>
            <textarea id="about_us"
                      required
                      name="why_us"
                      spellcheck="false"
                      class="form-control">
                             {{$company->why_us}}
                         </textarea>
        </div>

        <div class="form-group">
            <label for="company-name">مراحل استخدام
                <span class="required">*</span></label>
            <textarea id="recruiting_steps"
                      required
                      name="recruiting_steps"
                      spellcheck="false"
                      class="form-control">
                              {{$company->recruiting_steps}}
                        </textarea>
        </div>


        <div class="form-group">
            <label for="company-name">آدرس شرکت
                <span class="required">*</span></label>
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
            <label for="company-name">آدرس ایمیل
                <span class="required">*</span></label>
            <input id="email"
                   required
                   name="email"
                   spellcheck="false"
                   class="form-control"
                   value="{{$company->email}}"
            />
        </div>

        <div class="form-group">
            <label for="company-name">تلفن
                <span class="required">*</span></label>
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
            <label for="company-name">موقعیت
                <span class="required">*</span></label>
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

            <button id="{{$company->id}}" class="submit  btn-primary btn-lg" type="submit">اعمال تغییرات</button>
        </div>
    </form>
</div>

<script>
    $('.theform').submit(function (e) {
        e.preventDefault();
        var id= $(this).attr('id');
        var form = $('form')[0];
        var formData = new FormData(form);
        formData.append('main_photo', $('input[name=main_photo]')[0].files[0]);
        formData.append('logo', $('input[name=logo]')[0].files[0]);
        var url = '/companies/' + id ;
        formData.append('name', $("input[name=name]").val());
        formData.append('company_size', $("input[name=company_size]").val());
        formData.append('website', $("input[name=website]").val());
        formData.append('slogan', $("input[name=slogan]").val());
        formData.append('message_title', $('input[name=message_title]').val());
        formData.append('message_content', $('#message_content').val());
        formData.append('about_us', $('#about_us').val());
        formData.append('why_us', $('#why_us').val());
        formData.append('recruiting_steps', $('#recruiting_steps').val());
        formData.append('address', $('#address').val());
        formData.append('email', $('#email').val());
        formData.append('phone_number', $('#phone_number').val());
        formData.append('location', $('#location').val());

        $.ajax({

            encType: 'multipart/form-data',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType : 'json',
            url: url,
            type: 'POST',
            data: formData,
            success: function (data) {
                alert(data)
            },
            contentType: false,
            cache: false,
            processData: false
        });
    });

</script>