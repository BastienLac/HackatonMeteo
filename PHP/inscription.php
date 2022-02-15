<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="./CSS/Styles.css" rel="stylesheet">
    <script type="text/javascript" src="../JQuery/JQuery 3.5.1.js"></script>
    <script type="text/javascript" src="../JS/Fonctions.js"></script>
    <script type="text/javascript" src="../JQuery/Chart.js"></script>
</head>
<body>
        <h1>Pour vous inscrire :</h1>
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
                        <input style="width: 180px" type="submit" value="S'inscrire" name="btnEnvoyer" onclick="CreerUtilisateur()">
                    </td>
                </tr>
            </table>
</body>
</html>