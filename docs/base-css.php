<header class="jumbotron subhead" id="overview">
  <h1 class="padding-bottom-10" >Base CSS</h1>
  <p class="lead">The functions and examples below will explain on how you can use Codeigniter's built in Form Helper class you can easily create dynamic styled markup extremely fast.</p>
  <div class="subnav margin-bottom-20">
    <ul class="nav nav-pills">
      <li><a href="#forms">Forms</a></li>
      <li><a href="#buttons">Buttons</a></li>
      <li><a href="#icons">Icons by Glyphicons</a></li>
    </ul>
  </div>
</header>

<section id="forms" class="margin-bottom-25" >

	<div class="page-header">
    <h1>Forms <small>easliy create form elements</small></h1>
  </div>



	<?php
		//Create form open tag 
		$attr = array(
			'id'=>'form1',
			'class'=>'form-horizontal',
			'method'=>'post'
		);
		echo form_open('',$attr);
	?>	

			<h2>Control Group Function</h2>
			<p>This function generates the HTML .control-group markup used to create the <a href="http://twitter.github.com/bootstrap/base-css.html#forms">Twitter Bootstrap form elements</a>.</p>
			<p>Basic form can simply be made using the <a href="http://codeigniter.com/user_guide/helpers/form_helper.html">CI Form Helper</a> but if you need to create rich forms using the Controls Bootstrap styling this class will help in steamlining your code.</p>
<pre class="prettyprint linenums pre-scrollable">
function control_group($label_name = NULL, $element, $extra = NULL)
* @param   String  control group label 
* @param   Array  form elements (input, select, textarea, etc.) - using CI form_helper
* @param   Array  twitter bootstrap specific attributes that 
		  control state, appends, prepends, inline-block, help-block 
* @return  String  control group containing label, elements, etc.

/* $extra OPTIONS	*/
//HTML Element attributes
$extra['id'] String
$extra['class'] String
$extra['style'] String
//Twitter Bootstrap specific attributes
$extra['status'] String *errors, warnings, or success*
$extra['help-inline'] String 
$extra['help-block'] String 
$extra['uneditable'] Bool *makes form uneditable*
$extra['view'] Bool *removes border, input styling*

</pre>

	<h3 class="container margin-bottom-20" >Control Group Examples</h3>

	<div class="row margin-bottom-25">
		<div class="span6">
			<?php
				//
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo form_control_group('Error input', $element, array('status'=>'error'));
			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('validation'=>'error');
</pre>
			
			<?php	
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo form_control_group('Success input', $element, array('status'=>'success'));
			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('validation'=>'success');
</pre>
			
			<?php	
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo form_control_group('Warning input', $element, array('status'=>'warning'));
			?>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('validation'=>'warning');
</pre>

			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo form_control_group('Text input', array('Sample text'), array('class'=>'','view'=>TRUE, 'help-inline'=>''));

			?>
<pre class="prettyprint linenums pre-scrollable " >
$attr = array('view'=>TRUE);
//CSS
.view-input {
  display: inline-block;
  padding: 5px 4px 4px 4px;
  line-height: 18px;
  border: none;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
}
</pre>

		</div>
		<div class="span6">


			<?php
					
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo form_control_group('Text input', array('Sample text'), array('class'=>'','uneditable'=>TRUE));

			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('uneditable'=>TRUE);
</pre>

			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo form_control_group('Inline Help input', $element, array('class'=>'', 'help-inline'=>'inline help text goes here'));

			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('help-inline'=>'help inline text goes here');
</pre>


			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo form_control_group('Inline Help input', $element, array('class'=>'', 'help-block'=>'help block text goes here'));

			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('help-block'=>'help block text goes here');
</pre>		</div>
	</div>

			<h2>Form Action Function</h2>
