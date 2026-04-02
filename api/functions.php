<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php




  // Atelier 1
  function ex1($l,$c){
    echo("<table border='1'>");
    //Boucle des lignes
    for($i=1;$i<=$l;$i++){
        echo("<tr>");
        //Boucle des colonnes
        for($j=1;$j<=$c;$j++){
            $v=$i*$j;
            echo("<td>$v</td>");

        }





        echo("</tr>");

    }
    ex2(5)


?>
</body>
</html>