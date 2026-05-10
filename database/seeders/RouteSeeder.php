<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('routes')->delete();

        $routes = [
            // Users
            [
                'name' => 'user.index',
                'method' => 'GET',
                'module' => 'Users',
                'description' => 'Menampilkan daftar user',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'user.create',
                'method' => 'GET',
                'module' => 'Users',
                'description' => 'Menampilkan form untuk membuat user baru',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'user.store',
                'method' => 'POST',
                'module' => 'Users',
                'description' => 'Menyimpan data user baru',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'user.edit',
                'method' => 'GET',
                'module' => 'Users',
                'description' => 'Menampilkan form untuk mengedit data user',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'user.update',
                'method' => 'PUT',
                'module' => 'Users',
                'description' => 'Memperbarui data user',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'user.destroy',
                'method' => 'DELETE',
                'module' => 'Users',
                'description' => 'Menghapus data user',
                'created_by' => null,
                'updated_by' => null,
            ],

            // Change Password
            [
                'name' => 'user.change-password',
                'method' => 'GET',
                'module' => 'Users',
                'description' => 'Menampilkan form untuk mengubah password user',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'user.update-password',
                'method' => 'PUT',
                'module' => 'Users',
                'description' => 'Memperbarui password user',
                'created_by' => null,
                'updated_by' => null,
            ],

            // Roles
            [
                'name' => 'role.index',
                'method' => 'GET',
                'module' => 'Roles',
                'description' => 'Menampilkan daftar role',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'role.create',
                'method' => 'GET',
                'module' => 'Roles',
                'description' => 'Menampilkan form untuk membuat role baru',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'role.store',
                'method' => 'POST',
                'module' => 'Roles',
                'description' => 'Menyimpan data role baru',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'role.edit',
                'method' => 'GET',
                'module' => 'Roles',
                'description' => 'Menampilkan form untuk mengedit data role',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'role.update',
                'method' => 'PUT',
                'module' => 'Roles',
                'description' => 'Memperbarui data role',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'role.destroy',
                'method' => 'DELETE',
                'module' => 'Roles',
                'description' => 'Menghapus data role',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'role.menu.show',
                'method' => 'GET',
                'module' => 'Roles',
                'description' => 'Menampilkan konfigurasi menu role',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'role.menu.update',
                'method' => 'POST',
                'module' => 'Roles',
                'description' => 'Memperbarui konfigurasi menu role',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'role.permission.show',
                'method' => 'GET',
                'module' => 'Roles',
                'description' => 'Menampilkan konfigurasi permission role',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'role.permission.update',
                'method' => 'POST',
                'module' => 'Roles',
                'description' => 'Memperbarui konfigurasi permission role',
                'created_by' => null,
                'updated_by' => null,
            ],

            // Menus
            [
                'name' => 'menu.index',
                'method' => 'GET',
                'module' => 'Menus',
                'description' => 'Menampilkan daftar menu',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'menu.create',
                'method' => 'GET',
                'module' => 'Menus',
                'description' => 'Menampilkan form untuk membuat menu baru',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'menu.store',
                'method' => 'POST',
                'module' => 'Menus',
                'description' => 'Menyimpan data menu baru',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'menu.edit',
                'method' => 'GET',
                'module' => 'Menus',
                'description' => 'Menampilkan form untuk mengedit data menu',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'menu.update',
                'method' => 'PUT',
                'module' => 'Menus',
                'description' => 'Memperbarui data menu',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'menu.destroy',
                'method' => 'DELETE',
                'module' => 'Menus',
                'description' => 'Menghapus data menu',
                'created_by' => null,
                'updated_by' => null,
            ],

            // Routes
            [
                'name' => 'route.index',
                'method' => 'GET',
                'module' => 'Routes',
                'description' => 'Menampilkan daftar route',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'route.create',
                'method' => 'GET',
                'module' => 'Routes',
                'description' => 'Menampilkan form untuk membuat route baru',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'route.store',
                'method' => 'POST',
                'module' => 'Routes',
                'description' => 'Menyimpan data route baru',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'route.edit',
                'method' => 'GET',
                'module' => 'Routes',
                'description' => 'Menampilkan form untuk mengedit data route',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'route.update',
                'method' => 'PUT',
                'module' => 'Routes',
                'description' => 'Memperbarui data route',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'route.destroy',
                'method' => 'DELETE',
                'module' => 'Routes',
                'description' => 'Menghapus data route',
                'created_by' => null,
                'updated_by' => null,
            ],

            // Impersonate
            [
                'name' => 'impersonate',
                'method' => 'POST',
                'module' => 'Impersonate',
                'description' => 'Memulai impersonasi pengguna',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'name' => 'leave-impersonate',
                'method' => 'GET',
                'module' => 'Impersonate',
                'description' => 'Menghentikan impersonasi pengguna',
                'created_by' => null,
                'updated_by' => null,
            ],

            // Approval - Workflow Definition
            ['name' => 'approval.workflow-definition.index',   'method' => 'GET',    'module' => 'Approval', 'description' => 'Daftar workflow definition',        'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-definition.create',  'method' => 'GET',    'module' => 'Approval', 'description' => 'Form buat workflow definition',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-definition.store',   'method' => 'POST',   'module' => 'Approval', 'description' => 'Simpan workflow definition',         'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-definition.edit',    'method' => 'GET',    'module' => 'Approval', 'description' => 'Form ubah workflow definition',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-definition.update',  'method' => 'PUT',    'module' => 'Approval', 'description' => 'Perbarui workflow definition',       'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-definition.destroy', 'method' => 'DELETE', 'module' => 'Approval', 'description' => 'Hapus workflow definition',          'created_by' => null, 'updated_by' => null],

            // Approval - Workflow Approval
            ['name' => 'approval.workflow-approval.index',   'method' => 'GET',    'module' => 'Approval', 'description' => 'Daftar workflow approval',        'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval.create',  'method' => 'GET',    'module' => 'Approval', 'description' => 'Form buat workflow approval',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval.store',   'method' => 'POST',   'module' => 'Approval', 'description' => 'Simpan workflow approval',         'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval.edit',    'method' => 'GET',    'module' => 'Approval', 'description' => 'Form ubah workflow approval',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval.update',  'method' => 'PUT',    'module' => 'Approval', 'description' => 'Perbarui workflow approval',       'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval.destroy', 'method' => 'DELETE', 'module' => 'Approval', 'description' => 'Hapus workflow approval',          'created_by' => null, 'updated_by' => null],

            // Approval - Approval Status
            ['name' => 'approval.approval-status.index',   'method' => 'GET',    'module' => 'Approval', 'description' => 'Daftar approval status',        'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approval-status.create',  'method' => 'GET',    'module' => 'Approval', 'description' => 'Form buat approval status',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approval-status.store',   'method' => 'POST',   'module' => 'Approval', 'description' => 'Simpan approval status',         'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approval-status.edit',    'method' => 'GET',    'module' => 'Approval', 'description' => 'Form ubah approval status',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approval-status.update',  'method' => 'PUT',    'module' => 'Approval', 'description' => 'Perbarui approval status',       'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approval-status.destroy', 'method' => 'DELETE', 'module' => 'Approval', 'description' => 'Hapus approval status',          'created_by' => null, 'updated_by' => null],

            // Approval - Approver Type
            ['name' => 'approval.approver-type.index',   'method' => 'GET',    'module' => 'Approval', 'description' => 'Daftar tipe approver',        'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approver-type.create',  'method' => 'GET',    'module' => 'Approval', 'description' => 'Form buat tipe approver',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approver-type.store',   'method' => 'POST',   'module' => 'Approval', 'description' => 'Simpan tipe approver',         'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approver-type.edit',    'method' => 'GET',    'module' => 'Approval', 'description' => 'Form ubah tipe approver',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approver-type.update',  'method' => 'PUT',    'module' => 'Approval', 'description' => 'Perbarui tipe approver',       'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approver-type.destroy', 'method' => 'DELETE', 'module' => 'Approval', 'description' => 'Hapus tipe approver',          'created_by' => null, 'updated_by' => null],

            // Approval - Workflow Approval Stage
            ['name' => 'approval.workflow-approval-stage.index',   'method' => 'GET',    'module' => 'Approval', 'description' => 'Daftar tahap workflow',        'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval-stage.create',  'method' => 'GET',    'module' => 'Approval', 'description' => 'Form buat tahap workflow',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval-stage.store',   'method' => 'POST',   'module' => 'Approval', 'description' => 'Simpan tahap workflow',         'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval-stage.edit',    'method' => 'GET',    'module' => 'Approval', 'description' => 'Form ubah tahap workflow',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval-stage.update',  'method' => 'PUT',    'module' => 'Approval', 'description' => 'Perbarui tahap workflow',       'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approval-stage.destroy', 'method' => 'DELETE', 'module' => 'Approval', 'description' => 'Hapus tahap workflow',          'created_by' => null, 'updated_by' => null],

            // Approval - Workflow Approver
            ['name' => 'approval.workflow-approver.index',   'method' => 'GET',    'module' => 'Approval', 'description' => 'Daftar workflow approver',        'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approver.create',  'method' => 'GET',    'module' => 'Approval', 'description' => 'Form buat workflow approver',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approver.store',   'method' => 'POST',   'module' => 'Approval', 'description' => 'Simpan workflow approver',         'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approver.edit',    'method' => 'GET',    'module' => 'Approval', 'description' => 'Form ubah workflow approver',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approver.update',  'method' => 'PUT',    'module' => 'Approval', 'description' => 'Perbarui workflow approver',       'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-approver.destroy', 'method' => 'DELETE', 'module' => 'Approval', 'description' => 'Hapus workflow approver',          'created_by' => null, 'updated_by' => null],

            // Approval - Delegated Approver
            ['name' => 'approval.delegated-approver.index',   'method' => 'GET',    'module' => 'Approval', 'description' => 'Daftar delegasi approver',        'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.delegated-approver.create',  'method' => 'GET',    'module' => 'Approval', 'description' => 'Form buat delegasi approver',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.delegated-approver.store',   'method' => 'POST',   'module' => 'Approval', 'description' => 'Simpan delegasi approver',         'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.delegated-approver.edit',    'method' => 'GET',    'module' => 'Approval', 'description' => 'Form ubah delegasi approver',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.delegated-approver.update',  'method' => 'PUT',    'module' => 'Approval', 'description' => 'Perbarui delegasi approver',       'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.delegated-approver.destroy', 'method' => 'DELETE', 'module' => 'Approval', 'description' => 'Hapus delegasi approver',          'created_by' => null, 'updated_by' => null],

            // Approval - Workflow Request
            ['name' => 'approval.workflow-request.index',   'method' => 'GET',    'module' => 'Approval', 'description' => 'Daftar permintaan approval',        'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-request.create',  'method' => 'GET',    'module' => 'Approval', 'description' => 'Form buat permintaan approval',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-request.store',   'method' => 'POST',   'module' => 'Approval', 'description' => 'Simpan permintaan approval',         'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-request.show',    'method' => 'GET',    'module' => 'Approval', 'description' => 'Detail permintaan approval',         'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.workflow-request.destroy', 'method' => 'DELETE', 'module' => 'Approval', 'description' => 'Hapus permintaan approval',          'created_by' => null, 'updated_by' => null],

            // Approval - Approval Action
            ['name' => 'approval.approval.index',  'method' => 'GET',  'module' => 'Approval', 'description' => 'Daftar aksi approval',   'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approval.create', 'method' => 'GET',  'module' => 'Approval', 'description' => 'Form aksi approval',      'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approval.store',  'method' => 'POST', 'module' => 'Approval', 'description' => 'Proses aksi approval',    'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approval.show',   'method' => 'GET',  'module' => 'Approval', 'description' => 'Detail aksi approval',    'created_by' => null, 'updated_by' => null],

            // Approval - Approval History
            ['name' => 'approval.approval-history.index', 'method' => 'GET', 'module' => 'Approval', 'description' => 'Daftar riwayat approval',  'created_by' => null, 'updated_by' => null],
            ['name' => 'approval.approval-history.show',  'method' => 'GET', 'module' => 'Approval', 'description' => 'Detail riwayat approval',  'created_by' => null, 'updated_by' => null],

            // Blog - Posts
            ['name' => 'blog.post.index',   'method' => 'GET',    'module' => 'Blog', 'description' => 'Menampilkan daftar postingan',              'created_by' => null, 'updated_by' => null],
            ['name' => 'blog.post.create',  'method' => 'GET',    'module' => 'Blog', 'description' => 'Menampilkan form untuk membuat postingan',  'created_by' => null, 'updated_by' => null],
            ['name' => 'blog.post.store',   'method' => 'POST',   'module' => 'Blog', 'description' => 'Menyimpan data postingan baru',             'created_by' => null, 'updated_by' => null],
            ['name' => 'blog.post.edit',    'method' => 'GET',    'module' => 'Blog', 'description' => 'Menampilkan form untuk mengedit postingan', 'created_by' => null, 'updated_by' => null],
            ['name' => 'blog.post.update',  'method' => 'PUT',    'module' => 'Blog', 'description' => 'Memperbarui data postingan',                'created_by' => null, 'updated_by' => null],
            ['name' => 'blog.post.destroy', 'method' => 'DELETE', 'module' => 'Blog', 'description' => 'Menghapus data postingan',                  'created_by' => null, 'updated_by' => null],

            // Messages
            ['name' => 'message.index',   'method' => 'GET',    'module' => 'Messages', 'description' => 'Menampilkan daftar pesan masuk',  'created_by' => null, 'updated_by' => null],
            ['name' => 'message.show',    'method' => 'GET',    'module' => 'Messages', 'description' => 'Menampilkan detail pesan',         'created_by' => null, 'updated_by' => null],
            ['name' => 'message.destroy', 'method' => 'DELETE', 'module' => 'Messages', 'description' => 'Menghapus pesan',                  'created_by' => null, 'updated_by' => null],

            // Gallery
            ['name' => 'gallery.index',   'method' => 'GET',    'module' => 'Gallery', 'description' => 'Menampilkan daftar foto galeri',    'created_by' => null, 'updated_by' => null],
            ['name' => 'gallery.create',  'method' => 'GET',    'module' => 'Gallery', 'description' => 'Form tambah foto galeri',           'created_by' => null, 'updated_by' => null],
            ['name' => 'gallery.store',   'method' => 'POST',   'module' => 'Gallery', 'description' => 'Simpan foto galeri baru',           'created_by' => null, 'updated_by' => null],
            ['name' => 'gallery.edit',    'method' => 'GET',    'module' => 'Gallery', 'description' => 'Form edit foto galeri',             'created_by' => null, 'updated_by' => null],
            ['name' => 'gallery.update',  'method' => 'PUT',    'module' => 'Gallery', 'description' => 'Perbarui foto galeri',              'created_by' => null, 'updated_by' => null],
            ['name' => 'gallery.destroy', 'method' => 'DELETE', 'module' => 'Gallery', 'description' => 'Hapus foto galeri',                 'created_by' => null, 'updated_by' => null],

            // Fleet Categories
            ['name' => 'fleet.category.index',   'method' => 'GET',    'module' => 'Fleet', 'description' => 'Menampilkan kategori armada',        'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.category.create',  'method' => 'GET',    'module' => 'Fleet', 'description' => 'Form tambah kategori armada',        'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.category.store',   'method' => 'POST',   'module' => 'Fleet', 'description' => 'Simpan kategori armada baru',        'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.category.edit',    'method' => 'GET',    'module' => 'Fleet', 'description' => 'Form edit kategori armada',          'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.category.update',  'method' => 'PUT',    'module' => 'Fleet', 'description' => 'Perbarui kategori armada',           'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.category.destroy', 'method' => 'DELETE', 'module' => 'Fleet', 'description' => 'Hapus kategori armada',              'created_by' => null, 'updated_by' => null],

            // Fleet Photos
            ['name' => 'fleet.photo.index',   'method' => 'GET',    'module' => 'Fleet', 'description' => 'Menampilkan foto armada',              'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.photo.create',  'method' => 'GET',    'module' => 'Fleet', 'description' => 'Form tambah foto armada',              'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.photo.store',   'method' => 'POST',   'module' => 'Fleet', 'description' => 'Simpan foto armada baru',              'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.photo.edit',    'method' => 'GET',    'module' => 'Fleet', 'description' => 'Form edit foto armada',                'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.photo.update',  'method' => 'PUT',    'module' => 'Fleet', 'description' => 'Perbarui foto armada',                 'created_by' => null, 'updated_by' => null],
            ['name' => 'fleet.photo.destroy', 'method' => 'DELETE', 'module' => 'Fleet', 'description' => 'Hapus foto armada',                   'created_by' => null, 'updated_by' => null],
        ];

        foreach ($routes as $route) {
            Route::create($route);
        }
    }
}
