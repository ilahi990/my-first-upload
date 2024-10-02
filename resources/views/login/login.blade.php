<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.card {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-title {
    margin-bottom: 20px;
}

</style>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title text-center">Login</h2>
                        <form action="{{route('login.authenticate')}}" method="POST" >
                            
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input type="text"  class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                @error('email')
                                  <p class="invalid-feedback">{{$message}}</p>  
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" id="password" >
                                @error('password')
                                  <p class="invalid-feedback">{{$message}}</p>  
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
                <a href="{{route('login.register')}}">don't have an account <h1>Register</h1> </a>
            </div>
            
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $(".alert").delay(1000).slideUp(300); // Adjust the delay time as needed
        });
    </script></body>
</html>
