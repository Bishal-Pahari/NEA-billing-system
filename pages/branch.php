<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>branch</title>

    <link rel="stylesheet" href="../src/styles.css" />
  </head>
  <body>
    <nav class="navbar">
      <img
        src="../assets/images/neaLogo.png"
        alt="Logo of NEA"
        class="logo-img"
      />

      <button class="btn-primary" onclick="submit">Sign In</button>
    </nav>

    <form class="container" action="" method="post">
      <h1>Add Branch</h1>
      <div class="box">
        <input required type="text" name="bid" />
        <span>Branch ID</span>
      </div>

      <div class="box">
        <input required type="text" name="bname" />
        <span>Branch Name</span>
      </div>

      <div class="box checkbox-status">
        <label for="byear">Status: </label>
        <input required type="checkbox" name="status" value="true"/>
      </div>

      <div class="box">
        <input class="submit" type="submit" value="Submit" />
      </div>
    </form>

    <footer>
      <p>
        Copyright © <span id="year-change"></span> Nepal Electricity Authority ❘
        All Rights Reserved.
      </p>
    </footer>
    <script src="../src/index.js"></script>
  </body>
</html>
