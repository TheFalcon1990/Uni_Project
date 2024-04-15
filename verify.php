<?php

function validateCode($code) {
    return true;
}

$code = $_GET['code'] ?? '';
$classId = $_GET['classId'] ?? 'Unknown Class';
$startTime = $_GET['startTime'] ?? 'Unknown Time';

if (validateCode($code)) {
    $status = "Valid code. Attendance confirmed for $classId at $startTime.";
} else {
    $status = "Invalid or expired code.";
}

echo "<!DOCTYPE html><html><head><title>Verification Result</title></head><body>";
echo "<h1>" . htmlspecialchars($status) . "</h1>";
echo "</body></html>";
