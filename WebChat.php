<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Text Area</title>
    <link rel="stylesheet" href="./WebChat.css">
</head>

<body>
<?php 
    // @include('./header.php');
?>

    <header class="header1">
        <h2>Green Leaf</h2>
        <p style="color:white;">please discuss only about environment issues</p>
    </header>

    <div id="chat">
        <!-- messages will display here -->
        <ul id="messages"></ul>

        <!-- form to send message -->
        <form id="message-form">
            <input id="message-input" type="text" />
            <button id="message-btn" type="submit">Send</button>
        </form>
    </div>
    <!-- scripts -->
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>
    <script src="./Webchat.js"></script>

</body>

</html>