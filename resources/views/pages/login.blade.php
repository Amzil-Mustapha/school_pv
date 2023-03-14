<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

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
</body>
</html>