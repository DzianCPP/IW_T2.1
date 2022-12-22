$(document).ready(function() {
    $("#choose-data-source").click(setCookie);
});

function setCookie() {
    let dataSourceSelect = document.getElementById("select-data-source");
    let dataSource = dataSourceSelect.value;
    let cookieName = "dataSource";

    document.cookie = cookieName + "=" + dataSource;
}