
@extends('Layout.app')

@section('content')
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>{{$parent['title']}}</h2>
                @isset($parent['description'])
                    {{$parent['description']}}
                @endisset
               
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-8 col-md-8 col-sm-12 ">
                        <div class="row">
                            @if(!empty($categories))
                            <div class="col-lg-6 col-md-6 col-md-12 subjects">
                                <h5>Categories</h5>
                                <ul>
                                    @foreach ($categories as $item)
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('content', $item['id']) }}">{{$item['title']}}</a></li>
                                    
                                    @endforeach
                                   
                                </ul>
                            </div>
                            @endif

                            @if(!empty($tests))
           
                            <div class="col-lg-6 col-md-6 col-md-12 subjects">
                                <h5>Tests</h5>
                                <ul>
                                    @foreach ($tests as $item)
                                   
                                    <li><i class="bx bx-chevron-right"></i> <a href="{{ ($item['type'] ==  "competition") ?  route('user.test.take', $item['id']) : route('test.take', $item['id']) }}">{{$item['name']}}</a></li>
                                    
                                    @endforeach
                                   
                                </ul>
                            </div>
                            @endif
                           
                           
                            
                            
                        </div>
                    </div>
                    <!-- End Course Item-->
                </div>
            </div>
        </section><!-- End Courses Section -->
    </main><!-- End #main -->
@endsection