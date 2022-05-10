<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create_permissions
        Permission::create(['name' => 'create_appointment']);
        Permission::create(['name' => 'modify_appointment']);
        Permission::create(['name' => 'view_appointment']);
        Permission::create(['name' => 'create_announcement']);
        Permission::create(['name' => 'modify_announcement']);
        Permission::create(['name' => 'reply_ticket']);
        Permission::create(['name' => 'create_ticket']);
        Permission::create(['name' => 'view_ticket']);
        Permission::create(['name' => 'modify_ticket']);
        Permission::create(['name' => 'create_invoice']);
        Permission::create(['name' => 'modify_invoice']);
        Permission::create(['name' => 'view_invoice']);
        Permission::create(['name' => 'create_test']);
        Permission::create(['name' => 'modify_test']);
        Permission::create(['name' => 'view_test']);
        Permission::create(['name' => 'create_vaccine']);
        Permission::create(['name' => 'modify_vaccine']);
        Permission::create(['name' => 'view_vaccine']);
        Permission::create(['name' => 'create_file']);
        Permission::create(['name' => 'modify_file']);
        Permission::create(['name' => 'view_file']);
        Permission::create(['name' => 'create_diagnosis']);
        Permission::create(['name' => 'modify_diagnosis']);
        Permission::create(['name' => 'view_diagnosis']);
        Permission::create(['name' => 'create_report']);
        Permission::create(['name' => 'modify_report']);
        Permission::create(['name' => 'view_report']);
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'modify_user']);
        Permission::create(['name' => 'view_user']);
        Permission::create(['name' => 'create_department']);
        Permission::create(['name' => 'modify_department']);
        Permission::create(['name' => 'view_department']);
        Permission::create(['name' => 'create_doctor']);
        Permission::create(['name' => 'modify_doctor']);
        Permission::create(['name' => 'view_doctor']);

        // create_roles and assign created permissions
        // by chaining
        $role = Role::create(['name' => 'doctor'])
            ->givePermissionTo([
                'modify_appointment', 'reply_ticket', 'view_ticket', 'modify_ticket',
                'create_file', 'modify_file', 'view_file',
                'create_diagnosis', 'modify_diagnosis', 'view_diagnosis',
                'create_report', 'modify_report', 'view_report',
            ]);
        $role = Role::create(['name' => 'nurse'])
            ->givePermissionTo([
                'create_appointment', 'modify_appointment', 'view_appointment',
                'create_announcement', 'modify_announcement',
                'modify_ticket', 'reply_ticket', 'view_ticket',
                'create_file', 'create_test',
                'modify_test', 'modify_file', 'view_file',
                'create_report', 'modify_report', 'view_report',
                'create_vaccine', 'modify_vaccine', 'view_vaccine',
            ]);
        $role = Role::create(['name' => 'receptionist'])
            ->givePermissionTo([
                'create_appointment', 'modify_appointment', 'view_appointment',
                'create_announcement', 'modify_announcement',
                'create_ticket', 'modify_ticket',
                'create_file', 'create_test',
                'modify_test', 'modify_file',
                'create_report', 'modify_report',
                'create_invoice', 'modify_invoice', 'view_invoice',
            ]);

        $role = Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());
    }
}
