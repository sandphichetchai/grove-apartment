<?php
session_start();
require_once '../../../connect.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $_SESSION['error'] = 'กรุณาป้อน username';
        header("Location: ../../../../../../grove-apartment/login.php");
        exit();
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณาป้อน password';
        header("Location: ../../../../../../grove-apartment/login.php");
        exit();
    } else {
        try {
            $check_data = $conn->prepare("SELECT * FROM tb_staff WHERE username = :username");
            $check_data->bindParam(":username", $username);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {
                
                if ($username == $row['username'])
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['success'] = $row['staff_id'];
                        header("Location: ../../../../../../grove-apartment/backend/index.php");
                        exit();
                } else {
                    $_SESSION['error'] = 'รหัสผ่านผิด';
                    header("Location: ../../../../../../grove-apartment/login.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                header("Location: ../../../../../../grove-apartment/login.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = 'เกิดข้อผิดพลาด: ' . $e->getMessage();
            header("Location: ../../../../../../grove-apartment/login.php");
            exit();
        }
    }
}
?>