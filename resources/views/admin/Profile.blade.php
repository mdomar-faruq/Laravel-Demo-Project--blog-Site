@extends('layouts.AdminDashboard')
@section('Content')
<div class="container-fluid" style="height: 500px; weight:400px; padding-left: 270px; padding-top: 90px">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-light">
					Account Setting
				</div>
				<hr>
				<form  method="POST" action="{{ route('AdminProfilePost') }}">
				<div class="card-body">
					<div class="row mb-5">
						<div class="col-md-4 mb-4">
							<div>Profile Information</div>
							<div class="text-muted small">
								Thes information are visible to the public.
							</div>
						</div>

                      @csrf
						<div class="col-md-8">
					      <div class="form-group col-md-4">
							    <label for="exampleInputName">Name</label>
							    <input type="name" name="name" class="form-control" id="exampleInputName" value="{{ Auth::user()->name}}" required>

							    <label for="exampleInputEmail1">Email address</label>
							    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ Auth::user()->email}}" required>

					    </div>
					</div>
				</div>

			</div>
				<div class="card-body">
					<div class="row mb-5">

					<div class="col-md-4 mb-4">
							<div>Access Credentials</div>
							<div class="text-muted small">
								Leave credentials fields empty.if you don't wish the passwpord.
							</div>
					</div>
						@if(session('success'))
							{{session('success')}}
						@endif
						@if($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{$error}}</li>
										@endforeach
								</ul>
							</div>
							@endif
					<div class="col-md-8 ">
						<div class="form-group col-md-4 ">

						<label for="exampleInputEmail1">Current Password</label>
					    <input type="password" name="password" class="form-control" id="exampleInputEmail1" >

					    <label for="exampleInputEmail11">New Password</label>
					    <input type="password" name="New_password" class="form-control" id="exampleInputEmail11" >


					    <label for="exampleInputEmail12">New password Confirmation</label>
					    <input type="password" name="New_password_confirmation"  autocomplete="New_password" class="form-control validate" id="exampleInputEmail12" >

						</div>
					</div>
				</div>
			</div>
		<div> <button class="btn btn-primary float-right" type="submit">Save Change</button></div>


  </form>



			</div>
		</div>
	</div>
</div>



@endsection
