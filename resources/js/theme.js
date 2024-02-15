const themeBtn = document.getElementById("theme-btn");

const localStorageThemeKey = "drahmi-theme";
const lightTheme = "light";
const darkTheme = "dark";

themeBtn.addEventListener("click", () => {
    let localStorageTheme = localStorage.getItem(localStorageThemeKey);

    if (localStorageTheme == lightTheme) {
        localStorage.setItem(localStorageThemeKey, darkTheme);
    } else {
        localStorage.setItem(localStorageThemeKey, lightTheme);
    }

    themeBtn.blur();
    updateUI();
});

function initialize() {
    const localStorageTheme = localStorage.getItem(localStorageThemeKey);

    if (localStorageTheme == null) {
        localStorage.setItem(localStorageThemeKey, lightTheme);
    }
}

function updateUI() {
    const localStorageTheme = localStorage.getItem(localStorageThemeKey);

    if (localStorageTheme == lightTheme) {
        document.documentElement.classList.remove("dark");
    } else {
        document.documentElement.classList.add("dark");
    }
}

initialize();
updateUI();
