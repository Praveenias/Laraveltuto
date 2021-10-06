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
          <th scope="col">Number</th>
          <th scope="col">Guests</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Message</th>
          </tr>
      </thead>
      <tbody>
          @foreach($data as $user)
          <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->number}}</td>
              <td>{{$user->guest}}</td>
              <td>{{$user->date}}</td>
              <td>{{$user->time}}</td>
              <td>{{$user->message}}</td>
              
          </tr>
          @endforeach
          
      </tbody>        
      </table>
    </div>
  </div>
    @include("admin.adminscript")
    
  </body>
</html>