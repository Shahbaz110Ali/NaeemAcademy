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
                                    <form action="{{ route('admin.question.store') }}" method="POST">
                                        @csrf
                                       
                                        <input type="hidden" name="test_id" value="{{$test['id']}}">

                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i class="icon-pencil mr-10"></i>Question details for ({{$test['name']}})</h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Question</label>
                                                        <textarea  class="form-control" name="question"
                                                            placeholder="Question">{{ old("question") }}</textarea>
                                                            
                                                        @error('question')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="total_options" value="{{$test['total_options']}}">
                                               
                                                @for ($i = 1; $i <= $test['total_options']; $i++)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Option {{$i}}</label>
                                                        <input type="text"  class="form-control" name="option{{$i}}"
                                                            placeholder="option"
                                                            value="{{ old('option'.$i) }}">
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
                                                            placeholder="Answer">{{ old("answer") }}</textarea>
                                                            
                                                        @error('answer')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Answer</label>
                                                        <select class="form-control" name="answer">
                                                            <option value="">Choose correct option</option>
                                                            @for ($i = 1; $i <= $test['total_options']; $i++)
                                                            <option value="option{{$i}}" {{ ((old('answer') == 'option'.$i)?"selected":"" ) }}>Option {{$i}}</option>
                                                            @endfor
                                                        </select>
                                                        @error('answer')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Explanation</label>
                                                        <textarea  class="form-control" name="explanation"
                                                            placeholder="explanation">{{ old("explanation") }}</textarea>
                                                           
                                                            
                                                        @error('explanation')
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
                                                            <option value="1" {{ ((old('status') == 1)?"selected":"" ) }}>Active</option>
                                                            <option value="2" {{ ((old('status') == 2)?"selected":"" ) }}>Inactive</option>
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
@endpush


