function VerifierConnexion()
{
    $.ajax
    (
        {
            type:"GET",
            url:"PHP/VerifierConnexion.php",
            data:"login="+txtLogin.value+"&mdp="+txtMdp.value,
            success: function(data)
            {
                if(data == "0")
                    alert("Identifiants Incorrects")
                else{
                    location.href='PHP/main.php';
                }
            },
            error: function()
            {
                alert("Erreur appel des utilisateurs");
            }
        }
    )
}
function CreerUtilisateur()
{
    $.ajax
    (
        {
            type:"POST",
            url:"CreerUtilisateur.php",
            data:"nom="+txtNom.value+"&login="+txtLogin.value+"&mdp="+txtMdp.value,
            success: function(data)
            {
                if(data == "0")
                    alert("Un compte avec les même identifiants existe déjà")
                else{
                    alert("Votre compte a bien été créé")
                    location.href='../index.php';
                }
            },
            error: function()
            {
                alert("Erreur appel de la création");
            }
        }
    )
}