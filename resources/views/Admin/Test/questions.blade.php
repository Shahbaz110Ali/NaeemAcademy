@extends("Layout.Admin.master")

@section('content')
    <div class="row">

        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Manage questions for Test ({{$data['test']['name']}})</h6>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.question.add',$data['test']['id']) }}" class="btn btn-primary btn-sm">Add Question</a>
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
                                            <th>#</th>
                                            <th>Question</th>
                                            <th>Options</th>
                                            <th>Answer</th>
                                            <th>Explanation</th>
                                            <th>Status</th>

                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        
                                        
                                        @forelse ($data['questions'] as $item)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{!! $item['question'] !!}</td>
                                            <td>
                                                @php
                                                $seq = "a";
                                                 $options = json_decode($item['option']);  
                                                 foreach ($options as $option) {
                                                     echo "($seq) $option <br>";
                                                     $seq++;
                                                 } 
                                                @endphp
                                            </td>
                                            <td>{{$item['answer']}}</td>
                                            <td>
                                                @if (empty($item['explanation']))
                                                -
                                                @else
                                                {!! $item['explanation'] !!}    
                                                @endif
                                            </td>
                                           
                                            <td>
                                                @if($item['status'] == 1)
                                                <span class="text-success">Active</span>    
                                                @else
                                                <span class="text-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="{{route("admin.question.edit",$item['id'])}}" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                {{-- <a href="{{route("admin.question",$item['id'])}}" class="mr-25" data-toggle="tooltip" data-original-title="View">
                                                    <i class="fa fa-eye text-inverse m-r-10"></i> </a> --}}
                                                <a href="javascript:void(0)" data-href="{{route("admin.question.delete",$item['id'])}}" class="sa-warning" data-toggle="tooltip" data-original-title="Delete"> <i
                                                        class="fa fa-close text-danger"></i> </a>
                                            </td>
                                        </tr>
                                        
                                         @php
                                         $count++;    
                                         @endphp   
                                        @empty
                                        <tr>
                                            <td colspan="7">Empty</td>
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
