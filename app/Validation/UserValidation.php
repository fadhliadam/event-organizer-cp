<?php

namespace App\Validation;

use App\Models\UserModel;

class UserValidation
{
    public function user_valid_email($value, ?string &$error = "Email is not contain in database"): bool
    {
        $userModel = new UserModel();
        $user = $userModel->where('email', $value)->first();
        if(!$user) {
            // $error = lang('myerrors.user_valid_email');
            return false;
        }
        return true;
    }
}
