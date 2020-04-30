<!DOCTYPE html>
<html>
<head>
  <title>@yield('titulo')</title>
  <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <!--Import materialize.css-->
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
 <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!--Let browser know website is optimized for mobile-->
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header>
 <nav>
   <div class="nav-wrapper black">
     <div class="container">
       <a href="{{route('todo.index')}}" class="brand-logo center">TO DO</a>

       <a href="#!" data-activates="mobile" class="button-collapse">
        <i class="material-icons">menu</i></a>

         <ul class="right hide-on-med-and-down">
            <li><a href="{{route('todo.listar')}}">Tasks</a></li>
  		    </ul>
           <ul class="side-nav " id="mobile">
    	       <li><a href="{{route('todo.listar')}}">Tasks</a></li>
           </ul>

     </div>
   </div>
 </nav>
</header>
