let deleteAllBtn = document.getElementById("delete-all");
deleteAllBtn.addEventListener("click", deleteAll);

function deleteAll() {
    let allCheckboxes = document.getElementsByName("select-user");
    let checkedUsersIds = getCheckedUsers(allCheckboxes);

    if (confirm("Are you sure you want to delete these records?")) {
        let url = "/user/delete";

        let users = {};

        for (var i = 0; i < checkedUsersIds.length; i++) {
            var key = "user" + i;
            Object.defineProperty(users, key, {
                value: checkedUsersIds[i],
                enumerable: true
            });
        }

        let deleteRequest = {
            method: "DELETE",
            body: JSON.stringify(users)
        };

        fetch(url, deleteRequest)
            .then(() => {
                location.reload(true);
            });
    }
}

function getCheckedUsers(allCheckboxes) {
    let checkedUsersIds = new Array();

    for (var i = 0; i < allCheckboxes.length; i++) {
        if (allCheckboxes[i].checked === true) {
            checkedUsersIds.push(allCheckboxes[i].value);
        }
    }

    return checkedUsersIds;
}