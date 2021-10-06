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
        <form class="row" action="{{ url('/createchef') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" class="form-control"  name="name">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Special</label>
                <input type="text" class="form-control"  name="special">
            </div>
                
            <div class="col-12 pt-6">
                <label for="formFile" class="form-label">select image</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="col-12 pt-6 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <table class="table table-sucess table-striped ">             
        <thead>
            <tr>                  
            <th scope="col">Name</th>
            <th scope="col">Special</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->special}}</td>
                
                <td><img src="/foodimage/{{$user->image}}"></td>
                <td><a href="{{ url('/deletefoodchef',$user->id)}}">Delete</a></td>
                                     
            </tr>
            @endforeach
            
        </tbody>        
        </table>
    </div>
    
  </div>
    @include("admin.adminscript")
    
  </body>
</html>