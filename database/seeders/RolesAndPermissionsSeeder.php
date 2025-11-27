<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Toujours vider le cache interne de Spatie avant d'altérer la matrice
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Permissions liées aux articles 
        // Permet la Lecture, Création, Gestion utilisateurs
        $perms = [
            'posts.view',
            'posts.create',
            'posts.edit',
            'posts.delete',
            'posts.publish',
            'users.manage',
        ];

        // Créer ces permissions sauf si elles existent déjà
        foreach ($perms as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Rôles des différents utilisateurs
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $planetsmanager = Role::firstOrCreate(['name' => 'planetsmanager']);
        $crewsmanager = Role::firstOrCreate(['name' => 'crewsmanager']);
        $technologiesmanager = Role::firstOrCreate(['name' => 'technologiesmanager']);

        // Matrice rôles → permissions
        // admin = Toutes les permissions
        $admin->syncPermissions(Permission::all());
        $planetsmanager->syncPermissions(['posts.view', 'posts.create', 'posts.edit', 'posts.publish']);
        $crewsmanager->syncPermissions(['posts.view', 'posts.create', 'posts.edit', 'posts.publish']);
        $technologiesmanager->syncPermissions(['posts.view',  'posts.create', 'posts.edit', 'posts.publish']);

        // Rafraîchir le cache des permissions
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}