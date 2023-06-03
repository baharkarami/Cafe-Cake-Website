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

$url = $blog_id = $blog_subject = $blog_text = $blog_photo = $blog_video = $blog_date = "";
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
        $url = "?id=$blog_id&action=EDIT";
        $btn_caption = "ویرایش بلاگ";
    }
}

?>

<div class="product-dashbord-container">
    <div class="admin-product-form-container">

        <form action="admin_blog_action.php<?php if (!empty($url)) echo ($url) ?>" method="post" enctype="multipart/form-data">
            <h3 class="h3-product">یک بلاگ را اضافه کنید</h3>

            <input type="text" id="blog_subject" name="blog_subject" class="product-box" placeholder="موضوع بلاگ را وارد کنید" value="<?php echo ($blog_subject) ?>" />

            <textarea type="text" id="blog_text" name="blog_text" class="product-box" rows="15" placeholder="متن بلاگ را وارد کنید"><?php echo ($blog_text) ?></textarea>

            <input type="file" id="blog_photo" name="blog_photo" class="product-box" />
            <?php if (!empty($blog_photo))
                echo ("<img src='assets/images/blogs/$blog_photo' width='50' height='50' />"); ?>


            <input type="submit" class="btn-submit-product" name="add_product" value="<?php echo ($btn_caption) ?>" />
        </form>

    </div>

    <?php
    $query = "SELECT * FROM blogs ";
    $result = mysqli_query($link, $query);
    ?>
    <div class="admin-product-display">
        <table class="product-display-table">
            <thead>
                <tr>
                    <th>کد بلاگ</th>
                    <th>موضوع بلاگ</th>
                    <th>تصویر بلاگ</th>
                    <th>ابزار مدیریتی</th>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo ($row['blog_id']) ?></td>
                    <td><?php echo ($row['blog_subject']) ?></td>
                    <td><img src="assets/images/blogs/<?php echo ($row['blog_photo']) ?>" alt="<?php echo ($row['blog_subject']) ?>" height="90" /></td>
                    <td>
                        <a href="admin_blog.php?id=<?php echo ($row['blog_id']) ?>&action=EDIT" class="btn_admin_edit"><i class="fas fa-edit"></i>ویرایش</a>
                        <a href="admin_blog_action.php?id=<?php echo ($row['blog_id']) ?>&action=DELETE" class="btn_admin_delete"><i class="fas fa-trash"></i>حذف</a>
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