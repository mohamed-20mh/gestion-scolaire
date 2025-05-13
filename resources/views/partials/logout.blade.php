<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn mt-3" style="background-color: #f25c84; color:white;">Se déconnecter</button>
</form>
