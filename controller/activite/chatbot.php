
<?php include '../../config.php';  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js.bootstrap.min.js"></script>
    
    
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../view/frontoffice/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../view/frontoffice/css/style.css" rel="stylesheet">

    <title>Chatbot</title>
    <style>
        .body1{
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
        }
        .container1 {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 23px;
            margin: 10px 0;
        }
        
        .darker{
            border-color: #ccc;
            background-color: #ddd;
        }
        .container1 img.right{
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }
        .time-right {
         float: right;
         color: #aaa;
        }
        .time-left{
            float: left;
            color: #999;
        }
        div.sticky {
            position -webkit-sticky;
            position: sticky;
            bottom: 0;
            margin-top: 200px;
            background-color: #ddd;
            padding: 10px 0 0 10px;
            font-size: 20px;
        }
        .square{
            height: auto;
            width: 810px;
            padding: 8px;
            background-color: #fff;
            border: 2px solid #dedede;
        }
        .title{
            text-align: center;
        }
    </style>
<body> 

        <?php
include '../../config.php'; 

// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch chat messages
$query = "SELECT * FROM chats ORDER BY date DESC";
$stmt = $pdo->prepare($query);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<span id="ref">
    <div class="body1">
        <div class="square">
            <div class="title"><h2>Chat Messages</h2></div>
            <?php foreach ($messages as $message): ?>
                <div class="container1" style="margin-right: 400px;">
                    <img src="../../view/frontoffice/img/avatar1.png" alt="avatar" style="width:40px; height:40px;">
                    <p id="message"><?= $message['user']; ?></p>
                    <span class="time-right"><?= $message['date']; ?></span>
                </div>

                <div class="container1 darker" style="margin-left: 400px;">
                    <img src="../../view/frontoffice/img/robot2.png" alt="avatar" class="right" style="width:40px; height:40px;">
                    <p><?= $message['chatbot']; ?></p>
                    <span class="time-left"><?= $message['date']; ?></span>
                </div>
            <?php endforeach; ?>
            <div class="sticky">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="msg">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="send()">Send</button>
                                <a href="../../controller/activite/showActivityfront.php">
    <button type="button" class="btn">Return</button>
    
</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</span>

<script type="text/javascript">
    function send() {
        var text = $('#msg').val().toLowerCase();
        $.ajax({
            type: "post",
            url: "chatbotsearch.php",
            data: { text: text },
            success: function(data) {
                $("#ref").load("#ref");
            }
        });
    }
</script>

</body>
</html>