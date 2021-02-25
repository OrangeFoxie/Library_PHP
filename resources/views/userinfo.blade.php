<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>Người dùng:</title>
</head>
<body>
    <div class="text-center p-4">
        <h1>THÔNG TIN NGƯỜI DÙNG</h1>
    </div>
    <div class="accordion container" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Thông tin cá nhân
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">

                <p>Tên: {{ $usrName }}</p>
                <p>Tên đăng nhập: {{ $logInName }}</p>
                <p>Email: {{ $email }}</p>
                <p>Ngày tham gia: {{ $dateJoin }}</p>
                <p>Cập nhật tài khoảng: {{ $dateUpdate }}</p> 
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Tài liệu của tôi
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" id="he">ID</th>
                            <th scope="col" id="he">Tài liệu</th>
                            <th scope="col" id="he">Kệ sách</th>
                            <th scope="col" id="he">Phòng ban</th>
                            <th scope="col" id="he">Ngày tạo</th>
                            <th scope="col" id="he">Ngày cập nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($docs as $document)
                        <tr>                
                            <th scope="row">
                                <a href="{{ route('updatepdf', $document->docID) }}" target="_blank" class="text-dark" style="text-decoration:none;">{{ $document->docID }}</a>
                            </th>
                            <td><a href="{{ route('showpdf', $document->docID) }}" target="_blank" class="text-dark" style="text-decoration:none;">{{ $document->docName}}</a></td>    
                            <td>{{ $document->stationName }}</td>   
                            <td>{{ $document->roomName }}</td> 
                            <td>{{ $document->docNew }}</td> 
                            <td>{{ $document->docUpdate }}</td> 
                        </tr>    
                    @endforeach                    
                </tbody>
                  
                </table>            
            </div>
          </div>
        </div>
      </div>
</body>
</html>