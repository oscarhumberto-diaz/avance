<h1>Dashboard</h1>

<p>Bienvenido, {{ auth()->user()->name }}.</p>
<p>Tu rol actual es: <strong>{{ auth()->user()->role }}</strong>.</p>

<ul>
    <li><a href="{{ route('admin.pages.index') }}">Gestionar páginas</a></li>
    <li><a href="{{ route('admin.principle-stages.index') }}">Gestionar principios</a></li>
</ul>
