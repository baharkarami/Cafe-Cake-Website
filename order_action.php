<?php
include("header.php");

if (!(isset($_SESSION["state_login"]) && ($_SESSION["state_login"] === true))) {
?>
    <script type="text/javascript">
        location.replace("index.php");
    </script>
<?php
}


$pro_code = $_POST['pro_code'];
$pro_name = $_POST['pro_name'];
$pro_qty = $_POST['pro_qty'];
$pro_price = $_POST['pro_price'];
$total_price = $_POST['total_price'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$userName = $_SESSION['userName'];

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno())
    exit("خطای عدم اتصال رخ داده است" . mysqli_connect_error());

$query = "INSERT INTO orders(username,order_date,pro_code,pro_qty,pro_price,phone,address,trackcode,state)
    VALUES('$userName','" . date('y-m-d') . "','$pro_code','$pro_qty','$pro_price','$phone','$address','000000000000000000000000','0')";
/*
    تحت بررسی 0
    آماده برای ارسال 1
    ارسال شده 2
    سفارش لغو شده 3
    */
?>
<div class="product-dashbord-container">
    <div class='admin-product-form-container'>
        <form>
<?php
if (mysqli_query($link, $query) === true) {
    echo ("<script>
    alert('سفارش شما با موفقیت ثبت شد');
    </script>");

    echo ("<p><b>سفارش شما با موفقیت ثبت شد</b></p>");

    echo ("<p><b>کاربر گرامی آقا/خانم $fullName</b></p>");
    echo ("<p><b> $pro_name با کد $pro_code به مقدار $pro_qty کیلوگرم با قیمت پایه $pro_price تومان را سفارش داده اید</b></p>");

    echo ("<p><b>مبلغ قابل پرداخت برای سفارش ثبت شده $total_price تومان است</b></p>");

    echo ("<p><b>پس از بررسی سفارش و تایید آن با شما تماس گرفته خواهد شد</b></p>");
}
?>
        </form>
    </div>
</div>

<?php
include('footer.php');
?>