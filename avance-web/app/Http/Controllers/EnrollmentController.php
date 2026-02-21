<?php

namespace App\Http\Controllers;

use App\Mail\EnrollmentCreatedMail;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    public function index(): View
    {
        return view('enrollments.index');
    }

    public function storeStudent(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'form_type' => ['required', 'in:student'],
                'full_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email:rfc,dns', 'max:255'],
                'phone' => ['required', 'string', 'max:30'],
                'age' => ['required', 'integer', 'between:10,99'],
                'school_name' => ['required', 'string', 'max:255'],
                'grade_level' => ['required', 'string', 'max:100'],
                'message' => ['nullable', 'string', 'max:2000'],
                'website' => ['nullable', 'max:0'],
            ],
            $this->messages(),
            $this->attributes()
        );

        unset($validated['form_type'], $validated['website']);

        $enrollment = Enrollment::create([
            ...$validated,
            'type' => Enrollment::TYPE_STUDENT,
            'status' => Enrollment::STATUS_NEW,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $this->notifyAdmin($enrollment);

        return back()->with('success_student', 'Tu inscripción de estudiante fue enviada. Te contactaremos pronto.');
    }

    public function storeLeader(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'form_type' => ['required', 'in:leader'],
                'full_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email:rfc,dns', 'max:255'],
                'phone' => ['required', 'string', 'max:30'],
                'church_name' => ['required', 'string', 'max:255'],
                'years_serving' => ['required', 'integer', 'between:0,99'],
                'ministry_area' => ['required', 'string', 'max:255'],
                'message' => ['nullable', 'string', 'max:2000'],
                'website' => ['nullable', 'max:0'],
            ],
            $this->messages(),
            $this->attributes()
        );

        unset($validated['form_type'], $validated['website']);

        $enrollment = Enrollment::create([
            ...$validated,
            'type' => Enrollment::TYPE_LEADER,
            'status' => Enrollment::STATUS_NEW,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $this->notifyAdmin($enrollment);

        return back()->with('success_leader', 'Tu inscripción de líder fue enviada. Te contactaremos pronto.');
    }

    private function notifyAdmin(Enrollment $enrollment): void
    {
        $adminEmail = config('enrollment.admin_email');

        if (!$adminEmail) {
            return;
        }

        Mail::to($adminEmail)->send(new EnrollmentCreatedMail($enrollment));
    }

    private function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute debe ser un correo válido.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'between' => 'El campo :attribute debe estar entre :min y :max.',
            'max' => 'El campo :attribute excede el tamaño permitido.',
            'in' => 'El valor del campo :attribute no es válido.',
        ];
    }

    private function attributes(): array
    {
        return [
            'full_name' => 'nombre completo',
            'email' => 'correo electrónico',
            'phone' => 'teléfono',
            'age' => 'edad',
            'school_name' => 'centro educativo',
            'grade_level' => 'grado',
            'church_name' => 'iglesia',
            'years_serving' => 'años de servicio',
            'ministry_area' => 'área de ministerio',
            'website' => 'sitio web',
            'form_type' => 'tipo de formulario',
        ];
    }
}
