<?php
include("header.php");

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است" . mysqli_connect_error());

$pro_code = 0;
if (isset($_GET['id']))
    $pro_code = $_GET['id'];
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
    echo ("<script>
	alert('برای خرید محصول باید ابتدا وارد وبسایت شوید');
    location.replace('signin.php');
	</script>");
    exit();
}

$query = "SELECT * FROM products WHERE pro_code='$pro_code'";
$result = mysqli_query($link, $query);
?>

<div class="product-dashbord-container">
    <?php
    if ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="admin-product-form-container">

            <form action="order_action.php" method="post" name="order" id="order">
                <h3 class="h3-product">سفارش شما</h3>
                <img class="img_product" src="assets/images/products/<?php echo ($row['pro_image']) ?>" />

                <input type="text" id="pro_code" name="pro_code" class="product-box" value="<?php echo ($row['pro_code']) ?>" readonly />

                <input type="text" id="pro_name" name="pro_name" class="product-box" value="<?php echo ($row['pro_name']) ?>" readonly />

                <input type="text" id="pro_qty" name="pro_qty" class="product-box" placeholder="چند کیلو کیک می خواهید؟" onchange="calc_price();" />

                <input type="number" id="pro_price" name="pro_price" class="product-box" value="<?php echo ($row['pro_price']) ?>" readonly />

                <input type="number" id="total_price" name="total_price" class="product-box" value="<?php echo ($row['pro_price']) ?>" readonly />

                <script type="text/javascript">
                    function calc_price() {
                        var price = document.getElementById('pro_price').value;
                        var count = document.getElementById('pro_qty').value;
                        var total_price;

                        if (count == 0 || count == '')
                            total_price = 0;
                        else
                            total_price = count * price;

                        document.getElementById('total_price').value = total_price;
                    }
                </script>

                <?php
                $query = "SELECT * FROM users WHERE userName='{$_SESSION['userName']}'";
                $result = mysqli_query($link, $query);
                $user_row = mysqli_fetch_array($result);
                ?>

                <input type="text" id="fullName" name="fullName" class="product-box" value="<?php echo ($user_row['fullName']) ?>" readonly />

                <input type="text" id="email" name="email" class="product-box" value="<?php echo ($user_row['email']) ?>" readonly />

                <input type="text" id="phone" name="phone" class="product-box" value="<?php echo ($user_row['phone']) ?>" />

                <textarea type="text" id="address" name="address" class="product-box" rows="3" placeholder="آدرس دقیق پستی برای دریافت محصول را وارد کنید"></textarea>

                <input type="button" class="btn-submit-product" value="خرید محصول" onclick="check_input();" />

                <script type="text/javascript">
                    function check_input() {
                        var r = confirm("از صحت اطلاعات وارد شده لطمینان دارید؟");
                        if (r == true) {
                            var validation = true;
                            var count = document.getElementById('pro_qty').value;
                            var phone = document.getElementById('phone').value;
                            var address = document.getElementById('address').value;

                            if (count == 0 || count == '')
                                validation = false;

                            if (phone.length < 11)
                                validation = false;

                            if (address.length < 15)
                                validation = false;

                            if (validation)
                                document.getElementById("order").submit();
                            else
                                alert("برخی از ورودی های فرم به درستی پر نشده اند");
                        }
                    }
                </script>
            </form>

        </div>
    <?php
    }
    ?>
</div>

<?php
include('footer.php');
?>