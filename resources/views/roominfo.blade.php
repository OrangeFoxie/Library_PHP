@extends('footer')

@section('roominfo')
    <div class="form-group">
        <label for="exampleInputEmail1">Tên tài liệu</label>
        
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
        <small id="emailHelp" class="form-text text-muted">Tên tài liệu không nên quá 50 kí tự</small>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Kệ lưu trữ</label>
        <select class="form-control" id="exampleFormControlSelect1">
            @foreach($room as $R) 
                <option>{{ $R->sName }}</option>
            @endforeach
        </select>      
        <small id="emailHelp" class="form-text text-muted">Kệ lưu trữ sẽ nằm trong phòng lưu trữ đã được định trước</small>              
    </div>
@endsection