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

        //FAMILIA: SERVICIOS
        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'AGUA',
            'descripcion' => 'SERVICIOS: AGUA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'INTERNET',
            'descripcion' => 'SERVICIOS: INTERNET',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'LUZ',
            'descripcion' => 'SERVICIOS: LUZ',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'OTROS',
            'descripcion' => 'SERVICIOS: OTROS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'RENTA',
            'descripcion' => 'SERVICIOS: RENTA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'RENTA CAMPAMENTO',
            'descripcion' => 'SERVICIOS: RENTA CAMPAMENTO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]); 

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'RENTRA TRAILA',
            'descripcion' => 'SERVICIOS: RENTRA TRAILA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 1,
            'nombre' => 'VIATICOS',
            'descripcion' => 'SERVICIOS: VIATICOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //FAMILIA: FINANCIEROS_EGRESO
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'PRESTAMOS',
            'descripcion' => 'FINANCIEROS_EGRESO: PRESTAMOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'INTERESES',
            'descripcion' => 'FINANCIEROS_EGRESO: INTERESES',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'NOMINA ADMIN',
            'descripcion' => 'FINANCIEROS_EGRESO: NOMINA ADMIN',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'NOMINA OPERATIVO',
            'descripcion' => 'FINANCIEROS_EGRESO: NOMINA OPERATIVO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'NOMINA EVENTUAL',
            'descripcion' => 'FINANCIEROS_EGRESO: NOMINA EVENTUAL',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'NOMINA FAM',
            'descripcion' => 'FINANCIEROS_EGRESO: NOMINA FAM',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'IMSS',
            'descripcion' => 'FINANCIEROS_EGRESO: IMSS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'INFONAVIT',
            'descripcion' => 'FINANCIEROS_EGRESO: INFONAVIT',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'IMPUESTOS',
            'descripcion' => 'FINANCIEROS_EGRESO: IMPUESTOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'COMISIONES',
            'descripcion' => 'FINANCIEROS_EGRESO: COMISIONES',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'PERSONALES CEO',
            'descripcion' => 'FINANCIEROS_EGRESO: PERSONALES CEO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'PROVEEDORES',
            'descripcion' => 'FINANCIEROS_EGRESO: PROVEEDORES',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'FINANCIAMIENTO VEHICULOS',
            'descripcion' => 'FINANCIEROS_EGRESO: FINANCIAMIENTO VEHICULOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'HONORARIOS',
            'descripcion' => 'FINANCIEROS_EGRESO: HONORARIOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'FINIQUITOS',
            'descripcion' => 'FINANCIEROS_EGRESO: FINIQUITOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 2,
            'nombre' => 'OTROS',
            'descripcion' => 'FINANCIEROS_EGRESO: OTROS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //FAMILIA: VEHICULOS
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'REFACCIONES',
            'descripcion' => 'VEHICULOS: REFACCIONES',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'ACCESORIOS',
            'descripcion' => 'VEHICULOS: ACCESORIOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'SERVICIO MTTO',
            'descripcion' => 'VEHICULOS: SERVICIO MTTO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'POLIZAS SEGURO',
            'descripcion' => 'VEHICULOS: POLIZAS SEGURO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'LLANTAS',
            'descripcion' => 'VEHICULOS: LLANTAS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'RENTA',
            'descripcion' => 'VEHICULOS: RENTA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'COMPRA ACTIVO',
            'descripcion' => 'VEHICULOS: COMPRA ACTIVO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 3,
            'nombre' => 'TENENCIAS/PLACAS',
            'descripcion' => 'VEHICULOS: TENENCIAS/PLACAS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //FAMILIA: MATERIAL
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'PAPELERIA',
            'descripcion' => 'MATERIAL: PAPELERIA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'HERRAMIENTAS',
            'descripcion' => 'MATERIAL: HERRAMIENTAS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'ACERO',
            'descripcion' => 'MATERIAL: ACERO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'EPP',
            'descripcion' => 'MATERIAL: EPP',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'CONSUMIBLES',
            'descripcion' => 'MATERIAL: CONSUMIBLES',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'PINTURAS',
            'descripcion' => 'MATERIAL: PINTURAS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'ELECTRICOS',
            'descripcion' => 'MATERIAL: ELECTRICOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'MECANICO',
            'descripcion' => 'MATERIAL: MECANICO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'HIDRAULICO',
            'descripcion' => 'MATERIAL: HIDRAULICO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'OXIGENO / ACETILENO',
            'descripcion' => 'MATERIAL: OXIGENO / ACETILENO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'LIMPIEZA',
            'descripcion' => 'MATERIAL: LIMPIEZA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'OBSEQUIOS',
            'descripcion' => 'MATERIAL: OBSEQUIOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'ACEITES Y LUBRICANTES',
            'descripcion' => 'MATERIAL: ACEITES Y LUBRICANTES',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 4,
            'nombre' => 'CAFETERIA',
            'descripcion' => 'MATERIAL: CAFETERIA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //FAMILIA: SERVICIO_MEDICO
        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'EX_INDUCCION',
            'descripcion' => 'SERVICIO_MEDICO: EX_INDUCCION',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'EX_COVID',
            'descripcion' => 'SERVICIO_MEDICO: EX_COVID',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'DOPING',
            'descripcion' => 'SERVICIO_MEDICO: DOPING',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'CERTIFICADOS_MEDICOS',
            'descripcion' => 'SERVICIO_MEDICO: CERTIFICADOS_MEDICOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'CONSULTAS',
            'descripcion' => 'SERVICIO_MEDICO: CONSULTAS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'MEDICAMENTO',
            'descripcion' => 'SERVICIO_MEDICO: MEDICAMENTO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 5,
            'nombre' => 'TRATAMIENTO',
            'descripcion' => 'SERVICIO_MEDICO: TRATAMIENTO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //FAMILIA: EQUIPO_MOVIL
        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'REFACCIONES',
            'descripcion' => 'EQUIPO_MOVIL: REFACCIONES',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'ACCESORIOS',
            'descripcion' => 'EQUIPO_MOVIL: ACCESORIOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'SERVICIO MTTO',
            'descripcion' => 'EQUIPO_MOVIL: SERVICIO MTTO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'POLIZAS SEGURO',
            'descripcion' => 'EQUIPO_MOVIL: POLIZAS SEGURO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'LLANTAS',
            'descripcion' => 'EQUIPO_MOVIL: LLANTAS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'RENTA',
            'descripcion' => 'EQUIPO_MOVIL: RENTA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'COMPRA ACTIVO',
            'descripcion' => 'EQUIPO_MOVIL: COMPRA ACTIVO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 6,
            'nombre' => 'FLETE',
            'descripcion' => 'EQUIPO_MOVIL: FLETE',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //Familia: VIATICOS
        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'NUEVOS PROYECTOS',
            'descripcion' => 'VIATICOS: NUEVOS PROYECTOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'TRASLADO DE PERSONAL',
            'descripcion' => 'VIATICOS: TRASLADO DE PERSONAL',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'VISITA TECNICA',
            'descripcion' => 'VIATICOS: VISITA TECNICA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'GERENCIAL',
            'descripcion' => 'VIATICOS: GERENCIAL',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'ALIMENTOS',
            'descripcion' => 'VIATICOS: ALIMENTOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'HOSPEDAJE',
            'descripcion' => 'VIATICOS: HOSPEDAJE',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 7,
            'nombre' => 'OTROS',
            'descripcion' => 'VIATICOS: OTROS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //Familia: TI
        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'EQ. COMPUTO',
            'descripcion' => 'TI: EQ. COMPUTO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'EQ. VIDEO VIGILANCIA',
            'descripcion' => 'TI: EQ. VIDEO VIGILANCIA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'EQ.MEDICION',
            'descripcion' => 'TI: EQ. MEDICION',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'EQ. SEGURIDAD',
            'descripcion' => 'TI: EQ. SEGURIDAD',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 8,
            'nombre' => 'EQ. COMUNICACIÓN',
            'descripcion' => 'TI: EQ. COMUNICACIÓN',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //Familia:COMBUSTIBLE
        CategoriasFamilia::create([
            'familia_id' => 9,
            'nombre' => 'DIESEL',
            'descripcion' => 'COMBUSTIBLE: DIESEL',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasFamilia::create([
            'familia_id' => 9,
            'nombre' => 'GASOLINA',
            'descripcion' => 'COMBUSTIBLE: GASOLINA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //Familia:FINANCIEROS_IN
        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'INGRE$O$ FACTURA MINA',
            'descripcion' => 'FINANCIEROS_IN: INGRE$O$ FACTURA MINA',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'INGRE$O$ PRESTAMO EXT',
            'descripcion' => 'FINANCIEROS_IN: INGRE$O$ PRESTAMO EXT',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'INGRE$O$ RETORNO EFECTIVO',
            'descripcion' => 'FINANCIEROS_IN: INGRE$O$ RETORNO EFECTIVO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'INGRE$O$ VENTA OTROS',
            'descripcion' => 'FINANCIEROS_IN: INGRE$O$ VENTA OTROS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'INGRE$O$ INVERSION ',
            'descripcion' => 'FINANCIEROS_IN: INGRE$O$ INVERSION ',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'INGRE$O$ CREDITO',
            'descripcion' => 'FINANCIEROS_IN: INGRE$O$ CREDITO',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'PRESTAMOS',
            'descripcion' => 'FINANCIEROS_IN: PRESTAMOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 10,
            'nombre' => 'OTROS',
            'descripcion' => 'FINANCIEROS_IN: OTROS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //Familia: ADMIN
        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'CARTA NO ANTECEDENTES',
            'descripcion' => 'ADMIN: CARTA NO ANTECEDENTES',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'CUMPLEAÑOS',
            'descripcion' => 'ADMIN: CUMPLEAÑOS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'POSADAS',
            'descripcion' => 'ADMIN: POSADAS',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'GASTOS EN GENERAL',
            'descripcion' => 'ADMIN: GASTOS EN GENERAL',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'CAPACITACIÓN',
            'descripcion' => 'ADMIN: CAPACITACIÓN',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        CategoriasFamilia::create([
            'familia_id' => 11,
            'nombre' => 'INGRESOS DE PERSONAL',
            'descripcion' => 'ADMIN: INGRESOS DE PERSONAL',
            'usuario_edito' => 'Administrador',
            'es_activo' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
    }
}
