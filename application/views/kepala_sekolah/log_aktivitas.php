<style>
    :root {
        --hijau-nu: #0B6E4F;
        --hijau-nu-tua: #0A5A40;
        --hijau-nu-muda: #E8F5EE;
    }

    .log-card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 2px 12px rgba(15, 40, 30, 0.06);
        background: #ffffff;
    }

    .log-title {
        color: #1e2a25;
        font-weight: 600;
        margin-bottom: 1.25rem;
    }

    /* Filter Box Style */
    .log-filter-box {
        background: #fafcfb;
        border: 1px solid #e8f0eb;
        border-radius: 10px;
        padding: 18px;
        margin-bottom: 24px;
    }

    .form-control-nu {
        border-radius: 8px;
        border: 1px solid #dcdcdc;
        font-size: 0.85rem;
        height: 40px;
        transition: all 0.2s ease;
    }

    .form-control-nu:focus {
        border-color: var(--hijau-nu);
        box-shadow: 0 0 0 0.2rem rgba(11, 110, 79, 0.15);
    }

    .btn-nu-primary {
        background-color: var(--hijau-nu);
        border-color: var(--hijau-nu);
        color: #ffffff;
        border-radius: 8px;
        height: 40px;
        padding: 0 18px;
        font-weight: 500;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-nu-primary:hover {
        background-color: var(--hijau-nu-tua);
        border-color: var(--hijau-nu-tua);
        color: #ffffff;
    }

    .btn-nu-light {
        background-color: #f1f3f2;
        border-color: #f1f3f2;
        color: #555555;
        border-radius: 8px;
        height: 40px;
        padding: 0 16px;
        font-weight: 500;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
    }

    .btn-nu-light:hover {
        background-color: #e2e6e4;
        color: #333333;
    }

    /* Custom Table Styling */
    .table-custom {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-custom thead th {
        background-color: #f4f8f5;
        color: #2c3e35;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        border-bottom: 2px solid #e1ebe5;
        padding: 12px 16px;
    }

    .table-custom tbody tr {
        transition: background-color 0.15s ease;
    }

    .table-custom tbody tr:hover {
        background-color: #f8faf9;
    }

    .table-custom tbody td {
        padding: 14px 16px;
        vertical-align: middle;
        font-size: 0.875rem;
        color: #4a5568;
        border-bottom: 1px solid #f0f4f2;
    }

    /* Status Dot & Badges */
    .badge-status-online {
        background-color: var(--hijau-nu-muda);
        color: var(--hijau-nu-tua);
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .badge-status-offline {
        background-color: #f1f1f1;
        color: #777777;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }

    .dot-online {
        background-color: #28a745;
        box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.2);
    }

    .dot-offline {
        background-color: #a0a0a0;
    }

    /* Role Badges */
    .role-badge-ks {
        background-color: var(--hijau-nu);
        color: #ffffff;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.75rem;
    }

    .role-badge-guru {
        background-color: var(--hijau-nu-muda);
        color: var(--hijau-nu-tua);
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.75rem;
    }

    .role-badge-other {
        background-color: #f1f1f1;
        color: #555;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.75rem;
    }

    /* Empty State */
    .log-empty {
        text-align: center;
        padding: 48px 16px;
        color: #8a988f;
    }

    .log-empty i {
        font-size: 2.8rem;
        color: var(--hijau-nu-muda);
        margin-bottom: 12px;
        display: block;
    }
</style>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card log-card">
        <div class="card-body">
            <h4 class="log-title"><?= htmlspecialchars($judul ?? 'Log Aktivitas') ?></h4>

            <!-- Filter Section -->
            <div class="log-filter-box">
                <form method="get" action="<?= base_url('Kepala_Sekolah/log_aktivitas') ?>">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3 mb-2 mb-md-0">
                            <label class="form-label font-weight-bold text-muted small mb-1">Status Aktivitas</label>
                            <select name="status" class="form-control form-control-nu" onchange="this.form.submit()">
                                <option value="Semua" <?= ($status_aktif ?? '') == 'Semua' ? 'selected' : '' ?>>Semua Status</option>
                                <option value="Online" <?= ($status_aktif ?? '') == 'Online' ? 'selected' : '' ?>>Online</option>
                                <option value="Offline" <?= ($status_aktif ?? '') == 'Offline' ? 'selected' : '' ?>>Offline</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2 mb-md-0">
                            <label class="form-label font-weight-bold text-muted small mb-1">Cari Username</label>
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control form-control-nu" placeholder="Ketik username..."
                                    value="<?= htmlspecialchars($cari ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-nu-primary mr-2">
                                <i class="mdi mdi-magnify"></i> Cari
                            </button>
                            <a href="<?= base_url('Kepala_Sekolah/log_aktivitas') ?>" class="btn btn-nu-light">
                                <i class="mdi mdi-refresh mr-1"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Table Section -->
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th style="width: 60px;" class="text-center">No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Waktu Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($log)): ?>
                            <?php $no = 1; foreach ($log as $row): ?>
                                <?php
                                    // Role Badge Logic
                                    $role_clean = strtolower($row['role']);
                                    $role_class = 'role-badge-other';
                                    if ($role_clean == 'kepala_sekolah') {
                                        $role_class = 'role-badge-ks';
                                    } elseif ($role_clean == 'guru') {
                                        $role_class = 'role-badge-guru';
                                    }

                                    // Status Badge Logic
                                    $is_online = strtolower($row['aktivitas']) == 'online';
                                ?>
                                <tr>
                                    <td class="text-center font-weight-bold text-muted"><?= $no++ ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-account-circle-outline mr-2 text-muted" style="font-size: 1.2rem;"></i>
                                            <span class="font-weight-600 text-dark"><?= htmlspecialchars($row['username']) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="<?= $role_class ?>">
                                            <?= htmlspecialchars(ucwords(str_replace('_', ' ', $row['role']))) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($is_online): ?>
                                            <span class="badge-status-online">
                                                <span class="status-dot dot-online"></span> Online
                                            </span>
                                        <?php else: ?>
                                            <span class="badge-status-offline">
                                                <span class="status-dot dot-offline"></span> Offline
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-muted">
                                        <i class="mdi mdi-clock-outline mr-1"></i>
                                        <?= $row['waktu'] ? date('d M Y, H:i', strtotime($row['waktu'])) : '-' ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">
                                    <div class="log-empty">
                                        <i class="mdi mdi-history"></i>
                                        <div>Belum ada log aktivitas yang tercatat.</div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>