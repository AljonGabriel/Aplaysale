    <?php 

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regeneration"])) {
        $_SESSION["last_regeneration"] = time();
        echo "Session started or last regeneration not set. Current time: " . date('Y-m-d H:i:s', time()) . "<br>";
    } else {
        $interval = 10;

        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            session_regenerate_id(true);
            $_SESSION["last_regeneration"] = time();
            echo "Session ID regenerated. Current time: " . date('Y-m-d H:i:s', time()) . "<br>";
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        $_SESSION["last_regeneration"] = time();
        echo "Session started or last regeneration not set. Current time: " . date('Y-m-d H:i:s', time()) . "<br>";
    } else {
        $interval = 10;

        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            session_regenerate_id(true);
            $_SESSION["last_regeneration"] = time();
            echo "Session ID regenerated. Current time: " . date('Y-m-d H:i:s', time()) . "<br>";
        }
    }
}


    function regenerate_session_id_loggedin() {

        session_regenerate_id(true);

        $userId = $_SESSION["user_id"];
        $newSessionId = session_create_id(true);
        $sessionId = $newSessionId . "_" . $userId;
        session_id($sessionId);
        
        $_SESSION["last_regeneration"] = time();

    }


    function regenerate_session_id() {
        session_regenerate_id(true);
        $_SESSION["last_regeneration"] = time();

    }