<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>


</head>
<body>
    <style>
    .formm{
    background-color: ;
}
    </style>

    <div class="container ">
        <div class="bg-dark justify-content-center my-1 p-1">
<h2 class="text-center text-white ">Create New Item</h2>
</div>
<div class=" d-flex justify-content-end">
               <a href="{{route('crud.products')}}"><button class="btn btn-success">back</button></a> 
            </div>
      <div class=" row d-flex justify-content-center">

            <div class="col-md-10">
                <div class="card border-1 shadow-lg my-2">
                    
                
        <form enctype="multipart/form-data" action="{{route('crud.update',$products->id)}}" method="post">
           @method('put') 
            @csrf
           
            <div class="formm card-body">
            <div class="mb-3">
                <label class="form-label h5" for="Name">Name</label>
                <input value="{{old('name',$products->name)}}" type="text" class="form-control @error('name') is-invalid @enderror " name="name" placeholder="Enter item name" >
                @error('name')
                  <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label class="form-label h5" for="Price">Price</label>
                <input value="{{old('price',$products->price)}}"  type="number" class="@error('price') is-invalid @enderror form-control" name="price" placeholder="Enter item price" >
                @error('price')
                  <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>
            <div class=" mb-3">
                <label class="form-label h5" for="description">Description</label>
                <textarea  class="@error('description') is-invalid @enderror form-control" name="description" rows="3" placeholder="Enter item description" >{{old('description',$products->description)}}</textarea>
                @error('description')
                  <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>
            <div class=" mb-3">
                <label class="form-label h5" for="email">Email</label>
                <input value="{{old('email',$products->email)}}"  type="email" class="@error('email') is-invalid @enderror form-control" name="email" placeholder="Enter your email" >
                @error('email')
                  <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>
            <div >
                <label class="form-label h5 my-1" for="image">image</label>
                <input value="{{old('image',)}}" type="file" class="form-control-file" name="image" >

                @if ($products->image !="")
                <img class="w-50 my-2" src="{{asset('uploads/'.$products->image)}}" alt="">
                @endif
            </div >
            <div class="d-grid">
            <button type="submit" class="btn btn-sm mt-2 btn-primary ">update</button>
           </div>
        </div>
    </form>
    
    </div>
    </div>
  </div>
</div>
</body>
</html>