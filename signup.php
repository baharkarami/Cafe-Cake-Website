<?php
include('header.php');
?>
<div class="sign-body">
    <div class="container">
        <h1 class="form-title">ثبت نام</h1>

        <form action="signup_action.php" method="POST">
            <div class="main-user-info">

                <div class="user-input-box">
                    <label for="fullName">نام کامل</label>
                    <input type="text" id="fullName" name="fullName" placeholder="نام کامل خود را وارد کنید" required />
                </div>

                <div class="user-input-box">
                    <label for="userName">نام کاربری</label>
                    <input type="text" id="userName" name="userName" placeholder="نام کاربری خود را وارد کنید" required />
                </div>

                <div class="user-input-box">
                    <label for="email">ایمیل</label>
                    <input type="email" id="email" name="email" placeholder="ایمیل خود را وارد کنید" required />
                </div>

                <div class="user-input-box">
                    <label for="phone">شماره تلفن</label>
                    <input type="tel" id="phone" name="phone" placeholder="شماره تلفن همراه خود را وارد کنید" required />
                </div>

                <div class="user-input-box">
                    <label for="password">رمزعبور</label>
                    <input type="password" id="password" name="password" placeholder="رمزعبور خود را وارد کنید" required />
                </div>

                <div class="user-input-box">
                    <label for="repassword">تایید رمزعبور</label>
                    <input type="repassword" id="repassword" name="repassword" placeholder="رمزعبور خود را دوباره وارد کنید" required />
                </div>
                <p>آیا حساب کاربری دارید؟ <a href="signin.php">ورود با حساب کاربری</a></p>
            </div>
            <div class="form-submit-btn">
                <input type="submit" value="ثبت نام">
            </div>
        </form>
    </div>
</div>

<?php
include('footer.php');
?>