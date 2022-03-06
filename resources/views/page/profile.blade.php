@extends('includes.headerlight')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="/css/app.css" rel="stylesheet">
<div class="container">
 <div class="row">
   <div class="col-2"></div>
   <div class="col-6">
        <p class="fs-1 text-uppercase">profile</p>
         <form method="post" action="/profile">
            @csrf
            <div class="mb-3">
             <label  class="form-label">Display name</label>
               <input type="text" class="form-control" value={{$userdata->name}} name="name" id="name">  
            </div>
             <button type="submit" value={{$userdata->id}} class="btn btn-primary" name="id">Change Name</button>
         </form>
       <p class="fs-3"> Email addresses</p>
       <p class="fs-">Select or add a new email address to receive notifications. Only verified emails can be designated as the primary email address, which is used to log in.</p>
       <table class="table">
         <thead>
           <tr>
            <th scope="col">Email address</th>  
           </tr>
         </thead>
             <td>{{$userdata->email}}</td>
          <tbody>
       </tbody>
    </table>
   </div>
 </div>
</div>

@endsection

