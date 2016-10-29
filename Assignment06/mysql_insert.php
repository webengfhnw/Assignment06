<?PHP
include('db_conf.php');
$link = mysqli_connect("localhost", $user, $password);
mysqli_select_db($link, $database);

$field1 = mysqli_real_escape_string($link, $_POST['lastName']);
$field2 = $_POST["firstName"];
$field3 = $_POST['street'];
$field4 = $_POST['PLZ'];
$field5 = $_POST['place'];

$insert = "INSERT INTO address (Address_Nr, LastName, FirstName, Street, ZIP, Place) 
values ('', '$field1', '$field2', '$field3', '$field4', '$field5')";
$db = mysqli_query($link, $insert) or die(mysqli_error($link));

$query = "SELECT Address_Nr FROM address ORDER BY Address_Nr DESC LIMIT 1";
$pointer = mysqli_query($link, $query) or die(mysqli_error($link));
$data = mysqli_fetch_array($pointer);
$address_nr = $data['Address_Nr'];
if (isset($_POST['e-mail'])) {
    $insert = "INSERT INTO jointable (Address_Nr, Information_Nr) 
values ('$address_nr', '1')";
    $db = mysqli_query($link, $insert) or die(mysqli_error($link));
}
if (isset($_POST['newsletter'])) {
    $insert = "INSERT INTO jointable (Address_Nr, Information_Nr) 
values ('$address_nr', '2')";
    $db = mysqli_query($link, $insert) or die(mysqli_error($link));
}
if (isset($_POST['fax'])) {
    $insert = "INSERT INTO jointable (Address_Nr, Information_Nr) 
values ('$address_nr', '3')";
    $db = mysqli_query($link, $insert) or die(mysqli_error($link));
}
if (isset($_POST['brief'])) {
    $insert = "INSERT INTO jointable (Address_Nr, Information_Nr) 
values ('$address_nr', '4')";
    $db = mysqli_query($link, $insert) or die(mysqli_error($link));
}
mysqli_close($link);
echo "<h1>Data has been recorded</h1><br/>\n";
echo "<h1>Thanks!</h1><br/>\n";