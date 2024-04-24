<?php
namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\Rule;

class IsStudent implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $user = User::find($value);

        return $user && $user->hasRole('student');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'student_id must be student';
    }
}
