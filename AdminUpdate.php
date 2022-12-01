<?php

@include 'config.php';

$id = $_GET['edit'];

if (isset($_POST['update_article'])) {

    $art_title = $_POST['ART_TITLE'];
    $art_content = $_POST['ART_Content'];


    $art_image = $_FILES['ArticleImg']['name'];

    $art_image_tmp_name = $_FILES['ArticleImg']['tmp_name'];

    $art_image_folder = 'uploaded_img/' . $art_image;
    if (empty($art_title) || empty($art_content) || empty($art_image) ) {
        $message[] = 'please fill out all!';
    } else {

        $update_data = "UPDATE articles SET TITLE='$art_title', CONTENT='$art_content', IMG='$art_image' WHERE AID = '$id'";
        $upload = mysqli_query($conn, $update_data);
        // echo $update_data;

        if ($upload) {
            move_uploaded_file($art_image_tmp_name, $art_image_folder);
            header('location:AdminPage.php');
        } else {
            $message[] = 'Something went Wrong!';
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update</title>
    <link rel="stylesheet" href="./AdminPage.css">
</head>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
        }
    }
    ?>

    <div class="container">


        <div class="formContainer centered">

            <?php

            $select = mysqli_query($conn, "SELECT * FROM articles WHERE AID = '$id'");
            while ($row = mysqli_fetch_assoc($select)) {

            ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="title">update the Article</h3>
                    <input type="text" class="box" name="ART_TITLE" value="<?php echo $row['TITLE']; ?>" placeholder="enter the Title" required>
                    <input type="textArea" min="0" class="box" name="ART_Content" value="<?php echo $row['CONTENT']; ?>" placeholder="enter the Content" required>
                    <input type="file" class="box" name="ArticleImg" accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" value="<?php echo $row['IMG']; ?>" required>
                    <input type="submit" value="update Article" name="update_article" class="btns">
                    <a href="AdminPage.php" class="btns">go back!</a>
                </form>



            <?php }; ?>



        </div>

    </div>

</body>

</html>