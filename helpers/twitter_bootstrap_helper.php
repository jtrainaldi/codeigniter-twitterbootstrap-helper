<?php

/* 
	TWITTER BOOTSTRAP - HELPER
	Author: James Rainaldi
	Created: 2012-02-03
	Modified: 2012-02-21
	Version: v1.0.3
	Contributors: .....

 */

	/*
	FORMS
	Description:
	This helper file assists in creating the twitter bootstrap elements (control-groups) in 
	  combination with the codeigniter form helper.
	*/




	/**
	 * Generates an control-group structure.
	 *
	 * @param   String  label name
	 * @param   String/array   html elements (use Codginiter Form Helper)
	 * @param		Array   twitter bootstrap specific attributes and control-group html attrs status: error, success, warning
	 * @return  String
	 */
	function form_control_group($label_name = NULL, $element, $extra = NULL)
	{
		//Declare and Initialize variables
		$cg_str='';
		
		//Basic HTML element attributes
		$extra['id']    = (isset($extra['id'])) ? $extra['id'] : '';
		$extra['class'] = (isset($extra['class'])) ? $extra['class'] : '';
		$extra['style'] = (isset($extra['style'])) ? $extra['style'] : '';
				
		//Twitter Bootstrap attributes
		$extra['status']  = (isset($extra['status'])) ? $extra['status'] : NULL;
		$extra['help-inline'] = (isset($extra['help-inline'])) ? $extra['help-inline'] : NULL;
		$extra['help-block']  = (isset($extra['help-block'])) ? $extra['help-block'] : NULL;
		$extra['uneditable']  = (isset($extra['uneditable'])) ? TRUE : FALSE;
		$extra['view']        = (isset($extra['view'])) ? TRUE : FALSE;
		
		//Append/Prepend Elements
		if((isset($extra['prepend'])))
		{
			$extra['prepend'] = $extra['prepend'];
		}
		else
		{	
			$extra['prepend'] = NULL;
		}

		if((isset($extra['append'])))
		{
			$extra['append'] = $extra['append'];
		}
		else 
		{
			$extra['append'] = NULL;
		}

		//Set the prepend/append checkbox status if it is checked by default		
		$extra['add-on-class'] = ((isset($extra['prepend']) AND strpos($extra['prepend'],'checked')!==FALSE) OR (isset($tb_attributes['append']) AND strpos($tb_attributes['append'],'checked') !== FALSE))
													 ?'active'
													 :'';

		//Assign the label 'for' attribute to the first element's ID value for
		// label click functionality.
		if(is_array($element))
		{
			foreach($element as $e)
			{
				$element_id[] = substr(substr($e,strpos($e,'id=')+4),0,strpos(substr($e,strpos($e,'id=')+4),'"'));
			}
		}
		else
		{	
			$element_id[] = substr(substr($element,strpos($element,'id=')+4),0,strpos(substr($element,strpos($element,'id=')+4),'"'));
		}		
		
		//Begin generating the control-group structure
		$cg_str .= '<div id="' . $extra['id'] . '" class="control-group ' . $extra['class'] . ' ' . $extra['status'] . '" style="' . $extra['style'] . '" >';
		  $cg_str .= '<label class="control-label" for="' . $element_id[0] . '">' . $label_name . '</label>';
		  $cg_str .= '<div class="controls">';
		    
				//Create prepend/append div
				if(isset($extra['prepend']))
				{
					$cg_str .= '<div class="input-prepend ">';
				}
				else if(isset($extra['append']))
				{
					$cg_str .= '<div class="input-append ">';
				}
				
					//Add prepend element
					if(isset($extra['prepend']))
					{
						$cg_str .= '<span class="add-on ' . $extra['add-on-class'] . '">' . $extra['prepend'] . '</span>';
					}
					
					//Add elements 
					// Check if element variable passed is an array or string
					if(is_array($element))
					{
						foreach($element as $e)
						{
							$cg_str .= ($extra['uneditable'] OR $extra['view']) ? '<span class="' . ($extra['view'] ? "view-input" : ($extra['uneditable'] ? "uneditable-input" : "")) . '">' . $e .' </span>' : $e;
						}
					}
					else
					{
						$cg_str .= ($extra['uneditable'] OR $extra['view']) ? '<span class="' . ($extra['view'] ? "view-input" : ($extra['uneditable'] ? "uneditable-input" : "")) . '">' . $element . '</span>' : $element;
					}

					//Add append element
					if(isset($extra['append']))
					{
						$cg_str .= '<span class="add-on ' . $extra['add-on-class'] . '">' . $extra['append'] . '</span>';
					}

				
					//Add Help-inline text
					if(isset($extra['help-inline']))
					{ 
						$cg_str .= '<span class="help-inline">' . $extra['help-inline'] . '</span>';
					}
				
				//Close append/prepend div
				if(isset($extra['prepend']) OR isset($extra['append']))
				{
					$cg_str .= '</div>';
				}

				//Add Help-block text
				if(isset($extra['help-block']))
				{
					$cg_str .= '<p class="help-block">' . $extra['help-block'] . '</p>';
				}
				
		  $cg_str .= '</div> <!-- END OF .controls -->';
		$cg_str .= '</div> <!-- END OF .control-group -->';
		
		return $cg_str;
	} //END OF control_group function


	/**
	 * Generates a form-action box.
	 *
	 * @param   String  label name
	 * @param   String/Array   html button/submit elements (use Form Helper)
	 * @param		Array   twitter bootstrap specific attributes (error, append, prepend, etc.)
	 * @return  String
	 */
	function form_action($button, $extra = NULL)
	{
			
		//Declare and Initialize variables
		$fa_str      ='';
		$array_count =0;
		
		//Basic HTML element attributes
		//$button = (isset($button)) ? $button : '';

		$extra['id']    = (isset($extra['id'])) ? $extra['id'] : '';
		$extra['class'] = (isset($extra['class'])) ? $extra['class'] : '';
		$extra['style'] = (isset($extra['style'])) ? $extra['style'] : '';
			
		$fa_str = '<div id="' . $extra['id'] . '" class="form-actions ' . $extra['class'] . ' " style="' . $extra['style'] . '" >';
		
			if(is_array($button))
			{
				foreach($button as $b)
				{
					$fa_str .= ($array_count>0) ? '&nbsp;' . $b : $b;
					$array_count++;
				}
			}
			else 
			{	
				$fa_str .= $button;
			}
		
		$fa_str .= '</div>';
		
		return $fa_str;
	} //END OF form_action function



