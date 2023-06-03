<?php
include('header.php');


$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است" . mysqli_connect_error());

$blog_id = 0;
if (isset($_GET['id']))
    $blog_id = $_GET['id'];

$query = "SELECT * FROM blogs WHERE blog_id='$blog_id'";
$result = mysqli_query($link, $query);
?>

<div class="blog-container">

    <div class="blog-hero">
    </div>
    <?php
    if ($row = mysqli_fetch_array($result)) {
    ?>
        <main>
            <h2><?php echo ($row['blog_subject']) ?></h2>
            
            <div class="blog-content">
                <p><?php echo ($row['blog_text']) ?></p>
                <div class="content-img-container">
                    <img src="assets/images/blogs/<?php echo ($row['blog_photo']) ?>" alt="<?php echo ($row['blog_subject']) ?>">
                </div>
            </div>


        </main>
    <?php
    }
    ?>
</div>


<?php
include('footer.php');
?>