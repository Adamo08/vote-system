<?php


class User extends Model {
    protected $table = 'users';

    /**
     * Get a user by their email.
     * @param string $email
     * @return array|false
    */ 
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get all users.
     * @return array
    */ 
    public function getAllUsers() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Function to insert a new user.
     * @param string $cne
     * @param string $fname
     * @param string $lname
     * @param string $email
     * @param string $password
     * @param string $code
     * @return bool
    */
    public function createUser($cne, $fname, $lname, $email, $password, $code) {
        // Check if email already exists
        if ($this->getUserByEmail($email)) {
            return false;
        }

        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Insert a new user
        $query = 'INSERT INTO ' . $this->table . ' (cne, fname, lname, email, password, code, status) VALUES (:cne, :fname, :lname, :email, :password, :code, "notverified")';
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':cne', $cne);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':code', $code);

        return $stmt->execute();
    }

    /**
     * Verify user by code.
     * @param string $code
     * @return bool
    */
    public function verifyUser($code) {
        $query = 'UPDATE ' . $this->table . ' SET status = "verified" WHERE code = :code AND status = "notverified"';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':code', $code);

        return $stmt->execute() && $stmt->rowCount() > 0;
    }
}
