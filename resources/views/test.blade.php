@extends('Layout.app')

@section('links')
{{-- <link rel="stylesheet" href="{{asset('assets/dt/bootstrap.css')}}"> --}}
<link rel="stylesheet" href="{{asset('assets/dt/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/dt/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/dt/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css" integrity="sha512-QmxybGIvkSI8+CGxkt5JAcGOKIzHDqBMs/hdemwisj4EeGLMXxCm9h8YgoCwIvndnuN1NdZxT4pdsesLXSaKaA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <form action="{{ route('test.submit') }}" method="POST" id="testSubmit">
                            @csrf
                            <input type="hidden" name="test_id" value="{{$test['id']}}">
                        <table class="table">
                            <thead > 
                                <tr>
                                    <th>
                                        @if ($test['duration'] > 0)
                                        Time: <span class="countdown">00:00</span>
                                        <span id="span-start">
                                            <button type="button" id="startTest" class="get-started-btn">Start Test</button>
                                        </span>
                                        @endif
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody  id="data-container">
                                @php
                                    $count = 0;
                                @endphp
                                @forelse ($questions as $item)
                                <tr><td>
                                <div class="">
                                    <h3>Question {{ ++$count }} :-</h3>
                                    <p><b>{{$item['question']}}</b></p>
                                    @php
                                        $options = json_decode($item['option']);
                                    @endphp
                                    @for ($i = 1; $i <= count($options); $i++)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question[{{$item['id']}}]" id="question_{{ $count }}_option_{{ $i }}" value="{{$i}}">
                                            <label class="form-check-label" for="question_{{ $count }}_option_{{ $i }}">{{$options[$i-1]}}</label>
                                        </div>
                                    @endfor  
                                </div>
                                </td></tr>
                                @empty
                                    <h6>Empty</h6>
                                
                                @endforelse
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                {{-- <td><div id="pagination-container"></div></td> --}}
                                </tr>
                                <tr>
                                    <td>
                                        {{-- @if ($test['duration'] == 0 || $test['duration'] == null)
                                        <button type="submit" class="get-started-btn">Submit Test</button>
                                        @endif --}}
                                        <button type="submit" class="get-started-btn">Submit Test</button>
                                    </td>
                                </tr>
                            </tfoot>

                            
                        </table>
                        
                        
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

@section('scripts')
<script src="{{asset('assets/dt/jquery-3.3.1.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js" integrity="sha512-1zzZ0ynR2KXnFskJ1C2s+7TIEewmkB2y+5o/+ahF7mwNj9n3PnzARpqalvtjSbUETwx6yuxP5AJXZCpnjEJkQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/dt/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/dt/dataTables.bootstrap4.min.js')}}"></script>
{{-- <script src="{{asset('assets/dt/dataTables.buttons.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/dt/buttons.bootstrap4.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/dt/jszip.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/dt/pdfmake.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/dt/vfs_fonts.js')}}"></script> --}}
{{-- <script src="{{asset('assets/dt/buttons.html5.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/dt/buttons.print.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/dt/buttons.colVis.min.js')}}"></script> --}}
<script src="{{asset('assets/dt/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/dt/responsive.bootstrap4.min.js')}}"></script>
<script>
$(document).ready(function() {
    var table = $('.apply-dt').DataTable();
} );

// let current_question = null;
$("#startTest").click(function() {
    countDown();
    $("#span-start").remove();
    // $("#instructions").toggleClass('d-none');
    // $("#quiz").toggleClass('d-none');
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
function simpleTemplating(data) {
    var html = '<tr><td>';
    
    $.each(data, function(index, item){     
        html += '<div class="">';
        html += ' <h3>Question '+item.sr+' :-</h3>';
        html += '<p><b>'+item.question+'</b></p>';
        $.each(JSON.parse(item.option), function(i, option){ 
            var op = (i+1);
            html += '<div class="form-check">';
            html += '<input class="form-check-input" type="radio" name="question['+item.id+']" id="question_'+item.sr+'_option_'+ op+'" value="'+op+'">';
            html += '<label class="form-check-label" for="question_'+item.sr+'_option_'+op+'">'+option+'</label>';
            html += '</div>';
         });
         html += '</div>';
         
    });
    html += '  </tr></td>';
    return html;
  
       
    
}


$.ajax({
        url: '/get-questions/{{ $test["id"] }}',
        type: "GET",
        dataType: "json",
        success: function (questions) {
            $('#pagination-container').pagination({
                dataSource: questions,
                pageSize: "{{$test['question_per_page']}}",
                callback: function(data, pagination) {
                    // console.log(data);
                    // template method of yourself
                    var html = simpleTemplating(data);
                    $('#data-container').html(html);
                }
            });

        }
    });

 </script>


    
@endsection
