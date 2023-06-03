<?php
include('header.php');
?>
<div class="sign-body">
    <div class="container">
        <h1 class="form-title">ثبت نام</h1>
        <form action="signin_action.php" method="POST">
            <div class="main-user-info">

                <div class="user-input-box">
                    <label for="userName">نام کاربری</label>
                    <input type="text" id="userName" name="userName" placeholder="نام کاربری خود را وارد کنید" />
                </div>

                <div class="user-input-box">
                    <label for="password">رمزعبور</label>
                    <input type="password" id="password" name="password" placeholder="رمزعبور خود را وارد کنید" />
                </div>

                <p> حساب کاربری ندارید؟ <a href="signup.php">ثبت نام</a></p>
            </div>
            <div class="form-submit-btn">
                <input type="submit" value="ورود">
            </div>
        </form>
    </div>
</div>

<?php
include('footer.php');
?>