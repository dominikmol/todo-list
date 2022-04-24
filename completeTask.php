<?php
//  checking if input is set correctly
if (isset($_GET["done"]) && !empty($_GET["done"]) && $_GET["done"][0] != " ") {
    $connection = new SQLite3("todoList.db");

    //  checking connection to the database
    if ($connection) {
        $taskID = $_GET["done"];

        $connection->exec("UPDATE tasks SET is_done = NOT is_done WHERE id == $taskID;");
        header("Location: index.php");
    } else {
        echo "<p>something went wrong. we cannot connect to the database</p>";
        echo "<p>please click the <a href='index.html'>link</a> to go back to the main page and try agin later</p>";
    }

} else {
    header("Location: index.php");
}
?>