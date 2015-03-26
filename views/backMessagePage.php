<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-12">
        <h2><?php echo $pageTitle; ?></h2>
        
        
    <?php if (isset($_SESSION['msgvke'])) : ?>
    <?php print($_SESSION['msgvke']); 
    unset($_SESSION['msgvke']);
    ?>
        
    <?php else : ?>    
        <form name="msgForm" method="post">
            <div>
                <textarea name="uMsg" class="longText" cols="40" rows="4" placeholder="Írj vissza!"></textarea><br>
            </div>
            <input type="hidden" name="cimzett_id" value="<?php echo $_GET['feladoid']; ?>">
            <input type="submit" name="msgSubmit">
        </form>
    <?php endif; ?>
        
    </div>
</div>
<?php
include('includes/footer.php');
