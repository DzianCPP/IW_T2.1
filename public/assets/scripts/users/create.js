document.getElementById("submit-button").addEventListener("click", sendPostRequest);

function sendPostRequest() {
    let setEmail = document.getElementById("email").value;
    let setFullName = document.getElementById("name").value;
    let setNewGender = document.getElementById("gender").value;
    let setStatus = document.getElementById("status").value;

    let url = "/user/create";

    let newUserInfo = {
        email: setEmail,
        fullName: setFullName,
        gender: setNewGender,
        status: setStatus
    };

    let postRequest = {
        method: "POST",
        body: JSON.stringify(newUserInfo)
    };

    fetch(url, postRequest)
        .then(()=>{
            window.location ="/users";
        });
}