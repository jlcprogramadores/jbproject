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
        $permisomenuadministracion = Permission::create(['name' => 'menu.administracion'])->syncRoles($rolAdmin,$rolPrueba);
        $permisomenurecursoshumanos = Permission::create(['name' => 'menu.recursoshumanos'])->syncRoles($rolAdmin,$rolPrueba);
        $permisomenufinanzas = Permission::create(['name' => 'menu.finanzas'])->syncRoles($rolAdmin,$rolPrueba);
        //Submenu recrusos humanos
        $permisomenuplantilla = Permission::create(['name' => 'menu.plantilla'])->syncRoles($rolAdmin);
        $permisomenucurriculums = Permission::create(['name' => 'menu.curriculums'])->syncRoles($rolAdmin);
        //Submenu finanzas
        $permisomenusubfinanzas = Permission::create(['name' => 'menu.subfinanzas'])->syncRoles($rolAdmin);
        $permisomenuegresos = Permission::create(['name' => 'menu.egresos'])->syncRoles($rolAdmin);
        $permisomenuingresos = Permission::create(['name' => 'menu.ingresos'])->syncRoles($rolAdmin);
        $permisomenutop = Permission::create(['name' => 'menu.top'])->syncRoles($rolAdmin);
        $permisomenufiltros = Permission::create(['name' => 'menu.filtros'])->syncRoles($rolAdmin);
        $permisomenugraficas = Permission::create(['name' => 'menu.graficas'])->syncRoles($rolAdmin);
        //Submenu administracion
        $permisomenuclientes = Permission::create(['name' => 'menu.clientes'])->syncRoles($rolAdmin);
        $permisomenuproveedores = Permission::create(['name' => 'menu.proveedores'])->syncRoles($rolAdmin);
        $permisomenuproyectos = Permission::create(['name' => 'menu.proyectos'])->syncRoles($rolAdmin);
        $permisomenuusuarios = Permission::create(['name' => 'menu.usuarios'])->syncRoles($rolAdmin);
        $permisomenucategoriasdeentrada = Permission::create(['name' => 'menu.categorias-de-entrada'])->syncRoles($rolAdmin);
        $permisomenucategoriasfamilias = Permission::create(['name' => 'menu.categorias-familias'])->syncRoles($rolAdmin);
        $permisomenufamilias = Permission::create(['name' => 'menu.familias'])->syncRoles($rolAdmin);
        $permisomenuivas = Permission::create(['name' => 'menu.ivas'])->syncRoles($rolAdmin);
        $permisomenutipodedirecciones = Permission::create(['name' => 'menu.tipo-de-direcciones'])->syncRoles($rolAdmin);
        $permisomenutipodeingresos = Permission::create(['name' => 'menu.tipo-de-ingresos'])->syncRoles($rolAdmin);
        $permisomenuunidades = Permission::create(['name' => 'menu.unidades'])->syncRoles($rolAdmin);

        //Permisos Clientes 
        $permisoclientesindex = Permission::create(['name' => 'clientes.index'])->syncRoles($rolAdmin);
        $permisoclientescreate = Permission::create(['name' => 'clientes.create'])->syncRoles($rolAdmin);
        $permisoclientesshow = Permission::create(['name' => 'clientes.show'])->syncRoles($rolAdmin);
        $permisoclientesedit = Permission::create(['name' => 'clientes.edit'])->syncRoles($rolAdmin);
        $permisoclientesdestroy = Permission::create(['name' => 'clientes.destroy'])->syncRoles($rolAdmin);

        //Permisos Proveedores 
        $permisoproveedoresindex = Permission::create(['name' => 'proveedores.index'])->syncRoles($rolAdmin);
        $permisoproveedorescreate = Permission::create(['name' => 'proveedores.create'])->syncRoles($rolAdmin);
        $permisoproveedoresshow = Permission::create(['name' => 'proveedores.show'])->syncRoles($rolAdmin);
        $permisoproveedoresedit = Permission::create(['name' => 'proveedores.edit'])->syncRoles($rolAdmin);
        $permisoproveedoresdestroy = Permission::create(['name' => 'proveedores.destroy'])->syncRoles($rolAdmin);

        //Permisos Proyectos 
        $permisoproyectosindex = Permission::create(['name' => 'proyectos.index'])->syncRoles($rolAdmin);
        $permisoproyectoscreate = Permission::create(['name' => 'proyectos.create'])->syncRoles($rolAdmin);
        $permisoproyectosshow = Permission::create(['name' => 'proyectos.show'])->syncRoles($rolAdmin);
        $permisoproyectosedit = Permission::create(['name' => 'proyectos.edit'])->syncRoles($rolAdmin);
        $permisoproyectosdestroy = Permission::create(['name' => 'proyectos.destroy'])->syncRoles($rolAdmin);

        //Permisos Usuarios 
        $permisousuariosindex = Permission::create(['name' => 'usuarios.index'])->syncRoles($rolAdmin);
        $permisousuariosshow = Permission::create(['name' => 'usuarios.show'])->syncRoles($rolAdmin);
        $permisousuariosedit = Permission::create(['name' => 'usuarios.edit'])->syncRoles($rolAdmin);
        $permisousuariosdestroy = Permission::create(['name' => 'usuarios.destroy'])->syncRoles($rolAdmin);
        
        //Permisos Categorías de Entradas 
        $permisocategoriasdeentradasindex = Permission::create(['name' => 'categorias-de-entradas.index'])->syncRoles($rolAdmin);
        $permisocategoriasdeentradascreate = Permission::create(['name' => 'categorias-de-entradas.create'])->syncRoles($rolAdmin);
        $permisocategoriasdeentradasshow = Permission::create(['name' => 'categorias-de-entradas.show'])->syncRoles($rolAdmin);
        $permisocategoriasdeentradasedit = Permission::create(['name' => 'categorias-de-entradas.edit'])->syncRoles($rolAdmin);
        $permisocategoriasdeentradasdestroy = Permission::create(['name' => 'categorias-de-entradas.destroy'])->syncRoles($rolAdmin);

        //Permisos Categorías Familias 
        $permisocategoriasfamiliasindex = Permission::create(['name' => 'categorias-familias.index'])->syncRoles($rolAdmin);
        $permisocategoriasfamiliascreate = Permission::create(['name' => 'categorias-familias.create'])->syncRoles($rolAdmin);
        $permisocategoriasfamiliasshow = Permission::create(['name' => 'categorias-familias.show'])->syncRoles($rolAdmin);
        $permisocategoriasfamiliasedit = Permission::create(['name' => 'categorias-familias.edit'])->syncRoles($rolAdmin);
        $permisocategoriasfamiliasdestroy = Permission::create(['name' => 'categorias-familias.destroy'])->syncRoles($rolAdmin);

        //Permisos Familias 
        $permisofamiliasindex = Permission::create(['name' => 'familias.index'])->syncRoles($rolAdmin);
        $permisofamiliascreate = Permission::create(['name' => 'familias.create'])->syncRoles($rolAdmin);
        $permisofamiliasshow = Permission::create(['name' => 'familias.show'])->syncRoles($rolAdmin);
        $permisofamiliasedit = Permission::create(['name' => 'familias.edit'])->syncRoles($rolAdmin);
        $permisofamiliasdestroy = Permission::create(['name' => 'familias.destroy'])->syncRoles($rolAdmin);
        
        //Permisos Ivas 
        $permisoivasindex = Permission::create(['name' => 'ivas.index'])->syncRoles($rolAdmin);
        $permisoivascreate = Permission::create(['name' => 'ivas.create'])->syncRoles($rolAdmin);
        $permisoivasshow = Permission::create(['name' => 'ivas.show'])->syncRoles($rolAdmin);
        $permisoivasedit = Permission::create(['name' => 'ivas.edit'])->syncRoles($rolAdmin);
        $permisoivasdestroy = Permission::create(['name' => 'ivas.destroy'])->syncRoles($rolAdmin);
        
        //Permisos Direcciones 
        $permisodireccioncliente = Permission::create(['name' => 'direcciones.direccioncliente'])->syncRoles($rolAdmin);
        $permisodireccionproveedor = Permission::create(['name' => 'direcciones.direccionproveedor'])->syncRoles($rolAdmin);
        $permisodireccionescreate = Permission::create(['name' => 'direcciones.create'])->syncRoles($rolAdmin);
        $permisodireccionesedit = Permission::create(['name' => 'direcciones.edit'])->syncRoles($rolAdmin);
        $permisodireccionesdestroy = Permission::create(['name' => 'direcciones.destroy'])->syncRoles($rolAdmin);
        
        //Permisos Telefonos 
        $permisotelefonocliente = Permission::create(['name' => 'telefonos.telefonocliente'])->syncRoles($rolAdmin);
        $permisotelefonoproveedor = Permission::create(['name' => 'telefonos.telefonoproveedor'])->syncRoles($rolAdmin);
        $permisotelefonoescreate = Permission::create(['name' => 'telefonos.create'])->syncRoles($rolAdmin);
        $permisotelefonoesedit = Permission::create(['name' => 'telefonos.edit'])->syncRoles($rolAdmin);
        $permisotelefonoesdestroy = Permission::create(['name' => 'telefonos.destroy'])->syncRoles($rolAdmin);

        //Permisos Tipo de Direcciones 
        $permisotipodedireccionesindex = Permission::create(['name' => 'tipo-de-direcciones.index'])->syncRoles($rolAdmin);
        $permisotipodedireccionescreate = Permission::create(['name' => 'tipo-de-direcciones.create'])->syncRoles($rolAdmin);
        $permisotipodedireccionesshow = Permission::create(['name' => 'tipo-de-direcciones.show'])->syncRoles($rolAdmin);
        $permisotipodedireccionesedit = Permission::create(['name' => 'tipo-de-direcciones.edit'])->syncRoles($rolAdmin);
        $permisotipodedireccionesdestroy = Permission::create(['name' => 'tipo-de-direcciones.destroy'])->syncRoles($rolAdmin);

        //Permisos Tipo de Ingresos 
        $permisotipodeingresosindex = Permission::create(['name' => 'tipo-de-ingresos.index'])->syncRoles($rolAdmin);
        $permisotipodeingresoscreate = Permission::create(['name' => 'tipo-de-ingresos.create'])->syncRoles($rolAdmin);
        $permisotipodeingresosshow = Permission::create(['name' => 'tipo-de-ingresos.show'])->syncRoles($rolAdmin);
        $permisotipodeingresosedit = Permission::create(['name' => 'tipo-de-ingresos.edit'])->syncRoles($rolAdmin);
        $permisotipodeingresosdestroy = Permission::create(['name' => 'tipo-de-ingresos.destroy'])->syncRoles($rolAdmin);

        //Permisos Unidades 
        $permisounidadesindex = Permission::create(['name' => 'unidades.index'])->syncRoles($rolAdmin);
        $permisounidadescreate = Permission::create(['name' => 'unidades.create'])->syncRoles($rolAdmin);
        $permisounidadesshow = Permission::create(['name' => 'unidades.show'])->syncRoles($rolAdmin);
        $permisounidadesedit = Permission::create(['name' => 'unidades.edit'])->syncRoles($rolAdmin);
        $permisounidadesdestroy = Permission::create(['name' => 'unidades.destroy'])->syncRoles($rolAdmin);
        
        //Permisos Finanzas
        $permisofinanzasindex = Permission::create(['name' => 'finanzas.index'])->syncRoles($rolAdmin);
        $permisofinanzastopgeneral = Permission::create(['name' => 'finanzas.topgeneral'])->syncRoles($rolAdmin);
        $permisofinanzasindexEgreso = Permission::create(['name' => 'finanzas.indexEgreso'])->syncRoles($rolAdmin);
        $permisofinanzasegreso = Permission::create(['name' => 'finanzas.egreso'])->syncRoles($rolAdmin);
        $permisofinanzastopEgreso = Permission::create(['name' => 'finanzas.topEgreso'])->syncRoles($rolAdmin);
        $permisofinanzasshowTopEgreso = Permission::create(['name' => 'finanzas.showTopEgreso'])->syncRoles($rolAdmin);
        $permisofinanzasindexIngreso = Permission::create(['name' => 'finanzas.indexIngreso'])->syncRoles($rolAdmin);
        $permisofinanzasshowTopIngreso = Permission::create(['name' => 'finanzas.showTopIngreso'])->syncRoles($rolAdmin);
        $permisofinanzasingreso = Permission::create(['name' => 'finanzas.ingreso'])->syncRoles($rolAdmin);
        $permisofinanzastopIngreso = Permission::create(['name' => 'finanzas.topIngreso'])->syncRoles($rolAdmin);
        $permisofinanzascorreo = Permission::create(['name' => 'finanzas.correo'])->syncRoles($rolAdmin);
        $permisofinanzasshow = Permission::create(['name' => 'finanzas.show'])->syncRoles($rolAdmin);
        $permisofinanzasedit = Permission::create(['name' => 'finanzas.edit'])->syncRoles($rolAdmin);
        $permisofinanzasdestroy = Permission::create(['name' => 'finanzas.destroy'])->syncRoles($rolAdmin);
        $permisofinanzasfiltros = Permission::create(['name' => 'finanzas.filtros'])->syncRoles($rolAdmin);

        //Permisos Factura
        $permisofacturasindex = Permission::create(['name' => 'facturas.index'])->syncRoles($rolAdmin);
        $permisofacturascreate = Permission::create(['name' => 'facturas.create'])->syncRoles($rolAdmin);
        $permisofacturasedit = Permission::create(['name' => 'facturas.edit'])->syncRoles($rolAdmin);
        $permisofacturasdestroy = Permission::create(['name' => 'facturas.destroy'])->syncRoles($rolAdmin);

        //Permisos Gráficas
        $permisofinanzasgraficas = Permission::create(['name' => 'finanzas.graficas'])->syncRoles($rolAdmin);
        
    }
}
 