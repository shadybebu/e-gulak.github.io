let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");
eyeicon.onclick = function(){
    if(password.type === "password"){
        password.type = "text";
        eyeicon.src = "eye-open.png";
        
    }else{
        password.type = "password";
        eyeicon.src = "eye-close.png";
        
    }
}


    // JavaScript code to show alert messages one by one
    const alertMessages = document.querySelectorAll('.alert-message');

    // Function to show alert messages one by one
    function showAlertMessages() {
        let delay = 0; // Delay between showing each alert message
        alertMessages.forEach((alertMessage, index) => {
            setTimeout(() => {
                alertMessage.style.display = 'block';
            }, delay);
            delay += 2000; // Increase delay for next alert message
        });
    }

    // Call the function to show alert messages
    showAlertMessages();


