<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-12">
        <h2><?php echo $pageTitle; ?></h2>
        
        
    <?php if (isset($_SESSION['msgvke'])) : ?>
    <?php print($_SESSION['msgvke']); ?>
    <?php else : ?>    
        <form name="msgForm" method="post">
            <div>
                <textarea name="uMsg" class="longText" cols="40" rows="4" placeholder="Írj vissza!"></textarea><br>
            </div>
            <input type="hidden" name="cimzett_id" value="<?php echo $_GET['feladoid']; ?>">
            <input type="submit" name="msgSubmit">
        </form>
    <?php endif; ?>
        <?php /*    <div class="row uzenetek">
                <?php
                foreach ($tal as $item) {
                        
                        echo '<div class="col-md-4">';
                        echo 'asd';
                        echo '<br><div class="row">';
                        echo '<div class="col-md-5">';
                        echo '</div>';
                        echo '<div class="col-md-7">';
                        echo '<b><div class="felad">' . $item['felad'] . '</div></b>';
                        echo '<div class="cim">' . $item['cim'] . '</div>';
                        echo '<br><div class="ido">' . $item['ido'] . '</div>';
                        echo '<br><div class="uzi">' . $item['uzi'] . '</div>';
                        echo '</div></div>';

                        echo '</div>';
                    }
                ?>
            </div>
        */?>
    </div>
</div>
<?php
include('includes/footer.php');
