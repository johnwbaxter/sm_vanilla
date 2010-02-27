<?php  if ( ! defined('EXT')) exit('No direct script access allowed');

// -----------------------------------------
// Begin class
// -----------------------------------------
class Sm_vanilla {

	var $settings		= array();

	var $name			= 'EE 1.6.x to Vanilla 2 Bridge';
	var $version		= '1.0.0';
	var $description	= 'log in to your Vanilla forums with your EE member credentials.';
	var $settings_exist	= 'n';
	var $docs_url		= '';


	// -------------------------------
	//	 Constructor
	// -------------------------------
	function Sm_vanilla($settings = '')
	{
		$this->settings = $settings;
	}
	// END Constructor


	// --------------------------------
	//	Activate Extension
	// --------------------------------
	function activate_extension()
	{
		global $DB;
		
		$hook = array(
						'extension_id'	=> '',
						'class'			=> __CLASS__,
						'method'		=> 'member_member_logout',
						'hook'			=> 'member_member_logout',
						'settings'		=> '',
						'priority'		=> 10,
						'version'		=> $this->version,
						'enabled'		=> 'y'
					);
	
		$DB->query($DB->insert_string('exp_extensions',	$hook));
	}
	// END Activate Extension


	// --------------------------------
	//	Update Extension
	// --------------------------------
	function update_extension($current='')
	{
	    global $DB;

	    $DB->query("UPDATE exp_extensions SET version = '".$DB->escape_str($this->version)."' WHERE class = 'Sm_vanilla'");
	}
	// END Update Extension


	// --------------------------------
	//	Disable Extension
	// --------------------------------

	function disable_extension()
	{
		global $DB;
		$DB->query("DELETE FROM exp_extensions WHERE class = '".__CLASS__."'");
	}
	// END Disable Extension
	

	// --------------------------------
	//	member_member_logout Hook
	// --------------------------------
	function member_member_logout()
    {
		global $FNS;
        
		return $FNS->set_cookie('vanilla');
    }
	// END member_member_logout Hook
	
}
// END CLASS Sm_vanilla

/* End of file ext.sm_vanilla.php */
/* Location: ./system/extensions/ext.sm_vanilla.php */