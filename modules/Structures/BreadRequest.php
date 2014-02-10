<?php
namespace Bread\Structures;
/**
 * This is filled out to describe the request from the browser to Bread.
 * 
 */
class BreadRequestData
{
        /**
         * @var string The request from the browser.
         * @todo Make a list of standard request types.
         */
	public $requestType = "all";
        /**
         * @var integer From the list of compatible layouts with the request, select this index. 
         */
        public $layout = 0;
        /**
         * @var integer From the list of compatible themes with the request, select this index. 
         */
        public $theme = 0;
        /**
         *
         * @var array The list of additional arguments given by the browser, e.g. page number.
         */
        public $arguments = array();
}
?>
