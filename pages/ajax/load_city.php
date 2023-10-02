<?php
require_once("../../actions/config.php");
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $result = mysqli_query($con,"SELECT * FROM city WHERE province_id = $id");
    ?>
    <label>شهر</label>
    <select class="form-control" required id="Contactcity" tabindex="8">
        <?php
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?> - <?php echo $row['name']; ?></option>
            <?php
        }
        ?>
    </select>
    <?php
}
?>