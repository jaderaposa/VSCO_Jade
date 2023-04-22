<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- HTML -->
    <select id="country">
      <option value="">Select Country</option>
      <option value="usa">USA</option>
      <option value="canada">Canada</option>
    </select>
    
    <select id="place" disabled>
      <option value="">Select Place</option>
    </select>
    
    <select id="address" disabled>
      <option value="">Select Address</option>
    </select>

</body>
<script>
    // JavaScript with jQuery
    $(document).ready(function() {
      // Disable dependent select boxes
      $('#place').prop('disabled', true);
      $('#address').prop('disabled', true);
    
      // Handle Country change
      $('#country').change(function() {
        // Enable Place select box
        $('#place').prop('disabled', false);
    
        // Remove previous options
        $('#place').find('option').remove();
    
        // Add default option
        $('#place').append('<option value="">Select Place</option>');
    
        // Get selected Country value
        var country = $('#country').val();
    
        // Populate Place select box
        if (country == 'usa') {
          $('#place').append('<option value="new-york">New York</option>');
          $('#place').append('<option value="los-angeles">Los Angeles</option>');
        } else if (country == 'canada') {
          $('#place').append('<option value="toronto">Toronto</option>');
          $('#place').append('<option value="vancouver">Vancouver</option>');
        }
      });
    
      // Handle Place change
      $('#place').change(function() {
        // Enable Address select box
        $('#address').prop('disabled', false);
    
        // Remove previous options
        $('#address').find('option').remove();
    
        // Add default option
        $('#address').append('<option value="">Select Address</option>');
    
        // Get selected Place value
        var place = $('#place').val();
    
        // Populate Address select box
        if (place == 'new-york') {
          $('#address').append('<option value="123 main st">123 Main St</option>');
          $('#address').append('<option value="456 broadway">456 Broadway</option>');
        } else if (place == 'los-angeles') {
          $('#address').append('<option value="789 hollywood blvd">789 Hollywood Blvd</option>');
          $('#address').append('<option value="101 sunset blvd">101 Sunset Blvd</option>');
        } else if (place == 'toronto') {
          $('#address').append('<option value="111 queen st w">111 Queen St W</option>');
          $('#address').append('<option value="222 bay st">222 Bay St</option>');
        } else if (place == 'vancouver') {
          $('#address').append('<option value="333 granville st">333 Granville St</option>');
          $('#address').append('<option value="444 burrard st">444 Burrard St</option>');
        }
      });
    });
    </script>
</html>