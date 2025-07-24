document.getElementById("signupform").addEventListener("submit", function (e) {
        e.preventDefault(); // prevent form submission

        // Get field values
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();

        // Error elements
        const nameError = document.getElementById("nameError");
        const emailError = document.getElementById("emailError");
        const passwordError = document.getElementById("passwordError");

        // Clear previous errors
        nameError.textContent = "";
        emailError.textContent = "";
        passwordError.textContent = "";

        // Regex patterns
        const namePattern = /^[A-Za-z\s\-]+$/;
        const emailPattern = /^[a-zA-Z0-9_.%-]+@[a-zA-Z0-9.-]+\.[a-z]{2,3}$/;
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!]).{8,}$/;

        switch (true) {
          case name === "":
            nameError.textContent = "Name is required.";
            break;

          case !namePattern.test(name):
            nameError.textContent = "Name must contain only letters and spaces.";
            break;

          case email === "":
            emailError.textContent = "Email is required.";
            break;

          case !emailPattern.test(email):
            emailError.textContent = "Enter a valid email (e.g., name@example.com)";
            break;

          case password === "":
            passwordError.textContent = "Message cannot be empty.";
            break;

          case !passwordPattern.test(password):
            passwordError.textContent = "Enter a valid password (e.g., Arig@123)";
            break;

          default:
            document.getElementById("signupform").reset();
            setTimeout(() => {
            window.location.href="SignIn.html"
        }, 1000);
        }
      });
