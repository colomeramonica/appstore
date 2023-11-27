<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    private $table = 'developer';

    private String $name;

    private String $email;

    private String $phone;

    private function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    private function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    private function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone() {
        return $this->phone;
    }
}
