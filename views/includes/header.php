<!DOCTYPE html>
<html>
    <?php $succes = false;

// login form feldolgozása:
if (isset($_POST['loginSubmit'])) {
  
	$uName = $_POST['uName'];
	$uPass = $_POST['uPass'];
	
	
	// acc a db-ből:

	$query = "SELECT * FROM `users` WHERE `uname`='$uName'";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	// kiszedem az eredményből az 1db sort:
	$uData = $result->fetch_array();
	
	//if ($uData['upass'] == $uPass) $success = true; //hash nélküli jelszók ellenőrzése
	if ($uData['upass'] == crypt($uPass, $uData['upass'])) $success = true;  //hashed password ellenőrzése
	
	if ($success) {
		// admin oldalakhoz hozzáférés
		$_SESSION['logged'] = true;
		$_SESSION['name'] = $uData['name'];
		$_SESSION['rights'] = $uData['rights'];
	}
	
	header("Location: $HOST");
	exit;
}

?>
    <head>
        <meta charset="UTF-8">
        <title>Wellmet - <?php echo $pageTitle; ?></title>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="views/css/base.css">
        
    </head>
    <body>

        <div id="header">
            <h1 id="sitename">Wellmet</h1>
                <div id="login">
                    <?php if (isset($_SESSION['logged'])) : ?>
	
                    <p>Üdv az oldalon, <?php echo $_SESSION['name']; ?>! |
                        <a role="presentation"><a href="?q=kijelentkezes">Kijelentkezés</a></p>
                    
                    
                    <?php else : ?>
                    <form name="loginForm" method="post">
                        <label>Név:</label>
                        <input type="text" name="uName">
                        <label>Jelszó:</label>
                        <input type="password" name="uPass">
                        <br>
                        <input type="submit" name="loginSubmit">
                        
                    </form>
                    <?php endif; ?>
                </div>
            <?php include('navigation.php'); ?>
        </div>