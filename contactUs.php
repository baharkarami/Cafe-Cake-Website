<?php
include('header.php');

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است" . mysqli_connect_error());
$query = "SELECT * FROM users WHERE userName='{$_SESSION['userName']}'";
$result = mysqli_query($link, $query);
$user_row = mysqli_fetch_array($result);
?>
<div class="sign-body">
    <div class="container">
        <h1 class="form-title">ثبت نام</h1>

        <form action="contactUs_action.php" method="POST">
            <div class="main-user-info">

                <div class="user-input-box">
                    <label for="fullName">نام کامل</label>
                    <input type="text" id="fullName" name="fullName" placeholder="نام کامل خود را وارد کنید" value="<?php echo ($user_row['fullName']) ?>" required />
                </div>

                <div class="user-input-box">
                    <label for="email">ایمیل</label>
                    <input type="email" id="email" name="email" placeholder="ایمیل خود را وارد کنید" value="<?php echo ($user_row['email']) ?>"  required />
                </div>

                <div class="user-input-box">
                    <label for="message">متن پیام</label>
                    <textarea id="message" name="message" rows="6" placeholder="پیامتان را بنویسید" required></textarea>
                </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" value="ثبت پیام">
            </div>
        </form>
    </div>
</div>

<?php
include('footer.php');
?>