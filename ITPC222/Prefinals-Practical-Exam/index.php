<?php
// Include the database connection file
include('db_config.php');
?>
 
<html>
  <head>
    <title>Dynamic Dependent Select Box using jQuery, Ajax and PHP - Clue Mediator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="css/css.css" type="text/css"
          rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ee7690777c.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="title-bar">
      <h1>Plant Information System</h1>
    </div>

    <div class='sidebar'>
      <div class='profile'>
        <div class='circle-img'>
          <img src="images/jaded.jpg" alt="profile image">
        </div>
        <div class='profile-details'>
          <h1>Jade Raposa</h1>
          <h2>BSIT-2 Student</h2>
          <h1>Divine Word College of Legazpi</h1>
        </div>
      </div>

      <div class='navbar'>
        <h1>Navigations</h1>
      </div>

      <div>
        <nav>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="index.php"  class="active">Registration Form</a></li>
          </ul>
        </nav>
        <script>
          // Get the current URL
          var currentUrl = window.location.href;

          // Loop through each link in the navigation menu
          $('nav ul li a').each(function() {

            // If the link's URL matches the current URL, add the "active" class
            if ($(this).attr('href') === currentUrl) {
              $(this).addClass('active');
            }

          });
        </script>
      </div>
        
    </div>

    
      <div class="container">
        <div class="container-title">
        <h1>Registration Form</h1>
        </div>

        <hr>

        <div class="registration" style="justify-content: center;align-items: center;display: flex;">
          <div class="form">
            <form method="post">
              <div class="name">
                <div>
                  <label for="firstname">First Name:</label>
                  <input type="text" id="firstname" name="firstname" required>
                </div>
                <div>
                  <label for="middlename">Middle Name:</label>
                  <input type="text" id="middlename" name="middlename"  required>
                </div>
                <div>
                  <label for="lastname">Last Name:</label>
                  <input type="text" id="lastname" name="lastname" required><br>
                </div>
              </div>
              <div class="2nd-row" style="display:flex; gap:20px;">
              <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" min="4" max="12" minlength="4" maxlength="12" required>
                <br>
              </div>
              <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
              </div>
              <div>
              <label for="contact-number">Contact Number:</label>
              <input type="tel" id="contact-number" name="contact-number" max="12" maxlength="12" required>
              </div>
              </div>
              <div class="sex">
                <label for="sex">Sex:</label>
                <input type="radio" id="male" name="sex" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="sex" value="female">
                <label for="female">Female</label>
              </div>

              <div class="address">
                <label for="regions">Region:&nbsp;</label>
                <select class="form-control" id="regions">
                  <option value="">Select Region</option>
                  <?php
                  $query = "SELECT * FROM regions";
                  $result = $con->query($query);
                  if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                  echo '<option value="'.$row['id'].'">'.$row['region_name'].'</option>';
                  }
                  }else{
                  echo '<option value="">Region not available</option>';
                  }
                  ?>
                </select>

                <label for="municipalities">Municipality:&nbsp;</label>
                <select class="form-control" id="municipalities">
                  <option value="">Select Municipality</option>
                </select>

                <label for="barangays">Barangay:&nbsp;</label>
                <select class="form-control" id="barangays">
                  <option value="">Select Barangay</option>
                </select>
              </div>
              <div>
              <label style="margin-right:10px;" for="birthday">Birthday:</label>
              <input type="date" id="birthday" name="birthday">
              </div>
              <div class="upload-image">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" style="width: 30%;border: none;">
              </div>

            <div class="dynamic-add&remove-row">
              <div class="wrapper">
                <h1>Hobbies:</h1>
                <div id="survey_options">
                  <input type="text" name="survey_options[]" class="survey_options" size="50" placeholder="">
                  <input type="text" name="survey_options[]" class="survey_options" size="50" placeholder="">
                  <input type="text" name="survey_options[]" class="survey_options" size="50" placeholder="">
                </div>
                <div class="controls">
                  <a href="#" id="add_more_fields"><i class="fa fa-plus"></i></a>
                  <a href="#" id="remove_fields"><i class="fa fa-minus"></i></a>
                </div>
              </div>

              <div id="input-container" style="display: block;padding: 10px;">
                <div class="input-row" style="margin: 0;">
                  <div style="display: flex;justify-content: space-between;align-items: baseline;margin-bottom:0;">
                  <h1>Likes</h1>
                  <button id="add-btn" style="border: none;background: transparent;padding: 0;margin: 0;"><i class="fa fa-plus"></i></button>
                  </div>
                    <div class="margin-5" style="display:flex;margin-bottom: 5px;">
                      <input type="text" name="input[]" placeholder="">
                      <button class="remove-btn" style="border: none;background: transparent;padding: 0;margin: 0;"><i class="fa fa-minus"></i></button>
                    </div>
                    <div class="margin-5" style="display:flex;margin-bottom: 5px;">
                      <input type="text" name="input[]" placeholder="">
                      <button class="remove-btn" style="border: none;background: transparent;padding: 0;margin: 0;"><i class="fa fa-minus"></i></button>
                    </div>
                    <div class="margin-5" style="display:flex;margin-bottom: 5px;">
                      <input type="text" name="input[]" placeholder="">
                      <button class="remove-btn" style="border: none;background: transparent;padding: 0;margin: 0;"><i class="fa fa-minus"></i></button>
                    </div>

                </div>
              </div>
            </div>

              <div class="submit">
                <span id="username-alert" style="color: red;float: left;"></span>
                <span id="password-alert" style="color: red;float: left;"></span>
                <input type="submit" id="submit-btn" onclick="checkIfExists()" value="REGISTER" style="background-color: #057303;border: 2px solid black;color: white;font-size: 19px;padding:5px;">
              </div>
            </form>
        </div>
      </div>

  </body>
