<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Attendance</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #e6e6e6;
        }
        .header {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 1rem;
        }
        .content {
            padding: 1rem;
        }
        .attendance-info {
            background-color: #0055b3;
            color: white;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        .action-buttons {
            text-align: center;
            margin-top: 1rem;
        }
        .button {
            background-color: #004080;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
        }
        .button:hover {
            background-color: #003366;
        }
        .hide {
            display: none;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>My Attendance</h1>
</div>
<div class="content">
    <div class='attendance-info'>
        <h2>Cybersecurity</h2>
        <p>Date: <?php echo date("Y-m-d"); ?></p> <!-- TODAY'S DATE FOR DEMO -->
        <p>Attendance Status: -</p>
        <div class='action-buttons'>
            <button id='checkInBtn' class='button' onclick='showCheckOut()'>Check In</button>
            <button id='checkOutBtn' class='button hide' onclick='alert("Checked Out")'>Check Out</button>
        </div>
    </div>
</div>

<script>
    function showCheckOut() {
        document.getElementById('checkInBtn').style.display = 'none'; // Hide Check In button
        document.getElementById('checkOutBtn').style.display = 'inline-block'; // Show Check Out button
        window.open('http://localhost:63342/Project/qrcode.html', '_blank');
    }
</script>
</body>
</html>
