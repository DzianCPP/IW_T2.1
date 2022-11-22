function sendDeleteRequest(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        let url = "/user/delete";
        let userInfo = {
            userID: id
        };
        let putRequest = {
            method: "DELETE",
            body: JSON.stringify(userInfo)
        };

        fetch(url, putRequest)
            .then(() => {
                window.location = "/users/show";
            });
    }
}