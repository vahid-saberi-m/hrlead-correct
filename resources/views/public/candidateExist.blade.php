<div id="result">
    <form class="apply" id="{{$jobpost->id}}" method="post"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" class="form-control" id="candidate" name="candidate" placeholder="" required
               value="{{$candidate->id}}">
        <div class="form-group">
            <label for="exampleInputEmail1">شماره تماس</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="phone" placeholder=""
                   value="{{$candidate->phone}}" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">رزومه شما</label>
            <input type="file" class="form-control" id="cv" name="cv" placeholder="" required
                   value="{{$candidate->cv}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">نام و نام خانوادگی</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{$candidate->name}}"
                   required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">آخرین شرکتی که در آن فعالیت داشته اید</label>
            <input type="text" class="form-control" name="company" id="exampleInputEmail1"
                   value="{{$candidate->company}}"
                   required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">عنوان شغلی</label>
            <input type="text" class="form-control" name="position" id="exampleInputEmail1"
                   value="{{$candidate->position}}"
                   required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">چند سال سابقه کار دارید؟</label>
            <input type="number" class="form-control" name="experience" id="exampleInputEmail1"
                   value="{{$candidate->experience}}" required>
        </div>
        <div class="form-group">
            <label for="degree">آخرین مدرک تحصیلی</label>
            <select class="form-control" id="degree" name="degree">
                <option>{{$candidate->degree}}</option>
                <option>دیپلم</option>
                <option>کاردانی</option>
                <option>کارشناسی</option>
                <option>کارشناسی ارشد</option>
                <option>دکتری</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">رشته تحصیلی</label>
            <input type="text" class="form-control" name="education" id="exampleInputEmail1"
                   value="{{$candidate->education}}" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">دانشگاه محل تحصیل</label>
            <input type="text" class="form-control" name="university" id="exampleInputEmail1"
                   value="{{$candidate->university}}" required>
        </div>

        <button type="button" id="submit" class="btn btn-primary pull-left">ثبت اطلاعات</button>
    </form>
</div>


<script>
    $('#submit').click(function (e) {
        e.preventDefault();
        var jobpost = $('.apply').attr('id');
        var candidate = $("input[name=candidate]").val();
        var degree = $('#degree').val();
        // alert(degree);
        var data = {
            "_token": "{{ csrf_token() }}",
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
        var url = '/candidate/exists/' + jobpost + '/' + candidate;
        $.ajax({

            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
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