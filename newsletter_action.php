<?php
include("header.php");

if (
    isset($_POST['email']) && !empty($_POST['email'])
) {
    $email = $_POST['email'];
} else {
    echo ("<script>
alert(' فیلد مقداردهی نشده است');
location.replace('index.php');
</script>");
    exit();
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo ("<script>
      alert('ایمیل واردشده صحیح نیست');
      location.replace('index.php');
      </script>");
    exit();
}

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno()) {
    echo ("<script>
        alert('خطایی در اتصال به سرویس دهنده رخ داده است');
        </script>");
}
$query = "INSERT INTO newsletters(newsletter_email) VALUES('$email')";

if (mysqli_query($link, $query) === true) {
    echo ("<script>
            alert('ایمیلتان با موفقیت ارسال شد. درصورت آمدن محصولات یا آموزش های جدید به شما اطلاع داده می شود');
            location.replace('index.php');
            </script>");
} else {
    echo ("<script>
    alert('ایمیلتان با موفقیت ارسال نشد');
    location.replace('index.php');
            </script>");
    exit();
}
?>

<script type="text/javascript">
    location.replace("index.php");
</script>

<?php
mysqli_close($link);

include("footer.php");
?>