/* ************************************************************************* */

/*
ALERTS
Description:
This helper file assists in creating the twitter bootstrap alert elements (alert).
*/

	function alert($body, $extra = NULL){

		//Declare and Initialize variables
		$alert_str   = '';
		$array_count = 0;
		
		//Basic HTML element attributes
		$extra['id']        = (isset($extra['id'])) ? $extra['id'] : '' ;
		$extra['class']     = (isset($extra['class'])) ? $extra['class'] : '';
		$extra['style']     = (isset($extra['style'])) ? $extra['style'] : '';
		$extra['status']      = (isset($extra['status'])) ? 'alert-' . $extra['status'] : '';
		$extra['dismissal'] = (isset($extra['dismissal']) AND $extra['dismissal']===TRUE) ? TRUE : FALSE;
		$extra['header']    = (isset($extra['header'])) ? $extra['header'] : NULL;

		$alert_str = '<div id="' . $extra['id'] . '" class="alert '. $extra['class'] . ' ' . $extra['status'] .' fade in " style="' . $extra['style'] . '" >';
			
			if($extra['dismissal'])
			{
				$alert_str .= close_icon();
			}
			
			//Add header
			if(isset($extra['header']))
			{
				$alert_str .= '<h4 class="alert-heading">'.$extra['header'].'</h4>';
			}
			
			//Add body
			$alert_str .= $body;
			
		$alert_str .= '</div> <!-- END OF .alert -->';

		return $alert_str;
	}  //END OF alert function

