<nav class="main-nav">
    <ul>
        <?php if(!$isUserConnected) : ?>
            <li><a href="authentification/login.php">Se connecter</a></li>
            <li><a href="authentification/signup.php">S'inscrire</a></li>
        <?php else :?>
            <li><a href="authentification/logout.php">Se déconnecter</a></li>
            <?php if(!$userHasCharacter) : ?>
                <li><a href="create.php">Créer personnage</a></li>

            <?php else :?>
                <li><a href="profil_page.php">Afficher personnage</a></li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
</nav>