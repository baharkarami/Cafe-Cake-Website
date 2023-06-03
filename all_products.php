<?php
include('header.php');

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است" . mysqli_connect_error());

$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);

?>
<div class="gallery">
    <?php
    while ($row = mysqli_fetch_array($result)) {

    ?>
        <div class="content-pro">
            <img src="assets/images/products/<?php echo ($row['pro_image']) ?>" alt="<?php echo ($row['pro_name']) ?>">
            <h3 class="pro-title"><?php echo ($row['pro_name']) ?></h3>
            <p class="pro-detail"><?php echo (substr($row['pro_detail'], 0, 120)); ?> ...</p>
            <h6 class="pro-price"><?php echo ($row['pro_price']) ?>تومان</h6>
            <ul class="pro-rate">
                <li><i class="fa fa-star checked"></i></li>
                <li><i class="fa fa-star checked"></i></li>
                <li><i class="fa fa-star checked"></i></li>
                <li><i class="fa fa-star checked"></i></li>
                <li><i class="fa fa-star checked"></i></li>
            </ul>
            <a href="product_detail.php?id=<?php echo ($row['pro_code']) ?> "><button class="buy">سفارش</button></a>
        </div>
    <?php
    }
    ?>
</div>

<?php
include('footer.php');
?>