/* ************************************************************************* */



/*
Buttons
Description:
This helper file assists in creating the twitter bootstrap button componenets.
*/

	/*
	BUTTON GROUP (non-dropdown)
	Description:
	This helper file assists in creating the twitter bootstrap alert elements (alert).
	*/

		function button_group($button = '', $extra = NULL){

			//Declare and Initialize variables
			$bg_str      = '';
			$array_count = 0;
			
			//Basic HTML element attributes
			$extra['id']     = (isset($extra['id'])) ? $extra['id'] : '';
			$extra['class']  = (isset($extra['class'])) ? $extra['class'] : '';
			$extra['status']  = (isset($extra['status'])) ? $extra['status'] : '';
			$extra['style']  = (isset($extra['style'])) ? $extra['style'] : '';
			$extra['toggle'] = (isset($extra['toggle'])) ? 'buttons-' . $extra['toggle'] : '' ;
				
				if(is_array($button))
				{
					if(is_array($button[0]))
					{
						$bg_str .= '<div class="btn-toolbar" id="' . $extra['id'] . '" class="' . $extra['class'] . '" style="' . $extra['style'] . '" >';

						foreach($button as $b)
						{
							$bg_str .= '<div class="btn-group" data-toggle="'. $extra['toggle'] . '" >';
							
							foreach($b as $b2)
							{
								$bg_str .= $b2;
							}

							$bg_str .= '</div >';
						}	

						$bg_str .= '</div>';
					}
					else
					{
						$bg_str .= '<div class="btn-group" data-toggle="' . $extra['toggle'] . '" >';

						foreach($button as $b)
						{
							$bg_str .= $b;							
						}

						$bg_str .= '</div> <!-- END OF .btn-group -->';
					}	
				}
				else
				{
					$bg_str .= $button;
				}						

			return $bg_str;

		}  //END OF button_group function

	/*
	BUTTON GROUP (non-dropdown)
	Description:
	This helper file assists in creating the twitter bootstrap alert elements (alert).
	*/
	function button_dropdown($data = '', $content = '', $extra = ''){
		$btn_str     = '';
		$is_dropdown = $is_split = FALSE;
		$defaults    = array('name' => (( ! is_array($data)) ? $data : ''), 'type' => 'button');

		if ( is_array($data) AND isset($data['content']))
		{
			$content = $data['content'];
			unset($data['content']); // content is not an attribute
		}

		$class = 'btn ';
		if ( is_array($data))
		{
			if (isset($data['class'])) $class = $class . $data['class'];
		}
		else 
		{
			if (isset($extra['class'])) 
			{
				$class = $class . $extra['class'];
			}
		}

		if ( is_array($data) AND isset($data['status']))
		{
			$class = $class . ' btn-' . $data['status'];
			unset($data['status']);
		}
		else 
		{
			if (isset($extra['status'])) 
			{
				$class = $class . $extra['status'];
			}
			unset($data['status']);
		}
		$data['class'] = $class;

		if ( is_array($data) AND isset($data['toggle']))
		{
			$toggle = ($data['toggle']==='button') ? "data-toggle='" . $data['toggle'] ."'" : '';
		}
		else 
		{
			$toggle = "";
		}
		
		if ( is_array($data) AND isset($data['loading-text']))
		{
			$loading_text = "data-loading-text='" . $data['loading-text'] ."'";
		}
		else 
		{
			$loading_text = "";
		}
		
		if ( is_array($data) AND isset($data['complete-text']))
		{
			$complete_text = "data-complete-text='" . $data['complete-text'] ."'";
		}
		else 
		{
			$complete_text = "";
		}
		
		if ( is_array($data) AND isset($data['split']) )
		{	
			$is_split = TRUE;
		}

		if ( is_array($data) AND isset($data['dropup']) AND $data['dropup']===TRUE)
		{
			$dropup = "dropup";
		}
		else 
		{
			$dropup = "";
		}

		$btn_str .= '<div class="btn-group ' . $dropup . '"  >';

		if($is_split){
			$btn_str .= "<button "._parse_form_attributes($data, $defaults).$extra." " . $toggle . " " . $loading_text ." " . $complete_text ." >".$content."</button>";
			$btn_str .= '<button class="btn dropdown-toggle '. $data['class'] .'" data-toggle="dropdown"><span class="caret"></span></button>';
		}else {
			$data['class'] .= ' dropdown-toggle';
			$btn_str .= "<button "._parse_form_attributes($data, $defaults).$extra." " . $toggle . " " . $loading_text ." " . $complete_text ." data-toggle='dropdown' >".$content." <span class='caret'></span></button>";
		}


		if ( is_array($data['options']) AND isset($data['options'] ) OR is_array($extra['options']) AND isset($extra['options'] ))
		{	
			$btn_str .= '<ul class="dropdown-menu">';
			foreach($data['options'] as $r):
				$btn_str .= ($r === 'divider') ? '<li class="divider" ></li>' : '<li>' . $r . '</li>';
			endforeach;
			$btn_str .= '</ul>';
		}

		$btn_str .= '</div> <!-- End of .btn-group -->';

		return $btn_str;

	}  //END OF button_group function






