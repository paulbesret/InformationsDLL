<?php
// Affectation de l'intégralité du fichier table.txt dans le tableau $Contacts
$Contacts = file("list.txt");
echo "<table class=\"table table-bordered table-hover table-striped\"><tr class=\"info\"><th style=\"color:black;\"><center>Dépot</center></th><th style=\"color:black;\"><center>Editeur</center></th></tr>";
// Création d'une boucle qui extrait et affiche le contenu
for ($i=0;$i<count($donnee);$i++)
{ // extraction de la ligne courante du tableau $Contacts
$donnee = explode(" ",$donnee[$i]);
// Affichage de la ligne extraite
echo "<tr><td style=\"color:black;\">$donnee[1]</td><td style=\"color:black;\">$donnee[2]</td></tr>"; } 
echo "</table>"; 
?>