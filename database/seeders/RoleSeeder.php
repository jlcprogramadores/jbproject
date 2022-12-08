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
        
        //Permisos Menu
        $permisomenuadministracion = Permission::create(['name' => 'menu.administracion','description' => 'Ver Menú Administración'])->syncRoles($rolAdmin,$rolPrueba);
        $permisomenurecursoshumanos = Permission::create(['name' => 'menu.recursoshumanos', 'description' => 'Ver Menú Recursos Humanos'])->syncRoles($rolAdmin,$rolPrueba);
        $permisomenufinanzas = Permission::create(['name' => 'menu.finanzas', 'description' => 'Ver Menú Finanzas'])->syncRoles($rolAdmin,$rolPrueba);
        //Submenu recrusos humanos
        $permisomenuplantilla = Permission::create(['name' => 'menu.plantilla', 'description' => 'Ver Submenú RecursosHumanos-Plantilla'])->syncRoles($rolAdmin);
        $permisomenucurriculums = Permission::create(['name' => 'menu.curriculums', 'description' => 'Ver Submenú RecursosHumanos-Currículums'])->syncRoles($rolAdmin);
        //Submenu finanzas
        $permisomenusubfinanzas = Permission::create(['name' => 'menu.subfinanzas', 'description' => 'Ver Submenú Finanzas-Finanzas'])->syncRoles($rolAdmin);
        $permisomenuegresos = Permission::create(['name' => 'menu.egresos', 'description' => 'Ver Submenú Finanzas-Egresos'])->syncRoles($rolAdmin);
        $permisomenuingresos = Permission::create(['name' => 'menu.ingresos', 'description' => 'Ver Submenú Finanzas-Ingresos'])->syncRoles($rolAdmin);
        $permisomenutop = Permission::create(['name' => 'menu.top', 'description' => 'Ver Submenú Finanzas-Top Egresos e Ingresos'])->syncRoles($rolAdmin);
        $permisomenufiltros = Permission::create(['name' => 'menu.filtros', 'description' => 'Ver Submenú Finanzas-Filtros'])->syncRoles($rolAdmin);
        $permisomenugraficas = Permission::create(['name' => 'menu.graficas', 'description' => 'Ver Submenú Finanzas-Gráficas'])->syncRoles($rolAdmin);
        //Submenu administracion
        $permisomenuclientes = Permission::create(['name' => 'menu.clientes', 'description' => 'Ver Submenú Administración-Clientes'])->syncRoles($rolAdmin);
        $permisomenuproveedores = Permission::create(['name' => 'menu.proveedores', 'description' => 'Ver Submenú Administración-Proveedores'])->syncRoles($rolAdmin);
        $permisomenuproyectos = Permission::create(['name' => 'menu.proyectos', 'description' => 'Ver Submenú Administración-Proyectos'])->syncRoles($rolAdmin);
        $permisomenuusuarios = Permission::create(['name' => 'menu.usuarios', 'description' => 'Ver Submenú Administración-Usuarios'])->syncRoles($rolAdmin);
        $permisomenucategoriasdeentrada = Permission::create(['name' => 'menu.categorias-de-entrada', 'description' => 'Ver Submenú Administración-Categorías de entrada'])->syncRoles($rolAdmin);
        $permisomenucategoriasfamilias = Permission::create(['name' => 'menu.categorias-familias', 'description' => 'Ver Submenú Administración-Categorías de Familias'])->syncRoles($rolAdmin);
        $permisomenufamilias = Permission::create(['name' => 'menu.familias', 'description' => 'Ver Submenú Administración-Familias'])->syncRoles($rolAdmin);
        $permisomenuivas = Permission::create(['name' => 'menu.ivas', 'description' => 'Ver Submenú Administración-Ivas'])->syncRoles($rolAdmin);
        $permisomenutipodedirecciones = Permission::create(['name' => 'menu.tipo-de-direcciones', 'description' => 'Ver Submenú Administración- Tipo de Direcciones'])->syncRoles($rolAdmin);
        $permisomenutipodeingresos = Permission::create(['name' => 'menu.tipo-de-ingresos', 'description' => 'Ver Submenú Administración-Tipo de Ingresos'])->syncRoles($rolAdmin);
        $permisomenuunidades = Permission::create(['name' => 'menu.unidades', 'description' => 'Ver Submenú Administración-Unidades'])->syncRoles($rolAdmin);

        //Permisos Clientes 
        $permisoclientesindex = Permission::create(['name' => 'clientes.index', 'description' => 'Clientes:Tabla'])->syncRoles($rolAdmin);
        $permisoclientescreate = Permission::create(['name' => 'clientes.create', 'description' => 'Clientes:Crear'])->syncRoles($rolAdmin);
        $permisoclientesshow = Permission::create(['name' => 'clientes.show', 'description' => 'Clientes:Mostrar'])->syncRoles($rolAdmin);
        $permisoclientesedit = Permission::create(['name' => 'clientes.edit', 'description' => 'Clientes:Editar'])->syncRoles($rolAdmin);
        $permisoclientesdestroy = Permission::create(['name' => 'clientes.destroy', 'description' => 'Clientes:Borrar'])->syncRoles($rolAdmin);

        //Permisos Proveedores 
        $permisoproveedoresindex = Permission::create(['name' => 'proveedores.index', 'description' => 'Proveedores:Tabla'])->syncRoles($rolAdmin);
        $permisoproveedorescreate = Permission::create(['name' => 'proveedores.create', 'description' => 'Proveedores:Crear'])->syncRoles($rolAdmin);
        $permisoproveedoresshow = Permission::create(['name' => 'proveedores.show', 'description' => 'Proveedores:Mostrar'])->syncRoles($rolAdmin);
        $permisoproveedoresedit = Permission::create(['name' => 'proveedores.edit', 'description' => 'Proveedores:Editar'])->syncRoles($rolAdmin);
        $permisoproveedoresdestroy = Permission::create(['name' => 'proveedores.destroy', 'description' => 'Proveedores:Borrar'])->syncRoles($rolAdmin);

        //Permisos Proyectos 
        $permisoproyectosindex = Permission::create(['name' => 'proyectos.index', 'description' => 'Proyectos:Tabla'])->syncRoles($rolAdmin);
        $permisoproyectoscreate = Permission::create(['name' => 'proyectos.create', 'description' => 'Proyectos:Crear'])->syncRoles($rolAdmin);
        $permisoproyectosshow = Permission::create(['name' => 'proyectos.show', 'description' => 'Proyectos:Mostrar'])->syncRoles($rolAdmin);
        $permisoproyectosedit = Permission::create(['name' => 'proyectos.edit', 'description' => 'Proyectos:Editar'])->syncRoles($rolAdmin);
        $permisoproyectosdestroy = Permission::create(['name' => 'proyectos.destroy', 'description' => 'Proyectos:Borrar'])->syncRoles($rolAdmin);

        //Permisos Usuarios 
        $permisousuariosindex = Permission::create(['name' => 'usuarios.index', 'description' => 'Usuarios:Tabla'])->syncRoles($rolAdmin);
        $permisousuariosshow = Permission::create(['name' => 'usuarios.show', 'description' => 'Usuarios:Mostrar'])->syncRoles($rolAdmin);
        $permisousuariosedit = Permission::create(['name' => 'usuarios.edit', 'description' => 'Usuarios:Editar'])->syncRoles($rolAdmin);
        $permisousuariosdestroy = Permission::create(['name' => 'usuarios.destroy', 'description' => 'Usuarios:Borrar'])->syncRoles($rolAdmin);
        
        //Permisos Categorías de Entradas 
        $permisocategoriasdeentradasindex = Permission::create(['name' => 'categorias-de-entradas.index', 'description' => 'Categorías de entrada:Tabla'])->syncRoles($rolAdmin);
        $permisocategoriasdeentradascreate = Permission::create(['name' => 'categorias-de-entradas.create', 'description' => 'Categorías de entrada:Crear'])->syncRoles($rolAdmin);
        $permisocategoriasdeentradasshow = Permission::create(['name' => 'categorias-de-entradas.show', 'description' => 'Categorías de entrada:Mostrar'])->syncRoles($rolAdmin);
        $permisocategoriasdeentradasedit = Permission::create(['name' => 'categorias-de-entradas.edit', 'description' => 'Categorías de entrada:Editar'])->syncRoles($rolAdmin);
        $permisocategoriasdeentradasdestroy = Permission::create(['name' => 'categorias-de-entradas.destroy', 'description' => 'Categorías de entrada:Borrar'])->syncRoles($rolAdmin);

        //Permisos Categorías Familias 
        $permisocategoriasfamiliasindex = Permission::create(['name' => 'categorias-familias.index', 'description' => 'Categorías Familias:Tabla'])->syncRoles($rolAdmin);
        $permisocategoriasfamiliascreate = Permission::create(['name' => 'categorias-familias.create', 'description' => 'Categorías Familias:Crear'])->syncRoles($rolAdmin);
        $permisocategoriasfamiliasshow = Permission::create(['name' => 'categorias-familias.show', 'description' => 'Categorías Familias:Mostrar'])->syncRoles($rolAdmin);
        $permisocategoriasfamiliasedit = Permission::create(['name' => 'categorias-familias.edit', 'description' => 'Categorías Familias:Editar'])->syncRoles($rolAdmin);
        $permisocategoriasfamiliasdestroy = Permission::create(['name' => 'categorias-familias.destroy', 'description' => 'Categorías Familias:Borrar'])->syncRoles($rolAdmin);

        //Permisos Familias 
        $permisofamiliasindex = Permission::create(['name' => 'familias.index', 'description' => 'Familias:Tabla'])->syncRoles($rolAdmin);
        $permisofamiliascreate = Permission::create(['name' => 'familias.create', 'description' => 'Familias:Crear'])->syncRoles($rolAdmin);
        $permisofamiliasshow = Permission::create(['name' => 'familias.show', 'description' => 'Familias:Mostrar'])->syncRoles($rolAdmin);
        $permisofamiliasedit = Permission::create(['name' => 'familias.edit', 'description' => 'Familias:Editar'])->syncRoles($rolAdmin);
        $permisofamiliasdestroy = Permission::create(['name' => 'familias.destroy', 'description' => 'Familias:Borrar'])->syncRoles($rolAdmin);
        
        //Permisos Ivas 
        $permisoivasindex = Permission::create(['name' => 'ivas.index', 'description' => 'Ivas:Tablas'])->syncRoles($rolAdmin);
        $permisoivascreate = Permission::create(['name' => 'ivas.create', 'description' => 'Ivas:Crear'])->syncRoles($rolAdmin);
        $permisoivasshow = Permission::create(['name' => 'ivas.show', 'description' => 'Ivas:Mostrar'])->syncRoles($rolAdmin);
        $permisoivasedit = Permission::create(['name' => 'ivas.edit', 'description' => 'Ivas:Editar'])->syncRoles($rolAdmin);
        $permisoivasdestroy = Permission::create(['name' => 'ivas.destroy', 'description' => 'Ivas:Borrar'])->syncRoles($rolAdmin);
        
        //Permisos Direcciones 
        $permisodireccioncliente = Permission::create(['name' => 'direcciones.direccioncliente', 'description' => 'Dirección Cliente:Tabla'])->syncRoles($rolAdmin);
        $permisodireccionproveedor = Permission::create(['name' => 'direcciones.direccionproveedor', 'description' => 'Dirección Proveedor:Tabla'])->syncRoles($rolAdmin);
        $permisodireccionescreate = Permission::create(['name' => 'direcciones.create', 'description' => 'Dirección:Crear'])->syncRoles($rolAdmin);
        $permisodireccionesedit = Permission::create(['name' => 'direcciones.edit', 'description' => 'Dirección:Editar'])->syncRoles($rolAdmin);
        $permisodireccionesdestroy = Permission::create(['name' => 'direcciones.destroy', 'description' => 'Dirección:Borrar'])->syncRoles($rolAdmin);
        
        //Permisos Telefonos 
        $permisotelefonocliente = Permission::create(['name' => 'telefonos.telefonocliente', 'description' => 'Teléfono Cliente:Tabla'])->syncRoles($rolAdmin);
        $permisotelefonoproveedor = Permission::create(['name' => 'telefonos.telefonoproveedor', 'description' => 'Teléfono Proveedor:Tabla'])->syncRoles($rolAdmin);
        $permisotelefonoescreate = Permission::create(['name' => 'telefonos.create', 'description' => 'Teléfono:Crear'])->syncRoles($rolAdmin);
        $permisotelefonoesedit = Permission::create(['name' => 'telefonos.edit', 'description' => 'Teléfono:Editar'])->syncRoles($rolAdmin);
        $permisotelefonoesdestroy = Permission::create(['name' => 'telefonos.destroy', 'description' => 'Teléfono:Borrar'])->syncRoles($rolAdmin);

        //Permisos Tipo de Direcciones 
        $permisotipodedireccionesindex = Permission::create(['name' => 'tipo-de-direcciones.index', 'description' => 'Tipo de Direcciones:Tabla'])->syncRoles($rolAdmin);
        $permisotipodedireccionescreate = Permission::create(['name' => 'tipo-de-direcciones.create', 'description' => 'Tipo de Direcciones:Crear'])->syncRoles($rolAdmin);
        $permisotipodedireccionesshow = Permission::create(['name' => 'tipo-de-direcciones.show', 'description' => 'Tipo de Direcciones:Mostrar'])->syncRoles($rolAdmin);
        $permisotipodedireccionesedit = Permission::create(['name' => 'tipo-de-direcciones.edit', 'description' => 'Tipo de Direcciones:Editar'])->syncRoles($rolAdmin);
        $permisotipodedireccionesdestroy = Permission::create(['name' => 'tipo-de-direcciones.destroy', 'description' => 'Tipo de Direcciones:Borrar'])->syncRoles($rolAdmin);

        //Permisos Tipo de Ingresos 
        $permisotipodeingresosindex = Permission::create(['name' => 'tipo-de-ingresos.index', 'description' => 'Tipo de Ingresos:Tabla'])->syncRoles($rolAdmin);
        $permisotipodeingresoscreate = Permission::create(['name' => 'tipo-de-ingresos.create', 'description' => 'Tipo de Ingresos:Crear'])->syncRoles($rolAdmin);
        $permisotipodeingresosshow = Permission::create(['name' => 'tipo-de-ingresos.show', 'description' => 'Tipo de Ingresos:Mostrar'])->syncRoles($rolAdmin);
        $permisotipodeingresosedit = Permission::create(['name' => 'tipo-de-ingresos.edit', 'description' => 'Tipo de Ingresos:Editar'])->syncRoles($rolAdmin);
        $permisotipodeingresosdestroy = Permission::create(['name' => 'tipo-de-ingresos.destroy', 'description' => 'Tipo de Ingresos:Borrar'])->syncRoles($rolAdmin);

        //Permisos Unidades 
        $permisounidadesindex = Permission::create(['name' => 'unidades.index', 'description' => 'Unidades:Tabla'])->syncRoles($rolAdmin);
        $permisounidadescreate = Permission::create(['name' => 'unidades.create', 'description' => 'Unidades:Crear'])->syncRoles($rolAdmin);
        $permisounidadesshow = Permission::create(['name' => 'unidades.show', 'description' => 'Unidades:Mostrar'])->syncRoles($rolAdmin);
        $permisounidadesedit = Permission::create(['name' => 'unidades.edit', 'description' => 'Unidades:Editar'])->syncRoles($rolAdmin);
        $permisounidadesdestroy = Permission::create(['name' => 'unidades.destroy', 'description' => 'Unidades:Borrar'])->syncRoles($rolAdmin);
        
        //Permisos Finanzas
        $permisofinanzasindex = Permission::create(['name' => 'finanzas.index', 'description' => 'Finanzas:Tabla'])->syncRoles($rolAdmin);
        $permisofinanzasfactura = Permission::create(['name' => 'finanzas.factura', 'description' => 'Finanzas:Factura'])->syncRoles($rolAdmin);
        $permisofinanzascorreo = Permission::create(['name' => 'finanzas.correo', 'description' => 'Finanzas:Correo'])->syncRoles($rolAdmin);
        $permisofinanzascreate = Permission::create(['name' => 'finanzas.create', 'description' => 'Finanzas:Crear'])->syncRoles($rolAdmin);
        $permisofinanzasshow = Permission::create(['name' => 'finanzas.show', 'description' => 'Finanzas:Mostrar'])->syncRoles($rolAdmin);
        $permisofinanzasedit = Permission::create(['name' => 'finanzas.edit', 'description' => 'Finanzas:Editar'])->syncRoles($rolAdmin);
        $permisofinanzasdestroy = Permission::create(['name' => 'finanzas.destroy', 'description' => 'Finanzas:Borrar'])->syncRoles($rolAdmin);
        $permisofinanzasegreso = Permission::create(['name' => 'finanzas.egreso', 'description' => 'Finanzas:Crear Egreso'])->syncRoles($rolAdmin);
        $permisofinanzasingreso = Permission::create(['name' => 'finanzas.ingreso', 'description' => 'Finanzas:Crear Ingreso'])->syncRoles($rolAdmin);
        $permisofinanzastopgeneral = Permission::create(['name' => 'finanzas.topgeneral', 'description' => 'Top Egresos e ingresos:Tabla'])->syncRoles($rolAdmin);
        $permisofinanzasindexEgreso = Permission::create(['name' => 'finanzas.indexEgreso', 'description' => 'Egreso:Tabla'])->syncRoles($rolAdmin);
        $permisofinanzastopEgreso = Permission::create(['name' => 'finanzas.topEgreso', 'description' => 'Top Egresos:Tabla'])->syncRoles($rolAdmin);
        $permisofinanzasshowTopEgreso = Permission::create(['name' => 'finanzas.showTopEgreso', 'description' => 'Top Egresos e Ingresos:Botón Top Egresos'])->syncRoles($rolAdmin);
        $permisofinanzasindexIngreso = Permission::create(['name' => 'finanzas.indexIngreso', 'description' => 'Ingreso:Tabla'])->syncRoles($rolAdmin);
        $permisofinanzasshowTopIngreso = Permission::create(['name' => 'finanzas.showTopIngreso', 'description' => 'Top Egresos e Ingresos:Botón Top Ingresos'])->syncRoles($rolAdmin);
        $permisofinanzastopIngreso = Permission::create(['name' => 'finanzas.topIngreso', 'description' => 'Top Ingresos:Tabla'])->syncRoles($rolAdmin);
        $permisofinanzasfiltros = Permission::create(['name' => 'finanzas.filtros', 'description' => 'Filtros:Tabla'])->syncRoles($rolAdmin);

        //Permisos Factura
        $permisofacturasindex = Permission::create(['name' => 'facturas.index', 'description' => 'Factura:Tabla'])->syncRoles($rolAdmin);
        $permisofacturascreate = Permission::create(['name' => 'facturas.create', 'description' => 'Factura:Crear'])->syncRoles($rolAdmin);
        $permisofacturasedit = Permission::create(['name' => 'facturas.edit', 'description' => 'Factura:Editar'])->syncRoles($rolAdmin);
        $permisofacturasdestroy = Permission::create(['name' => 'facturas.destroy', 'description' => 'Factura:Borrar'])->syncRoles($rolAdmin);

        //Permisos Gráficas
        $permisofinanzasgraficas = Permission::create(['name' => 'finanzas.graficas', 'description' => 'Gráficas:Tabla'])->syncRoles($rolAdmin);
        
    }
}
 