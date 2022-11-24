let userIdField = document.getElementById("main-input-userID");
userIdField.addEventListener("change", userIdValid);

function userIdValid() {
    let userIdInput = document.getElementById("main-input-userID");
    let findButton = document.getElementById("main-page-find-button");
    let errorField = document.getElementById("main-error-field");
    let errorFieldDiv = document.getElementById("error-field-div");
    let userID = userIdInput.value;
    findButton.disabled = true;
    errorFieldDiv.hidden = true;

    if (!isNaN(userID) && userID.length > 0) {
        errorField.innerHTML = "";
        findButton.disabled = false;
    } else {
        errorFieldDiv.hidden = false;
        errorField.innerHTML = "This is not a correct ID";
        findButton.disabled = true;
    }
}