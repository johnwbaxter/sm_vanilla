<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// -----------------------------------------
// Begin class
// -----------------------------------------

class Sm_vanilla_ext {

	var $settings		 = array();

	var $name			 = 'EE 2 to Vanilla 2 Bridge';
	var $version		 = '2.0.0';
	var $description	 = 'It does what it says on the tin.';
	var $settings_exist	 = 'n';
	var $docs_url		 = '';
	
	
	// -------------------------------
	//	 Constructor
	// -------------------------------
	
	function __construct($settings='')
    {
        $this->EE =& get_instance();
    }
    // END Constructor


	// --------------------------------
	//	Activate Extension
	// --------------------------------
	
	function activate_extension()
	{
		$this->EE->db->query($this->EE->db->
		    insert_string('exp_extensions',
		        array(
					'extension_id' => '',
					'class'		   => __CLASS__,
					'method'	   => 'member_member_logout',
					'hook'		   => 'member_member_logout',
					'settings'	   => '',
					'priority'	   => 10,
					'version'	   => $this->version,
					'enabled'	   => 'y'
				)
			)
		);
	}
	// END Activate Extension
	
	
	// --------------------------------
	//	Update Extension
	// --------------------------------	 
	
	function update_extension($current='')
	{
		if ($current == '' OR $current == $this->version)
		{
			return FALSE;
		}

		$this->EE->db->query("UPDATE exp_extensions SET version = '".$this->EE->db->escape_str($this->version)."' WHERE class = 'Sm_vanilla_ext'");
	}
	// END Update Extension
	
	
	// --------------------------------
	//	Disable Extension
	// --------------------------------
	
	function disable_extension()
	{
		$this->EE->db->query("DELETE FROM exp_extensions WHERE class = 'Sm_vanilla_ext'");
	}
	// END Disable Extension
	
	
	// --------------------------------
	//	member_member_logout Hook
	// --------------------------------
	
	function member_member_logout()
    {
        $this->EE->functions->set_cookie('vanilla');
		$this->EE->extensions->end_script === TRUE;
    }
    // END member_member_logout Hook


}
// END Sm_vanilla_ext

/* End of file ext.sm_vanilla.php */
/* Location: ./system/expressionengine/third_party/sm_vanilla/ext.sm_vanilla.php */