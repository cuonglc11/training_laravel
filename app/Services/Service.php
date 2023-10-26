<?php

namespace App\Services;

use App\Models\Categories;

abstract class Service
{
    /**
     * @var null|Categories
     */
    protected $user = null;

    /**
     * @param Categories|null $user
     * @return $this
     */
    public function withUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Categories $supplier
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Create new service instance
     *
     * @return $this
     */
    public static function new()
    {
        return app(static::class);
    }
}
