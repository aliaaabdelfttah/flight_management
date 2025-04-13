<?php
$host = 'localhost';  // أو عنوان الخادم
$username = 'root';   // اسم المستخدم لقاعدة البيانات
$password = '';       // كلمة المرور
$dbname = 'flight_management'; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($host, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
