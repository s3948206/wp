function navigateToPage() {
    const dropdown = document.getElementById("nav-dropdown");
    const selectedPage = dropdown.value;

    // Navigate to the selected page if a valid option is selected
    if (selectedPage) {
        window.location.href = selectedPage;
    }
}
