<?php include('includes/header.php'); ?>

<div id="content">

	<?php if (isset($_SESSION['logged'])) : ?>
	
	<p>Üdv az admin oldalon!</p>
	
	<?php else : ?>
	
	<h2>Bejelentkezés</h2>
        
        <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
  <form name="loginForm" method="post">
    <label>Név:</label>
    <br>
    <input type="text" name="uName">
    <br>
    <label>Jelszó:</label>
    <br>
    <input type="password" name="uPass">
	<br>
    <input type="submit" name="loginSubmit">
  </form>
  
	<?php endif; ?>
	
</div>

<?php
include('includes/footer.php');