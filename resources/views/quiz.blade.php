@extends('Layout.app')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Quiz</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
                    quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">

                <div class="row">
                   
                    <div class="col-lg-12">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">


                        @for ($i = 1; $i < 10; $i++)
                            
                        <div class="">
                            <h3>Question {{ $i }} :-</h3>
                            <p><b>Your Asked Question Here ?</b></p>
                            @for ($j = 1; $j < 5; $j++)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question_{{ $i }}" id="question_{{ $i }}_option_{{ $j }}" value="{{ $j }}">
                                    <label class="form-check-label" for="question_{{ $i }}_option_{{ $j }}">Option Name {{ $j }}</label>
                                </div>
                            @endfor  
                        </div>
                        @endfor 


                        <button type="submit" class="get-started-btn">Submit Quiz</button>   
                        </form>

                    </div>
                </div>

            </div>
        </section><!-- End Cource Details Section -->

        <!-- ======= Cource Details Tabs Section ======= -->
        <section id="cource-details-tabs" class="cource-details-tabs">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-3">
                       
                    </div>
                </div>

            </div>
        </section><!-- End Cource Details Tabs Section -->

    </main><!-- End #main -->
@endsection
