<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome to CodeIgniter</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
        <h1>Login</h1>
        <?php echo validation_errors('<span style="color:red;text-align:center">', '</span>'); ?>
        <?php echo $this->session->flashdata('regsuccess'); ?>
        <?php echo $this->session->flashdata('loginerror'); ?>
        <?php echo form_open('home/login'); ?>
          <div class="form-group">
            <?php echo form_input(array(
              'name'=>'ue',
              'placeholder'=>'Email',
              'class' => 'form-control',
              'id' => 'email'
            )); ?>
          </div>
          <div class="form-group">
            <?php echo form_password(array(
              'name'=>'up',
              'placeholder'=>'Password',
              'class' => 'form-control',
              'id' => 'pass'
            )); ?>
          </div>

          <span class="btn-container">
            <button type="submit" class="btn btn-primary btn-large pull-left">Log In</button>
            <i class="btn-sep">OR</i>
            <a href="<?php echo base_url('home/register') ?>" class="btn btn-warning btn-large pull-right">Register</a>
          </span>
          
        </form>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-4 col-lg-offset-4 text-center">
        <h4>Login As</h4>
        <span class="btn-container">
          <button type="button" id="logA" class="btn btn-success btn-large pull-left">Alice</button>
          <i class="btn-sep">OR</i>
          <button type="button" id="logB" class="btn btn-danger btn-large pull-right">BOB</a>
        </span>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
    $('#logA').click(function(){
      $('#email').val('alice@cichat.com');
      $('#pass').val('alice');
    });
    $('#logB').click(function(){
      $('#email').val('bob@cichat.com');
      $('#pass').val('bob');
    });
  </script>

</body>
</html>