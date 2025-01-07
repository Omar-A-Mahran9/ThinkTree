<?php

namespace Database\Seeders;


use App\Models\Ability;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Role::$modules;
        Ability::whereNotIn('category', $categories)->delete();

        $actions = [
            'view',//0
            'show',//1
            'create',//2
            'update',//3
            'delete',//4
        ];


        // indices of unused actions from the above array
        $exceptions = [
            'settings' => ['unused_actions' => [1, 2, 4], 'extra_actions' => []], // 1,2,4 are the indices of unused action from $actions array
            'recycle_bin' => ['unused_actions' => [1, 2, 3], 'extra_actions' => ['restore']],
            'contact_us' => ['unused_actions' => [1, 2, 4], 'extra_actions' => []],
            'customers' => ['unused_actions' => [1, 2, 4], 'extra_actions' => ['block']],
        ];


        foreach ($categories as $category)
        {
            $usedActions = array_merge($actions, $exceptions[$category]['extra_actions'] ?? []);

            foreach ($exceptions[$category]['unused_actions'] ?? [] as $index) // remove the unused actions
                unset($usedActions[$index]);


            foreach (array_values($usedActions) as $action)
            {
                Ability::firstOrCreate(
                    ['name' => $action . '_' . str_replace(' ', '_', $category)],
                    [
                        'name' => $action . '_' . str_replace(' ', '_', $category),
                        'category' => $category,
                        'action' => $action,
                    ]
                );
            }
        }

        if (Role::count() == 0)
        {

            $superAdminRole = Role::firstOrCreate(
                ['name_ar' => 'مدير تنفيذي',]
                ,
                [
                    'name_ar' => 'مدير تنفيذي',
                    'name_en' => 'super admin',
                ]
            );


            $adminRole = Role::firstOrCreate(
                ['name_ar' => 'صلاحيات إفتراضية',]
                ,
                [
                    'name_ar' => 'صلاحيات إفتراضية',
                    'name_en' => 'default roles',
                ]
            );


            $superAdminAbilitiesIds = Ability::pluck('id');
            $adminAbilitiesIds      = Ability::whereIn('category', ['admins', 'roles', 'settings'])->whereIn('action', ['view'])->get();
            $superAdminRole->abilities()->sync($superAdminAbilitiesIds);
            $adminRole->abilities()->sync($adminAbilitiesIds);

            $superAdmin     = Admin::find(1);
            $supportAccount = Admin::find(2);

            $superAdminRoles     = $superAdmin->roles->pluck('id')->toArray();
            $supportAccountRoles = $supportAccount->roles->pluck('id')->toArray();

            if (!in_array(1, $superAdminRoles))
                $superAdmin->assignRole($superAdminRole);

            if (!in_array(2, $superAdminRoles))
                $superAdmin->assignRole($adminRole);

            if (!in_array(1, $supportAccountRoles))
                $supportAccount->assignRole($superAdminRole);

            if (!in_array(2, $supportAccountRoles))
                $supportAccount->assignRole($adminRole);
        } else
        {
            $superAdminRole = Role::find(1);
            $defaultRole    = Role::withoutGlobalScopes()->find(2);

            $superAdminAbilitiesIds = Ability::pluck('id');
            $defaultAbilitiesIds    = Ability::whereIn('category', ['admins', 'roles', 'settings'])->whereIn('action', ['view'])->get();

            $superAdminRole->abilities()->sync($superAdminAbilitiesIds);
            $defaultRole->abilities()->sync($defaultAbilitiesIds);

        }
    }
}
