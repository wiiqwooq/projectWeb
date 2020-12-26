<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <form method="post">
         {{-- input form --}}
        <div id="form-line-trips">

        </div>
    </form>
    <button id="add-line">เพิ่มช่องกรอกข้อมูล</button>
</body>
<script>
    $(document).ready(function(){
        var i = 0;
        $('#add-line').click(function(){
            $('#form-line-trips').append("<div>"+
                "<input type=text name=location_[" + i + "] placeholder=สถานที่>"+
                "</div>");
            i++;
        });
    });
</script>
</html>
