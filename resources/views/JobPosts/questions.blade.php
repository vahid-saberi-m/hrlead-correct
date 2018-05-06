<div class="pull-right col-md-9">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">سوالات مربوط به آگهی شغلی</h3>
        </div>
        <div class="box-body with-border">
            <form action="{{route('questions.store')}}" class="form" id="form" method="POST"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="q">
                    <div class="box">
                        <div class="box-header">
                            <strong>سوال</strong> <strong id="number">1</strong>
                        </div>
                        <div class="question">
                            <div class="input-group">
                                <span class="input-group-addon">؟</span>
                                <input type="text" class="form-control question" placeholder="متن سوال" id="question"
                                       name="question">
                                <input type="hidden" value="{{$jobpost->id}}" name="jobpost" placeholder="متن سوال"
                                       id="question">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><input name="first" type="checkbox"></span>
                                <input type="text" class="form-control" required placeholder="  پاسخ اول"
                                       name="answer_1">
                                <span class="input-group-addon"><input name="second" type="checkbox"></span>
                                <input type="text" class="form-control" placeholder="  پاسخ دوم" name="answer_2">
                                <span class="input-group-addon"><input name="third" type="checkbox"></span>
                                <input type="text" class="form-control" placeholder="  پاسخ سوم" name="answer_3">
                                <span class="input-group-addon"><input name="fourth" type="checkbox"></span>
                                <input type="text" class="form-control" placeholder="  پاسخ چهارم" name="answer_4">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" id="publish" class="btn btn-warning">انتشار آگهی</button>
                    <button type="submit" class="btn submit btn-primary">ثبت سوال</button>
                </div>

            </form>
        </div>
        <div id="questions">
        </div>
    </div>
</div>
<script>
    $('#publish').click(function () {
            var id={{$jobpost->id}};
        $.ajax({

            encType: 'multipart/form-data',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/jobposts/'+id,
            type: 'GET',
            success: function (data) {
                alert('آگهی شما با موفقیت ثبت گردید. پس از تایید مدیر سایت آگهی شما در وبسایت به نمایش گذاشته خواهد شد')
                $('#section1' ).fadeOut().html( data).fadeIn();
                },
            contentType: false,
            cache: false,
            processData: false
        });
    })
</script>
<script>
    var i = 0;
    $("form").on("submit", function (event) {
        event.preventDefault();
        i++;
        var formData = new FormData;
        var q = $("input[name=question]").val();
        var a1 = $("input[name=answer_1]").val();
        var a2 = $("input[name=answer_2]").val();
        var a3 = $("input[name=answer_3]").val();
        var a4 = $("input[name=answer_4]").val();
        if ($("input[name=first]")[0].checked) {
            var c1 = 1
        } else {
            var c1 = 0
        }
        if ($("input[name=second]")[0].checked) {
            var c2 = 1
        } else {
            var c2 = 0
        }
        if ($("input[name=third]")[0].checked) {
            var c3 = 1
        } else {
            var c3 = 0
        }
        if ($("input[name=fourth]")[0].checked) {
            var c4 = 1
        } else {
            var c4 = 0
        }
        if (c1 == 1 || c2 == 1 || c3 == 1 || c4 == 1) {
            formData.append('question', q);
            formData.append('answer_1', a1);
            formData.append('first', c1);
            formData.append('answer_2', a2);
            formData.append('second', c2);
            formData.append('answer_3', a3);
            formData.append('third', c3);
            formData.append('answer_4', a4);
            formData.append('fourth', c4);
            formData.append('jobpost', $("input[name=jobpost]").val());
            console.log(formData);
            $.ajax({
                encType: 'multipart/form-data',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                url: '/questions/',
                type: 'json',
                method: 'POST',
                success: function (data) {
                    $("#questions").append('<div class="box box-primary ">\n' +
                        '            <div class="box-header with-border">\n' +
                        '                <h3 class="box-title">' + 'سوال' + i + ' </h3>\n' +
                        '            </div>\n' +
                        '            <div class="box-body">\n' +
                        '            <div>' + q + '</div>\n' +
                        '                <div class="form-group row">\n' +
                        '                    <div class="col-md-3 pull-right">\n' + a1 +
                        '                    </div>\n' +
                        '                    <div class="col-md-3 pull-right">\n' + a2 +
                        '                    </div>\n' +
                        '                    <div class="col-md-3 pull-right">\n' + a3 +
                        '                    </div>\n' +
                        '                    <div class="col-md-3 pull-right">\n' + a4 +
                        '                    </div>\n' +
                        '                    <div class="col-md-3">\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '            </div>\n' + data +
                        '        </div>'
                    );
                    $("form")[0].reset();

                },
                failure: function (data) {
                    console.log(data)
                },
                contentType: false,
                cache: false,
                processData: false
            });
        } else {
            alert(' حداقل یکی از پاسخ ها را به عنوان پاسخ قابل قبول انتخاب کنید!')
        }
    })

</script>
