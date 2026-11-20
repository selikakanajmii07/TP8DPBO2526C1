<?php $pageTitle='Data Dosen'; require __DIR__.'/../templates/header.php'; ?>
<div class="page-heading"><div><span class="eyebrow">MANAJEMEN AKADEMIK</span><h1>Data Dosen</h1><p>Kelola informasi dosen dan department.</p></div><a class="btn primary" href="?page=lecturer-create">+ Tambah Dosen</a></div>
<div class="panel"><div class="table-wrap"><table><thead><tr><th>ID</th><th>Nama</th><th>NIDN</th><th>Telepon</th><th>Tanggal Bergabung</th><th>Department</th><th>Aksi</th></tr></thead><tbody>
<?php if (!$lecturers): ?><tr><td colspan="7" class="empty">Belum ada data dosen. Silakan tambahkan data baru.</td></tr><?php endif; ?>
<?php foreach ($lecturers as $row): ?><tr><td><?= e($row['id']) ?></td><td><strong><?= e($row['name']) ?></strong></td><td><?= e($row['nidn']) ?></td><td><?= e($row['phone']) ?></td><td><?= e($row['join_date']) ?></td><td><?= e($row['department_name'] ?? '-') ?></td><td class="actions"><a class="btn small warning" href="?page=lecturer-edit&id=<?= e($row['id']) ?>">Edit</a><form method="post" action="?page=lecturer-delete&id=<?= e($row['id']) ?>" onsubmit="return confirm('Yakin ingin menghapus dosen ini?')"><button class="btn small danger" type="submit">Hapus</button></form></td></tr><?php endforeach; ?>
</tbody></table></div></div>
<?php require __DIR__.'/../templates/footer.php'; ?>
