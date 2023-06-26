<nav class="navbar">
    <img src="<?php echo ($currentPage === 'login.php' || $currentPage === 'register.php' || $currentPage === 'index.php') ? './assets/logo.png' : '../assets/logo.png'; ?>"
        alt="Logo of NEA" class="logo-img" />

    <?php if ($currentPage === 'home.php') { ?>
        <button class="btn-primary" onclick="submit"><a href="home.php?logout='1'">Logout</a></button>
    <?php } elseif ($currentPage === 'login.php' || $currentPage === 'register.php') { ?>
        <!-- Null or no code here, as per your requirement -->
    <?php } elseif ($currentPage === 'index.php') { ?>
        <button class="btn-primary" onclick="submit"><a href="index.php?logout='1'">Logout</a></button>
    <?php } else { ?>
        <div class="nav-btn">
            <a href="./dashboard.php"><button class="btn-primary" onclick="submit">HomePage</button></a>
            <button class="btn-primary" onclick="submit"> <a href="../php/logout.php">Logout</a> </button>
        </div>
    <?php } ?>


</nav>