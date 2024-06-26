<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOTA 2 Item Crypts</title>
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="logo">
                <img src="img/logo.png" alt="DOTA Logo">
            </div>
            <div class="title">DOTA 2 Item Crypts</div>
        </div>
        <div class="dropdown">
            <select id="action">
                <option value="encryption" <?= (isset($_POST['action']) && $_POST['action'] == 'encryption') ? 'selected' : '' ?>>Encrypt</option>
                <option value="decryption" <?= (isset($_POST['action']) && $_POST['action'] == 'decryption') ? 'selected' : '' ?>>Decrypt</option>
            </select>
        </div>
        <div class="input-output">
            <div class="input">
                <label for="input">INPUT</label>
                <textarea id="input" name="input"><?= isset($_POST['input']) ? htmlspecialchars($_POST['input']) : '' ?></textarea>
            </div>
            <h1>=</h1>
            <div class="output">
                <label for="output">OUTPUT</label>
                <div id="output" class="output-box">
                    <?= isset($outputHtml) ? $outputHtml : '' ?>
                </div>
            </div>
        </div>
        <button onclick="submitForm()">Submit</button>
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
            if (isset($names[$picture])) {
                $name = $names[$picture];
                if (isset($letters[$name])) {
                    $text .= $letters[$name];
                }
            }
        }
        return $text;
    }

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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $input = $_POST['input'];
        $action = $_POST['action'];
        if ($action == 'encryption') {
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
        } else {
            $pictures = explode(',', $input); // Assuming input pictures are comma-separated
            $result = decrypt($pictures, $nameToPicture, $letterToName);
            echo "<script>document.getElementById('output').textContent = " . json_encode($result) . ";</script>";
        }
    }
    ?>
</body>
</html>