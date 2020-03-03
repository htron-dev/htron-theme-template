<?php
/**
 * Start all wordpress services
 * =====================================================
 */
namespace HtronTheme\Includes\Wordpress;

final class Services {
    public static function register_services () {
        // get all classes of services
        $classes = self::get_services();
        // loop in clases
        foreach ($classes as $class) {
            // instantiate the service class
            $service = new $class();
            // if exist method init call him
            if( method_exists( $service, 'init' )  ){
                $service->init();    
            }
        }
    }
    public static function get_services () {
        return [
            Enqueue::class,
            Menu::class,
        ];
    }
    public function instantiate (contructor $class) {
        return new $class;
    }
}
