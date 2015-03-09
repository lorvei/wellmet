<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-12">
        <h2><?php echo $_SESSION['uName']; ?></h2>

        <?php if ($_SESSION['profil_id'] == NULL) : ?>

        <p>Neked még nincs profilod létrehozva. Hozzd létre a saját profilodat!</p>
            <form name="usersForm" method="post" id="newsForm">
                
                <label>Nem:</label>
                <br>
                <select name="nem">
                    <option>Válassz</option>
                    <option value="Férfi">Férfi</option>
                    <option value="Nő">Nő</option>
                </select>
                <br>
                <label>Születés dátuma:</label>
                <br>
                <select name="ev">
                    <?php 
                    for ($i=date('Y')-18; $i>=1920; $i--) { 
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                </select>
                <select name="ho">
                    <option value="01">Január</option>
                    <option value="02">Február</option>
                    <option value="03">Március</option>
                    <option value="04">Április</option>
                    <option value="05">Május</option>
                    <option value="06">Június</option>
                    <option value="07">Július</option>
                    <option value="08">Augusztus</option>
                    <option value="09">Szeptember</option>
                    <option value="10">Október</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>    
                <select name="nap">
                    <?php 
                    for ($i=01; $i<=31; $i++) { 
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                </select>
                <br>
                <label>Bemutatkozás:</label>
                <br>
                <textarea name="bemutatkozas" class="longText" cols="50" rows="5"></textarea>
                <br>
                <input type="submit" value="Létrehoz" class="btn btn-default btn-sm" name="profilokSubmit">
            </form>

        <?php else : ?>
        
            <form name="usersForm" method="post" id="newsForm">
                <img src="profilepictures/pp.jpg" width="150">
                <br>
                <label>nyet:</label>
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
                <input type="submit" name="profilDelete" value="Profil törlése" class="btn btn-default btn-sm">
            </form>

            

        <?php endif; ?>

    </div>
</div>
<?php
include('includes/footer.php');
