<?php

namespace App\Interface;

interface ProfileInterface
{
    public function getProfile();
    public function updateProfile(array $data, $user);
    public function updatePassword($user, string $password);
}
