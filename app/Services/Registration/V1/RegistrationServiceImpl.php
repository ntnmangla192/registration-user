<?php

namespace App\Services\Registration\V1;

use App\Models\User;
use App\Services\Registration\RegistrationService;

/**
 *
 */
class RegistrationServiceImpl implements RegistrationService
{

    public function saveUserDetails(array $userData)
    {

        $user = User::updateOrCreate(['email' => $userData['email']], [
            'name' => $userData['name'],
            'password' => $userData['password'],
            'mobile' => $userData['mobile'],
        ]);

    }

    public function userEmailExists(string $emailId): bool
    {
        $result = User::where('email', $emailId)->first();
        if (empty($result)) {
            return false;
        }
        return true;
    }
}
