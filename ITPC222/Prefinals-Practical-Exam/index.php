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
  </head>
  <body>

    <div class="title-bar">
      <h1>Plant Information System</h1>
    </div>

    <div class='sidebar'>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>



















    <!-- <div class="container">
      <h3>Dynamic Dependent Select Box - <a href="https://www.cluemediator.com" target="_blank" rel="noopener noreferrer">Clue Mediator</a></h3>
          <br />
      <form action="" method="post">
      <div class="col-md-4">
      
      
      <label for="regions">Region</label>
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
              <br />
      
      
      <label for="municipalities">Municipality</label>
      <select class="form-control" id="municipalities">
        <option value="">Select Municipality</option>
      </select>
              <br />
      
      
      <label for="barangays">Barangay</label>
      <select class="form-control" id="barangays">
        <option value="">Select Barangay</option>
      </select>
      
      </div>
      </form>
    </div> -->
  </body>
</html>

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