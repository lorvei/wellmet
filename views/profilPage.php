<?php include('includes/header.php'); ?>

<div id="content" class="row">
    <div class="col-md-2">
        <h2><?php echo $_SESSION['uName']; ?></h2>
        <?php if ($_SESSION['profil_id'] == NULL) : ?>
    </div>
    <div class="col-md-10">
        <p>Neked még nincs profilod létrehozva. Hozzd létre a saját profilodat!</p>
        
        
            <form name="usersForm" method="post" id="newsForm">
                <br>
                <label>Nem:</label>
                <br>
                <select name="nem">
                    <option>Válassz</option>
                    <option value="Férfi">Férfi</option>
                    <option value="Nő">Nő</option>
                </select>
                <br><br>
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
                <br><br>
                <label>Megye:</label>
                <br>
                <select name="megye">
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
                <br><br>
                <label>Bemutatkozás:</label>
                <br>
                <textarea name="bemutatkozas" class="longText" cols="50" rows="5"></textarea>
                <br><br>
                <label>Érdeklődési körök:</label>
                <br>
                
                <table>
                    <tr>
                        <td id="t1"><input type="checkbox" name="eKFut" value="Futás"> Futás   <br>
                        <input type="checkbox" name="eKAuto" value="Autók"> Autók   <br>
                        <input type="checkbox" name="eKPc" value="PC"> PC   <br>
                        <input type="checkbox" name="eKSport" value="Sport"> Sport   <br></td>
                        <td id="t2"><input type="checkbox" name="eKPolitika" value="Politika"> Politika<br>
                        <input type="checkbox" name="eKIvaszat" value="Ivászat"> Ivászat<br>
                        <input type="checkbox" name="eKAnime" value="Animék"> Animék<br>
                        <input type="checkbox" name="eKZene" value="Zenék"> Zenék<br></td>
                    </tr>
                </table>    
                
                <br>
                <input type="submit" value="Profil létrehozása" class="btn btn-default btn-sm" name="profilokSubmit">
            </form>

        <?php else : ?>
        
            <form name="usersForm" method="post" id="newsForm">
                <img src="profilepictures/<?php 
                    if($_SESSION['fileNev']==NULL){
                        if($_SESSION['nem']=='Nő'){
                            echo 'ppf.jpg" width="150"';
                        }else {
                            echo 'ppm.jpg" width="150"';
                        }                    
                    }else {
                        echo $_SESSION['fileNev'].'" width="150"';
                    }
                    ?> ">
    </div>  
    <div id="data" class="col-md-10">
                <br>
                <h2>Adatok</h2>
                <br>
                <label>Email:</label>
                <br>
                <?php echo $_SESSION['eMail']; ?>
                <br><br>
                <label>Életkor:</label>
                <br>
                <?php echo (date('Y')-explode('-',$_SESSION['szuletesiDatum'])[0]). " év"; ?>
                <br><br>
                <label>Nem:</label>
                <br>
                <?php echo $_SESSION['nem']; ?>
                <br><br>
                <label>Megye:</label>
                <br>
                <?php echo $_SESSION['megye']; ?>
                
                <?php if ($_SESSION['eKor']!=NULL) : ;?>
                    <br><br>
                    <label>Érdeklődési körök:</label>
                    <br>
                    <?php echo $_SESSION['eKor']; ?>
                <?php else : ?>
                <?php endif; ?>
                    
                <br><br>   
                <label>Bemutatkozás:</label>
                <br>
                <?php echo $_SESSION['bemutatkozas']; ?>
                
                <br><br>
                <input type="submit" name="profilDelete" value="Profil törlése" class="btn btn-default btn-sm">
            </form>
            
            
            

        <?php endif; ?>

    </div>
</div>
<?php
include('includes/footer.php');
