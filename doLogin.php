<?php

use APP\Database;

class DoLogin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($post)
    {
        $username = isset($post['username']) ? htmlspecialchars($post['username']) : null;
        $password = isset($post['password']) ? htmlspecialchars($post['password']) : null;

        if ($username && $password) {
            try {
                $statement = $this->db->connection()->prepare("
                    SELECT * FROM users WHERE username = :username
                ");

                $statement->execute([
                    'username' => $username
                ]);

                $user = $statement->fetch();

                if ($user && count($user)) {
                    if ($user['password'] === $password) {
                        session_start();
                        $_SESSION['user_id'] = $user['id'];
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }

            } catch (PDOException $e) {
                return false;
            }

        } else {
            return false;
        }

        return true;
    }
}

$register = new DoLogin();
if ($register->register($_POST)) {
    echo "User added!";
} else {
    echo "User added error!";
}