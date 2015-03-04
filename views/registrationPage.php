<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-12">
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
                <input type="submit" name="usersSubmit">
            </form>




<?php endif; ?>

    </div>
</div>
<?php
include('includes/footer.php');
