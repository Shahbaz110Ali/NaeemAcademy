@extends("Layout.User.master")

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
                                    <form action="{{ route('user.course.purchase') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user['id']}}" />
                                        <input type="hidden" name="course_id" value="{{$course['id']}}" />
                                        <div class="form-body">
                                            {{-- <h3 class="txt-dark capitalize-font"></i>Buy Request</h3> --}}
                                            {{-- <hr> --}}
                                            {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Course Type</label>
                                                        <input type="text" class="form-control" name="course_type"
                                                            placeholder="Course Type"
                                                            value="{{ old('course_type') }}">
                                                        @error('course_type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Course Title</label>
                                                        <input type="text" class="form-control" name="course_title"
                                                            placeholder="Course Title"
                                                            value="{{ old('course_title') }}">
                                                        @error('course_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Course Description</label>
                                                        <textarea name="course_description" class="form-control" rows="3"
                                                            placeholder="More about this course..">{{ old('course_description') }}</textarea>
                                                        @error('course_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Course Price</label>
                                                        <input type="text" class="form-control" name="course_price"
                                                            placeholder="Course Price"
                                                            value="{{ old('course_price') }}">
                                                        @error('course_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Discount %</label>
                                                        <input type="number" class="form-control" name="course_discount"
                                                            placeholder="Discount %"
                                                            value = "0"
                                                            value="{{ old('course_discount') }}">
                                                        @error('course_discount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                                  
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Banner Image</label>
                                                        <input type="file" name="banner_image" class="form-control">
                                                        @error('banner_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
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
                                            <br> --}}
                                            <h3 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>Payment Proof</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Payment Method</label>
                                                        <input type="text" class="form-control" name="payment_method"
                                                            placeholder="Payment Method"
                                                            value="{{ old('payment_method') }}">
                                                        @error('payment_method')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Payment Date</label>
                                                        <input type="text" class="form-control" name="payment_date"
                                                            placeholder="Payment Date"
                                                            value="{{ old('payment_date') }}">
                                                        @error('payment_date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Amount Paid</label>
                                                        <input type="text" class="form-control" name="amount_paid"
                                                            placeholder="Amount Paid"
                                                            value="{{ old('amount_paid') }}">
                                                        @error('amount_paid')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Payment Recept / Screenshot</label>
                                                        <input type="file" name="image_proof" class="form-control">
                                                        @error('image_proof')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                           
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10">Submit Request</button>
                                            <a href="{{route("courses")}}" class="btn btn-default">Cancel</a>
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
        $("#home_page").change(function() {
            if($(this).prop('checked')) {
                $("#priority").attr('disabled', false);
            }
            else {
                $("#priority").attr('disabled', true);
            }
        });
    </script>
@endpush


