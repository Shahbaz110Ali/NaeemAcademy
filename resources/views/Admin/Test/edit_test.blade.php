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
                                    <form action="{{ route('admin.test.save') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$test['id']}}">
                                        <input type="hidden" name="category_id" value="{{$test['category_id']}}">

                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i class="icon-pencil mr-10"></i>Test details</h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Name"
                                                            value="{{ $test['name'] }}">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Options</label>
                                                        <input type="number" value="4" class="form-control" name="total_options"
                                                            placeholder="Total Options"
                                                            value="{{ $test['total_options'] }}">
                                                        @error('total_options')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Question Per Page</label>
                                                        <input type="number"  class="form-control" name="q_per_page"
                                                            placeholder="Total question per page"
                                                            value="{{ $test['question_per_page'] }}">
                                                        @error('q_per_page')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Min Marks</label>
                                                        <input type="number" value="1" class="form-control" name="min_marks"
                                                            placeholder="Min Marks"
                                                            value="{{ $test['min_marks'] }}">
                                                        @error('min_marks')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Max Marks</label>
                                                        <input type="number" value="100" class="form-control" name="max_marks"
                                                            placeholder="Max Marks"
                                                            value="{{ $test['max_marks'] }}">
                                                        @error('max_marks')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Negative Marks</label>
                                                        <input type="number" value="0" class="form-control" name="negative_marks"
                                                            placeholder="Negative Marks"
                                                            value="{{ $test['negative_marks'] }}">
                                                        @error('negative_marks')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <!-- /Row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Type</label>
                                                        <select class="form-control" name="type">
                                                            <option value="practice" {{ (($test['type'] === 'practice')?"selected":"" ) }}>Practice</option>
                                                            <option value="competition" {{ (( $test['type'] == "competition")?"selected":"" ) }}>Competition</option>
                                                            
                                                        </select>
                                                        @error('type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1" {{ (($test['status'] == 1)?"selected":"" ) }}>Active</option>
                                                            <option value="2" {{ (($test['status'] == 2)?"selected":"" ) }}>Inactive</option>
                                                        </select>
                                                        @error('status')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Row -->
                                            <div class="seprator-block"></div>
                                            <h6 class="txt-dark capitalize-font"><i class="icon-clock mr-10"></i>Test duration Settings</h6>
                                            <hr>
                                            <?php
                                            $duration_disable = empty($test['duration']) ? "disabled" : "" ;
                                            $duration_checked = !empty($test['duration']) ? "checked" : "" ;
                                            ?>
                                            
                                                
                                          
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkbox checkbox-primary">
                                                        <input {{$duration_checked}} id="set_duration"  name="set_duration" type="checkbox" value="1" {{ (old('set_duration') == "1")?"checked":"" }}>
                                                        <label for="set_duration" class="control-label"> Set Duration </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Duration in minutes</label>
                                                        <input {{$duration_disable}}  type="number" class="form-control" id="duration" name="duration"
                                                            placeholder="duration in minutes"
                                                            value="{{ $test['duration'] }}">
                                                        @error('duration')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10"> Save</button>
                                            <a href="{{route("admin.category",$test['category_id'])}}" class="btn btn-default">Cancel</a>
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


