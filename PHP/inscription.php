<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="./CSS/Styles.css" rel="stylesheet">
    <script type="text/javascript" src="../JQuery/JQuery 3.5.1.js"></script>
    <script type="text/javascript" src="../JS/Fonctions.js"></script>
    <script type="text/javascript" src="../JQuery/Chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: #f6f7ff">
    <div class="card text-center col-6 offset-3 mt-5">
        <h5 class="card-header">Pour vous inscrire :</h5>
        <div class="card-body d-flex justify-content-center">
            <table>
                <tr>
                    <td></td>
                    <td>
                        <label>Votre nom</label><br />
                        <input type="text" id="txtNom"><br /><br/>
                        <label>Votre login</label><br />
                        <input type="text" id="txtLogin"><br /><br/>
                        <label>Votre mot de passe</label><br />
                        <input type="text" id="txtMdp"><br /><br/>
                        <button class="btn btn-primary" type="submit" name="btnEnvoyer" onclick="CreerUtilisateur()">S'inscrire</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>