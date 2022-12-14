let userIdField = document.getElementById("main-input-userID");
userIdField.addEventListener("keyup", userIdValid);

function userIdValid() {
    let userIdInput = document.getElementById("main-input-userID");
    let findButton = document.getElementById("main-page-find-button");
    let errorField = document.getElementById("main-error-field");
    let errorFieldDiv = document.getElementById("error-field-div");
    let id = userIdInput.value;
    findButton.disabled = true;
    errorFieldDiv.hidden = true;

    if (!isNaN(id) && id.length > 0) {
        errorField.innerHTML = "";
        findButton.disabled = false;
        return true;
    } else {
        errorField.innerHTML = "This is not a correct ID";
        findButton.disabled = true;
        errorFieldDiv.hidden = false;
        return false;
    }
}