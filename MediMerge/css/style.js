const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");

signupBtn.onclick = () => {
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
};

loginBtn.onclick = () => {
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
};

signupLink.onclick = () => {
  signupBtn.click();
  return false;
};

// Get the login and signup forms
const loginForm2 = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');

// Get the email and password inputs
const loginEmail = document.getElementById('login-email');
const loginPassword = document.getElementById('login-password');
const signupEmail = document.getElementById('signup-email');
const signupPassword = document.getElementById('signup-confirm-password');

// Get the user data from localStorage
let users = JSON.parse(localStorage.getItem('users')) || [];

// Add event listener to the login form
loginForm2.addEventListener('submit', (e) => {
  e.preventDefault();
  const email = loginEmail.value;
  const password = loginPassword.value;

  // Check if the user exists in the users array
  const user = users.find((u) => u.email === email && u.password === password);
  if (user) {
    // Redirect to the main page
    window.location.href = 'medico.html';
  } else {
    alert('Invalid email or password');
  }
});

// Add event listener to the signup form
signupForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const email = signupEmail.value;
  const password = signupPassword.value;

  // Check if the user already exists
  const existingUser = users.find((u) => u.email === email);
  if (existingUser) {
    alert('Email already registered');
    return;
  }

  // Add the new user to the users array and save it to localStorage
  users.push({ email, password });
  localStorage.setItem('users', JSON.stringify(users));

  // Redirect to the main page
  window.location.href = 'medico.html';
});