<?php
// Import
?>
<h2><?php print $lng[2][37] // Import ?></h2>
<p><?php print $lng[34][11] // Accepted CSV format ?></p>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="import_file" accept=".csv">
    <input type="submit" value="<?php print $lng[34][3] // Upload ?>">
</form>
