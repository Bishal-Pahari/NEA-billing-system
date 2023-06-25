<nav class="navbar">
    <img src="<?php echo ($currentPage === 'index.php') ? './assets/images/neaLogo.png' : '../assets/images/neaLogo.png'; ?>"
        alt="Logo of NEA" class="logo-img" />

    <?php if ($currentPage === 'index.php') { ?>
        <button class="btn-primary" onclick="submit">Sign In</button>
    <?php } else { ?>
        <div class="nav-btn">
            <a href="../index.php"><button class="btn-primary" onclick="submit">HomePage</button></a>
            <button class="btn-primary" onclick="submit">Sign In</button>
        </div>
    <?php } ?>
</nav>