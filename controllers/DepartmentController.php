<?php
class DepartmentController {
    private Department $model;
    public function __construct(Department $model) { $this->model=$model; }
    public function index(): void { $departments=$this->model->all(); require __DIR__.'/../views/departments/index.php'; }
    public function form(?int $id=null): void {
        $department=$id ? $this->model->find($id) : null;
        if ($id && !$department) { flash('Department tidak ditemukan.','danger'); redirect('?page=departments'); }
        require __DIR__.'/../views/departments/form.php';
    }
    public function save(): void {
        $id=(int)($_POST['id'] ?? 0); $name=trim($_POST['department_name'] ?? ''); $description=trim($_POST['description'] ?? '');
        if ($name==='') { flash('Nama department wajib diisi.','danger'); redirect($id ? '?page=department-edit&id='.$id : '?page=department-create'); }
        try { $id ? $this->model->update($id,$name,$description) : $this->model->create($name,$description); flash('Department berhasil disimpan.','success'); }
        catch (mysqli_sql_exception $e) { flash('Gagal menyimpan department.','danger'); }
        redirect('?page=departments');
    }
    public function delete(int $id): void {
        try { $this->model->delete($id); flash('Department berhasil dihapus.','success'); }
        catch (mysqli_sql_exception $e) { flash('Department tidak dapat dihapus karena masih digunakan dosen.','danger'); }
        redirect('?page=departments');
    }
}
