<div class="col-md-9 pull-right">
    <div class="box box-primary ">
        <div class="box-header with-border">
            <h3 class="box-title">افزودن رویداد</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="form" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group row">
                    <div class="col-md-9 pull-right">
                        <label for="title">عنوان رویداد</label>
                        <input required type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="col-md-3">
                        <label for="main_photo">عکس رویداد</label>
                        <input required type="file" id="main_photo" name="main_photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">متن رویداد</label>
                    <textarea required class="form-control" id="content" name="content"></textarea>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ثبت رویداد</button>
            </div>
        </form>
    </div>

    @foreach($events as $event)
        <div class="box box-primary " id="box{{$event->id}}">
            <div class="box-header with-border">
                <h3 class="box-title" id="title{{$event->id}}"> {{$event->title}}  </h3>
                <button class="fa  fa-edit pull-left" id="{{$event->id}}"></button>
            </div>
                <div class="box-body">
                    <div class="form-group row">
                        <div class="col-md-9 pull-right" >
                            <h3 class="box-title" id="content{{$event->id}}"> {{$event->content}}  </h3>                        </div>
                        <div class="col-md-3">
                            <img src="/{{$event->main_photo}}" id="img{{$event->id}}" style='width:100%;' border="0">
                        </div>
                    </div>
                </div>
        </div>
@endforeach
</div>
<script>
    $('.fa-edit').click(function () {
        var id= $(this).attr('id');
        $(this).hide();
        var title= $('#title'+id).text();
        var content= $('#content'+id).html();
        $('#box'+id).empty();
        $('#box'+id).append('<div class="box box-primary ">\n' +
            '        <div class="box-header with-border">\n' +
            '            <h3 class="box-title">ویرایش رویداد</h3>\n' +
            '        </div>\n' +
            '        <form id="form" class="edit" id="'+ id +'" method="POST" enctype="multipart/form-data">\n' +
            '            <div class="box-body">\n' +
            '                <div class="form-group row">\n' +
            '                    <div class="col-md-9 pull-right">\n' +
            '                        <label for="title">عنوان رویداد</label>\n' +
            '                        <input required type="text" class="form-control" id="title" name="title" value="'+title+'">\n' +
            '                    </div>\n' +
            '                    <div class="col-md-3">\n' +
            '                        <label for="main_photo">عکس رویداد</label>\n' +
            '                        <input required type="file" id="main_photo" name="main_photo">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="form-group">\n' +
            '                    <label for="content">متن رویداد</label>\n' +
            '                    <textarea required class="form-control" id="content" name="content">'+content+'</textarea>\n' +
            '                </div>\n' +
            '\n' +
            '            </div>\n' +
            '            <!-- /.box-body -->\n' +
            '\n' +
            '            <div class="box-footer">\n' +
            '                <button type="submit" class="btn btn-warning" id="'+id+'">ویرایش رویداد</button>\n' +
            '            </div>\n' +
            '        </form>\n' +
            '    </div>');
    })
</script>
<script>
    $('.edit').submit(function (e) {
        e.preventDefault();
        var id= $(this).attr('id');
        var formdata= $(this).serialize();
        
    })
</script>

<script>
    $('#form').submit(function (e) {
        e.preventDefault();
        var url = '/events';
        var formData = new FormData(form);
        formData.append('main_photo', $('input[name=main_photo]')[0].files[0]);
        formData.append('title', $("input[name=title]").val());
        formData.append('content', $("textarea[name=content]").val());
        $.ajax({

            encType: 'multipart/form-data',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
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