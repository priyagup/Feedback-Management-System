<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FMS::Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/login/cust.css">

    <link href="<?=base_url()?>public/css/bootstrapValidator.css" rel="stylesheet" />
    <!-- Custom Fonts -->
    <link href="<?=base_url()?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Please Log in to FMS</b></h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" name="myform" id='myform' role="form" method="post" action="<?=base_url()?>index.php/Auth/Authenticate">
                            <div class="exception">
                              <?php
                                if(isset($error)){
                                  echo $msg;
                                }
                              ?>      
                            </div>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" type="text" data-validation="required" data-validation-error-msg="You did not select the User">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value=""  data-validation="required"  data-validation-error-msg="Please give password">
                        </div>
                        <!--
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                            </label>
                        </div>

                    -->
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>public/js/TweenLite.min.js"></script>
<script src="<?=base_url()?>public/js/jquery.js"></script>
<script src="<?=base_url()?>public/js/bootstrapValidator.min.js"></script>
<script>
    
  $(document).ready(function(){

  $(document).mousemove(function(e){
     TweenLite.to($('body'), 
        .5, 
        { css: 
            {
                backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
            }
        });
  });

  $('#myform').bootstrapValidator({
     message: 'This value is not valid',
                                        feedbackIcons: {
                                         valid: 'fa fa-check',
                                        invalid: 'fa fa-times',
                                        validating: 'fa fa-refresh'
                                        },
                                    live: 'disabled',
                                    fields: {
                                        username:{
                                            validators: {
                                                notEmpty: {
                                                    message: 'Username is required it should not be empty'
                                                            }
                                        }
                                    },
                                    password:{
                                        validators: {
                                                notEmpty: {
                                                    message: 'Password is required it should not be empty'
                                                            }
                                        }
                                    }
                                }
  });


});

</script>
</body>
</html>
