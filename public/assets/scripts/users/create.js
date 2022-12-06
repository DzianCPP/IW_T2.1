document.getElementById("submit-button").addEventListener("click", sendPostRequest);

<<<<<<< HEAD
async function sendPostRequest() {
    let setEmail = document.getElementById("email").value;
    let setName = document.getElementById("name").value;
=======
function sendPostRequest() {
    let setEmail = document.getElementById("email").value;
    let setFullName = document.getElementById("name").value;
>>>>>>> 4ce6293eb3b4b74b6ce783d3b67640e69c722fe8
    let setNewGender = document.getElementById("gender").value;
    let setStatus = document.getElementById("status").value;

    let url = "/user/create";

    let newUserInfo = {
        email: setEmail,
<<<<<<< HEAD
        name: setName,
=======
        fullName: setFullName,
>>>>>>> 4ce6293eb3b4b74b6ce783d3b67640e69c722fe8
        gender: setNewGender,
        status: setStatus
    };

    let postRequest = {
        method: "POST",
        body: JSON.stringify(newUserInfo)
    };

<<<<<<< HEAD
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
=======
    fetch(url, postRequest)
        .then(()=>{
            window.location ="/users/show/1";
        });
>>>>>>> 4ce6293eb3b4b74b6ce783d3b67640e69c722fe8
}