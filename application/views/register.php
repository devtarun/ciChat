<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome to CodeIgniter</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
  <style>
    .btn {width: 50%;border-radius: 0}
    .btn-container {width: 100%;display: block;position: relative;}
    .btn-sep {
        position: absolute;
        background: white;
        border-radius: 50%;
        padding: 7px;
        top: 50%;
        left: 50%;
        transform: translate(-50%);
        font-style: normal;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-lg-offset-4 text-center">
        <h1>Register</h1>
        <?php echo validation_errors('<span style="color:red;text-align:center">', '</span>'); ?>
        <?php echo form_open('home/register'); ?>
          <div class="form-group">
            <?php echo form_input(array(
              'name'=>'un',
              'placeholder'=>'Name',
              'class' => 'form-control'
            )); ?>
          </div>
          <div class="form-group">
            <?php echo form_input(array(
              'name'=>'ue',
              'placeholder'=>'Email',
              'class' => 'form-control'
            )); ?>
          </div>
          <div class="form-group">
            <?php echo form_password(array(
              'name'=>'up',
              'placeholder'=>'Password',
              'class' => 'form-control'
            )); ?>
          </div>
          <div class="form-group">
            <?php echo form_password(array(
              'name'=>'ucp',
              'placeholder'=>'Repeat Password',
              'class' => 'form-control'
            )); ?>
          </div>

          <span class="btn-container">
            <button type="submit" class="btn btn-primary btn-large pull-left">Register</button>
            <i class="btn-sep">OR</i>
            <a href="<?php echo base_url('home/login') ?>" class="btn btn-warning btn-large pull-right">Log In</a>
          </span>

        </form>
      </div>
    </div>
  </div>

</body>
</html>