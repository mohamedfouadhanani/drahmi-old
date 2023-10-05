const menuBTN = document.getElementById("menu-btn");

const barsIcon = document.getElementById("bars-icon");
const xmarkIcon = document.getElementById("xmark-icon");

const smallScreenNavbar = document.getElementById("small-screen-navbar");

let navBarIsClosed = true;

menuBTN.addEventListener("click", () => {
    navBarIsClosed = !navBarIsClosed;
    if (navBarIsClosed) {
        // HIDE SMALL SCREEN NAVBAR
        smallScreenNavbar.classList.add("hidden");
        smallScreenNavbar.classList.remove("flex");

        // SHOW THE BARS ICON
        barsIcon.classList.remove("hidden");

        // HIDE THE XMARK ICON
        xmarkIcon.classList.add("hidden");
    } else {
        // SHOW SMALL SCREEN NAVBAR
        smallScreenNavbar.classList.remove("hidden");
        smallScreenNavbar.classList.add("flex");

        // HIDE THE BARS ICON
        barsIcon.classList.add("hidden");

        // SHOW THE XMARK ICON
        xmarkIcon.classList.remove("hidden");
    }
    menuBTN.blur();
});
