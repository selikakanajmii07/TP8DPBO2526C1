<?php
session_start();
require_once __DIR__.'/config/database.php';
require_once __DIR__.'/models/Lecturer.php';
require_once __DIR__.'/models/Department.php';
require_once __DIR__.'/controllers/LecturerController.php';
require_once __DIR__.'/controllers/DepartmentController.php';

function e($value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function redirect(string $url): void { header('Location: '.$url); exit; }
function flash(string $message, string $type='success'): void { $_SESSION['flash']=['message'=>$message,'type'=>$type]; }
function take_flash(): ?array { $f=$_SESSION['flash'] ?? null; unset($_SESSION['flash']); return $f; }

try {
    $database=new Database(); $db=$database->connect();
    $lecturerModel=new Lecturer($db); $departmentModel=new Department($db);
    $lecturerController=new LecturerController($lecturerModel,$departmentModel);
    $departmentController=new DepartmentController($departmentModel);
    $page=$_GET['page'] ?? 'lecturers'; $id=isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        if ($page==='lecturer-save') $lecturerController->save();
        if ($page==='department-save') $departmentController->save();
    }
    switch ($page) {
        case 'lecturer-create': $lecturerController->form(); break;
        case 'lecturer-edit': $lecturerController->form($id); break;
        case 'lecturer-delete':
            if ($_SERVER['REQUEST_METHOD']!=='POST') redirect('?page=lecturers');
            $lecturerController->delete($id); break;
        case 'departments': $departmentController->index(); break;
        case 'department-create': $departmentController->form(); break;
        case 'department-edit': $departmentController->form($id); break;
        case 'department-delete':
            if ($_SERVER['REQUEST_METHOD']!=='POST') redirect('?page=departments');
            $departmentController->delete($id); break;
        default: $lecturerController->index(); break;
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo '<h2>Terjadi kesalahan aplikasi</h2><p>'.htmlspecialchars($e->getMessage(),ENT_QUOTES,'UTF-8').'</p><p>Periksa konfigurasi database dan pastikan file SQL sudah diimpor.</p>';
}
