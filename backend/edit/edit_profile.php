<?php
session_start();
require_once "../../connect.php";

if(isset($_POST['update'])); {
    $staff_id = $_POST['staff_id'];
    $title = $_POST['title'];
    $citizen_id = $_POST['citizen_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $salary = $_POST['salary'];
    $img_profile = $_FILES['img_profile'];
    $img_profile2 = $_POST['img_profile2'];
    $upload = $_FILES['img_profile']['name'];

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png', 'gif');
        $extension = explode('.', $img_profile['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = '../../backend/assets/img_profile/' . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img_profile['size'] > 0 && $img_profile['error'] == 0) {
                move_uploaded_file($img_profile['tmp_name'], $filePath);
            }
        }
    } else {
        $fileNew = $img_profile2;
    }

    $sql = $conn->prepare("UPDATE tb_staff SET title = :title, citizen_id = :citizen_id, first_name = :first_name, last_name = :last_name, email = :email, 
    address = :address, img_profile = :img_profile, phone_number = :phone_number, salary = :salary WHERE staff_id = :staff_id");
    $sql->bindParam(":staff_id", $staff_id);
    $sql->bindParam(":title", $title);
    $sql->bindParam(":citizen_id", $citizen_id);
    $sql->bindParam(":first_name", $first_name);
    $sql->bindParam(":last_name", $last_name);
    $sql->bindParam(":email", $email);
    $sql->bindParam(":address", $address);
    $sql->bindParam(":img_profile", $fileNew);
    $sql->bindParam(":phone_number", $phone_number);
    $sql->bindParam(":salary", $salary);
    $sql->execute();

    if ($sql) {
        header("location: ../../../../../grove-apartment/backend/index.php");
    } else {
        $_SESSION['error'] = "Update error!";
        header("location: ../../../index.php");
    }
}
?>