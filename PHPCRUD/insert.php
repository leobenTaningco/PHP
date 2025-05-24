<?php
    include("sqlconnection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Add New Book</h2>

    <?php
        session_start();
        if(isset($_SESSION['status'])){
            echo "<div class='alert alert-info'>".$_SESSION['status']."</div>";
            unset($_SESSION['status']);
        }
    ?>

    <form action="controller.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Book Title</label>
            <input type="text" name="txttitle" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="txtauthor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Book Cover (Image)</label>
            <input type="file" name="txtfile" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="4" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Date Published</label>
            <input type="date" name="txtdate" class="form-control" required>
        </div>

        <button type="submit" name="save_record" class="btn btn-primary">Save Book</button>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </form>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
