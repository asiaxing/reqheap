<?php
// Lost Password
?>
<h2><?php print $lng[7][1] // Lost Password ?></h2>
<form method="post">
    <p>
        <label><?php print $lng[7][2] // Email ?>:</label>
        <input type="email" name="email" required>
    </p>
    <p>
        <input type="submit" value="<?php print $lng[7][3] // Recover ?>">
    </p>
</form>
