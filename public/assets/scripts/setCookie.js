document.getElementById("choose-data-source").addEventListener("click", setCookie);

async function setCookie() {
    let dataSourceSelect = document.getElementById("select-data-source");
    let dataSource = dataSourceSelect.value;
    let cookieName = "dataSource";

    document.cookie = cookieName + "=" + dataSource;
}