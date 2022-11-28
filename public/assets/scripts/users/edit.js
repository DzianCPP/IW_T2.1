document.getElementById("submit-button").addEventListener("click", sendPutRequest);

function sendPutRequest() {
    let newEmail = document.getElementById("email").value;
    let newFullName = document.getElementById("name").value;
    let newGender = document.getElementById("gender").value;
    let newStatus = document.getElementById("status").value;
    let newUserID = document.getElementById("user-id").value;

    let url = "/user/update";

    let newUserInfo = {
        email: newEmail,
        fullName: newFullName,
        gender: newGender,
        status: newStatus,
        userID: newUserID
    };

    let putRequest = {
        method: "PUT",
        body: JSON.stringify(newUserInfo)
    };

    let newLocation = "/users/show/" + Math.ceil(newUserID/10);

    fetch(url, putRequest)
        .then(()=>{
            window.location=newLocation;
        });
}