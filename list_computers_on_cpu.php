<!DOCTYPE HTML>
<html>
<head>
    <title>List computers on cpu</title>
</head>

<body>
    <?php
    include "connect_to_bd.php";
    if(isset($_GET['comp_cpu']))
    {
     
    
    $comp_cpu = $_GET['comp_cpu'];
    $sqlSelect = $dbh->prepare(
    "SELECT * FROM computer inner join processor on FID_Processor = ID_Pocessor 
        WHERE processor.name=:comp_cpu"
    );
    
    $sqlSelect->execute(array(':comp_cpu' => $comp_cpu));
    
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
}
    ?>
</body>
<html>