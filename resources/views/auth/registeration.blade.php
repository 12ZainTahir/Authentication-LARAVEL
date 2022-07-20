<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Authentication</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h4>
                    Registeration
                </h4>
                <hr>
                <form action="{{route('register-user')}}" method="post">
                    @if(Session::has('success'))  
                    <div class="alert alert-success">{{Session::get('success')}}</div>  
                    @endif

                    @if(Session::has('failed'))  
                    <div class="alert alert-danger">{{Session::get('failed')}}</div>  
                    @endif 
                    
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control"name="name" value="">
                    </div>
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control"name="email" value="">
                    </div>
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control"name="password" value="">
                    </div>
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    
                    <button class="btn btn-block btn-primary" type="submit">Register</button>
                    <a href="login">Already a User?</a>
                </form>
            </div>

        </div>
    </div>

  </body>
</html>