<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="functions.php" method="get">
    x: <input type="text" name="col">
    <input type="submet" name="action">
  </form>
    
</body>
</html>
<?php




  // Atelier 1
  function ex2($a){
    
    for($i=1;$i<=$a;$i++){
        for($j=1;$j<=$i;$j++){
           
            echo("*");

        }





        echo("</tr>");

    }

}
ex2($_POST['col'])
  

?>