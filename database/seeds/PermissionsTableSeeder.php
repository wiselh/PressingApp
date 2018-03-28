<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //region Users Permissions
        /**
	     * Add Permissions
	     *
	     */

        if (Permission::where('name', '=', 'Can View Users')->first() === null) {
			Permission::create([
			    'name' => 'Can View Users',
			    'slug' => 'view.users',
			    'description' => 'Can view users',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('name', '=', 'Can Create Users')->first() === null) {
			Permission::create([
			    'name' => 'Can Create Users',
			    'slug' => 'create.users',
			    'description' => 'Can create new users',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('name', '=', 'Can Edit Users')->first() === null) {
			Permission::create([
			    'name' => 'Can Edit Users',
			    'slug' => 'edit.users',
			    'description' => 'Can edit users',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('name', '=', 'Can Delete Users')->first() === null) {
			Permission::create([
			    'name' => 'Can Delete Users',
			    'slug' => 'delete.users',
			    'description' => 'Can delete users',
			    'model' => 'Permission',
			]);
        }
        //endregion

        //region Clients Permissions
        /**
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Can View Clients')->first() === null) {
            Permission::create([
                'name' => 'Can View Clients',
                'slug' => 'view.clients',
                'description' => 'Can view clients',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Create Clients')->first() === null) {
            Permission::create([
                'name' => 'Can Create Clients',
                'slug' => 'create.clients',
                'description' => 'Can create new clients',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Edit Clients')->first() === null) {
            Permission::create([
                'name' => 'Can Edit Clients',
                'slug' => 'edit.clients',
                'description' => 'Can edit clients',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Delete Clients')->first() === null) {
            Permission::create([
                'name' => 'Can Delete Clients',
                'slug' => 'delete.clients',
                'description' => 'Can delete clients',
                'model' => 'Permission',
            ]);
        }
        //endregion

        //region Categories Permissions
        /**
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Can View Categories')->first() === null) {
            Permission::create([
                'name' => 'Can View Categories',
                'slug' => 'view.categories',
                'description' => 'Can view categories',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Create Categories')->first() === null) {
            Permission::create([
                'name' => 'Can Create Categories',
                'slug' => 'create.categories',
                'description' => 'Can create new categories',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Edit Categories')->first() === null) {
            Permission::create([
                'name' => 'Can Edit Categories',
                'slug' => 'edit.categories',
                'description' => 'Can edit categories',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Delete Categories')->first() === null) {
            Permission::create([
                'name' => 'Can Delete Categories',
                'slug' => 'delete.categories',
                'description' => 'Can delete categories',
                'model' => 'Permission',
            ]);
        }
        //endregion

        //region Services Permissions
        /**
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Can View Services')->first() === null) {
            Permission::create([
                'name' => 'Can View Services',
                'slug' => 'view.services',
                'description' => 'Can view services',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Create Services')->first() === null) {
            Permission::create([
                'name' => 'Can Create Services',
                'slug' => 'create.services',
                'description' => 'Can create new services',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Edit Services')->first() === null) {
            Permission::create([
                'name' => 'Can Edit Services',
                'slug' => 'edit.services',
                'description' => 'Can edit services',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Delete Services')->first() === null) {
            Permission::create([
                'name' => 'Can Delete Services',
                'slug' => 'delete.services',
                'description' => 'Can delete services',
                'model' => 'Permission',
            ]);
        }
        //endregion

        //region Commandes Permissions
        /**
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Can View Commandes')->first() === null) {
            Permission::create([
                'name' => 'Can View Commandes',
                'slug' => 'view.commandes',
                'description' => 'Can view commandes',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Create Commandes')->first() === null) {
            Permission::create([
                'name' => 'Can Create Commandes',
                'slug' => 'create.commandes',
                'description' => 'Can create new commandes',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Edit Commandes')->first() === null) {
            Permission::create([
                'name' => 'Can Edit Commandes',
                'slug' => 'edit.commandes',
                'description' => 'Can edit commandes',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Delete Commandes')->first() === null) {
            Permission::create([
                'name' => 'Can Delete Commandes',
                'slug' => 'delete.commandes',
                'description' => 'Can delete commandes',
                'model' => 'Permission',
            ]);
        }
        //endregion

        //region Societe Permissions
        /**
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Can View Societe')->first() === null) {
            Permission::create([
                'name' => 'Can View Societe',
                'slug' => 'view.societe',
                'description' => 'Can view societe',
                'model' => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can Edit Societe')->first() === null) {
            Permission::create([
                'name' => 'Can Edit Societe',
                'slug' => 'edit.societe',
                'description' => 'Can edit societe',
                'model' => 'Permission',
            ]);
        }
        //endregion

        //region Clients Permissions
        /**
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Can View Statistics')->first() === null) {
            Permission::create([
                'name' => 'Can View Statistics',
                'slug' => 'view.statistics',
                'description' => 'Can view statistics',
                'model' => 'Permission',
            ]);
        }

        //endregion

        //region Factures Permissions
        /**
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Can Print Factures')->first() === null) {
            Permission::create([
                'name' => 'Can Print Factures',
                'slug' => 'print.factures',
                'description' => 'Can Print factures',
                'model' => 'Permission',
            ]);
        }
        //endregion
    }
}
