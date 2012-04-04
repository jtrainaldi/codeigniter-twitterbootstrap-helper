<header class="jumbotron subhead" id="overview">
  <h1 class="padding-bottom-10" >Componenets</h1>
  <p class="lead">The functions and examples below will explain on how you can use many of Twitter Bootstrap style components.</p>

<div class="subnav">
  <ul class="nav nav-pills">
    <li class="dropdown active">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Buttons <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li class="active"><a href="#buttonGroups">Button groups</a></li>
        <li><a href="#buttonDropdowns">Button dropdowns</a></li>
      </ul>
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
    <li><a href="#labels">Labels</a></li>
    <li><a href="#badges">Badges</a></li>
    <li><a href="#typography">Typography</a></li>
    <li><a href="#thumbnails">Thumbnails</a></li>
    <li><a href="#alerts">Alerts</a></li>
    <li><a href="#progress">Progress bars</a></li>
    <li><a href="#misc">Miscellaneous</a></li> -->
  </ul>
</div>

</header>





<section id="forms" class="margin-bottom-25" >

	<div class="page-header">
    <h1>Button Groups <small> Join buttons for more toolbar-like functionality</small></h1>
  </div>

<div class="row">
	<div class="span6">
<pre class="prettyprint linenums pre-scrollable ">
function button_group($button, $attr=NULL){
* @param   String/Array   string or an array of buttons (use Codginiter Form Helper)
* @param   Array  button_group attributes (style, class, id, etc)
* @return  String  twitter button group.

/* $attr OPTIONS	*/
$attr['id'] = String;
$attr['class'] = String;
$attr['style'] = String;
$attr['toggle'] = String;
$attr['loading-text'] = String;
$attr['complete-text'] = String;

</pre>
	</div>
	<div class="span6 ">
			<h3>Default Example</h3>

			<?php
				$button = NULL;
				$button = array(
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
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
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => 'Middle'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
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
				form_button(array('name' => 'button','id' => 'button','class'=>'btn-info','value' => 'true','type' => 'button','content' => '1')),
				form_button(array('name' => 'button','id' => 'button','class'=>'btn-success','value' => 'true','type' => 'button','content' => '2')),
				form_button(array('name' => 'button','id' => 'button','class'=>'btn-warning','value' => 'true','type' => 'button','content' => '4')),
				form_button(array('name' => 'button','id' => 'button','class'=>'btn-danger','value' => 'true','type' => 'button','content' => '8'))
			);

			echo button_group($button, array('toggle' => 'checkbox'));
		?>
		<br />
		<?php
			$button = NULL;
			$button = array(
				form_button(array('name' => 'button','id' => 'button','class'=>'','value' => 'true','type' => 'button','content' => 'Yes')),
				form_button(array('name' => 'button','id' => 'button','class'=>'btn-inverse','value' => 'true','type' => 'button','content' => 'No'))
			);

			echo button_group($button, array('toggle' => 'radio'));
		?>

		<p class="clearfix"></p>
			<h3>Toolbar Example</h3>




<p>If <strong>$button</strong> is a multidimensional array of buttons 
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
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '1'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '2'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
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
					    'class'=>' btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '1'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>' btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '2'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>' btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '3'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>' btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '4'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
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


<div class="row">
	<div class="span6">

<pre class="prettyprint linenums pre-scrollable ">
function button_dropdown($data = '', $content = '', $extra = ''){
* (Same functionality as form_button Form Helper function)
* @param   String/Array   string or an array of buttons
* @param   String  content button name
* @return  String  button/twitter attributes.

/* $attr OPTIONS	*/
$data['id'] = String;
$data['class'] = String;
$data['style'] = String;
$data['options'] = String/Array of anchor tags used for dropdown nav;
		/* add 'divider' for a nav divider */
$data['split'] = Bool - Whether a split will be used
$data['dropup'] = Bool - If you want a dropup 

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