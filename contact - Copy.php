

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <style>
    /* Add some basic styling to make the form look decent */
    form {
      max-width: 500px;
      margin: 40px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
      display: block;
      margin-bottom: 10px;
    }
    input[type="file"] {
      margin-bottom: 20px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
<form  enctype="multipart/form-data" action="upload.php">
    <h2>Contact Us</h2>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="image1">Image 1:</label>
    <input type="file" id="image1" name="image1" accept="image/*">

    <label for="image2">Image 2:</label>
    <input type="file" id="image2" name="image2" accept="image/*">

    <input type="submit" value="Send" name="save">
</form>

  <script>
    // Add some JavaScript to handle the form submission
    document.getElementById("contact-form").addEventListener("submit", function(event) {
      event.preventDefault();
      var formData = new FormData(this);
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "contact.php", true);
      xhr.send(formData);
    });
  </script>
</body>
</html>