<?php 
    $db_server = mysqli_connect('localhost', 'root', '', 'publications') or die (mysqli_connect_error());
    mysqli_set_charset($db_server, 'utf-8');

    if (isset($_POST["add"]) and 
        isset($_POST["author"]) and 
        isset($_POST["title"]) and 
        isset($_POST["category"]) and 
        isset($_POST["year"]) and 
        isset($_POST["isbn"])) {
            $author = $_POST["author"];
            $title = $_POST["title"];
            $catrgory = $_POST["catrgory"];
            $year = $_POST["year"];
            $isbn = $_POST["isbn"];

            $query = "INSERT INTO classics VALUES " . "('$author', '$title', '$catgory', '$year', '$isbn')";

            $result = mysqli_query($db_server, $query) or die ("Ошибка в запросе: " . mysqli_error($db_server));
    } 

?>

<form action="" method="post">
    <input type="text" name="author" placeholder="Автор">
    <input type="text" name="title" placeholder="Название">
    <input type="text" name="category" placeholder="Категория">
    <input type="text" name="year" placeholder="Год издания">
    <input type="text" name="isbn" placeholder="isbn">
    <input type="submit" name="add">
</form>

<?php 
    $query = "SELECT * FROM classics";
    $result = mysqli_query($db_server, $query);
    if(!$result) die ("Сбок при доступе к БД: " . mysqli_error($db_server));

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<p>".$row['author']."</p>".
            "<p>".$row['title']."</p>".
            "<p>".$row['category']."</p>".
            "<p>".$row['year']."</p>".
            "<p>".$row['isbn']."</p>".
            "<form action='' method=''>
                <input type='hidden' name='delete' value='yes'>
                <input type='hidden' name='isbn' value='{$row['isbn']}'>
                <input type='submit' value='DELETE_RECORD'>
            </form>";
        }
    }
?>