<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-2">
        <h2><?php echo $profil['uname']; ?></h2>
        <?php
        $volt_kep = false;
        while ($kep = $profilkepek->fetch_assoc()) {
        $volt_kep = true;
        echo '<img src="profilepictures/' . $kep['filenev'] . '" width="150">';
        }
        if (!$volt_kep) {
        if ($profil['nem'] == 'Nő') {
        echo '<img src="profilepictures/ppf.jpg" width="150">';
        } else {
        echo '<img src="profilepictures/ppm.jpg" width="150">';
        }
        }
        ?>
    </div>



    <div id="data" class="col-md-10">
        <br>
        <h2>Adatok</h2>
        <br>
        <label>Email:</label>
        <br>
        <?php echo $profil['email']; ?>
        <br><br>
        <label>Életkor:</label>
        <br>
        <?php echo (date('Y') - explode('-', $profil['szuletesi_datum'])[0]) . " év"; ?>
        <br><br>
        <label>Nem:</label>
        <br>
        <?php echo $profil['nem']; ?>
        <br><br>
        <label>Megye:</label>
        <br>
        <?php echo $profil['megye']; ?>

        <?php if ($profil['erdeklodesi_kor'] != NULL) :; ?>
            <br><br>
            <label>Érdeklődési körök:</label>
            <br>
            <?php echo $profil['erdeklodesi_kor']; ?>
        <?php else : ?>
        <?php endif; ?>

        <br><br>   
        <label>Bemutatkozás:</label>
        <br>
        <?php echo $profil['bemutatkozas']; ?>



    </div>
</div>
<?php
include('includes/footer.php');
