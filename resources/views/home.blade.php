@extends('includes.headerlight')
@section('content')
<div class="row">
  <div class="col-4">
      @foreach ($link as $lins)
           <div class="list-group">
              <a  href={{"/home/links="  .$lins->id }} class="list-group-item list-group-item-action" aria-current="true">
              <h >{{@date("F",strtotime($linkdata->created_at))}}
                 {{@date("Y",strtotime($linkdata->created_at))}} 
             </h>
              @if($lins->title)
                 <p class="fw-bold">{{$lins->title}}</p>
              @else
                <p class=" fw-bold h_links" >{{$lins->long_urls}}</p>
              @endif
               <p class="nav-link" href={{$lins->long_urls}} target="_blank">{{$lins->link_name}}</p>
             
              </a>
            </div>
       @endforeach
  </div>
  <div class="col-7">
      @if ($linkdata != null)
            <p > CREATED {{@date("F",strtotime($linkdata->created_at))}}
                 {{@date("Y",strtotime($linkdata->created_at))}} |
                 {{$username->name}}
            </p>
            @if($linkdata->title)
              <p class="fs-1">{{$linkdata->title}}</p>
              @else
              <p class="fs-1 h_links">{{$linkdata->link_name}}</p>
            @endif
              <p class="fs-5 h_left">{{$linkdata->long_urls}}</p>
               <a class="nav-link"  id="linkcopy" href={{$linkdata->long_urls}} name={{$linkdata->link_name}} target="_blank">{{$linkdata->link_name}}</a>
               <button class="btn btn-primary" onclick=CopyLink()>Copy</button>
               <a class="btn btn-primary" type="button" role="button" title="Share on twitter"
               href= {{ "https://twitter.com/intent/tweet?url=" .$linkdata->long_urls }}
                      rel="noopener" target="_blank">
               Share
                </a>
                  <a class="btn btn-primary" type="button" role="button" 
                    href={{"/edit/links="  .$linkdata->id}}
                   >Edit</a>
        
      @endif
    </div>
   <div>
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


