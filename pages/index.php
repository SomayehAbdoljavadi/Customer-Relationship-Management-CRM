<?php
if(@session_start()) {}
if($_SESSION['user_info']['access'] == 1) {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">داشبورد</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-left">
                            <a href="#/tasks" style="color:#fff">
                                <div class="huge">منتظر ارسال</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-left">
                            <a href="#/sent" style="color:#fff">
                                <div class="huge">ارسال شده</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-left">
                            <a href="#/messages" style="color:#fff">
                                <div class="huge">افزودن پیام</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calendar fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-left">
                            <a href="#/new_event" style="color:#fff">
                                <div class="huge">افزودن مناسبت</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">داشبورد</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4 col-md-6"></div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-left">
                            <a href="#/customers" style="color:#fff">
                                <div class="huge">همه مخاطبین</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-plus fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-left">
                            <a href="#/new_customer" style="color:#fff">
                                <div class="huge">ثبت مخاطب جدید</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>