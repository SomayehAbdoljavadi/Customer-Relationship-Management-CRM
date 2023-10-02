<form action="actions/add_strategy.php" method="post">
    <input type="hidden" value="1" id="numrows" name="rows" />
    <div >
        <div class="form-group col-lg-8"></div>
        <div class="form-group col-lg-4">
            <label>عنوان استراتژی</label>
            <input class="form-control" title="" name="title" required="" id="contact-family" tabindex="2" />
        </div>
    </div>
    <div id="rows">
        <div class="form-group col-lg-1">
            <br>
            <button class="btn btn-primary" onclick="addRow()"> + </button>
<!--            <button class="btn btn-primary" onclick="alert($(this).attr('id'));removeRow();" id="hide"> - </button>-->
        </div>

        <div class="form-group col-lg-1">
            <label>سال</label>
            <select title="" class="form-control" required="" name="year" tabindex="6">
                <?php for($i=0;$i<11;$i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?> + </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-lg-1">
            <label>ماه</label>
            <select title="" class="form-control" required="" name="month" tabindex="6">
                <?php for($i=0;$i<13;$i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?> + </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-lg-1">
            <label>روز</label>
            <select title="" class="form-control" required="" name="day" tabindex="6">
                <?php for($i=0;$i<31;$i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?> + </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-lg-1">
            <label>ساعت</label>
            <select class="form-control" required="" title="" name="hours" tabindex="6">
                <?php for($i=0;$i<24;$i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?> + </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-lg-7">
            <label>متن پیام</label>
            <input class="form-control" required="" name="message" title="" tabindex="2" />
        </div>

    </div>
    <div id="row2">

    </div>
    <div >
        <div class="form-group col-lg-8"></div>
        <div class="form-group col-lg-4">
            <button type="submit" class="btn btn-primary"> ذخیره </button>
            &nbsp;
            &nbsp;
            &nbsp;
            <a href="javascript:void(0);" onclick="$('#newStrategy').load('pages/ajax/new_strategy.php');" class="btn btn-default"> انصراف </a>
        </div>
    </div>
</form>
<script>
    function addRow() {
        var rows = parseInt($('#numrows').val()) + 1;
        $('#numrows').val(rows);
        var row = $('#rows').html();
        row = row.replace("year", "year"+rows);
        row = row.replace("month", "month"+rows);
        row = row.replace("day", "day"+rows);
        row = row.replace("hours", "hours"+rows);
        row = row.replace("message", "message"+rows);
        row = row.replace("hide", "hide"+rows);
        var row2 = $('#row2').html();
        $('#row2').html(row2+row);
    }
    function removeRow(id) {
        var rows = parseInt($('#numrows').val()) - 1;
        $('#numrows').val(rows);
        var row = $('#rows').html();
        row = row.replace("year", "year"+rows);
        row = row.replace("month", "month"+rows);
        row = row.replace("day", "day"+rows);
        row = row.replace("hours", "hours"+rows);
        row = row.replace("message", "message"+rows);
        row = row.replace("hide", "hide"+rows);
        var row2 = $('#row2').html();
        $('#row2').html(row2-row);
    }
</script>
<style>
    .btn {
        padding: .45rem 1.13rem !important;
    }
</style>