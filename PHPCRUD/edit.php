<?php
    include("sqlconnection.php");
    session_start();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM booksinfo WHERE id='$id'";
        $result = $conn->query($sql);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
        } else {
            $_SESSION['status'] = "Book not found";
            header("location:index.php");
            exit();
        }
    } else {
        header("location:index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Edit Book</h2>

    <?php
        if(isset($_SESSION['status'])){
            echo "<div class='alert alert-info'>".$_SESSION['status']."</div>";
            unset($_SESSION['status']);
        }
    ?>

    <form action="controller.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="txtid" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="txtfile_old" value="<?php echo $row['file_name']; ?>">

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="txttitle" class="form-control" value="<?php echo $row['title']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="txtauthor" class="form-control" value="<?php echo $row['author']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cover Image</label>
            <input type="file" name="txtfile" class="form-control">
            <div class="mt-2">
                <img src="uploads/<?php echo $row['file_name']; ?>" width="100" height="130">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5" required><?php echo $row['descript']; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Date Published</label>
            <input type="date" name="txtdate" class="form-control" value="<?php echo $row['date_']; ?>" required>
        </div>

        <button type="submit" name="update_record" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
