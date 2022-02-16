<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./CSS/Styles.css" rel="stylesheet">
    <script type="text/javascript" src="./JQuery/JQuery 3.5.1.js"></script>
    <script type="text/javascript" src="./JS/fonctions.js"></script>
    <script type="text/javascript" src="./JQuery/Chart.js"></script>
    <script src="./Bootstrap/js/bootbox.min.js"></script>
    <script src="./Bootstrap/js/bootstrap.min.js"></script>
    <script src="./Bootstrap/js/bootstrap.js"></script>
    <link href="./Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./Bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color: #f6f7ff">
    <div class="card text-center col-6 offset-3 mt-5">
        <h5 class="card-header">Bienvenue, veuillez vous connecter</h5>
        <div class="card-body">
            <label>Login</label><br />
            <input type="text" id="txtLogin"><br /><br/>
            <label>Mot de passe</label><br />
            <input type="text" id="txtMdp"><br /><br/>
            <input class="btn btn-primary" style="width: 180px" type="submit" value="Envoyer" name="btnEnvoyer" onclick="VerifierConnexion()">
            <br>
            Pas de compte?<a href="PHP/inscription.php">S'inscrire</a> 
        </div>
    </div>       
</body>
</html>