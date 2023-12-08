<!-- application/views/error_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        .callout {
            position: relative;
            margin: 20px;
            padding: 15px;
            border: 1px solid #d9534f;
            border-radius: 3px;
            color: #d9534f;
            background-color: #f2dede;
        }

        .close-notification {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="callout">
        <p style="font-size:14px">
            <i class="fa fa-exclamation-triangle"></i>
            <?php echo $error_message; ?>
            <span class="close-notification" onclick="closeNotification(this)">&times;</span>
        </p>
    </div>
</body>
</html>
