function ifFormValid() {
    let submitButton = document.getElementById("submit-button");
    submitButton.disabled = true;
    let errorField = document.getElementById("error-field");

    if (!ifEmailFilled()) {
        errorField.innerHTML = "Please, enter your email";
        return false;
    }

    if (!ifNameFilled()) {
        errorField.innerHTML = "Please, enter your full name";
        return false;
    }

    errorField.innerHTML = "";
    submitButton.disabled = false;
    return true;
}
function ifEmailFilled() {
    const emailField = document.getElementById("email");
    return emailField.value.length !== 0;
}

function ifNameFilled() {
    const nameField = document.getElementById("name");
    return nameField.value.length !== 0;
}