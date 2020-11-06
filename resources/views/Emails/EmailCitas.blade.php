@component('mail::message')
@foreach ($data as $cita)
@foreach ($cita->pacientedato as $paciente)
**{{ $paciente->hc_apepat}} {{ $paciente->hc_apemat}} {{ $paciente->hc_nombre}}**, usted reservo una cita para el dia
@switch(date("l", strtotime($cita->ci_fechacita)))
@case('Monday')
**Lunes**
@break
@case('Tuesday')
**Martes**
@break
@case('Wednesday')
**Miercoles**
@break
@case('Thursday')
**Jueves**
@break
@case('Friday')
**Viernes**
@break
@case('Saturday')
**Sabado**
@break
@case('Sunday')
**Domingo**
@break
@endswitch
**{{date("d", strtotime($cita->ci_fechacita))}}**
@switch(date("F", strtotime($cita->ci_fechacita)))
@case('January')
**Enero**
@break
@case('February')
**Febrero**
@break
@case('March')
**Marzo**
@break
@case('April')
**Abril**
@break
@case('May')
**Mayo**
@break
@case('June')
**Junio**
@break
@case('July')
**Julio**
@break
@case('August')
**Agosto**
@break
@case('September')
**Septiembre**
@break
@case('October')
**Octubre**
@break
@case('November')
**Noviembre**
@break
@case('December')
**Diciembre**
@break
@endswitch **del {{ date("Y", strtotime($cita->ci_fechacita)) }}**
a las **{{ $cita->ci_horatencion}}** con el
@foreach ($cita->medico as $medico)
@if ($medico->me_sexo ==='M')
**Dr.**
@else
**Dra.**
@endif
**{{ $medico->me_nombres}}**
@endforeach
de la especialidad @foreach ($cita->especialidad as $especialidad)
{{ $especialidad->es_descripcion}}
@endforeach
@endforeach
@endforeach
@endcomponent