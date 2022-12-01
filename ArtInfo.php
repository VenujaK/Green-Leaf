<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    @include('config.php');

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./ArtInfo.css">
</head>
<body>
<?php @include('header.php');

$art_id = $_GET['art_id'];
echo "<script>console.log('Debug Objects: " . $art_id . "' );</script>";
$articleInfo;
$errorQTYMSG = "";
$successMSG = "";
?>
    <!-- Header -->
    <?php

        $sql = "SELECT * FROM articles WHERE AID=$art_id";
        $sqlResult = mysqli_query($conn, $sql);
        if (mysqli_num_rows($sqlResult)) {
            $articleInfo = mysqli_fetch_assoc($sqlResult);
        } else {
            echo "0 results";
        }
        ?>
<header class="banner">
  <span class="background"> <?php echo ' <img src="./uploaded_img/' . $articleInfo['IMG'] . '" alt="">';?></span>
  <h1 class="title" style="color: #33730e;"><?php echo $articleInfo['TITLE'];?></h1>
</header>

<!-- Other stuff -->
<main>
<form method="POST">
        
  <article>
    <h1><?php echo $articleInfo['TITLE'];?></h1>
    <p><?php echo $articleInfo['CONTENT'];?></p>
</form>
</main>

<script>
    window.onload = function() {
  document.body.className += ' loaded'
};

</script>
</body>
</html>