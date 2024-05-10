function doMenu() {

}

function goToNewPage() {
    var selectedPage = document.getElementById("list").ariaValueMax;
    if (selectedPage !== "--select option--") {
        window.location.href = selectedPage;
    }
}