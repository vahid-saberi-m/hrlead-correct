    <div class="col-lg-9">
        <div class="box box-info ">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات آگهی شغلی</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="form-group">
                    <form method="post" class="form-horizontal" action="{{route('jobposts.update', [$jobpost-> id])}}">
                       {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">عنوان شغل</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="job_post_title" placeholder="عنوان"
                                   value="{{$jobpost->title}}" name="title" >
                        </div>

                            <label for="location" class="col-sm-2 control-label">موقعیت مکانی</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="location" placeholder="تهران"
                                       value="{{$jobpost->location}}" name="location">
                            </div>

                            <label for="summary" class="col-sm-2 control-label">پیش نمایش</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="summary" placeholder="خلاصه ای از شرح شغل"
                                       value="{{$jobpost->summary}}" name="summary">
                            </div>


                                <div class="form-group col-sm-10 pull-right">
                               <lable for="description" class="col-sm-2 control-label">شرح شغل</lable>


                                <textarea id="description"
                                          required
                                          name="description"
                                          spellcheck="false"
                                          class="form-control col-md-6">
                                  {{$jobpost->description}}
                                </textarea>
                                </div>

                            <div class="form-group col-sm-10 pull-right">
                            <lable for="requirements">ویژگی های مورد نیاز</lable>
                            <span class="required">*</span></label>
                            <textarea id="requirements"
                                      required
                                      name="requirements"
                                      spellcheck="false"
                                      class="form-control">
                        {{$jobpost->requirements}}
                </textarea>
                        </div>

                            <div class="form-group col-sm-10 pull-right">

                            <lable for="benefits">مزایا</lable>
                            <span class="required">*</span></label>
                            <textarea id="benefits"
                                      required
                                      name="benefits"
                                      spellcheck="false"
                                      class="form-control">
                        {{$jobpost->benefits}}
                </textarea>
                        </div>


                        {{--            @include('layouts.partials.daterange')--}}

                            <div class="form-group col-sm-10 pull-right">
                            <lable for="publish_date">تاریخ انتشار</lable>
                            <span class="required">*</span></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input
                                        class="form-control pull-right"
                                        type="date"
                                        id="publish_date"
                                        required
                                        name="publish_date"
                                        value="{{$jobpost->publish_date}}"
                                />
                            </div>
                            </div>

                            <div class="form-group col-sm-10 pull-right">
                                <lable for="expiration_date">تاریخ انقضا</lable>
                                <span class="required">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input
                                            class="form-control pull-right"
                                            type="date"
                                            id="expiration_date"
                                            required
                                            name="expiration_date"
                                            value="{{$jobpost->expiration_date}}"
                                    />
                                </div>



                        <div>
                            <button type="submit" class="btn btn-info pull-right">اعمال تغییرات</button>
                        </div>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>





            </div>

        </div>


        <!-- Site footer -->
        <footer class="footer">

        </footer>