</html>

<!-- js script link -->
<script src="js/script.js"></script>

<!-- dynamic another -->
<script src="js/daor.js"></script>

<!-- password alert msg -->
<script>
  var passwordInput = document.getElementById("password");
  var submitBtn = document.getElementById("submit-btn");

  submitBtn.addEventListener("click", function() {
    var password = passwordInput.value;

    if (password.length < 8) {
      alert("Password must be at least 8 characters long.");
      return;
    }

    // Do something else if input is valid...
  });
</script>

<!-- check existing values -->
<script>
function checkIfExists() {
  var inputVal = document.getElementById("username").value;
  var existingVals = ["jade", "glaiza", "jesus"]; // replace with your existing values
  if (existingVals.includes(inputVal)) {
    alert("Value already exists!");
  } 
}
</script>
 <!-- strong password -->
<script>
  var passwordInput = document.getElementById("password");
  var passwordAlert = document.getElementById("password-alert");

  passwordInput.addEventListener("input", function() {
    var password = passwordInput.value;
    var passwordStrength = calculatePasswordStrength(password);

    if (passwordStrength < 3) {
      passwordAlert.textContent = "Password must be at least 8 characters long and contain uppercase and lowercase letters, numbers, and special characters.";
    } else {
      passwordAlert.textContent = "";
    }
  });

  function calculatePasswordStrength(password) {
    var strength = 0;

    // Check for length of at least 8 characters
    if (password.length >= 8) {
      strength++;
    }

    // Check for uppercase letters
    if (/[A-Z]/.test(password)) {
      strength++;
    }

    // Check for lowercase letters
    if (/[a-z]/.test(password)) {
      strength++;
    }

    // Check for numbers
    if (/\d/.test(password)) {
      strength++;
    }

    // Check for special characters
    if (/[$-/:-?{-~!"^_`\[\]]/.test(password)) {
      strength++;
    }

    return strength;
  }
</script>

<!-- usernames alert -->
<script>
  var usernameInput = document.getElementById("username");
  var usernameAlert = document.getElementById("username-alert");

  usernameInput.addEventListener("input", function() {
    if (usernameInput.value.length < 4) {
      usernameAlert.textContent = "Username must be at least 4 characters long.";
    } else {
      usernameAlert.textContent = "";
    }
  });
</script>

<!-- dynamic dependent select box -->
<script type="text/javascript">
  $(document).ready(function(){
    // Region dependent ajax
    $("#regions").on("change",function(){
      var regionId = $(this).val();
      $.ajax({
        url :"action.php",
        type:"POST",
        cache:false,
        data:{regionId:regionId},
        success:function(data){
          $("#municipalities").html(data);
          $('#barangays').html('<option value="">Select Barangay</option>');
        }
      });
    });
 
    // Municipality dependent ajax
    $("#municipalities").on("change", function(){
      var munId = $(this).val();
      $.ajax({
        url :"action.php",
        type:"POST",
        cache:false,
        data:{munId:munId},
        success:function(data){
          $("#barangays").html(data);
        }
      });
    });
  });
</script>