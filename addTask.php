<?php
//  checking if input is set correctly
if (isset($_GET["task"]) && !empty($_GET["task"]) && $_GET["task"][0] != " ") {
    $connection = new SQLite3("todoList.db");

    //  checking connection to the database
    if ($connection) {
        $task = $_GET["task"];

        $connection->exec("INSERT INTO tasks (task, is_done) VALUES ('$task', 0);");
        header("Location: index.php");
    } else {
        echo "<p>something went wrong. we cannot connect to the database</p>";
        echo "<p>please click the <a href='index.html'>link</a> to go back to the main page and try agin later</p>";
    }

} else {
    header("Location: index.php");
}
?>