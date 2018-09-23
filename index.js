function showSignUp(flag){
    var signUp = document.getElementsByClassName("sign-up")[0];
    var logIn = document.getElementsByClassName("log-in")[0];

    if(flag){
        signUp.style.display = "block";
        logIn.style.display = "none";
    }
    else{
        signUp.style.display = "none";
        logIn.style.display = "block";
    }
}

function sendMessage(flag){
    var send = document.getElementsByClassName("send-textarea")[0];
    var receive = document.getElementsByClassName("receive-textarea")[0];

    if(flag){
        // console.log("send");
        send.style.display = "block";
        receive.style.display = "none";
    }
    else{
        // console.log("receive");
        send.style.display = "none";
        receive.style.display = "block";
    }
}