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
                $permisofacturasdestroy = Permission::create(['name' => 'finanzas.formMasDias', 'description' => 'Formulario:Mas días de Fecha de entrada', 'nomenclatura' => 'mn-01-sb-01-pm-15'])->syncRoles($rolAdmin);
                
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
            
            $permisomenuclientes = Permission::create(['name' => 'menu.clientes', 'description' => 'Ver Submenú Administración-Clientes', 'nomenclatura' => 'mn-01-sb-08-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisoclientesindex = Permission::create(['name' => 'clientes.index', 'description' => 'Clientes:Tabla', 'nomenclatura' => 'mn-01-sb-08-pm-01'])->syncRoles($rolAdmin);
                $permisoclientescreate = Permission::create(['name' => 'clientes.create', 'description' => 'Clientes:Crear', 'nomenclatura' => 'mn-01-sb-08-pm-02'])->syncRoles($rolAdmin);
                $permisoclientesshow = Permission::create(['name' => 'clientes.show', 'description' => 'Clientes:Mostrar', 'nomenclatura' => 'mn-01-sb-08-pm-03'])->syncRoles($rolAdmin);
                $permisoclientesedit = Permission::create(['name' => 'clientes.edit', 'description' => 'Clientes:Editar', 'nomenclatura' => 'mn-01-sb-08-pm-04'])->syncRoles($rolAdmin);
                $permisoclientesdestroy = Permission::create(['name' => 'clientes.destroy', 'description' => 'Clientes:Borrar', 'nomenclatura' => 'mn-01-sb-08-pm-05'])->syncRoles($rolAdmin);

            $permisomenuproveedores = Permission::create(['name' => 'menu.proveedores', 'description' => 'Ver Submenú Administración-Proveedores', 'nomenclatura' => 'mn-01-sb-09-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisoproveedoresindex = Permission::create(['name' => 'proveedores.index', 'description' => 'Proveedores:Tabla', 'nomenclatura' => 'mn-01-sb-09-pm-01'])->syncRoles($rolAdmin);
                $permisoproveedorescreate = Permission::create(['name' => 'proveedores.create', 'description' => 'Proveedores:Crear', 'nomenclatura' => 'mn-01-sb-09-pm-02'])->syncRoles($rolAdmin);
                $permisoproveedoresshow = Permission::create(['name' => 'proveedores.show', 'description' => 'Proveedores:Mostrar', 'nomenclatura' => 'mn-01-sb-09-pm-03'])->syncRoles($rolAdmin);
                $permisoproveedoresedit = Permission::create(['name' => 'proveedores.edit', 'description' => 'Proveedores:Editar', 'nomenclatura' => 'mn-01-sb-09-pm-04'])->syncRoles($rolAdmin);
                $permisoproveedoresdestroy = Permission::create(['name' => 'proveedores.destroy', 'description' => 'Proveedores:Borrar', 'nomenclatura' => 'mn-01-sb-09-pm-05'])->syncRoles($rolAdmin);

                //Permisos Cuentas Bancarias 
                $permisocuentabancariaproveedor = Permission::create(['name' => 'cuentasbancarias.cuentabancariaproveedor', 'description' => 'Cuenta Bancaria Proveedor:Tabla', 'nomenclatura' => 'mn-01-sb-09-pm-06'])->syncRoles($rolAdmin);
                $permisocuentabancariaescreate = Permission::create(['name' => 'cuentasbancarias.show', 'description' => 'Cuenta Bancaria:Mostrar', 'nomenclatura' => 'mn-01-sb-09-pm-07'])->syncRoles($rolAdmin);
                $permisocuentabancariaescreate = Permission::create(['name' => 'cuentasbancarias.create', 'description' => 'Cuenta Bancaria:Crear', 'nomenclatura' => 'mn-01-sb-09-pm-08'])->syncRoles($rolAdmin);
                $permisocuentabancariaesedit = Permission::create(['name' => 'cuentasbancarias.edit', 'description' => 'Cuenta Bancaria:Editar', 'nomenclatura' => 'mn-01-sb-09-pm-09'])->syncRoles($rolAdmin);
                $permisocuentabancariaesdestroy = Permission::create(['name' => 'cuentasbancarias.destroy', 'description' => 'Cuenta Bancaria:Borrar', 'nomenclatura' => 'mn-01-sb-09-pm-10'])->syncRoles($rolAdmin);

            $permisomenuproyectos = Permission::create(['name' => 'menu.proyectos', 'description' => 'Ver Submenú Administración-Proyectos', 'nomenclatura' => 'mn-01-sb-10-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisoproyectosindex = Permission::create(['name' => 'proyectos.index', 'description' => 'Proyectos:Tabla', 'nomenclatura' => 'mn-01-sb-10-pm-01'])->syncRoles($rolAdmin);
                $permisoproyectoscreate = Permission::create(['name' => 'proyectos.create', 'description' => 'Proyectos:Crear', 'nomenclatura' => 'mn-01-sb-10-pm-02'])->syncRoles($rolAdmin);
                $permisoproyectosshow = Permission::create(['name' => 'proyectos.show', 'description' => 'Proyectos:Mostrar', 'nomenclatura' => 'mn-01-sb-10-pm-03'])->syncRoles($rolAdmin);
                $permisoproyectosedit = Permission::create(['name' => 'proyectos.edit', 'description' => 'Proyectos:Editar', 'nomenclatura' => 'mn-01-sb-10-pm-04'])->syncRoles($rolAdmin);
                $permisoproyectosdestroy = Permission::create(['name' => 'proyectos.destroy', 'description' => 'Proyectos:Borrar', 'nomenclatura' => 'mn-01-sb-10-pm-05'])->syncRoles($rolAdmin);
            
            $permisomenuminas = Permission::create(['name' => 'menu.minas', 'description' => 'Ver Submenú Administración-Minas', 'nomenclatura' => 'mn-01-sb-20-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisominasindex = Permission::create(['name' => 'minas.index', 'description' => 'Mina:Tabla', 'nomenclatura' => 'mn-01-sb-20-pm-01'])->syncRoles($rolAdmin);
                $permisominascreate = Permission::create(['name' => 'minas.create', 'description' => 'Mina:Crear', 'nomenclatura' => 'mn-01-sb-20-pm-02'])->syncRoles($rolAdmin);
                $permisominasshow = Permission::create(['name' => 'minas.show', 'description' => 'Mina:Mostrar', 'nomenclatura' => 'mn-01-sb-20-pm-03'])->syncRoles($rolAdmin);
                $permisominasedit = Permission::create(['name' => 'minas.edit', 'description' => 'Mina:Editar', 'nomenclatura' => 'mn-01-sb-20-pm-04'])->syncRoles($rolAdmin);
                $permisominasdestroy = Permission::create(['name' => 'minas.destroy', 'description' => 'Mina:Borrar', 'nomenclatura' => 'mn-01-sb-20-pm-05'])->syncRoles($rolAdmin);

            // configuracion
            $permisomenuconfiguracion = Permission::create(['name' => 'conf.1', 'description' => 'Configuración', 'nomenclatura' => 'mn-01-sb-11-pm-00'])->syncRoles($rolAdmin);

            $permisomenucategoriasdeentrada = Permission::create(['name' => 'menu.categorias-de-entrada', 'description' => 'Ver Submenú Administración-Categorías de entrada', 'nomenclatura' => 'mn-01-sb-12-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisocategoriasdeentradasindex = Permission::create(['name' => 'categorias-de-entradas.index', 'description' => 'Categorías de entrada:Tabla', 'nomenclatura' => 'mn-01-sb-12-pm-01'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradascreate = Permission::create(['name' => 'categorias-de-entradas.create', 'description' => 'Categorías de entrada:Crear', 'nomenclatura' => 'mn-01-sb-12-pm-02'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradasshow = Permission::create(['name' => 'categorias-de-entradas.show', 'description' => 'Categorías de entrada:Mostrar', 'nomenclatura' => 'mn-01-sb-12-pm-03'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradasedit = Permission::create(['name' => 'categorias-de-entradas.edit', 'description' => 'Categorías de entrada:Editar', 'nomenclatura' => 'mn-01-sb-12-pm-04'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradasdestroy = Permission::create(['name' => 'categorias-de-entradas.destroy', 'description' => 'Categorías de entrada:Borrar', 'nomenclatura' => 'mn-01-sb-12-pm-05'])->syncRoles($rolAdmin);

            $permisomenucategoriasfamilias = Permission::create(['name' => 'menu.categorias-familias', 'description' => 'Ver Submenú Administración-Categorías de Familias', 'nomenclatura' => 'mn-01-sb-13-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisocategoriasfamiliasindex = Permission::create(['name' => 'categorias-familias.index', 'description' => 'Categorías Familias:Tabla', 'nomenclatura' => 'mn-01-sb-13-pm-01'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliascreate = Permission::create(['name' => 'categorias-familias.create', 'description' => 'Categorías Familias:Crear', 'nomenclatura' => 'mn-01-sb-13-pm-02'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliasshow = Permission::create(['name' => 'categorias-familias.show', 'description' => 'Categorías Familias:Mostrar', 'nomenclatura' => 'mn-01-sb-13-pm-03'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliasedit = Permission::create(['name' => 'categorias-familias.edit', 'description' => 'Categorías Familias:Editar', 'nomenclatura' => 'mn-01-sb-13-pm-04'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliasdestroy = Permission::create(['name' => 'categorias-familias.destroy', 'description' => 'Categorías Familias:Borrar', 'nomenclatura' => 'mn-01-sb-13-pm-05'])->syncRoles($rolAdmin);

            $permisomenufamilias = Permission::create(['name' => 'menu.familias', 'description' => 'Ver Submenú Administración-Familias', 'nomenclatura' => 'mn-01-sb-14-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisofamiliasindex = Permission::create(['name' => 'familias.index', 'description' => 'Familias:Tabla', 'nomenclatura' => 'mn-01-sb-14-pm-01'])->syncRoles($rolAdmin);
                $permisofamiliascreate = Permission::create(['name' => 'familias.create', 'description' => 'Familias:Crear', 'nomenclatura' => 'mn-01-sb-14-pm-02'])->syncRoles($rolAdmin);
                $permisofamiliasshow = Permission::create(['name' => 'familias.show', 'description' => 'Familias:Mostrar', 'nomenclatura' => 'mn-01-sb-14-pm-03'])->syncRoles($rolAdmin);
                $permisofamiliasedit = Permission::create(['name' => 'familias.edit', 'description' => 'Familias:Editar', 'nomenclatura' => 'mn-01-sb-14-pm-04'])->syncRoles($rolAdmin);
                $permisofamiliasdestroy = Permission::create(['name' => 'familias.destroy', 'description' => 'Familias:Borrar', 'nomenclatura' => 'mn-01-sb-14-pm-05'])->syncRoles($rolAdmin);

            $permisomenuivas = Permission::create(['name' => 'menu.ivas', 'description' => 'Ver Submenú Administración-Ivas', 'nomenclatura' => 'mn-01-sb-15-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisoivasindex = Permission::create(['name' => 'ivas.index', 'description' => 'Ivas:Tablas', 'nomenclatura' => 'mn-01-sb-15-pm-01'])->syncRoles($rolAdmin);
                $permisoivascreate = Permission::create(['name' => 'ivas.create', 'description' => 'Ivas:Crear', 'nomenclatura' => 'mn-01-sb-15-pm-02'])->syncRoles($rolAdmin);
                $permisoivasshow = Permission::create(['name' => 'ivas.show', 'description' => 'Ivas:Mostrar', 'nomenclatura' => 'mn-01-sb-15-pm-03'])->syncRoles($rolAdmin);
                $permisoivasedit = Permission::create(['name' => 'ivas.edit', 'description' => 'Ivas:Editar', 'nomenclatura' => 'mn-01-sb-15-pm-04'])->syncRoles($rolAdmin);
                $permisoivasdestroy = Permission::create(['name' => 'ivas.destroy', 'description' => 'Ivas:Borrar', 'nomenclatura' => 'mn-01-sb-15-pm-05'])->syncRoles($rolAdmin);

            $permisomenutipodedirecciones = Permission::create(['name' => 'menu.tipo-de-direcciones', 'description' => 'Ver Submenú Administración- Tipo de Direcciones', 'nomenclatura' => 'mn-01-sb-16-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisotipodedireccionesindex = Permission::create(['name' => 'tipo-de-direcciones.index', 'description' => 'Tipo de Direcciones:Tabla', 'nomenclatura' => 'mn-01-sb-16-pm-01'])->syncRoles($rolAdmin);
                $permisotipodedireccionescreate = Permission::create(['name' => 'tipo-de-direcciones.create', 'description' => 'Tipo de Direcciones:Crear', 'nomenclatura' => 'mn-01-sb-16-pm-02'])->syncRoles($rolAdmin);
                $permisotipodedireccionesshow = Permission::create(['name' => 'tipo-de-direcciones.show', 'description' => 'Tipo de Direcciones:Mostrar', 'nomenclatura' => 'mn-01-sb-16-pm-03'])->syncRoles($rolAdmin);
                $permisotipodedireccionesedit = Permission::create(['name' => 'tipo-de-direcciones.edit', 'description' => 'Tipo de Direcciones:Editar', 'nomenclatura' => 'mn-01-sb-16-pm-04'])->syncRoles($rolAdmin);
                $permisotipodedireccionesdestroy = Permission::create(['name' => 'tipo-de-direcciones.destroy', 'description' => 'Tipo de Direcciones:Borrar', 'nomenclatura' => 'mn-01-sb-16-pm-05'])->syncRoles($rolAdmin);

            $permisomenutipodeingresos = Permission::create(['name' => 'menu.tipo-de-ingresos', 'description' => 'Ver Submenú Administración-Tipo de Ingresos', 'nomenclatura' => 'mn-01-sb-17-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisotipodeingresosindex = Permission::create(['name' => 'tipo-de-ingresos.index', 'description' => 'Tipo de Ingresos:Tabla', 'nomenclatura' => 'mn-01-sb-17-pm-01'])->syncRoles($rolAdmin);
                $permisotipodeingresoscreate = Permission::create(['name' => 'tipo-de-ingresos.create', 'description' => 'Tipo de Ingresos:Crear', 'nomenclatura' => 'mn-01-sb-17-pm-02'])->syncRoles($rolAdmin);
                $permisotipodeingresosshow = Permission::create(['name' => 'tipo-de-ingresos.show', 'description' => 'Tipo de Ingresos:Mostrar', 'nomenclatura' => 'mn-01-sb-17-pm-03'])->syncRoles($rolAdmin);
                $permisotipodeingresosedit = Permission::create(['name' => 'tipo-de-ingresos.edit', 'description' => 'Tipo de Ingresos:Editar', 'nomenclatura' => 'mn-01-sb-17-pm-04'])->syncRoles($rolAdmin);
                $permisotipodeingresosdestroy = Permission::create(['name' => 'tipo-de-ingresos.destroy', 'description' => 'Tipo de Ingresos:Borrar', 'nomenclatura' => 'mn-01-sb-17-pm-05'])->syncRoles($rolAdmin);

            $permisomenuunidades = Permission::create(['name' => 'menu.unidades', 'description' => 'Ver Submenú Administración-Unidades', 'nomenclatura' => 'mn-01-sb-18-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisounidadesindex = Permission::create(['name' => 'unidades.index', 'description' => 'Unidades:Tabla', 'nomenclatura' => 'mn-01-sb-18-pm-01'])->syncRoles($rolAdmin);
                $permisounidadescreate = Permission::create(['name' => 'unidades.create', 'description' => 'Unidades:Crear', 'nomenclatura' => 'mn-01-sb-18-pm-02'])->syncRoles($rolAdmin);
                $permisounidadesshow = Permission::create(['name' => 'unidades.show', 'description' => 'Unidades:Mostrar', 'nomenclatura' => 'mn-01-sb-18-pm-03'])->syncRoles($rolAdmin);
                $permisounidadesedit = Permission::create(['name' => 'unidades.edit', 'description' => 'Unidades:Editar', 'nomenclatura' => 'mn-01-sb-18-pm-04'])->syncRoles($rolAdmin);
                $permisounidadesdestroy = Permission::create(['name' => 'unidades.destroy', 'description' => 'Unidades:Borrar', 'nomenclatura' => 'mn-01-sb-18-pm-05'])->syncRoles($rolAdmin);
            
            $permisomenuunidades = Permission::create(['name' => 'menu.camposProCli', 'description' => 'Campos contenidos en Proveedores y Clientes', 'nomenclatura' => 'mn-01-sb-19-pm-00'])->syncRoles($rolAdmin);

                //Permisos Direcciones 
                $permisodireccioncliente = Permission::create(['name' => 'direcciones.direccioncliente', 'description' => 'Dirección Cliente:Tabla', 'nomenclatura' => 'mn-01-sb-19-pm-01'])->syncRoles($rolAdmin);
                $permisodireccionproveedor = Permission::create(['name' => 'direcciones.direccionproveedor', 'description' => 'Dirección Proveedor:Tabla', 'nomenclatura' => 'mn-01-sb-19-pm-02'])->syncRoles($rolAdmin);
                $permisodireccionescreate = Permission::create(['name' => 'direcciones.create', 'description' => 'Dirección:Crear', 'nomenclatura' => 'mn-01-sb-19-pm-03'])->syncRoles($rolAdmin);
                $permisodireccionesedit = Permission::create(['name' => 'direcciones.edit', 'description' => 'Dirección:Editar', 'nomenclatura' => 'mn-01-sb-19-pm-04'])->syncRoles($rolAdmin);
                $permisodireccionesdestroy = Permission::create(['name' => 'direcciones.destroy', 'description' => 'Dirección:Borrar', 'nomenclatura' => 'mn-01-sb-19-pm-05'])->syncRoles($rolAdmin);
                
                //Permisos Telefonos 
                $permisotelefonocliente = Permission::create(['name' => 'telefonos.telefonocliente', 'description' => 'Teléfono Cliente:Tabla', 'nomenclatura' => 'mn-01-sb-19-pm-06'])->syncRoles($rolAdmin);
                $permisotelefonoproveedor = Permission::create(['name' => 'telefonos.telefonoproveedor', 'description' => 'Teléfono Proveedor:Tabla', 'nomenclatura' => 'mn-01-sb-19-pm-07'])->syncRoles($rolAdmin);
                $permisotelefonoescreate = Permission::create(['name' => 'telefonos.create', 'description' => 'Teléfono:Crear', 'nomenclatura' => 'mn-01-sb-19-pm-08'])->syncRoles($rolAdmin);
                $permisotelefonoesedit = Permission::create(['name' => 'telefonos.edit', 'description' => 'Teléfono:Editar', 'nomenclatura' => 'mn-01-sb-19-pm-09'])->syncRoles($rolAdmin);
                $permisotelefonoesdestroy = Permission::create(['name' => 'telefonos.destroy', 'description' => 'Teléfono:Borrar', 'nomenclatura' => 'mn-01-sb-19-pm-10'])->syncRoles($rolAdmin);
        // VIEJO -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $permisomenurecursoshumanos = Permission::create(['name' => 'menu.recursoshumanos', 'description' => 'Ver Menú Recursos Humanos', 'nomenclatura' => 'mn-02-sb-00-pm-00'])->syncRoles($rolAdmin,$rolPrueba);
        //Submenu recursos humanos
            //Submenu expedientes
            $permisomenucandidatos= Permission::create(['name' => 'menu.candidatos', 'description' => 'Ver Submenú RecursosHumanos-Candidatos', 'nomenclatura' => 'mn-02-sb-01-pm-00'])->syncRoles($rolAdmin,$rolPrueba);
                //Permisos expedientes
                $permisocandidatosacciones = Permission::create(['name' => 'candidatos.acciones', 'description' => 'Candidatos:acciones', 'nomenclatura' => 'mn-02-sb-01-pm-01'])->syncRoles($rolAdmin);
                // $permisocandidatoscreate = Permission::create(['name' => 'candidatos.create', 'description' => 'Candidatos:Crear', 'nomenclatura' => 'mn-02-sb-01-pm-02'])->syncRoles($rolAdmin);
                // $permisocandidatosshow = Permission::create(['name' => 'candidatos.show', 'description' => 'Candidatos:Mostrar', 'nomenclatura' => 'mn-02-sb-01-pm-03'])->syncRoles($rolAdmin);
                // $permisocandidatosedit = Permission::create(['name' => 'candidatos.edit', 'description' => 'Candidatos:Editar', 'nomenclatura' => 'mn-02-sb-01-pm-01'])->syncRoles($rolAdmin);
                // $permisocandidatosdestroy = Permission::create(['name' => 'candidatos.destroy', 'description' => 'Candidatos:Borrar', 'nomenclatura' => 'mn-02-sb-01-pm-05'])->syncRoles($rolAdmin);  
            
            //Submenu empleados
            $permisomenuempleados= Permission::create(['name' => 'menu.empleados', 'description' => 'Ver Submenú RecursosHumanos-Empleados', 'nomenclatura' => 'mn-02-sb-02-pm-00'])->syncRoles($rolAdmin);
                //Permisos empleados
                $permisoempleadosindex = Permission::create(['name' => 'empleados.index', 'description' => 'Empleados:Tabla', 'nomenclatura' => 'mn-02-sb-02-pm-01'])->syncRoles($rolAdmin);
                $permisoempleadoscreate = Permission::create(['name' => 'empleados.create', 'description' => 'Empleados:Crear', 'nomenclatura' => 'mn-02-sb-02-pm-02'])->syncRoles($rolAdmin);
                $permisoempleadosshow = Permission::create(['name' => 'empleados.show', 'description' => 'Empleados:Mostrar', 'nomenclatura' => 'mn-02-sb-02-pm-03'])->syncRoles($rolAdmin);
                $permisoempleadosedit = Permission::create(['name' => 'empleados.edit', 'description' => 'Empleados:Editar', 'nomenclatura' => 'mn-02-sb-02-pm-04'])->syncRoles($rolAdmin);
                $permisoempleadosdestroy = Permission::create(['name' => 'empleados.destroy', 'description' => 'Empleados:Borrar', 'nomenclatura' => 'mn-02-sb-02-pm-05'])->syncRoles($rolAdmin);
            
            //Submenu empleado-expedientes
            $permisomenuempleadoexpedientes= Permission::create(['name' => 'menu.empleado-expedientes', 'description' => 'Ver Submenú RecursosHumanos-Empleado-Expedientes', 'nomenclatura' => 'mn-02-sb-03-pm-00'])->syncRoles($rolAdmin);
                //Permisos empleado-expedientes
                $permisoempleadoexpedientestabla= Permission::create(['name' => 'empleado-expedientes.index', 'description' => 'Empleados-Expedientes:Tabla', 'nomenclatura' => 'mn-02-sb-03-pm-01'])->syncRoles($rolAdmin);
                $permisoempleadoexpedientesfechalimite = Permission::create(['name' => 'empleado-expedientes.fechalimite', 'description' => 'Empleados-Expedientes:Fecha-Limite', 'nomenclatura' => 'mn-02-sb-03-pm-02'])->syncRoles($rolAdmin);
                $permisoempleadoexpedientesmostrar = Permission::create(['name' => 'empleado-expedientes.show', 'description' => 'Empleados-Expedientes:Mostrar', 'nomenclatura' => 'mn-02-sb-03-pm-03'])->syncRoles($rolAdmin);
                $permisoempleadoexpedientescartasamonestacion = Permission::create(['name' => 'empleado-expedientes.cartasamonestacion', 'description' => 'Empleados-Expedientes:Cartas-Amonestacion', 'nomenclatura' => 'mn-02-sb-03-pm-04'])->syncRoles($rolAdmin);
                $permisoempleadoexpedientesedit = Permission::create(['name' => 'empleado-expedientes.edit', 'description' => 'Empleados-Expedientes:Editar', 'nomenclatura' => 'mn-02-sb-03-pm-05'])->syncRoles($rolAdmin);
            
            //Submenu incidencias
            $permisomenuincidencias= Permission::create(['name' => 'menu.incidencias', 'description' => 'Ver Submenú RecursosHumanos-Incidencias', 'nomenclatura' => 'mn-02-sb-04-pm-00'])->syncRoles($rolAdmin);
                //Permisos incidencias
                $permisoincidenciasindex = Permission::create(['name' => 'incidencias.index', 'description' => 'Incidencias:Tabla', 'nomenclatura' => 'mn-02-sb-04-pm-01'])->syncRoles($rolAdmin);
                $permisoincidenciascreate = Permission::create(['name' => 'incidencias.create', 'description' => 'Incidencias:Crear', 'nomenclatura' => 'mn-02-sb-04-pm-02'])->syncRoles($rolAdmin);
                $permisoincidenciasshow = Permission::create(['name' => 'incidencias.show', 'description' => 'Incidencias:Mostrar', 'nomenclatura' => 'mn-02-sb-04-pm-05'])->syncRoles($rolAdmin);
                $permisoincidenciasedit = Permission::create(['name' => 'incidencias.edit', 'description' => 'Incidencias:Editar', 'nomenclatura' => 'mn-02-sb-04-pm-06'])->syncRoles($rolAdmin);
                $permisoincidenciasdestroy = Permission::create(['name' => 'incidencias.destroy', 'description' => 'Incidencias:Borrar', 'nomenclatura' => 'mn-02-sb-04-pm-07'])->syncRoles($rolAdmin);

            //Submenu grupos
            $permisomenugrupos= Permission::create(['name' => 'menu.grupos', 'description' => 'Ver Submenú RecursosHumanos-Grupos', 'nomenclatura' => 'mn-02-sb-05-pm-00'])->syncRoles($rolAdmin);
            //Permisos incidencias
            $permisogruposindex = Permission::create(['name' => 'grupos.index', 'description' => 'Grupos:Tabla', 'nomenclatura' => 'mn-02-sb-05-pm-01'])->syncRoles($rolAdmin);
            $permisogruposcreate = Permission::create(['name' => 'grupos.create', 'description' => 'Grupos:Crear', 'nomenclatura' => 'mn-02-sb-05-pm-02'])->syncRoles($rolAdmin);
            $permisogruposshow = Permission::create(['name' => 'grupos.show', 'description' => 'Grupos:Lista Empleados', 'nomenclatura' => 'mn-02-sb-05-pm-05'])->syncRoles($rolAdmin);
            $permisogruposedit = Permission::create(['name' => 'grupos.edit', 'description' => 'Grupos:Editar', 'nomenclatura' => 'mn-02-sb-05-pm-06'])->syncRoles($rolAdmin);
            $permisogruposdestroy = Permission::create(['name' => 'grupos.destroy', 'description' => 'Grupos:Borrar', 'nomenclatura' => 'mn-02-sb-05-pm-07'])->syncRoles($rolAdmin);

            //Submenu paros
            $permisomenuparos= Permission::create(['name' => 'menu.paros', 'description' => 'Ver Submenú RecursosHumanos-Paros', 'nomenclatura' => 'mn-02-sb-06-pm-00'])->syncRoles($rolAdmin);
                //Permisos paros
                $permisoparosindex = Permission::create(['name' => 'paros.index', 'description' => 'Paros:Tabla', 'nomenclatura' => 'mn-02-sb-06-pm-01'])->syncRoles($rolAdmin,$rolPrueba);
                $permisoparosacciones = Permission::create(['name' => 'paros.acciones', 'description' => 'Paros:Acciones', 'nomenclatura' => 'mn-02-sb-06-pm-02'])->syncRoles($rolAdmin);
                // $permisoparoscreate = Permission::create(['name' => 'paros.create', 'description' => 'Paros:Crear', 'nomenclatura' => 'mn-02-sb-06-pm-02'])->syncRoles($rolAdmin);
                // $permisoparoshistorial = Permission::create(['name' => 'paros.historial', 'description' => 'Paros:Historial', 'nomenclatura' => 'mn-02-sb-06-pm-04'])->syncRoles($rolAdmin);
                // $permisoparosshow = Permission::create(['name' => 'paros.show', 'description' => 'Paros:Mostrar', 'nomenclatura' => 'mn-02-sb-06-pm-05'])->syncRoles($rolAdmin);
                // $permisoparosedit = Permission::create(['name' => 'paros.edit', 'description' => 'Paros:Editar', 'nomenclatura' => 'mn-02-sb-06-pm-06'])->syncRoles($rolAdmin);
                // $permisoparosdestroy = Permission::create(['name' => 'paros.destroy', 'description' => 'Paros:Borrar', 'nomenclatura' => 'mn-02-sb-06-pm-07'])->syncRoles($rolAdmin);

            //Submenu poblacion
            $permisomenupoblacion= Permission::create(['name' => 'menu.poblacion', 'description' => 'Ver Submenú RecursosHumanos-Poblacion', 'nomenclatura' => 'mn-02-sb-07-pm-00'])->syncRoles($rolAdmin);
                //Permisos poblacion
                $permisopoblacionindex = Permission::create(['name' => 'poblacion.index', 'description' => 'Poblacion:Tabla', 'nomenclatura' => 'mn-02-sb-07-pm-01'])->syncRoles($rolAdmin);
                $permisopoblaciondetalle = Permission::create(['name' => 'poblacion.detalle', 'description' => 'Poblacion:Detalle Poblacion', 'nomenclatura' => 'mn-02-sb-07-pm-02'])->syncRoles($rolAdmin);


            // Configuracion 
            $permisomenuproyectos = Permission::create(['name' => 'conf.2', 'description' => 'Configuración', 'nomenclatura' => 'mn-02-sb-08-pm-00'])->syncRoles($rolAdmin);

            //Submenu expedientes
            $permisomenuexpedientes= Permission::create(['name' => 'menu.expedientes', 'description' => 'Ver Submenú RecursosHumanos-Expedientes', 'nomenclatura' => 'mn-02-sb-09-pm-00'])->syncRoles($rolAdmin);
                //Permisos expedientes
                $permisoexpedientesindex = Permission::create(['name' => 'expedientes.index', 'description' => 'Expedientes:Tabla', 'nomenclatura' => 'mn-02-sb-09-pm-01'])->syncRoles($rolAdmin);
                // $permisoexpedientescreate = Permission::create(['name' => 'expedientes.create', 'description' => 'Expedientes:Crear', 'nomenclatura' => 'mn-02-sb-09-pm-02'])->syncRoles($rolAdmin);
                $permisoexpedientesshow = Permission::create(['name' => 'expedientes.show', 'description' => 'Expedientes:Mostrar', 'nomenclatura' => 'mn-02-sb-09-pm-02'])->syncRoles($rolAdmin);
                $permisoexpedientesedit = Permission::create(['name' => 'expedientes.edit', 'description' => 'Expedientes:Editar', 'nomenclatura' => 'mn-02-sb-09-pm-03'])->syncRoles($rolAdmin);
                // $permisoexpedientesdestroy = Permission::create(['name' => 'expedientes.destroy', 'description' => 'Expedientes:Borrar', 'nomenclatura' => 'mn-02-sb-09-pm-05'])->syncRoles($rolAdmin);
            
            //Submenu puestos 
            $permisomenupuestos= Permission::create(['name' => 'menu.puestos', 'description' => 'Ver Submenú RecursosHumanos-Puestos', 'nomenclatura' => 'mn-02-sb-10-pm-00'])->syncRoles($rolAdmin);
            //Permisos puestos
                $permisopuestosindex = Permission::create(['name' => 'puestos.index', 'description' => 'Puestos:Tabla', 'nomenclatura' => 'mn-02-sb-10-pm-01'])->syncRoles($rolAdmin,$rolPrueba);
                $permisopuestosacciones = Permission::create(['name' => 'puestos.acciones', 'description' => 'Puestos:Acciones', 'nomenclatura' => 'mn-02-sb-10-pm-02'])->syncRoles($rolAdmin);
                // $permisopuestosedit = Permission::create(['name' => 'puestos.edit', 'description' => 'Puestos:Editar', 'nomenclatura' => 'mn-02-sb-10-pm-04'])->syncRoles($rolAdmin);
                // $permisopuestosdestroy = Permission::create(['name' => 'puestos.destroy', 'description' => 'Puestos:Borrar', 'nomenclatura' => 'mn-02-sb-10-pm-05'])->syncRoles($rolAdmin);    
                
        // Administración -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $permisomenuadministracion = Permission::create(['name' => 'menu.administracion','description' => 'Ver Menú Administración', 'nomenclatura' => 'mn-03-sb-00-pm-00'])->syncRoles($rolAdmin,$rolPrueba);
            //Submenu administracion
            $permisomenuusuarios = Permission::create(['name' => 'menu.usuarios', 'description' => 'Ver Submenú Administración-Usuarios', 'nomenclatura' => 'mn-03-sb-04-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisousuariosindex = Permission::create(['name' => 'usuarios.index', 'description' => 'Usuarios:Tabla', 'nomenclatura' => 'mn-03-sb-04-pm-01'])->syncRoles($rolAdmin,$rolPrueba);
                $permisousuariosacciones = Permission::create(['name' => 'usuarios.acciones', 'description' => 'Usuarios:Acciones', 'nomenclatura' => 'mn-03-sb-04-pm-01'])->syncRoles($rolAdmin);
                // $permisousuariosshow = Permission::create(['name' => 'usuarios.show', 'description' => 'Usuarios:Mostrar', 'nomenclatura' => 'mn-03-sb-04-pm-02'])->syncRoles($rolAdmin);
                // $permisousuariosedit = Permission::create(['name' => 'usuarios.edit', 'description' => 'Usuarios:Editar', 'nomenclatura' => 'mn-03-sb-04-pm-03'])->syncRoles($rolAdmin);
                // $permisousuariosdestroy = Permission::create(['name' => 'usuarios.destroy', 'description' => 'Usuarios:Borrar', 'nomenclatura' => 'mn-03-sb-04-pm-04'])->syncRoles($rolAdmin);
            $permisomenuroles = Permission::create(['name' => 'menu.roles', 'description' => 'Ver Submenú Administración-Roles y Permisos', 'nomenclatura' => 'mn-03-sb-05-pm-00'])->syncRoles($rolAdmin);
                //Permisos
                $permisorolesindex = Permission::create(['name' => 'roles.index', 'description' => 'Roles:Tabla', 'nomenclatura' => 'mn-03-sb-05-pm-01'])->syncRoles($rolAdmin,$rolPrueba);
                $permisorolesacciones = Permission::create(['name' => 'roles.acciones', 'description' => 'Roles:Acciones', 'nomenclatura' => 'mn-03-sb-05-pm-02'])->syncRoles($rolAdmin);
                // $permisorolesedit = Permission::create(['name' => 'roles.edit', 'description' => 'Roles:Editar', 'nomenclatura' => 'mn-03-sb-05-pm-04'])->syncRoles($rolAdmin);
                // $permisorolesdestroy = Permission::create(['name' => 'roles.destroy', 'description' => 'Roles:Borrar', 'nomenclatura' => 'mn-03-sb-05-pm-05'])->syncRoles($rolAdmin);
                // $permisorolesshow = Permission::create(['name' => 'roles.show', 'description' => 'Roles:Mostrar', 'nomenclatura' => 'mn-03-sb-05-pm-03'])->syncRoles($rolAdmin);           
    }
}
 