

<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
    @include("admin.navbar")
    <div class="container pt-6">
        `
        <form class="row g-3" action="{{ url('/uploadfood') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">price</label>
                <input type="text" class="form-control" name="price">
            </div>
            
            <div class="col-12 pt-6">
                <label for="inputAddress2" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Write description here">
            </div>
            <div class="col-12 pt-6">
                <label for="formFile" class="form-label">select Food image</label>
                <input class="form-control" type="file" name="image">
            </div>
    
    
            <div class="col-12 pt-6 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <div class="container pt-6">
          <table class="table table-sucess table-striped ">             
            <thead>
                <tr>                  
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $user)
                <tr>
                    <td>{{$user->title}}</td>
                    <td>{{$user->price}}</td>
                    <td>{{$user->description}}</td>
                    <td><img src="/foodimage/{{$user->image}}"></td>
                    <td><a href="{{ url('/deletefoodmenu',$user->id)}}">Delete</a>|
                        <a href="{{ url('/getfoodmenu',$user->id)}}">Edit</a></td>                 
                </tr>
                @endforeach
                
            </tbody>        
          </table>
        </div>
        
    </div>
    
  </div>
    @include("admin.adminscript")
    
  </body>
</html>