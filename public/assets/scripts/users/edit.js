document.getElementById("submit-button").addEventListener("click", sendPutRequest);

async function sendPutRequest() {
    let newEmail = document.getElementById("email").value;
    let newName = document.getElementById("name").value;
    let newGender = document.getElementById("gender").value;
    let newStatus = document.getElementById("status").value;
    let newUserID = document.getElementById("user-id").value;

    let url = "/user/update";

    let newUserInfo = {
        email: newEmail,
        name: newName,
        gender: newGender,
        status: newStatus,
        id: newUserID
    };

    let putRequest = {
        method: "PUT",
        body: JSON.stringify(newUserInfo)
    };

    let response = await fetch(url, putRequest);

    if (response.ok !== false) {
        window.location="/users/";
    } else {
        let errorField = document.getElementById("error-field");
        errorField.innerHTML = "Wrong name or email";
        let emailField = document.getElementById("email");
        emailField.style.color = "red";
        let nameField = document.getElementById("name");
        nameField.style.color = "red";
    }
}