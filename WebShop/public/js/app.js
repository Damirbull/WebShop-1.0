document.addEventListener('DOMContentLoaded', function () {
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    // Check if the sign-up mode is saved in Local Storage
    if (localStorage.getItem("sign-up-mode")) {
        container.classList.add("sign-up-mode");
    }

    sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
        // Hide errors from the login form
        document.getElementById("login-error-container").style.display = "block";
        // Show errors for the sign-up form
        document.getElementById("signup-error-container").style.display = "none";
        // Save the sign-up mode in Local Storage
        localStorage.setItem("sign-up-mode", true);
    });

    sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
        // Hide errors from the sign-up form
        document.getElementById("signup-error-container").style.display = "block";
        // Show errors for the login form
        document.getElementById("login-error-container").style.display = "none";
        // Remove the saved sign-up mode from Local Storage
        localStorage.removeItem("sign-up-mode");
    });
});
