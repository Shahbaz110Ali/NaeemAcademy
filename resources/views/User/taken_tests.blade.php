@extends("Layout.User.master")

@section('content')

    <div class="row">

        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Participated Tests</h6>
                    </div>
                    <div class="pull-right">
                        {{-- <a href="{{ route('admin.interface.add') }}" class="btn btn-primary btn-sm">New Interface</a> --}}
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
                                            <th>Category</th>
                                            <th>Test</th>
                                            {{-- <th>Status</th> --}}
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @forelse ($tests as $item)
                                        <tr>
                                            <td>
                                                @php
                                                $index = 0;
                                                $max = count($item['category']);    
                                                @endphp
                                                @forelse (array_reverse($item['category']) as $cat)
                                                    {{$cat}} 
                                                    @php
                                                    $index++;
                                                    if($index != 0 && $index != $max){
                                                        echo " > ";
                                                    }    
                                                    @endphp
                                                    
                                                @empty
                                                    -
                                                @endforelse
                                            </td>
                                            <td>{{$item['name']}}</td>
                                            
                                            <td class="text-nowrap">
                     
                                                <a href="{{route("test.review",$item['id'])}}" class="mr-25" data-toggle="tooltip" data-original-title="View">
                                                    <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                              
                                            </td>
                                        </tr>
                                        
                                            
                                        @empty
                                        <tr>
                                            <td colspan="3">Empty</td>
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
