<form  method="post" id="{{$jobpost->id}}" class="apply" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <div class="form-group">
        <input type="hidden" class="form-control"   id="email" placeholder="email" value="{{$email}}" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">شماره تماس</label>
        <input type="number" class="form-control" id="exampleInputEmail1" name="phone" placeholder="" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">رزومه شما</label>
        <input type="file" class="form-control" id="cv" name="cv" placeholder="" required >
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">نام و نام خانوادگی</label>
        <input type="text" class="form-control" name="name" id="exampleInputEmail1" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">آخرین شرکتی که در آن فعالیت داشته اید</label>
        <input type="text" class="form-control" name="company" id="exampleInputEmail1" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">عنوان شغلی</label>
        <input type="text" class="form-control" name="position" id="exampleInputEmail1" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">چند سال سابقه کار دارید؟</label>
        <input type="number" class="form-control" name="experience" id="exampleInputEmail1" required >
    </div>
    <div class="form-group">
        <label>آخرین مدرک تحصیلی</label>
        <select class="form-control" id="degree" name="degree">
            <option>دیپلم</option>
            <option>کاردانی</option>
            <option >کارشناسی</option>
            <option>کارشناسی ارشد</option>
            <option>دکتری</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">رشته تحصیلی</label>
        <input type="text" class="form-control" name="education" id="exampleInputEmail1" required >
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">دانشگاه محل تحصیل</label>
        <input type="text" class="form-control" name="university" id="exampleInputEmail1" required >
    </div>

    <button type="button" id="submit" class="btn btn-primary pull-left">ثبت اطلاعات</button>
</form>

<script>
    $('#submit').click(function (e) {
        e.preventDefault();
        var jobpost = $('.apply').attr('id');
        var degree = $('#degree').val();
        var email=$('#email').val();
        var data = {
            "_token": "{{ csrf_token() }}",
            email:email ,
            phone: $("input[name=phone]").val(),
            cv: $("input[name=cv]").val(),
            name: $("input[name=name]").val(),
            company: $("input[name=company]").val(),
            position: $("input[name=position]").val(),
            experience: $("input[name=experience]").val(),
            degree: degree,
            education: $("input[name=education]").val(),
            university: $("input[name=university]").val()
        };
        var url = '/candidate/new/' + jobpost;
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function (mydata) {
                $mydata = $(mydata);
                $('#' + 'modal' + jobpost).fadeOut().html($mydata).fadeIn();
                // alert(data.success);
            },
            failure: function (t) {
                console.log(t)

            }

        });


    })
</script>