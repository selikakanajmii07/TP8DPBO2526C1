<?php
class Lecturer {
    private mysqli $db;
    public function __construct(mysqli $db) { $this->db = $db; }

    public function all(): array {
        $sql = "SELECT l.*, d.department_name FROM lecturers l
                LEFT JOIN departments d ON l.department_id = d.id ORDER BY l.id DESC";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM lecturers WHERE id=?");
        $stmt->bind_param("i", $id); $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }
    public function create(array $data): void {
        $stmt = $this->db->prepare("INSERT INTO lecturers (name,nidn,phone,join_date,department_id) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssi", $data['name'], $data['nidn'], $data['phone'], $data['join_date'], $data['department_id']);
        $stmt->execute();
    }
    public function update(int $id, array $data): void {
        $stmt = $this->db->prepare("UPDATE lecturers SET name=?,nidn=?,phone=?,join_date=?,department_id=? WHERE id=?");
        $stmt->bind_param("ssssii", $data['name'], $data['nidn'], $data['phone'], $data['join_date'], $data['department_id'], $id);
        $stmt->execute();
    }
    public function delete(int $id): void {
        $stmt = $this->db->prepare("DELETE FROM lecturers WHERE id=?");
        $stmt->bind_param("i", $id); $stmt->execute();
    }
}
