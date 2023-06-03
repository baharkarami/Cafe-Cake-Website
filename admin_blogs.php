<?php
include("header.php");

if (!($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin") {
?>
    <script type="text/javascript">
        location.replace("index.php");
    </script>
<?php
}

$link = mysqli_connect("localhost", "root", "", "bakery_db");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است:" . mysqli_connect_error());

$url = $blog_id = $blog_subject = $blog_text = $blog_photo = $blog_video = $blog_date = $blog_comment = "";
$btn_caption = "ثبت بلاگ";
if (isset($_GET['action']) && $_GET['action'] == 'EDIT') {
    $id = $_GET['id'];
    $query = "SELECT * FROM blogs WHERE blog_id='$id'";
    $result = mysqli_query($link, $query);

    if ($row = mysqli_fetch_array($result)) {
        $blog_id = $row['blog_id'];
        $blog_subject = $row['blog_subject'];
        $blog_text = $row['blog_text'];
        $blog_photo = $row['blog_photo'];
        $blog_video = $row['blog_video'];
        $blog_date = $row['blog_date'];
        $blog_comment = $row['blog_comment'];
        $url = "?id=$pro_code&action=EDIT";
        $btn_caption = "ویرایش بلاگ";
    }
}

?>

<div class="product-dashbord-container">
    <div class="admin-product-form-container">

        <form action="admin_product_action.php<?php if (!empty($url)) echo ($url) ?>" method="post" enctype="multipart/form-data">
            <h3 class="h3-product">یک محصول را اضافه کنید</h3>

            <input type="text" id="pro_name" name="pro_name" class="product-box" placeholder="نام محصول را وارد کنید" value="<?php echo ($pro_name) ?>" />

            <input type="number" id="pro_price" name="pro_price" class="product-box" placeholder="قیمت محصول را به ازای هر یک کیلو به تومان وارد کنید" value="<?php echo ($pro_price) ?>" />

            <input type="file" id="pro_image" name="pro_image" class="product-box" />
            <?php if (!empty($pro_image))
                echo ("<img src='assets/images/products/$pro_image' width='50' height='50' />"); ?>

            <textarea type="text" id="pro_detail" name="pro_detail" class="product-box" rows="5" placeholder="اطلاعات محصول را وارد کنید"><?php echo ($pro_detail) ?></textarea>

            <input type="submit" class="btn-submit-product" name="add_product" value="<?php echo ($btn_caption) ?>" />
        </form>

    </div>

    <?php
    $query = "SELECT * FROM products ";
    $result = mysqli_query($link, $query);
    ?>
    <div class="admin-product-display">
        <table class="product-display-table">
            <thead>
                <tr>
                    <th>کد محصول</th>
                    <th>تصویر محصول</th>
                    <th>نام محصول</th>
                    <th>قیمت محصول</th>
                    <th>ابزار مدیریتی</th>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo ($row['pro_code']) ?></td>
                    <td><img src="assets/images/products/<?php echo ($row['pro_image']) ?>" alt="<?php echo ($row['pro_name']) ?>" height="90" /></td>
                    <td><?php echo ($row['pro_name']) ?></td>
                    <td><?php echo ($row['pro_price']) ?> تومان</td>
                    <td>
                        <a href="admin_product.php?id=<?php echo ($row['pro_code']) ?>&action=EDIT" class="btn_admin_edit"><i class="fas fa-edit"></i>ویرایش</a>
                        <a href="admin_product_action.php?id=<?php echo ($row['pro_code']) ?>&action=DELETE" class="btn_admin_delete"><i class="fas fa-trash"></i>حذف</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<?php
include('footer.php');
?>