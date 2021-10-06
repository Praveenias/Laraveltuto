<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
    @include("admin.navbar")
    <div class="container pt-6">
    <form class="row " action="{{ url('/updatefood', $data->id ) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Title</label>
            <input type="text" class="form-control" value="{{ $data->title }}" name="title">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">price</label>
            <input type="text" class="form-control" value="{{ $data->price }}" name="price">
        </div>
        
        <div class="col-12 pt-6">
            <label for="inputAddress2" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $data->description }}">
        </div>
        <div class="col-12 pt-6">
            <label for="formFile" class="form-label">select Food image</label>
            <input class="form-control" type="file" name="image">
        </div>
        <div class="col-12 pt-6 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
  </div>
    @include("admin.adminscript")
    
  </body>
</html>