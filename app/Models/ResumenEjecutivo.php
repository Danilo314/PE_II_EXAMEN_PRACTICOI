<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumenEjecutivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'nombre_proyecto',
        'fecha_elaboracion',
        'promotores',
        'mision',
        'vision',
        'valores',
        'debilidades',
        'fortalezas',
        'oportunidades',
        'amenazas',
        'estrategia_identificada',
        'acciones_competitivas',
        'objetivos_estrategicos',
        'conclusiones'
    ];

    protected $casts = [
        'acciones_competitivas' => 'array',
        'objetivos_estrategicos' => 'array',
    ];

    public function plan()
    {
        return $this->belongsTo(PlanEstrategico::class);
    }
}