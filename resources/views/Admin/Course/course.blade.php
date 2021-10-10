@extends("Layout.Admin.master")


@section('content')
<style>
    .avatar{
        width: 30px;
        height: 30px;
        border-radius: 100%
    }
    .banner{
        width: 200px;
        height: 100px;
        border-radius: 10px;
    }
</style>
    <div class="row">
        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Courses</h6>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.course.add') }}" class="btn btn-primary btn-sm">New Course</a>
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
                                            <th>Banner</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($courses as $item)
                                        <tr>
                                            <td><img class="banner" src="{{asset("storage/img/course/course_banner/".$item['course_image'])}}" alt="banner"></td>
                                            <td>{{$item['title']}}</td>
                                            <td>{{$item['description']}}</td>
                                            <td>{{$item['type']}}</td>
                                            <td>{{$item['price']}}</td>
                                            <td>{{(!empty($item['discount']) && $item['discount'] != 0 )? $item['discount'] : "-" }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3 d-flex"><img class="avatar" src="{{asset("storage/img/course/course_creator/".$item['creator_image'])}}" alt="avatar"></div>
                                                    <div class="col-md-9 d-flex">{{$item['creator']}}</div>
                                                </div>
                                            </td>
                                            
                                            <td>{{($item['status'] == 1)?"Active":"Inactive"}}</td>
                                            
                                            <td class="text-nowrap">
                                                 
                                                <a href="{{route("admin.course.edit",$item['id'])}}" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                {{-- <a href="{{route("admin.category",$item['id'])}}" class="mr-25" data-toggle="tooltip" data-original-title="View">
                                                    <i class="fa fa-eye text-inverse m-r-10"></i> </a> --}}
                                                <a href="javascript:void(0)" data-href="{{route("admin.course.delete",$item['id'])}}" data-toggle="tooltip" class="sa-warning" data-original-title="Delete"> <i
                                                        class="fa fa-close text-danger"></i> </a>
                                            </td>
                                        </tr>
                                        
                                            
                                        @empty
                                        <tr>
                                            <td colspan="4">Empty</td>
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
