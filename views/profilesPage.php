<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-12">
        <h2><?php echo $pageTitle; ?></h2>

        <?php if (isset($_SESSION['logged'])) : ?>

            <?php if (isset($_SESSION['sresult'])) : ?>
                <ul id="navigation" class="nav nav-pills">
                    <li role="presentation"><a href="?q=profilok">Új szűrés</a></li>
                </ul>
                <br>



                <?php
                if (!empty($_SESSION['sresult'])) {
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
                        echo '<br><a href="?q=iprofil&iid=' . $item['id'] . '">Profil megtekintése</a>';
                        echo '</div></div>';

                        echo '</div>';
                    }
                } else {
                    echo '<p>Nincs találat.</p>';
                }
                unset($_SESSION['sresult']);
                ?>

            <?php else : ?>

                <form name="searchForm" method="post" id="searchForm">



                    <br>

                    <label>Felhasználónév:</label>
                    <br>
                    <input type="text" name="uname" class="shortText">
                    <br>

                    <label>Érdeklődési kör:</label>
                    <br>
                    <input type="text" name="erdeklodesi_kor" class="shortText">
                    <br>

                    <label>Kor:</label>
                    <br>
                    <select name="korTol">
                        <option value="">tól</option>
                        <?php
                        for ($i = 18; $i <= 90; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>

                    </select>
                    -
                    <select name="korIg">
                        <option value="">ig</option>
                        <?php
                        for ($i = 18; $i <= 95; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>

                    </select>
                    <br>

                    <label>Megye:</label>
                    <br>
                    <select name="megye">
                        <option value="">Válassz</option>
                        <option value="Bács-Kiskun">Bács-Kiskun</option>
                        <option value="Baranya">Baranya</option>
                        <option value="Békés">Békés</option>
                        <option value="Borsod-Abaúj-Zemplén">Borsod-Abaúj-Zemplén</option>
                        <option value="Csongrád">Csongrád</option>
                        <option value="Fejér">Fejér</option>
                        <option value="Győr-Moson-Sopron">Győr-Moson-Sopron</option>
                        <option value="Hajdú-Bihar">Hajdú-Bihar</option>
                        <option value="Heves">Heves</option>
                        <option value="Jász-Nagykun-Szolnok">Jász-Nagykun-Szolnok</option>
                        <option value="Komárom-Esztergom">Komárom-Esztergom</option>
                        <option value="Nógrád">Nógrád</option>
                        <option value="Pest">Pest</option>
                        <option value="Somogy">Somogy</option>
                        <option value="Szabolcs-Szatmár-Bereg">Szabolcs-Szatmár-Bereg</option>
                        <option value="Tolna">Tolna</option>
                        <option value="Vas">Vas</option>
                        <option value="Veszprém">Veszprém</option>
                        <option value="Zala">Zala</option>
                    </select>    
                    <br>
                    <input type="submit" name="pSearchSubmit" value="Keresés">
                    <br>
                </form>

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
                        echo '<br><a href="?q=iprofil&iid=' . $item['id'] . '">Profil megtekintése</a>';
                        echo '</div></div>';

                        echo '</div>';
                    }
                    ?>
                </div>

            <?php endif; ?>
        <?php else : ?>
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
                        echo '<br><a href="?q=iprofil&iid=' . $item['id'] . '">Profil megtekintése</a>';
                        echo '</div></div>';

                        echo '</div>';
                    }
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
include('includes/footer.php');
