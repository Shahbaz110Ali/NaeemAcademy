@extends("Layout.Admin.master")

@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-wrap">
                                    <form action="{{ route('admin.question.save') }}" method="POST">

                                        @csrf
                                       <input type="hidden" name="test_id" value="{{$test['id']}}">
                                        <input type="hidden" name="id" value="{{$question['id']}}">

                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i class="icon-pencil mr-10"></i>Question details</h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Question</label>
                                                        <textarea  class="tinymce form-control" name="question" id="question"
                                                            placeholder="Question">{{ $question['question'] }}</textarea>
                                                            
                                                        @error('question')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="total_options" id="total_options" value="{{$test['total_options']}}">
                                               
                                                @for ($i = 1; $i <= $test['total_options']; $i++)
                                                @php
                                                    $op = json_decode($question['option']);
                                                    $op = $op[$i-1];
                                                @endphp
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Option {{$i}}</label>
                                                        <textarea  class="form-control"name="option{{$i}}"
                                                            placeholder="option" id="{{'option_'.$i}}">{{$op}}</textarea>
                                                        @error('option'.$i)
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                    
                                                @endfor
                                                
                                            </div>

                                            {{-- <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Answer</label>
                                                        <textarea  class="form-control" name="answer"
                                                            placeholder="Answer">{{ $question['answer'] }}</textarea>
                                                            
                                                        @error('answer')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                            

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Explanation</label>
                                                        <textarea  class="tinymce form-control" name="explanation" id="explanation"
                                                            placeholder="explanation">{{ $question['explanation'] }}</textarea>
                                                           
                                                            
                                                        @error('explanation')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Answer</label>
                                                        <select class="form-control" name="answer">
                                                            <option value="">Choose correct option</option>
                                                            @for ($i = 1; $i <= $test['total_options']; $i++)
                                                            <option value="option{{$i}}" {{ (($question['answer'] == 'option'.$i)?"selected":"" ) }}>Option {{$i}}</option>
                                                            @endfor
                                                        </select>
                                                        @error('answer')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <!-- /Row -->
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1" {{ (( $question['status'] == 1)?"selected":"" ) }}>Active</option>
                                                            <option value="2" {{ (( $question['status'] == 2)?"selected":"" ) }}>Inactive</option>
                                                        </select>
                                                        @error('status')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10"> Save</button>
                                            <a href="{{route("admin.question",$test['id'])}}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
@endsection

@push('scripts')
    <script>
        $("#set_duration").change(function() {
            if($(this).prop('checked')) {
                $("#duration").attr('disabled', false);
            }
            else {
                $("#duration").attr('disabled', true);
            }
        });
    </script>

    <script>

	ClassicEditor.create( document.querySelector( '#question' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} ).then( editor => {
			window.editor = editor;
		} ).catch( err => {
			console.error( err.stack );
		} );

    ClassicEditor.create( document.querySelector( '#explanation' ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    } ).then( editor => {
        window.editor = editor;
    } ).catch( err => {
        console.error( err.stack );
    } );

    for(var i = 1; i <= $("#total_options").val(); i++){
        ClassicEditor.create( document.querySelector( '#option_'+i ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        } ).then( editor => {
            window.editor = editor;
        } ).catch( err => {
            console.error( err.stack );
        } );
    }

    
    </script>
@endpush


