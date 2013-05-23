<?php
/**
 * Handles the view functionality of our MVC framework
 */
class UsersView
{
	/**
	 * Holds variables assigned to template
	 */
	private $data = array();
	
	/**
	 * Holds render status of view
	 */
	private $render = FALSE;
	private $header = FALSE;
	private $footer = FALSE;
	private $nav = FALSE;
	
	/**
	 * Accept a template to load
	 */
	public function __construct($template, $header, $footer, $nav)
	{
		if(file_exists($template))
		{
			/**
			 * trigger render to includ file when this model is destroyed
			 * if we render it now, we wouldn't be able to assign variables
			 * to the view!
			 */
			$this->render = $template;
		}
		
		if(file_exists($header))
		{
			/**
			 * trigger render to include file when this model is destroyed
			 * if we render it now, we wouldn't be able to assign variables
			 * to the view!
			 */
			$this->header = $header;
		}
		
		if(file_exists($footer))
		{
			/**
			 * trigger render to include file when this model is destroyed
			 * if we render it now, we wouldn't be able to assign variables
			 * to the view!
			 */
			$this->footer = $footer;
		}
		
		if(file_exists($nav))
		{
			/**
			 * trigger render to include file when this model is destroyed
			 * if we render it now, we wouldn't be able to assign variables
			 * to the view!
			 */
			$this->nav = $nav;
		}
	}//end constructor
	
	/**
	 * Recieves assignments from controller and stores in local data array
	 * 
	 * @param $variable
	 * @param $value
	 */
	public function assign($variable, $value)
	{
		$this->data[$variable] = $value;
	}//end function
	
	public function __destruct()
	{
		//parse data variables into local variables, so that they render to the view
		$data = $this->data;
		// echo "In Destructor";
		//render view
		include_once($this->header);
		include_once($this->nav);
		include_once($this->render);
		include_once($this->footer);
	}// end destructor
	
}//end class
?>