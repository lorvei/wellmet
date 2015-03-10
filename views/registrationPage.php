<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-4">
        <h2>Regisztráció</h2>

        <?php if (isset($_SESSION['msg'])) : ?>

            <p><?php
                print($_SESSION['msg']);
                unset($_SESSION['msg']);
                ?></p>
            <ul id="navigation" class="nav nav-pills">
                <li role="presentation">Sikeres regisztráció!</li>
            </ul>

<?php else : ?>
            
            <form name="usersForm" method="post" id="newsForm">
                <label>Felhasználónév:</label>
                <br>
                <input type="text" name="uname" class="form-control input-sm">
                <br>
                <label>Jelszó:</label>
                <br>
                <input type="text" name="upass" class="form-control input-sm">
                <br>
                <label>Név:</label>
                <br>
                <input type="text" name="name" class="form-control input-sm">
                <br>
                <label>Email:</label>
                <br>
                <input type="text" name="email" class="form-control  input-sm">
                <br>
                <input type="submit" name="usersSubmit" value="Regisztrálok" class="btn btn-default btn-sm">
            </form>




<?php endif; ?>
    </div>
    <div class="col-md-8">
    </div>
</div>
<?php
include('includes/footer.php');
