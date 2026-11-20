<?php $isEdit=(bool)$lecturer; $pageTitle=$isEdit?'Edit Dosen':'Tambah Dosen'; require __DIR__.'/../templates/header.php'; ?>
<div class="page-heading"><div><span class="eyebrow">FORMULIR DOSEN</span><h1><?= $isEdit?'Edit Data Dosen':'Tambah Dosen' ?></h1><p>Lengkapi informasi dosen di bawah ini.</p></div></div>
<div class="panel form-panel"><form method="post" action="?page=lecturer-save">
<input type="hidden" name="id" value="<?= e($lecturer['id'] ?? '') ?>">
<label>Nama Dosen<input name="name" required maxlength="100" value="<?= e($lecturer['name'] ?? '') ?>" placeholder="Masukkan nama dosen"></label>
<label>NIDN<input name="nidn" required maxlength="30" value="<?= e($lecturer['nidn'] ?? '') ?>" placeholder="Masukkan NIDN"></label>
<label>Nomor Telepon<input name="phone" required maxlength="20" value="<?= e($lecturer['phone'] ?? '') ?>" placeholder="Masukkan nomor telepon"></label>
<label>Tanggal Bergabung<input type="date" name="join_date" required value="<?= e($lecturer['join_date'] ?? '') ?>"></label>
<label>Department<select name="department_id" required><option value="">-- Pilih Department --</option><?php foreach($departments as $d): ?><option value="<?= e($d['id']) ?>" <?= (string)($lecturer['department_id'] ?? '')===(string)$d['id']?'selected':'' ?>><?= e($d['department_name']) ?></option><?php endforeach; ?></select></label>
<div class="form-actions"><button class="btn primary" type="submit">Simpan</button><a class="btn secondary" href="?page=lecturers">Batal</a></div>
</form></div>
<?php require __DIR__.'/../templates/footer.php'; ?>
