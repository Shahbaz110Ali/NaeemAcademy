<!DOCTYPE html>
<html lang="en">
    @include('Layout.includes.head')
    <body>
        <div class="wrapper pa-0">
            <div class="page-wrapper pa-0 ma-0">
                <div class="container-fluid">
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle">
                            <div class="auth-form  ml-auto mr-auto no-float">
                                <div class="panel panel-default card-view mb-0">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <h6 class="panel-title txt-dark">forgot password</h6>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-wrap">
                                                        <form  action="{{ route('reset.password.post') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="token" value="{{ $token }}">
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Email address</label>
                                                                <div class="input-group">
                                                                    <input type="email"  name="email" class="form-control" required="" id="exampleInputEmail_2" placeholder="Enter email">
                                                                    <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                </div>
                                                                @if ($errors->has('email'))
                                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                                @endif
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label mb-10" for="exampleInputpwd_2">New Password</label>
                                                                <div class="input-group">
                                                                    <input type="password" name="password" class="form-control" required="" id="exampleInputpwd_2" placeholder="Enter new pwd">
                                                                    <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                </div>
                                                                @if ($errors->has('password'))
                                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label mb-10" for="exampleInputpwd_3">Confirm Password</label>
                                                                <div class="input-group">
                                                                    <input type="password" name="password_confirmation" class="form-control" required="" id="exampleInputpwd_3" placeholder="re-enter pwd">
                                                                    <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                </div>
                                                                @if ($errors->has('password_confirmation'))
                                                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <button type="submit" class="btn btn-success btn-block">reset</button>
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
                    </div>
                </div>
            </div>
        </div>
    @include('Layout.includes.foot')
    </body>
</html>

