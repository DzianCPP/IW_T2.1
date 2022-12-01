function sendDeleteRequest(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        let url = "/user/delete";
        let userInfo = {
            userID: id
        };
        let deleteRequest = {
            method: "DELETE",
            body: JSON.stringify(userInfo)
        };

        fetch(url, deleteRequest)
            .then(() => {
                location.reload();
            });
    }
}