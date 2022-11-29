let checkAll = document.getElementById("check-all");
checkAll.addEventListener("change", selectAll);

function selectAll() {
    let checkboxes = document.getElementsByName("select-user");
    let checkAllBox = document.getElementById("check-all");

    if (checkAllBox.checked) {
    for (var i = 0; i < checkboxes.length; ++i) {
            checkboxes[i].checked = true;
        }
    } else {
        for (var i = 0; i < checkboxes.length; ++i) {
            checkboxes[i].checked = false;
        }
    }
}