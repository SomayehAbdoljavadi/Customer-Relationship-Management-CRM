<?php require_once("actions/jdf.php"); ?>
<!DOCTYPE html>
<html ng-app="scotchApp">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/bootstrap.min.css" />
    <link href="assets/metisMenu.min.css" rel="stylesheet">
    <link href="assets/main.min.css" rel="stylesheet">
    <link href="assets/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/font.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="assets/persian-datepicker-0.4.5.min.css" />
    <link rel="stylesheet" href="assets/daterangepicker.css">
    <link rel="stylesheet" href="assets/bootstrap-datepicker.min.css">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/favicon.png">
    <script src="assets/angular.min.js"></script>
    <script src="assets/angular.min.js"></script>
    <script src="assets/angular-route.js"></script>
    <script src="assets/main.js"></script>
    <script src="assets/script.js"></script>
    <link rel="stylesheet" href="assets/mdb.min.css" rel="stylesheet" >
<!--    <style>-->
<!--        .special-color {-->
<!--            background-color: #37474F !important;-->
<!--        }-->
<!--    </style>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/js/mdb.min.js" type="text/javascript"></script>-->

    <title><?php echo TITLE; ?></title>
</head>
<body  ng-controller="mainController" onload="$('a').removeClass('active');">
<?php
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'backgroundColor'");
$row = mysqli_fetch_array($result);
$backgroundColor = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'headerColor'");
$row = mysqli_fetch_array($result);
$headerColor = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sidebarColor'");
$row = mysqli_fetch_array($result);
$sidebarColor = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'logo'");
$row = mysqli_fetch_array($result);
if(!empty($row['value'])) {
    $logo = $row['value'];
} else {
    $logo = "logo.png";
}
?>
<style type="text/css">
    .navbar-static-top,.panel-heading {
        background-color: <?php echo $headerColor; ?> !important ;
    }
    .sidebar,#wrapper {
        background-color: <?php echo $sidebarColor; ?> !important ;
    }
    #page-wrapper {
        background-color: <?php echo $backgroundColor; ?> !important ;
    }
    .modal-header .close {
        margin-top: -2px;
        background-color: #D9534F !important;
        opacity: 1 !important;
        padding: 3px 3px 0px 3px;
        margin-right: -3px;
        margin-left: 3px;
        margin-top: 1px;
        border-radius: 3px;
        color: #fff !important;
        text-shadow: none !important;
    }
</style>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="modal-body" id="modalText">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top special-color" role="navigation" style="margin-bottom: 0;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand animated fadeInRight" id="headerTime" style="color:#fff"> <?php echo jdate('Y/m/d H:i:s',time()); ?></span>
            <a class="navbar-brand" href="<?php echo URL; ?>" style="color:#fff"> <?php echo TITLE; ?></a>
        </div>
        <div class="nav navbar-header navbar-default navbar-static-top navbar-left special-color">
            <a class="navbar-brand animated fadeInLeft" href="actions/logout.php" style="color:#fff"> خروج </a>
            <span class="navbar-brand animated fadeInRight" href="index.html" style="color:#fff"> <?php echo $_SESSION['user_info']['name']; ?> عزیز خوش آمدید </span>
        </div>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#" id="dashboard_nav" class="active" onclick="$('a').removeClass('active');$(this).addClass('active');">
                            <img src="actions/upload/<?php echo $logo; ?>" width="100%">
                        </a>
                    </li>
                    <li>
                        <a href="#" id="dashboard_nav" class="active" onclick="$('a').removeClass('active');$(this).addClass('active');"><i class="fa fa-dashboard fa-fw"></i> داشبورد</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> مخاطبین <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a onclick="$('a').removeClass('active');$(this).addClass('active');" href="#customers">همه مخاطبین</a>
                            </li>
                            <li>
                                <a onclick="$('a').removeClass('active');$(this).addClass('active');" href="#new_customer">ثبت مخاطب جدید</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    if($_SESSION['user_info']['access'] == 1) {
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-comment fa-fw"></i> پیام ها <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#messages">همه پیام ها</a>
                                </li>
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#new_message">افزودن پیام</a>
                                </li>
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');" href="#tasks">پیام
                                        های منتظر ارسال</a>
                                </li>
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');" href="#sent">پیام
                                        های ارسال شده</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> مناسبت ها <span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#events">همه مناسبت ها</a>
                                </li>
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#new_event">افزودن مناسبت جدید</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> استراتژی های ارسال <span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#strategies">همه استراتژی ها</a>
                                </li>
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#new_strategy">افزودن استراتژی جدید</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> فرآیندهای دستی <span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#custom_message">ارسال دستی</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog fa-fw"></i> تنظیمات <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#configuration">پیکربندی</a>
                                </li>
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#new_admin">مدیران</a>
                                </li>
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#contacts_category">دسته بندی مخاطبین</a>
                                </li>
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#contacts_title">عنوان مخاطبین</a>
                                </li>
                                <li>
                                    <a onclick="$('a').removeClass('active');$(this).addClass('active');"
                                       href="#backup">پشتیبان گیری / بازیابی</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div id="page-wrapper">
        <style>
            .alert {
                display: none;
            }
        </style>
        <div class="alert alert-info alert-dismissable" style="margin-bottom: -24px">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span id="alert-msg">asd</span>
        </div>
        <div ng-view></div>
    </div>
</div>
<span id="ajax_result"></span>
<script src="assets/jquery.min.js"></script>
<script src="assets/daterangepicker.js"></script>
<script src="assets/bootstrap-datepicker.min.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script src="assets/metisMenu.min.js"></script>
<script src="assets/bootstrap-multiselect.js"></script>
<script src="assets/main.min.js"></script>
<script src="assets/jquery.dataTables.min.js"></script>
<script src="assets/dataTables.bootstrap.min.js"></script>
<script src="assets/dataTables.responsive.js"></script>
<script src="assets/persian-date-0.1.8.min.js"></script>
<script src="assets/persian-datepicker-0.4.5.min.js"></script>
<script>
    $(document).ready(function() {
        // new WOW().init();
        $('#contact-category').multiselect();
        $('#dataTables-example').DataTable({
            responsive: true,
            language: {
                search: "جستجو: ",
                lengthMenu: "نمایش _MENU_ سطر",
                info: "نمایش _START_ تا _END_ از _TOTAL_ سطر",
                paginate: {
                    first: "ابتدا",
                    last: "انتها",
                    next: "بعدی",
                    previous: "قبلی"
                },
            }
        });
    });
</script>
</body>
</html>
