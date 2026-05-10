<?php

namespace Database\Seeders;

use App\Models\RoleMenu;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Route;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_menus')->delete();

        // Get Superadmin role
        $superadminRole = Role::where('code', 'SA')->first();
        
        if (!$superadminRole) {
            $this->command->error('Superadmin role not found. Please run RoleSeeder first.');
            return;
        }

        // Get all menus
        $users = Menu::where('name', 'Manajemen Pengguna')->first();
        $roles = Menu::where('name', 'Manajemen Peran')->first();
        $menus = Menu::where('name', 'Manajemen Menu')->first();
        $routes = Menu::where('name', 'Manajemen Route')->first();
        $approval = Menu::where('name', 'Manajemen Approval')->first();

        // Get all routes
        $usersIndexRoute = Route::whereIn('name', ['user.index' /*, 'user.create', 'user.edit', 'user.store', 'user.update', 'user.destroy' */])->get();
        $rolesIndexRoute = Route::whereIn('name', ['role.index' /*, 'role.create', 'role.edit', 'role.store', 'role.update', 'role.destroy' */])->get();
        $menusIndexRoute = Route::whereIn('name', ['menu.index' /*, 'menu.create', 'menu.edit', 'menu.store', 'menu.update', 'menu.destroy' */])->get();
        $routesIndexRoute = Route::whereIn('name', ['route.index' /*, 'route.create', 'route.edit', 'route.store', 'route.update', 'route.destroy' */])->get();

        // Manajemen Pengguna menu
        if ($users && $usersIndexRoute) {
            foreach ($usersIndexRoute as $route) {
                RoleMenu::create([
                    'parent_id' => null,
                    'role_id' => $superadminRole->id,
                    'menu_id' => $users->id,
                    'route_id' => $route->id,
                    'sequence' => 1,
                    'is_active' => true,
                    'created_by' => null,
                    'updated_by' => null,
                ]);
                break;
            }
        }

        // Manajemen Menu menu
        if ($menus && $menusIndexRoute) {
            foreach ($menusIndexRoute as $route) {
                RoleMenu::create([
                    'parent_id' => null,
                    'role_id' => $superadminRole->id,
                    'menu_id' => $menus->id,
                    'route_id' => $route->id,
                    'sequence' => 2,
                    'is_active' => true,
                    'created_by' => null,
                    'updated_by' => null,
                ]);
                break;
            }
        }

        // Manajemen Route menu
        if ($routes && $routesIndexRoute) {
            foreach ($routesIndexRoute as $route) {
                RoleMenu::create([
                    'parent_id' => null,
                    'role_id' => $superadminRole->id,
                    'menu_id' => $routes->id,
                    'route_id' => $route->id,
                    'sequence' => 3,
                    'is_active' => true,
                    'created_by' => null,
                    'updated_by' => null,
                ]);
                break;
            }
        }

        // Manajemen Peran menu
        if ($roles && $rolesIndexRoute) {
            foreach ($rolesIndexRoute as $route) {
                RoleMenu::create([
                    'parent_id' => null,
                    'role_id' => $superadminRole->id,
                    'menu_id' => $roles->id,
                    'route_id' => $route->id,
                    'sequence' => 4,
                    'is_active' => true,
                    'created_by' => null,
                    'updated_by' => null,
                ]);
                break;
            }
        }

        // Approval menu
        $approvalIndexRoute = Route::where('name', 'approval.workflow-definition.index')->first();

        if ($approval && $approvalIndexRoute) {
            RoleMenu::create([
                'parent_id' => null,
                'role_id' => $superadminRole->id,
                'menu_id' => $approval->id,
                'route_id' => $approvalIndexRoute->id,
                'sequence' => 5,
                'is_active' => true,
                'created_by' => null,
                'updated_by' => null,
            ]);
        }

        // ADM role - Manajemen Postingan
        $adminRole = Role::where('code', 'ADM')->first();
        $postsMenu = Menu::where('name', 'Manajemen Postingan')->first();
        $postsIndexRoute = Route::where('name', 'blog.post.index')->first();

        if ($adminRole && $postsMenu && $postsIndexRoute) {
            RoleMenu::create([
                'parent_id' => null,
                'role_id' => $adminRole->id,
                'menu_id' => $postsMenu->id,
                'route_id' => $postsIndexRoute->id,
                'sequence' => 1,
                'is_active' => true,
                'created_by' => null,
                'updated_by' => null,
            ]);
        }

        // ADM role - Manajemen Pesan
        $messagesMenu = Menu::where('name', 'Manajemen Pesan')->first();
        $messagesIndexRoute = Route::where('name', 'message.index')->first();

        if ($adminRole && $messagesMenu && $messagesIndexRoute) {
            RoleMenu::create([
                'parent_id' => null,
                'role_id' => $adminRole->id,
                'menu_id' => $messagesMenu->id,
                'route_id' => $messagesIndexRoute->id,
                'sequence' => 2,
                'is_active' => true,
                'created_by' => null,
                'updated_by' => null,
            ]);
        }

        // ADM role - Manajemen Galeri
        $galleryMenu = Menu::where('name', 'Manajemen Galeri')->first();
        $galleryIndexRoute = Route::where('name', 'gallery.index')->first();

        if ($adminRole && $galleryMenu && $galleryIndexRoute) {
            RoleMenu::create([
                'parent_id' => null,
                'role_id' => $adminRole->id,
                'menu_id' => $galleryMenu->id,
                'route_id' => $galleryIndexRoute->id,
                'sequence' => 3,
                'is_active' => true,
                'created_by' => null,
                'updated_by' => null,
            ]);
        }

        // ADM role - Manajemen Armada
        $fleetMenu = Menu::where('name', 'Manajemen Armada')->first();
        $fleetIndexRoute = Route::where('name', 'fleet.category.index')->first();

        if ($adminRole && $fleetMenu && $fleetIndexRoute) {
            RoleMenu::create([
                'parent_id' => null,
                'role_id' => $adminRole->id,
                'menu_id' => $fleetMenu->id,
                'route_id' => $fleetIndexRoute->id,
                'sequence' => 4,
                'is_active' => true,
                'created_by' => null,
                'updated_by' => null,
            ]);
        }

        // $this->command->info('RoleMenu seeder completed successfully!');
    }
}
