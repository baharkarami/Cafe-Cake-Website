<?php
include('header.php');
?>
<div class="product-dashbord-container">
    <div class='admin-product-form-container'>
        <form>
<?php

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است:" . mysqli_connect_error());

/* editing & deleting product */
if (isset($_GET['action'])) {
    $id = $_GET['id'];
    if ($_GET['action'] == 'DELETE') {
        $query = "DELETE FROM products 
				           WHERE pro_code='$id'";
        if (mysqli_query($link, $query) === true) {
            echo ("<script>
            alert('محصول انتخاب شده با موفقیت حذف شد');
            location.replace('admin_product.php');
            </script>");
        } else {
            echo ("<script>
        alert('محصول انتخابی حذف نشد');
        location.replace('admin_product.php');
        </script>");
        }
    }
    if ($_GET['action'] == 'DELETE') {
        mysqli_close($link);
        include("footer.php");
        exit();
    }
}


if (isset($_GET['action'])) {
    $id = $_GET['id'];

    if ($_GET['action'] == 'EDIT') {
        $query = "UPDATE products SET
                         pro_name = '$pro_name',
                         pro_price = '$pro_price',
                         pro_detail = '$pro_detail'
                         WHERE pro_code='$id'";

        if (mysqli_query($link, $query) === true) {
            echo ("<script>
    alert('محصول انتخاب شده با موفقیت ویرایش شد');
    location.replace('admin_product.php');
    </script>");
        } else {
            echo ("<script>
alert('محصول انتخابی ویرایش نشد');
location.replace('admin_product.php');
</script>");
        }
    }
    mysqli_close($link);
    include("footer.php");
    exit();
}

/* adding product */
if (
    isset($_POST['pro_name']) && !empty($_POST['pro_name']) &&
    isset($_POST['pro_price']) && !empty($_POST['pro_price'])
) {

    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_image = $_FILES["pro_image"]["name"];
    $pro_detail = $_POST['pro_detail'];
} else {
    echo ("<script>
alert('برخی از فیلدها مقداردهی نشده اند');
location.replace('admin_product.php');
</script>");
    exit();
}

$target_dir = "assets/images/products/";
$target_file = $target_dir . $_FILES["pro_image"]["name"];
$uploadOK = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

$check = getimagesize($_FILES["pro_image"]["tmp_name"]);
if ($check !== false) {
    echo "پرونده انتخابی یک تصویر از نوع " . $check["mime"] . "است <br/>";
    $uploadOK = 1;
} else {
    echo "پرونده انتخاب شده یک تصویر نیست<br />";
    $uploadOK = 0;
}

if (file_exists($target_file)) {
    echo "پرونده ای با همین نام در سرویس دهنده میزبان وجود دارد <br/>";
    $uploadOK = 0;
}

if ($_FILES["pro_image"]["size"] > (10240 * 1024)) {
    echo "اندازه پرونده انتخابی بیشتر از 10 مگابایت است <br/>";
    $uploadOK = 0;
}

$imageFileType != strtolower($imageFileType);
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" &&
    $imageFileType != "gif"
) {
    echo "فقط پسوند های JPG,JPEG,PNG,GIF برای پرونده مجاز هستند <br/>";
    $uploadOK = 0;
}

if ($uploadOK == 0) {
    echo "پرونده انتخاب شده به سرویس دهنده میزبان ارسال نشد <br/>";
} else {
    if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {

        echo "پرورنده" . $_FILES["pro_image"]["tmp_name"] .
            "با موفقیت به سرویس دهنده میزبان انتقال یافت";
    } else {
        echo "خطا در ارسال پرورنده به سرویس دهنده میزبان رخ داده است <br/>";
    }
}

if ($uploadOK == 1) {
    $query = "INSERT INTO products
			 (`pro_name`, `pro_price`, 
			 `pro_image`, `pro_detail`)
			  VALUES
			  ('$pro_name','$pro_price','$pro_image','$pro_detail')";

    if (mysqli_query($link, $query) === true)
        echo ("<p style='color:green;'><b>کالا با موفقیت به انبار اضافه شد </b></p>");
    else
        echo ("<p style='color:red;'><b>خطا در ثبت مشخصات کالا در انبار </b></p>");
} else
    echo ("<p style='color:red;'><b>خطا در ثبت مشخصات کالا در انبار </b></p>");


mysqli_close($link);
?>

        </form>
    </div>
</div>
<?php
include("footer.php");
?>