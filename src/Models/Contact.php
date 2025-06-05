<?php

namespace App\Models;

class Contact{
    protected string $name;
    protected string $email;
    protected int $phone;

    public function __construct(string $name, string $email, int $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;        
    }

    public function isValid(): bool {
        return !empty($this->name) &&
            filter_var($this->email, FILTER_VALIDATE_EMAIL) &&
            preg_match('/^\d{10,15}$/', $this->phone);
    }

    public function display():string {
        return "Name: " . $this->name . ", Email: " . $this->email . ", Phone: " . $this->phone;
    }
}

?>