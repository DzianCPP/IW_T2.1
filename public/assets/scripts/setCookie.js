let chooseBtn = document.getElementById("choose-data-source");
chooseBtn.addEventListener("click", setCookie);

async function setCookie() {
    let dataSourceSelect = document.getElementById("select-data-source");
    let dataSource = dataSourceSelect.value;
    let cookieName = "dataSource";

    document.cookie = cookieName + "=" + dataSource;
}