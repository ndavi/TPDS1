<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Feuilles de style -->
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="nuitscroixrousse.css">

    <!-- Titre -->
    <title>Les Nuits de la Croix Rousse</title>
</head>
<body>         
    <div class="container">
        <!-- Barre de navigation en haut de la page -->
        <div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Partie de la barre toujours affichée -->
                <div class="navbar-header">
                    <!-- Bouton affiché à droite si la zone d'affichage est trop petite -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Activer la navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Lien de retour à la page d'accueil -->
                    <a class="navbar-brand" href="">Les Nuits de la Croix Rousse</a>
                </div>
                <!-- Partie de la barre masquée en fonction de la zone d'affichage -->
                <div class="collapse navbar-collapse">
                </div>
            </div>
        </div>

        <!-- Partie principale de la page d'accueil -->
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-responsive" id="imgHome" src="images/home.jpg" alt="Image d'accueil"/>
                </div>
                <div class="col-md-7">
                    <div class="page-header">
                        <h1>Les Nuits de la Croix-Rousse <br><small>La nuit est notre moment</small></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="lib/jquery/jquery-1.11.1.min.js"></script>
    <!-- Plugin JavaScript Boostrap -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
