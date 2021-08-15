<?php

namespace App\Mapper;

use App\Entity\User;

class UserMapper
{
    public function mapUser($dbData): array
    {
        $users = [];
        foreach ($dbData as $line) {
            $users[] = new User(
                $line['id'],
                $line["name"],
                $line["surname"],
                $line["phone"],
                $line["email"],
                $line["login"],
                $line["password"]
            );
        }
        return $users;
    }
}
