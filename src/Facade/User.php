<?php

declare(strict_types=1);

namespace Linnzh\Utils\Facade;

class User
{
    private string $name;

    private string $email;

    public function __construct(?string $name, ?string $email)
    {
        $name && $this->name = $name;
        $email && $this->email = $email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
