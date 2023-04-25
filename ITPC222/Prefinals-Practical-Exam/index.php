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

        <div class="registration">
          <div class="form">
            <form method="post">
              <div class="name">
                <div>
                  <label for="firstname">First Name:</label>
                  <input type="text" id="firstname" name="firstname">
                </div>
                <div>
                  <label for="middlename">Middle Name:</label>
                  <input type="text" id="middlename" name="middlename">
                </div>
                <div>
                  <label for="lastname">Last Name:</label>
                  <input type="text" id="lastname" name="lastname"><br>
                </div>
              </div>
              <div class="2nd-row" style="display:flex; gap:20px;">
              <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br>
              </div>
              <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br>
              </div>
              <div>
              <label for="contact-number">Contact Number:</label>
              <input type="tel" id="contact-number" name="contact-number">
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
                </div>
                <div class="controls">
                  <a href="#" id="add_more_fields"><i class="fa fa-plus"></i></a>
                  <a href="#" id="remove_fields"><i class="fa fa-minus"></i></a>
                </div>
              </div>

            </div>
              <div class="submit">
                <input type="submit" value="REGISTER" style="background-color: #057303;border: 2px solid black;color: white;font-size: 19px;padding:5px;">
              </div>
            </form>
        </div>
      </div>

  </body>
</html>

<script src="js/script.js"></script>

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