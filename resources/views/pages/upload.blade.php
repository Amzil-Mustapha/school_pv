<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    upload page 


    <form action="{{Route("Onupload")}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file"  name="file_import">
        @error('file_import')
            {{$message}}
        @enderror
        @error('extension')
            {{$message}}
        @enderror

        <button>upload</button>
    </form>
</body>
</html>