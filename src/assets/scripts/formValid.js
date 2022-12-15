$(document).ready(function() {
    $("#email").keyup(formValid);
    $("#name").keyup(formValid);
    $("#gender").change(formValid);
    $("#status").change(formValid);
})

function formValid() {
    let errorField = document.getElementById("error-field");
    let submitButton = document.getElementById("submit-button");

    submitButton.disabled = true;

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
    if (!emailFilled() || !emailHasAtChar(email)) {
        return false;
    }

    return true;
}

function nameValid() {
    const nameFieldText = document.getElementById("name").value;
    if (!nameFilled() || !nameHasTwoWords(nameFieldText)) {
        return false;
    }
    return true;
}

function emailFilled() {
    const emailField = document.getElementById("email");
    return emailField.value.length !== 0;
}

function nameFilled() {
    const nameField = document.getElementById("name");
    let nameValue = nameField.value.trim();
    return nameValue.length !== 0;
}

function nameHasTwoWords(name) {
    if (name.indexOf(" ") === -1) {
        return false;
    }

    return name.indexOf(" ") !== name.length;
}

function emailHasAtChar(email) {
    if (email.indexOf("@", 0) === -1) {
        return false;
    }

    return true;
}