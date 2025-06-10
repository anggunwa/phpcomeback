<?php

namespace App\Models;

class Contact
{
    public string $name;
    public string $email;

    public function __construct(string $name, string $email)
    {
        $this->name = trim($name);
        $this->email = trim($email);
    }

    public function isValid(): bool
    {
        return $this->name !== '' && filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}

?>