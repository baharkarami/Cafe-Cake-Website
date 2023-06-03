<?php
include("header.php");

if (
    isset($_POST['fullName']) && !empty($_POST['fullName']) &&
    isset($_POST['userName']) && !empty($_POST['userName']) &&
    isset($_POST['phone']) && !empty($_POST['phone']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['repassword']) && !empty($_POST['repassword']) &&
    isset($_POST['email']) && !empty($_POST['email'])
) {
    $fullName = $_POST['fullName'];
    $userName = $_POST['userName'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
} else {
    echo ("<script>
alert('برخی از فیلدها مقداردهی نشده اند');
location.replace('signup.php');
</script>");
    exit();
}
if ($password != $repassword) {
    echo ("<script>
	alert('کلمه عبور و تکرار آن مشابه نیست');
    location.replace('signup.php');
	</script>");
    exit();
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo ("<script>
      alert('ایمیل واردشده صحیح نیست');
      location.replace('signup.php');
      </script>");
    exit();
}

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno()) {
    echo ("<script>
        alert('خطایی در اتصال به سرویس دهنده رخ داده است');
        </script>");
}
$query = "INSERT INTO users(fullName, userName, password, email,phone,type) VALUES('$fullName','$userName','$password','$email','$phone','0')";

if (mysqli_query($link, $query) === true) {
    echo ("<script>
            alert('ثبت نام شما در کافه قنادی باران با موفقیت انجام شد');
            location.replace('index.php');
            </script>");
} else {
    echo ("<script>
            alert('ثبت نام شما در کافه قنادی باران انجام نشد');
            location.replace('signup.php');
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