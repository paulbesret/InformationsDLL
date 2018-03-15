<?php
error_reporting(E_ERROR | E_PARSE);
$dir_nom = 'ResultatsDLL'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichiers= array(); // on déclare le tableau contenant le nom des fichiers
$host = 'DS_DEV_APP_S';
$user = 'paul';
$password = 'paulpaul';
$link = sybase_connect($host, $user, $password);
// Debut boucle lecture nom de fichier
while($element = readdir($dir)) {
	if($element != '.' && $element != '..') {
		if (!is_dir($dir_nom.'/'.$element)) {
			$fichiers[] = $element;
		}
	}
}
foreach ($fichiers as $fichier) {
$handle = @fopen("ResultatsDLL/".$fichier, "r");
$basename = basename("ResultatsDLL/".$fichier, ".csv");
$infodepot = explode("_", $basename);
	// Traitement d'un fichier
	if ($handle) {
	// Il faut supprimer la premiere ligne du fichier
	$premligne = true;
	$sqldepot = sybase_query("DELETE FROM PAULDB..ContenuInfoDLL WHERE Depot='$infodepot[1]' AND Editeur='$infodepot[2]'", $link);
	while (($buffer = fgets($handle)) !== false) {
		if ($premligne == false) {
			$ligne = array_map('trim', explode(";" , $buffer));
			$ligne[1] = str_replace("'", "''", $ligne[1]);
			$ligne[6] = str_replace("'", "''", $ligne[6]);
			$sql = "INSERT INTO PAULDB..ContenuInfoDLL VALUES('$ligne[0]', '$ligne[1]', '$ligne[2]', '$ligne[3]', '$ligne[4]', '$ligne[5]', '$ligne[6]', '$ligne[8]', '$ligne[9]', '$ligne[10]', '$infodepot[1]', '$infodepot[2]')";
			$query = sybase_query($sql, $link);
			if ($query==false)
				print $sql."\r\n";
			}
		else {
			$premligne = false;
			}
		}
	}
}
closedir($dir);
sybase_close($link);
?>