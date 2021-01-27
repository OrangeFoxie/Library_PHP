<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>     
</head>
<body>
    @if (Route::has('login'))
    <div class="container">
        @auth
        <footer class="footer position-fixed bottom-0 container" value="{{ csrf_token() }}">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#addDoc" role="tab" aria-controls="home" aria-selected="true">Thêm tài liệu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#addDistrict" role="tab" aria-controls="contact" aria-selected="false">Thêm khu vực</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#addRoom" role="tab" aria-controls="profile" aria-selected="false">Thêm phòng ban</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#minimal" role="tab" aria-controls="contact" aria-selected="false">Thu nhỏ</a>
                  </li>
              </ul>
              @csrf
              <div class="tab-content" id="myTabContent">
                <div class="my-3 tab-pane fade container" id="addDoc" role="tabpanel" aria-labelledby="home-tab">
                    <form action="subDocs" method="POST">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên tài liệu</label>
                          
                          <input type="text" name="nameDoc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
                          <small id="emailHelp" class="form-text text-muted">Tên tài liệu không nên quá 50 kí tự</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kệ lưu trữ</label>
                            <select class="form-control" name="stationName" id="exampleFormControlSelect1">
                                @foreach($stations as $S => $S1) 
                                    <option>{{ $S1->name }}</option>
                                @endforeach
                            </select>      
                            <small id="emailHelp" class="form-text text-muted">Kệ lưu trữ sẽ nằm trong phòng lưu trữ đã được định trước</small>              
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Lưu lại</button>
                      </form>
                </div>
                <div class="my-3 tab-pane fade container" id="addDistrict" role="tabpanel" aria-labelledby="contact-tab">
                  <form>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tên khu vực lưu trữ</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
                        <small id="emailHelp" class="form-text text-muted">Tên khu vực không nên quá 50 kí tự</small>
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Kệ lưu trữ thuộc phòng</label>
                          <select class="form-control" id="exampleFormControlSelect1">
                            @foreach($rooms as $R => $R1) 
                                <option>{{ $R1->name }}</option>
                            @endforeach
                          </select>      
                      </div>
    
                      <button type="submit" class="btn btn-primary mt-2">Lưu lại</button>
                    </form>
              </div>
                <div class="my-3 tab-pane fade container" id="addRoom" role="tabpanel" aria-labelledby="profile-tab">
                    <form>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên phòng</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
                          <small id="emailHelp" class="form-text text-muted">Tên phòng không nên quá 50 kí tự</small>
                        </div>
    
                        <button type="submit" class="btn btn-primary mt-2">Lưu lại</button>
                      </form>
                </div>
    
                <div class="tab-pane fade" id="minimal" role="tabpanel" aria-labelledby="contact-tab"></div>
              </div>
        </footer>
        @else

        @endauth
    </div>
  @endif

</body>
</html>