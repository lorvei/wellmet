<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-12">
        <h2><?php echo $pageTitle; ?></h2>
        <?php
        foreach ($news as $item) {
            echo '<div class="news">';
            echo '<div class="title">' . $item['title'] . '</div>';
            echo '<div class="text">' . $item['text'] . '</div>';
            echo '<div class="date">' . $item['date'] . '</div>';
            echo '</div>';
        }
        ?>

    </div>
</div>
<?php
include('includes/footer.php');
