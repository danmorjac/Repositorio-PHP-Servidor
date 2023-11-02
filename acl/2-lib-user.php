<?php
class User {
  // (A) CONSTRUCTOR - CONNECT TO THE DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error;
  function __construct () {
    $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct () {
    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  // (C) RUN SQL QUERY
  function query ($sql, $data=null) : void {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }

  // (D) LOGIN
  function login ($email, $password) {
    // (D1) GET USER & CHECK PASSWORD
    $this->query("SELECT * FROM `users` JOIN `roles` USING (`role_id`) WHERE `user_email`=?", [$email]);
    $user = $this->stmt->fetch();
    $valid = is_array($user);
    if ($valid) { $valid = $password == $user["user_password"]; }
    if (!$valid) {
      $this->error = "Invalid email/password";
      return false;
    }

    // (D2) GET PERMISSIONS
    $user["permissions"] = [];
    $this->query(
      "SELECT * FROM `roles_permissions` r
       LEFT JOIN `permissions` p USING (`perm_id`)
       WHERE r.`role_id`=?", [$user["role_id"]]
    );
    while ($r = $this->stmt->fetch()) {
      if (!isset($user["permissions"][$r["perm_mod"]])) {
        $user["permissions"][$r["perm_mod"]] = [];
      }
      $user["permissions"][$r["perm_mod"]][] = $r["perm_id"];
    }

    // (D3) DONE
    $_SESSION["user"] = $user;
    unset($_SESSION["user"]["user_password"]);
    return true;
  }

  // (E) CHECK PERMISSION
  function check ($module, $perm) {
    $valid = isset($_SESSION["user"]);
    if ($valid) { $valid = in_array($perm, $_SESSION["user"]["permissions"][$module]); }
    if ($valid) { return true; }
    else { $this->error = "No permission to access."; return false; }
  }

  // (F) GET USER
  function get ($email) {
    if (!$this->check("USR", 1)) { return false; }
    $this->query("SELECT * FROM `users` JOIN `roles` USING (`role_id`) WHERE `user_email`=?", [$email]);
    return $this->stmt->fetch();
  }

  // (G) SAVE USER
  function save ($email, $password, $role, $id=null) {
    if (!$this->check("USR", 2)) { return false; }
    $sql = $id==null
      ? "INSERT INTO `users` (`user_email`, `user_password`, `role_id`) VALUES (?,?,?)"
      : "UPDATE `users` SET `user_email`=?, `user_password`=?, `role_id`=? WHERE `user_id`=?" ;
    $data = [$email, $password, $role];
    if ($id!=null) { $data[] = $id; }
    $this->query($sql, $data);
    return true;
  }

  // (H) DELETE USER
  function del ($id) {
    if (!$this->check("USR", 3)) { return false; }
    $this->query("DELETE FROM `users` WHERE `user_id`=?", [$id]);
    return true;
  }
}

// (I) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "acl");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (J) START!
$_USR = new User();
session_start();