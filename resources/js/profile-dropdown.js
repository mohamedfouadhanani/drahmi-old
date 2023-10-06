const profileDropdownBtn = document.getElementById("profile-dropdown-btn");
const profileDropdownList = document.getElementById("profile-dropdown-list");

let profileDropdownIsClosed = true;

profileDropdownBtn.addEventListener("click", () => {
    profileDropdownIsClosed = !profileDropdownIsClosed;
    if (profileDropdownIsClosed) {
        // HIDE DROPDOWN LIST
        profileDropdownList.classList.add("hidden");
        profileDropdownBtn.blur();
    } else {
        // SHOW DROPDOWN LIST
        profileDropdownList.classList.remove("hidden");
    }
});
