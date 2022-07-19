<?php
    include('connect_to_bd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab1</title>
    <link href="stl.css" rel="stylesheet" type="text/css">
</head>

<div class="wrapper">
       <form action="list_computers_on_cpu.php" method="GET">
           <select name="comp_cpu">
            <?php
                $sqlSelect = "SELECT * FROM processor";
                foreach($dbh->query($sqlSelect) as $cell){
                    echo "<option>";
                    print_r($cell['name']);
                    echo "</option>";
                }    
            ?>
           </select>
        <input class="button btn" type="submit" value="Get information">
       </form>

       <form action="list_computers_on_soft.php" method="GET">
           <select name="soft">
           <?php
                $sqlSelect = "SELECT * FROM software";
                foreach($dbh->query($sqlSelect) as $cell){
                    echo "<option>";
                    print_r($cell['name']);
                    echo "</option>";
                }    
            ?>
           </select>
           <input class="button btn" type="submit" value="Get information">
       </form>

       <form action="out_of_warranty.php" method="get">
           <input hidden name="warranty">
           <input class="button btn"  type="submit" value="Get computers out of warranty">
       </form> 

   </div>
<br>

</html>

