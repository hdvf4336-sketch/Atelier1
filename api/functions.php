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









    echo("</table>");


  }


?>