@extends("Layout.Admin.master")

@section('content')

    <div class="row">

        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Tests that will be displayed on home</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-primary btn-sm">New Category</a>
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
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse ($data['categories'] as $item)
                                        <tr>
                                            <td>{{$item['title']}}</td>
                                            <td>
                                                @if($item['status'] == 1)
                                                <span class="text-success">Active</span>    
                                                @else
                                                <span class="text-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="{{route("admin.category.edit",$item['id'])}}" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                <a href="{{route("admin.category",$item['id'])}}" class="mr-25" data-toggle="tooltip" data-original-title="View">
                                                    <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                                <a href="javascript:void(0)" data-href="{{route("admin.category.delete",$item['id'])}}" data-toggle="tooltip" class="sa-warning" data-original-title="Delete"> <i
                                                        class="fa fa-close text-danger"></i> </a>
                                            </td>
                                        </tr>
                                        
                                            
                                        @empty
                                        <tr>
                                            <td colspan="4">Empty</td>
                                        </tr>   
                                        @endforelse --}}
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

    
    </div>

@endsection
