<?php

namespace App\Models;

class contactBook {
    protected string $file;

    public function __construct(string $fileName) {
        $this->file = $fileName;
    }

    public function load(): array {
        if (!file_exists($this->file)) {
            return [];
        }

        $json = file_get_contents($this->file);
        $data = json_decode($json, true);
    
        $contacts = [];

        foreach ($data as $item) {
            $contacts[] = new Contact($item["name"] ?? "", $item["email"] ?? "");
        }

        return $contacts;
    }

    public function save(array $contacts): bool {
        $json = json_encode($contacts, JSON_PRETTY_PRINT);
        return file_put_contents($this->file, $json) !== false;
    }
}

?>