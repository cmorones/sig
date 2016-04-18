<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Acceso';
$this->breadcrumbs=array(
  'Acceso',
);
?>
<div class="page-header" align="center">
  <h3> SISTEMA INSTITUCIONAL DE GESTIÓN DOCUMENTAL</h3>
</div>
<div class="wrapper full-page-wrapper page-auth page-login text-center">
    <div class="inner-page">
      <div class="logo">
        <a href="index.html"><img src="assets/img/kingadmin-logo.png" alt="" /></a>
      </div>
      <button type="button" class="btn btn-auth-facebook"><span>Login via Facebook</span></button>

      <div class="separator"><span>OR</span></div>

      <div class="login-box center-block">
        <form class="form-horizontal" role="form">
          <p class="title">Use your username</p>
          <div class="form-group">
            <label for="username" class="control-label sr-only">Username</label>
            <div class="col-sm-12">
              <div class="input-group">
                <input type="text" placeholder="username" id="username" class="form-control">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
            </div>
          </div>
          <label for="password" class="control-label sr-only">Password</label>
          <div class="form-group">
            <div class="col-sm-12">
              <div class="input-group">
                <input type="password" placeholder="password" id="password" class="form-control">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              </div>
            </div>
          </div>
          <label class="fancy-checkbox">
            <input type="checkbox">
            <span>Remember me next time</span>
          </label>
          <button class="btn btn-custom-primary btn-lg btn-block btn-auth"><i class="fa fa-arrow-circle-o-right"></i> Login</button>
        </form>

        <div class="links">
          <p><a href="#">Forgot Username or Password?</a></p>
          <p><a href="#">Create New Account</a></p>
        </div>
      </div>
    </div>
  </div>
<br/><br/><br/>
