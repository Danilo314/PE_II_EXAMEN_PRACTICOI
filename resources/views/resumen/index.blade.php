@extends('layouts.app')
@section('content')
<div class="container py-5">
    <style>
        .strategic-plan {
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .plan-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            overflow: hidden;
            border: 1px solid #e0e6ed;
        }
        .section-header {
            background: linear-gradient(135deg, #434190, #4a56e6);
            color: white;
            padding: 18px 25px;
            border-bottom: 1px solid #e0e6ed;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .section-title i {
            margin-right: 12px;
            font-size: 1.3rem;
        }
        .section-body {
            padding: 25px;
        }
        .logo-upload {
            border: 2px dashed #a0aec0;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            margin-bottom: 25px;
            cursor: pointer;
            transition: all 0.3s;
            background: #f8fafc;
        }
        .logo-upload:hover {
            border-color: #4a56e6;
            background: #f0f5ff;
        }
        .logo-upload i {
            font-size: 2.5rem;
            color: #4a56e6;
            margin-bottom: 10px;
        }
        .form-label {
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 8px;
            display: block;
        }
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            transition: all 0.3s;
            background: #fff;
            margin-bottom: 20px;
        }
        .form-input:focus {
            border-color: #4a56e6;
            box-shadow: 0 0 0 3px rgba(74, 86, 230, 0.1);
            outline: none;
        }
        .form-textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            min-height: 100px;
            transition: all 0.3s;
            margin-bottom: 20px;
        }
        .form-textarea:focus {
            border-color: #4a56e6;
            box-shadow: 0 0 0 3px rgba(74, 86, 230, 0.1);
            outline: none;
        }
        .swot-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        .swot-box {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .swot-header {
            padding: 12px 15px;
            font-weight: 600;
            color: white;
        }
        .weaknesses {
            background: #e53e3e;
        }
        .threats {
            background: #ed8936;
        }
        .strengths {
            background: #38a169;
        }
        .opportunities {
            background: #4299e1;
        }
        .action-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #edf2f7;
        }
        .action-number {
            width: 30px;
            height: 30px;
            background: #4a56e6;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-weight: 600;
            flex-shrink: 0;
        }
        .action-input {
            flex-grow: 1;
            border: none;
            padding: 8px 0;
            background: transparent;
        }
        .action-input:focus {
            outline: none;
        }
        .objectives-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 30px;
        }
        .objectives-table th {
            background: #f7fafc;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #4a5568;
            border-bottom: 2px solid #e2e8f0;
        }
        .objectives-table td {
            padding: 15px;
            border-bottom: 1px solid #edf2f7;
            vertical-align: top;
        }
        .objectives-table tr:last-child td {
            border-bottom: none;
        }
        .mission-vision-values {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        .mv-box {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .mv-title {
            font-weight: 600;
            color: #4a56e6;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .mv-title i {
            margin-right: 8px;
        }
    </style>

    <div class="strategic-plan">
        <!-- Resumen Ejecutivo -->
        <div class="plan-section">
            <div class="section-header">
                <h2 class="section-title"><i class="fas fa-file-alt"></i> RESUMEN EJECUTIVO PLAN ESTRATÉGICO</h2>
            </div>
            <div class="section-body">
                <!-- Logo Upload -->
                <div class="logo-upload">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="mb-2">Haga clic para subir el logo de su empresa</p>
                    <small class="text-muted">Formatos aceptados: JPG, PNG (Máx. 2MB)</small>
                    <input type="file" id="logo-upload" style="display: none;">
                </div>

                <!-- Información Básica -->
                <div>
                    <label class="form-label">Nombre de la empresa/proyecto</label>
                    <input type="text" class="form-input" placeholder="Ingrese el nombre completo">
                    
                    <label class="form-label">Fecha de elaboración</label>
                    <input type="date" class="form-input">
                    
                    <label class="form-label">Emprendedores/Promotores</label>
                    <textarea class="form-textarea" placeholder="Lista de nombres de los emprendedores o promotores del proyecto"></textarea>
                </div>

                <!-- Misión, Visión, Valores -->
                <div class="mission-vision-values">
                    <div class="mv-box">
                        <div class="mv-title"><i class="fas fa-bullseye"></i> MISIÓN</div>
                        <textarea class="form-textarea" placeholder="Describa la razón de ser de su organización"></textarea>
                    </div>
                    <div class="mv-box">
                        <div class="mv-title"><i class="fas fa-eye"></i> VISIÓN</div>
                        <textarea class="form-textarea" placeholder="Describa el futuro deseado para su organización"></textarea>
                    </div>
                    <div class="mv-box">
                        <div class="mv-title"><i class="fas fa-heart"></i> VALORES</div>
                        <textarea class="form-textarea" placeholder="Enumere los valores fundamentales de su organización"></textarea>
                    </div>
                </div>

                <!-- Unidades Estratégicas y Objetivos -->
                <h3 class="mb-3" style="color: #4a5568; font-weight: 600;"><i class="fas fa-bullseye me-2"></i> UNIDADES ESTRATÉGICAS</h3>
                <table class="objectives-table">
                    <thead>
                        <tr>
                            <th style="width: 25%;">MISIÓN</th>
                            <th style="width: 35%;">OBJETIVOS GENERALES/ESTRATÉGICOS</th>
                            <th style="width: 40%;">OBJETIVOS ESPECÍFICOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><textarea class="form-textarea" style="min-height: 120px;"></textarea></td>
                            <td><textarea class="form-textarea" style="min-height: 120px;"></textarea></td>
                            <td><textarea class="form-textarea" style="min-height: 120px;"></textarea></td>
                        </tr>
                        <tr>
                            <td><textarea class="form-textarea" style="min-height: 120px;"></textarea></td>
                            <td><textarea class="form-textarea" style="min-height: 120px;"></textarea></td>
                            <td><textarea class="form-textarea" style="min-height: 120px;"></textarea></td>
                        </tr>
                        <tr>
                            <td><textarea class="form-textarea" style="min-height: 120px;"></textarea></td>
                            <td><textarea class="form-textarea" style="min-height: 120px;"></textarea></td>
                            <td><textarea class="form-textarea" style="min-height: 120px;"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Análisis FODA -->
        <div class="plan-section">
            <div class="section-header">
                <h2 class="section-title"><i class="fas fa-chart-bar"></i> ANÁLISIS FODA</h2>
            </div>
            <div class="section-body">
                <div class="swot-grid">
                    <div class="swot-box">
                        <div class="swot-header weaknesses">DEBILIDADES</div>
                        <textarea class="form-textarea" placeholder="Factores internos negativos de la organización"></textarea>
                    </div>
                    <div class="swot-box">
                        <div class="swot-header threats">AMENAZAS</div>
                        <textarea class="form-textarea" placeholder="Factores externos negativos que afectan a la organización"></textarea>
                    </div>
                    <div class="swot-box">
                        <div class="swot-header strengths">FORTALEZAS</div>
                        <textarea class="form-textarea" placeholder="Factores internos positivos de la organización"></textarea>
                    </div>
                    <div class="swot-box">
                        <div class="swot-header opportunities">OPORTUNIDADES</div>
                        <textarea class="form-textarea" placeholder="Factores externos positivos que puede aprovechar la organización"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Identificación de Estrategia -->
        <div class="plan-section">
            <div class="section-header">
                <h2 class="section-title"><i class="fas fa-chess"></i> IDENTIFICACIÓN DE ESTRATEGIA</h2>
            </div>
            <div class="section-body">
                <label class="form-label">Estrategia identificada en la Matriz FODA</label>
                <textarea class="form-textarea" placeholder="Describa la estrategia principal derivada del análisis FODA"></textarea>
            </div>
        </div>

        <!-- Acciones Competitivas -->
        <div class="plan-section">
            <div class="section-header">
                <h2 class="section-title"><i class="fas fa-tasks"></i> ACCIONES COMPETITIVAS</h2>
            </div>
            <div class="section-body">
                @for ($i = 1; $i <= 16; $i++)
                <div class="action-item">
                    <div class="action-number">{{ $i }}</div>
                    <input type="text" class="action-input" placeholder="Describa la acción competitiva #{{ $i }}">
                </div>
                @endfor
            </div>
        </div>

        <!-- Conclusiones -->
        <div class="plan-section">
            <div class="section-header">
                <h2 class="section-title"><i class="fas fa-check-circle"></i> CONCLUSIONES</h2>
            </div>
            <div class="section-body">
                <textarea class="form-textarea" style="min-height: 150px;" placeholder="Anote las conclusiones más relevantes de su Plan Estratégico"></textarea>
            </div>
        </div>
    </div>
</div>
   
<script>
    // Script para manejar la subida del logo
    document.querySelector('.logo-upload').addEventListener('click', function() {
        document.getElementById('logo-upload').click();
    });
    
    document.getElementById('logo-upload').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const fileName = e.target.files[0].name;
            document.querySelector('.logo-upload p').textContent = fileName;
            document.querySelector('.logo-upload i').className = 'fas fa-check-circle';
            document.querySelector('.logo-upload i').style.color = '#38a169';
        }
    });
</script>
@endsection