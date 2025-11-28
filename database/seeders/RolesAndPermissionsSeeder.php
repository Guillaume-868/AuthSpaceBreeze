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

        // Adapter
        $perms = [
            // Permissions planets 
            'planets.view',
            'planets.create',
            'planets.edit',
            'planets.delete',
            'planets.publish',

            // Permissions crews
            'crews.view',
            'crews.create',
            'crews.edit',
            'crews.delete',
            'crews.publish',

            // Permissions technologies
            'technologies.view',
            'technologies.create',
            'technologies.edit',
            'technologies.delete',
            'technologies.publish',

             // Permissions users
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
        $planetsmanager->syncPermissions([
            'planets.view', 
            'planets.create', 
            'planets.edit',  
            'planets.delete',
            'planets.publish',
        ]);
        $crewsmanager->syncPermissions([
            'crews.view', 
            'crews.create', 
            'crews.edit', 
            'crews.delete',
            'crews.publish', 
            ]);
        $technologiesmanager->syncPermissions([ 
            'technologies.view',
            'technologies.create',
            'technologies.edit',
            'technologies.delete',
            'technologies.publish',
        ]);

        // Rafraîchir le cache des permissions
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}