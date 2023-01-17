<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class InstallerController extends Controller
{
    public function instalador()
    {
		$role1 = Role::create(['name' => 'Administrador']);
		$role2 = Role::create(['name' => 'Maestro']);
		$role3 = Role::create(['name' => 'Asesor']);
        $role4 = Role::create(['name' => 'Director']);

		if (!is_null([$role1, $role2, $role3, $role4])) {
			Permission::create(['name' => 'Página de inicio'])->syncRoles([$role1, $role2, $role3, $role4]);

            //Usuarios
			Permission::create(['name' => 'Usuarios'])->syncRoles([$role1, $role4]);
			Permission::create(['name' => 'Crear Usuarios'])->syncRoles([$role1]);
			Permission::create(['name' => 'Editar Usuarios'])->syncRoles([$role1, $role2, $role3, $role4]);
			Permission::create(['name' => 'Eliminar Usuario'])->syncRoles([$role1]);
			Permission::create(['name' => 'Asignar Rol'])->syncRoles([$role1, $role4]);
 
            //Roles
			Permission::create(['name' => 'Roles'])->syncRoles([$role1]);
			/* Permission::create(['name' => 'Crear Roles'])->syncRoles([$role1]);
			Permission::create(['name' => 'Editar Roles'])->syncRoles([$role1]);
			Permission::create(['name' => 'Eliminar Roles'])->syncRoles([$role1]);
			Permission::create(['name' => 'Asignar Permisos'])->syncRoles([$role1]); */

            //Permisos
			Permission::create(['name' => 'Permisos'])->syncRoles([$role1]);
			/* Permission::create(['name' => 'Crear Permisos'])->syncRoles([$role1]);
			Permission::create(['name' => 'Editar Permisos'])->syncRoles([$role1]);
			Permission::create(['name' => 'Eliminar Permisos'])->syncRoles([$role1]); */

            //Planeaciones
			Permission::create(['name' => 'Planeaciones'])->syncRoles([$role1, $role2, $role3, $role4]);

            //Alumnos
			Permission::create(['name' => 'Alumnos'])->syncRoles([$role1, $role2, $role3, $role4]);
			Permission::create(['name' => 'Crear Alumno'])->syncRoles([$role1, $role3, $role4]);
			Permission::create(['name' => 'Editar Alumno'])->syncRoles([$role1, $role3, $role4]);
			Permission::create(['name' => 'Eliminar Alumno'])->syncRoles([$role1, $role3, $role4]);
			
			//Nivel academico y Grado
			Permission::create(['name' => 'Grado'])->syncRoles([$role1, $role2, $role3, $role4]);
			Permission::create(['name' => 'Crear Grado'])->syncRoles([$role1, $role3, $role4]);
			Permission::create(['name' => 'Actualizar Grado'])->syncRoles([$role1, $role3, $role4]);
			Permission::create(['name' => 'Eliminar Grado'])->syncRoles([$role1, $role4]);
			Permission::create(['name' => 'Nivel Académico'])->syncRoles([$role1, $role2, $role3, $role4]);
			Permission::create(['name' => 'Crear Nivel Académico'])->syncRoles([$role1, $role4]);
			Permission::create(['name' => 'Eliminar Nivel Académico'])->syncRoles([$role1, $role4]);

			//Ciclo escolar
			Permission::create(['name' => 'Ciclo'])->syncRoles([$role1, $role3, $role4]);
			Permission::create(['name' => 'Crear Ciclo'])->syncRoles([$role1, $role4]);
			Permission::create(['name' => 'Eliminar Ciclo'])->syncRoles([$role1, $role4]);

			//Asesor
			Permission::create(['name' => 'Asesor'])->syncRoles([$role1, $role3, $role4]);


			//Expediente
			Permission::create(['name' => 'Expediente Alumno'])->syncRoles([$role1, $role3, $role4]);
			Permission::create(['name' => 'Crear Expediente'])->syncRoles([$role1, $role3, $role4]);
			Permission::create(['name' => 'Editar Expediente'])->syncRoles([$role1, $role3, $role4]);
			Permission::create(['name' => 'Eliminar Expediente'])->syncRoles([$role1, $role3, $role4]);

			//Calificaciones
			Permission::create(['name' => 'Calificaciones'])->syncRoles([$role1, $role2, $role3, $role4]);




		}else {
			return "No se instalaron correctamente los roles y permisos";
		}

		$email = 'admin@carp.com';
        $password = 'AdminCarp2022';
        $user = User::where('email', $email)->first();
        if (is_null($user)) {
            User::create([
                'email' => $email,
                'name'    => 'Gabriel Alejandro Mirabal Aguilar',
                'password' => Hash::make($password)
            ])->assignRole('Administrador');

            return redirect()->route('inicio');
        } else {
            print 'Usuario ya instalado';
            return redirect()->route('login');
        }
    }
}
