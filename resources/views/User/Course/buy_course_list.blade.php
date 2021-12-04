{{-- {{dd($req_list)}} --}}

@extends("Layout.User.master")

@section('content')

    <div class="row">

        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Requested Courses</h6>
                    </div>
                    <br>
                    <hr>
                    <form action="{{route('user.course.request.list.filter')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="from">From Date</label>
                                <input type="date" class="form-control" id="from" name="from_date" placeholder="From Date" value="{{ (isset($from_date)?$from_date:null) }}">
                                @error('from_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="to">To Date</label>
                                <input type="date" class="form-control" id="to" name="to_date" placeholder="To Date" value="{{ (isset($to_date)?$to_date:null) }}">
                                @error('to_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 col-sm-12 d-flex">
                                <button type="submit" class="btn btn-info mt-20">Filter</button>
                            </div>
                        <div>
                    </form>

                    <div class="clearfix"></div>
                    
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap ">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Author</th>
                                            <th>Price</th>
                                            <th>Amount Paid</th>
                                            <th>Payment Method</th>
                                            <th>Payment Date</th>
                                            <th>Status</th>
                                         
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @forelse ($req_list as $item)
                                        <tr>
                                            <td>{{$item['course']['title']}}</td>
                                            <td>{{$item['course']['description']}}</td>
                                            <td>{{$item['course']['type']}}</td>
                                            <td>{{$item['course']['creator']}}</td>
                                            <td>{{$item['course']['price']}}</td>
                                            <td>{{$item['amount_paid']}}</td>
                                            <td>{{$item['payment_method']}}</td>
                                            <td>{{$item['payment_date']}}</td>
                                            <td>{{$item['status']}}</td>

                                            
                                            
                                            <td class="text-nowrap">
                     
                                                <a href="{{route("test.take",$item['id'])}}" class="mr-25" data-toggle="tooltip" data-original-title="View">
                                                    <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                              
                                            </td>
                                        </tr>
                                        
                                            
                                        @empty
                                        <tr>
                                            <td colspan="10">Empty</td>
                                        </tr>   
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bordered Table -->

    </div>

@endsection
