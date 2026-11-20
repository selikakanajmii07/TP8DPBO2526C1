<?php
class LecturerController {
    private Lecturer $model; private Department $departments;
    public function __construct(Lecturer $model, Department $departments) { $this->model=$model; $this->departments=$departments; }
    public function index(): void { $lecturers=$this->model->all(); require __DIR__.'/../views/lecturers/index.php'; }
    public function form(?int $id=null): void {
        $lecturer=$id ? $this->model->find($id) : null;
        if ($id && !$lecturer) { flash('Data dosen tidak ditemukan.','danger'); redirect('?page=lecturers'); }
        $departments=$this->departments->all();
        require __DIR__.'/../views/lecturers/form.php';
    }
    public function save(): void {
        $id=(int)($_POST['id'] ?? 0);
        $data=[
            'name'=>trim($_POST['name'] ?? ''), 'nidn'=>trim($_POST['nidn'] ?? ''),
            'phone'=>trim($_POST['phone'] ?? ''), 'join_date'=>$_POST['join_date'] ?? '',
            'department_id'=>(int)($_POST['department_id'] ?? 0)
        ];
        if (!$data['name'] || !$data['nidn'] || !$data['phone'] || !$data['join_date'] || !$data['department_id']) {
            flash('Semua field wajib diisi.','danger'); redirect($id ? '?page=lecturer-edit&id='.$id : '?page=lecturer-create');
        }
        try { $id ? $this->model->update($id,$data) : $this->model->create($data); flash('Data dosen berhasil disimpan.','success'); }
        catch (mysqli_sql_exception $e) { flash('Gagal menyimpan data. Pastikan NIDN belum digunakan.','danger'); }
        redirect('?page=lecturers');
    }
    public function delete(int $id): void { $this->model->delete($id); flash('Data dosen berhasil dihapus.','success'); redirect('?page=lecturers'); }
}
