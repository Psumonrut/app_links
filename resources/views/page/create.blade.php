@extends('includes.headerlight')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="/css/app.css" rel="stylesheet">

<div class="container">
   <p class="fs-1 text-uppercase">create Link</p>
<form method="POST" action="/create">
    @csrf
    <div class="mb-3">
     <div class="input-group">
     <select class="form-control margins" >
      <option >bit.ly</option>
     </select>
</div>
    </div>
   <div class="mb-3">
       <label for="exampleInputEmail1" class="form-label">Enter Long URL</label>
       <input type="text" class="form-control" name="longURL" id="longURL" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
      <label  class="form-label">Source</label>
      <input type="text" class="form-control"name="Source" id="Source">
  </div>
    <div class="mb-3">
      <label class="form-label">Medium</label>
      <input type="text" class="form-control" name = "Medium" id="Medium">
  </div>
      <div class="mb-3">
      <label  class="form-label">Campaign</label>
      <input type="tex" class="form-control" name="Campaign" id="Campain">
  </div>
      <button type="submit" class="btn btn-primary">Create</button>
</form>
 </div>


@endsection
