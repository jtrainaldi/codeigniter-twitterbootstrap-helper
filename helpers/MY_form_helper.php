<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Checkbox Field
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	bool
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_checkbox'))
{
	function form_checkbox($data = '', $value = '', $checked = FALSE, $extra = '')
	{
		$defaults = array('type' => 'checkbox', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);

		if (is_array($data) AND array_key_exists('checked', $data))
		{
			$checked = $data['checked'];

			if ($checked == FALSE)
			{
				unset($data['checked']);
			}
			else
			{
				$data['checked'] = 'checked';
			}
		}

		if ($checked == TRUE)
		{
			$defaults['checked'] = 'checked';
		}
		else
		{
			unset($defaults['checked']);
		}

		if (is_array($data) AND array_key_exists('label', $data))
		{
			$inline = $data['inline'];
			$inline = ($inline == FALSE) ? '' : 'inline';
			unset($data['inline']); // content is not an attribute
		}else {
			$inline = '';
		}

		if (is_array($data) AND isset($data['label']))
		{
			$label = $data['label'];
			unset($data['label']); // content is not an attribute
		}else {
			$label = '';
		}
		return "<label class='" . $data['type'] . " " . $inline . "' ><input "._parse_form_attributes($data, $defaults).$extra." /> " . $label . "</label>";
		//return "<label ><input "._parse_form_attributes($data, $defaults).$extra." /> " . $label . "</label>";
	}
}

// ------------------------------------------------------------------------


/**
 * Form Button
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	string
 * @return	string
 */
	function form_button($data = '', $content = '', $extra = '')
	{
		$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'type' => 'button');

		if ( is_array($data) AND isset($data['content']))
		{
			$content = $data['content'];
			unset($data['content']); // content is not an attribute
		}
		if ( is_array($data))
		{
			$class = 'btn ';
			if (isset($data['class'])) {
				$class = $class . $data['class'];
			}
			$data['class'] = $class;
		}

		if ( is_array($data) AND isset($data['toggle']))
		{
			$toggle = ($data['toggle']==='button') ? "data-toggle='" . $data['toggle'] ."'" : '';
		}else {
			$toggle = "";
		}
		if ( is_array($data) AND isset($data['loading-text']))
		{
			$loading_text = "data-loading-text='" . $data['loading-text'] ."'";
		}else {
			$loading_text = "";
		}
		if ( is_array($data) AND isset($data['complete-text']))
		{
			$complete_text = "data-complete-text='" . $data['complete-text'] ."'";
		}else {
			$complete_text = "";
		}

		return "<button "._parse_form_attributes($data, $defaults).$extra." " . $toggle . " " . $loading_text ." " . $complete_text ." >".$content."</button>";
	}

// ------------------------------------------------------------------------


/* End of file form_helper.php */
/* Location: ./system/helpers/form_helper.php */
