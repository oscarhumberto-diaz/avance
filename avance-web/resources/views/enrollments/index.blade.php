<x-layouts.public title="Inscripciones">
<article class="enrollments-page">
    <header>
        <h1>Inscripciones</h1>
        <p>Completa el formulario correspondiente para iniciar el proceso de inscripción.</p>
    </header>

    <section class="forms-grid">
        <div class="card">
            <h2>Estudiante</h2>

            @if (session('success_student'))
                <p class="success">{{ session('success_student') }}</p>
            @endif

            <form method="POST" action="{{ route('enrollments.student.store') }}" novalidate>
                @csrf
                <input type="hidden" name="form_type" value="student">
                <input type="text" name="website" tabindex="-1" autocomplete="off" class="honeypot" aria-hidden="true">

                <label>
                    Nombre completo
                    <input type="text" name="full_name" value="{{ old('full_name') }}" required>
                </label>
                @error('full_name') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Correo electrónico
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>
                @error('email') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Teléfono
                    <input type="text" name="phone" value="{{ old('phone') }}" required>
                </label>
                @error('phone') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Edad
                    <input type="number" name="age" min="10" max="99" value="{{ old('age') }}" required>
                </label>
                @error('age') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Centro educativo
                    <input type="text" name="school_name" value="{{ old('school_name') }}" required>
                </label>
                @error('school_name') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Grado
                    <input type="text" name="grade_level" value="{{ old('grade_level') }}" required>
                </label>
                @error('grade_level') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Comentarios (opcional)
                    <textarea name="message" rows="3">{{ old('message') }}</textarea>
                </label>
                @error('message') <small class="error">{{ $message }}</small> @enderror

                <button type="submit">Enviar inscripción de estudiante</button>
            </form>
        </div>

        <div class="card">
            <h2>Líder</h2>

            @if (session('success_leader'))
                <p class="success">{{ session('success_leader') }}</p>
            @endif

            <form method="POST" action="{{ route('enrollments.leader.store') }}" novalidate>
                @csrf
                <input type="hidden" name="form_type" value="leader">
                <input type="text" name="website" tabindex="-1" autocomplete="off" class="honeypot" aria-hidden="true">

                <label>
                    Nombre completo
                    <input type="text" name="full_name" value="{{ old('full_name') }}" required>
                </label>
                @error('full_name') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Correo electrónico
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>
                @error('email') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Teléfono
                    <input type="text" name="phone" value="{{ old('phone') }}" required>
                </label>
                @error('phone') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Iglesia
                    <input type="text" name="church_name" value="{{ old('church_name') }}" required>
                </label>
                @error('church_name') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Años de servicio
                    <input type="number" name="years_serving" min="0" max="99" value="{{ old('years_serving') }}" required>
                </label>
                @error('years_serving') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Área de ministerio
                    <input type="text" name="ministry_area" value="{{ old('ministry_area') }}" required>
                </label>
                @error('ministry_area') <small class="error">{{ $message }}</small> @enderror

                <label>
                    Comentarios (opcional)
                    <textarea name="message" rows="3">{{ old('message') }}</textarea>
                </label>
                @error('message') <small class="error">{{ $message }}</small> @enderror

                <button type="submit">Enviar inscripción de líder</button>
            </form>
        </div>
    </section>
</article>

<style>
    .enrollments-page { max-width: 1100px; margin: 0 auto; padding: 1rem; }
    .forms-grid { display: grid; gap: 1rem; grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .card { border: 1px solid #e5e7eb; border-radius: .75rem; padding: 1rem; background: #fff; }
    form { display: grid; gap: .5rem; }
    label { display: grid; gap: .25rem; font-weight: 600; }
    input, textarea, button { font: inherit; padding: .6rem; }
    button { background: #111827; color: #fff; border: none; border-radius: .5rem; cursor: pointer; }
    .error { color: #b91c1c; }
    .success { color: #166534; font-weight: 600; }
    .honeypot { position: absolute; left: -9999px; opacity: 0; pointer-events: none; }
    @media (max-width: 900px) { .forms-grid { grid-template-columns: 1fr; } }
</style>

</x-layouts.public>
