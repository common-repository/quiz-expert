<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc;

final class QuexpInit
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function quexp_get_services() 
	{
		return [
			Pages\QuexpAdmin::class,
			Base\QuexpShortCode::class,
			Base\QuexpAdminEnqueue::class,
			Base\QuexpEnqueue::class,
			Base\QuexpSettingsLinks::class,
			Base\QuexpAjaxCall::class
		];
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
	public static function quexp_register_services() 
	{
		foreach ( self::quexp_get_services() as $class ) {
			$service = self::quexp_instantiate( $class );
			if ( method_exists( $service, 'quexp_register' ) ) {
				$service->quexp_register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function quexp_instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}