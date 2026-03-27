<?php
// السماح بالطلبات من نفس المصدر
header('Content-Type: text/plain');

// الحصول على البيانات المرسلة
$logData = isset($_POST['log']) ? $_POST['log'] : '';
$timestamp = isset($_POST['timestamp']) ? $_POST['timestamp'] : time();

if (!empty($logData)) {
    // إضافة عنوان IP الخاص بالزائر
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'غير معروف';
    $logWithIp = "[IP: $ip] " . $logData;
    
    // كتابة البيانات في ملف نصي
    $logFile = 'visit_log.txt';
    file_put_contents($logFile, $logWithIp, FILE_APPEND | LOCK_EX);
    
    echo "تم تسجيل الزيارة بنجاح";
} else {
    echo "لا توجد بيانات";
}
?>
