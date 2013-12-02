<?php
namespace Bread\Themes;
use Bread\Site as Site;
class ThemeManager
{
	private $themes;
	private $configuration = "";
	function __construct()
	{
		$themes = array();
		$configuration = "";
	}

	public static function Configuration()
	{
		return $this->configuration;
	}

	function LoadThemeManagerSettings($filepath)
	{
		if(!file_exists($filepath))
		{
			throw new \Exception('Cannot load themes. Manager Settings file not found');
		}
		$tmp = file_get_contents($filepath);
		$this->configuration = json_decode($tmp,true);
		if($this->configuration == NULL)
			throw new \Exception('Cannot load themes. Manager Settings has invalid JSON.');
	}
	
	function LoadLayouts()
	{
	    $layouts = $this->configuration["settings"]["layouts"];
	    foreach($layouts as $layouttype => $layoutpath)
	    {
	       $layouts[$layouttype] = simplexml_load_file(Site::Configuration()["directorys"]["user-layouts"]. "/"  . $layoutpath);
	        break;
	    }
	}

	function RegisterTheme($themeconfig)
	{
		//Parse config file
		if(!file_exists($themeconfig))
		{
			throw new \Exception('Cannot register theme. Theme config not found');
		}
		$tmp = file_get_contents($themeconfig);
		$JSON = json_decode($tmp,true);
		if($this->configuration == NULL)
			throw new \Exception('Cannot load theme. Theme data has invalid JSON.');

		if($JSON["theme"] == NULL)
		{
			throw new \Exception('Cannot load theme. Theme data has missing required properties.');
		}
		$Theme = $JSON["theme"];
        
	}
}
?>