<?php
class Department {
    private mysqli $db;
    public function __construct(mysqli $db) { $this->db = $db; }
    public function all(): array {
        return $this->db->query("SELECT d.*, COUNT(l.id) AS lecturer_count FROM departments d LEFT JOIN lecturers l ON l.department_id=d.id GROUP BY d.id ORDER BY d.department_name")->fetch_all(MYSQLI_ASSOC);
    }
    public function find(int $id): ?array {
        $stmt=$this->db->prepare("SELECT * FROM departments WHERE id=?");
        $stmt->bind_param("i",$id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }
    public function create(string $name, string $description): void {
        $stmt=$this->db->prepare("INSERT INTO departments (department_name,description) VALUES (?,?)");
        $stmt->bind_param("ss",$name,$description); $stmt->execute();
    }
    public function update(int $id,string $name,string $description): void {
        $stmt=$this->db->prepare("UPDATE departments SET department_name=?,description=? WHERE id=?");
        $stmt->bind_param("ssi",$name,$description,$id); $stmt->execute();
    }
    public function delete(int $id): void {
        $stmt=$this->db->prepare("DELETE FROM departments WHERE id=?");
        $stmt->bind_param("i",$id); $stmt->execute();
    }
}
