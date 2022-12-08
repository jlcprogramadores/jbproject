<?php

namespace Database\Seeders;

use App\Models\CategoriasFamilia;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriasFamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'PAPELERIA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'HERRAMIENTAS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'ACERO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'EPP',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'CONSUMIBLES',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'PINTURA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'MOBILIARIO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'ELECTRICOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'MECANICO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'HIDRAULICO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'OXIGENO/ACETILENO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'LIMPIEZA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'OBSEQUIOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'ACEITES Y LUBRICANTES',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'CAFETERIA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'LUZ',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'AGUA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'INTERNET',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'RENTA CAMPAMENTO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'RENTA TRAILA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'OTROS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'NUEVOS PROYECTOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'TRASLADO DE PERSONAL',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'VISITA TECNICA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'GERENCIAL',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'ALIMENTOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'HOSPEDAJE',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'OTROS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'CARTA NO ANTECEDENTES',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'CUMPLEAÑOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'POSADAS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'GASTOS EN GENERAL',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'CAPACITACIÓN',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'INGRESOS DE PERSONAL',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'INGRESOS FACTURA MINA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'INGRESOS PRESTAMO EXT',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'INGRESOS RETORNO EFECTIVO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'INGRESOS VENTA OTROS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'INGRESOS INVERSION',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'INGRESOS CREDITO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'PRESTAMOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'INTERESES',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'NOMINA ADMIN',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'NOMINA OPERATIVO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'NOMINA EVENTUAL',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'NOMINA FAM',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'IMSS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'INFONAVIT',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'IMPUESTOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'COMISIONES',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'PERSONALES CEO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'PROVEEDORES',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'FINANCIAMENTO VEHICULOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'HONORARIOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'FINIQUITOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'OTROS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'REFACCIONES',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'ACCESORIOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'SERVICIO MTTO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'POLIZAS SEGURO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'LLANTAS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'RENTA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'COMPRA ACTIVO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'TENENCIA/PLACAS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'REFACCIONES',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'ACCESORIOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'SERVICIO MTTO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'POLIZAS SEGURO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'LLANTAS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'RENTA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'COMPRA/ACTIVO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'FLETE',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 9,
            'nombre' => 'DIESEL',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 9,
            'nombre' => 'GASOLINA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'EQ. COMPUTO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'EQ. VIDEO VIGILANCIA',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'EQ. MEDICION',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'EQ. SEGURIDAD',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'EQ. COMUNICACION',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'EX_INDUCCION',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'EX_COVID',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'DOPING',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'CERTIFICADOS_MEDICOS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'CONSULTAS',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'MEDICAMENTO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'TRATAMIENTO',
            'descripcion' => 'Categoría Familia de Ejemplo',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        
    }
}
