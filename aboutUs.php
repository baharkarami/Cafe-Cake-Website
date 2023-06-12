<?php
include('header.php');

?>

    <!-- about section -->

    <section class="about">
        <div class="about-image">
            <img src="assets/images/bakery.jpg" alt="کافه کیک کیشا">
        </div>

        <div class="about-content">
            <h3>هدف ما</h3>
            <p>
                
            </p>
            <div class="about-icons-container">
                <div class="about-icons">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    <span>ثبت سفارش</span>
                </div>
                <div class="about-icons">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <span>مطالب آموزشی</span>
                </div>
                <div class="about-icons">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>اطلاع رسانی</span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- about section -->
    
    <!-- comment section-->
    <section class="about-comment">
        <div class="about-comment-box">
                <h1>نظر شما چیست؟</h1>
                <form action="aboutUs_action.php" method="post">
                    <input type="text" placeholder="نام کامل" id="fullName" name="fullName">            
                    <input type="text" placeholder="ایمیل" id="email" name="email">
                    <textarea name="review" id="review" placeholder="نظرتان را بنویسید" cols="30" rows="5"></textarea>
                    <input type="submit" name="submit" class="button" value="ثبت نظر">
                </form>
        </div>
    </section>
    <!-- comment section-->

    <?php
include('footer.php');
?>
