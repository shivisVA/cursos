<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id'=>'required|exists:students,id',
            'course_id'=>'required|exists:courses,id',
            'enrrollment_date'=>'required|date|before_or_equal:today'
        ];
    }

    protected function prepareForValidation(): void
{
    $this->merge([
        'student_id' => $this->route('student')->id,
    ]);
}
}
