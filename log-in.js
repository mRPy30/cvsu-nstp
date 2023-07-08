function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  var passwordToggle = document.querySelector(".password-toggle");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordToggle.innerHTML = '<i class="fa-solid fa-eye"></i>';
    passwordToggle.querySelector("i").classList.add("active");
  } else {
    passwordInput.type = "password";
    passwordToggle.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
  }

   // Clear previous error messages
   errorElement.innerHTML = "";

   // Perform validation
   if (username === "") {
     errorElement.innerHTML = "Please enter a username";
     return;
   }
 
   if (password === "") {
     errorElement.innerHTML = "Please enter a password";
     return;
   }
 
   // Validation passed, do something (e.g., submit the form)
   console.log("Username: " + username);
   console.log("Password: " + password);
   document.getElementById("loginForm").submit();
 }
