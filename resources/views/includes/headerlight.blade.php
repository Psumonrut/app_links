<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link href="/css/app.css" rel="stylesheet">
<head >
  <nav class="navbar navbar-expand-lg navbar-light topnav">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @foreach ($menus as $menu)  
              @if ($menu->role_code == $roles )
                     @if($currentPath == $menu->desc)
                       <li class="nav-item">
                          <a class="nav-link" href={{$menu->path}}>  
                               <p class="Ts_bor_orange ">{{($menu->name)}}</p>
                          </a>
                         </li>
                         @else 
                           <li class="nav-item">
                             <a class="nav-link" href={{$menu->path}}>  
                               <p class="T_black ">{{($menu->name)}}</p>
                             </a>
                         </li>
                         @endif
                    @elseif($roles = 1 && $menu->role_code != 0)
                      @if($currentPath == $menu->desc)
                       <li class="nav-item">
                          <a class="nav-link" href={{$menu->path}}>  
                               <p class="Ts_bor_orange ">{{($menu->name)}}</p>
                          </a>
                         </li>
                         @else 
                      <li class="nav-item">
                          <a class="nav-link" href={{$menu->path}}>  
                               <p class="T_black ">{{($menu->name)}}</p>
                          </a>
                        </li>
                        @endif
                    @endif    
         @endforeach
     
         @if ($roles == 2|| $roles  == 1 )
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle T_black" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             {{$user}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/profile">Setting</a></li>
           
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                     document.getElementById('logout').submit();">Log Out</a>
           <form id="logout" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
                     </li>
          </ul>
        </li>
       
        @endif

      </ul>
    </div>
  </div>

</nav>

</head>
<body>
    <main style="margin-top:1%">
         @yield('content')
    </main>
</body>
<footer >
</footer>
</html>
