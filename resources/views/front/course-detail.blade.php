@extends('front.app')
@section('content')
    <!-- Course Section Course Page | قسم تفاصيل المادة في صفحة المواد -->
    <div class="CourseDetailSection">
        <div class="video-section position-relative" style="z-index: 99999999 !important;">
{{--            <div id="PlayVideo" style="background-image: url({{asset('storage/course_images/'.$course->image)}});"--}}
{{--                 class="icon-play position-absolute w-100 text-white w-100 h-100 d-flex align-items-center justify-content-center">--}}
{{--                <i class="fas fa-play-circle"></i>--}}
{{--            </div>--}}
            <div class="video">

                <iframe src="https://player.vimeo.com/video/{{$course->preview_video}}"
                        id="video"
                        style="display: block; background: #000; border: none; height: 100vh; width: 100%;"
                        frameborder="0" webkitallowfullscreen mozallowfullscreen
                        allow="autoplay; fullscreen" allowfullscreen></iframe>

                <script src="https://player.vimeo.com/api/player.js"></script>
                {{--                <video controls class="w-100" id="video">--}}
                {{--                    <source src="Video/Public/Motion.mp4" type="video/mp4">--}}
                {{--                </video>--}}
            </div>
        </div>
        <div class="detial-course mt-5 mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 col-12">
                        <div class="describe-course">
                            <h5 class="NotoBold pb-4">
                                <span class="pb-2">وصف المادة</span>
                            </h5>
                            <div class="describe NotoRegular mb-3">
                                {{$course->description}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-sale text-center mt-5">
                            <div class="title-sale">
                                <h4 class="NotoBold">سعر المادة</h4>
                            </div>
                            <div class="sale">
                                <b>
                                    <span class="ArialBold">{{$course->price}}</span>
                                    <i class="fas fa-shekel-sign"></i>
                                </b>
                            </div>
                            <div class="note text-start">
                                <small class="NotoRegular text-white text-start">
                                    ملاحظة : يمكنك دفع الرسوم
                                    على دفعتين
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="detial-course mt-5 mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-12 box-lecture">
                        <div class="describe-course d-flex flex-row justify-content-between">
                            <h5 class="NotoBold pb-4 mb-4">
                                <span class="pb-2">محتويات المادة</span>
                            </h5>
                            <div class="data-time-course NotoRegular">
                                <span class="count-video me-3 ms-3"><b class="ArialBold">{{$course->lessons()->count()}}</b> دروس</span>
                            </div>
                        </div>
                        <div class="video">
                            <div class="video-lecture accordion" id="AccordtionLectures">
                                @foreach($course->topics as $key=>$topic)
                                    <div class="accordion-item @if($key == 0) activeitem @endif">
                                        <h2 class="accordion-header border-bottom NotoBold" id="{{$course->id}}">
                                            <button class="accordion-button DeleteEffects pt-4 pb-4 btnShow " type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#ID{{$topic->id}}" aria-expanded="@if($key == 0) true @else false @endif" aria-controls="ID{{$topic->id}}">
                                                <i class="icon-show fas fa-plus me-3"></i>
                                                <span>{{$topic->name}}</span>
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse @if($key == 0)   @endif" id="ID{{$topic->id}}">
                                            <div class="accordion-body p-0">
                                                @foreach($topic->lessons as $lesson)
                                                    <div class="lecture pt-4 pb-4 pe-4 ps-5 border-bottom">
                                                        <a class="text-decoration-none d-flex flex-row justify-content-between">
                                                            <div class="name-lecture">
                                                                <i class="far fa-play-circle pe-2"></i>
                                                                <span class="NotoRegular">{{$lesson->name}}</span>
                                                            </div>
                                                                                                                       <div class="time-lecture">
                                                                                                                            <b class="time ArialBold">40:00</b>
                                                                                                                     </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 mt-4">
                        <div class="box-sale p-3 text-center mt-5">
                            <div class="img-card">
                                <img src='{{asset('storage/course_images/'.$course->image)}}' class="w-100">
                            </div>
                            <div class="NotoRegular w-75 mx-auto text-offer">
                                للحصول على الكورس يمكنك الأن
                                تقديم طلب و يتم التواصل معك
                                . من قبل طاقم الدعم الفني
                            </div>
                            <div class="link d-flex">
                                <a href="{{route('front.apply',$course->id)}}" class="text-decoration-none btn-primary text-white NotoRegular p-3 w-100">
                                    تقديم طلب الآن
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- @if(auth('web')->check())
                        @foreach(auth('web')->user()->courses as $userCourse)
                            @if($userCourse->id == $course->id)

                            @endif
                        @endforeach
                    @else

                    @endif --}}
                </div>
            </div>
        </div>
        <div class="describe-teacher" style="margin-bottom: 80px;">
            <div class="container-fluid">
                <div class="title-section" style="margin-bottom: 40px;">
                    <h5 class="NotoBold">
                        <span class="pb-2">مدرس المادة</span>
                    </h5>
                </div>
                <div class="data-teacher">
                    <div class="d-flex flex-row align-items-md-center align-items-sm-start">
                        <div class="img-teacher">
                            <img src="{{asset('storage/teacher_images/'.$course->teacher->image)}}">
                        </div>
                        <div class="data ms-4">
                            <h6 class="NotoBold mb-3">الأستاذ / {{$course->teacher->name}}</h6>
                            <p class="NotoRegular">
                                {{$course->teacher->bio}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
