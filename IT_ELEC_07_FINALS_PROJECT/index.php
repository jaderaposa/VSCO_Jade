<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOTA Crypts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="index.css">
</head>

<?php

$letterToName = [
    'A' => "Aghanim's Scepter", 'B' => 'Black King Bar', 'C' => 'Crystalys', 'D' => 'Daedalus',
    'E' => 'Eye of Skadi', 'F' => 'Force Staff', 'G' => 'Ghost Scepter', 'H' => 'Heart of Tarrasque',
    'I' => 'Iron Branch', 'J' => 'Javelin', 'K' => 'Kaya', 'L' => "Linken's Sphere",
    'M' => 'Mjollnir', 'N' => 'Null Talisman', 'O' => 'Octarine Core', 'P' => 'Power Treads',
    'Q' => 'Quelling Blade', 'R' => 'Radiance', 'S' => 'Shadow Blade', 'T' => 'Tango',
    'U' => 'Urn of Shadows', 'V' => 'Vanguard', 'W' => 'Wind Lace', 'X' => 'Aegis of the Immortal',
    'Y' => 'Yasha', 'Z' => 'Divine Rapier'
];

$nameToPicture = [
    "Aghanim's Scepter" => 'img/Aghanims_Scepter_icon.png', 'Black King Bar' => 'img/Black_King_Bar_icon.png',
    'Crystalys' => 'img/Crystalys_icon.png', 'Daedalus' => 'img/Daedalus_icon.png',
    'Eye of Skadi' => 'img/Eye_of_Skadi_icon.png', 'Force Staff' => 'img/Force_Staff_icon.png',
    'Ghost Scepter' => 'img/Ghost_Scepter_icon.png', 'Heart of Tarrasque' => 'img/Heart_of_Tarrasque_icon.png',
    'Iron Branch' => 'img/Iron_Branch_icon.png', 'Javelin' => 'img/Javelin_icon.png',
    'Kaya' => 'img/Kaya_icon.png', "Linken's Sphere" => 'img/Linkens_Sphere_icon.png',
    'Mjollnir' => 'img/Mjollnir_icon.png', 'Null Talisman' => 'img/Null_Talisman_icon.png',
    'Octarine Core' => 'img/Octarine_Core_icon.png', 'Power Treads' => 'img/Power_Treads_icon.png',
    'Quelling Blade' => 'img/Quelling_Blade_icon.png', 'Radiance' => 'img/Radiance_(Active)_icon.png',
    'Shadow Blade' => 'img/Shadow_Blade_icon.png', 'Tango' => 'img/Tango_icon.png',
    'Urn of Shadows' => 'img/Urn_of_Shadows_icon.png', 'Vanguard' => 'img/Vanguard_icon.png',
    'Wind Lace' => 'img/Wind_Lace_icon.png', 'Aegis of the Immortal' => 'img/Aegis_of_the_Immortal_icon.png',
    'Yasha' => 'img/Yasha_icon.png', 'Divine Rapier' => 'img/Divine_Rapier_icon.png'
];

?>

