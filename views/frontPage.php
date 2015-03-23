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
</div>
<?php
include('includes/footer.php');