/* ************************************************************************* */

/*
PROGRESS BAR
Description:
This helper file assists in creating the twitter bootstrap progress bar elements.
*/

	function inline_label($data, $extra = NULL){

		//Declare and Initialize variables
		$str   = '';

		if( ! is_array($data))
		{
			$content = (isset($data)) ? $data : '' ;
		}
		else 
		{
			$content = (isset($data['content'])) ? $data['content'] : 0 ;
		}

		$extra['id'] 			= (is_array($data) AND isset($data['id'])) ? $data['id'] : (( isset($extra['id']) ) ? $extra['id'] : '');
		$extra['class'] 		= (is_array($data) AND isset($data['class'])) ? $data['class'] : (( isset($extra['class']) ) ? $extra['class'] : '');
		$extra['style'] 		= (is_array($data) AND isset($data['style'])) ? $data['style'] : (( isset($extra['style']) ) ? $extra['style'] : '');
		$extra['type'] 		= (isset($extra['type']) AND $extra['type']==='badge') ? $extra['type'] : 'label';
		$extra['status'] 	= (is_array($data) AND isset($data['status'])) ? ' ' . $extra['type'] . '-' . $data['status'] 
											: (( isset($extra['status']) ) ? ' ' . $extra['type'] . '-' . $extra['status'] 
											: '');

		$str = '<span id="' . $extra['id'] . '" class="' . $extra['type'] . $extra['status'] . ' ' . $extra['class'] . ' " style="' . $extra['style'] . '" >';
			$str .= $content;
		$str .= '</span> <!-- END OF .' . $extra['type'] . ' -->';

		return $str;
	}  //END OF progress_bar function


	function badge($data, $extra = NULL){
		$extra['type'] = 'badge';
		return inline_label($data, $extra);
	}


/* ************************************************************************* */

