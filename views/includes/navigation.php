<div id="navigation" class="row">
    <div class="col-md-12">
        <ul id="navigation" class="nav nav-pills">
            <?php if (isset($_SESSION['logged'])) : ?>
            <li><a href="?q=kezdolap">Kezdőlap</a></li>
            <li><a href="?q=profilok">Profilok</a></li>
            <li><a href="?q=kapcsolat">Kapcsolat</a></li>
            <li><a href="?q=profil">Profil</a></li>
            <li><a href="?q=uzenetek">Üzenetek</a></li>
            <?php else : ?>
            <li><a href="?q=kezdolap">Kezdőlap</a></li>
            <li><a href="?q=profilok">Profilok</a></li>
            <li><a href="?q=kapcsolat">Kapcsolat</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>