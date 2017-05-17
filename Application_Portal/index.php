<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="img/icon.png">
  <link rel="style" href="css/style.css">
  <title>Apply</title>
  <?php include 'css/css.html'; ?>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';

    }

    elseif (isset($_POST['register'])) { //user registering

        require 'register.php';

    }
}
?>
<body>
  <div class="form">

      <ul class="tab-group">
        <li class="tab"><a href="#signup">Create Account</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">

         <div id="login">
          <center><h><img rel="logo" src="img/logo.gif" height="150" width="200"></h></center>

          <br>

          <form action="index.php" method="post" autocomplete="off">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>

          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          <p class="forgot"><a href="mentorlogin.php">Mentor Login</a></p>

          <button class="button button-block" name="login" />Log In</button>

          </form>

        </div>

        <div id="signup">
          <h1>Create Account</h1>

          <form action="index.php" method="post" autocomplete="off">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>

            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>

          <button type="submit" class="button button-block" name="register" />Register</button>

          </form>

        </div>

      </div><!-- tab-content -->


      <br>
      <h3 style="font-size:10px; text-align:right;">
      <i>
        System developed by Izuho Suzuki email:izuho@u.northwestern.edu
      </i>
    </h3>

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>


</body>
</html>

<?php /* Template Name: Login*/ ?>
<?php get_header(); $options = get_desing_plus_option(); ?>

<div id="main_col">

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

 <!-- <h2 class="headline1"><span><?php the_title(); ?></span></h2> -->

 <div class="post clearfix">
  <?php the_content(); ?>
  <?php custom_wp_link_pages(); ?>
 </div><!-- END .post -->

 <?php endwhile; endif; ?>

</div><!-- END #main_col -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
