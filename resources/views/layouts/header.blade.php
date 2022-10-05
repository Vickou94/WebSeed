<header>
      <div class="collapse bg-nav border border-bottom" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">À propos</h4>
              <p class="text-light">WebSeed est un projet de site e-commerce réalisé dans le cadre de ma formation de développeur web fullstack au sein de la 3W Academy.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="mailto:victor.noel@outlook.fr" target="_blank" class="text-white"><i class="fas fa-envelope mx-1"></i>Email</a></li>
                <li><a href="https://www.linkedin.com/in/victor-no%C3%ABl-440b8521a/" target="_blank" class="text-white"><i class="fa-brands fa-linkedin mx-1"></i>LinkedIn</a></li>
                <li><a href="https://github.com/Vickou94" target="_blank" class="text-white"><i class="fa-brands fa-github mx-1"></i>GitHub</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-nav box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="{{route('homepage')}}" class="navbar-brand d-flex align-items-center">
            <strong><i class="fa-brands fa-pagelines mx-3"></i>WebSeed</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          @if(!Auth::check())
          <a class="text-light" href="{{route('register')}}"><i class="fas fa-book mx-1"></i>S'inscrire</a>
          <a class="text-light" href="{{route('login')}}"><i class="fas fa-user mx-1"></i>Se connecter</a>
          @endif
          @if(Auth::check())
          <a class="text-light" href="{{route('cart')}}"><i class="fas fa-cart-shopping mx-1"></i>Panier</a>
          <a class="text-light btn-logout" href="{{route('logout')}}"><i class="fas fa-right-from-bracket mx-1"></i>Se déconnecter</a>
          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
          @csrf
          </form>
          @endif
        </div>
      </div>
    </header>