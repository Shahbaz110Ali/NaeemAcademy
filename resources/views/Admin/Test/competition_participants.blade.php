@extends("Layout.Admin.master")

@section('content')
    <div class="row">
        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Participants for test {{$test['name']}}</h6>
                    </div>
                    <div class="pull-right">
                        
                        {{-- <a href="{{ route('admin.test.add',$data['parent']['id']) }}" class="btn btn-primary btn-sm">New Test</a> --}}
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap ">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                          
                                          
                                            <th>Answered</th>
                                            <th>Un answered</th>
                                            <th>Correct</th>
                                            <th>Wrong</th>
                                            <th>+ve Marks</th>
                                            <th>-ve Marks</th>
                                            <th>Obtained</th>
                                            <th>Percentage</th>


                                            
                                            
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $item)
                                        <tr>
                                            <td>{{$item['name']}}</td>
                                            <td>{{$item['email']}}</td>
                                           
                                           
                                            <td>{{$item['test_info']['attempted_q']}}</td>
                                            <td>{{$item['test_info']['un_answered']}}</td>
                                            <td>{{$item['test_info']['correct']}}</td>
                                            <td>{{$item['test_info']['wrong']}}</td>
                                            <td>{{$item['test_info']['plus_marks']}}</td>
                                            <td>{{$item['test_info']['minus_marks']}}</td>
                                            <td>{{$item['test_info']['ob_marks']}}</td>
                                            <td>{{$item['test_info']['percentage']}}%</td>
                                            
                                            
                                            <td class="text-nowrap">
                                                
                                                <a href="{{route("admin.competition.review",[$test['id'],$item['id']])}}" class="mr-25" data-toggle="tooltip" data-original-title="View">
                                                    <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                                
                                            </td>
                                        </tr>
                                        
                                            
                                        @empty
                                        <tr>
                                            <td colspan="9">Empty</td>
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
