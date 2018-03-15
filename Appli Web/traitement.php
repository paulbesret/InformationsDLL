<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Informations DLL</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="ico/favicon.ico" type="image/x-icon">
    </head>
    <body>
<?php
error_reporting(E_ERROR | E_PARSE);
$host = 'DS_DEV_APP_S';
$user = 'paul';
$password = 'paulpaul';
$link = sybase_connect($host, $user, $password);
$Editeur = $_POST['Editeur'];
$Depot = $_POST['Depot'];
$reponse = sybase_query("SELECT * FROM PAULDB..ContenuInfoDLL WHERE Depot='$Depot' AND Editeur='$Editeur'", $link);
?>
	<div class="panel panel-primary">
  <!-- Default panel contents -->
		<div class="panel-heading">
		<center><span class="badge">
		<?php echo "Information DLL du dépot ".$Editeur.$Depot;?>
		</span></center>
		</div>
        <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>chemin_du_composant</th>
                    <th>Description</th>
                    <th>Version</th>
                    <th>Commentaire</th>
                    <th>Entreprise</th>
                    <th>Copyright</th>
                    <th>Informations</th>
					<th>Nom_interne</th>
                    <th>Nom_origine</th>
                    <th>Nom_produit</th>
                    <th>Depot</th>
                    <th>Editeur</th>
                </tr>
            <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
            while($donnees = sybase_fetch_array($reponse))
            {
            ?>
                <tr>
                    <td><?php echo $donnees['chemin_du_composant'];?></td>
                    <td><?php echo $donnees['Description'];?></td>
                    <td><?php echo $donnees['Version'];?></td>
                    <td><?php echo $donnees['Commentaire'];?></td>
                    <td><?php echo $donnees['Entreprise'];?></td>
                    <td><?php echo $donnees['Copyright'];?></td>
                    <td><?php echo $donnees['Informations'];?></td>
					<td><?php echo $donnees['Nom_interne'];?></td>
                    <td><?php echo $donnees['Nom_origine'];?></td>
                    <td><?php echo $donnees['Nom_produit'];?></td>
                    <td><?php echo $donnees['Depot'];?></td>
                    <td><?php echo $donnees['Editeur'];?></td>
                </tr>
            <?php
            } //fin de la boucle, le tableau contient toute la BDD
            sybase_close(); //deconnection de sybase
            ?>
        </table>
		</div>
    </body>
</html>