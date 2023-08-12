<?php
include("header.php");

if (
    isset($_POST['userName']) && !empty($_POST['userName']) &&
    isset($_POST['password']) && !empty($_POST['password'])
) {

    $userName = $_POST['userName'];
    $password = $_POST['password'];
} else {
    echo ("<script>
alert('برخی از فیلدها مقداردهی نشده اند');
location.replace('signin.php');
</script>");
    exit();
}

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno()) {
    echo ("<script>
        alert('خطایی در اتصال به سرویس دهنده رخ داده است');
        </script>");
}
$query = "SELECT * FROM users WHERE userName='$userName' AND password='$password'";

$resault = mysqli_query($link, $query);

$row = mysqli_fetch_array($resault);
if ($row) {
    $_SESSION["state_login"] = true;
    $_SESSION["fullName"] = $row['fullName'];
    $_SESSION["userName"] = $row['userName'];

    if ($row["type"] == 0)
        $_SESSION["user_type"] = "public";

    elseif ($row["type"] == 1) {
        $_SESSION["user_type"] = "admin";
?>
        <script type="text/javascript">
            location.replace("admin_product.php");
        </script>
<?php
    }

    echo ("<script>
	alert('عملیات ورود موفقیت آمیز بود. به کافه کیک کیشا خوش آمدید');
    location.replace('index.php');
	</script>");
} else {
    echo ("<script>
	alert('کاربر موردنظر یافت نشد');
    location.replace('signin.php');
	</script>");
}

mysqli_close($link);

include("footer.php");
?>