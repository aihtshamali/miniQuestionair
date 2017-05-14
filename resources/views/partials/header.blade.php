
@if (Route::has('login'))

  <div class="top-left links">
    <a  href="{{url('/')}}"  >home<strong> |</strong></a>
    <a href="{{url('/questionair')}}">questionair<strong> |</strong></a>
    <a href="#">Results</a>
  </div>
    <div class="top-right links">
        @if (Auth::check())
            <a href="#">Logout</a >       {{--{{Auth::logout()}}--}}
        @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        @endif
    </div>

@endif
