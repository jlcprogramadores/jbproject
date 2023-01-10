<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $fotografia
 * @property $proyecto_id
 * @property $puesto_id
 * @property $no_empleado
 * @property $nombre
 * @property $genero
 * @property $telefono_personal
 * @property $correo
 * @property $salario_imss
 * @property $salario_real
 * @property $tipo_de_empleado
 * @property $evaluaciones
 * @property $dc3
 * @property $clims
 * @property $fecha_ingreso
 * @property $fecha_baja
 * @property $nuevo_ingreso_reingreso
 * @property $campamento
 * @property $identificacion_oficial
 * @property $curp
 * @property $rfc
 * @property $domicilio
 * @property $nss
 * @property $fecha_nacimiento
 * @property $lugar_nacimiento
 * @property $residencia
 * @property $vacunas_covid
 * @property $licencia_conducir
 * @property $carta_antecedentes
 * @property $estado_civil
 * @property $nivel_estudios
 * @property $infonavit
 * @property $fonacot
 * @property $cuenta_bancaria
 * @property $contacto_emergencia
 * @property $nombre_esposa
 * @property $no_hijos
 * @property $persona_para_tramites
 * @property $beneficiarios
 * @property $porcentaje
 * @property $domicilio_real
 * @property $domicilio_alterno
 * @property $talla_camisa
 * @property $talla_pantalon
 * @property $talla_calzado
 * @property $enfermedades
 * @property $cirugias
 * @property $alergias
 * @property $lentes
 * @property $lesiones
 * @property $fumador
 * @property $practica_deporte
 * @property $pertenece_club_social
 * @property $pertenece_sindicato
 * @property $toma_medicamento
 * @property $tipo_sangre
 * @property $peso
 * @property $estatura
 * @property $imc
 * @property $esta_trabajando
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'no_empleado' => 'required',
		'nombre' => 'required',
		'genero' => 'required',
		'telefono_personal' => 'required',
		'correo' => 'required',
		'usuario_edito' => 'required',
    ];
    static $rulesfechalimite = [
		'fecha_limite_expediente' => 'required'
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fotografia',
        'proyecto_id',
        'puesto_id',
        'no_empleado',
        'nombre',
        'genero',
        'telefono_personal',
        'correo',
        'salario_imss',
        'salario_real',
        'tipo_de_empleado',
        'evaluaciones',
        'dc3',
        'clims',
        'fecha_ingreso',
        'fecha_baja',
        'nuevo_ingreso_reingreso',
        'campamento',
        'identificacion_oficial',
        'curp',
        'rfc',
        'domicilio',
        'nss',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'residencia',
        'vacunas_covid',
        'licencia_conducir',
        'carta_antecedentes',
        'estado_civil',
        'nivel_estudios',
        'infonavit',
        'fonacot',
        'cuenta_bancaria',
        'contacto_emergencia',
        'nombre_esposa',
        'no_hijos',
        'persona_para_tramites',
        'beneficiarios',
        'porcentaje',
        'domicilio_real',
        'domicilio_alterno',
        'talla_camisa',
        'talla_pantalon',
        'talla_calzado',
        'enfermedades',
        'cirugias',
        'alergias',
        'lentes',
        'lesiones',
        'fumador',
        'practica_deporte',
        'pertenece_club_social',
        'pertenece_sindicato',
        'toma_medicamento',
        'tipo_sangre',
        'peso',
        'estatura',
        'imc',
        'esta_trabajando',
        'usuario_edito',
        'fecha_limite_expediente'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'proyecto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puesto()
    {
        return $this->hasOne('App\Models\Puesto', 'id', 'puesto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleadoExpediente()
    {
        return $this->hasMany('App\Models\EmpleadoExpediente', 'expediente_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialalta()
    {
        return $this->hasMany('App\Models\HistorialAlta', 'empleado_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incidencia()
    {
        return $this->hasMany('App\Models\Incidencia', 'empleado_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupoEmpleado()
    {
        return $this->hasMany('App\Models\GruposEmpleado', 'empleado_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialParo()
    {
        return $this->hasMany('App\Models\HistorialParo', 'empleado_id', 'id');
    }
}
