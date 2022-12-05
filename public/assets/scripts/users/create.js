document.getElementById("submit-button").addEventListener("click", sendPostRequest);

async function sendPostRequest() {
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

    let response = await fetch(url, postRequest);

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