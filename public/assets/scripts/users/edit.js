function sendPutRequest() {
    const xhttp = new XMLHttpRequest();

    let email = document.getElementById("email").value;
    let fullName = document.getElementById("name").value;
    let gender = document.getElementById("gender").value;
    let status = document.getElementById("status").value;
    let userID = document.getElementById("user-id").value;

    let url = "/user/update";

    let newUserInfo = {
        newEmail: email,
        newFullName: fullName,
        newGender: gender,
        newStatus: status,
        newUserID: userID
    };

    let putRequest = {
        method: "PUT",
        body: JSON.stringify(newUserInfo)
    };

    fetch(url, putRequest)
        .then(()=>{
            window.location="/users/show";
        });
}