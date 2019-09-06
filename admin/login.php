﻿<?php
session_start();
include "../koneksi.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-image: url(assets/cover.jpg);">
  <div class="container">
    <div class="row text-center ">
      <div class="col-md-12">
        <br /><br />
        <h2 style="color: white;">Masukkan Identitas Anda</h2>

        <h5 style="color: white;">( Login untuk Melanjutkan )</h5>
        <br />
      </div>
    </div>
    <div class="row ">

      <div  class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong>Login</strong>
          </div>
          <div class="panel-body">
            <form  role="form" method="POST">
             <br />
             <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-tag"  >Username</i></span>
              <input type="text" class="form-control" name="user" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-lock"  > Password </i></span>
              <input type="password" class="form-control"  name="pass" />
            </div>
            <div class="form-group">
              <label class="checkbox-inline">
                <input type="checkbox" /> Remember me
              </label>
              <span class="pull-right">
               <a href="#" >Forget password ? </a> 
             </span>
           </div>

           <input type="submit" name="login" class="btn btn-primary" value="Login">

         </form>
         <?php
         if (isset($_POST['login'])) {
           $ambil=$koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
           $pencocokan = $ambil->num_rows;
           if ($pencocokan == 1) {
             $_SESSION['admin'] = $ambil->fetch_assoc();
             echo "<script>alert('Welcome Page Admin' )</script>";
             echo "<script>window.location='index.php'</script>";
           }else{
             echo "<script>alert('Username atau Password Salah' )</script>";
             echo "<script>window.location='login.php'</script> ";
           }
         }
         ?>
       </div>

     </div>
   </div>


 </div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

</body>
</html>
