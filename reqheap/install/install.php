<?php
// Database initialization for ReqHeap

// Get config from environment or config.ini
$db_host = getenv('DB_HOST') ?: 'db';
$db_user = getenv('DB_USER') ?: 'reqheap';
$db_password = getenv('DB_PASSWORD') ?: 'reqheap_password';
$db_name = getenv('DB_NAME') ?: 'reqheap';
$root_password = getenv('MYSQL_ROOT_PASSWORD') ?: 'root_password';

$debug = true;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ReqHeap Installation</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .success { color: green; }
        .error { color: red; }
        .info { color: blue; }
        pre { background: #f4f4f4; padding: 10px; }
    </style>
</head>
<body>
    <h1>ReqHeap Installation</h1>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // Include database functions
    include_once('/var/www/html/db/db-init.php');

    if ($_POST['action'] === 'install') {
        echo "<h2>Installing database...</h2>";

        // Try to initialize database
        $result = dbinit_database(
            $db_host,
            'root',
            $root_password,
            $db_user,
            $db_password,
            $db_name,
            $debug
        );

        if ($result) {
            echo "<p class='success'>Database initialized successfully!</p>";
            echo "<p>Default admin credentials:</p>";
            echo "<pre>Username: admin<br>Password: admin</pre>";
            echo "<p><a href='index.php'>Go to ReqHeap</a></p>";
        } else {
            echo "<p class='error'>Database initialization failed!</p>";
        }
    }
} else {
    // Check if database is already configured
    echo "<p class='info'>Checking database connection...</p>";

    // Test connection
    $link = @mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if ($link) {
        echo "<p class='success'>Database connection OK!</p>";

        // Check if tables exist
        $result = mysqli_query($link, "SHOW TABLES");
        $table_count = mysqli_num_rows($result);

        if ($table_count > 0) {
            echo "<p class='info'>Database already has $table_count tables.</p>";
            echo "<p><a href='index.php'>Go to ReqHeap</a></p>";
        } else {
            echo "<form method='post'>";
            echo "<input type='hidden' name='action' value='install'>";
            echo "<button type='submit'>Initialize Database</button>";
            echo "</form>";
        }
        mysqli_close($link);
    } else {
        echo "<p class='error'>Cannot connect to database!</p>";
        echo "<p>Error: " . mysqli_connect_error() . "</p>";
        echo "<p>Please check your config.ini settings.</p>";
    }
}
?>
</body>
</html>
