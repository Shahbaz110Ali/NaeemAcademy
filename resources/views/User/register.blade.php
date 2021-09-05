<!DOCTYPE html>
<html lang="en">
	@include('Layout.includes.head')
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
		
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="panel panel-default card-view mb-0">
									<div class="panel-heading">
										<div class="pull-left">
											<h6 class="panel-title txt-dark">Sign Up</h6>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="panel-wrapper collapse in">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-12 col-xs-12">
													@error('email')
													<div class="alert alert-danger alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ $message }}
													</div>
													@enderror
													<div class="form-wrap">
														<form action="{{ route('user.create') }}" method="POST">
															@csrf
															<div class="form-group">
																<label class="control-label mb-10" for="name">Name</label>
																<div class="input-group">
																	<input type="text" value="{{old('name')}}" name="name" class="form-control"  id="name" placeholder="Enter full name">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																</div>
																@error('name')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>

															<div class="form-group">
																<label class="control-label mb-10" for="email">Email address</label>
																<div class="input-group">
																	<input type="email" value="{{old('email')}}" name="email" class="form-control"  id="email" placeholder="Enter email">
																	<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																</div>
																@error('email')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="password">Password</label>
																<div class="input-group">
																	<input type="password" name="password" class="form-control"  id="password" placeholder="Enter pwd">
																	<div class="input-group-addon"><i class="icon-lock"></i></div>
																</div>
																@error('password')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
															
															<div class="form-group">
																<label class="control-label mb-10" for="contact">Contact</label>
																<div class="input-group">
																	<input type="text" value="{{old('contact')}}" name="contact" class="form-control"  id="contact" placeholder="Enter contact">
																	<div class="input-group-addon"><i class="icon-phone"></i></div>
																</div>
																@error('contact')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
															</div>
															<div class="form-group">
																<button type="submit" class="btn btn-success btn-block">sign up</button>
															</div>
															<div class="form-group mb-0">
																<span class="inline-block pr-5">Already have an account?</span>
																<a class="inline-block txt-danger" href="{{route("user.login")}}">Sign In</a>
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
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /#wrapper -->
		
		@include('Layout.includes.foot')
	</body>
</html>
