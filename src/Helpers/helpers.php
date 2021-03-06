<?php

use Faker\Factory;
use Phalcon\Debug\Dump;
use Yarak\DB\Factories\ModelFactory;

if (!function_exists('factory')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     */
    function factory()
    {
        $factory = new ModelFactory(Factory::create());

        $arguments = func_get_args();

        if (isset($arguments[1]) && is_string($arguments[1])) {
            return $factory->forClass($arguments[0], $arguments[1])
                ->times(isset($arguments[2]) ? $arguments[2] : null);
        } elseif (isset($arguments[1])) {
            return $factory->forClass($arguments[0])->times($arguments[1]);
        }

        return $factory->forClass($arguments[0]);
    }
}
