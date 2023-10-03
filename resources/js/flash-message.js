const flashMessage = document.getElementById("flash-message");
const flashMessageBtn = document.getElementById("flash-message-btn");

flashMessageBtn.addEventListener("click", () => {
    flashMessage.remove();
});
