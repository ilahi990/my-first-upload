<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <title>Document</title>
</head>
<body>
 <div class="container">
    
            <div class="row d-flex justify-content-center">
                
                    @if (Session::has('success'))
                    <div class="col-md-10 alert alert-success">
                        {{Session::get('success')}}
                    </div>

                    
                    @endif
                    <div class="bg-dark justify-content-center ">
                        <h2 class="text-center text-white p-1">Simple Laravel Crud</h2>
                        </div>
                        <div class=" d-flex justify-content-end my-1">
                                        <a href="{{route('crud.create')}}"><button  class="btn btn-success">create</button></a>
                                    </div>
                                    
                                        <div class="col-md-10">
                                            <div class="card border-1 shadow-lg my-4">
                                                <div class="card-body">
                                                   
                                                        <table class="table table-hover">
                                                            
                                                                <tr>
                                                                    <th>id</th>
                                                                    <th>image</th>
                                                                    <th>Name</th>
                                                                    <th>email</th>
                                                                    <th>Price</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            @foreach ($products as $product)
                                                            <tr>
                                                                <td>{{$product->id}}</td>
                                                                <td>
                                                                  
                                                                        <img width="50" src="{{asset('uploads/'.$product->image)}}" alt="">
                                                                    
                                                                </td>
                                                                <td>{{$product->name}}</td>
                                                                <td>{{$product->email}}</td>
                                                                <td>{{$product->price}}</td>
                                                                <td class="d-flex justify-content-end">
                                                                    <a href="{{route('crud.edit',$product->id)}}"><button  class="btn btn-primary p-1">edit</button></a>
                                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger p-1 " type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                                    </form>
                                                                    
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
            
    </div>






    <script>
        $(document).ready(function() {
            $(".alert").delay(3000).slideUp(300); // Adjust the delay time as needed
        });
    </script>
    
</body>
</html>