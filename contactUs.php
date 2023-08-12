<?php
include('header.php');
?>
<div class="sign-body">
    <div class="container">
        <h1 class="form-title">ارتباط با ما</h1>

        <form action="contactUs_action.php" method="POST">
            <div class="main-user-info">

                <div class="user-input-box">
                    <label for="fullName">نام کامل</label>
                    <input type="text" id="fullName" name="fullName" placeholder="نام کامل خود را وارد کنید" required />
                </div>

                <div class="user-input-box">
                    <label for="email">ایمیل</label>
                    <input type="email" id="email" name="email" placeholder="ایمیل خود را وارد کنید"  required />
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