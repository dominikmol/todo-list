<!DOCTYPE html>
<html lang="en">
    <head>
        <title>todo list</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body style="background-color: lightsteelblue;">
        <table class="table table-bordered" id="table">
            <thead class="thead-dark">
                <tr>
                    <th>task</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $connection = new SQLite3("todoList.db");

                 //  checking connection to the database
                 if ($connection) {
                     $result = $connection->query("SELECT * FROM tasks WHERE is_done == 0");

                     // creating table of tasks that wasn't done yet
                     // creating form to check tasks that are done
                     while ($row = $result->fetchArray()) {
                         echo "<div class='form-group'>";
                         echo "<tr>
                                    <form action='completeTask.php' method='get'>
                                        <td>{$row['task']}</td>
                                        <td><button type='submit' name='done' value='{$row['id']}' class='btn btn-danger btn-center'>X</button></td>
                                    </form>
                               </tr>";
                        echo "</div>";
                     }
                 } else {
                     echo "<p>something went wrong. we cannot connect to the database</p>";
                     echo "<p>please try agin later</p>";
                 }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <div class="form-group">
                        <form action="addTask.php" method="get">
                            <td>
                                <input type="text" name="task" placeholder="write your task here..." class="form-control">
                            </td>
                            <td>
                                <input type="submit" value="add" class="btn btn-primary btn-center">
                            </td>
                        </form>
                    </div>
                </tr>
            </tfoot>
        </table>
    </body>
</html>