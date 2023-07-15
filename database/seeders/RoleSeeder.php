<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //Roles
        $rolAdmin = Role::create(['name' => 'Admin']);
        $rolPrueba = Role::create(['name' => 'Prueba']);
        $rolValidador_1 = Role::create(['name' => 'Validador_1']);
        $rolValidador_2 = Role::create(['name' => 'Validador_2']);
        $rolValidador_3 = Role::create(['name' => 'Validador_3']);
        // FINANZAS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        Permission::create(['name' => 'menu.finanzas', 'description' => 'Ver Menú Finanzas', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
            //Submenu finanzas
            Permission::create(['name' => 'menu.general', 'description' => 'Ver Finanzas-General', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos 
                Permission::create(['name' => 'finanzas.index', 'description' => 'Finanzas:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'finanzas.acciones', 'description' => 'Finanzas:Ver Acciones Especiales de Finanzas', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'finanzas.factura', 'description' => 'Finanzas:Factura', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'finanzas.confirmarpago', 'description' => 'Finanzas:Confirmar Pago', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'finanzas.correo', 'description' => 'Finanzas:Correo', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'facturas.index', 'description' => 'Factura:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'facturas.create', 'description' => 'Factura:Crear', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'facturas.edit', 'description' => 'Factura:Editar', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'facturas.destroy', 'description' => 'Factura:Borrar', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'finanzas.formMasDias', 'description' => 'Factura-Formulario:Mas días de fecha de entrada', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.egresos', 'description' => 'Ver Submenú Finanzas-Egresos', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos 
                Permission::create(['name' => 'finanzas.indexEgreso', 'description' => 'Egreso:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);

            Permission::create(['name' => 'menu.ingresos', 'description' => 'Ver Submenú Finanzas-Ingresos', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos 
                Permission::create(['name' => 'finanzas.indexIngreso', 'description' => 'Ingreso:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);

            Permission::create(['name' => 'menu.top', 'description' => 'Ver Submenú Finanzas-Top Egresos e Ingresos', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos 
                Permission::create(['name' => 'finanzas.topgeneral', 'description' => 'Top Egresos e ingresos:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'finanzas.topEgreso', 'description' => 'Top Egresos:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'finanzas.showTopEgreso', 'description' => 'Top Egresos e Ingresos:Botón Top Egresos', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'finanzas.showTopIngreso', 'description' => 'Top Egresos e Ingresos:Botón Top Ingresos', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'finanzas.topIngreso', 'description' => 'Top Ingresos:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);

            Permission::create(['name' => 'menu.filtros', 'description' => 'Ver Submenú Finanzas-Filtros', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos 
                Permission::create(['name' => 'finanzas.filtros', 'description' => 'Filtros:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);

            Permission::create(['name' => 'menu.graficas', 'description' => 'Ver Submenú Finanzas-Gráficas', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos 
                Permission::create(['name' => 'finanzas.graficas', 'description' => 'Gráficas:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);

            Permission::create(['name' => 'menu.centrodecostos', 'description' => 'Ver Submenú Finanzas-Centro de Costos', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos 
                Permission::create(['name' => 'finanzas.centrodecostos', 'description' => 'Centro de Costos:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);
            
            Permission::create(['name' => 'menu.clientes', 'description' => 'Ver Submenú Administración-Clientes', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'clientes.index', 'description' => 'Clientes:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'clientes.acciones', 'description' => 'Clientes:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
              
            Permission::create(['name' => 'menu.proveedores', 'description' => 'Ver Submenú Administración-Proveedores', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'proveedores.index', 'description' => 'Proveedores:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'proveedores.acciones', 'description' => 'Proveedores:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'proveedores.destroy', 'description' => 'Proveedores:Borrar', 'nomenclatura' => 1])->syncRoles($rolAdmin);

                //Permisos Cuentas Bancarias 
                Permission::create(['name' => 'cuentasbancarias.cuentabancariaproveedor', 'description' => 'Cuenta Bancaria Proveedor:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'cuentasbancarias.acciones', 'description' => 'Cuenta Bancaria:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
               
            Permission::create(['name' => 'menu.proyectos', 'description' => 'Ver Submenú Administración-Proyectos', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'proyectos.index', 'description' => 'Proyectos:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'proyectos.acciones', 'description' => 'Proyectos:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.minas', 'description' => 'Ver Submenú Administración-Minas', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'minas.index', 'description' => 'Mina:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'minas.acciones', 'description' => 'Mina:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            // configuracion
            Permission::create(['name' => 'menu.configuracion', 'description' => 'Configuración', 'nomenclatura' => 1])->syncRoles($rolAdmin);

            Permission::create(['name' => 'menu.categorias-de-entrada', 'description' => 'Ver Submenú Administración-Categorías de entrada', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'categorias-de-entradas.index', 'description' => 'Categorías de entrada:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'categorias-de-entradas.acciones', 'description' => 'Categorías de entrada:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.categorias-familias', 'description' => 'Ver Submenú Administración-Categorías de Familias', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'categorias-familias.index', 'description' => 'Categorías Familias:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'categorias-familias.acciones', 'description' => 'Categorías Familias:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.familias', 'description' => 'Ver Submenú Administración-Familias', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'familias.index', 'description' => 'Familias:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'familias.acciones', 'description' => 'Familias:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.ivas', 'description' => 'Ver Submenú Administración-Ivas', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'ivas.index', 'description' => 'Ivas:Tablas', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'ivas.acciones', 'description' => 'Ivas:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.tipo-de-direcciones', 'description' => 'Ver Submenú Administración- Tipo de Direcciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'tipo-de-direcciones.index', 'description' => 'Tipo de Direcciones:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'tipo-de-direcciones.acciones', 'description' => 'Tipo de Direcciones:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.tipo-de-ingresos', 'description' => 'Ver Submenú Administración-Tipo de Ingresos', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'tipo-de-ingresos.index', 'description' => 'Tipo de Ingresos:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'tipo-de-ingresos.acciones', 'description' => 'Tipo de Ingresos:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.unidades', 'description' => 'Ver Submenú Administración-Unidades', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'unidades.index', 'description' => 'Unidades:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'unidades.acciones', 'description' => 'Unidades:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.camposProCli', 'description' => 'Campos contenidos en Proveedores y Clientes', 'nomenclatura' => 1])->syncRoles($rolAdmin);

                //Permisos Direcciones 
                Permission::create(['name' => 'direcciones.direccioncliente', 'description' => 'Dirección:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'direcciones.acciones', 'description' => 'Dirección:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
                //Permisos Telefonos 
                Permission::create(['name' => 'telefonos.telefonocliente', 'description' => 'Teléfono Cliente:Tabla', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                Permission::create(['name' => 'telefonos.acciones', 'description' => 'Teléfono:Acciones', 'nomenclatura' => 1])->syncRoles($rolAdmin);
                
        // VIEJO -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        Permission::create(['name' => 'menu.recursoshumanos', 'description' => 'Ver Menú Recursos Humanos', 'nomenclatura' => 2])->syncRoles($rolAdmin,$rolPrueba);
        //Submenu recursos humanos
            //Submenu expedientes
            Permission::create(['name' => 'menu.candidatos', 'description' => 'Ver Submenú RecursosHumanos-Candidatos', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                //Permisos expedientes
                Permission::create(['name' => 'candidatos.index', 'description' => 'Candidatos:Tabla', 'nomenclatura' => 2])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'candidatos.acciones', 'description' => 'Candidatos:Acciones', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                
            //Submenu empleados
           Permission::create(['name' => 'menu.empleados', 'description' => 'Ver Submenú RecursosHumanos-Empleados', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                //Permisos empleados
                Permission::create(['name' => 'empleados.index', 'description' => 'Empleados:Tabla', 'nomenclatura' => 2])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'empleados.acciones', 'description' => 'Empleados:Acciones', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                
            //Submenu empleado-expedientes
            Permission::create(['name' => 'menu.empleado-expedientes', 'description' => 'Ver Submenú RecursosHumanos-Empleado-Expedientes', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                //Permisos empleado-expedientes
                Permission::create(['name' => 'empleado-expedientes.index', 'description' => 'Empleados-Expedientes:Tabla', 'nomenclatura' => 2])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'empleado-expedientes.acciones', 'description' => 'Empleados-Expedientes:Acciones', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                
            //Submenu incidencias
            Permission::create(['name' => 'menu.incidencias', 'description' => 'Ver Submenú RecursosHumanos-Incidencias', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                //Permisos incidencias
                Permission::create(['name' => 'incidencias.index', 'description' => 'Incidencias:Tabla', 'nomenclatura' => 2])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'incidencias.acciones', 'description' => 'Incidencias:Acciones', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                
            //Submenu grupos
            Permission::create(['name' => 'menu.grupos', 'description' => 'Ver Submenú RecursosHumanos-Grupos', 'nomenclatura' => 2])->syncRoles($rolAdmin);
            //Permisos incidencias
            Permission::create(['name' => 'grupos.index', 'description' => 'Grupos:Tabla', 'nomenclatura' => 2])->syncRoles($rolAdmin,$rolPrueba);
            Permission::create(['name' => 'grupos.acciones', 'description' => 'Grupos:Acciones', 'nomenclatura' => 2])->syncRoles($rolAdmin);
            
            //Submenu paros
            Permission::create(['name' => 'menu.paros', 'description' => 'Ver Submenú RecursosHumanos-Paros', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                //Permisos paros
                Permission::create(['name' => 'paros.index', 'description' => 'Paros:Tabla', 'nomenclatura' => 2])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'paros.acciones', 'description' => 'Paros:Acciones', 'nomenclatura' => 2])->syncRoles($rolAdmin);
               
            //Submenu poblacion
            Permission::create(['name' => 'menu.poblacion', 'description' => 'Ver Submenú RecursosHumanos-Poblacion', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                //Permisos poblacion
                Permission::create(['name' => 'poblacion.index', 'description' => 'Poblacion:Tabla', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                Permission::create(['name' => 'poblacion.detalle', 'description' => 'Poblacion:Detalle Poblacion', 'nomenclatura' => 2])->syncRoles($rolAdmin);

            //Submenu expedientes
           Permission::create(['name' => 'menu.expedientes', 'description' => 'Ver Submenú RecursosHumanos-Expedientes', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                //Permisos expedientes
                Permission::create(['name' => 'expedientes.index', 'description' => 'Expedientes:Tabla', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                Permission::create(['name' => 'expedientes.show', 'description' => 'Expedientes:Mostrar', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                Permission::create(['name' => 'expedientes.edit', 'description' => 'Expedientes:Editar', 'nomenclatura' => 2])->syncRoles($rolAdmin);
              
            //Submenu puestos 
           Permission::create(['name' => 'menu.puestos', 'description' => 'Ver Submenú RecursosHumanos-Puestos', 'nomenclatura' => 2])->syncRoles($rolAdmin);
            //Permisos puestos
                Permission::create(['name' => 'puestos.index', 'description' => 'Puestos:Tabla', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                Permission::create(['name' => 'puestos.acciones', 'description' => 'Puestos:Acciones', 'nomenclatura' => 2])->syncRoles($rolAdmin);
                
        // Administración -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        Permission::create(['name' => 'menu.administracion','description' => 'Ver Menú Administración', 'nomenclatura' => 3])->syncRoles($rolAdmin,$rolPrueba);
            //Submenu administracion
            Permission::create(['name' => 'menu.usuarios', 'description' => 'Ver Submenú Administración-Usuarios', 'nomenclatura' => 3])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'usuarios.index', 'description' => 'Usuarios:Tabla', 'nomenclatura' => 3])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'usuarios.acciones', 'description' => 'Usuarios:Acciones', 'nomenclatura' => 3])->syncRoles($rolAdmin);
                Permission::create(['name' => 'menu.roles', 'description' => 'Ver Submenú Administración-Roles y Permisos', 'nomenclatura' => 3])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'roles.index', 'description' => 'Roles:Tabla', 'nomenclatura' => 3])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'roles.acciones', 'description' => 'Roles:Acciones', 'nomenclatura' => 3])->syncRoles($rolAdmin);
                
            Permission::create(['name' => 'menu.accesos', 'description' => 'Ver Submenú Administración-Roles y Permisos', 'nomenclatura' => 3])->syncRoles($rolAdmin);
                //Permisos
                Permission::create(['name' => 'accesos.index', 'description' => 'Accesos:Tabla', 'nomenclatura' => 3])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'accesos.acciones', 'description' => 'Accesos:Acciones', 'nomenclatura' => 3])->syncRoles($rolAdmin);  
        
        // Cadena De Suministros -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            Permission::create(['name' => 'menu.cadena','description' => 'Ver Cadena de Suministros', 'nomenclatura' => 4])->syncRoles($rolAdmin,$rolPrueba);
                //Submenu gasolineras
                Permission::create(['name' => 'menu.controlgasolineras', 'description' => 'Ver Submenú Cadena Suministros-Control Gasolineras', 'nomenclatura' => 4])->syncRoles($rolAdmin);
                //Submenu inventarios
                Permission::create(['name' => 'menu.inventarios', 'description' => 'Ver Submenú Cadena Suministros-Inventarios', 'nomenclatura' => 4])->syncRoles($rolAdmin);
                //Submenu requisiciones
                Permission::create(['name' => 'menu.requisiciones', 'description' => 'Ver Submenú Cadena Suministros-Requisiciones', 'nomenclatura' => 4])->syncRoles($rolAdmin);
                    Permission::create(['name' => 'requisiciones.index', 'description' => 'Requisiciones:Tabla', 'nomenclatura' => 4])->syncRoles($rolAdmin,$rolPrueba);
                    Permission::create(['name' => 'requisiciones.acciones', 'description' => 'Requisiciones:Acciones', 'nomenclatura' => 4])->syncRoles($rolAdmin);
                //Submenu configuracion-cadena
                Permission::create(['name' => 'menu.gasolineras', 'description' => 'Ver Submenú Cadena Suministros-Configuración-Gasolineras', 'nomenclatura' => 4])->syncRoles($rolAdmin);
                    Permission::create(['name' => 'gasolineras.configuracion', 'description' => 'Ver Submenú Cadena Suministros-Configuracion-Gasolineras', 'nomenclatura' => 4])->syncRoles($rolAdmin,$rolPrueba);
                    Permission::create(['name' => 'gasolineras.index', 'description' => 'Gasolineras:Tabla', 'nomenclatura' => 4])->syncRoles($rolAdmin,$rolPrueba);
                    Permission::create(['name' => 'gasolineras.acciones', 'description' => 'Gasolineras:Acciones', 'nomenclatura' => 4])->syncRoles($rolAdmin);

                Permission::create(['name' => 'menu.destinos', 'description' => 'Ver Submenú Cadena Suministros-Configuración-Destinos', 'nomenclatura' => 4])->syncRoles($rolAdmin);
                    Permission::create(['name' => 'destinos.configuracion', 'description' => 'Ver Submenú Cadena Suministros-Configuracion-Destinos', 'nomenclatura' => 4])->syncRoles($rolAdmin,$rolPrueba);
                    Permission::create(['name' => 'destinos.index', 'description' => 'Destinos:Tabla', 'nomenclatura' => 4])->syncRoles($rolAdmin,$rolPrueba);
                    Permission::create(['name' => 'destinos.acciones', 'description' => 'Destinos:Acciones', 'nomenclatura' => 4])->syncRoles($rolAdmin);
                    // Permission::create(['name' => 'requisiciones.acciones', 'description' => 'Requisiciones:Acciones', 'nomenclatura' => 4])->syncRoles($rolAdmin);
        // Archivos -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            Permission::create(['name' => 'menu.archivos', 'description' => 'Ver Submenú Cadena Suministros-Archivos', 'nomenclatura' => 5])->syncRoles($rolAdmin);
                Permission::create(['name' => 'archivos.index', 'description' => 'Archivos:Tabla', 'nomenclatura' => 5])->syncRoles($rolAdmin,$rolPrueba);
                Permission::create(['name' => 'archivos.acciones', 'description' => 'Archivos:Acciones', 'nomenclatura' => 5])->syncRoles($rolAdmin);

    }
}