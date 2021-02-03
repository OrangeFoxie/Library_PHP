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
    <object data="{{ $pathToFile }}" type="application/pdf">
        <embed src="{{ $pathToFile }}" type="application/pdf" />
    </object>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="{{ $pathToFile }}" allowfullscreen></iframe>
      </div>
</body> 
</html>