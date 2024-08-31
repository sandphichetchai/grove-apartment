<?php
session_start();
require_once '../../../connect.php';

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบว่ามีการป้อน username หรือไม่
    if (empty($username)) {
        $_SESSION['error'] = 'กรุณาป้อน username เพื่อสมัครสมาชิก';
        $_SESSION['alert_type'] = 'error';
        header("location: ../../../../../../grove-apartment/login.php");
        exit();

        // ตรวจสอบว่ามีการป้อน password หรือไม่
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณาป้อน password เพื่อสมัครสมาชิก';
        $_SESSION['alert_type'] = 'error';
        header("location: ../../../../../../grove-apartment/login.php");
        exit();

        // ตรวจสอบว่า password มีมากกว่าหรือเท่ากับ 8 ตัวหรือไม่ 
    } else if (strlen($password) < 8) {
        $_SESSION['error'] = 'กรุณาป้อน password มากกว่า 8 ตัว';
        $_SESSION['alert_type'] = 'error';
        header("location: ../../../../../../grove-apartment/login.php");
        exit();   
    }

    try {
        $check_username = $conn->prepare("SELECT username FROM tb_staff WHERE username = :username");
        $check_username->bindParam(":username", $username);
        $check_username->execute();
        $row = $check_username->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $_SESSION['warning'] = "มีชื่อ User นี้อยู่ในระบบแล้ว";
            $_SESSION['alert_type'] = 'warning';
            header("location: ../../../../../../grove-apartment/login.php");
            exit();
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO tb_staff(username, password) VALUES (:username, :password)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $passwordHash);
        $stmt->execute();

        $_SESSION['success'] = "สมัครสมาชิกเรียบสำเร็จ!";
        $_SESSION['alert_type'] = 'success';
        header("location: ../../../../../../grove-apartment/login.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "มีบางอย่างผิดพลาด: " . $e->getMessage();
        $_SESSION['alert_type'] = 'error';
        header("location: ../../../../../../grove-apartment/login.php");
        exit();
    }
}
?>
