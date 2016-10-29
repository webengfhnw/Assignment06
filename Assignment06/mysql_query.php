<html>
<head>
    <title> JOIN Query </title>
</head>
<body>
<?PHP
include('db_conf.php');
echo "<h1>JOIN Query</h1><br/>\n";

$link = mysqli_connect("localhost", $user, $password);
mysqli_select_db($link, $database);

$query = "SELECT address.Address_Nr, FirstName, LastName, Street, ZIP, Place, InformationType  FROM address 
INNER JOIN jointable 
ON address.Address_Nr = jointable.Address_Nr 
INNER JOIN informationtype 
ON jointable.Information_Nr = informationtype.Information_Nr ORDER BY LastName";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

echo "<table border=\"1\">";
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr>";
    foreach ($line as $key => $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
mysqli_close($link);
?>
</body>
</html>
