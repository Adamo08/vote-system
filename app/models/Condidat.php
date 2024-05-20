<?php

class Condidat extends Model {
    protected $table = 'condidats';

    /**
     * Get A User By it's ID
     * @param int $id
     * @return array
    */ 
    public function getCondidatById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get All Condidats
     * @return array
    */ 
    public function getAllCondidats(){
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 
     * Fonction pour incrementer le nombre de voix d'un condidat
     * @param int $id
     * @return bool
    */
    public function incrementVoix($id) {
        // SQL query to increment the voix column by 1 for the given candidate ID
        $sql = "UPDATE condidats SET voix = voix + 1 WHERE id = :id";
        
        // Prepare the SQL statement
        $stmt = $this->db->prepare($sql);
        
        // Bind the candidate ID parameter
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Execute the statement and return the result
        return $stmt->execute();
    }

    
}


