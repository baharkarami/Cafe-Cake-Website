<?php
include("header.php");

if (
    isset($_POST['fullName']) && !empty($_POST['fullName']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['message']) && !empty($_POST['message'])
) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $message = $_POST['message'];
} else {
    echo ("<script>
alert('برخی از فیلدها مقداردهی نشده اند');
location.replace('contactUs.php');
</script>");
    exit();
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo ("<script>
      alert('ایمیل واردشده صحیح نیست');
      location.replace('contactUs.php');
      </script>");
    exit();
}

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno()) {
    echo ("<script>
        alert('خطایی در اتصال به سرویس دهنده رخ داده است');
        </script>");
}
$query = "INSERT INTO messages(fullName,email,message) VALUES('$fullName','$email','$message')";

if (mysqli_query($link, $query) === true) {
    echo ("<script>
            alert('پیام شما با موفقیت فرستاده شد');
            location.replace('contactUs.php');
            </script>");
} else {
    echo ("<script>
            alert('پیام شما فرستاده نشد');
            location.replace('contactUs.php');
            </script>");
    exit();
}
?>

<script type="text/javascript">
    location.replace("contactUs.php");
</script>

<?php
mysqli_close($link);

include("footer.php");
?>