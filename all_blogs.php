<?php
include('header.php');

$link = mysqli_connect("localhost", "root", "", "bakery_db");

if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است" . mysqli_connect_error());

$query = "SELECT * FROM blogs";
$result = mysqli_query($link, $query);

?>
<div class="blog-section">
    <div class="section-content blog">
        <div class="title">
            <h2>بلاگ های آموزشی</h2>
        </div>
        <div class="blog-cards">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="blog-card">
                    <div class="image-section">
                        <img src="assets/images/blogs/<?php echo ($row['blog_photo']) ?>" alt="<?php echo ($row['blog_subject']) ?>">
                    </div>
                    <div class="article">
                        <h4><?php echo ($row['blog_subject']) ?></h4>
                        <p><?php echo (substr($row['blog_text'], 0, 130)) ?> ...</p>
                    </div>
                    <div class="blog-view">
                        <a href="blog.php?id=<?php echo ($row['blog_id']) ?>" class="blog-view-button">بیشتر بخوانید</a>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>