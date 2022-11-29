let deleteAllBtn = document.getElementById("delete-all");
deleteAllBtn.addEventListener("click", deleteAll);

function deleteAll() {
    let allCheckboxes = document.getElementsByName("select-user");
    let checkUsersIds = getCheckedUsers(allCheckboxes);

    for (var i = 0; i < checkUsersIds.length; i++) {
        console.log(checkUsersIds[i]);
    }
}

function getCheckedUsers(allCheckboxes) {
    let checkUsersIds = new Array();

    for (var i = 0; i < allCheckboxes.length; i++) {
        if (allCheckboxes[i].checked === true) {
            checkUsersIds.push(allCheckboxes[i].value);
        }
    }

    return checkUsersIds;
}