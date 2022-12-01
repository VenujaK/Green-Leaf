<?php


@include 'config.php';
// Product insert
if (isset($_POST['add_art'])) {

   $art_title = $_POST['ART_TITLE'];
   $art_content = $_POST['ART_Content'];
   
   
   $art_image = $_FILES['ArticleImg']['name'];

   $art_image_tmp_name = $_FILES['ArticleImg']['tmp_name'];
   
   $art_image_folder = 'uploaded_img/' . $art_image;
   

   if (empty($art_title) || empty($art_content) || empty($art_image) ) {
      $message[] = 'please fill out all';
   } else {
      $insert = "INSERT INTO articles (TITLE, CONTENT,IMG) VALUES('$art_title', '$art_content','$art_image')";
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         move_uploaded_file($art_image_tmp_name, $art_image_folder);
         
         $message[] = 'new article added successfully';
      } else {
         $message[] = 'could not add the article';
      }
   }
};
// Delete option
if (isset($_GET['del'])) {
   $id = $_GET['del'];
   mysqli_query($conn, "DELETE FROM articles  WHERE AID = $id");
   mysqli_query($conn, "ALTER TABLE articles AUTO_INCREMENT = 1");
   // ALTER TABLE products AUTO_INCREMENT = 1;
   // header('location:AdminPage.php');
};
if (isset($_POST['goHome'])) {
   @include('logout.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="./AdminPage.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

      <div class="formContainer">

         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>Add a Article</h3>
            <input type="text" placeholder="Enter Article Title" name="ART_TITLE" class="box" >
            <input type="textArea" placeholder="Enter Article Content" name="ART_Content" class="box" >
            <input type="file" accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" name="ArticleImg" class="box" required>         
            <input type="submit" class="buttons" name="add_art" value="add ARTICLE">
            <a href="index.php" class="buttons" name="goHome">Informed Details</a>
            <a href="index.php" class="buttons" name="goHome">Go to Home page</a>

         </form>

      </div>
      <!-- <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
         <button name="men" class="btns"> Men's Products</button>
         <button name="women" class="btns"> Women's Products</button>
         <button name="kids" class="btns"> Kids Products</button>
         <button name="foot" class="btns"> Footware Products</button>
      </form> -->


      <?php
      // if (isset($_POST['all'])) {
      //    $select = mysqli_query($conn, "SELECT * FROM products");
         
      // };
   //   Queries
      $select = mysqli_query($conn, "SELECT * FROM articles");
      
      

      ?>
      <!-- Product table -->
      <div class="Articles">
         <table class="tblarticles">
            <form method="POST">
            <thead>
               <tr>
                  <th>Image</th>
                  <th>AID</th>
                  <th>Title</th>
                 
                  
               </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
               <tr>
                  <td><img src="uploaded_img/<?php echo $row['IMG']; ?>" height="100" alt=""></td>
                  <td><?php echo $row['AID']; ?></td>
                  <td><?php echo $row['TITLE']; ?></td>
                  
                  <td>
                     <a href="AdminUpdate.php?edit=<?php echo $row['AID']; ?>" class="buttons"> <i class="fas fa-edit"></i> Update </a>
                     
                     <a href="AdminPage.php?del=<?php echo $row['AID']; ?>" class="buttons"> <i class="fas fa-trash"></i> Delete </a>
                  </td>
               </tr>
            <?php } ?>
         </table>
         </form>
      </div>

   </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>