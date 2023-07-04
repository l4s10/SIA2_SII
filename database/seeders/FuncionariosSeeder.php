<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class FuncionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //*CUENTAS USUARIO MAESTRO
        /*
        $user_administrador = User::create([
            'RUT' => '11821718-7',
            'NOMBRES' => 'CRISTIAN ALBERTO',
            'APELLIDOS' => 'GOMEZ CASTILLO',
            'ID_REGION' => 8,
            'ID_UBICACION' => 1,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 4,
            'FECHA_NAC' => '1971-05-24',
            'FECHA_INGRESO' => '1999-01-02',
            //'FECHA_ASIM_O_1' => '1999-01-02',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 5,
            'ID_CARGO' => 1,
            'email' => 'cagomez@sii.cl',
            'FONO' => '41-3115102',
            'ANEXO' => '5102',
            'ID_SEXO' => 1,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 2
        ]);
        $user_administrador2 = User::create([
            'RUT' => '12890503-0',
            'NOMBRES' => 'ADOLFO MAURICIO',
            'APELLIDOS' => 'MILLAN FAUNDEZ',
            'ID_REGION' => 8,
            //'ID_UBICACION' => 2,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 7,
            'FECHA_NAC' => '1975-07-31',
            'FECHA_INGRESO' => '2001-01-31',
            //'FECHA_ASIM_O_1' => '2001-01-31',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 3,
            'ID_CARGO' => 5,
            'email' => 'amillan@sii.cl',
            'FONO' => '41-3115115',
            'ANEXO' => '5115',
            'ID_SEXO' => 1,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 1
        ]);
        $user_administrador3 = User::create([
            'RUT' => '8545158-8',
            'NOMBRES' => 'CARLOS ALBERTO',
            'APELLIDOS' => 'OCARES MATURANA',
            'ID_REGION' => 8,
            //'ID_UBICACION' => 3,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 7,
            'FECHA_NAC' => '1976-02-07',
            'FECHA_INGRESO' => '2001-02-12',
            //'FECHA_ASIM_O_1' => '2001-02-12',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 5,
            'ID_CARGO' => 8,
            'email' => 'cocares@sii.cl',
            'FONO' => '41-3115150',
            'ANEXO' => '5150',
            'ID_SEXO' => 1,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 3
        ]);
        $user_administrador4 = User::create([
            'RUT' => '13507336-9',
            'NOMBRES' => 'LOREN ANDREA CAROLINA',
            'APELLIDOS' => 'UGALDE JAQUE',
            'ID_REGION' => 8,
            //'ID_UBICACION' => 5,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 7,
            'FECHA_NAC' => '1978-07-22',
            'FECHA_INGRESO' => '2010-06-15',
            //'FECHA_ASIM_O_1' => '2010-06-15',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 5,
            'ID_CARGO' => 19,
            'email' => 'loren.ugalde@sii.cl',
            'FONO' => '41-3115125',
            'ANEXO' => '5125',
            'ID_SEXO' => 2,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 4
        ]);
        $user_administrador5 = User::create([
            'RUT' => '14436764-2',
            'NOMBRES' => 'PAMELA',
            'APELLIDOS' => 'ARAVENA PINO',
            'ID_REGION' => 8,
            //'ID_UBICACION' => 4,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 7,
            'FECHA_NAC' => '1972-09-16',
            'FECHA_INGRESO' => '1999-02-01',
            //'FECHA_ASIM_O_1' => '1999-02-01',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 5,
            'ID_CARGO' => 20,
            'email' => 'plaraven@sii.cl',
            'FONO' => '41-3115275',
            'ANEXO' => '5275',
            'ID_SEXO' => 2,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 1
        ]);
        $user_administrador6 = User::create([
            'RUT' => '9685432-3',
            'NOMBRES' => 'JUAN',
            'APELLIDOS' => 'ALARCON CONTRERAS',
            'ID_REGION' => 8,
            //'ID_UBICACION' => 6,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 9,
            'FECHA_NAC' => '1967-03-13',
            'FECHA_INGRESO' => '1999-02-01',
            //'FECHA_ASIM_O_1' => '1999-02-01',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 5,
            'ID_CARGO' => 21,
            'email' => 'jalarcon@sii.cl',
            'FONO' => '43-2458531',
            'ANEXO' => '8531',
            'ID_SEXO' => 1,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 2
        ]);
        $user_administrador7 = User::create([
            'RUT' => '11684760-4',
            'NOMBRES' => 'EDUARDO',
            'APELLIDOS' => 'CONCHA PEÑA',
            'ID_REGION' => 8,
            //'ID_UBICACION' => 7,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 11,
            'FECHA_NAC' => '1970-09-22',
            'FECHA_INGRESO' => '1999-02-01',
            //'FECHA_ASIM_O_1' => '1999-02-01',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 5,
            'ID_CARGO' => 22,
            'email' => 'eaconcha@sii.cl',
            'FONO' => '41-3115254',
            'ANEXO' => '5254',
            'ID_SEXO' => 1,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 3
        ]);
        $user_administrador8 = User::create([
            'RUT' => '12918071-4',
            'NOMBRES' => 'PAULINA ANDREA',
            'APELLIDOS' => 'PRADENA GARDRAT',
            'ID_REGION' => 8,
            //'ID_UBICACION' => 8,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 10,
            'FECHA_NAC' => '1975-06-29',
            'FECHA_INGRESO' => '2001-02-12',
            //'FECHA_ASIM_O_1' => '2001-02-12',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 5,
            'ID_CARGO' => 23,
            'email' => 'ppradena@sii.cl',
            'FONO' => '41-2566636',
            'ANEXO' => '6636',
            'ID_SEXO' => 2,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 4
        ]);
        $user_administrador9 = User::create([
            'RUT' => '15475732-5',
            'NOMBRES' => 'JOSE MANUEL',
            'APELLIDOS' => 'CORVALAN DURAN',
            'ID_REGION' => 8,
            //'ID_UBICACION' => 10,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 7,
            'FECHA_NAC' => '1983-01-02',
            'FECHA_INGRESO' => '2015-09-21',
            //'FECHA_ASIM_O_1' => '2015-09-21',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 5,
            'ID_CARGO' => 24,
            'email' => 'jose.corvalan@sii.cl',
            'FONO' => '41-3115248',
            'ANEXO' => '5248',
            'ID_SEXO' => 1,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 1
        ]);
        $user_administrador10 = User::create([
            'RUT' => '8465530-9',
            'NOMBRES' => 'SANDRA',
            'APELLIDOS' => 'BRAVO LOPEZ',
            'ID_REGION' => 8,
            //'ID_UBICACION' => 9,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 7,
            'FECHA_NAC' => '1968-03-31',
            'FECHA_INGRESO' => '1993-07-12',
            //'FECHA_ASIM_O_1' => '1993-07-12',
            'ID_CALIDAD_JURIDICA' => 1,
            'ID_GRUPO' => 5,
            'ID_CARGO' => 6,
            'email' => 'sbravo@sii.cl',
            'FONO' => '41-3115238',
            'ANEXO' => '5238',
            'ID_SEXO' => 2,
            'password' => Hash::make('12345678'),
            //'ID_DEPART' => 2
        ]);*/

        //*CUENTA USUARIO SERVICIOS
        $user_servicios = User::create([
            'NOMBRES' => 'USUARIO DEMO',
            'APELLIDOS' => 'SIA',
            'email' => 'servicios@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-2',
            //'ID_DEPARTAMENTO' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 2,
            'ID_GRUPO' => 1,
            'ID_CARGO' => 2,
            'ID_ESCALAFON' => 1,
            'ID_GRADO' => 1,
            'FECHA_NAC' => '1970-02-10',
            'FECHA_INGRESO' => '2001-02-22',
            //'FECHA_ASIM_O_1' => '1999-02-01',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 1234 5678',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);
        //*CUENTA USUARIO INFORMATICA
        $user_informatica = User::create([
            'NOMBRES' => 'USUARIO DEMO',
            'APELLIDOS' => 'SIA',
            'email' => 'informatica@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-5',
            //'ID_DEPARTAMENTO' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 2,
            'ID_GRUPO' => 1,
            'ID_ESCALAFON' => 1,
            'ID_GRADO' => 1,
            'ID_CARGO' => 1,
            'FECHA_NAC' => '1970-02-15',
            'FECHA_INGRESO' => '2001-05-25',
            //'FECHA_ASIM_O_1' => '1999-02-01',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 1234 5678',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);
        //*CUENTA USUARIO JURIDICO
        $user_juridico = User::create([
            'NOMBRES' => 'USUARIO DEMO',
            'APELLIDOS' => 'SIA',
            'email' => 'juridico@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-4',
            //'ID_DEPARTAMENTO' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 2,
            'ID_GRUPO' => 1,
            'ID_ESCALAFON' => 1,
            'ID_GRADO' => 1,
            'ID_CARGO' => 1,
            'FECHA_NAC' => '1980-05-20',
            'FECHA_INGRESO' => '2001-05-25',
            //'FECHA_ASIM_O_1' => '1999-02-01',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 1234 5678',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);
        //*CUENTA USUARIO FUNCIONARIO
        $user_funcionario = User::create([
            'NOMBRES' => 'USUARIO DEMO',
            'APELLIDOS' => 'SIA',
            'email' => 'funcionario@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-1',
            //'ID_DEPARTAMENTO' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 2,
            'ID_GRUPO' => 1,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 1,
            'ID_CARGO' => 2,
            'FECHA_NAC' => '1970-02-10',
            'FECHA_INGRESO' => '2001-02-22',
            //'FECHA_ASIM_O_1' => '1999-02-01',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 1234 5678',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);

        //*CUENTA USUARIO MAESTRO
        $user_maestro = User::create([
            'NOMBRES' => 'USUARIO ADMIN',
            'APELLIDOS' => 'SIA',
            'email' => 'administrador@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-9',
            //'ID_DEPARTAMENTO' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 2,
            'ID_GRUPO' => 1,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 1,
            'ID_CARGO' => 2,
            'FECHA_NAC' => '1970-02-10',
            'FECHA_INGRESO' => '2001-02-22',
            //'FECHA_ASIM_O_1' => '1999-02-01',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 1234 5678',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);

        //*Buscamos los roles por nombre
        $adminMaestro = Role::findByName('ADMINISTRADOR');  //ID 1
        $rolServicios = Role::findByName('SERVICIOS');      //ID 2
        $rolInformatica = Role::findByName('INFORMATICA');  //ID 3
        $rolJuridico = Role::findByName('JURIDICO');        //ID 4
        $rolFuncionario = Role::findByName('FUNCIONARIO');  //ID 5
        //CONDUCTOR                                         //ID 6

        //*Asignamos roles a usuarios creados

        /*$user_administrador->assignRole($adminMaestro);
        $user_administrador2->assignRole($adminMaestro);
        $user_administrador3->assignRole($adminMaestro);
        $user_administrador4->assignRole($adminMaestro);
        $user_administrador5->assignRole($adminMaestro);
        $user_administrador6->assignRole($adminMaestro);
        $user_administrador7->assignRole($adminMaestro);
        $user_administrador8->assignRole($adminMaestro);
        $user_administrador9->assignRole($adminMaestro);*/

        $user_maestro->assignRole($adminMaestro);
        $user_servicios->assignRole($rolServicios);
        $user_informatica->assignRole($rolInformatica);
        $user_juridico->assignRole($rolJuridico);
        $user_funcionario->assignRole($rolFuncionario);
    }
}
