warehouse staff page

<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link px-3">
    <span class="me-2"><i class="bi bi-box-arrow-left"></i></span>
    <span>{{ __('Logout') }}</span>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
