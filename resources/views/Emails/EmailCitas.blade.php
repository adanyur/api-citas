@component('mail::message')
# Usted a Reservado una Cita
@foreach ($data as $cita)
@foreach ($cita->pacientedato as $paciente)
PACIENTE: <h3>{{ $paciente->hc_apepat}} {{ $paciente->hc_apemat}} {{ $paciente->hc_nombre}}</h3><p>
@endforeach
    FECHA DE LA CITA: <h3>{{ $cita->ci_fechacita}}<P>
    HORA DE LA CITA: <h3>{{ $cita->ci_horatencion}}</h3><p>
@foreach ($cita->especialidad as $especialidad)
        ESPECIALIDAD: <h3>{{ $especialidad->es_descripcion}}</h3><p>
@endforeach
@foreach ($cita->medico as $medico)
        MEDICO: <h3>{{ $medico->me_nombres}}</h3>
@endforeach
@endforeach
@endcomponent
