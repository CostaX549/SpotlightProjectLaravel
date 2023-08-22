<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <link rel="icon" href="Ícone Spotlight+.png" type="image/png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>@yield('title')</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  



  

 


</head>
<header class="mt-2 mb-2" id="header">
  <div  id="menu">
          <div class="linha"></div>
          <div class="linha"></div> 
          <div class="linha"></div>
      </div>
</header>
  <body  id="body" >
    
    <br>
    

   
  <nav id="navbar" class="hide">
    <ul class="list-unstyled">
        <li>
            
              <img src="/img/IcSharpHome.svg">
            
                <a href="sobre nos2.html">Início
            </a>
        </li>
        
     
        
        <li>
           
             <img src="/img/IcBaselineLightbulb.svg">
             <a href="page3.html" >Plano de Negócios
            </a>
        </li>
        
        <li>
          <img src="/img/HeroiconsUsersSolid.svg">
            
          <a href="page5.html">Equipe/Colaboradores
      </a>
        </li>
        
        
        <li id="active" class="mb-4">
          
                <img src="/img/MaterialSymbolsPlayArrow.svg">
                <a href="index.html" >Streaming
            </a>
        </li>

        @guest
        <li>
         <a href="{{ route('login') }}">Login</a>
      </li>
      <li>
         <a href="{{ route('register') }}">Cadastrar</a>
      </li>
      
      @endguest

  
    </ul>
  
   
   

 
</nav>
<main id="main">
@yield('content')
</main>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous" defer></script>
<script src="/js/scripts.js" defer></script>
<script src="https://kit.fontawesome.com/3b129db68e.js" crossorigin="anonymous"></script>
</html>
