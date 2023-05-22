window.onload = function () {
    console.log("DOM fully loaded")

    const themeButton = document.querySelector('#toggleswitch');
    const page = document.querySelector('body');
    const img = document.querySelector('.theme-icon');
    let currTheme = "";

    const handleClick = () => {
        currTheme = page.getAttribute("class");
        page.classList.toggle('dark-theme');
        page.classList.toggle('lite');

        img.src = currTheme === "dark-theme"
            ? "src/images/icons/day-and-night_lite.png"
            : "src/images/icons/day-and-night_dark-theme.png";

        currTheme = currTheme === "dark-theme" ? "lite" : "dark-theme";
        saveThemeToSession(currTheme);
    }

    themeButton.addEventListener("click", handleClick)
}

function saveThemeToSession(theme) {
    const Request = new XMLHttpRequest();
    Request.open("POST", "./index.php?theme=" + theme, true);
    Request.send();
}