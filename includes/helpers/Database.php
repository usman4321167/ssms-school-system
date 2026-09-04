<?php
/**
 * Database Helper - Database operations
 * Smart School Management System
 */

class Database {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Execute SELECT query
     */
    public function select($query, $params = []) {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Fetch single record
     */
    public function selectOne($query, $params = []) {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Insert record
     */
    public function insert($table, $data) {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = implode(', ', array_fill(0, count($data), '?'));
            $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array_values($data));
            
            return ['success' => true, 'id' => $this->pdo->lastInsertId()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Update record
     */
    public function update($table, $data, $where, $whereParams = []) {
        try {
            $setClause = implode(', ', array_map(function($key) {
                return "$key = ?";
            }, array_keys($data)));
            
            $query = "UPDATE $table SET $setClause WHERE $where";
            $params = array_merge(array_values($data), $whereParams);
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            
            return ['success' => true, 'affected' => $stmt->rowCount()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Delete record
     */
    public function delete($table, $where, $whereParams = []) {
        try {
            $query = "DELETE FROM $table WHERE $where";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($whereParams);
            
            return ['success' => true, 'affected' => $stmt->rowCount()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Count records
     */
    public function count($table, $where = "", $params = []) {
        try {
            $query = "SELECT COUNT(*) as total FROM $table";
            if ($where) {
                $query .= " WHERE $where";
            }
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            $result = $stmt->fetch();
            
            return $result['total'] ?? 0;
        } catch (PDOException $e) {
            return 0;
        }
    }

    /**
     * Get PDO instance
     */
    public function getPDO() {
        return $this->pdo;
    }
}
?>
