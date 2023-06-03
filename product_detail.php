<?php
include('header.php');

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است" . mysqli_connect_error());

$pro_code = 0;
if (isset($_GET['id']))
    $pro_code = $_GET['id'];
$query = "SELECT * FROM products WHERE pro_code='$pro_code'";
$result = mysqli_query($link, $query);


?>
<div class="product-container">
    <?php
    if ($row = mysqli_fetch_array($result)) {
    ?>

        <div class="single-product">
            <div class="product-row">
                <div class="col-6">
                    <div class="product-image">
                        <div class="product-image-main">
                            <img src="assets/images/products/<?php echo ($row['pro_image']) ?>" alt="<?php echo ($row['pro_name']) ?>" id="product-main-image">
                        </div>
                    </div>
                </div>

                <div class="product">
                    <div class="product-title">
                        <h2><?php echo ($row['pro_name']) ?></h2>
                    </div>
                    <div class="product-rating">
                        <span><i class="fa fa-star checked"></i></span>
                        <span><i class="fa fa-star checked"></i></span>
                        <span><i class="fa fa-star checked"></i></span>
                        <span><i class="fa fa-star checked"></i></span>
                        <span><i class="fa fa-star checked"></i></span>
                    </div>
                    <div class="product-price">
                        <span class="sale-price">کیلویی <?php echo ($row['pro_price']) ?> تومان</span>
                    </div>

                    <div class="product-details">
                        <h3>توضیحات:</h3>
                        <p><?php echo ($row['pro_detail']) ?></p>
                    </div>
                    <span class="divider"></span>

                    <div class="product-btn-group">
                        <div class="button add-cart"><a href="order.php?id=<?php echo ($row['pro_code']) ?> "><i class='bx bxs-cart'>سفارش</i></a></div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
    }
?>
</div>

<?php
include('footer.php');
?>