<?php $pageTitle='Data Department'; require __DIR__.'/../templates/header.php'; ?>
<div class="page-heading"><div><span class="eyebrow">MANAJEMEN AKADEMIK</span><h1>Data Department</h1><p>Kelola department dan lihat jumlah dosen di setiap department.</p></div><a class="btn primary" href="?page=department-create">+ Tambah Department</a></div>
<div class="panel"><div class="table-wrap"><table><thead><tr><th>ID</th><th>Nama Department</th><th>Deskripsi</th><th>Jumlah Dosen</th><th>Aksi</th></tr></thead><tbody>
<?php if (!$departments): ?><tr><td colspan="5" class="empty">Belum ada department.</td></tr><?php endif; ?>
<?php foreach($departments as $d): ?><tr><td><?= e($d['id']) ?></td><td><strong><?= e($d['department_name']) ?></strong></td><td><?= e($d['description']) ?></td><td><?= e($d['lecturer_count']) ?></td><td class="actions"><a class="btn small warning" href="?page=department-edit&id=<?= e($d['id']) ?>">Edit</a><form method="post" action="?page=department-delete&id=<?= e($d['id']) ?>" onsubmit="return confirm('Yakin menghapus department ini?')"><button class="btn small danger" type="submit">Hapus</button></form></td></tr><?php endforeach; ?>
</tbody></table></div></div>
<?php require __DIR__.'/../templates/footer.php'; ?>
