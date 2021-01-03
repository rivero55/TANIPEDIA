<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'role' => ['required', 'integer', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'nohp' => ['required', 'string', 'max:12',Rule::unique(User::class),],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'role' => 1,
            'name' => $input['name'],
            'tanggal_lahir' => $input['tanggal_lahir'],
            'nohp' => $input['nohp'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
