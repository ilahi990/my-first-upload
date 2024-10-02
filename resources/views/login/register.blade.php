<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title text-center">Register</h2>
                        <form action="{{route('login.registeration')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label"> Name</label>
                                <input type="text" value="{{old(key: 'name')}}" class="form-control @error('name') is-invalid @enderror" name="name" >
                                @error('name')
                                  <p class="invalid-feedback">{{$message}}</p>  
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" value="{{old(key: 'email')}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" >
                                @error('email')
                                  <p class="invalid-feedback">{{$message}}</p>  
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" >
                                @error('password')
                                  <p class="invalid-feedback">{{$message}}</p>  
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password" >
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
