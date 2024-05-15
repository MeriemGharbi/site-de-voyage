<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        table {
			border-collapse: collapse;
            color: #404040;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            }
        th {
			font-size: 16px;
            border-bottom: 3px solid #ffcb61;
            padding: 10px 20px; /* Ajustement de l'espacement */
            font-weight: 500;
            width: 200px;
           }
        td {
           font-weight: 500;
           padding: 5px 30px;
           font-size: 14px;
           text-align: center;

            }
        img {
             height: 25px;
   
            }
        tr:nth-child(2n){
            background-color: #f6f8f8;
        }
        tr:nth-child(2n) td {
            border-bottom: 1px solid #e0e0e0;
            border-top:  1px solid #e0e0e0;
        }
		.Btn_add {
    width: fit-content;
    margin-bottom:20px;
    background-color: #1a2bc6;
    padding: 5px 20px;
    color: #fff;
    display: flex;
    align-items: center;
    text-align: 0;
    border-radius: 6px;
    text-decoration: 0;
	position: absolute;
            left: 15%;
            top: 15%;
            transform: translate(-15%, -15%);
}
    </style>
</head>
<body>
<?PHP
include "../Controller/UserC.php";
$UserC=new UserC();
$listecommande=$UserC->afficherUser();
?>
<h6 style="font-family: Arial, sans-serif; font-size: 30px; color: #333; text-align: center; margin-bottom: 20px;">User List</h6>
<a href = "ajouterUser.php" class="Btn_add">Add</a>
<table border="1">
<tr>
<td>cin</td>
<td>nom</td>
<td>prenom</td>
<td>Date DE Naissance</td>
<td>Email</td>
<td>phone</td>
<td>Modifier</td>
<td>Supprimer</td>
</tr>

<?PHP
foreach($listecommande as $row){
	?>
	<tr>
	<td><?PHP echo $row['cin']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['d_n']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
    <td><?PHP echo $row['phone']; ?></td>
	<td><a href="modifierUser.php?cin=<?PHP echo $row['cin']; ?>" class="btn btn-success">Modifier</a></td>
    <td><a href="supprimerUser.php?cin=<?PHP echo $row['cin']; ?>"  class="btn btn-danger">Supprimer</a></td>
	</tr>
	<?PHP
}
?>
</table>
</body>
</HTMl>



