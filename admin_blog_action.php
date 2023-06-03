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

            /* editing & deleting blog */
            if (isset($_GET['action'])) {
                $id = $_GET['id'];
                if ($_GET['action'] == 'DELETE') {
                    $query = "DELETE FROM blogs 
				           WHERE blog_id='$id'";
                    if (mysqli_query($link, $query) === true) {
                        echo ("<script>
            alert('بلاگ انتخاب شده با موفقیت حذف شد');
            location.replace('admin_blog.php');
            </script>");
                    } else {
                        echo ("<script>
        alert('بلاگ انتخابی حذف نشد');
        location.replace('admin_blog.php');
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
                    $query = "UPDATE blogs SET
                         blog_subject = '$blog_subject',
                         blog_text = '$blog_text',
                         blog_photo='$blog_photo'
                         WHERE blog_id='$id'";

                    if (mysqli_query($link, $query) === true) {
                        echo ("<script>
    alert('بلاگ انتخاب شده با موفقیت ویرایش شد');
    location.replace('admin_blog.php');
    </script>");
                    } else {
                        echo ("<script>
alert('بلاگ انتخابی ویرایش نشد');
location.replace('admin_blog.php');
</script>");
                    }
                }
                mysqli_close($link);
                include("footer.php");
                exit();
            }

            /* adding blog */
            if (
                isset($_POST['blog_subject']) && !empty($_POST['blog_subject']) &&
                isset($_POST['blog_text']) && !empty($_POST['blog_text'])
            ) {

                $blog_subject = $_POST['blog_subject'];
                $blog_text = $_POST['blog_text'];
                $blog_photo = $_FILES["blog_photo"]["name"];
            } else {
                echo ("<script>
alert('برخی از فیلدها مقداردهی نشده اند');
location.replace('admin_blog.php');
</script>");
                exit();
            }

            $target_dir = "assets/images/blogs/";
            $target_photo = $target_dir . $_FILES["blog_photo"]["name"];
            $uploadOK = 1;
            $imageFileType = pathinfo($target_photo, PATHINFO_EXTENSION);

            $check = getimagesize($_FILES["blog_photo"]["tmp_name"]);
            if ($check !== false) {
                echo "تصویر انتخابی یک تصویر از نوع " . $check["mime"] . "است <br/>";
                $uploadOK = 1;
            } else {
                echo "پرونده انتخاب شده برای تصویر بلاگ، یک تصویر نیست<br />";
                $uploadOK = 0;
            }

            if (file_exists($target_photo)) {
                echo "تصویری با همین نام در سرویس دهنده میزبان وجود دارد <br/>";
                $uploadOK = 0;
            }

            if ($_FILES["blog_photo"]["size"] > (10240 * 1024)) {
                echo "اندازه تصویر انتخابی بیشتر از 10 مگابایت است <br/>";
                $uploadOK = 0;
            }

            $imageFileType != strtolower($imageFileType);
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" &&
                $imageFileType != "gif"
            ) {
                echo "فقط پسوند های JPG,JPEG,PNG,GIF برای تصویر مجاز هستند <br/>";
                $uploadOK = 0;
            }

            if ($uploadOK == 0) {
                echo "پرونده انتخاب شده به سرویس دهنده میزبان ارسال نشد <br/>";
            } else {
                if (move_uploaded_file($_FILES["blog_photo"]["tmp_name"], $target_photo)) {

                    echo "پرورنده" . $_FILES["blog_photo"]["tmp_name"] .
                        "با موفقیت به سرویس دهنده میزبان انتقال یافت";
                } else {
                    echo "خطا در ارسال پرورنده به سرویس دهنده میزبان رخ داده است <br/>";
                }
            }

            if ($uploadOK == 1) {
                $query = "INSERT INTO blogs
			 (`blog_subject`, `blog_text`, 
			 `blog_photo`)
			  VALUES
			  ('$blog_subject','$blog_text','$blog_photo')";

                if (mysqli_query($link, $query) === true)
                    echo ("<p style='color:green;'><b>بلاگ با موفقیت به وبسایت اضافه شد </b></p>");
                else
                    echo ("<p style='color:red;'><b>خطا در ثبت مشخصات بلاگ در وبسایت </b></p>");
            } else
                echo ("<p style='color:red;'><b>خطا در ثبت مشخصات بلاگ در وبسایت </b></p>");


            mysqli_close($link);
            ?>

        </form>
    </div>
</div>
<?php
include("footer.php");
?>