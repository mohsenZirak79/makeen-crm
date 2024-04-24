<?php
namespace App\Rules;

use App\Models\User;

use Illuminate\Contracts\Validation\Rule;

class IsMentor implements Rule
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

        return $user && $user->hasRole('mentor');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'mentor_id must be mentor';
    }
}
