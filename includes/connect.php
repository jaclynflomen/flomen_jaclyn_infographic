<?php
$host = "localhost";
$user = "root";
$password = "root";
$db = "db_infographic";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    echo "something broke... connection isn't working";
    exit;
}

//echo "connected!";
//comment ^ out once seeing that it works


//get one item from database
if (isset($_GET["region_nameNo"])) {
    $country = $_GET["region_nameNo"];

    $myQuery = "SELECT * FROM tbl_education WHERE region_nameNo='$country'";

    $result = mysqli_query($conn, $myQuery);
    $rows = array ();

    //fill the array with the result set and send it to the browser
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
}
}

//encode the result and send it back
echo json_encode($rows);


?>
