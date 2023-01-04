<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>giải pt bậc 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
// khai báo các biến toàn cục
$heso_a = "";
$heso_b = "";
$heso_c = "";
// đọc các hệ số từ FORM
if (isset ( $_POST ['heso_a'] )) {
    $heso_a = $_POST ['heso_a'];
}// dùng hàm isset() kiểm tra xem có tồn tại hay không.
if (isset ( $_POST ['heso_b'] )) {
    $heso_b = $_POST ['heso_b'];
}
if (isset ( $_POST ['heso_c'] )) {
    $heso_c = $_POST ['heso_c'];
}
// hàm giải phương trình bậc 2
function giaiPTB2($a, $b, $c) {
    // kiểm tra biến đầu vào
    if ($a == "")
        $a = 0;
    if ($b == "")
        $b = 0;
    if ($c == "")
        $c = 0;
    // echo phương trình ra màn hình


    if ($b <0){
        echo "Phương trình: " . $a . "x <sup>2</sup> " . $b . "x + " . $c . " = 0";
    }else {
        echo "Phương trình: " . $a . "x<sup>2</sup> + " . $b . "x + " . $c . " = 0";
    }
    echo "<br>";
    // kiểm tra các hệ số
    if ($a == 0) {
        if ($b == 0) {
            echo ("Phương trình vô nghiệm!");
        } else  {
            echo ("Phương trình có một nghiệm: " . "x = " . (- $c / $b));
        }
        return;
    }
    // tính delta
    $delta = $b * $b - 4 * $a * $c;
    $x1 = "";
    $x2 = "";
    // tính nghiệm
    if ($delta > 0) {
        $x1 = (- $b + sqrt ( $delta )) / (2 * $a);
        $x2 = (- $b - sqrt ( $delta )) / (2 * $a);
        echo ("Phương trình có 2 nghiệm là: " . "x1 = " . $x1 . " và x2 = " . $x2);
    } else if ($delta == 0) {
        $x1 = (- $b / (2 * $a));
        echo ("Phương trình có nghiệm kép: x1 = x2 = " . $x1);
    } else {
        echo ("Phương trình vô nghiệm!");
    }
}
?>
<div class="container bg-info bg-gradient border border-success rounded">
    <form action="" method="post" class="">
        <div class="form-group">
            <label for="nhap a">nhập a</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=" xin mời nhập a" name="heso_a" value="<?=$heso_a?>">
        </div>
        <div class="form-group">
            <label for="nhap b">nhập b</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=" xin mời nhập b" name="heso_b" value="<?=$heso_b?>">
        </div>
        <div class="form-group">
            <label for="nhap b">nhập c</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=" xin mời nhập c" name="heso_c" value="<?=$heso_c?>">
        </div>
        <div class="form-group" >
            <!--            <label for="exampleFormControlFile1">Kết quả</label>-->
            <input type="submit" class="form-control-submit btn-primary" id="ketqua" value="kết quả">
        </div>
        <br>
        <?php
        // gọi hàm giải phương trình bậc 2
        // Sử dụng từ kháo $GLOBALS để đọc các biến toàn cục và truyền vào hàm
        if (is_numeric ( $GLOBALS ['heso_a'] ) && is_numeric ( $GLOBALS ['heso_b'] )
            && is_numeric ( $GLOBALS ['heso_c'] )) {
            giaiPTB2 ( $GLOBALS ['heso_a'], $GLOBALS ['heso_b'], $GLOBALS ['heso_c'] );
        } else {
            echo ("Giá trị nhập vào không hợp lệ!");
        }
        ?>
    </form>
</div>
<br>


</body>
</html>