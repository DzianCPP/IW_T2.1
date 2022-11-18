function userIdValid() {
    let userIdInput = document.getElementById("main-input-userID");
    let findButton = document.getElementById("main-page-find-button");
    let errorField = document.getElementById("main-error-field");
    let userID = userIdInput.value;
    findButton.disabled = true;

    if (!isNaN(userID) && userID.length > 0) {
        errorField.innerHTML = "";
        findButton.disabled = false;
        return true;
    } else {
        errorField.innerHTML = "This is not a correct ID";
        findButton.disabled = true;
        return false;
    }
}