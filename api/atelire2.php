<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>EX1</h1>
    <form action="atelire2.php" mehtod="post">
        cin : <input type="text" name="cin">
        nom : <input type="text" name="nom">
        prenom : <input type="text" name="prenom">
        <input type="submet" value="submet" name="action1">
    </form>
    <?php
    if(!empty($_POST['action1'])){
        $cin=$_POST['cin'];
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];

        echo("bonjoer $nom $prenom cin: $cin")
    }
    ?>






    <form action="atelire2.php" mehtod="post">
        numéro d inscription : <input type="text" name="cin"> <br>
        nom et prenom : <input type="text" name="nom"> <br>
        <section name="ville">
            <option value="tanger">tanger</option>
            <option value="casa" >casa</option>
            <option value="rabat">rabat</option>
        </section>
        date de naissance : <input type="date"  name="date"><br>
        sexe: <input type="radio"   name="homme"> homme <input type="radio"   name="femme"> femme<br>
        loisirs: <input type="checkbox"  value="lecture" name="loisirs"> lecture <input type="checkbox"  value="sciences" name="loisirs" > sciences <input type="checkbox"  value="sport" name="loisirs"> sport <input type="checkbox"  value="voyage" name="loisirs"> voyage <br>
        <textarea name="Information" id="">Information complémentaires:</textarea>
        <input type="submet" value="submet" name="action2">

    </form>
    <?php
    if(!empty($_POST['action2'])){
        $cin=$_POST['cin'];
        $nom=$_POST['nom'];
        $ville=$_POST['ville'];
        $date=$_POST['date'];
        if($_POST['homme']){
            $sexe=$_POST['homme']
        }
        elseif ($_POST['femme']){
            $sexe=$_POST['femme']

        }
        $s=""
        if(isset($_POST[loisirs])){
            foreach($_POST[loisirs] as $elt){
                $s=$elt +""+$s
            }
        }

        echo("numéro d inscription : $cin , nom et prenom: $nom ,ville: $ville ,  date de naissance : $date ,sexe:$sexe ,loisirs: $s")
        
    }
    ?>
</body>
</html>