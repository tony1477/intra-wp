<!DOCTYPE html>
<html lang="en" >
  <head>
      <meta charset="UTF-8">
      <title>Wilian Perkasa Group - Login</title>
      <!-- <link rel="stylesheet" href="./style.css"> -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/pandalogin/style.css">
  </head>

  <body>
    <!-- partial:index.partial.html -->
    <div class="panda">
      <div class="ear"></div>
      <div class="face">
        <div class="eye-shade"></div>
        <div class="eye-white">
          <div class="eye-ball"></div>
        </div>

        <div class="eye-shade rgt"></div>
        <div class="eye-white rgt">
          <div class="eye-ball"></div>
        </div>

        <div class="nose"></div>
        <div class="mouth"></div>
      </div>

      <div class="body"> </div>
      <div class="foot">
        <div class="finger"></div>
      </div>
      <div class="foot rgt">
        <div class="finger"></div>
      </div>
    </div>

    <?php 
      if (isset($_POST['submit'])) {
          echo "<div class='alert alert-danger'><center>Kode User atau Password anda salah.</center></div>";
      }
    ?>
    
    <form action="" method="post">
      <div class="hand"></div>
      <div class="hand rgt"></div>
      <h1>Login SOP</h1>
      <div class="form-group">
        <input required="required" class="form-control"/>
        <label class="form-label">Username    </label>
      </div>

      <div class="form-group">
        <input id="password" type="password" required="required" class="form-control"/>
        <label class="form-label">Password</label>
        <p class="alert">Invalid Credentials..!!</p>
        <button name='submit' type="submit" class="btn">Login </button>
      </div>
    </form>

    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?php echo base_url(); ?>ifassetadm/pandalogin/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>ifassetadm/pandalogin/script.js"></script>
  </body>
</html>
