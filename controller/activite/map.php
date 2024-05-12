 <?php
if(isset($_POST["submit_map"]))
{
    $map = $_POST["map"];
?>
<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $map; ?>&output=embed"></iframe>
<?php }
?>
<form method="POST">
    <p>
        <input type="text" name="map" placeholder="enter address">
    </p>
    <input type="submit" name="submit_map">
</form>
