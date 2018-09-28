<?php
/**
 * Router class
 * @author Rainer Schulz
 */
class Router
{
    /**
     * single instances of this class and/or child classes
     * @var array
     */
    protected static $instances = [];

    /**
     * routes for the instances
     * @var array
     */
    protected static $routes = [];

    /**
     * hide for singleton pattern
     */
    protected function __construct()
    {
        // empty
    }

    final public static function getInstance(): Router
    {
        if (false === isset(static::$instances[static::class])) {
            static::$instances[static::class] = new static;
        }

        return static::$instances[static::class];
    }

    public function setRoutes(array $routes = []): Router
    {
        static::$routes[self::class] = $routes;

        return $this;
    }

    public function handle(string $route = ''): array
    {
        $response = [
            'status'     => 200,
            'statusText' => 'OK',
            'data'       => null,
        ];

        if (false === empty(static::$routes[self::class][$route])) {
            $response['data'] = static::$routes[self::class][$route];
        } else {
            $response['status']     = 404;
            $response['statusText'] = 'Not Found';
        }

        return $response;
    }
}
