<?php
require_once '../../config/connection.php';

class User
{
    private $conn;
    private $table_users = "users";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // CREATE user
    public function create($name, $email, $password, $mobile_no, $pic)
    {

        try {
            $query = "INSERT INTO " . $this->table_users . " (name, email, password, status, role, pic, number) VALUES (:name, :email, :password, 'active', 'user', :pic, :mobile_no)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":pic", $pic);
            $stmt->bindParam(":mobile_no", $mobile_no);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    // READ user
    public function signin($email, $password)
    {
        try {
            $query = "SELECT id,name, password, role, pic, status FROM " . $this->table_users . " WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            return false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    // READ all users
    public function readAll()
    {
        $query = "SELECT * FROM " . $this->table_users;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE user
    public function update($id, $name, $email)
    {
        $query = "UPDATE " . $this->table_users . " SET name=:name, email=:email WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }

    // DELETE user
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_users . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
