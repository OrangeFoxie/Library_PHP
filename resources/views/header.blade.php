<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
          <a href="#" class="navbar-brand d-none d-md-block">Quốc Minh</a>
          @if (Route::has('login'))
            <div>
                @auth
                    {{ Auth::user()->username }}                     
                    <a href="{{ url('/logout') }}" class="text-sm text-gray-700 underline">
                      <button class="btn btn-outline-success rounded-pill">Đăng xuất</button>
                    </a>
                    
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->username }}  
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Thông tin cá nhân</a>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Đăng xuất</a>
                      </div>
                    </div>
                @else
                    <a href="{{ route('login') }}">
                      <button class="btn btn-outline-success rounded-pill">Đăng nhập</button>
                    </a>
                @endauth
            </div>
          @endif
        </div>
    </nav>
</body>
</html>