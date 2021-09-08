{{-- {{dd($user_attempt)}} --}}
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
                <h2>Review for {{$test['name']}}</h2>
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
                            <input type="hidden" class="btn btn-success" name="test_id" value="{{$test['id']}}">
                        <table class="table">
                            <thead > 
                                <tr>
                                    <th>
                                        
                                        <a href="{{route('test.result')}}">Complete Result Summary</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody  id="data-container">
                                <!-- @php
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
                                
                                @endforelse -->
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                <td><div id="pagination-container"></div></td>
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


function simpleTemplating(data) {
    var html = '<tr><td>';
        var user_attempt = "{{$user_attempt}}";
        user_attempt = JSON.parse(user_attempt.replace(/&quot;/g,'"'));
        // console.log(user_attempt[5]);
    $.each(data, function(index, item){     
        html += '<div class="">';
        html += ' <h3>Question '+item.sr+' :-</h3>';
        html += '<p><b>'+item.question+'</b></p>';
        
        
        
        $.each(JSON.parse(item.option), function(i, option){
            var op = (i+1)
            var textcolor = "";
            var checked = "";
            
            
            if(user_attempt[item.id] == op){
                textcolor = "text-danger";
                checked = "checked";
            }

            if(item.answer == "option"+op){
                textcolor  = "text-success";
            }
            
            
            
            html += '<div class="form-check">';
            html += '<input disabled '+checked+' class="form-check-input" type="radio" name="question['+item.id+']" id="question_'+item.sr+'_option_'+ op+'" value="'+op+'">';
            html += '<label class="'+textcolor+' form-check-label" for="question_'+item.sr+'_option_'+op+'">'+option+'</label>';
            html += '</div>';
         });
         if(item.explanation != null){
            html += '<span>Explanation: '+item.explanation+'</span>';
         }
         
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
                pageSize: "50",
                callback: function(data, pagination) {
                    // console.log(data);
                    // template method of yourself
                    var html = simpleTemplating(data);
                    $('#data-container').html(html);
                }
            });

        }
    });

    // $(document).ready(function(){
        
    //     $("#pagination-container").hide();
    // })

    

 </script>


    
@endsection
