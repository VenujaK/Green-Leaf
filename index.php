<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Leaf</title>
<!-- custom css file link  -->
<link rel="stylesheet" href="Style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   

</head>

<body>
<?php 
    @include('./header.php');
    
@include 'config.php';
// Product insert
if (isset($_POST['inform'])) {

   $Name = $_POST['Name'];
   $mail = $_POST['mail'];
   $details = $_POST['details'];
   

   if (empty($Name) || empty($mail) || empty($details) ) {
      
      echo "<script>alert('please fill out all')</script>";
   } else {
      $sql = "INSERT INTO queries (Qname,Qmail,Qdetails) VALUES('$Name', '$mail','$details')";     
      if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Informed successfully')</script>";      
      } else {
         echo "<script>alert('Something is wrong')</script>";
      }
   }
};
?>
    <!-- header section starts  -->

  

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Make IT Green</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat labore, sint cupiditate distinctio tempora reiciendis.</p>
            <a href="./WebChat.php" class="btn">Contribute Now</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">

            <div class="image">
                <img src="images/Green_leaf.png" alt="">
            </div>

            <div class="content">
                <h3>what are we doing here ?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus qui ea ullam, enim tempora ipsum fuga alias quae ratione a officiis id temporibus autem? Quod nemo facilis cupiditate. Ex, vel?</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis, nihil voluptas culpa! Neque consectetur obcaecati sapiente?</p>
                <a href="#" class="btn">learn more</a>
            </div>

        </div>

    </section>

    <!-- about section ends -->




    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading"> <span>Inform</span> Us</h1>

        <div class="row">

            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30153.788252261566!2d72.82321484621745!3d19.141690214227783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63aceef0c69%3A0x2aa80cf2287dfa3b!2sJogeshwari%20West%2C%20Mumbai%2C%20Maharashtra%20400047!5e0!3m2!1sen!2sin!4v1629452077891!5m2!1sen!2sin"
                allowfullscreen="" loading="lazy"></iframe>

            <form action="" method="post">
                <h3>Poluted Places</h3>
                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" placeholder="name" name="Name">
                </div>
                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="email" placeholder="email" name="mail">
                </div>
                <div class="inputBox">
                    <span class="fa-solid fa-message"></span>
                    <input type="textA" placeholder="Address and Details" name="details">
                </div>
                <input type="submit" value="Inform now" class="btn" name="inform">
            </form>
        </div>

    </section>

    <!-- contact section ends -->

    <!-- blogs section starts  -->

    <section class="blogs" id="blogs">

        <h1 class="heading"> our <span>blogs</span> </h1>
        <div class="box-container">

            <div class="box">
                <?php $sql = "SELECT * FROM articles ORDER by rand() LIMIT 3";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo ' <div class="image">';
                                echo ' <img src="./uploaded_img/' . $row['IMG'] . '" alt="">';
                                echo ' </div>';
                                echo '<div class="content">';
                                echo '<a href="#" class="title">'.$row['TITLE'].'</a>';
                                echo'<span>by admin</span>';
                                echo '<p>'.$row['CONTENT'].'</p>';
                                echo'<a href="#" onclick="loadART(' . $row['AID'] . ')"  class="btn">read more</a>';
                                echo '</div>';
                             }}}
                ?>
                <!-- <div class="image">
                    <img src="images/beautiful-ramboda-waterfall-sri-lanka-island.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="title">Ramboda Alle</a>
                    <span>by admin / 21st may, 2021</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, dicta.</p>
                    <a href="#"  class="btn">read more</a>
                </div> -->
            
            </div>
        </div>

    </section>

    <!-- blogs section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>

        <div class="links">
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">contact</a>
            <a href="./UserLogin.php">Admin</a>
        </div>



    </section>

    <!-- footer section ends -->
    <!-- custom js file link  -->
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    artID = $artID;

    function loadART(artID) {
       
        var origin = window.location.origin;
        window.location.href = origin + "/Green leaf/ArtInfo.php?art_id=" + artID;

        // console.log(origin);

    }
</script>
</body>

</html>