<pre class="prettyprint linenums pre-scrollable">
function form_action($button, $extra = NULL)
* @param   Array  buttons
* @return  String  action_box with buttons.
</pre>

			<?php
				$data[] = array(
				    'name' => 'button',
				    'id' => 'button',
				    'class' => 'btn-success',
				    'value' => 'true',
				    'type' => 'button',
				    'content' => 'Button1'
				);
				$data[] = array(
				    'name' => 'button',
				    'id' => 'button',
				    'class' => 'btn-warning',
				    'value' => 'true',
				    'type' => 'button',
				    'content' => 'Button2'
				);
				$data[] = array(
				    'name' => 'button',
				    'id' => 'button',
				    'class' => 'btn-primary pull-right',
				    'value' => 'true',
				    'type' => 'button',
				    'content' => 'Button3 .pull-right'
				);
				$button = array(
					form_button($data[0]),
					form_button($data[1]),
					form_button($data[2])
				);
				echo form_action($button);
			?>




	<?php
		//Create form close tag 
		echo form_close();
	?>	



</section>

<section id="buttons" class="margin-bottom-25" >

	<div class="page-header">
    <h1>Buttons <small></small></h1>
  </div>
  <p>After extending the <abbr class="" rel="tooltip" data-original-title="Codeigniter" data-placement="top" >CI</abbr> Form Helper class it doesn't take much code to generate the twitter bootstrap styled buttons. </p>
	<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Button</th>
        <th>status</th>
        <th>Sample Code</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><button class="btn" href="#">Default</button></td>
        <td></td>
        <td>
<pre class="prettyprint linenums pre-scrollable margin-bottom-0">
form_button('default', 'Default')
</pre>
        </td>
      </tr>
      <tr>
        <td><button class="btn btn-primary" href="#">Primary</button></td>
        <td><code>primary</code></td>
        <td>
<pre class="prettyprint linenums pre-scrollable margin-bottom-0">
form_button('primary', 'Primary', array('status'=>'primary'))
</pre>
        </td>
      </tr>
      <tr>
        <td><button class="btn btn-info" href="#">Info</button></td>
        <td><code>info</code></td>
        <td>
<pre class="prettyprint linenums pre-scrollable margin-bottom-0">
form_button('info', 'Info', array('status'=>'info'))
</pre>
        </td>
      </tr>
      <tr>
        <td><button class="btn btn-success" href="#">Success</button></td>
        <td><code>success</code></td>
        <td>
<pre class="prettyprint linenums pre-scrollable margin-bottom-0">
form_button('success', 'Success', array('status'=>'success'))
</pre>
        </td>
      </tr>
      <tr>
        <td><button class="btn btn-warning" href="#">Warning</button></td>
        <td><code>warning</code></td>
        <td>
<pre class="prettyprint linenums pre-scrollable margin-bottom-0">
form_button('warning', 'Warning', array('status'=>'warning'))
</pre>
        </td>
      </tr>
      <tr>
        <td><button class="btn btn-danger" href="#">Danger</button></td>
        <td><code>danger</code></td>
        <td>
<pre class="prettyprint linenums pre-scrollable margin-bottom-0">
form_button('dange', 'Danger', array('status'=>'danger'))
</pre>
        </td>
      </tr>
      <tr>
        <td><button class="btn btn-inverse" href="#">Inverse</button></td>
        <td><code>inverse</code></td>
        <td>
<pre class="prettyprint linenums pre-scrollable margin-bottom-0">
form_button('inverse', 'Inverse', array('status'=>'inverse'))
</pre>
        </td>
      </tr>
    </tbody>
  </table>

</section>


<section id="icons" class="margin-bottom-25" >

	<div class="page-header">
    <h1>Icons <small>shorthand icon creation</small></h1>
  </div>

<pre class="prettyprint linenums pre-scrollable margin-bottom-0">
icon($data = '', $white = FALSE, $extra = NULL){ 
//HTML Element attributes
$data String/Array //the base icon string minus the word icon- or an array of all data.
$white Bool
$extra Array //html element/twitter bootstrap attributes

//Example (see result below)
echo icon('user', FALSE, array('style'=>'margin-right:50px;'));

</pre>

<br />
	<p>
		<?php
			echo icon('user', FALSE, array('style'=>'margin-right:50px;')) . ' ' . icon('ok') . ' ' . icon('signal') . ' ' . icon('map-marker');
		?>
	</p>


</section>
