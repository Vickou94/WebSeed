<a class="text-light btn-logout" href="{{route('logout')}}"><i class="fas fa-right-from-bracket mx-1"></i>Se déconnecter</a>
<form id="logout-form" action="{{route('logout')}}" method="POST">
    @csrf
</form>