<!DOCTYPE HTML>
<html>
<head>
    <title>List computers on soft</title>
</head>

<body>
    <?php
    include "connect_to_bd.php";
     
    $soft = $_GET['soft'];
    $sqlSelect = $dbh->prepare(
    "SELECT * FROM computer 
        inner join computer_software  
            on ID_Computer = FID_Computer 
        inner join software
            on FID_Software = ID_Software   WHERE software.name=:soft"
    );
    
    $sqlSelect->execute(array(':soft' => $soft));
    
    echo "<table border ='1'>";
    echo "<tr><th>Netname</th><th>Motherboard</th><th>RAM_capacity</th><th>HDD_capacity</th><th>Monitor</th><th>Vendor</th><th>Guarantee</th></tr>";
    while ($cell = $sqlSelect->fetch()) {
        $Netname = $cell['netname'];
        $Motherboard = $cell['motherboard'];
        $RAM_capacity = $cell['RAM_capacity'];
        $HDD_capacity = $cell['HDD_capacity'];
        $Monitor = $cell['monitor'];
        $Vendor = $cell['vendor'];
        $Guarantee = $cell['guarantee'];
        echo "<tr><td>$Netname</td><td>$Motherboard</td><td>$RAM_capacity</td><td>$HDD_capacity</td><td>$Monitor</td><td>$Vendor</td><td>$Guarantee</td></tr>";
    }

    ?>
</body>
<html>