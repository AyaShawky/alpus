@extends('dashboard.app')
@section('content')
    <div class="row" style="margin-bottom: 2rem;">
        <div class="col-md-12">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">الرئيسية</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>تعديل الدرس</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold font-grey-gallery uppercase">معلومات الدرس</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                        <a href="" class="reload" data-original-title="" title=""> </a>
                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>

                <div class="portlet-body" style="display: block;">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('dashboard.lessons.update',$lesson->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">اسم الدرس</label>
                                                <input id="name" name="name" type="text" value="{{$lesson->name}}" class="form-control input-xlarge">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="video">رقم الفيديو من Vimeo</label>
                                                <input id="video" name="video" type="text" value="{{$lesson->video}}" class="form-control input-xlarge">
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="video">فيديو الدرس</label>--}}
{{--                                                <input id="video" name="video" type="file" class="form-control-file">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="form-actions">
                                    <div class="row" style="float: left;">
                                        <div class="col-md-12">
                                            <button type="reset" class="btn default">الغاء</button>
                                            <button type="submit" class="btn green">اضافة</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END GRID PORTLET-->
        </div>
    </div>
@endsection