/*
PROGRESS BAR
Description:
This helper file assists in creating the twitter bootstrap progress bar elements.
*/

	function progress_bar($data, $extra = NULL){

		//Declare and Initialize variables
		$progress_str   = '';

		if( ! is_array($data))
		{
			$percentage = (isset($data)) ? $data : 0 ;
		}
		else 
		{
			$percentage = (isset($data['value'])) ? $data['value'] : 0 ;
		}

		$extra['id'] 			= (is_array($data) AND isset($data['id'])) ? $data['id'] : (( isset($extra['id']) ) ? $extra['id'] : '');
		$extra['class'] 		= (is_array($data) AND isset($data['class'])) ? $data['class'] : (( isset($extra['class']) ) ? $extra['class'] : '');
		$extra['style'] 		= (is_array($data) AND isset($data['style'])) ? $data['style'] : (( isset($extra['style']) ) ? $extra['style'] : '');
		$extra['status'] 	= (is_array($data) AND isset($data['status'])) ? ' progress-' . $data['status'] 
											: (( isset($extra['status']) ) ? ' progress-' . $extra['type'] 
											: '');
		$extra['animated'] = (is_array($data) AND (isset($data['animated']) AND (isset($data['striped']) AND $data['striped']))) ? ' active' 
											: ((isset($extra['animated']) AND (isset($extra['striped']) AND $extra['striped'])) ? ' active' 
											: '');
		$extra['striped'] 	= (is_array($data) AND (isset($data['striped']) AND $data['striped'])) ? ' progress-striped' 
											: ((isset($extra['striped']) AND $extra['striped']) ? ' progress-striped' 
											: '');

		$progress_str = '<div id="' . $extra['id'] . '" class="progress' . $extra['status'] . $extra['striped'] . $extra['animated'] . ' ' . $extra['class'] . ' " style="' . $extra['style'] . '" >';
			$progress_str .= '<div class="bar" style="width: ' . $percentage .'%;"></div>';
		$progress_str .= '</div> <!-- END OF .progress-bar -->';

		return $progress_str;
	}  //END OF progress_bar function









/* ************************************************************************* */

/*
Close Icon:
This helper file assists in creating the twitter bootstrap close icon element that removes a div.
*/
function icon($data = '', $white = FALSE, $extra = NULL){

	if( ! is_array($data))
	{
		//$icon = (isset($data)) ? 'icon-' . str_replace('icon-','',$data['icon']): '' ;
		$icon = (isset($data)) ? 'icon-' . str_replace('icon-','',$data): '' ;
		$icon .= ($white) ? ' icon-white' : '';
	}
	else 
	{
		$icon = (isset($extra['icon'])) ? 'icon-' . str_replace('icon-','',$extra['icon']) : '' ;
		$icon .= ($data['white']) ? ' icon-white' : '';
	}

	$extra['id'] 			= (is_array($data) AND isset($data['id'])) ? $data['id'] : (( isset($extra['id']) ) ? $extra['id'] : '');
	$extra['class'] 		= (is_array($data) AND isset($data['class'])) ? $data['class'] : (( isset($extra['class']) ) ? $extra['class'] : '');
	$extra['style'] 		= (is_array($data) AND isset($data['style'])) ? $data['style'] : (( isset($extra['style']) ) ? $extra['style'] : '');

	return '<i id="' . $extra['id'] . '" class="' . $icon . ' ' . $extra['class'] . '" style="' . $extra['style'] . '" ></i>';
}

/*
Close Icon:
This helper file assists in creating the twitter bootstrap close icon element that removes a div.
*/
function close_icon($extra = NULL){
	$extra['id']    = ( isset($extra['id']) ) ? $extra['id'] : '';
	$extra['class'] = ( isset($extra['class']) ) ? $extra['class'] : '';
	$extra['style'] = ( isset($extra['style']) ) ? $extra['style'] : '';

	return '<a href="#" id="' . $extra['class'] . '" class="close ' . $extra['class'] . '" data-dismiss="alert" style="' . $extra['style'] . '" >×</a>';
}


/*
Well Icon:
This helper file assists in creating the twitter bootstrap well element.
*/
function well($data = '', $extra = NULL){

	$extra['id'] 			= (is_array($data) AND isset($data['id'])) ? $data['id'] : (( isset($extra['id']) ) ? $extra['id'] : '');
	$extra['class'] 		= (is_array($data) AND isset($data['class'])) ? $data['class'] : (( isset($extra['class']) ) ? $extra['class'] : '');
	$extra['style'] 		= (is_array($data) AND isset($data['style'])) ? $data['style'] : (( isset($extra['style']) ) ? $extra['style'] : '');


	$str = '<div id="' . $extra['id'] . '" class="well ' . $extra['class'] . '" style="' . $extra['style'] . '" >';
		$str .= $content;
	$str .= '</div> <!-- END OF .well -->';
	return $str;
}



?>