<?php
// admin.php

$currentTime = time();
$interval = 5 * 60;
$timeUntilNext = $interval - ($currentTime % $interval);

$uniqueID = bin2hex(random_bytes(10)); // Generates a secure unique ID

// PIN reset
$pinSeed = floor($currentTime / $interval);
srand($pinSeed); // Seed the RNG
$pin = sprintf("%04d", rand(0, 9999));

$classId = urlencode("Computer Science"); // URL encoder
$classStartTime = urlencode("9:00AM");
$generatedURL = "http://localhost/verify.php?code=$uniqueID&classId=$classId&startTime=$classStartTime&pin=$pin";

$autoRefreshTime = $timeUntilNext + 1;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="<?php echo $autoRefreshTime; ?>">
    <title>Admin QR Code Generator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { display: flex; flex-direction: column; align-items: center; }
        .timer, .pin, .instructions { margin: 10px; }
        .refresh-button { margin-top: 20px; padding: 10px 20px; font-size: 16px; cursor: pointer; }
    </style>
    <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            var timeUntilNext = <?php echo $timeUntilNext; ?>;
            var display = document.querySelector('#time');
            startTimer(timeUntilNext, display);
        };

        function refreshPage() {
            window.location.reload();
        }
    </script>
</head>
<body>
<div class="container">
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($generatedURL); ?>" alt="QR Code" />
    <div class="timer">Time until next refresh: <span id='time'></span> seconds</div>
    <div class="pin">Current PIN: <strong><?php echo $pin; ?></strong></div>
</div>
</body>
</html>