<body>
    <!-- Add this to your HTML file where you want the toggle button to appear -->
    <button id="dark-mode-toggle">
        <i class="fas fa-sun"></i> <!-- Light mode icon -->
        <i class="fas fa-moon" style="display:none;"></i> <!-- Dark mode icon -->
    </button>
    <div class="container">
        <div class="row" title="Made by Jaded Raposa">
            <div class="logo">
                <img src="img/logo.png" alt="DOTA Logo">
            </div>
            <div class="title">DOTA Crypts</div>
        </div>
        <div class="dropdown">
            <select id="action" title="Click to choose your desired action (Encrypt/Decrypt)">
                <option value="encryption" <?= (isset($_POST['action']) && $_POST['action'] == 'encryption') ? 'selected' : '' ?>>Encryption</option>
                <option value="decryption" <?= (isset($_POST['action']) && $_POST['action'] == 'decryption') ? 'selected' : '' ?>>Decryption</option>
            </select>
        </div>
        <div id="image-container" title="These images are only used for decryption. Click the images to input" class="image-container">
            <?php foreach ($nameToPicture as $name => $picturePath) : ?>
                <img src="<?= htmlspecialchars($picturePath) ?>" alt="<?= htmlspecialchars($name) ?>" class="selectable-image" style="cursor: pointer;border-radius:4px" data-value="<?= htmlspecialchars($picturePath) ?>">
            <?php endforeach; ?>
        </div>
        <div class="input-output">
            <div class="input">
                <div class="row-space-between">
                    <label for="input">INPUT</label>
                    <!-- microphone icon here -->
                    <i class="fa fa-microphone" title="Speech Recognition (No, you can't record an image lmao) : Click to start recording" id="startBtn" style="cursor: pointer;"></i>
                </div>
                <input type="hidden" id="hiddenImagePath" name="hiddenImagePath" value="">
                <input type="hidden" id="hiddenInputText" name="hiddenInputText" value="">
                <div id="input" contenteditable="true" class="input-box">
                    <?= isset($_POST['input']) && !empty($_POST['input']) ? htmlspecialchars($_POST['input']) : '<p class="placeholder" style="color: graytext;margin:0;">Enter a message to encrypt or click the images above for decrypting.&nbsp;Remove this text to begin...</p>' ?>
                </div>
            </div>
            <h1 class="arrow">&#x2794;</h1>
            <div class="output">
                <div class="row-space-between">
                    <label for="output">OUTPUT</label>
                    <!-- text to speech icon here --->
                    <div class="row-space-between">
                        <i class="fa fa-volume-up" title="Text-to-Speech (Text only Captain Obvious) : Click to play the text" id="speakBtn" style="cursor: pointer;"></i>
                        &nbsp;&nbsp;
                        <select id="voiceSelection"></select>
                    </div>
                </div>
                <div id="output" class="output-box">
                    <?= isset($outputHtml) && !empty($outputHtml) ? $outputHtml : '<span class="placeholder">Encrypted & Decrypted message will show here...</span>' ?>
                </div>
            </div>
        </div>
        <button class="submit-button" onclick="submitForm()">Initialize</button>
    </div>

    <?php
    function encrypt($text, $letterToName, $nameToPicture)
    {
        $pictures = [];
        $text = strtoupper($text); // Convert to uppercase to match mapping
        foreach (str_split($text) as $letter) {
            if (isset($letterToName[$letter])) {
                $name = $letterToName[$letter];
                if (isset($nameToPicture[$name])) {
                    $pictures[] = $nameToPicture[$name];
                }
            } else {
                // Directly append the character if it's not a letter (handles spaces and symbols)
                $pictures[] = $letter;
            }
        }
        return $pictures;
    }

    function decrypt($pictures, $nameToPicture, $letterToName)
    {
        $names = array_flip($nameToPicture);
        $letters = array_flip($letterToName);
        $text = '';
        foreach ($pictures as $picture) {
            // Check if the picture is actually a space or a special character
            if ($picture === ' ' || !isset($names[$picture])) {
                $text .= $picture; // Directly append the space or special character
            } else {
                $name = $names[$picture];
                if (isset($letters[$name])) {
                    $text .= $letters[$name];
                }
            }
        }
        return $text;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $input = $_POST['hiddenImagePath']; // Use the hidden input for image paths
        $action = $_POST['action'];
        if ($action == 'encryption') {
            $input = $_POST['hiddenInputText']; // Use the text input for encryption
            $result = encrypt($input, $letterToName, $nameToPicture);
            $outputHtml = '';
            foreach ($result as $item) {
                if (strpos($item, 'img/') === 0) { // Check if the item is an image path
                    $outputHtml .= "<img src='$item' alt=''>";
                } else { // For direct characters, encode them
                    $encodedChar = htmlspecialchars($item, ENT_QUOTES, 'UTF-8');
                    $outputHtml .= $encodedChar; // Append encoded character directly
                }
            }
            echo "<script>document.getElementById('output').innerHTML = " . json_encode($outputHtml) . ";</script>";
        }
        if ($action == 'decryption') {
            $input = $_POST['hiddenImagePath']; // Use the hidden input for image paths
            $inputParts = explode(',', $input); // Split the hidden input into individual image paths
            $outputHtml = '';
            foreach ($inputParts as $part) {
                if (strpos($part, 'img/') === 0 && file_exists($part)) { // Check if the part is an image path and exists
                    $name = array_search($part, $nameToPicture); // Find the name corresponding to the image path
                    if ($name !== false) {
                        $letter = array_search($name, $letterToName); // Find the letter corresponding to the name
                        if ($letter !== false) {
                            $outputHtml .= $letter;
                        }
                    } else {
                        // Assuming spaces/special characters are inferred, insert a space unless it's the first character
                        if (!empty($outputHtml)) {
                            $outputHtml .= ' '; // Insert space before appending next character, except at the beginning
                        }
                        $outputHtml .= $picture; // Directly append the space or special character
                    }
                }
            }
            echo "<script>document.getElementById('output').innerHTML = " . json_encode($outputHtml) . ";</script>";
        }
    }
    ?>
</body>
<script src="index.js"></script>

</html>