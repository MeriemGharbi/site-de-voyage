<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?PHP
include "../Controller/PartnershipC.php";

if (isset($_GET['id']))
{
    $PartnershipC=new PartnershipC();
    $result=$PartnershipC->recupererPartnership($_GET['id']);
    foreach($result as $row)
    {
        $Agency_ID=$row['id'];
        $Agency_Name=$row['nom'];
        $address=$row['adresse'];
        $Agency_Email=$row['email'];
        $Agency_phone=$row['phone'];
        $Partnership_Start_Date=$row['startdate'];
        $Partnership_End_Date=$row['enddate'];
        $Partnership_Status=$row['Pstatus'];
        $Type_Vehicles_Available=$row['typevehicles'];
?>
    <a href="afficherPartnership.php" class="btn btn-primary">Back</a>
    <div class="container">
        <div class="form-container">
            <form class="form" method="POST">
                <p class="title">Update Partnership </p>
                <div class="flex">
                    <div class="form-group flex-item">
                        <input type="number" name="id" value="<?PHP echo $Agency_ID ?>" required>
                        <label>Agency ID</label>
                    </div>
                    <div class="form-group flex-item">
                        <input type="text" name="nom" value="<?PHP echo $Agency_Name ?>" required>
                        <label>Name</label>
                    </div>
                </div>
                <div class="flex">
                    <div class="form-group flex-item">
                        <input type="text" name="adresse" value="<?PHP echo $address ?>" required>
                        <label>Address</label>
                    </div>
                    <div class="form-group flex-item">
                        <input type="date" name="startdate" value="<?PHP echo $Partnership_Start_Date ?>" required>
                        <label>Partnership Start Date</label>
                    </div>
                    <div class="form-group flex-item">
                        <input type="date" name="enddate" value="<?PHP echo $Partnership_End_Date ?>" required>
                        <label>Partnership End Date</label>
                    </div>
                </div>
                <div class="flex">
                    <div class="form-group flex-item">
                        <input type="email" name="email" value="<?PHP echo $Agency_Email ?>" required>
                        <label>Email</label>
                    </div>
                    <div class="form-group flex-item">
                        <input type="number" name="phone" value="<?PHP echo $Agency_phone ?>" required>
                        <label>Phone</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="Pstatus" value="<?PHP echo $Partnership_Status ?>" required>
                    <label>Partnership status</label>
                </div>
                <div class="form-group">
                    <input type="text" name="typevehicules" value="<?PHP echo $Type_Vehicles_Available ?>" required>
                    <label>Type vehicles available</label>
                </div>
                <div class="form-group">
                    <button type="submit" name="modifier" value="modifier" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
<?PHP
    }
}
if (isset($_POST['modifier'])){
    $Partnership=new Partnership($_POST['id'],$_POST['nom'],$_POST['adresse'],$_POST['email'],$_POST['phone'],$_POST['startdate'],$_POST['enddate'],$_POST['Pstatus'],$_POST['typevehicules']);
    $PartnershipC->modifierPartnership($Partnership,$_POST['id']);
    header('Location: afficherPartnership.php');
}
?>
</body>
</html>
