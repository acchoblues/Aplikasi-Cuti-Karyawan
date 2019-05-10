<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- meta http-equiv="refresh" content="5" /> -->
    <title>Aplikasi Cuti Karyawan Free Version | www.hakkoblogs.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition" background="dist/img/2.jpg">
    <div class="login-box">
      <div class="login-logo">
        <a href="#" style="color: white;"><!-- <span class="glyphicon glyphicon-th-large"></span> --> Leave Application </a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <center><img src="dist/img/niqoweb.png" /></center>
         <p class="login-box-msg"><?php if (isset($_GET['error'])) {echo 
                  "<div class='alert alert-danger alert-gradient alert-dismissible fade in' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>x</span></button>
                            <strong>Error!</strong> $_GET[error]
                          </div>";} else { echo "";} ?></p>
        <form action="proseslogin.php" id="login" name="login" method="post">
          <div class="form-group has-feedback">
            <input type="text" id="username" name="username" class="form-control" autocomplete="off" placeholder="Username" required="required">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <center><h5 class="form-signin"><a href="#" data-toggle="modal" data-target="#contact">Hakko Bio Richard &copy; 2019</a> </h5></center> 

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    
     <!-- Modal Dialog Contact -->
 <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
      </div>
      <div class="modal-body">
      Aplikasi ini dibuat oleh
       Hakko Bio Richard yang dapat dihubungi di :
      <table>
      <tr>
      <td>No Telepon</td> <td>:</td> <td>0856 949 848 03</td>
      </tr>
      <br />
      <tr>
      <td>E-mail</td><td>:</td> <td><a href="mailto:hakkobiorichard@gmail.com">hakkobiorichard@gmail.com</a> | <a href="mailto:hakko_bio_richard@yahoo.co.id">hakko_bio_richard@yahoo.co.id</a></td>
      </tr> 
      <br />
      <tr>
      <td>Blog</td>       <td>:</td> <td><a href="http://www.hakkoblogs.com" target="_blank">www.hakkoblogs.com</a></td>
      </tr>
      <br />
      <tr>
      <td>Website</td>    <td>:</td> <td><a href="http://www.niqoweb.com" target="_blank">www.niqoweb.com</a></td>
      </tr>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end dialog modal -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
