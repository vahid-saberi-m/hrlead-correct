<div class="col-lg-9 col-md-9 col-sm-9 pull-right" xmlns="http://www.w3.org/1999/html"
     xmlns="http://www.w3.org/1999/html">

    <form method="post" action="{{route('jobposts.store')}}">
        {{csrf_field()}}
        <lable for="job_post_title">عنوان شغل</lable>
        <span class="required">*</span></label>
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

        <lable for="location">موقعیت مکانی</lable>
        <span class="required">*</span></label>
        <input placeholder=""
               id="location"
               required
               name="location"
               spellcheck="false"
               class="form-control"
               value="تهران"
        />


        <div class="form-group">
            <lable for="summary">پیش نمایش</lable>
            <span class="required">*</span></label>
            <input placeholder=""
                   id="summary"
                   required
                   name="summary"
                   spellcheck="false"
                   class="form-control"

            />
        </div>

        <div class="form-group">
            <lable for="description">شرح شغل</lable>
            <span class="required">*</span></label>
            <textarea id="description"
                      required
                      name="description"
                      spellcheck="false"
                      class="form-control">
                </textarea>
        </div>

        <div class="form-group">
            <lable for="requirements">ویژگی های مورد نیاز</lable>
            <span class="required">*</span></label>
            <textarea id="requirements"
                      required
                      name="requirements"
                      spellcheck="false"
                      class="form-control">
                </textarea>
        </div>


        <div class="form-group">
            <lable for="benefits">مزایا</lable>
            <span class="required">*</span></label>
            <textarea id="benefits"
                      required
                      name="benefits"
                      spellcheck="false"
                      class="form-control">
                    </textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <lable for="publish_date">تاریخ انتشار</lable>
                <span class="required">*</span></label>
                <div class="input-group date ">

                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input
                            type="date"
                            id="publish_date"
                            required
                            name="publish_date"
                            class="form-control"
                            value="<?php echo date('Y-m-d'); ?>"
                    />
                </div>
                <script>
                    document.getElementById("publish_date").setAttribute = Date();
                </script>
            </div>
            <div class="col-md-6">
                <lable for="expiration_date">تاریخ انقضا</lable>
                <span class="required">*</span></label>

                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input
                            type="date"
                            id="expiration_date"
                            required
                            name="expiration_date"
                            class="form-control"
                            value="<?php $d = strtotime("+2 Months");
                            echo date("Y-m-d", $d); ?>"

                    />
                </div>
            </div>
        </div>
        <div class="pull-middle">
            <button type="button" id="submit" class="btn-sm btn-info">ثبت آگهی</button>
        </div>
    </form>
</div>
<script>
    $('#submit').click(function (e) {
        e.preventDefault();
        var data = {
            "_token": "{{ csrf_token() }}",
            job_post_title: $("input[name=job_post_title]").val(),
            location: $("input[name=location]").val(),
            summary: $("input[name=summary]").val(),
            description: $('#description').val(),
            requirements: $('#requirements').val(),
            benefits: $('#benefits').val(),
            publish_date: $("input[name=publish_date]").val(),
            expiration_date: $("input[name=expiration_date]").val()
        };
        var url = '/jobposts/' ;
        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            data: data,
            success: function (mydata) {
                $mydata = $(mydata);
                $('#section1' ).fadeOut().html($mydata).fadeIn();
            },
            failure: function (t) {
                console.log(t)
            }

        });


    })
</script>






