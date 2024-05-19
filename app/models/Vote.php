<?php

class Vote extends Model {
    protected $table = 'votes';

    // Function Pour inserer une nouvelle vote
    public function addVote($userId, $productId) {
        $sql = "INSERT INTO {$this->table} (user_id, product_id) VALUES (:user_id, :product_id, :vote_value)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    
}
?>
