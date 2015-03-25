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
