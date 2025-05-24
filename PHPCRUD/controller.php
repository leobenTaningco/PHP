<?php
session_start();
include("sqlconnection.php");

if(isset($_POST["save_record"])){
    $title = mysqli_real_escape_string($conn,$_POST["txttitle"]);
    $author = $_POST["txtauthor"];
    $file_name = $_FILES["txtfile"]["name"];
    $description = mysqli_real_escape_string($conn,$_POST["description"]);
    $date = $_POST["txtdate"];

    $sql = "INSERT INTO booksinfo(title, author, file_name, descript, date_) VALUES('$title', '$author', '$file_name', '$description', '$date')";

    if($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES["txtfile"]["tmp_name"],"uploads/".$_FILES["txtfile"]["name"]);
        $_SESSION['status'] = "Book Added Successfully";
        header('location:index.php');
    }
    else{
        $_SESSION['status'] = "Insert failed :(";
        header('location:index.php');
    }

    $conn->close();
}

if(isset($_POST["update_record"])){
    $id = $_POST['txtid'];
    $title = mysqli_real_escape_string($conn,$_POST["txttitle"]);
    $author = $_POST["txtauthor"];
    $file_new = $_FILES["txtfile"]["name"];
    $file_old = $_POST["txtfile_old"];
    $description = mysqli_real_escape_string($conn,$_POST["description"]);
    $date = $_POST["txtdate"];

    if($file_new != ''){
        $update_file = $file_new;
    } else {
        $update_file = $file_old;
    }

    $sql = "UPDATE booksinfo SET title='$title', author='$author', file_name='$update_file', descript='$description', date_='$date' WHERE id='$id'";

    if($conn->query($sql) === TRUE) {
        if($file_new != ''){
            move_uploaded_file($_FILES["txtfile"]["tmp_name"],"uploads/".$_FILES["txtfile"]["name"]);
        }
        $_SESSION['status'] = "Book Updated Successfully";
        header('location:index.php');
    }
    else{
        $_SESSION['status'] = "Update failed :(";
        header('location:edit.php');
    }

    $conn->close();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $file_name = $_GET['file_name'];

    $sql = "DELETE FROM booksinfo WHERE id='$id'";

    if($conn->query($sql) === TRUE) {
        unlink("uploads/".$file_name);
        $_SESSION['status'] = "Book Deleted Successfully";
        header('location:index.php');
    }
    else{
        $_SESSION['status'] = "Delete failed :(";
        header('location:edit.php');
    }

    $conn->close();
}
?>
