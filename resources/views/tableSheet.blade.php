<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="js/ajax.googleapis.com/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> --}}
    <script src="js/cdnjs.cloudflare.com/popper.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"> --}}
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    {{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> --}}
    <script src="js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> --}}
    <script src="js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="fileinput/css/fileiput.css">
    <script src="fileinput/js/fileinput.min.js"></script>

    <style>
        #he{
            background: white;
            position: sticky;
            top: 0; 
        }
    </style>

</head>
<body>
    <div class="container">    
        <table class="table table-hover" id="sortTable">
            <thead>
            <tr>
                <th scope="col" id="he">ID</th>
                <th scope="col" id="he">Tài liệu</th>
                <th scope="col" id="he">Kệ sách</th>
                <th scope="col" id="he">Phòng ban</th>
                <th scope="col" id="he">Người thêm</th>
            </tr>
            </thead>
            <tbody>
            @if (Route::has('login'))
            @auth
                @foreach($docs as $document)
                    <tr>                
                        <th scope="row">{{ $document->id }}</th>
                        <td><a href="{{URL::to('uploads/'.$document->path)}}" target="_blank" class="text-dark" style="text-decoration:none;">{{ $document->name }}</a></td>    
                        {{-- <td><a href="{{ route('pdf', $document->path) }}" target="_blank" class="text-dark" style="text-decoration:none;">{{ $document->name }}</a></td>     --}}
                        <td>{{ $document->stationName}}</td>   
                        <td>{{ $document->roomName}}</td> 
                        <td>{{ $document->users_name }}</td>    
                    </tr>    
                @endforeach
            @else
                @foreach($docs as $document)
                <tr>                
                    <th scope="row">{{ $document->id }}</th>
                    <td>{{ $document->name }}</td>    
                    <td>{{ $document->stationName}}</td>   
                    <td>{{ $document->roomName}}</td> 
                    <td>{{ $document->users_name }}</td>    
                </tr>    
                @endforeach
            @endauth
            @endif
            </tbody>
        </table>
    </div>

    <script>
        $('#sortTable').DataTable();
    </script>
</body>
</html>