<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script type=\"text/javascript\" src=\"js/bootstrap.min.js\"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="ico/favicon.ico">
    <title>Informations DLL</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <form method="post" action="traitement.php" class="form-signin" role="form">
        <img src="img/information-64.png" class="img-rounded"><h2 class="form-signin-heading">Informations DLL</h2>
		
        <input type="text" class="form-control" placeholder="Depot" name="Depot" required autofocus><br />
       <select class="form-control" name="Editeur" id="Editeur">
           <option value="OFD">OFD</option>
		   <option value="SOD">SOD</option>
		   <option value="UND">UND</option>
       </select><br />
		<button type="submit" class="btn btn-lg btn-primary btn-block">Envoyer
		<i class="glyphicon glyphicon-chevron-right"></i></button>
      </form>
	  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
		Liste des dépots <i class="glyphicon glyphicon-search"></i>
		</button>
	</div>
	<!-- Modal -->
<div class="modal bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 id="myModalLabel" style="color: black;">Liste des dépots</h4>
      </div>
      <div class="modal-body">
		<?php include ("table-depot.php"); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap-modal.js"></script>
<script src="js/docs.min.js"></script>
 </body>
</html>