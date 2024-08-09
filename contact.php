<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in'])) {
    // If not logged in, redirect to the login page
    header('Location: Login.html');
    
    exit;
}


?>
<!DOCTYPE html>
<html>
<body>
  <h1>Upload Your Car Images</h1>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="photo1">Photo 1:</label>
    <input type="file" id="photo1" name="photo1"><br><br>
    
    <label for="photo2">Photo 2:</label>
    <input type="file" id="photo2" name="photo2"><br><br>
    
    <input type="submit" value="Upload">
  </form>

  <script>
    function showAlert(message) {
      alert(message);
      window.location.href = 'index.html';
    }
  </script>
</body>
</html>