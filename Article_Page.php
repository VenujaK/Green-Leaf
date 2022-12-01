<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Article_Page.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    @include('config.php');
    
    $db = '';
    ?>
    <form method="POST">
        <div class="small-container">
            <h1 class="headings">OUR BLOG</h1>

            <div class="row">
                <?php
                $sql = "SELECT * FROM articles ORDER by rand() ";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo ' <div class="col-4">';
                            echo ' <img src="./uploaded_img/' . $row['IMG'] . '" alt="">';
                            echo ' <h4>' . $row['TITLE'] . '</h4>';
                            echo '<p>By Admin</p>';
                            echo ' <button type="button" class="btns" onclick="loadART(' . $row['AID'] . ')">Read More</button>';
                            echo '</div>';
                        }
                    } else {
                        echo "No Products found";
                    }
                } else {
                    echo "Products not found";
                }

                ?>

            </div>
        </div>
    </form>
    <!-- Footer -->
    <?php @include('footer.php') ?>
    <script>
    artID = $artID;

    function loadART(artID) {
       
        var origin = window.location.origin;
        window.location.href = origin + "/Green leaf/ArtInfo.php?art_id=" + artID;

        // console.log(origin);

    }
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>