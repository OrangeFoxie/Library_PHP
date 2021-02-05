<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>Cập nhật: {{ $docName }}</title>
</head>
<body class="bg-light" value="{{ csrf_token() }}">

    @include('header')

    <div class="container text-center mt-3">
        <h2>{{ $docName }}</h2>
    </div>

    <div class="accordion accordion-flush container" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              THÔNG TIN TÀI LIỆU
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="border border-dark rounded p-4">
                    <div class="mb-3">
                        <label class="form-label">Tài liệu: {{ $docName }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kệ lưu trữ: {{ $docStation }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phòng lưu trữ: {{ $docRoom }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Người tạo: {{ $docUserName }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày tạo: {{ $docDateCreate }}</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày cập nhật: {{ $docDateUpdate }}</label>
                    </div>
                    <div>
                        <label class="form-label">Đường dẫn: <a href="{{ route('showpdf', $docURL) }}" target="_blank" class="text-success" style="text-decoration:none;">{{ route('showpdf', $docURL) }}</a></label>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              CẬP NHẬT TÀI LIỆU
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <form action="{{ route('upDocs',$docID) }}" method="POST" enctype="multipart/form-data"> 
                    {{-- @method('PATCH') --}}
                    @csrf
                    <div class="mb-3 form-group">
                      <label for="docName" class="form-label">Tên tài liệu</label>
                      <input name="updateDocName" type="text" class="form-control" id="docName" aria-describedby="docName" placeholder="{{ $docName }}" value="{{ $docName }}">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="docStation" class="form-label">Khu vực lưu trữ</label>
                        <select name="updateStorePlace" class="form-control" id="exampleFormControlSelect1">
                            <option value="{{ $docStationID }}" class="bg-secondary">{{ $docStation }} &emsp;[{{ $docRoom }}]</option>
                            @foreach($stations as $S1) 
                                <option value="{{ $S1->id }}">{{ $S1->name }} &emsp;[{{ $S1->RoomName }}]</option>
                            @endforeach
                        </select>      
                    </div>
                    <div class="mb-3 form-group">
                        <input name="updateFile" type="file" class="file-input" id="updateFile" accept="application/pdf">
                    </div>

                    <button type="submit" class="btn btn-primary" value="submit">Cập nhật</button>
                  </form>   
            </div>
          </div>
        </div>
      </div>
</body>
</html>