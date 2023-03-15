@section('title')
    Login
@endsection

@include('layouts.header')
<main class="flex flex-col justify-center w-full items-center flex-1">

    <h1 class="text-2xl">
        S'identifier
    </h1>
    <form action="{{Route("Onlogin")}}" method="post">
        @csrf
        email <input type="text" value="{{old("email")}}" name="email">
        @error("email")
        {{$message}}
        @enderror <br> <br>
        password <input type="password" value="{{old("password")}}" name="password">
        @error("password")
        {{$message}}
        @enderror <br>

        <button>logIn</button>

    </form>
    @if ($m = session("error"))
        {{$m}}
    @endif

</main>
@include('layouts.footer')
