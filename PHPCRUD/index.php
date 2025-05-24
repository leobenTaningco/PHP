<?php
    include("sqlconnection.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Book Collection</h2>

    <?php
        if(isset($_SESSION['status'])){
            echo "<div class='alert alert-info'>".$_SESSION['status']."</div>";
            unset($_SESSION['status']);
        }
    ?>

    <a href="insert.php" class="btn btn-success mb-3">Add New Book</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Cover</th>
                <th>Description</th>
                <th>Date Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM booksinfo ORDER BY id DESC";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['title']."</td>";
                        echo "<td>".$row['author']."</td>";
                        echo "<td><img src='uploads/".$row['file_name']."' width='60' height='80'></td>";
                        echo "<td>".$row['descript']."</td>";
                        echo "<td>".$row['date_']."</td>";
                        echo "<td>
                                <a href='edit.php?id=".$row['id']."' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='controller.php?id=".$row['id']."&file_name=".$row['file_name']."' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this book?')\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                }
                else{
                    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                }

                $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
