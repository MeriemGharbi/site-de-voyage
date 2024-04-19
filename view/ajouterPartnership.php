<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Add Agency</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="title">ADD AGENCY</h2>
            
            <form class="form" method="POST" name="inscription" id="formulaire">
                <div class="form-group">
                    <input placeholder="" type="number" name="id" class="form-control" required>
                    <label>Agency ID</label>
                    <div id="id"></div>
                </div>
                <div class="form-group">
                    <input placeholder="" type="text" name="nom" class="form-control" required>
                    <label>Agency Name</label>
                    <div id="nom"></div>
                </div>
                <div class="form-group">
                    <input placeholder="" type="text" name="adresse" class="form-control" required>
                    <label>Agency Address</label>
                    <div id="adresse"></div>
                </div>
                <div class="flex">
                    <div class="form-group flex-item">
                        <input placeholder="" type="date" name="startdate" class="form-control">
                        <label>Partnership Start Date</label>
                        <div id="startdate"></div>
                    </div>
                    <div class="form-group flex-item">
                        <input placeholder="" type="date" name="enddate" class="form-control">
                        <label>Partnership End Date</label>
                        <div id="enddate"></div>
                    </div>
                </div>
                <div class="flex">
                    <div class="form-group flex-item">
                        <input placeholder="" type="email" name="email" class="form-control">
                        <label>Email</label>
                        <div id="email"></div>
                    </div>
                    <div class="form-group flex-item">
                        <input placeholder="" type="number" name="phone" class="form-control">
                        <label>Phone</label>
                        <div id="phone"></div>
                    </div>
                </div>
                <div class="form-group">
                    <input placeholder="" type="text" name="Pstatus" class="form-control">
                    <label>Partnership Status</label>
                    <div id="Pstatus"></div>
                </div>
                <div class="form-group">
                    <input placeholder="" type="text" name="typevehicules" class="form-control">
                    <label>Type Vehicles Available</label>
                    <div id="typevehicules"></div>
                </div>
                <button type="submit" name="ajouter" value="ajouter" class="btn btn-success">Submit</button>
                <a href="afficherPartnership.php" class="btn btn-primary">Back</a>
            </form>
        </div>
    </div>

    <script src="../User_js/Ajout_User.js"></script>
    <script src="../User_js/email.js"></script>
    <script src="../Partnership_js/ajouterPartnership.js"></script>

</body>
</html>

<?PHP
if (isset($_POST['ajouter']))
{
    include "../Controller/PartnershipC.php";
            
    $Partnership = new Partnership($_POST['id'], $_POST['nom'], $_POST['adresse'], $_POST['email'], $_POST['phone'], $_POST['startdate'], $_POST['enddate'], $_POST['Pstatus'], $_POST['typevehicules']);
    $PartnershipC = new PartnershipC();

    $conn = config::getConnexion();
    try {
        $requette = $conn->prepare("SELECT * FROM partnership_tab where email=:email");
        $requette->bindParam(':email', $_POST["email"]);
        $requette->execute();
        $count1 = $requette->rowCount();

        $query = $conn->prepare("SELECT * FROM partnership_tab where id=:id");
        $query->bindParam(':id', $_POST["id"]);
        $query->execute();
        $count = $query->rowCount();

        $query2 = $conn->prepare("SELECT * FROM partnership_tab where phone=:phone");
        $query2->bindParam(':phone', $_POST["phone"]);
        $query2->execute();
        $count2 = $query2->rowCount();

        if ($count > 0) {
            echo '<script>alert("Agency ID existe déjà!!");</script>';
        } elseif ($count1 > 0) {
            echo '<script>alert("Email existe déjà!!");</script>';
        } elseif ($count2 > 0) {
            echo '<script>alert("Phone Number existe déjà!!");</script>';
        } else {
            $PartnershipC->ajouterPartnership($Partnership);
            header('Location: afficherPartnership.php');
        }
    } catch (PDOException $e) {
        echo 'echec de connexion:' . $e->getMessage();
    }
}
?>
