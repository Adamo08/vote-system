<?php

class Vote extends Model {
    protected $table = 'votes';

    public function addVote($userId, $candidateIds) {
    
        // Build the SQL query with placeholders
        $values = [];
        $placeholders = [];
        foreach ($candidateIds as $index => $candidateId) {
            $placeholders[] = "(:user_id_{$index}, :candidate_id_{$index})";
            $values[":user_id_{$index}"] = $userId;
            $values[":candidate_id_{$index}"] = $candidateId;
        }
        $placeholders = implode(", ", $placeholders);
        $sql = "INSERT INTO {$this->table} (user_id, condidat_id) VALUES {$placeholders}";
    
        // Prepare the statement
        $stmt = $this->db->prepare($sql);
    
        // Bind the parameters
        foreach ($values as $placeholder => $value) {
            $stmt->bindValue($placeholder, $value, PDO::PARAM_INT);
        }
    
        // Execute the statement
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    
    /**
     * Fonction pour obtenir les candidats votés par un utilisateur
     * @param int $id
     * @return array
     */
    public function getVotedCondidats($id) {
        // SQL query to join votes and condidats tables and select the candidates voted by the user
        $sql = "
            SELECT c.id, c.name, c.description, c.voix
            FROM votes v
            INNER JOIN condidats c ON v.condidat_id = c.id
            WHERE v.user_id = :id
        ";
        
        // Prepare the SQL statement
        $stmt = $this->db->prepare($sql);
        
        // Bind the user ID parameter
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Execute the statement
        $stmt->execute();
        
        // Fetch all results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVotedDate($id){
        try {
            $sql = "SELECT DISTINCT DATE_FORMAT(vote_date, '%d-%m-%Y') AS vote_date FROM votes WHERE user_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            // Check if there are rows returned
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['vote_date'];
            } else {
                // No rows found
                return '';
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    
    


    
}
?>
