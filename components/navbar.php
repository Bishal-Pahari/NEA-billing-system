<nav class="navbar">
    <img src="<?php echo ($currentPage === 'login.php' || $currentPage === 'register.php' || $currentPage === 'index.php' || $currentPage === 'payment.php') ? './assets/logo.png' : '../assets/logo.png'; ?>"
        alt="Logo of NEA" class="logo-img" />

    <?php if ($currentPage === 'home.php') { ?>
        <a href="home.php?logout='1'"> <button class="btn-primary" onclick="submit">Logout</button></a>
    <?php } elseif ($currentPage === 'login.php' || $currentPage === 'register.php') { ?>
        <!-- Null or no code here, as per your requirement -->
    <?php } elseif ($currentPage === 'index.php') { ?>
        <a href="index.php?logout='1'"><button class="btn-primary" onclick="submit">Logout</button></a>
    <?php } else { ?>
        <div class="nav-btn">
            <a href="../index.php"><button class="btn-primary" onclick="submit">HomePage</button></a>
            <a href="../php/logout.php"> <button class="btn-primary" onclick="submit"> Logout </button></a>
        </div>
    <?php } ?>


</nav>