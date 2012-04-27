<header class="jumbotron subhead" id="overview">
  <h1 class="padding-bottom-10" >Componenets</h1>
  <p class="lead">The functions and examples below will explain on how you can use many of Twitter Bootstrap style components.</p>

<div class="subnav">
  <ul class="nav nav-pills">
    <li class="dropdown ">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Buttons <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li class=""><a href="#buttonGroups">Button groups</a></li>
        <li><a href="#buttonDropdowns">Button dropdowns</a></li>
      </ul>
	    <li><a href="#badges">Labels</a></li>
	    <li><a href="#badges">Badges</a></li>
	    <li><a href="#alerts">Alerts</a></li>
    <li><a href="#progress">Progress bars</a></li>
    </li>
    <!-- <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Navigation <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#navs">Nav, tabs, pills</a></li>
        <li><a href="#navbar">Navbar</a></li>
        <li><a href="#breadcrumbs">Breadcrumbs</a></li>
        <li><a href="#pagination">Pagination</a></li>
      </ul>
    </li>
    <li><a href="#typography">Typography</a></li>
    <li><a href="#thumbnails">Thumbnails</a></li>
    <li><a href="#alerts">Alerts</a></li>
    <li><a href="#progress">Progress bars</a></li>
    <li><a href="#misc">Miscellaneous</a></li> -->
  </ul>
</div>

</header>




<section id="forms" class="margin-bottom-5" >

	<div class="page-header">
    <h1>Button Groups <small> Join buttons for more toolbar-like functionality</small></h1>
  </div>

<div class="row">
	<div class="span6">
<pre class="prettyprint linenums pre-scrollable ">
function button_group($button, $extra=NULL){
* @param   String/Array   string or an array of buttons (use Codginiter Form Helper)
* @param   Array  button_group attributes (style, class, id, etc)
* @return  String  twitter button group.

/* $extra OPTIONS	*/
$extra['id'] = String;
$extra['class'] = String;
$extra['style'] = String;
$extra['toggle'] = String;
$extra['loading-text'] = String;
$extra['complete-text'] = String;

</pre>
	</div>
	<div class="span6 ">
			<a name="buttonGroups" ></a>
			<h3>Default Example</h3>

			<?php
				$button = NULL;
				$button = array(
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => 'Left',
					    'toggle' => TRUE
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => 'Middle'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => 'Right'
						)
					)

				);

				echo button_group($button);
		?>
		<br />
		<?php
			$button = NULL;
			$button = array(
				form_button(array('name' => 'button','id' => 'button','status'=>'info','value' => 'true','type' => 'button','content' => '1', 'active'=>TRUE)),
				form_button(array('name' => 'button','id' => 'button','status'=>'success','value' => 'true','type' => 'button','content' => '2', 'active'=>FALSE)),
				form_button(array('name' => 'button','id' => 'button','status'=>'warning','value' => 'true','type' => 'button','content' => '4')),
				form_button(array('name' => 'button','id' => 'button','status'=>'danger','value' => 'true','type' => 'button','content' => '8'))
			);

			echo button_group($button, array('toggle' => 'checkbox'));
		?>
		<br />
		<?php
			$button = NULL;
			$button = array(
				form_button(array('name' => 'button','id' => 'button','class'=>'','value' => 'true','type' => 'button','content' => 'Yes', 'active'=>TRUE)),
				form_button(array('name' => 'button','id' => 'button','class'=>'', 'status'=>'inverse', 'value' => 'true','type' => 'button','content' => 'No'))
			);

			echo button_group($button, array('toggle' => 'radio'));
		?>

		<p class="clearfix"></p>
			<h3>Toolbar Example</h3>

<p>If <strong>$button</strong> variable is a multidimensional array of buttons 
it will break the array segments into 
individual button-groups and wrap them 
in the button-toolbar class </p>
		<?php
				$button = NULL;
				$button[] = array(
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '1'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '2'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '3'
						)
					)

				);
				$button[] = array(
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '1'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '2'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '3'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '4'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'',
					    'status'=>'info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '5'
						)
					)

				);
				//print_array($button);

				echo button_group($button, array('toggle'=>'radio'));

			?>

	</div>
</div>

<br />
<div class="row">
	<div class="span6">
			<a name="buttonDropdowns" ></a>

