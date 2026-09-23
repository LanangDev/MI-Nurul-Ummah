<style>
    :root {
        --hijau-nu: #0B6E4F;
        --hijau-nu-tua: #0A5A40;
        --hijau-nu-muda: #E8F5EE;
    }

    .user-card {
        border: none;
        border-radius: 14px;
        overflow: hidden;
        transition: transform .18s ease, box-shadow .18s ease;
        box-shadow: 0 2px 8px rgba(15, 40, 30, 0.08);
        background: #ffffff;
    }

    .user-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(11, 110, 79, 0.16);
    }

    /* Banner hijau atas */
    .user-card-top {
        background: linear-gradient(135deg, var(--hijau-nu) 0%, var(--hijau-nu-tua) 100%);
        height: 70px;
        position: relative;
    }

    /* Wrapper Avatar agar presisi melayang di tengah */
    .user-avatar-wrap {
        margin-top: -42px;
        display: flex;
        justify-content: center;
        position: relative;
        z-index: 2;
    }

    .user-avatar {
        width: 84px;
        height: 84px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #ffffff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.12);
        background: #ffffff;
    }

    .user-nama {
        font-weight: 600;
        font-size: 1rem;
        color: #1e2a25;
        margin-bottom: 2px;
    }

    .user-email {
        font-size: 0.8rem;
        color: #5a6b64;
        margin-bottom: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Styling Badge Role Modern */
    .user-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 0.72rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
        letter-spacing: .02em;
        line-height: 1;
    }

    .user-badge-ks {
        background: var(--hijau-nu);
        color: #ffffff;
    }

    .user-badge-guru {
        background: var(--hijau-nu-muda);
        color: var(--hijau-nu-tua);
    }

    .user-badge-other {
        background: #f1f1f1;
        color: #666666;
    }

    /* Footer Kartu & Tombol Aksi */
    .user-card-footer {
        border-top: 1px solid #f0f0f0;
        background: #fafcfb;
    }

    .user-card-footer .btn {
        border-radius: 8px;
        padding: 4px 10px;
    }

    .user-card-footer .btn-edit-user {
        border: 1px solid var(--hijau-nu);
        color: var(--hijau-nu);
        background: transparent;
    }

    .user-card-footer .btn-edit-user:hover {
        background: var(--hijau-nu);
        color: #ffffff;
    }

    .user-card-footer .btn-hapus-user {
        border: 1px solid #d64545;
        color: #d64545;
        background: transparent;
    }

    .user-card-footer .btn-hapus-user:hover {
        background: #d64545;
        color: #ffffff;
    }

    .user-empty {
        text-align: center;
        padding: 48px 16px;
        color: #8a988f;
    }

    .user-empty i {
        font-size: 2.5rem;
        color: var(--hijau-nu-muda);
        margin-bottom: 12px;
        display: block;
    }
    .btn-primary{
		background-color: var(--hijau-nu) !important;
		color: #ffffff !important;
		border-color: var(--hijau-nu) !important;
	}
	.btn-primary:hover{
		background-color: var(--hijau-nu-tua) !important;
		color: #ffffff !important;
		border-color: var(--hijau-nu-tua) !important;
	}
</style>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="card-title mb-0">Daftar User</h4>
                    <p class="text-muted mb-0" style="font-size: 0.82rem;">
                        <?= count($user) ?> user terdaftar
                    </p>
                </div>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#TambahUserModal">
                    <i class="mdi mdi-plus menu-icon"></i> Tambah User
                </button>
            </div>

            <?php if (empty($user)): ?>
                <div class="user-empty">
                    <i class="mdi mdi-account-search"></i>
                    Belum ada data user. Klik "Tambah User" untuk menambahkan.
                </div>
            <?php else: ?>
            <div class="row">
                <?php 
                $no = 1; 
                foreach($user as $row){ 
                    $role_clean = strtolower($row['role']);
                    $badge_class = 'user-badge-other';
                    if ($role_clean == 'kepala_sekolah') {
                        $badge_class = 'user-badge-ks';
                    } elseif ($role_clean == 'guru') {
                        $badge_class = 'user-badge-guru';
                    }

                    $foto_path = !empty($row['foto']) ? base_url('upload/foto_user/' . $row['foto']) : base_url('regal-1.0.0/images/faces/default-avatar.png');
                ?>
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card user-card h-100">
                        <div class="user-card-top"></div>
                        <div class="user-avatar-wrap">
                            <img src="<?= $foto_path ?>" alt="<?= htmlspecialchars($row['username']) ?>" class="user-avatar">
                        </div>
                        <div class="card-body text-center pt-2 pb-3">
                            <div class="user-nama"><?= htmlspecialchars($row['username']) ?></div>
                            <div class="user-email" title="<?= htmlspecialchars($row['email']) ?>">
                                <i class="mdi mdi-email-outline mr-1"></i><?= htmlspecialchars($row['email']) ?>
                            </div>

                            <span class="user-badge <?= $badge_class ?> mb-2">
                                <i class="mdi mdi-shield-account mr-1"></i>
                                <?= htmlspecialchars(ucwords(str_replace('_', ' ', $row['role']))) ?>
                            </span>
                        </div>
                        <div class="card-footer user-card-footer d-flex justify-content-between align-items-center py-2 px-3">
                            <small class="text-muted font-weight-bold">#<?= $no++ ?></small>
                            <div>
                                <button type="button" class="btn btn-edit-user btn-sm mr-1" data-toggle="modal"
                                    data-target="#editModal<?= $row['id_user'] ?>" title="Edit">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                                <a href="<?= base_url('Kepala_Sekolah/users/hapus/' . $row['id_user']) ?>"
                                    class="btn btn-hapus-user btn-sm" title="Hapus"
                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit per user -->
                <div class="modal fade" id="editModal<?= $row['id_user'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?= base_url('Kepala_Sekolah/users/update/' . $row['id_user']) ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($row['username']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($row['email']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Foto</label>
                                        <input type="file" name="foto" class="form-control">
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select name="role" class="form-control" required>
                                            <option value="Kepala_Sekolah" <?= strtolower($row['role']) == 'kepala_sekolah' ? 'selected' : '' ?>>Kepala Sekolah</option>
                                            <option value="Guru" <?= strtolower($row['role']) == 'guru' ? 'selected' : '' ?>>Guru</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- Modal Tambah User -->
        <div class="modal fade" id="TambahUserModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('Kepala_Sekolah/users/simpan') ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="Kepala_Sekolah">Kepala Sekolah</option>
                                    <option value="Guru">Guru</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>