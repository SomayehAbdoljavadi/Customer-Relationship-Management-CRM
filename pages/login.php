<?php require_once("actions/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="assets/font.css" rel="stylesheet" type="text/css">
    <link href="assets/metisMenu.min.css" rel="stylesheet">
    <link href="assets/main.min.css" rel="stylesheet">
    <link href="assets/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/favicon.png">
    <title><?php echo TITLE; ?></title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">لطفا وارد شوید</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="actions/login.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <script type="text/javascript">
                                function recaptcha(){
                                    var rnd=Math.floor((Math.random()*1000)+1);
                                    document.getElementById("imgcaptcha").src='sa-captcha/sa-captcha.inc.php?' + rnd;
                                }
                            </script>
                            <style type="text/css">
                                .captcha {
                                    padding: 5px;
                                    display: inline-block;
                                    background: #FCFAFA;
                                    box-shadow: 0 0 5px #E6E4E4;
                                    border-radius: 2px;
                                    border: 1px solid #DDD;
                                }
                                .captcha img {
                                    vertical-align: middle;
                                }
                                #refresh{cursor: pointer}
                            </style>
                            <span class="captcha">
                                <img id="imgcaptcha" src="actions/sa-captcha/sa-captcha.inc.php" alt="حروف امنیتی">
                                <a onclick="recaptcha();" id="refresh"><img src="actions/sa-captcha/img/re.png" alt="حروف امنیتی"></a>
                            </span>
                            <div class="form-group">
                                <input class="form-control" id="sa-captchaText" name="sa-captchaText" placeholder="حروف امنیتی" type="text">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">ورود</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script src="assets/metisMenu.min.js"></script>
<script src="assets/main.min.js"></script>
</body>
</html>
