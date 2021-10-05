
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
                <table class="table table-sucess table-striped">             
                <thead>
                    <tr>                  
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="#">Delete</a></td>
                    </tr>
                    @endforeach
                    
                </tbody>        
                </table>
            </div>
            

      </div>
        
        
        @include("admin.adminscript")
        
      </body>
    </html>