<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide valid email address';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Please provide a password at least 7 characters';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}