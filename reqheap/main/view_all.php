<?php
// View All Requirements
// Note: db/db-projects.php is already included in index.php

$project_id = isset($_GET['project_id']) ? $_GET['project_id'] : 0;
?>
<h2><?php print $lng[17][1] // View All ?></h2>

<?php
// Display project dropdown
$projects = dbprojects_get_projects_records();
if ($projects) {
    echo "<form method='get'>";
    echo "<input type='hidden' name='inc' value='view_all'>";
    echo "<select name='project_id' onchange='this.form.submit()'>";
    echo "<option value='0'>-- " . $lng[15][28] . " --</option>";
    while ($project = $projects->fetch_object()) {
        $selected = ($project_id == $project->p_id) ? "selected" : "";
        echo "<option value='" . $project->p_id . "' $selected>" . htmlspecialchars($project->p_name) . "</option>";
    }
    echo "</select>";
    echo "</form>";
}

if ($project_id > 0) {
    echo "<p>" . $lng[4][7] . ": " . $project_id . "</p>";
    echo "<p>Requirements list will be displayed here.</p>";
}
?>
