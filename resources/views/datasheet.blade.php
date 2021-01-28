<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vị trí tài liệu</title>
    <link rel="stylesheet" href="css/datasheetCSS.css">
</head>
<body>

        @include('header')

    <h1 class="text-center mt-3">TÀI LIỆU</h1>

        @include('tableSheet')
            
        <button class="btn-primary" onclick="topFunction()" id="myBtn" title="Về đầu trang"><i class="arrow up"></i></button>

    <div style="height:100px; width:100%; clear:both;"></div>

        @include('footer')


    <script src="js/backtotopButton.js"></script>

</body>
</html>