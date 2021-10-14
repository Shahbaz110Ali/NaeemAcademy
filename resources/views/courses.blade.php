@extends('Layout.app')

@section('content')
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Courses</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
                    quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @forelse ($courses as $item)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch"> <!-- start course item-->
                        <div class="course-item">
                            <img src="{{asset('storage/img/course/course_banner/'.$item['course_image'])}}" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>{{$item['type']}}</h4>
                                    @if (empty($item['discount']) || $item['discount'] < 1)
                                    <p class="price">RS {{$item['price']}}</p>
                                    @else 
                                    <p class="price" style=""><del class="price">RS {{$item['price']}}</del></p>
                                    <p class="price">RS {{(($item['price'] / 100) * (100 - $item['discount']))}}</p>
                                    @endif
                                </div>

                                <h3><a href="course-details.html">{{$item['title']}}</a></h3>
                                <p>{{$item['description']}}</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="{{asset('storage/img/course/course_creator/'.$item['creator_image'])}}" class="img-fluid" alt="">
                                        <span>{{$item['creator']}}</span>
                                    </div>
                                    {{-- <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;50
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;65
                                    </div> --}}
                                    <div class="trainer-rank d-flex align-items-center">
                                        <a href="{{route("user.course.buy",$item['id'])}}" class="btn btn-success">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->
                        
                    @empty
                    <p>No course availabe for now</p>
                    @endforelse
                    

                </div>

            </div>
        </section><!-- End Courses Section -->

    </main><!-- End #main -->
@endsection
