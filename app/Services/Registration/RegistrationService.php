<?php

namespace App\Services\Registration;
interface RegistrationService
{
    public function saveUserDetails(array $userData);

    public function userEmailExists(string $emailId): bool;

}
