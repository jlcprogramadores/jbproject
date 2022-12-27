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
        // FINANZAS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $permisomenufinanzas = Permission::create(['name' => 'menu.finanzas', 'description' => 'Ver Menú Finanzas', 'nomenclatura' => 'mn-01-sb-00-pm-00'])->syncRoles($rolAdmin,$rolPrueba);
            //Submenu finanzas
            $permisomenusubfinanzas = Permission::create(['name' => 'menu.subfinanzas', 'description' => 'Ver Submenú Finanzas-Finanzas', 'nomenclatura' => 'mn-01-sb-01-pm-00'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasindex = Permission::create(['name' => 'finanzas.index', 'description' => 'Finanzas:Tabla', 'nomenclatura' => 'mn-01-sb-01-pm-01'])->syncRoles($rolAdmin);
                $permisofinanzasfactura = Permission::create(['name' => 'finanzas.factura', 'description' => 'Finanzas:Factura', 'nomenclatura' => 'mn-01-sb-01-pm-02'])->syncRoles($rolAdmin);
                $permisofinanzasconfirmarpago = Permission::create(['name' => 'finanzas.confirmarpago', 'description' => 'Finanzas:Confirmar Pago', 'nomenclatura' => 'mn-01-sb-01-pm-03'])->syncRoles($rolAdmin);
                $permisofinanzascorreo = Permission::create(['name' => 'finanzas.correo', 'description' => 'Finanzas:Correo', 'nomenclatura' => 'mn-01-sb-01-pm-04'])->syncRoles($rolAdmin);
                $permisofinanzascreate = Permission::create(['name' => 'finanzas.create', 'description' => 'Finanzas:Crear', 'nomenclatura' => 'mn-01-sb-01-pm-05'])->syncRoles($rolAdmin);
                $permisofinanzasshow = Permission::create(['name' => 'finanzas.show', 'description' => 'Finanzas:Mostrar', 'nomenclatura' => 'mn-01-sb-01-pm-06'])->syncRoles($rolAdmin);
                $permisofinanzasedit = Permission::create(['name' => 'finanzas.edit', 'description' => 'Finanzas:Editar', 'nomenclatura' => 'mn-01-sb-01-pm-07'])->syncRoles($rolAdmin);
                $permisofinanzasdestroy = Permission::create(['name' => 'finanzas.destroy', 'description' => 'Finanzas:Borrar', 'nomenclatura' => 'mn-01-sb-01-pm-08'])->syncRoles($rolAdmin);
                $permisofinanzasegreso = Permission::create(['name' => 'finanzas.egreso', 'description' => 'Finanzas:Crear Egreso', 'nomenclatura' => 'mn-01-sb-01-pm-08'])->syncRoles($rolAdmin);
                $permisofinanzasingreso = Permission::create(['name' => 'finanzas.ingreso', 'description' => 'Finanzas:Crear Ingreso', 'nomenclatura' => 'mn-01-sb-01-pm-10'])->syncRoles($rolAdmin);
                $permisofacturasindex = Permission::create(['name' => 'facturas.index', 'description' => 'Factura:Tabla', 'nomenclatura' => 'mn-01-sb-01-pm-11'])->syncRoles($rolAdmin);
                $permisofacturascreate = Permission::create(['name' => 'facturas.create', 'description' => 'Factura:Crear', 'nomenclatura' => 'mn-01-sb-01-pm-12'])->syncRoles($rolAdmin);
                $permisofacturasedit = Permission::create(['name' => 'facturas.edit', 'description' => 'Factura:Editar', 'nomenclatura' => 'mn-01-sb-01-pm-13'])->syncRoles($rolAdmin);
                $permisofacturasdestroy = Permission::create(['name' => 'facturas.destroy', 'description' => 'Factura:Borrar', 'nomenclatura' => 'mn-01-sb-01-pm-14'])->syncRoles($rolAdmin);
                
            $permisomenuegresos = Permission::create(['name' => 'menu.egresos', 'description' => 'Ver Submenú Finanzas-Egresos', 'nomenclatura' => 'mn-01-sb-02-pm-00'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasindexEgreso = Permission::create(['name' => 'finanzas.indexEgreso', 'description' => 'Egreso:Tabla', 'nomenclatura' => 'mn-01-sb-02-pm-01'])->syncRoles($rolAdmin);

            $permisomenuingresos = Permission::create(['name' => 'menu.ingresos', 'description' => 'Ver Submenú Finanzas-Ingresos', 'nomenclatura' => 'mn-01-sb-03-pm-00'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasindexIngreso = Permission::create(['name' => 'finanzas.indexIngreso', 'description' => 'Ingreso:Tabla', 'nomenclatura' => 'mn-01-sb-03-pm-01'])->syncRoles($rolAdmin);

            $permisomenutop = Permission::create(['name' => 'menu.top', 'description' => 'Ver Submenú Finanzas-Top Egresos e Ingresos', 'nomenclatura' => 'mn-01-sb-04-pm-00'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzastopgeneral = Permission::create(['name' => 'finanzas.topgeneral', 'description' => 'Top Egresos e ingresos:Tabla', 'nomenclatura' => 'mn-01-sb-04-pm-01'])->syncRoles($rolAdmin);
                $permisofinanzastopEgreso = Permission::create(['name' => 'finanzas.topEgreso', 'description' => 'Top Egresos:Tabla', 'nomenclatura' => 'mn-01-sb-04-pm-02'])->syncRoles($rolAdmin);
                $permisofinanzasshowTopEgreso = Permission::create(['name' => 'finanzas.showTopEgreso', 'description' => 'Top Egresos e Ingresos:Botón Top Egresos', 'nomenclatura' => 'mn-01-sb-04-pm-03'])->syncRoles($rolAdmin);
                $permisofinanzasshowTopIngreso = Permission::create(['name' => 'finanzas.showTopIngreso', 'description' => 'Top Egresos e Ingresos:Botón Top Ingresos', 'nomenclatura' => 'mn-01-sb-04-pm-04'])->syncRoles($rolAdmin);
                $permisofinanzastopIngreso = Permission::create(['name' => 'finanzas.topIngreso', 'description' => 'Top Ingresos:Tabla', 'nomenclatura' => 'mn-01-sb-04-pm-05'])->syncRoles($rolAdmin);

            $permisomenufiltros = Permission::create(['name' => 'menu.filtros', 'description' => 'Ver Submenú Finanzas-Filtros', 'nomenclatura' => 'mn-01-sb-05-pm-00'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasfiltros = Permission::create(['name' => 'finanzas.filtros', 'description' => 'Filtros:Tabla', 'nomenclatura' => 'mn-01-sb-05-pm-01'])->syncRoles($rolAdmin);

            $permisomenugraficas = Permission::create(['name' => 'menu.graficas', 'description' => 'Ver Submenú Finanzas-Gráficas', 'nomenclatura' => 'mn-01-sb-06-pm-00'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasgraficas = Permission::create(['name' => 'finanzas.graficas', 'description' => 'Gráficas:Tabla', 'nomenclatura' => 'mn-01-sb-06-pm-01'])->syncRoles($rolAdmin);

            $permisomenucentrodecostos = Permission::create(['name' => 'menu.centrodecostos', 'description' => 'Ver Submenú Finanzas-Centro de Costos', 'nomenclatura' => 'mn-01-sb-07-pm-00'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzascentrodecostos = Permission::create(['name' => 'finanzas.centrodecostos', 'description' => 'Centro de Costos:Tabla', 'nomenclatura' => 'mn-01-sb-07-pm-01'])->syncRoles($rolAdmin);

        // VIEJO -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $permisomenurecursoshumanos = Permission::create(['name' => 'menu.recursoshumanos', 'description' => 'Ver Menú Recursos Humanos', 'nomenclatura' => 'mn-02-sb-00-pm-00'])->syncRoles($rolAdmin,$rolPrueba);
        //Submenu recursos humanos
        $permisomenuempleados= Permission::create(['name' => 'menu.empleados', 'description' => 'Ver Submenú RecursosHumanos-Empleados', 'nomenclatura' => 'mn-02-sb-01-pm-00'])->syncRoles($rolAdmin);
        $permisomenupuestos= Permission::create(['name' => 'menu.puestos', 'description' => 'Ver Submenú RecursosHumanos-Puestos', 'nomenclatura' => 'mn-02-sb-02-pm-00'])->syncRoles($rolAdmin);
        $permisomenuparos= Permission::create(['name' => 'menu.paros', 'description' => 'Ver Submenú RecursosHumanos-Paros', 'nomenclatura' => 'mn-02-sb-03-pm-00'])->syncRoles($rolAdmin);
        $permisomenuexpedientes= Permission::create(['name' => 'menu.expedientes', 'description' => 'Ver Submenú RecursosHumanos-Expedientes', 'nomenclatura' => 'mn-02-sb-04-pm-00'])->syncRoles($rolAdmin);
            //Submenu empleados
             $permisoempleadosindex = Permission::create(['name' => 'empleados.index', 'description' => 'Empleados:Tabla', 'nomenclatura' => 'mn-02-sb-01-pm-01'])->syncRoles($rolAdmin);
                 //Permisos
                $permisoempleadoscreate = Permission::create(['name' => 'empleados.create', 'description' => 'Empleados:Crear', 'nomenclatura' => 'mn-02-sb-01-pm-02'])->syncRoles($rolAdmin);
                $permisoempleadosshow = Permission::create(['name' => 'empleados.show', 'description' => 'Empleados:Mostrar', 'nomenclatura' => 'mn-02-sb-01-pm-03'])->syncRoles($rolAdmin);
                $permisoempleadosedit = Permission::create(['name' => 'empleados.edit', 'description' => 'Empleados:Editar', 'nomenclatura' => 'mn-02-sb-01-pm-04'])->syncRoles($rolAdmin);
                $permisoempleadosdestroy = Permission::create(['name' => 'empleados.destroy', 'description' => 'Empleados:Borrar', 'nomenclatura' => 'mn-02-sb-01-pm-05'])->syncRoles($rolAdmin);
            //Submenu puestos
                $permisopuestosindex = Permission::create(['name' => 'puestos.index', 'description' => 'Puestos:Tabla', 'nomenclatura' => 'mn-02-sb-02-pm-01'])->syncRoles($rolAdmin);
                //Permisos
                $permisopuestoscreate = Permission::create(['name' => 'puestos.create', 'description' => 'Puestos:Crear', 'nomenclatura' => 'mn-02-sb-02-pm-02'])->syncRoles($rolAdmin);
                $permisopuestosedit = Permission::create(['name' => 'puestos.edit', 'description' => 'Puestos:Editar', 'nomenclatura' => 'mn-02-sb-02-pm-04'])->syncRoles($rolAdmin);
                $permisopuestosdestroy = Permission::create(['name' => 'puestos.destroy', 'description' => 'Puestos:Borrar', 'nomenclatura' => 'mn-02-sb-02-pm-05'])->syncRoles($rolAdmin);
                // Administración -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $permisomenuadministracion = Permission::create(['name' => 'menu.administracion','description' => 'Ver Menú Administración', 'nomenclatura' => 'mn-03-sb-00-pm-00'])->syncRoles($rolAdmin,$rolPrueba);
            //Submenu administracion
            $permisomenuclientes = Permission::create(['name' => 'menu.clientes', 'description' => 'Ver Submenú Administración-Clientes', 'nomenclatura' => 'mn-03-sb-01-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisoclientesindex = Permission::create(['name' => 'clientes.index', 'description' => 'Clientes:Tabla', 'nomenclatura' => 'mn-03-sb-01-pm-01'])->syncRoles($rolAdmin);
                $permisoclientescreate = Permission::create(['name' => 'clientes.create', 'description' => 'Clientes:Crear', 'nomenclatura' => 'mn-03-sb-01-pm-02'])->syncRoles($rolAdmin);
                $permisoclientesshow = Permission::create(['name' => 'clientes.show', 'description' => 'Clientes:Mostrar', 'nomenclatura' => 'mn-03-sb-01-pm-03'])->syncRoles($rolAdmin);
                $permisoclientesedit = Permission::create(['name' => 'clientes.edit', 'description' => 'Clientes:Editar', 'nomenclatura' => 'mn-03-sb-01-pm-04'])->syncRoles($rolAdmin);
                $permisoclientesdestroy = Permission::create(['name' => 'clientes.destroy', 'description' => 'Clientes:Borrar', 'nomenclatura' => 'mn-03-sb-01-pm-05'])->syncRoles($rolAdmin);

            $permisomenuproveedores = Permission::create(['name' => 'menu.proveedores', 'description' => 'Ver Submenú Administración-Proveedores', 'nomenclatura' => 'mn-03-sb-02-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisoproveedoresindex = Permission::create(['name' => 'proveedores.index', 'description' => 'Proveedores:Tabla', 'nomenclatura' => 'mn-03-sb-02-pm-01'])->syncRoles($rolAdmin);
                $permisoproveedorescreate = Permission::create(['name' => 'proveedores.create', 'description' => 'Proveedores:Crear', 'nomenclatura' => 'mn-03-sb-02-pm-02'])->syncRoles($rolAdmin);
                $permisoproveedoresshow = Permission::create(['name' => 'proveedores.show', 'description' => 'Proveedores:Mostrar', 'nomenclatura' => 'mn-03-sb-02-pm-03'])->syncRoles($rolAdmin);
                $permisoproveedoresedit = Permission::create(['name' => 'proveedores.edit', 'description' => 'Proveedores:Editar', 'nomenclatura' => 'mn-03-sb-02-pm-04'])->syncRoles($rolAdmin);
                $permisoproveedoresdestroy = Permission::create(['name' => 'proveedores.destroy', 'description' => 'Proveedores:Borrar', 'nomenclatura' => 'mn-03-sb-02-pm-05'])->syncRoles($rolAdmin);

                //Permisos Cuentas Bancarias 
                $permisocuentabancariaproveedor = Permission::create(['name' => 'cuentasbancarias.cuentabancariaproveedor', 'description' => 'Cuenta Bancaria Proveedor:Tabla', 'nomenclatura' => 'mn-03-sb-02-pm-06'])->syncRoles($rolAdmin);
                $permisocuentabancariaescreate = Permission::create(['name' => 'cuentasbancarias.show', 'description' => 'Cuenta Bancaria:Mostrar', 'nomenclatura' => 'mn-03-sb-02-pm-07'])->syncRoles($rolAdmin);
                $permisocuentabancariaescreate = Permission::create(['name' => 'cuentasbancarias.create', 'description' => 'Cuenta Bancaria:Crear', 'nomenclatura' => 'mn-03-sb-02-pm-08'])->syncRoles($rolAdmin);
                $permisocuentabancariaesedit = Permission::create(['name' => 'cuentasbancarias.edit', 'description' => 'Cuenta Bancaria:Editar', 'nomenclatura' => 'mn-03-sb-02-pm-09'])->syncRoles($rolAdmin);
                $permisocuentabancariaesdestroy = Permission::create(['name' => 'cuentasbancarias.destroy', 'description' => 'Cuenta Bancaria:Borrar', 'nomenclatura' => 'mn-03-sb-02-pm-10'])->syncRoles($rolAdmin);

            $permisomenuproyectos = Permission::create(['name' => 'menu.proyectos', 'description' => 'Ver Submenú Administración-Proyectos', 'nomenclatura' => 'mn-03-sb-03-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisoproyectosindex = Permission::create(['name' => 'proyectos.index', 'description' => 'Proyectos:Tabla', 'nomenclatura' => 'mn-03-sb-03-pm-01'])->syncRoles($rolAdmin);
                $permisoproyectoscreate = Permission::create(['name' => 'proyectos.create', 'description' => 'Proyectos:Crear', 'nomenclatura' => 'mn-03-sb-03-pm-02'])->syncRoles($rolAdmin);
                $permisoproyectosshow = Permission::create(['name' => 'proyectos.show', 'description' => 'Proyectos:Mostrar', 'nomenclatura' => 'mn-03-sb-03-pm-03'])->syncRoles($rolAdmin);
                $permisoproyectosedit = Permission::create(['name' => 'proyectos.edit', 'description' => 'Proyectos:Editar', 'nomenclatura' => 'mn-03-sb-03-pm-04'])->syncRoles($rolAdmin);
                $permisoproyectosdestroy = Permission::create(['name' => 'proyectos.destroy', 'description' => 'Proyectos:Borrar', 'nomenclatura' => 'mn-03-sb-03-pm-05'])->syncRoles($rolAdmin);

            $permisomenuusuarios = Permission::create(['name' => 'menu.usuarios', 'description' => 'Ver Submenú Administración-Usuarios', 'nomenclatura' => 'mn-03-sb-04-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisousuariosindex = Permission::create(['name' => 'usuarios.index', 'description' => 'Usuarios:Tabla', 'nomenclatura' => 'mn-03-sb-04-pm-01'])->syncRoles($rolAdmin);
                $permisousuariosshow = Permission::create(['name' => 'usuarios.show', 'description' => 'Usuarios:Mostrar', 'nomenclatura' => 'mn-03-sb-04-pm-02'])->syncRoles($rolAdmin);
                $permisousuariosedit = Permission::create(['name' => 'usuarios.edit', 'description' => 'Usuarios:Editar', 'nomenclatura' => 'mn-03-sb-04-pm-03'])->syncRoles($rolAdmin);
                $permisousuariosdestroy = Permission::create(['name' => 'usuarios.destroy', 'description' => 'Usuarios:Borrar', 'nomenclatura' => 'mn-03-sb-04-pm-04'])->syncRoles($rolAdmin);

            $permisomenuroles = Permission::create(['name' => 'menu.roles', 'description' => 'Ver Submenú Administración-Roles y Permisos', 'nomenclatura' => 'mn-03-sb-05-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisorolesindex = Permission::create(['name' => 'roles.index', 'description' => 'Roles:Tabla', 'nomenclatura' => 'mn-03-sb-05-pm-01'])->syncRoles($rolAdmin);
                $permisorolescreate = Permission::create(['name' => 'roles.create', 'description' => 'Roles:Crear', 'nomenclatura' => 'mn-03-sb-05-pm-02'])->syncRoles($rolAdmin);
                $permisorolesshow = Permission::create(['name' => 'roles.show', 'description' => 'Roles:Mostrar', 'nomenclatura' => 'mn-03-sb-05-pm-03'])->syncRoles($rolAdmin);
                $permisorolesedit = Permission::create(['name' => 'roles.edit', 'description' => 'Roles:Editar', 'nomenclatura' => 'mn-03-sb-05-pm-04'])->syncRoles($rolAdmin);
                $permisorolesdestroy = Permission::create(['name' => 'roles.destroy', 'description' => 'Roles:Borrar', 'nomenclatura' => 'mn-03-sb-05-pm-05'])->syncRoles($rolAdmin);

            $permisomenucategoriasdeentrada = Permission::create(['name' => 'menu.categorias-de-entrada', 'description' => 'Ver Submenú Administración-Categorías de entrada', 'nomenclatura' => 'mn-03-sb-06-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisocategoriasdeentradasindex = Permission::create(['name' => 'categorias-de-entradas.index', 'description' => 'Categorías de entrada:Tabla', 'nomenclatura' => 'mn-03-sb-06-pm-01'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradascreate = Permission::create(['name' => 'categorias-de-entradas.create', 'description' => 'Categorías de entrada:Crear', 'nomenclatura' => 'mn-03-sb-06-pm-02'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradasshow = Permission::create(['name' => 'categorias-de-entradas.show', 'description' => 'Categorías de entrada:Mostrar', 'nomenclatura' => 'mn-03-sb-06-pm-03'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradasedit = Permission::create(['name' => 'categorias-de-entradas.edit', 'description' => 'Categorías de entrada:Editar', 'nomenclatura' => 'mn-03-sb-06-pm-04'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradasdestroy = Permission::create(['name' => 'categorias-de-entradas.destroy', 'description' => 'Categorías de entrada:Borrar', 'nomenclatura' => 'mn-03-sb-06-pm-05'])->syncRoles($rolAdmin);

            $permisomenucategoriasfamilias = Permission::create(['name' => 'menu.categorias-familias', 'description' => 'Ver Submenú Administración-Categorías de Familias', 'nomenclatura' => 'mn-03-sb-07-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisocategoriasfamiliasindex = Permission::create(['name' => 'categorias-familias.index', 'description' => 'Categorías Familias:Tabla', 'nomenclatura' => 'mn-03-sb-07-pm-01'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliascreate = Permission::create(['name' => 'categorias-familias.create', 'description' => 'Categorías Familias:Crear', 'nomenclatura' => 'mn-03-sb-07-pm-02'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliasshow = Permission::create(['name' => 'categorias-familias.show', 'description' => 'Categorías Familias:Mostrar', 'nomenclatura' => 'mn-03-sb-07-pm-03'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliasedit = Permission::create(['name' => 'categorias-familias.edit', 'description' => 'Categorías Familias:Editar', 'nomenclatura' => 'mn-03-sb-07-pm-04'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliasdestroy = Permission::create(['name' => 'categorias-familias.destroy', 'description' => 'Categorías Familias:Borrar', 'nomenclatura' => 'mn-03-sb-07-pm-05'])->syncRoles($rolAdmin);

            $permisomenufamilias = Permission::create(['name' => 'menu.familias', 'description' => 'Ver Submenú Administración-Familias', 'nomenclatura' => 'mn-03-sb-08-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisofamiliasindex = Permission::create(['name' => 'familias.index', 'description' => 'Familias:Tabla', 'nomenclatura' => 'mn-03-sb-08-pm-01'])->syncRoles($rolAdmin);
                $permisofamiliascreate = Permission::create(['name' => 'familias.create', 'description' => 'Familias:Crear', 'nomenclatura' => 'mn-03-sb-08-pm-02'])->syncRoles($rolAdmin);
                $permisofamiliasshow = Permission::create(['name' => 'familias.show', 'description' => 'Familias:Mostrar', 'nomenclatura' => 'mn-03-sb-08-pm-03'])->syncRoles($rolAdmin);
                $permisofamiliasedit = Permission::create(['name' => 'familias.edit', 'description' => 'Familias:Editar', 'nomenclatura' => 'mn-03-sb-08-pm-04'])->syncRoles($rolAdmin);
                $permisofamiliasdestroy = Permission::create(['name' => 'familias.destroy', 'description' => 'Familias:Borrar', 'nomenclatura' => 'mn-03-sb-08-pm-05'])->syncRoles($rolAdmin);

            $permisomenuivas = Permission::create(['name' => 'menu.ivas', 'description' => 'Ver Submenú Administración-Ivas', 'nomenclatura' => 'mn-03-sb-09-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisoivasindex = Permission::create(['name' => 'ivas.index', 'description' => 'Ivas:Tablas', 'nomenclatura' => 'mn-03-sb-09-pm-01'])->syncRoles($rolAdmin);
                $permisoivascreate = Permission::create(['name' => 'ivas.create', 'description' => 'Ivas:Crear', 'nomenclatura' => 'mn-03-sb-09-pm-02'])->syncRoles($rolAdmin);
                $permisoivasshow = Permission::create(['name' => 'ivas.show', 'description' => 'Ivas:Mostrar', 'nomenclatura' => 'mn-03-sb-09-pm-03'])->syncRoles($rolAdmin);
                $permisoivasedit = Permission::create(['name' => 'ivas.edit', 'description' => 'Ivas:Editar', 'nomenclatura' => 'mn-03-sb-09-pm-04'])->syncRoles($rolAdmin);
                $permisoivasdestroy = Permission::create(['name' => 'ivas.destroy', 'description' => 'Ivas:Borrar', 'nomenclatura' => 'mn-03-sb-09-pm-05'])->syncRoles($rolAdmin);

            $permisomenutipodedirecciones = Permission::create(['name' => 'menu.tipo-de-direcciones', 'description' => 'Ver Submenú Administración- Tipo de Direcciones', 'nomenclatura' => 'mn-03-sb-10-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisotipodedireccionesindex = Permission::create(['name' => 'tipo-de-direcciones.index', 'description' => 'Tipo de Direcciones:Tabla', 'nomenclatura' => 'mn-03-sb-10-pm-01'])->syncRoles($rolAdmin);
                $permisotipodedireccionescreate = Permission::create(['name' => 'tipo-de-direcciones.create', 'description' => 'Tipo de Direcciones:Crear', 'nomenclatura' => 'mn-03-sb-10-pm-02'])->syncRoles($rolAdmin);
                $permisotipodedireccionesshow = Permission::create(['name' => 'tipo-de-direcciones.show', 'description' => 'Tipo de Direcciones:Mostrar', 'nomenclatura' => 'mn-03-sb-10-pm-03'])->syncRoles($rolAdmin);
                $permisotipodedireccionesedit = Permission::create(['name' => 'tipo-de-direcciones.edit', 'description' => 'Tipo de Direcciones:Editar', 'nomenclatura' => 'mn-03-sb-10-pm-04'])->syncRoles($rolAdmin);
                $permisotipodedireccionesdestroy = Permission::create(['name' => 'tipo-de-direcciones.destroy', 'description' => 'Tipo de Direcciones:Borrar', 'nomenclatura' => 'mn-03-sb-10-pm-05'])->syncRoles($rolAdmin);

            $permisomenutipodeingresos = Permission::create(['name' => 'menu.tipo-de-ingresos', 'description' => 'Ver Submenú Administración-Tipo de Ingresos', 'nomenclatura' => 'mn-03-sb-11-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisotipodeingresosindex = Permission::create(['name' => 'tipo-de-ingresos.index', 'description' => 'Tipo de Ingresos:Tabla', 'nomenclatura' => 'mn-03-sb-11-pm-01'])->syncRoles($rolAdmin);
                $permisotipodeingresoscreate = Permission::create(['name' => 'tipo-de-ingresos.create', 'description' => 'Tipo de Ingresos:Crear', 'nomenclatura' => 'mn-03-sb-11-pm-02'])->syncRoles($rolAdmin);
                $permisotipodeingresosshow = Permission::create(['name' => 'tipo-de-ingresos.show', 'description' => 'Tipo de Ingresos:Mostrar', 'nomenclatura' => 'mn-03-sb-11-pm-03'])->syncRoles($rolAdmin);
                $permisotipodeingresosedit = Permission::create(['name' => 'tipo-de-ingresos.edit', 'description' => 'Tipo de Ingresos:Editar', 'nomenclatura' => 'mn-03-sb-11-pm-04'])->syncRoles($rolAdmin);
                $permisotipodeingresosdestroy = Permission::create(['name' => 'tipo-de-ingresos.destroy', 'description' => 'Tipo de Ingresos:Borrar', 'nomenclatura' => 'mn-03-sb-11-pm-05'])->syncRoles($rolAdmin);

            $permisomenuunidades = Permission::create(['name' => 'menu.unidades', 'description' => 'Ver Submenú Administración-Unidades', 'nomenclatura' => 'mn-03-sb-12-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisounidadesindex = Permission::create(['name' => 'unidades.index', 'description' => 'Unidades:Tabla', 'nomenclatura' => 'mn-03-sb-12-pm-01'])->syncRoles($rolAdmin);
                $permisounidadescreate = Permission::create(['name' => 'unidades.create', 'description' => 'Unidades:Crear', 'nomenclatura' => 'mn-03-sb-12-pm-02'])->syncRoles($rolAdmin);
                $permisounidadesshow = Permission::create(['name' => 'unidades.show', 'description' => 'Unidades:Mostrar', 'nomenclatura' => 'mn-03-sb-12-pm-03'])->syncRoles($rolAdmin);
                $permisounidadesedit = Permission::create(['name' => 'unidades.edit', 'description' => 'Unidades:Editar', 'nomenclatura' => 'mn-03-sb-12-pm-04'])->syncRoles($rolAdmin);
                $permisounidadesdestroy = Permission::create(['name' => 'unidades.destroy', 'description' => 'Unidades:Borrar', 'nomenclatura' => 'mn-03-sb-12-pm-05'])->syncRoles($rolAdmin);
            
            $permisomenuunidades = Permission::create(['name' => 'menu.camposProCli', 'description' => 'Campos contenidos en Proveedores y Clientes', 'nomenclatura' => 'mn-03-sb-13-pm-00'])->syncRoles($rolAdmin);

                //Permisos Direcciones 
                $permisodireccioncliente = Permission::create(['name' => 'direcciones.direccioncliente', 'description' => 'Dirección Cliente:Tabla', 'nomenclatura' => 'mn-03-sb-13-pm-01'])->syncRoles($rolAdmin);
                $permisodireccionproveedor = Permission::create(['name' => 'direcciones.direccionproveedor', 'description' => 'Dirección Proveedor:Tabla', 'nomenclatura' => 'mn-03-sb-13-pm-02'])->syncRoles($rolAdmin);
                $permisodireccionescreate = Permission::create(['name' => 'direcciones.create', 'description' => 'Dirección:Crear', 'nomenclatura' => 'mn-03-sb-13-pm-03'])->syncRoles($rolAdmin);
                $permisodireccionesedit = Permission::create(['name' => 'direcciones.edit', 'description' => 'Dirección:Editar', 'nomenclatura' => 'mn-03-sb-13-pm-04'])->syncRoles($rolAdmin);
                $permisodireccionesdestroy = Permission::create(['name' => 'direcciones.destroy', 'description' => 'Dirección:Borrar', 'nomenclatura' => 'mn-03-sb-13-pm-05'])->syncRoles($rolAdmin);
                
                //Permisos Telefonos 
                $permisotelefonocliente = Permission::create(['name' => 'telefonos.telefonocliente', 'description' => 'Teléfono Cliente:Tabla', 'nomenclatura' => 'mn-03-sb-13-pm-06'])->syncRoles($rolAdmin);
                $permisotelefonoproveedor = Permission::create(['name' => 'telefonos.telefonoproveedor', 'description' => 'Teléfono Proveedor:Tabla', 'nomenclatura' => 'mn-03-sb-13-pm-07'])->syncRoles($rolAdmin);
                $permisotelefonoescreate = Permission::create(['name' => 'telefonos.create', 'description' => 'Teléfono:Crear', 'nomenclatura' => 'mn-03-sb-13-pm-08'])->syncRoles($rolAdmin);
                $permisotelefonoesedit = Permission::create(['name' => 'telefonos.edit', 'description' => 'Teléfono:Editar', 'nomenclatura' => 'mn-03-sb-13-pm-09'])->syncRoles($rolAdmin);
                $permisotelefonoesdestroy = Permission::create(['name' => 'telefonos.destroy', 'description' => 'Teléfono:Borrar', 'nomenclatura' => 'mn-03-sb-13-pm-10'])->syncRoles($rolAdmin);        
        
    }
}
 