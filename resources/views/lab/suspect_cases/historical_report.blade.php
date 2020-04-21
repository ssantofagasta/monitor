@extends('layouts.app')

@section('title', 'Reporte COVID-19')

@section('content')
<h3 class="mb-3">Reporte histórico COVID-19</h3>

<form class="form-inline" method="get" action="{{ route('lab.suspect_cases.report.historical_report') }}">
	@csrf
	<div class="form-group ml-3">
		<label for="for_from">Fecha</label>
		<input type="date" class="form-control mx-sm-3" id="for_date" name="date"
			value="{{ Carbon\Carbon::parse($date)->format('Y-m-d') }}">
	</div>

	<div class="form-group">
		<button type="submit" name="btn_buscar" class="btn btn-primary">Buscar</button>
	</div>
</form>

<br /><hr />

<div class="row">
    <div class="col-12 col-sm-4">

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Enviados a análisis</th>
                    <th>Total</th>
                    <th>Hom</th>
                    <th>Muj</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tarapacá</td>
                    <td class="text-center">
                        {{ $cases->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->count() }}
                    </td>
                </tr>

                <tr>
                    <td class="">Otras Regiones</td>
                    <td class="text-center">
                        {{ $cases_other_region->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases_other_region->where('patient.gender','male')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases_other_region->where('patient.gender','female')->count() }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Tarapacá</th>
                    <th>Total</th>
                    <th>Hom</th>
                    <th>Muj</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Positivos</td>
                    <th class="text-danger text-center">
                        {{ $cases->where('pscr_sars_cov_2','positive')->count() }}
                    </th>
                    <th class="text-danger text-center">
                        {{ $cases->where('patient.gender','male')->where('pscr_sars_cov_2','positive')->count() }}
                    </th>
                    <th class="text-danger text-center">
                        {{ $cases->where('patient.gender','female')->where('pscr_sars_cov_2','positive')->count() }}
                    </th>
                </tr>

                <tr>
                    <td>Negativos</td>
                    <td class="text-center">
                        {{ $cases->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Pendiente resultado</td>
                    <td class="text-center">
                        {{ $cases->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Muestra rechazada</td>
                    <td class="text-center">
                        {{ $cases->where('pscr_sars_cov_2','rejected')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('pscr_sars_cov_2','rejected')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('pscr_sars_cov_2','rejected')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Resultado indeterminado</td>
                    <td class="text-center">
                        {{ $cases->where('pscr_sars_cov_2','undetermined')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('pscr_sars_cov_2','undetermined')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('pscr_sars_cov_2','undetermined')->count() }}
                    </td>
                </tr>


                <tr>
                    <th class="table-active">Hospitalizados Básicos</th>
                    <th class="table-active text-center">
                        {{ $cases->where('status','Hospitalizado Básico')->count() }}
                    </th>
                    <th class="table-active text-center">
                        {{ $cases->where('patient.gender','male')->where('status','Hospitalizado Básico')->count() }}
                    </th>
                    <th class="table-active text-center">
                        {{ $cases->where('patient.gender','female')->where('status','Hospitalizado Básico')->count() }}
                    </th>
                </tr>

                <tr>
                    <td>Negativos</td>
                    <td class="text-center">
                        {{ $cases->where('status','Hospitalizado Básico')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('status','Hospitalizado Básico')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('status','Hospitalizado Básico')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Positivos</td>
                    <td class="text-danger text-center">
                        {{ $cases->where('status','Hospitalizado Básico')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-danger text-center">
                        {{ $cases->where('patient.gender','male')->where('status','Hospitalizado Básico')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-danger text-center">
                        {{ $cases->where('patient.gender','female')->where('status','Hospitalizado Básico')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Resultado pendiente</td>
                    <td class="text-center">
                        {{ $cases->where('status','Hospitalizado Básico')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('status','Hospitalizado Básico')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('status','Hospitalizado Básico')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                </tr>

                <tr>
                    <th class="table-active">Hospitalizados (UCI)</th>
                    <th class="table-active text-center">
                        {{ $cases->where('status','Hospitalizado Crítico')->count() }}
                    </th>
                    <th class="table-active text-center">
                        {{ $cases->where('patient.gender','male')->where('status','Hospitalizado Crítico')->count() }}
                    </th>
                    <th class="table-active text-center">
                        {{ $cases->where('patient.gender','female')->where('status','Hospitalizado Crítico')->count() }}
                    </th>
                </tr>

                <tr>
                    <td>Negativos</td>
                    <td class="text-center">
                        {{ $cases->where('status','Hospitalizado Crítico')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('status','Hospitalizado Crítico')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('status','Hospitalizado Crítico')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Positivos</td>
                    <td class="text-danger text-center">
                        {{ $cases->where('status','Hospitalizado Crítico')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-danger text-center">
                        {{ $cases->where('patient.gender','male')->where('status','Hospitalizado Crítico')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-danger text-center">
                        {{ $cases->where('patient.gender','female')->where('status','Hospitalizado Crítico')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>Resultado pendiente</td>
                    <td class="text-center">
                        {{ $cases->where('status','Hospitalizado Crítico')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','male')->where('status','Hospitalizado Crítico')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.gender','female')->where('status','Hospitalizado Crítico')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                </tr>

            </tbody>
        </table>


        <div id="evolution" style="width: 480px; height: 400"></div>


    </div>

    <div class="col-12 col-sm-4">

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Casos por comuna</th>
                    <th>Positivos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alto Hospicio</td>
                    <td class="text-danger text-center">
                        {{
                            $cases->where('patient.demographic.commune','Alto Hospicio')
                                ->where('pscr_sars_cov_2','positive')
                                ->count()
                        }}
                    </td>
                </tr>

                <tr>
                    <td>Camiña</td>
                    <td class="text-danger text-center">
                        {{
                            $cases->where('patient.demographic.commune','Camiña')
                                ->where('pscr_sars_cov_2','positive')
                                ->count()
                        }}
                    </td>

                </tr>

                <tr>
                    <td>Colchane</td>
                    <td class="text-danger text-center">
                        {{
                            $cases->where('patient.demographic.commune','Colchane')
                                ->where('pscr_sars_cov_2','positive')
                                ->count()
                        }}
                    </td>
                </tr>

                <tr>
                    <td>Huara</td>
                    <td class="text-danger text-center">
                        {{
                            $cases->where('patient.demographic.commune','Huara')
                                ->where('pscr_sars_cov_2','positive')
                                ->count()
                        }}
                    </td>

                </tr>

                <tr>
                    <td>Iquique</td>
                    <td class="text-danger text-center">
                        {{
                            $cases->where('patient.demographic.commune','Iquique')
                                ->where('pscr_sars_cov_2','positive')
                                ->count()
                        }}
                    </td>
                </tr>

                <tr>
                    <td>Pica</td>
                    <td class="text-danger text-center">
                        {{
                            $cases->where('patient.demographic.commune','Pica')
                                ->where('pscr_sars_cov_2','positive')
                                ->count()
                        }}
                    </td>
                </tr>

                <tr>
                    <td>Pozo Almonte</td>
                    <td class="text-danger text-center">
                        {{
                            $cases->where('patient.demographic.commune','Pozo Almonte')
                                ->where('pscr_sars_cov_2','positive')
                                ->count()
                        }}
                    </td>
                </tr>

                <tr>
                    <td>Sin registro</td>
                    <td class="text-danger text-center">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereIn('patient.demographic.commune',['sin-comuna',null])
                                ->count()
                        }}
                    </td>
                </tr>

                <tr>
                    <td>Otras Regiones</td>
                    <td class="text-danger text-center">
                        {{
                            $cases_other_region->where('pscr_sars_cov_2','positive')
                                ->count()
                        }}
                    </td>

                </tr>

            </tbody>
        </table>

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th colspan="2">
                        Tasa de incidencia<br>(Casos positivos / población*) x 100.000
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alto Hospicio (129.999*)</td>
                    <td class="text-right">
                        {{ number_format($cases->where('patient.demographic.commune','Alto Hospicio')
                            ->where('pscr_sars_cov_2','positive')->count() / 129999 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Camiña (1.375*)</td>
                    <td class="text-right">
                        {{ number_format($cases->where('patient.demographic.commune','Camiña')
                            ->where('pscr_sars_cov_2','positive')->count() / 1375 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Colchane (1.583*)</td>
                    <td class="text-right">
                        {{ number_format($cases->where('patient.demographic.commune','Colchane')
                            ->where('pscr_sars_cov_2','positive')->count() / 1583 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Huara (3.000*)</td>
                    <td class="text-right">
                        {{ number_format($cases->where('patient.demographic.commune','Huara')
                            ->where('pscr_sars_cov_2','positive')->count() / 3000 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Iquique (223.463*)</td>
                    <td class="text-right">
                        {{ number_format($cases->where('patient.demographic.commune','Iquique')
                            ->where('pscr_sars_cov_2','positive')->count() / 223463 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Pica (5.958*)</td>
                    <td class="text-right">
                        {{ number_format($cases->where('patient.demographic.commune','Pica')
                            ->where('pscr_sars_cov_2','positive')->count() / 5958 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <td>Pozo Almonte (17.395*)</td>
                    <td class="text-right">
                        {{ number_format($cases->where('patient.demographic.commune','Pozo Almonte')
                            ->where('pscr_sars_cov_2','positive')->count() / 17395 * 100000 ,2) }}
                    </td>
                </tr>
                <tr>
                    <th>Región Tarapacá (382.773*)</th>
                    <th class="text-right">
                        {{ number_format($cases->where('pscr_sars_cov_2','positive')
                            ->count() / 382773 * 100000 ,2) }}
                    </th>
                </tr>
            </tbody>
        </table>


        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Sospechas por Origen</th>
                    <th>Total de casos</th>
                    <th>Total posivos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Hospital ETG</td>
                    <td class="text-center">
                        {{ $cases->where('origin','HOSPITAL Ernesto Torres Galdames')->count() }}
                    </td>
                    <td class="text-center">
                        <span class="text-danger">
                            {{ $cases->where('origin','HOSPITAL Ernesto Torres Galdames')->where('pscr_sars_cov_2','positive')->count() }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>APS</td>
                    <td class="text-center">
                        {{ $cases->whereNotIn('origin',['HOSPITAL Ernesto Torres Galdames','Clínica Tarapacá','Clínica Iquique'])->count() }}
                    </td>
                    <td class="text-center">
                        <span class="text-danger">
                            {{ $cases->whereNotIn('origin',['HOSPITAL Ernesto Torres Galdames','Clínica Tarapacá','Clínica Iquique'])->where('pscr_sars_cov_2','positive')->count() }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Privados</td>
                    <td class="text-center">
                        {{ $cases->whereIn('origin',['Clínica Tarapacá','Clínica Iquique'])->count() }}
                    </td>
                    <td class="text-center">
                        <span class="text-danger">
                            {{ $cases->whereIn('origin',['Clínica Tarapacá','Clínica Iquique','Particular (SEREMI)'])->where('pscr_sars_cov_2','positive')->count() }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="col-12 col-sm-4">

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Rango Edad</th>
                    <th>Positivo</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>0-9</td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereBetween('age',[0,9])
                                ->whereNotNull('age')
                                ->count()
                        }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>10-19</td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereBetween('age',[10,19])
                                ->whereNotNull('age')
                                ->count()
                        }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>20-29</td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereBetween('age',[20,29])
                                ->whereNotNull('age')
                                ->count()
                        }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>30-39</td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereBetween('age',[30,39])
                                ->whereNotNull('age')
                                ->count()
                        }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>40-49</td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereBetween('age',[40,49])
                                ->whereNotNull('age')
                                ->count()
                        }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>50-59</td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereBetween('age',[50,59])
                                ->whereNotNull('age')
                                ->count()
                        }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>60-69</td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereBetween('age',[60,69])
                                ->whereNotNull('age')
                                ->count()
                        }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>70-79</td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereBetween('age',[70,79])
                                ->whereNotNull('age')
                                ->count()
                        }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>80-></td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereBetween('age',[80,900])
                                ->whereNotNull('age')
                                ->count()
                        }}
                    </td>
                </tr>
                <tr class="text-center">
                    <td>Sin Registro</td>
                    <td class="text-danger">
                        {{
                            $cases->where('pscr_sars_cov_2','positive')
                                ->whereNull('age')
                                ->count()
                        }}
                    </td>

                </tr>
            </tbody>
        </table>

        <div id="chart_ages" style="width: 400px; height: 400px"></div>

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th>Gestantes</th>
                    <th>Positivo</th>
                    <th>Pendiente</th>
                    <th>Negativo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                        {{ $cases->where('gestation','on')->count() }}
                    </td>
                    <td class="text-center text-danger">
                        {{ $cases->where('gestation','on')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('gestation','on')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('gestation','on')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-active">
                    <th colspan="5">Residencia Sanitaria</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Total</th>
                    <th>Posit.</th>
                    <th>Pendi.</th>
                    <th>Negat.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Región
                    </td>
                    <td class="text-center">
                        {{ $cases->where('status','Residencia Sanitaria')->count() }}
                    </td>
                    <td class="text-center text-danger">
                        {{ $cases->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Alto Hospicio
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Alto Hospicio')->where('status','Residencia Sanitaria')->count() }}
                    </td>
                    <td class="text-center text-danger">
                        {{ $cases->where('patient.demographic.commune','Alto Hospicio')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Alto Hospicio')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Alto Hospicio')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Iquique
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Iquique')->where('status','Residencia Sanitaria')->count() }}
                    </td>
                    <td class="text-center text-danger">
                        {{ $cases->where('patient.demographic.commune','Iquique')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Iquique')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Iquique')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Pica
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Pica')->where('status','Residencia Sanitaria')->count() }}
                    </td>
                    <td class="text-center text-danger">
                        {{ $cases->where('patient.demographic.commune','Pica')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Pica')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Pica')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Pozo Almonte
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Pozo Almonte')->where('status','Residencia Sanitaria')->count() }}
                    </td>
                    <td class="text-center text-danger">
                        {{ $cases->where('patient.demographic.commune','Pozo Almonte')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','positive')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Pozo Almonte')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','pending')->count() }}
                    </td>
                    <td class="text-center">
                        {{ $cases->where('patient.demographic.commune','Pozo Almonte')->where('status','Residencia Sanitaria')->where('pscr_sars_cov_2','negative')->count() }}
                    </td>
                </tr>

            </tbody>
        </table>

    </div>
</div>

@endsection

@section('custom_js_head')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart','line']});

    google.charts.setOnLoadCallback(drawChartAges);
    //google.charts.setOnLoadCallback(drawChartEvolution);

    function drawChartAges() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Edad');
        data.addColumn('number', 'Hombres');
        data.addColumn('number', 'Mujeres');
        data.addRows([
            ['0', {{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','male')->whereBetween('age',[0,9])->whereNotNull('age')->count()}}  ,{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','female')->whereBetween('age',[0,9])->whereNotNull('age')->count()}}],
            ['10',{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','male')->whereBetween('age',[10,19])->whereNotNull('age')->count()}},{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','female')->whereBetween('age',[10,19])->whereNotNull('age')->count()}}],
            ['20',{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','male')->whereBetween('age',[20,29])->whereNotNull('age')->count()}},{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','female')->whereBetween('age',[20,29])->whereNotNull('age')->count()}}],
            ['30',{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','male')->whereBetween('age',[30,39])->whereNotNull('age')->count()}},{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','female')->whereBetween('age',[30,39])->whereNotNull('age')->count()}}],
            ['40',{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','male')->whereBetween('age',[40,49])->whereNotNull('age')->count()}},{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','female')->whereBetween('age',[40,49])->whereNotNull('age')->count()}}],
            ['50',{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','male')->whereBetween('age',[50,59])->whereNotNull('age')->count()}},{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','female')->whereBetween('age',[50,59])->whereNotNull('age')->count()}}],
            ['60',{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','male')->whereBetween('age',[60,69])->whereNotNull('age')->count()}},{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','female')->whereBetween('age',[60,69])->whereNotNull('age')->count()}}],
            ['70',{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','male')->whereBetween('age',[70,79])->whereNotNull('age')->count()}},{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','female')->whereBetween('age',[70,79])->whereNotNull('age')->count()}}],
            ['80->',{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','male')->whereBetween('age',[80,120])->whereNotNull('age')->count()}},{{$cases->where('pscr_sars_cov_2','positive')->where('patient.gender','female')->whereBetween('age',[80,120])->whereNotNull('age')->count()}}],
        ]);

        var options = {
            title: 'Cantidad de casos positivos por edad',
            curveType: 'log',
            width: 380,
            height: 400,
            colors: ['#3366CC', '#CC338C'],
            legend: { position: 'bottom' },
            backgroundColor: '#f8fafc',
            chartArea: {'width': '90%', 'height': '80%'},
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_ages'));

        chart.draw(data, options);
    }



    // function drawChartEvolution() {

    // }
</script>
@endsection