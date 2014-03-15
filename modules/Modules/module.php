<?php
namespace Bread\Modules;
class Module
{
        /**
         * The parent module manager. Should be the same as Site::$moduleManager
         * unless your platform is rolling its own exotic manager.
         * Unless your a hipster, use the $manager variable.
         * @var type \Bread\Modules\ModuleManager
         */
        protected $manager;
        /**
         * The name of the module to be referred to.
         * @var type 
         */
	protected $name;
	function __construct($manager,$name)
	{
		$this->manager = $manager;
		$this->name = $name;
	}
        /**
         * Every module should use this function to set its hooks.
         * DO NOT USE THIS AS A SETUP FUNCTION, ITS NOT GOING TO WORK.
         */
	function RegisterEvents()
	{
            
	}
}
?>
