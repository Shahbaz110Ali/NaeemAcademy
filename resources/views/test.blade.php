@extends('Layout.app')

@section('links')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@if ($test['duration'] != null && $test['duration'] > 0)
    <style>
        .timer-test{
            display: none;
        }
    </style>
@endif
@endsection

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>{{$test['name']}}</h2>
                <div>@php
                    if(Session::has("info")){
                        echo "<span class='".Session::get("info")['class']."'>".Session::get("info")['msg']."</span>";
                    }
                     @endphp
                </div>
                
            </div>
        </div><!-- End Breadcrumbs -->
        

        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">
                
            <div></div>

                <div class="row">
                   
                    <div class="col-lg-12">
                        @if(!empty($questions) && count($questions) > 0)
                        <form action="{{ route('test.submit') }}" method="POST" id="testSubmit">
                            @csrf
                            <input type="hidden" name="test_id" value="{{$test['id']}}">
                            @if ($test['duration'] > 0)
                                        Time: <span class="countdown">00:00</span>
                                        <span id="span-start">
                                            <button type="button" id="startTest" class="get-started-btn">Start Test</button>
                                        </span>
                                        @endif
                            <div class="timer-test">
                                <div id="loop">
                                    @php
                                        $count = 0;
                                    @endphp
                                    @forelse ($questions as $item)
                                    
                                    <div class="list-group">
                                        <h4>Question {{ ++$count }} :-</h4>
                                        <p><b>{!! $item['question'] !!}</b></p>
                                        @php
                                            $options = json_decode($item['option']);
                                        @endphp
                                        @for ($i = 1; $i <= count($options); $i++)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question[{{$item['id']}}]" id="question_{{ $count }}_option_{{ $i }}" value="{{$i}}">
                                                <label class="form-check-label" for="question_{{ $count }}_option_{{ $i }}">{!! $options[$i-1] !!}</label>
                                            </div>
                                        @endfor  
                                    </div>
                                    
                                    @empty
                                        <h6>No question available in this test.</h6>
                                    
                                    @endforelse
                                </div>
                                <div>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                        <li id="previous-page">
                                            <a href="javascript:void(0)" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        
                                        
                                        
                                        </ul>
                                    </nav>
                                </div>
                               
                               <div id="submit-btnContainer"></div>
                               
                            </div>
                            @if ($test['duration'] > 0)
                            <div class="instructions-for-timer-test mt-2">
                                <h3>By clicking Start Test button you will be able to see the questions</h3>
                            </div>
                            @endif
                            

                        </form>
                        
                        @else
                        <h1>Currently no question available in this test.</h1>
                       
                        @endif

                    </div>
                </div>

            </div>
        </section><!-- End Cource Details Section -->


    </main><!-- End #main -->
@endsection

@section('scripts')
<script src="{{asset('assets/dt/jquery-3.3.1.js')}}"></script>
<script>
$("#startTest").click(function() {
    $(".instructions-for-timer-test").hide();
    $(".timer-test").show();
    countDown();
    $("#span-start").remove();
    
});

function countDown() {
    var timer2 = "{{$test['duration']}}:0";
    var interval = setInterval(function() {
        var timer = timer2.split(':');
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) {
            $("#testSubmit").submit();
            clearInterval(interval)
        };
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        
        if(minutes == 0 && seconds == 0){
            $('.countdown').remove();
        }else{
            $('.countdown').html(minutes + ':' + seconds);
        }
        
        timer2 = minutes + ':' + seconds;
    }, 1000);
}



$(document).ready(function(){
    var numberOfItems = $("#loop .list-group").length
    var limitPerPage = "{{$test['question_per_page']}}";
    $("#loop .list-group:gt("+(limitPerPage-1)+")").hide();
    var totalpages = Math.ceil(numberOfItems / limitPerPage);
    $(".pagination").append("<li class='current-page active'><a href='javascript:void(0)'>"+1+"</a></li>");

    for(var i = 2; i <= totalpages; i++){
        $(".pagination").append("<li class='current-page'><a href='javascript:void(0)'>"+i+"</a></li>");
    }
    $(".pagination").append("<li id='next-page'><a href='javascript:void(0)' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
    
    function submitBtnAppend(){
        $("#submit-btnContainer").append('<button type="submit" id="btn-submit" class="get-started-btn">Submit Test</button>');
    }

    function submitBtnRemove(){
        $("#submit-btnContainer").html('');
    }

    if(totalpages <= 1){
        submitBtnAppend();
    }else{
        submitBtnRemove();
    }

    $(".pagination li.current-page").on("click",function(){
        if($(this).hasClass("active")){
            return false;
        }else{
            var currentPage = $(this).index();
            if(currentPage == totalpages ){
                submitBtnAppend();
            }else{
                submitBtnRemove();
            }
            $(".pagination li").removeClass("active");
            $(this).addClass("active");
            $("#loop .list-group").hide();

            var grandTotal = limitPerPage * currentPage;

            for(var i = (grandTotal - limitPerPage) ; i < grandTotal ; i++ ){
                $("#loop .list-group:eq("+i+")").show();
            }
        }
    })

    $("#next-page").on("click",function(){
        var currentPage = $(".pagination li.active").index();
        if(currentPage === totalpages){
            return false;
        }else{
            currentPage++;
            if(currentPage == totalpages ){
                submitBtnAppend();
            }else{
                submitBtnRemove();
            }
            $(".pagination li").removeClass("active");
            $("#loop .list-group").hide();

            var grandTotal = limitPerPage * currentPage;

            for(var i = (grandTotal - limitPerPage) ; i < grandTotal ; i++ ){
                $("#loop .list-group:eq("+i+")").show();
            }
            $(".pagination li.current-page:eq("+ (currentPage - 1) +")").addClass("active");
        }

    });

    $("#previous-page").on("click",function(){
        var currentPage = $(".pagination li.active").index();
        if(currentPage === 1){
            return false;
        }else{
            currentPage--;
            if(currentPage == totalpages ){
                submitBtnAppend();
            }else{
                submitBtnRemove();
            }
            $(".pagination li").removeClass("active");
            $("#loop .list-group").hide();

            var grandTotal = limitPerPage * currentPage;

            for(var i = (grandTotal - limitPerPage) ; i < grandTotal ; i++ ){
                $("#loop .list-group:eq("+i+")").show();
            }
            $(".pagination li.current-page:eq("+ (currentPage - 1) +")").addClass("active");
        }

    });
});

 </script>    
@endsection
