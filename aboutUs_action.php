<?php
include("header.php");

if (
    isset($_POST['fullName']) && !empty($_POST['fullName']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['review']) && !empty($_POST['review'])
) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $review = $_POST['review'];
} else {
    echo ("<script>
alert('برخی از فیلدها مقداردهی نشده اند');
location.replace('aboutUs.php');
</script>");
    exit();
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo ("<script>
      alert('ایمیل واردشده صحیح نیست');
      location.replace('aboutUs.php');
      </script>");
    exit();
}

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno()) {
    echo ("<script>
        alert('خطایی در اتصال به سرویس دهنده رخ داده است');
        </script>");
}
$query = "INSERT INTO reviews(fullName,email,review) VALUES('$fullName','$email','$review')";

if (mysqli_query($link, $query) === true) {
    echo ("<script>
            alert('نظر شما با موفقیت ثبت شد');
            location.replace('aboutUs.php');
            </script>");
} else {
    echo ("<script>
            alert('نظر شما ثبت نشد');
            location.replace('aboutUs.php');
            </script>");
    exit();
}
?>

<script type="text/javascript">
    location.replace("aboutUs.php");
</script>

<?php
mysqli_close($link);

include("footer.php");
?>