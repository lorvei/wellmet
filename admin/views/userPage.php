<?php include('includes/header.php'); ?>

<div id="content">
	 <h2>Keresés a felhasználók között</h2>
  
	<?php if (isset($_SESSION['sresult'])) : ?>
	
		<?php 
			if (!empty($_SESSION['sresult'])) {
				foreach ($_SESSION['sresult'] as $item) {
					$rID = $item['rights'];
					echo '<div class="news">';
					echo '<div class="tag">'.$rights[$rID].'</div>';
					echo '<div class="title">'.$item['name'].' ('.$item['uname'].')</div>';
					echo '<div class="text">'.$item['email'].'</div>';
					echo '</div>';
				}
			} else {
				echo '<p>Nincs találat.</p>';
			}
			unset($_SESSION['sresult']); 
		?>
		<br>
		<ul id="navigation" class="nav nav-pills">
		<li role="presentation"><a href="?q=felhasznalok">Új keresés</a></li>
		</ul>
	
	<?php else : ?>
  
		<form name="searchForm" method="post" id="searchForm">
				<label>Névben:</label>
				<br>
				<input type="text" name="name" class="shortText">
				<br>
				<label>Felhasználónévben:</label>
				<br>
				<input type="text" name="uname" class="shortText">
				<br>
				<label>Email címben:</label>
				<br>
				<input type="text" name="email" class="shortText">
				<br>
				<input type="submit" name="searchSubmit" value="Keresés">
			</form>
  
	<?php endif; ?>
	<hr>

	<?php if ($_SESSION['rights']==1) : ?>
	
		<h2>Felhasználók kezelése</h2>
  
		<?php if (isset($_SESSION['msg'])) : ?>
		
			<p><?php print($_SESSION['msg']); unset($_SESSION['msg']); ?></p>
			<br>
			<ul id="navigation" class="nav nav-pills">
				<li role="presentation"><a href="?q=felhasznalok">Új felhasználó</a></li>
			</ul>
	
		<?php else : ?>
	
			<form name="usersForm" method="post" id="newsForm">
				<label>Felhasználónév:</label>
				<br>
				<input type="text" name="uname" class="shortText">
				<br>
				<label>Jelszó:</label>
				<br>
				<input type="text" name="upass" class="shortText">
				<br>
				<label>Név:</label>
				<br>
				<input type="text" name="name" class="shortText">
				<br>
				<label>Email:</label>
				<br>
				<input type="text" name="email" class="shortText">
				<br>
				<label>Jogosultsági kör:</label>
				<br>
				<select name="rights">
				<?php 
					foreach ($rights as $rID => $right) {
						echo '<option value="'.$rID.'">'.$right.'</option>';
					}
				?>
				</select>
				<br>
				<input type="submit" name="usersSubmit">
			</form>
		
		<?php endif; ?>
		
	<?php endif; ?>
	
	<?php if ($_SESSION['rights']==1) : ?>
		
			<hr>
			<h2>Aktíválásra váró felhasználók</h2>
			
			<form name="activateForm" method="post" id="activateForm">
				<table>
					<?php
						$c = 1;
						foreach ($nonActivated as $item) {
							$rID = $item['rights'];
							echo '<tr>';
							echo '<td class="tid"><input type="checkbox" name="activate'.$c.'" value="'.$item['id'].'"></td>';
							echo '<td class="ttag">'.$rights[$rID].'</td>';
							echo '<td class="ttitle">'.$item['name'].'</td>';
							echo '</tr>';
							$c++;
						}
					?>
				</table>
				
				<?php if ($c>1) : ?>
					<input type="submit" name="activateSubmit" value="Aktivál">
				<?php else : ?>
					<p>Nincs aktiválatlan felhasználó.</p>
				<?php endif; ?>	
			</form>
			
		<?php endif; ?>
	
</div>

<?php
include('includes/footer.php');
