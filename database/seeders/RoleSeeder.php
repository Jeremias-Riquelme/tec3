<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $AdminRol  = Role::create(['name' => 'Admin']);
       $BloggerRol = Role::create(['name' => 'Blogger']);

       $permission = Permission::create(['name' =>'admin.home','description'=>'Ver Dashboard'])->syncRoles([$AdminRol,$BloggerRol]);

       $permission = Permission::create(['name' => 'admin.users.index','description'=>'Ver listado de usuarios'])->syncRoles([$AdminRol]);
      // $permission = Permission::create(['name' => 'admin.users.update','description'=>''])->syncRoles([$AdminRol]);
       $permission = Permission::create(['name' => 'admin.users.edit','description'=>'Asignar un rol'])->syncRoles([$AdminRol]);

       $permission = Permission::create(['name' => 'admin.categories.index','description'=>'Ver listado de categorias'])->syncRoles([$AdminRol]);
       $permission = Permission::create(['name' => 'admin.categories.create','description'=>'Crear Categorias'])->syncRoles([$AdminRol]);
       $permission = Permission::create(['name' => 'admin.categories.edit','description'=>'Editar Categorias'])->syncRoles([$AdminRol]);
       $permission = Permission::create(['name' => 'admin.categories.delete','description'=>'Borrar Categorias'])->syncRoles([$AdminRol]);

       $permission = Permission::create(['name' => 'admin.tags.index','description'=>'Ver listado de Tags'])->syncRoles([$AdminRol]);
       $permission = Permission::create(['name' => 'admin.tags.create','description'=>'Crear un Tags'])->syncRoles([$AdminRol]);
       $permission = Permission::create(['name' => 'admin.tags.edit','description'=>'Editar un Tags'])->syncRoles([$AdminRol]);
       $permission = Permission::create(['name' => 'admin.tags.delete','description'=>'Borrar un Tags'])->syncRoles([$AdminRol]);

       $permission = Permission::create(['name' => 'admin.posts.index','description'=>'Ver listado de Posts'])->syncRoles([$AdminRol,$BloggerRol]);
       $permission = Permission::create(['name' => 'admin.posts.create','description'=>'Crear  Posts'])->syncRoles([$AdminRol,$BloggerRol]);
       $permission = Permission::create(['name' => 'admin.posts.edit','description'=>'Editar Posts'])->syncRoles([$AdminRol,$BloggerRol]);
       $permission = Permission::create(['name' => 'admin.posts.delete','description'=>'Borrar Posts'])->syncRoles([$AdminRol,$BloggerRol]);
    }
}
