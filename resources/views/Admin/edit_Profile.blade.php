@extends("Layout.Admin.master")

@section('content')
<div class="container-fluid bootstrap snippet">
  <br><br>
  <div class="row">
    <form class="form" action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="col-sm-4"><!--left col-->
        <div class="text-center">
          <div ><h1>{{$user['name']}}</h1></div>
          <img  src="{{asset('storage/img/admins/'.$user['image'])}}" class="avatar img-circle img-thumbnail" id="img" alt="avatar">
          <input type="file" class="form-control" name="user_img">
          @error('user_img')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div></hr><br>
      </div><!--/col-4-->

      <div class="col-sm-6">
        <ul class="nav nav-tabs">
          <li ><a data-toggle="tab" href="#user_information">User Information</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active"id="user_information" >
            <hr>
            
              <ul class="list-group">
                <li class="list-group-item text-muted">Information</li>

                <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span>{{$user['email']}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Name</strong></span>
                  <input type="text" name="name" class="" placeholder="Enter your name" value="{{$user['name']}}">
                  @error('name')
                  <br>
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </li>
               
              </ul> 
              <div class="form-group">
                <div class="col-xs-12">
                  <button type="submit" class="btn btn-lg btn-success">Save</button>
                  <a class="btn btn-lg btn-danger" href="{{route('admin.profile')}}">Cancel</a>
                  
                </div>
              </div>
            
            <hr>
          </div><!--/tab-pane-->
        </div>
      </div>
    </form>
  </div><!--/row-->
</div><!--/container-->
@endsection


