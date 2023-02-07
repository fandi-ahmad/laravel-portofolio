<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login dengan Google</title>
</head>
<body>
    
    <center>
        @if(Session::has('error'))
            <p style="color: red">
                {{ Session::get('error') }}
            </p>
        @endif

        <p>login dengan akun Google</p>
        <a href='{{ url('auth/redirect') }}'>login</a>
    </center>

</body>
</html>