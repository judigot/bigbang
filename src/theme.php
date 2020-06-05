<?php require './app/Initialize/Start.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './app/Setup/Initial.php'; ?>
    <link rel="stylesheet" href="css/theme.css">
</head>

<body>
    <div class="grid-container">
        <?php
        for ($i = 0; $i < 20; $i++) { ?>
            <div class="cell red-<?php echo $i + 1; ?>"><span class="shade-name"><?php echo $i === 0 ? "Red" : "Shade " . ($i + 1) ?></span></div>
            <div class="cell orange-<?php echo $i + 1; ?>"><span class="shade-name"><?php echo $i === 0 ? "Orange" : "Shade " . ($i + 1) ?></span></div>
            <div class="cell yellow-<?php echo $i + 1; ?>"><span class="shade-name"><?php echo $i === 0 ? "Yellow" : "Shade " . ($i + 1) ?></span></div>
            <div class="cell green-<?php echo $i + 1; ?>"><span class="shade-name"><?php echo $i === 0 ? "Green" : "Shade " . ($i + 1) ?></span></div>
            <div class="cell blue-<?php echo $i + 1; ?>"><span class="shade-name"><?php echo $i === 0 ? "Blue" : "Shade " . ($i + 1) ?></span></div>
            <div class="cell magenta-<?php echo $i + 1; ?>"><span class="shade-name"><?php echo $i === 0 ? "Magenta" : "Shade " . ($i + 1) ?></span></div>
            <div class="cell cyan-<?php echo $i + 1; ?>"><span class="shade-name"><?php echo $i === 0 ? "Cyan" : "Shade " . ($i + 1) ?></span></div>
        <?php } ?>
    </div>
</body>

</html>
<?php require './app/Initialize/End.php'; ?>