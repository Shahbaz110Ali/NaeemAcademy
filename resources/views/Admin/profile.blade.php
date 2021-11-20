@extends("Layout.Admin.master")

@section('content')
<div class="container-fluid bootstrap snippet">
  <br><br>
  <div class="row">
    {{-- <div class="col-sm-3">&nbsp;</div> --}}
  	<div class="col-sm-4"><!--left col-->
      <div class="text-center">
        <div ><h1>{{$user['name']}}</h1></div>
        <img  src="{{asset('storage/img/admins/'.$user['image'])}}" class="avatar img-circle img-thumbnail" id="img" alt="avatar">
      </div></hr><br>
    </div><!--/col-3-->

    <div class="col-sm-6">
      <ul class="nav nav-tabs">
        <li ><a data-toggle="tab" href="#user_information">User Information</a></li>
        <li><a data-toggle="tab" href="#change_password">Change Password</a></li>  
      </ul>

      <div class="tab-content">
        <div class="tab-pane active"id="user_information" >
          <hr>
          <form class="form" action="#" method="post"  >
            <ul class="list-group">
              <li class="list-group-item text-muted">Information</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Name</strong></span>{{$user['name']}}</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span>{{$user['email']}}</li>
            </ul> 
            <div class="form-group">
              <div class="col-xs-12">
                <br>
                <a class="btn btn-lg btn-primary" href="{{route('admin.profile.edit')}}">Edit</a>
                
              </div>
            </div>
          </form>
          <hr>

        </div><!--/tab-pane-->
            
        <div class="tab-pane" id="change_password">   
          <h2></h2>  
          <hr>
          <form class="form" action="{{route('admin.password.change')}}" method="post">
            @csrf
            <div class="form-group">
              <div class="col-xs-12">
                <label for="New Password"><h4>New Password</h4></label>
                  <input type="password" class="form-control" name="new_password" id="new_password" >
                  @error('new_password')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
            </div>
            <div class="form-group">        
              <div class="col-xs-12">
                <label for="Confrim Password"><h4>Password Confrim</h4></label>
                <input type="password" class="form-control" name="confrim_password" id="confrim_password" >
                @error('confrim_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>                      
            <div class="form-group">
              <div class="col-xs-12">
                <br>
                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
              </div>
            </div>
          </form>
        </div><!--/tab-content-->
      </div>
    </div><!--/col-9-->
  </div><!--/row-->
{{-- </div> --}}
@endsection


