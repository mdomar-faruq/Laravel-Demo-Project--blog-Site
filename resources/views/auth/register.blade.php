<!--


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>
  Register
  </title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css" rel="stylesheet">

  <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body ng-controller="RegisterCtrl" ng-app="myApp">
 <div class="container">
   <div id="signup">
      <div class="signup-screen">
         <div class="space-bot text-center">
            <h1>Sign up</h1>
           <div class="divider"></div>
         </div>
           <form class="form-register" method="POST" action="{{ route('register') }}" name="register" novalidate>
                 @csrf
	            <div class="input-field col s6">
              <input id="first-name" class="validate @error('name') is-invalid @enderror" name="name" type="text"  required>
              <label for="first-name">Name</label>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

             <div class="input-field col s6">
              <input id="email" type="email" class="validate @error('email') is-invalid @enderror" name="email" ng-model="email"  required>
              <label for="email">Email</label>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
             </div>
             <p class="alert alert-danger" ng-show="form-register.email.$error.email">Your email is invalid.</p>
             <div class="input-field col s6">
               <input id="password" type="password" class="validate @error('password') is-invalid @enderror" name="password" ng-model="password" ng-minlength='6'  required>
               <label for="password">Password</label>
               @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
              </div>
              <p class="alert alert-danger" ng-show="form-register.password.$error.minlength || form.password.$invalid">Your password must be at least 6 characters.</p>
              <div class="input-field col s6">
            <input id="password-confirm" type="password" class="validate" name="password_confirmation"   required >
            <label for="password-confirm">password_confirmation</label>
           </div>
              <div class="space-top text-center">
               <button ng-disabled="form-register.$invalid" type="submit" class="waves-effect waves-light btn done">
               <i class="material-icons left">done</i> Done
               </button>
               <button type="button" class="waves-effect waves-light btn cancel">
               <i class="material-icons left">clear</i>Cancel
               </button>
              </div>
             </form>
           </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script>
    var myApp = angular.module("myApp", []);
    myApp.controller("RegisterCtrl", function ($scope) {

    });
    </script>
</body>
</html>
