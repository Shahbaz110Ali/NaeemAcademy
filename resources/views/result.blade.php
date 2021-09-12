@extends('Layout.app')

@section('links')
{{-- <link rel="stylesheet" href="{{asset('assets/dt/bootstrap.css')}}"> --}}
<link rel="stylesheet" href="{{asset('assets/dt/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/dt/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/dt/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Your Result for {{$test['name']}}</h2>
            </div>
        </div><!-- End Breadcrumbs -->
        

        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">
                

                <div class="row">
                   
                    <div class="col-lg-12">
                       
                        {{-- apply-dt  --}}
                        <table class="table table-bordered table-striped table-responsive">
                           <thead>
                               <tr>
                                   <th colspan="2" class="text-center"> Result Summary</th>
                                   
                               </tr>
                           </thead>
                            <tbody>
                                <tr>
                                    <th>Total Questions</th>
                                    <th>{{$test_info['total_q']}}</th>
                                </tr>
                                <tr>
                                    <th>Marks Per Question</th>
                                    <th>{{$test_info['marks_per_q']}}</th>
                                </tr>
                                <tr>
                                    <th>Negative Marks</th>
                                    <th>{{$test_info['negative_marks']}}</th>
                                </tr>
                                
                                <tr>
                                    <th>Attempted Questions</th>
                                    <th>{{$test_info['attempted_q']}}</th>
                                </tr>
                                <tr> 
                                    <th>Unattempted Questions</th>
                                    <th>{{$test_info['un_attempted']}}</th>
                                </tr>
                                <tr> 
                                    <th>Wrong Attempt</th>
                                    <th>{{$test_info['wrong_q']}}</th>
                                </tr>
                                <tr> 
                                    <th>Correct Attempt</th>
                                    <th>{{$test_info['correct_q']}}</th>
                                </tr>
                                <tr> 
                                    <th>Total Marks</th>
                                    <th>{{$test_info['total_marks']}}</th>
                                </tr>
                                <tr> 
                                    <th>Correct Marks</th>
                                    <th>{{$test_info['correct_marks']}}</th>
                                </tr>
                                <tr> 
                                    <th>Wrong Marks</th>
                                    <th>{{$test_info['wrong_marks']}}</th>
                                </tr>
                                <tr> 
                                    <th>Obtained Marks</th>
                                    <th>{{$test_info['ob_marks']}}</th>
                                </tr>
                                <tr> 
                                    <th>Percentage</th>
                                    <th>{{$test_info['percentage']}}%</th>
                                </tr>
                                
                                
                                

                               
                            </tbody>
                           

                            
                        </table>
                        
                        
                    

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
 </script>
    
@endsection
