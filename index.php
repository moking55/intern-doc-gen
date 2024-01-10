<?php
session_start();
$defaultTitle = 'Intern Doc gen v1.0 by <a href="//github.com/moking55" target="_blank">Codename-T</a>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Doc gen v1.0</title>
    <!-- bootstrap 4 cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="card my-5">
            <div class="card-header"><?= $defaultTitle ?></div>
            <div class="card-body">
                <?php
                $step = $_GET['step'] ?? null;
                switch ($step) {
                    case '1':
                        include './forms/step1.html';
                        break;
                    case '2':
                        include './forms/step2.php';
                        break;
                    case '3':
                        include './forms/step3.php';
                        break;

                    default:
                        $defaultTitle = "โปรดอ่านคู่มือก่อนใช้งาน";
                        include './forms/welcome.html';
                        break;
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- bootstrap 4 cdn -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="./script/sketchpad.js"></script>
    <script>
        var sketchpad = new Sketchpad({
            element: '#sketchpad',
            width: 500,
            height: 200,
        });

        function confirmImage() {
            let canvas = document.getElementById("sketchpad");
            let image = canvas.toDataURL("image/png");
            // popup window to download image
            document.getElementById("signature").value = image;
            document.getElementById("createDoc").disabled = false;
        }
    </script>
</body>

</html>