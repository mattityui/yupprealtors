function checkPasswordsMatch() {
    const passwordField = document.getElementById("pass");
    const confirmPasswordField = document.getElementById("c_pass");
    const errorMessage = document.getElementById("passwordMatchError");

    if (passwordField.value !== confirmPasswordField.value) {
        errorMessage.style.display = "block";
        confirmPasswordField.setCustomValidity("Passwords do not match.");
    } else {
        errorMessage.style.display = "none";
        confirmPasswordField.setCustomValidity("");
    }
}

// Add event listeners to the password and confirm password fields
document.getElementById("pass").addEventListener("input", checkPasswordsMatch);
document
    .getElementById("c_pass")
    .addEventListener("input", checkPasswordsMatch);

var passwordField = document.getElementById("login-pass");
var togglePassword = document.getElementById("togglePassword1");

togglePassword.addEventListener("click", function () {
    if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
    }
});

var passwordField1 = document.getElementById("pass");
var togglePassword1 = document.getElementById("togglePassword2");

var passwordField2 = document.getElementById("c_pass");
var togglePassword2 = document.getElementById("togglePassword3");

togglePassword1.addEventListener("click", function () {
    togglePasswordVisibility(passwordField1, togglePassword1);
});

togglePassword2.addEventListener("click", function () {
    togglePasswordVisibility(passwordField2, togglePassword2);
});

function togglePasswordVisibility(passwordField, togglePassword) {
    if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
    }
}
// function checkLogin() {
//   if (localStorage.getItem("login") != null) {
// let u = localStorage.getItem("login");
// let d = JSON.parse(u);

// let firstNameSentenceCase =
//   d.firstName.charAt(0).toUpperCase() + d.firstName.slice(1).toLowerCase();

// document.getElementById(
//   "login-nav-item"
// ).innerHTML = `Welcome, <span id="loggedInUserName">${firstNameSentenceCase} </span>!`;

// document.getElementById("login-nav-item").href = "HTML/account.html";

// document.getElementById(
//   "loginStatus"
// ).innerHTML = `Welcome, <span id="loggedInUserName">${firstNameSentenceCase} </span>!`;

// document.getElementById("loginStatus").href = "HTML/account.html";
//     $("#login-nav-item").text("Account");
//     document.getElementById("login-nav-item").href = "HTML/account.html";
//     $("#loginStatus").text("Account");
//     document.getElementById("login-nav-item").href = "HTML/account.html";
//   }
// }

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const sign_up_btn2 = document.querySelector("#sign-up-btn2");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});
sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

sign_up_btn2.addEventListener("click", () => {
    container.classList.add("sign-up-mode2");
});
sign_in_btn2.addEventListener("click", () => {
    container.classList.remove("sign-up-mode2");
});

function addAccount(e) {
    e.preventDefault();

    var firstName = document.getElementById("fname").value;
    var lastName = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("c_pass").value;

    // Validate password and confirm password
    if (password !== confirmPassword) {
        showErrorModal("Password and confirm password do not match");
        return;
    }

    var user = {
        firstName: firstName,
        lastName: lastName,
        email: email,
        password: password,
    };

    var json = JSON.stringify(user);
    localStorage.setItem(email, json);

    document.getElementById("sign-up-form").reset();
    console.log("User added:", user);
}

var signUpForm = document.getElementById("sign-up-form");
signUpForm.addEventListener("submit", addAccount);

function validateLogin() {
    event.preventDefault();

    var email = document.getElementById("login-email").value;
    var password = document.getElementById("login-pass").value;
    var remember = document.getElementById("remember").checked;

    var user = localStorage.getItem(email);
    var data = JSON.parse(user);

    if (user == null) {
        showErrorModal("Wrong email or password");
    } else if (email == data.email && password == data.password) {
        window.location.replace("../index.html");
        console.log("Success!");
        if (remember) {
            localStorage.setItem("login", user);
            sessionStorage.removeItem("login");
        } else {
            sessionStorage.setItem("login", user);
            localStorage.removeItem("login");
        }
    } else {
        showErrorModal("Wrong email or password");
    }
}

function showErrorModal(message) {
    var errorModal = new bootstrap.Modal(
        document.getElementById("errorModal"),
        {
            keyboard: false,
            backdrop: "static",
        }
    );
    var errorModalMessage = document.getElementById("errorModalMessage");
    errorModalMessage.textContent = message;
    errorModal.show();
}