<pre class="prettyprint linenums pre-scrollable ">
function button_dropdown($data = '', $content = '', $extra = ''){
* (Same functionality as form_button Form Helper function)
* @param   String/Array   string or an array of buttons
* @param   String  content button name
* @return  String  button/twitter attributes.

/* $attr OPTIONS	*/
$extra['id'] = String;
$extra['class'] = String;
$extra['style'] = String;
$extra['options'] = String/Array of anchor tags used for dropdown nav;
		/* add 'divider' for a nav divider */
$extra['split'] = Bool - Whether a split will be used
$extra['dropup'] = Bool - If you want a dropup 

</pre>

	</div>
	<div class="span6">
		<h3>Button Dropdown Example </h3>
<!-- <pre class="prettyprint linenums pre-scrollable ">
/* If button array is multidimensional it will break the primary array into 
individual button-groups and wrap them in the button-toolbar class */
</pre> -->
		<div class="btn-toolbar" >
		<?php
				$button = NULL;
				echo button_dropdown(
						array(
						    'name' => 'button',
						    'id' => 'button',
						    'class'=>'btn-info',
						    'value' => 'true',
						    'type' => 'button',
						    'content' => 'Basic',
								'options' => array(
									anchor('bootstrap/components#action', 'Action'),
					    		anchor('bootstrap/components#another-action','Another Action')
								)
						)
				);
		?>

		<?php
				$button = NULL;
				echo button_dropdown(
						array(
						    'name' => 'button',
						    'id' => 'button',
						    'class'=>'btn-info',
						    'value' => 'true',
						    'type' => 'button',
						    'content' => 'Split Dropdown',
								'options' => array(
									anchor('bootstrap/components#action', 'Action'),
					    		anchor('bootstrap/components#another-action','Another Action'),
					    		'divider',
					    		anchor('bootstrap/components#divided-link','Divided Link'),
								),
								'split' => TRUE
						)
				);
		?>

		<?php
				$button = NULL;
				echo button_dropdown(
						array(
						    'name' => 'button',
						    'id' => 'button',
						    'class'=>'btn-info',
						    'value' => 'true',
						    'type' => 'button',
						    'content' => 'Dropup',
								'options' => array(
									anchor('bootstrap/components#action', 'Action'),
					    		anchor('bootstrap/components#another-action','Another Action'),
					    		'divider',
					    		anchor('bootstrap/components#divided-link','Divided Link'),
								),
								'split' => TRUE,
								'dropup' => TRUE
						)
				);
		?>

		<span class="label label-warning pull-right" >Incomplete</span>
	</div>

</section>

<section id="alerts" class="margin-bottom-25" >

	<div class="page-header">
    <h1>Alerts <small> Styles for success, warning, and error messages</small></h1>
  </div>

<div class="row">
	<div class="span6">
<pre class="prettyprint linenums pre-scrollable ">
function alert($body, $extra = NULL){
* @param   String/Array   string 
* @param   Array  alert attributes (style, class, id, etc)
* @return  String  twitter alert.

/* $attr OPTIONS	*/
$extra['id'] = String;
$extra['class'] = String;
$extra['style'] = String;
$extra['status'] = String;
$extra['dismissal'] = Bool;
$extra['header'] = String;

</pre>
	</div>
	<div class="span6">
		<?php 
			$attr = array(
				'class'	=> '',
				'dismissal'	=> FALSE,
				'header'	=> 'Warning'
			);
			echo alert('Best check yo self, you\'re not looking too good.', $attr);

			$attr = array(
				'class'	=> '',
				'status'	=> 'error',
				'dismissal'	=> TRUE,
			);
			echo alert('<strong>Oh snap!</strong> Change a few things up and try submitting again.', $attr);

			$attr = array(
				'class'	=> '',
				'status'	=> 'success',
				'dismissal'	=> TRUE,
			);
			echo alert('<strong>Well Done!</strong> You successfully read this important alert message..', $attr);

			$attr = array(
				'class'	=> '',
				'status'	=> 'info',
				'dismissal'	=> TRUE,
			);
			echo alert('<strong>Heads Up!</strong> This alert needs your attention, but it\'s not super important.', $attr);
		?>
	</div>
</div>
</section>




	<a name="badges"></a>
<section id="labels-badges" class="margin-bottom-25" >
	<div class="page-header">
    <h1>Inline Labels and Badges <small> </small></h1>
  </div>

<div class="row">
	<div class="span6">
<pre class="prettyprint linenums pre-scrollable ">
function inline_label($data, $extra = NULL){
* @param   String/Array  array attributes or bar percentage 
* @param   Array  progress bar attributes (style, class, id, etc)
* @return  String  twitter alert.

/* $attr OPTIONS	*/
$extra['content']  = String
$extra['id']       = String
$extra['class']    = String
$extra['style']    = String
$extra['type']     = String //badge or NULL = inline-label

function badge($data, $extra = NULL) 
//calls inline_label function but sets $attr['type'] = badge

</pre>
	</div>
	<div class="span6">
		<h3>Inline Labels</h3>
		
		<p>
			<?php
			echo inline_label('Default');
			echo ' - ';
			echo badge('1');
			?>
		</p>	
		<p>
			<?php
			$data = array(
				'content' => 'Success',
				'status'	=> 'success'
			);
			echo inline_label($data);
			echo ' - ';
			$data = array(
				'content' => '2',
				'status'	=> 'success',
			);
			echo badge($data);
			?>
		</p>	
		<p>
			<?php
			$data = array(
				'content' => 'Warning',
				'status'	=> 'warning'
			);
			echo inline_label($data);
			echo ' - ';
			$data = array(
				'content' => '4',
				'status'	=> 'warning',
			);
			echo badge($data);
			?>
		</p>	
		<p>
			<?php
			$data = array(
				'content' => 'Important',
				'status'	=> 'important'
			);
			echo inline_label($data);
			echo ' - ';
			$data = array(
				'content' => '6',
				'status'	=> 'important',
			);
			echo badge($data);
			?>
		</p>	
		<p>
			<?php
			$data = array(
				'content' => 'Info',
				'status'	=> 'info'
			);
			echo inline_label($data);
			echo ' - ';
			$data = array(
				'content' => '8',
				'status'	=> 'info',
			);
			echo badge($data);
			?>
		</p>	
		<p>
			<?php
			$data = array(
				'content' => 'Inverse',
				'status'	=> 'inverse'
			);
			echo inline_label($data);
			echo ' - ';
			$data = array(
				'content' => '10',
				'status'	=> 'inverse',
			);
			echo badge($data);
			?>
		</p>	

	</div>
</div>
</section>










<section id="progress-bars" class="margin-bottom-25" >
	<a name="progress"></a>
	<div class="page-header">
    <h1>Progress Bars <small> For loading, redirecting, or action status</small></h1>
  </div>

<div class="row">
	<div class="span6">
<pre class="prettyprint linenums pre-scrollable ">
function progress_bar($data, $extra = NULL){
* @param   String/Array  array attributes or bar percentage 
* @param   Array  progress bar attributes (style, class, id, etc)
* @return  String  twitter alert.

/* $attr OPTIONS	*/
$extra['value']    = Int
$extra['id']       = String
$extra['class']    = String
$extra['style']    = String
$extra['status']   = String //success, error, info, warning
$extra['striped']  = Bool
$extra['animated'] = Bool //Animated only if striped is TRUE

</pre>
	</div>
	<div class="span6">
		<h3>Default - just percentage</h3>
		<?php
			echo progress_bar(50);
		?>

		<h3>Advanced - additional colors, striped, and animations</h3>
		<?php 
			$data = array(
				'value'	=> 20,
				'class'	=> 'test-class',
				'status'	=> 'info',
			);
			echo progress_bar($data);

			$data = array(
				'value'	=> 40,
				'class'	=> '',
				'status'	=> 'danger',
				'striped'	=> TRUE
			);
			echo progress_bar($data);

			$data = array(
				'value'	=> 60,
				'class'	=> '',
				'status'	=> 'warning',
				'striped'	=> TRUE
			);
			echo progress_bar($data);

			$data = array(
				'value'	=> 80,
				'class'	=> '',
				'status'	=> 'success',
				'striped'	=> TRUE,
				'animated'	=> TRUE
			);
			echo progress_bar($data);
		?>


	</div>
</div>
</section>