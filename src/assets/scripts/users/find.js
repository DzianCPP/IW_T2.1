$(document).ready(function() {
    $("#main-page-find-button").click(findUserById);
})

function findUserById()
{
    let input = document.getElementById("main-input-userID");
    let id = input.value;
    let url = "/user/" + id;

    window.location = url;
}