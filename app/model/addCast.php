<?php
class Cast
{
    private $conn;
    private $table = 'cast_members';

    public $name;
    public $role;
    public $age;
    public $gender;
    public $birthdate;
    public $birthplace;
    public $photo;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insert()
    {
        $query = "INSERT INTO " . $this->table . " (name, role, age, gender, birthdate, birthplace, photo) VALUES (:name, :role, :age, :gender, :birthdate, :birthplace, :photo)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':age', $this->age);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':birthdate', $this->birthdate);
        $stmt->bindParam(':birthplace', $this->birthplace);
        $stmt->bindParam(':photo', $this->photo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->connect();

    $cast = new Cast($db);
    $cast->name = $_POST['name'];
    $cast->role = $_POST['role'];
    $cast->age = $_POST['age'];
    $cast->gender = $_POST['gender'];
    $cast->birthdate = $_POST['birthdate'];
    $cast->birthplace = $_POST['birthplace'];

    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . '_' . $_FILES['photo']['name'];
        $target = 'uploads/' . $photo;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $cast->photo = $photo;
        } else {
            echo "Failed to upload image";
            exit;
        }
    }

    if ($cast->insert()) {
        echo '<script>
    callToast("Cast member added successfully.", "success");
</script>';
    } else {
        echo '<script>
    callToast("Failed to add cast member.", "error");
</script>';
    }
}
