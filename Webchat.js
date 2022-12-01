var firebaseConfig = {
    apiKey: "AIzaSyCGE-rxJ4O42epBrmtofXYohXh21HIvgPQ",
    authDomain: "green-leaf-b0aaa.firebaseapp.com",
    projectId: "green-leaf-b0aaa",
    storageBucket: "green-leaf-b0aaa.appspot.com",
    messagingSenderId: "371024559522",
    appId: "1:371024559522:web:5dca6a3540825e379046fb",
    measurementId: "G-VYMFY65GXL"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const db = firebase.database();

const username = prompt("Please Tell Us Your Name");

document.getElementById("message-form").addEventListener("submit", sendMessage);

function sendMessage(e) {
    e.preventDefault();

    // get values to be submitted
    const timestamp = Date.now();
    const messageInput = document.getElementById("message-input");
    const message = messageInput.value;



    // clear the input box
    messageInput.value = "";

    //auto scroll to bottom
    document
        .getElementById("messages")
        .scrollIntoView({ behavior: "smooth", block: "end", inline: "nearest" });

    // create db collection and send in the data
    db.ref("messages/" + timestamp).set({
        username,
        message,
    });
}

const fetchChat = db.ref("messages/");

fetchChat.on("child_added", function(snapshot) {
    const messages = snapshot.val();
    const message = `<li class=${
      username === messages.username ? "sent" : "receive"
    }><span>${messages.username}: </span>${messages.message}</li>`;
    // append the message on the page
    document.getElementById("messages").innerHTML += message;
});