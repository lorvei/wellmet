<?php include('includes/header.php'); ?>
        
        <div id="content">
            <h2><?php echo $pageTitle; ?></h2>
            <form action="search.php" method="GET">
                <input type="text" name="keres" />
                <input type="submit" />
            </form>
        </div>

<?php include('includes/footer.php');