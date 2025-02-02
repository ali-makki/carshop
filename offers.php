

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
<html>
    <head>
        <title> Car Shop </title>
    
          <style>
     body {
    font-family: 'Nobile', Helvetica, Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  
  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top-left-radius: 1%;
    border-bottom-right-radius: 20%;
    height: 0.75cm;
    background: linear-gradient(to right, #f1efef,red, #000000);
    padding: 20px 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  }
  
  .search-bar {
    display: flex;
    justify-content: flex-end;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 5px;
    padding: 5px;
  }
  
  .search-bar input[type="text"] {
    border: none;
    outline: none;
    padding: 5px;
    flex-grow: 1;
    align-items: end;
  }
  
  .search-bar button[type="submit"] {
    background-color: #4CAF50;
    border: none;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .search-bar button[type="submit"]:hover {
    background-color: #3e8e41;
  }
  
  .navbar ul {
    display: flex;
    align-items: center;
    list-style: none;
    margin-left: 280;
    padding: 0;
  }
  
  .navbar li {
    margin-right: 20px;
  }
  
  .navbar a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  .navbar a:hover {
    color: #000;
  }
  
  .cart,
  .user,
  .wishlist,
  .notifications {
    position: relative;
    color: #fff;
  }
  
  .cart .item-count,
  .notification-count {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: red;
    color: #fff;
    padding: 5px;
    border-radius: 50%;
    font-size: 12px;
  }
  
  .user .dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    display: none;
  }
  
  .user:hover .dropdown {
    display: block;
  }
  
  .user .dropdown ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .user .dropdown li {
    margin: 0;
    padding: 10px;
    border-bottom: 1px solid #ddd;
  }
  
  .user .dropdown li:last-child {
    border-bottom: none;
  }
  
  .user .dropdown li a {
    color: #494646;
    text-decoration: none;
  }
  
  .user .dropdown li a:hover {
    color: #000;
  }
  /* Logo styles */
  .navbar-logo {
    display: flex;
    align-items: center;
    height: 5rem;
    margin-right: 1rem;
  }
  
  .navbar-logo img {
    margin-top: 0px;
    height: auto;
    max-height: 84%;
  }
  
  .container {
    
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 10px;
    height: 100vh;
  }
  
  .item {
    margin-right: 10%;
    margin-left: 5%;
    width: 90%;
    margin-top: 1cm;
    padding: 10px;
    position: relative;
    margin-bottom: 10px;
    background: linear-gradient(to top, rgb(155, 91, 91), #f80101);
    border-top-left-radius: 20px;
    border-bottom-right-radius: 20px;
    border: 1px solid black;
    box-sizing: border-box;
  }
  
  .image-container {
    position: relative;
    width: 90%;
    height: auto;
    margin-left: 10%;
    margin-top: 3%;
  }
  
  img {
    display: block;
    width: 90%;
    height: 90%;
    border-radius: 10px;
  }
  
  .btn {
    display: block;
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #f44336;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  .body
  {
    background: linear-gradient(to bottom, #f1efef, #000000 );
  }
  </style>
<div class="navbar">
    <div class="navbar-logo">
        <img src="car.jpg" alt="Company Logo">
      </div>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="Offers.php">Offers</a></li>
        <li><a href="Login.html">Login</a></li>
        <li><a href="contact.php">Conctact</a></li>
    </ul>
    <div>
    </div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div class="Search -bar">
    <form action="download - Copy.php">
        <button type="Submit">download all offers</button>
    </div>
    </form>
   

    <div class="cart">
        <i class="fas fa-shopping-cart"></i>
        
    </div>
    <div class="user">
        <i class="fas fa-user"></i>
        <div class="dropdown">
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
            </ul>
        </div>
    </div>
    <div class="wishList">
        <i class="fas fa-heart"></i>
    </div>
    <div class="notifcation">
        <i class="fas fa-bell"></i>
        
    </div>
</div>
</head>    <?php
    // Check if the username cookie is set
    if (isset($_COOKIE['username'])) {
      // Get the username from the cookie
      $username = $_COOKIE['username'];

      // Display a hello message
      echo '<h1>Hello ' . $username . '!</h1>';
    } else {
      // Redirect to the login page if the cookie is not set
      header('Location: login.php');
      exit;
    }
    ?>
<body class="body">
    <div class="container">
      <form action="benzoffers - Copy.php">
        <div class="item item1">
          <div class="image-container">
            <img src="Benzcls.jpg" alt="Benz" height="80%" width="90%" style="border-radius: 10px;">
            <button class="btn">Marecedes-Benz Offers</button>
          </div></form>
        </div>
        <form action="bmw - Copy.php">
        <div class="item item2">
          <div class="image-container">
            <img src="BMW.jpg" alt="BMW" height="80%" width="90%"style="border-radius: 10px;">
            <button class="btn">BMW Offers</button>
          </div>
        </div></form>
       
        <form action="roveroffers.php">
        <div class="item item5">
          <div class="image-container">
            <img src="Rover.jpg" alt="Rover" height="80%" width="90%"style="border-radius: 10px;">
            <button class="btn">RangeRover Offers</button>
          </div>
        </div>
       </form>
      </div>
</body>
</html>
