@extends('includes.headerlight')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="/css/app.css" rel="stylesheet">

<div class="container">
    <p class="fs-5"  id="linkcopy" href={{$link->long_urls}} name={{$link->link_name}}>{{$link->link_name}}</p>
               <button class="btn btn-primary" onclick=CopyLink()>Copy</button>
               <a class="btn btn-primary" type="button" role="button" title="Share on twitter"
               href= {{ "https://twitter.com/intent/tweet?url=" .$link->long_urls }}
                      rel="noopener" target="_blank">
               Share
                </a>
<form method="post" action="/save">
    @csrf
   <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Title</label>
       @if($link->title)
         <input type="text" value={{$link->title}}  class="form-control" name="title" id="title">
       @else 
          <input type="text" class="form-control" name="title" id="title">
       @endif
  </div>
  <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Customize back-half</label>
      <input type="text" class="form-control" name="link_name" value={{$link->link_name}}
       placeholder={{$link->link_name}}
      id="link_name">
  </div>

      <button type="submit" name="id" value={{$link->id}} class="btn btn-primary">Save</button>
</form>
 </div>
 <script>
  function CopyLink() {
  /* Get the text field */
  var link = document.getElementById("linkcopy");
  var name = link.getAttribute('name');
  var valuelink = link.getAttribute('href');
  navigator.clipboard.writeText(valuelink);
 }

</script>

@endsection
