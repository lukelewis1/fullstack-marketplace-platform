// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
// This file contains js that dynamically validates user inputs for the sign up form

const letters = /^[A-Za-z\s]+$/;

const form = document.getElementById("reg-form");

const password = document.getElementById("pass")
const passwordConfirm = document.getElementById("pass-con");
const firstName = document.getElementById("fname");
const lastName = document.getElementById("lname");
const role = document.getElementById("role");

const password_error = document.getElementById("password-error")
const passwordConfirm_error = document.getElementById("password-confirm-error");
const firstName_error = document.getElementById("fname-error");
const lastName_error = document.getElementById("lname-error");
const role_error = document.getElementById("role-error");

password.addEventListener("input", () => {
    if (password.value.length < 8) {
        password_error.textContent = "Password must be at least 8 characters.";
    } else {
        password_error.textContent = "";
    }
});

passwordConfirm.addEventListener("input", () => {
    if (passwordConfirm.value === password.value) {
        passwordConfirm_error.textContent = "";
    } else {
        passwordConfirm_error.textContent = "Passwords do not match, please ensure they are the same."
    }
});

firstName.addEventListener("input", () => {
    if (!letters.test(firstName.value.trim())) {
        firstName_error.textContent = "First name can only contain letters and spaces."
    } else {
        firstName_error.textContent = "";
    }
});

lastName.addEventListener("input", () => {
    if (!letters.test(lastName.value.trim())) {
        lastName_error.textContent = "Last name can only contain letters and spaces."
    } else {
        lastName_error.textContent = "";
    }
});

role.addEventListener("input", () => {
    if (role.value.length > 25) {
        role_error.textContent = "Max length of 25 characters."
    } else {
        role_error.textContent = "";
    }
});

form.addEventListener("submit", function (event) {
    const errorSpans = document.querySelectorAll(".error-msg");

    let hasErrors = Array.from(errorSpans).some(span => span.textContent.length > 0);

    if (hasErrors) {
        event.preventDefault();
    }
})