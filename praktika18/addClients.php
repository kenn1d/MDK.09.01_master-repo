<?php 
    $db_server = mysqli_connect('localhost', 'root', '', 'traveles') or die (mysqli_connect_error());
    mysqli_set_charset($db_server, 'utf-8');

    if (isset($_POST["add"]) and 
        isset($_POST["fullName"]) and 
        isset($_POST["passportRu"]) and 
        isset($_POST["passportInt"]) and 
        isset($_POST["telNumber"]) and 
        isset($_POST["visa"]) and
        isset($_POST["date"])) {
            $fullName = $_POST["fullName"];
            $passportRu = $_POST["passportRu"];
            $passportInt = $_POST["passportInt"];
            $telNumber = $_POST["telNumber"];
            $visa = $_POST["visa"];
            $date = $_POST["date"];

            $query = "INSERT INTO Clients VALUES " . "('$fullName', '$passportRu', '$passportInt', '$telNumber', '$visa', '$date')";

            $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
    } 

?>

<form action="" method="post">
    <input type="text" name="fullName" placeholder="fullName">
    <input type="text" name="passportRu" placeholder="passportRu">
    <input type="text" name="passportInt" placeholder="passportInt">
    <input type="text" name="telNumber" placeholder="telNumber">
    <input type="text" name="visa" placeholder="visa">
    <input type="text" name="date" placeholder="date">
    <input type="submit" name="add">
</form>

<?php 
    $query = "SELECT * FROM Clients";
    $result = mysqli_query($db_server, $query);
    if(!$result) die ("Сбок при доступе к БД: " . mysqli_error($db_server));

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<p>".$row['fullName']."</p>".
            "<p>".$row['passportRu']."</p>".
            "<p>".$row['passportInt']."</p>".
            "<p>".$row['telNumber']."</p>".
            "<p>".$row['visa']."</p>".
            "<p>".$row['date']."</p>".
            "<form action='' method=''>
                <input type='hidden' name='delete' value='yes'>
                <input type='hidden' name='visa' value='{$row['visa']}'>
                <input type='submit' value='DELETE_RECORD'>
            </form>";
        }
    }
?>