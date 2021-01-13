<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></link>
  
  </head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
          <a href="#" class="navbar-brand d-none d-md-block">HomePage</a>
          @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Trang chủ</a>
                @else
                    <a href="{{ route('login') }}"><button class="btn btn-outline-success rounded-pill">Đăng nhập</button></a>
                @endauth
            </div>
          @endif
        </div>
    </nav>
</body>
</html>