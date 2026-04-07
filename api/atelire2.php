<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>EX1</h1>

<form action="" method="post">
    cin : <input type="text" name="cin">
    nom : <input type="text" name="nom">
    prenom : <input type="text" name="prenom">
    <input type="submit" value="submit" name="action1">
</form>

<?php
if(!empty($_POST['action1'])){
    $cin=$_POST['cin'];
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];

    echo("bonjour $nom $prenom cin: $cin");
}
?>

<hr>

<form action="" method="post">
    numéro d inscription : <input type="text" name="cin"> <br>
    nom et prenom : <input type="text" name="nom"> <br>


    <select name="ville">
        <option value="tanger">tanger</option>
        <option value="casa">casa</option>
        <option value="rabat">rabat</option>
    </select><br>

    date de naissance : <input type="date" name="date"><br>

   
    sexe: <input type="radio" name="sexe" value="homme"> homme <input type="radio" name="sexe" value="femme"> femme<br>


    loisirs: <input type="checkbox" value="lecture" name="loisirs[] "> lecture <input type="checkbox" value="sciences" name="loisirs[]"> sciences <input type="checkbox" value="sport" name="loisirs[]"> sport <input type="checkbox" value="voyage" name="loisirs[]"> voyage <br>
    

    <textarea name="Information">Information complémentaires:</textarea>

    <input type="submit" value="submit" name="action2">
</form>

<?php
if(!empty($_POST['action2'])){
    $cin=$_POST['cin'];
    $nom=$_POST['nom'];
    $ville=$_POST['ville'];
    $date=$_POST['date'];
    $sexe=$_POST['sexe'];
    $info=$_POST['Information']


    if(isset($_POST['loisirs'])){
        foreach($_POST['loisirs'] as $elt){
            
        }
    }


    echo("<table>");

        echo("<tr>");
           echo("<td>numéro d inscription</td>");
           echo("<td>$cin</td>");
        echo("</tr>");

        echo("<tr>");
           echo("<td>nom et prenom</td>");
           echo("<td>$nom</td>");
        echo("</tr>");

        echo("<tr>");
           echo("<td>ville</td>");
           echo("<td>$ville</td>");
        echo("</tr>");

        echo("<tr>");
           echo("<td>date de naissance</td>");
           echo("<td>$date</td>");
        echo("</tr>");

        echo("<tr>");
           echo("<td>sexe</td>");
           echo("<td>$sexe</td>");
        echo("</tr>");

        echo("<tr>");
           echo("<td>loisirs</td>");
           echo("<td>");
               echo("<ul>");
                    if(isset($_POST['loisirs'])){
                    foreach($_POST['loisirs'] as $elt){
                        
                        }
                    }
                    echo("<li>$elt</li>")

               echo("</ul>");
           echo("</td>");
        echo("</tr>");

        echo("<tr>");
           echo("<td>Information complémentaires</td>");
           echo("<td>$info</td>");
        echo("</tr>");



        









        



    echo("</table>");


}
?>

</body>
</html>