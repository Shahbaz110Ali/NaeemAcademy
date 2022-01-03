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
                                    <div class="clearfix">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    </div>
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
                                                        <form  action="{{ route('forget.password.post') }}" method="POST">
                                                        @csrf
                                                            <div class="form-group">
                                                                <label class="control-label mb-10">Email address</label>
                                                                <div class="input-group">
                                                                    <input type="email" name="email" class="form-control" required="" id="exampleInputEmail_2" placeholder="Enter email">
                                                                    <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                </div>
                                                                @if ($errors->has('email'))
                                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                                @endif
                                                                <p class="pt-5">We'll send you an email to reset your password.</p>
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
