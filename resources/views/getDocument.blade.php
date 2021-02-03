<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $fileName }}</title>
</head>
<body>
    {{ $pathToFile }}
    <object width="400" height="500" type="application/pdf" data="{{ $pathToFile }}">
        <p>Insert your error message here, if the PDF cannot be displayed.</p>
    </object>
</body>
</html>