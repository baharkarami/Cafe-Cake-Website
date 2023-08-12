<?php
include('header.php');

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است" . mysqli_connect_error());

$queryProducts = "SELECT * FROM products";
$resultProducts = mysqli_query($link, $queryProducts);

$queryBlogs = "SELECT * FROM blogs";
$resultBlogs = mysqli_query($link, $queryBlogs);

$queryReview = "SELECT * FROM reviews";
$resultReview = mysqli_query($link, $queryReview);
?>

<!-- home section starts here -->
<section class="home" id="home">
    <div class="homeContent">
        <h2>کافه کیک کیشا</h2>
        <p></p>
        <div class="home-btn">
            <a href="#product"><button>بیشتر ببین</button></a>
        </div>
    </div>
</section>
<!-- home section ends here -->


<!-- product section starts here -->
<section class="product" id="product">
    <div class="heading">
        <h3>کیک و شیرینی های خوشمزه ما</h3>
    </div>
    <div class="swiper product-row">
        <div class="swiper-wrapper">
            <?php
            for ($i = 1; $i <= 6; $i++) {
                $row_pro = mysqli_fetch_array($resultProducts);
            ?>
                <div class="swiper-slide box">
                    <div class="img">
                        <img src="assets/images/products/<?php echo ($row_pro['pro_image']) ?>" alt="<?php echo ($row_pro['pro_name']) ?>">
                    </div>
                    <div class="product-content">
                        <h3><?php echo ($row_pro['pro_name']) ?></h3>
                        <p></p>
                        <div class="orderNow">
                            <a href="product_detail.php?id=<?php echo ($row_pro['pro_code']) ?> "><button>ثبت سفارش</button></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="swiper product-row">
        <div class="swiper-wrapper">

            <?php
            for ($i = 1; $i <= 6; $i++) {
                $row_pro = mysqli_fetch_array($resultProducts);

            ?>
                <div class="swiper-slide box">
                    <div class="img">
                        <img src="assets/images/products/<?php echo ($row_pro['pro_image']) ?>" alt="<?php echo ($row_pro['pro_name']) ?>">
                    </div>
                    <div class="product-content">
                        <h3><?php echo ($row_pro['pro_name']) ?></h3>
                        <p></p>
                        <div class="orderNow">
                            <a href="product_detail.php?id=<?php echo ($row_pro['pro_code']) ?> "><button>ثبت سفارش</button></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- product section ends here -->


<!-- blogs section starts here -->
<section class="blogs" id="blogs">
    <div class="swiper blogs-row">
        <div class="swiper-wrapper">
            <?php
            for ($x = 1; $x <= 3; $x++) {
                $row_blog = mysqli_fetch_array($resultBlogs);
            ?>
                <div class="swiper-slide box">
                    <div class="img">
                        <img src="assets/images/blogs/<?php echo ($row_blog['blog_photo']) ?>" alt="<?php echo ($row_blog['blog_subject']) ?>">
                    </div>
                    <div class="content">
                        <h3><?php echo ($row_blog['blog_subject']) ?></h3>
                        <a href="blog.php?id=<?php echo ($row_blog['blog_id']) ?>" class="btn">بیشتر یاد بگیرید</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>

    </div>
</section>

<!-- blogs section ends here -->



<!-- newsletter section starts here -->
<section class="newsletter">
    <form action="newsletter_action.php" method="post">
        <h3>با وارد کردن ایمیل خودتون میتونید از آموزش ها و محصولات جدید ما مطلع بشید</h3>
        <input type="email" name="email" placeholder="ایمیلتان را وارد کنید..." id="email" class="box">
        <input type="submit" value="به من اطلاع بده" id="" class="box2">
    </form>
</section>
<!-- newsletter section ends here -->


<!-- review section starts here -->
<section class="review" id="review">
    <div class="heading">
        <h3>نظرات کاربران</h3>
    </div>
    <div class="swiper review-row">
        <div class="swiper-wrapper">
            <?php
            for ($x = 1; $x <= 9; $x++) {
                $row_review = mysqli_fetch_array($resultReview);
            ?>
                <div class="swiper-slide box">
                    <div class="client-review">
                        <p><?php echo ($row_review['review']) ?></p>
                    </div>
                    <div class="client-info">
                        <div class="img">
                            <img src="assets/images/person.png" alt="">
                        </div>
                        <div class="clientName">
                            <h3><?php echo ($row_review['fullName']) ?></h3>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>
<!-- review section ends here -->

<?php
include('footer.php');
?>