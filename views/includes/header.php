<!DOCTYPE html>
<html>
    <?php
    $succes = false;

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
        if ($uData['upass'] == crypt($uPass, $uData['upass']))
            $success = true;  //hashed password ellenőrzése

        if ($success) {
            //oldalakhoz hozzáférés
            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $uData['id'];
            $_SESSION['uName'] = $uData['uname'];
            $_SESSION['name'] = $uData['name'];
            $_SESSION['rights'] = $uData['rights'];
            $_SESSION['eMail'] = $uData['email'];
            $profil = $db->query("SELECT * FROM profilok WHERE user_id=".$uData['id'])->fetch_assoc();
            $_SESSION['szuletesiDatum'] = $profil['szuletesi_datum'];
            $_SESSION['profil_id'] = $profil['id'];
            $_SESSION['bemutatkozas'] = $profil['bemutatkozas'];
            $_SESSION['eKor'] = $profil['erdeklodesi_kor'];
            $_SESSION['megye'] = $profil['megye'];
            $_SESSION['nem'] = $profil['nem'];
            
            if ($profil['id']!=NULL) {
                $profilkepek = $db->query("SELECT filenev FROM profilkepek WHERE profil_id=".$profil['id'])->fetch_assoc();
                $_SESSION['fileNev'] = $profilkepek['filenev'];
            }
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
        <div class="container">
            <div id="header" class="row">
                <div class="col-md-6">
                    <h1 id="sitename">Wellmet</h1>
                </div>
                <div class="col-md-6" id="login-block">
                    <?php if (isset($_SESSION['logged'])) : ?>

                        <p>Üdv az oldalon, <?php echo $_SESSION['name']; ?>! |
                            <a role="presentation"><a href="?q=kijelentkezes">Kijelentkezés</a></p>


                    <?php else : ?>
                        <form name="loginForm" method="post" class="form-inline">
                            <input type="text" name="uName" class="form-control input-sm" placeholder="Név">
                            <input type="password" name="uPass" class="form-control input-sm" placeholder="Jelszó">
                            <input type="submit" name="loginSubmit" value="Belépés" class="btn btn-default btn-sm">
                            <br>
                            <a role="presentration"><a href="?q=regisztracio">Regisztráció</a>

                        </form>
                    <?php endif; ?>
                </div>

            </div>
            <?php include('navigation.php'); ?>