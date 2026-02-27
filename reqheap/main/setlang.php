<?php
    // Language switch handler
    // 设置语言切换处理器

    session_start();

    if (!empty($_GET['lang'])) {
        $lang = $_GET['lang'];
        // Validate language code
        $allowed_langs = array('en', 'de', 'fr', 'it', 'zh');
        if (in_array($lang, $allowed_langs)) {
            $_SESSION['globel_lang'] = $lang;
            $_SESSION['chlang'] = $lang;
        }
    }

    // Redirect back to previous page or index
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '../index.php';

    // If redirect doesn't start with / or ../, add ../
    if (!empty($redirect) && $redirect[0] != '/' && substr($redirect, 0, 2) != '..') {
        $redirect = '../' . $redirect;
    }

    header("Location: $redirect");
    exit;
?>
