<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-12">
        <h2><?php echo $pageTitle; ?></h2>
        
        
	<?php if(isset($_SESSION['logged']))
        if (isset($_SESSION['msg'])) : ?>
	
		<p><?php print($_SESSION['msg']); unset($_SESSION['msg']); ?></p>
		<br>
		<ul id="navigation" class="nav nav-pills">
		<li role="presentation"><a href="?q=kezdolap">Új gondolat.</a></li>
		</ul>
	
	<?php else : ?>
		
		<?php if ($_SESSION['rights']==1 || $_SESSION['rights']==2 || $_SESSION['rights']==3) : ?>
	
			<form name="newsForm" method="post" id="newsForm">
				<textarea name="text" class="longText" cols="75" rows="2" placeholder="Egy gondolat."></textarea>
				<input type="submit" name="newsSubmit">
			</form>
                <?php else : ?>
		<?php endif; ?>
        <?php endif;
        
        foreach ($news as $item) {
            
            echo '<div class="news">';
            echo '<div class="pname">' . $item['uname'] . '</div>';
            echo '<div class="text">' . $item['text'] . '</div>';
            echo '<div class="date">' . $item['date'] . '</div>';
            echo '</div>';
        }
        ?>
            

    </div>
    <div class="row profilok">
                <?php
                foreach ($talal as $item) {
                    if ($item['profilkep'] == NULL) {
                        if ($item['nem'] == 'Nő') {
                            $profK = 'ppf.jpg" width="150" heigth="150"';
                        } else {
                            $profK = 'ppm.jpg" width="150" heigth="150"';
                        }
                    } else {
                        $profK = $item['profilkep']['filenev'] . '" width="150" heigth="150"';
                    }

                    echo '<div class="col-md-4">';

                    echo '<br><div class="row">';
                    echo '<div class="col-md-5">';
                    echo '<img src="profilepictures/' . $profK . '">';
                    echo '</div>';
                    echo '<div class="col-md-7">';
                    echo '<b><div class="uname">' . $item['uname'] . '</div></b>';
                    echo '<div class="eletkor">' . (date('Y') - explode('-', $item['szuletesiDatum'])[0]) . " éves" . '</div>';
                    echo '<br><div class="megye">' . $item['megye'] . ' megyéből</div>';
                    echo '<br><a href="?q=iprofil&iid='. $item['id'] .'">Profil megtekintése</a>';
                    echo '</div></div>';

                    echo '</div>';
                }
                ?>
            </div>
</div>
<?php
include('includes/footer.php');
