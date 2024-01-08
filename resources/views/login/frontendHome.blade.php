{{-- {{dd(url()->current())}} --}}
{{-- {{dd(route('admin#login'))}} --}}
{{Auth::user()->name}}

<a href="{{route('frontend#logout')}}">logout</a>

