document.getElementById("signupform").addEventListener("submit", function (e) {
        e.preventDefault(); // prevent form submission

        // Get field values
        const username = document.getElementById("username").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
        const gender = document.querySelector('input[name="gender"]:checked');
        const city = document.getElementById("city").value.trim();

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

        // Validation
        let isValid = true;

        if (username === "") {
            nameError.textContent = "Name is required.";
            isValid = false;
        } else if (!namePattern.test(username)) {
            nameError.textContent = "Name must contain only letters and spaces.";
            isValid = false;
        }

        if (email === "") {
            emailError.textContent = "Email is required.";
            isValid = false;
        } else if (!emailPattern.test(email)) {
            emailError.textContent = "Enter a valid email (e.g., name@example.com)";
            isValid = false;
        }

        if (password === "") {
            passwordError.textContent = "Password is required.";
            isValid = false;
        } else if (!passwordPattern.test(password)) {
            passwordError.textContent = "Enter a valid password (e.g., Arig@123)";
            isValid = false;
        }

        if (!gender) {
            alert("Please select a gender.");
            isValid = false;
        }

        if (city === "") {
            alert("Please select a city.");
            isValid = false;
        }

        // If validation passes, submit the form
        if (isValid) {
            // Create FormData object
            const formData = new FormData();
            formData.append("username", username);
            formData.append("email", email);
            formData.append("password", password);
            formData.append("gender", gender.value);
            formData.append("city", city);

            // Submit to PHP file
            fetch("../Backend/Connect.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                alert(result);
                if (result.includes("✅")) {
                    // Reset form and redirect on success
                    document.getElementById("signupform").reset();
                    setTimeout(() => {
                        window.location.href = "SignIn.html";
                    }, 1000);
                }
            })
            .catch(error => {
                console.error("❌ Error:", error);
                alert("Something went wrong. Please try again.");
            });
        }
      });
