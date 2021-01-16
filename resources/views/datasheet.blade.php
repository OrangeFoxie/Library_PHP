<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line show data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <header class="bg-light">
        <div class="container">
            @include('header')
        </div>
    </header>    

    <h1 class="text-center">TÀI LIỆU</h1>

    <div class="container">    
        <table class="table table-hover" id="sortTable">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tài liệu</th>
                <th scope="col">Kệ sách</th>
                <th scope="col">Phòng ban</th>
                <th scope="col">Người thêm</th>
              </tr>
            </thead>
            <tbody>
                @foreach($doc as $document)
                        <tr>                
                            <th scope="row">{{ $document->id }}</th>
                            <td>{{ $document->name }}</td>    
                            <td>{{ $document->stationName}}</td>   
                            <td>{{ $document->roomName}}</td> 
                            <td>{{ $document->users_name }}</td>  
                        </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <script>
        $('#sortTable').DataTable();
    </script>
</body>
</html>