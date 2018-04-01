<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>FMS::Generate QRCode</title>
        <meta name="description" content="Feedback Management System">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?=base_url()?>public/css/flat-ui.min.css">
        <link rel="stylesheet" href="<?=base_url()?>public/css/vendor/bootstrap.min.css">
</head>
<body>
  <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Feedback Management System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    
    <div class="jumbotron">
      <div class="container">
        <h1>FeedBack Management System</h1>
        <p>Create QR codes instantly for different surveys and place at your Establishments where guest cn directly scan the code and access the surveys.</p>
        <p><img src="<?php echo base_url()?>public/img/app/qrcode.png" class="img-rounded img-responsive" alt="" width="50px" height="50px"> </p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2>Generate QR Code</h2>
          <form action="<?=base_url()?>index.php/qrcode/QR_controller/saveQR" method="post">
            <input type="text" name="link" class="form-control" value="" placeholder="Type the Link.."><br/>
            <input type="text" name="description" class="form-control" value="" placeholder="Type the Description.." >
            <br/>
            <input type="submit" name="generate" class="btn btn-primary" value="Generate and Save">
          </form>
        </div>
        <div class="col-md-3"></div>
</body>
</html>