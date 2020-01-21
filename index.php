<?php
include './app.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
    <title>Simulateur prêt</title>
</head>
<body>
    
    <h1>Calculez votre mensualité</h1>
    
    <form action="" method="get">
        <fieldset>
        <table>
            <tr>
                <td><label for="capital">Capital emprunté :</label></td>
                <td><input type="number" id="capital" name="capital" required min="1" max="999999999" step="1"></td>
            </tr>
            <tr>
                    <td><label for="taux">Taux d'emprunt (annuel) :</label></td>
                    <td><input type="number" id="taux" name="taux" required min="0.01" max="100" step="0.01"> %</td>
            </tr>
            <tr>
                <td><label for="duree">Durée en mois :</label></td>
                <td><input type="number" id="duree" name="duree" required min="1" max="600" step="1"></td>
            </tr>
            <tr>
                <td><label for="dureeA">Durée en année :</label></td>
                <td> <select name="dureeA" id="">Durée en année :
                        <option selected disabled>Choisir</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        </select>
                </td>
            </tr>
            <tr>
                <td><label for="assurance">Taux assurance (facultatif) :</label></td>
                <td><input type="number" id="assurance" name="assurance" min="0.01" max="100" step="0.01">%</td>
            </tr>
            <tr>
                <td colspan="2" id="boutonValider"><button type="submit">Calculer</button></td>
            </tr>
            </table>
        </fieldset>
    </form>

<?php
if (!empty($_GET))
{ ?>
    <p>Le montant de votre mensualité hors assurance s'élève à <strong><?= mensualiteHA($_GET['capital'], $_GET['taux'], $_GET['duree']); ?>€</strong>. </p>
    <p>Le montant de votre mensualité assurance comprise s'élève à <strong><?= mensualiteAC($_GET['capital'], $_GET['taux'], $_GET['duree'], $_GET['assurance']); ?>€</strong>, dont <?php echo mensualiteAC($_GET['capital'], $_GET['taux'], $_GET['duree'], $_GET['assurance']) - mensualiteHA($_GET['capital'], $_GET['taux'], $_GET['duree']); ?>€ d'assurance. </p>
    <p>Le coût total de votre crédit hors assurance s'élève à <strong><?= calculInteretsHA($_GET['capital'], $_GET['taux'], $_GET['duree']); ?>€</strong>. </p>
    <p>Le coût total de votre crédit assurance comprise s'élève à <strong><?= calculInteretsAC($_GET['capital'], $_GET['taux'], $_GET['duree'], $_GET['assurance']); ?>€</strong>, dont <?php echo calculInteretsAC($_GET['capital'], $_GET['taux'], $_GET['duree'], $_GET['assurance']) - calculInteretsHA($_GET['capital'], $_GET['taux'], $_GET['duree']); ?>€ d'assurance. </p>
<?php
} else {

}
?>

</body>
</html>