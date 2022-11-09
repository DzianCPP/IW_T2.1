function formValid() {
    let submitButton = document.getElementById("submit-button");
    submitButton.disabled = true;
    let errorField = document.getElementById("error-field");

    if (!emailValid()) {
        errorField.innerHTML = "Please, enter a valid email";
        return false;
    }

    if (!nameValid()) {
        errorField.innerHTML = "Please, enter a valid full name";
        return false;
    }

    errorField.innerHTML = "";
    submitButton.disabled = false;
    return true;
}

function emailValid() {
    const email = document.getElementById("email").value;
    if (!ifEmailFilled() || !emailHasAtChar(email)) {
        return false;
    }

    return true;
}
function ifEmailFilled() {
    const emailField = document.getElementById("email");
    return emailField.value.length !== 0;
}

function nameValid() {
    const nameFieldText = document.getElementById("name").value;
    if (!ifNameFilled() || !ifNameHasTwoWords(nameFieldText)) {
        return false;
    }
    return true;
}

function ifNameFilled() {
    const nameField = document.getElementById("name");
    nameValue = nameField.value.trim();
    return nameValue.length !== 0;
}

function ifNameHasTwoWords(fullName) {
    if (fullName.indexOf(" ") === -1) {
        return false;
    }

    return fullName.indexOf(" ") !== fullName.length;
}

function emailHasAtChar(email) {
    if (email.indexOf("@", 0) === -1) {
        return false;
    }

    return true;
}