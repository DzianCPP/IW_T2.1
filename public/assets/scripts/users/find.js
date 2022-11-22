function findUserById()
{
    let input = document.getElementById("main-input-userID");
    let id = input.value;
    let url = "/user/id?userID=" + id;

    fetch(url)
        .then(() => {
            window.location = url;
        });
}