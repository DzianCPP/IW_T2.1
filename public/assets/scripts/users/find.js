let findButton = document.getElementById("main-page-find-button");
findButton.addEventListener("click", findUserById);

function findUserById()
{
    let input = document.getElementById("main-input-userID");
    let id = input.value;
    let url = "/user/" + id;

    fetch(url)
        .then(() => {
            window.location = url;
        });
}