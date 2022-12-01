<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./AdminPage.css">
    <style>
        .headname{
            position: absolute;
            top: 6%;
            font-size: 350%;
            color: #33730e;
        }
    </style>
</head>
<body>
    <h1 class="headname">Queries From Users</h1>
<?php
      @include('config.php');
   //   Queries
      $select = mysqli_query($conn, "SELECT * FROM queries");
      
      

      ?>
      <!-- Product table -->
      <div class="Articles">
         <table class="tblarticles" >
            <form method="POST">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Details</th>
                 
                  
               </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
               <tr>
                  <td><?php echo $row['Qname']; ?></td>
                  <td><?php echo $row['Qmail']; ?></td>
                  <td><?php echo $row['Qdetails']; ?></td>
                  
                  
               </tr>
            <?php } ?>
         </table>
         </form>
      </div>
</body>
</html>