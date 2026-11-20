<?php $isEdit=(bool)$department; $pageTitle=$isEdit?'Edit Department':'Tambah Department'; require __DIR__.'/../templates/header.php'; ?>
<div class="page-heading"><div><span class="eyebrow">FORMULIR DEPARTMENT</span><h1><?= $isEdit?'Edit Department':'Tambah Department' ?></h1><p>Masukkan nama dan deskripsi department.</p></div></div>
<div class="panel form-panel"><form method="post" action="?page=department-save"><input type="hidden" name="id" value="<?= e($department['id'] ?? '') ?>">
<label>Nama Department<input name="department_name" required maxlength="100" value="<?= e($department['department_name'] ?? '') ?>" placeholder="Contoh: Ilmu Komputer"></label>
<label>Deskripsi<textarea name="description" rows="4" placeholder="Deskripsi singkat department"><?= e($department['description'] ?? '') ?></textarea></label>
<div class="form-actions"><button class="btn primary" type="submit">Simpan</button><a class="btn secondary" href="?page=departments">Batal</a></div></form></div>
<?php require __DIR__.'/../templates/footer.php'; ?>
