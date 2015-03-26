<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-12">
        <h2><?php echo $pageTitle; ?></h2>
        
        <?php
        while ($item = $uzi->fetch_assoc()) {
            
            echo '<div class="uzenetek">';
            echo '<div class="felad">' . $item['uname'] . ' üzenete:</div>';
            echo '<div class="uzi">' . $item['szoveg'] . '</div>';
            echo '<div class="ido">Ekkor: ' . $item['mikor'] . '</div>';
            echo '<a href="?q=backMessage&feladoid='.$item['felado_id'].'">válasz küldése</a>';
            echo '</div>';
        }
        ?>
        
        
    </div>
</div>
<?php
include('includes/footer.php');
