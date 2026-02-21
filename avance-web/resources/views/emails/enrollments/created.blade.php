<h1>Nueva inscripción de {{ $typeLabel }}</h1>
<p><strong>Estado:</strong> {{ $enrollment->status }}</p>
<p><strong>Nombre:</strong> {{ $enrollment->full_name }}</p>
<p><strong>Correo:</strong> {{ $enrollment->email }}</p>
<p><strong>Teléfono:</strong> {{ $enrollment->phone }}</p>

@if($enrollment->type === 'student')
    <p><strong>Edad:</strong> {{ $enrollment->age }}</p>
    <p><strong>Centro educativo:</strong> {{ $enrollment->school_name }}</p>
    <p><strong>Grado:</strong> {{ $enrollment->grade_level }}</p>
@endif

@if($enrollment->type === 'leader')
    <p><strong>Iglesia:</strong> {{ $enrollment->church_name }}</p>
    <p><strong>Años de servicio:</strong> {{ $enrollment->years_serving }}</p>
    <p><strong>Área de ministerio:</strong> {{ $enrollment->ministry_area }}</p>
@endif

@if($enrollment->message)
    <p><strong>Comentario:</strong><br>{{ $enrollment->message }}</p>
@endif
