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
        $permisomenufinanzas = Permission::create(['name' => 'menu.finanzas', 'description' => 'Ver Menú Finanzas', 'nomenclatura' => '1'])->syncRoles($rolAdmin,$rolPrueba);
            //Submenu finanzas
            $permisomenusubfinanzas = Permission::create(['name' => 'menu.subfinanzas', 'description' => 'Ver Submenú Finanzas-Finanzas', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasindex = Permission::create(['name' => 'finanzas.index', 'description' => 'Finanzas:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzasfactura = Permission::create(['name' => 'finanzas.factura', 'description' => 'Finanzas:Factura', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzasconfirmarpago = Permission::create(['name' => 'finanzas.confirmarpago', 'description' => 'Finanzas:Confirmar Pago', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzascorreo = Permission::create(['name' => 'finanzas.correo', 'description' => 'Finanzas:Correo', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzascreate = Permission::create(['name' => 'finanzas.create', 'description' => 'Finanzas:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzasshow = Permission::create(['name' => 'finanzas.show', 'description' => 'Finanzas:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzasedit = Permission::create(['name' => 'finanzas.edit', 'description' => 'Finanzas:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzasdestroy = Permission::create(['name' => 'finanzas.destroy', 'description' => 'Finanzas:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzasegreso = Permission::create(['name' => 'finanzas.egreso', 'description' => 'Finanzas:Crear Egreso', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzasingreso = Permission::create(['name' => 'finanzas.ingreso', 'description' => 'Finanzas:Crear Ingreso', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofacturasindex = Permission::create(['name' => 'facturas.index', 'description' => 'Factura:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofacturascreate = Permission::create(['name' => 'facturas.create', 'description' => 'Factura:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofacturasedit = Permission::create(['name' => 'facturas.edit', 'description' => 'Factura:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofacturasdestroy = Permission::create(['name' => 'facturas.destroy', 'description' => 'Factura:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofacturasdestroy = Permission::create(['name' => 'finanzas.formMasDias', 'description' => 'Formulario:Mas días de Fecha de entrada', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                
            $permisomenuegresos = Permission::create(['name' => 'menu.egresos', 'description' => 'Ver Submenú Finanzas-Egresos', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasindexEgreso = Permission::create(['name' => 'finanzas.indexEgreso', 'description' => 'Egreso:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenuingresos = Permission::create(['name' => 'menu.ingresos', 'description' => 'Ver Submenú Finanzas-Ingresos', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasindexIngreso = Permission::create(['name' => 'finanzas.indexIngreso', 'description' => 'Ingreso:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenutop = Permission::create(['name' => 'menu.top', 'description' => 'Ver Submenú Finanzas-Top Egresos e Ingresos', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzastopgeneral = Permission::create(['name' => 'finanzas.topgeneral', 'description' => 'Top Egresos e ingresos:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzastopEgreso = Permission::create(['name' => 'finanzas.topEgreso', 'description' => 'Top Egresos:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzasshowTopEgreso = Permission::create(['name' => 'finanzas.showTopEgreso', 'description' => 'Top Egresos e Ingresos:Botón Top Egresos', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzasshowTopIngreso = Permission::create(['name' => 'finanzas.showTopIngreso', 'description' => 'Top Egresos e Ingresos:Botón Top Ingresos', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofinanzastopIngreso = Permission::create(['name' => 'finanzas.topIngreso', 'description' => 'Top Ingresos:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenufiltros = Permission::create(['name' => 'menu.filtros', 'description' => 'Ver Submenú Finanzas-Filtros', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasfiltros = Permission::create(['name' => 'finanzas.filtros', 'description' => 'Filtros:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenugraficas = Permission::create(['name' => 'menu.graficas', 'description' => 'Ver Submenú Finanzas-Gráficas', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzasgraficas = Permission::create(['name' => 'finanzas.graficas', 'description' => 'Gráficas:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenucentrodecostos = Permission::create(['name' => 'menu.centrodecostos', 'description' => 'Ver Submenú Finanzas-Centro de Costos', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos 
                $permisofinanzascentrodecostos = Permission::create(['name' => 'finanzas.centrodecostos', 'description' => 'Centro de Costos:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
            
            $permisomenuclientes = Permission::create(['name' => 'menu.clientes', 'description' => 'Ver Submenú Administración-Clientes', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisoclientesindex = Permission::create(['name' => 'clientes.index', 'description' => 'Clientes:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin,$rolPrueba);
                $permisoclientesacciones = Permission::create(['name' => 'clientes.acciones', 'description' => 'Clientes:Acciones', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisoclientesshow = Permission::create(['name' => 'clientes.show', 'description' => 'Clientes:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisoclientesedit = Permission::create(['name' => 'clientes.edit', 'description' => 'Clientes:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisoclientesdestroy = Permission::create(['name' => 'clientes.destroy', 'description' => 'Clientes:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenuproveedores = Permission::create(['name' => 'menu.proveedores', 'description' => 'Ver Submenú Administración-Proveedores', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisoproveedoresindex = Permission::create(['name' => 'proveedores.index', 'description' => 'Proveedores:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoproveedorescreate = Permission::create(['name' => 'proveedores.create', 'description' => 'Proveedores:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoproveedoresshow = Permission::create(['name' => 'proveedores.show', 'description' => 'Proveedores:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoproveedoresedit = Permission::create(['name' => 'proveedores.edit', 'description' => 'Proveedores:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoproveedoresdestroy = Permission::create(['name' => 'proveedores.destroy', 'description' => 'Proveedores:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

                //Permisos Cuentas Bancarias 
                $permisocuentabancariaproveedor = Permission::create(['name' => 'cuentasbancarias.cuentabancariaproveedor', 'description' => 'Cuenta Bancaria Proveedor:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocuentabancariaescreate = Permission::create(['name' => 'cuentasbancarias.show', 'description' => 'Cuenta Bancaria:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocuentabancariaescreate = Permission::create(['name' => 'cuentasbancarias.create', 'description' => 'Cuenta Bancaria:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocuentabancariaesedit = Permission::create(['name' => 'cuentasbancarias.edit', 'description' => 'Cuenta Bancaria:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocuentabancariaesdestroy = Permission::create(['name' => 'cuentasbancarias.destroy', 'description' => 'Cuenta Bancaria:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenuproyectos = Permission::create(['name' => 'menu.proyectos', 'description' => 'Ver Submenú Administración-Proyectos', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisoproyectosindex = Permission::create(['name' => 'proyectos.index', 'description' => 'Proyectos:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoproyectoscreate = Permission::create(['name' => 'proyectos.create', 'description' => 'Proyectos:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoproyectosshow = Permission::create(['name' => 'proyectos.show', 'description' => 'Proyectos:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoproyectosedit = Permission::create(['name' => 'proyectos.edit', 'description' => 'Proyectos:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoproyectosdestroy = Permission::create(['name' => 'proyectos.destroy', 'description' => 'Proyectos:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
            
            $permisomenuminas = Permission::create(['name' => 'menu.minas', 'description' => 'Ver Submenú Administración-Minas', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisominasindex = Permission::create(['name' => 'minas.index', 'description' => 'Mina:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisominascreate = Permission::create(['name' => 'minas.create', 'description' => 'Mina:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisominasshow = Permission::create(['name' => 'minas.show', 'description' => 'Mina:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisominasedit = Permission::create(['name' => 'minas.edit', 'description' => 'Mina:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisominasdestroy = Permission::create(['name' => 'minas.destroy', 'description' => 'Mina:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            // configuracion
            $permisomenuconfiguracion = Permission::create(['name' => 'conf.1', 'description' => 'Configuración', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenucategoriasdeentrada = Permission::create(['name' => 'menu.categorias-de-entrada', 'description' => 'Ver Submenú Administración-Categorías de entrada', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisocategoriasdeentradasindex = Permission::create(['name' => 'categorias-de-entradas.index', 'description' => 'Categorías de entrada:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradascreate = Permission::create(['name' => 'categorias-de-entradas.create', 'description' => 'Categorías de entrada:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradasshow = Permission::create(['name' => 'categorias-de-entradas.show', 'description' => 'Categorías de entrada:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradasedit = Permission::create(['name' => 'categorias-de-entradas.edit', 'description' => 'Categorías de entrada:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocategoriasdeentradasdestroy = Permission::create(['name' => 'categorias-de-entradas.destroy', 'description' => 'Categorías de entrada:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenucategoriasfamilias = Permission::create(['name' => 'menu.categorias-familias', 'description' => 'Ver Submenú Administración-Categorías de Familias', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisocategoriasfamiliasindex = Permission::create(['name' => 'categorias-familias.index', 'description' => 'Categorías Familias:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliascreate = Permission::create(['name' => 'categorias-familias.create', 'description' => 'Categorías Familias:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliasshow = Permission::create(['name' => 'categorias-familias.show', 'description' => 'Categorías Familias:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliasedit = Permission::create(['name' => 'categorias-familias.edit', 'description' => 'Categorías Familias:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisocategoriasfamiliasdestroy = Permission::create(['name' => 'categorias-familias.destroy', 'description' => 'Categorías Familias:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenufamilias = Permission::create(['name' => 'menu.familias', 'description' => 'Ver Submenú Administración-Familias', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisofamiliasindex = Permission::create(['name' => 'familias.index', 'description' => 'Familias:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofamiliascreate = Permission::create(['name' => 'familias.create', 'description' => 'Familias:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofamiliasshow = Permission::create(['name' => 'familias.show', 'description' => 'Familias:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofamiliasedit = Permission::create(['name' => 'familias.edit', 'description' => 'Familias:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisofamiliasdestroy = Permission::create(['name' => 'familias.destroy', 'description' => 'Familias:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenuivas = Permission::create(['name' => 'menu.ivas', 'description' => 'Ver Submenú Administración-Ivas', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisoivasindex = Permission::create(['name' => 'ivas.index', 'description' => 'Ivas:Tablas', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoivascreate = Permission::create(['name' => 'ivas.create', 'description' => 'Ivas:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoivasshow = Permission::create(['name' => 'ivas.show', 'description' => 'Ivas:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoivasedit = Permission::create(['name' => 'ivas.edit', 'description' => 'Ivas:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisoivasdestroy = Permission::create(['name' => 'ivas.destroy', 'description' => 'Ivas:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenutipodedirecciones = Permission::create(['name' => 'menu.tipo-de-direcciones', 'description' => 'Ver Submenú Administración- Tipo de Direcciones', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisotipodedireccionesindex = Permission::create(['name' => 'tipo-de-direcciones.index', 'description' => 'Tipo de Direcciones:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisotipodedireccionescreate = Permission::create(['name' => 'tipo-de-direcciones.create', 'description' => 'Tipo de Direcciones:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisotipodedireccionesshow = Permission::create(['name' => 'tipo-de-direcciones.show', 'description' => 'Tipo de Direcciones:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisotipodedireccionesedit = Permission::create(['name' => 'tipo-de-direcciones.edit', 'description' => 'Tipo de Direcciones:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisotipodedireccionesdestroy = Permission::create(['name' => 'tipo-de-direcciones.destroy', 'description' => 'Tipo de Direcciones:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenutipodeingresos = Permission::create(['name' => 'menu.tipo-de-ingresos', 'description' => 'Ver Submenú Administración-Tipo de Ingresos', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisotipodeingresosindex = Permission::create(['name' => 'tipo-de-ingresos.index', 'description' => 'Tipo de Ingresos:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin,$rolPrueba);
                $permisotipodeingresosacciones = Permission::create(['name' => 'tipo-de-ingresos.acciones', 'description' => 'Tipo de Ingresos:Acciones', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisotipodeingresosshow = Permission::create(['name' => 'tipo-de-ingresos.show', 'description' => 'Tipo de Ingresos:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisotipodeingresosedit = Permission::create(['name' => 'tipo-de-ingresos.edit', 'description' => 'Tipo de Ingresos:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisotipodeingresosdestroy = Permission::create(['name' => 'tipo-de-ingresos.destroy', 'description' => 'Tipo de Ingresos:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

            $permisomenuunidades = Permission::create(['name' => 'menu.unidades', 'description' => 'Ver Submenú Administración-Unidades', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                //Permisos
                $permisounidadesindex = Permission::create(['name' => 'unidades.index', 'description' => 'Unidades:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin,$rolPrueba);
                $permisounidadesacciones = Permission::create(['name' => 'unidades.acciones', 'description' => 'Unidades:Acciones', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisounidadescreate = Permission::create(['name' => 'unidades.create', 'description' => 'Unidades:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisounidadesshow = Permission::create(['name' => 'unidades.show', 'description' => 'Unidades:Mostrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisounidadesedit = Permission::create(['name' => 'unidades.edit', 'description' => 'Unidades:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                // $permisounidadesdestroy = Permission::create(['name' => 'unidades.destroy', 'description' => 'Unidades:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
            
            $permisomenuunidades = Permission::create(['name' => 'menu.camposProCli', 'description' => 'Campos contenidos en Proveedores y Clientes', 'nomenclatura' => '1'])->syncRoles($rolAdmin);

                //Permisos Direcciones 
                $permisodireccioncliente = Permission::create(['name' => 'direcciones.direccioncliente', 'description' => 'Dirección Cliente:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisodireccionproveedor = Permission::create(['name' => 'direcciones.direccionproveedor', 'description' => 'Dirección Proveedor:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisodireccionescreate = Permission::create(['name' => 'direcciones.create', 'description' => 'Dirección:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisodireccionesedit = Permission::create(['name' => 'direcciones.edit', 'description' => 'Dirección:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisodireccionesdestroy = Permission::create(['name' => 'direcciones.destroy', 'description' => 'Dirección:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                
                //Permisos Telefonos 
                $permisotelefonocliente = Permission::create(['name' => 'telefonos.telefonocliente', 'description' => 'Teléfono Cliente:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisotelefonoproveedor = Permission::create(['name' => 'telefonos.telefonoproveedor', 'description' => 'Teléfono Proveedor:Tabla', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisotelefonoescreate = Permission::create(['name' => 'telefonos.create', 'description' => 'Teléfono:Crear', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisotelefonoesedit = Permission::create(['name' => 'telefonos.edit', 'description' => 'Teléfono:Editar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
                $permisotelefonoesdestroy = Permission::create(['name' => 'telefonos.destroy', 'description' => 'Teléfono:Borrar', 'nomenclatura' => '1'])->syncRoles($rolAdmin);
        // VIEJO -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $permisomenurecursoshumanos = Permission::create(['name' => 'menu.recursoshumanos', 'description' => 'Ver Menú Recursos Humanos', 'nomenclatura' => '2'])->syncRoles($rolAdmin,$rolPrueba);
        //Submenu recursos humanos
            //Submenu expedientes
            $permisomenucandidatos= Permission::create(['name' => 'menu.candidatos', 'description' => 'Ver Submenú RecursosHumanos-Candidatos', 'nomenclatura' => '2'])->syncRoles($rolAdmin,$rolPrueba);
                //Permisos expedientes
                $permisocandidatosindex = Permission::create(['name' => 'candidatos.index', 'description' => 'Candidatos:Tabla', 'nomenclatura' => '2'])->syncRoles($rolAdmin,$rolPrueba);
                $permisocandidatosacciones = Permission::create(['name' => 'candidatos.acciones', 'description' => 'Candidatos:Acciones', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisocandidatoscreate = Permission::create(['name' => 'candidatos.create', 'description' => 'Candidatos:Crear', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisocandidatosshow = Permission::create(['name' => 'candidatos.show', 'description' => 'Candidatos:Mostrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisocandidatosedit = Permission::create(['name' => 'candidatos.edit', 'description' => 'Candidatos:Editar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisocandidatosdestroy = Permission::create(['name' => 'candidatos.destroy', 'description' => 'Candidatos:Borrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);  
            
            //Submenu empleados
            $permisomenuempleados= Permission::create(['name' => 'menu.empleados', 'description' => 'Ver Submenú RecursosHumanos-Empleados', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                //Permisos empleados
                $permisoempleadosindex = Permission::create(['name' => 'empleados.index', 'description' => 'Empleados:Tabla', 'nomenclatura' => '2'])->syncRoles($rolAdmin,$rolPrueba);
                $permisoempleadosacciones = Permission::create(['name' => 'empleados.acciones', 'description' => 'Empleados:Acciones', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoempleadosshow = Permission::create(['name' => 'empleados.show', 'description' => 'Empleados:Mostrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoempleadosedit = Permission::create(['name' => 'empleados.edit', 'description' => 'Empleados:Editar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoempleadosdestroy = Permission::create(['name' => 'empleados.destroy', 'description' => 'Empleados:Borrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
            
            //Submenu empleado-expedientes
            $permisomenuempleadoexpedientes= Permission::create(['name' => 'menu.empleado-expedientes', 'description' => 'Ver Submenú RecursosHumanos-Empleado-Expedientes', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                //Permisos empleado-expedientes
                $permisoempleadoexpedientestabla= Permission::create(['name' => 'empleado-expedientes.index', 'description' => 'Empleados-Expedientes:Tabla', 'nomenclatura' => '2'])->syncRoles($rolAdmin,$rolPrueba);
                $permisoempleadoexpedientesacciones = Permission::create(['name' => 'empleado-expedientes.acciones', 'description' => 'Empleados-Expedientes:Acciones', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoempleadoexpedientesmostrar = Permission::create(['name' => 'empleado-expedientes.show', 'description' => 'Empleados-Expedientes:Mostrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoempleadoexpedientescartasamonestacion = Permission::create(['name' => 'empleado-expedientes.cartasamonestacion', 'description' => 'Empleados-Expedientes:Cartas-Amonestacion', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoempleadoexpedientesedit = Permission::create(['name' => 'empleado-expedientes.edit', 'description' => 'Empleados-Expedientes:Editar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
            
            //Submenu incidencias
            $permisomenuincidencias= Permission::create(['name' => 'menu.incidencias', 'description' => 'Ver Submenú RecursosHumanos-Incidencias', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                //Permisos incidencias
                $permisoincidenciasindex = Permission::create(['name' => 'incidencias.index', 'description' => 'Incidencias:Tabla', 'nomenclatura' => '2'])->syncRoles($rolAdmin,$rolPrueba);
                $permisoincidenciasacciones = Permission::create(['name' => 'incidencias.acciones', 'description' => 'Incidencias:Acciones', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoincidenciasshow = Permission::create(['name' => 'incidencias.show', 'description' => 'Incidencias:Mostrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoincidenciasedit = Permission::create(['name' => 'incidencias.edit', 'description' => 'Incidencias:Editar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoincidenciasdestroy = Permission::create(['name' => 'incidencias.destroy', 'description' => 'Incidencias:Borrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);

            //Submenu grupos
            $permisomenugrupos= Permission::create(['name' => 'menu.grupos', 'description' => 'Ver Submenú RecursosHumanos-Grupos', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
            //Permisos incidencias
            $permisogruposindex = Permission::create(['name' => 'grupos.index', 'description' => 'Grupos:Tabla', 'nomenclatura' => '2'])->syncRoles($rolAdmin,$rolPrueba);
            $permisogruposacciones = Permission::create(['name' => 'grupos.acciones', 'description' => 'Grupos:Acciones', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
            // $permisogruposshow = Permission::create(['name' => 'grupos.show', 'description' => 'Grupos:Lista Empleados', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
            // $permisogruposedit = Permission::create(['name' => 'grupos.edit', 'description' => 'Grupos:Editar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
            // $permisogruposdestroy = Permission::create(['name' => 'grupos.destroy', 'description' => 'Grupos:Borrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);

            //Submenu paros
            $permisomenuparos= Permission::create(['name' => 'menu.paros', 'description' => 'Ver Submenú RecursosHumanos-Paros', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                //Permisos paros
                $permisoparosindex = Permission::create(['name' => 'paros.index', 'description' => 'Paros:Tabla', 'nomenclatura' => '2'])->syncRoles($rolAdmin,$rolPrueba);
                $permisoparosacciones = Permission::create(['name' => 'paros.acciones', 'description' => 'Paros:Acciones', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoparoscreate = Permission::create(['name' => 'paros.create', 'description' => 'Paros:Crear', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoparoshistorial = Permission::create(['name' => 'paros.historial', 'description' => 'Paros:Historial', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoparosshow = Permission::create(['name' => 'paros.show', 'description' => 'Paros:Mostrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoparosedit = Permission::create(['name' => 'paros.edit', 'description' => 'Paros:Editar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoparosdestroy = Permission::create(['name' => 'paros.destroy', 'description' => 'Paros:Borrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);

            //Submenu poblacion
            $permisomenupoblacion= Permission::create(['name' => 'menu.poblacion', 'description' => 'Ver Submenú RecursosHumanos-Poblacion', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                //Permisos poblacion
                $permisopoblacionindex = Permission::create(['name' => 'poblacion.index', 'description' => 'Poblacion:Tabla', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                $permisopoblaciondetalle = Permission::create(['name' => 'poblacion.detalle', 'description' => 'Poblacion:Detalle Poblacion', 'nomenclatura' => '2'])->syncRoles($rolAdmin);


            // Configuracion 
            $permisomenuproyectos = Permission::create(['name' => 'conf.2', 'description' => 'Configuración', 'nomenclatura' => '2'])->syncRoles($rolAdmin);

            //Submenu expedientes
            $permisomenuexpedientes= Permission::create(['name' => 'menu.expedientes', 'description' => 'Ver Submenú RecursosHumanos-Expedientes', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                //Permisos expedientes
                $permisoexpedientesindex = Permission::create(['name' => 'expedientes.index', 'description' => 'Expedientes:Tabla', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoexpedientescreate = Permission::create(['name' => 'expedientes.create', 'description' => 'Expedientes:Crear', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                $permisoexpedientesshow = Permission::create(['name' => 'expedientes.show', 'description' => 'Expedientes:Mostrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                $permisoexpedientesedit = Permission::create(['name' => 'expedientes.edit', 'description' => 'Expedientes:Editar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisoexpedientesdestroy = Permission::create(['name' => 'expedientes.destroy', 'description' => 'Expedientes:Borrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
            
            //Submenu puestos 
            $permisomenupuestos= Permission::create(['name' => 'menu.puestos', 'description' => 'Ver Submenú RecursosHumanos-Puestos', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
            //Permisos puestos
                $permisopuestosindex = Permission::create(['name' => 'puestos.index', 'description' => 'Puestos:Tabla', 'nomenclatura' => '2'])->syncRoles($rolAdmin,$rolPrueba);
                $permisopuestosacciones = Permission::create(['name' => 'puestos.acciones', 'description' => 'Puestos:Acciones', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisopuestosedit = Permission::create(['name' => 'puestos.edit', 'description' => 'Puestos:Editar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);
                // $permisopuestosdestroy = Permission::create(['name' => 'puestos.destroy', 'description' => 'Puestos:Borrar', 'nomenclatura' => '2'])->syncRoles($rolAdmin);    
                
        // Administración -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $permisomenuadministracion = Permission::create(['name' => 'menu.administracion','description' => 'Ver Menú Administración', 'nomenclatura' => '3'])->syncRoles($rolAdmin,$rolPrueba);
            //Submenu administracion
            $permisomenuusuarios = Permission::create(['name' => 'menu.usuarios', 'description' => 'Ver Submenú Administración-Usuarios', 'nomenclatura' => '3'])->syncRoles($rolAdmin);
                //Permisos
                $permisousuariosindex = Permission::create(['name' => 'usuarios.index', 'description' => 'Usuarios:Tabla', 'nomenclatura' => '3'])->syncRoles($rolAdmin,$rolPrueba);
                $permisousuariosacciones = Permission::create(['name' => 'usuarios.acciones', 'description' => 'Usuarios:Acciones', 'nomenclatura' => '3'])->syncRoles($rolAdmin);
                // $permisousuariosshow = Permission::create(['name' => 'usuarios.show', 'description' => 'Usuarios:Mostrar', 'nomenclatura' => '3'])->syncRoles($rolAdmin);
                // $permisousuariosedit = Permission::create(['name' => 'usuarios.edit', 'description' => 'Usuarios:Editar', 'nomenclatura' => '3'])->syncRoles($rolAdmin);
                // $permisousuariosdestroy = Permission::create(['name' => 'usuarios.destroy', 'description' => 'Usuarios:Borrar', 'nomenclatura' => '3'])->syncRoles($rolAdmin);
            $permisomenuroles = Permission::create(['name' => 'menu.roles', 'description' => 'Ver Submenú Administración-Roles y Permisos', 'nomenclatura' => '3'])->syncRoles($rolAdmin);
                //Permisos
                $permisorolesindex = Permission::create(['name' => 'roles.index', 'description' => 'Roles:Tabla', 'nomenclatura' => '3'])->syncRoles($rolAdmin,$rolPrueba);
                $permisorolesacciones = Permission::create(['name' => 'roles.acciones', 'description' => 'Roles:Acciones', 'nomenclatura' => '3'])->syncRoles($rolAdmin);
                // $permisorolesedit = Permission::create(['name' => 'roles.edit', 'description' => 'Roles:Editar', 'nomenclatura' => '3'])->syncRoles($rolAdmin);
                // $permisorolesdestroy = Permission::create(['name' => 'roles.destroy', 'description' => 'Roles:Borrar', 'nomenclatura' => '3'])->syncRoles($rolAdmin);
                // $permisorolesshow = Permission::create(['name' => 'roles.show', 'description' => 'Roles:Mostrar', 'nomenclatura' => '3'])->syncRoles($rolAdmin);           
    }
}
 