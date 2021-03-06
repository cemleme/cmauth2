<?php

Form::macro('boxOpen', function(array $formOptions = [], $title = "", $color="info")
{
	if (!isset($formOptions['class'])) {
		$formOptions['class'] = "form-horizontal";
    }

    return "<div class='box box-$color'>
               <div class='box-header with-border'>
                 <h3 class='box-title'>$title</h3>
               </div><!-- /.box-header -->
               <!-- form start -->".
               Form::open($formOptions).
                 "<div class='box-body'>";

});

Form::macro('boxOnlyOpen', function($title = "", $color="info")
{

    return "<div class='box box-$color'>
               <div class='box-header with-border'>
                 <h3 class='box-title'>$title</h3>
               </div><!-- /.box-header -->
               <div class='box-body'>";

});

Form::macro('box', function(array $options = [], array $formOptions = [])
{
    if (!isset($options['color'])) {
      $options['color'] = "info";
    }
    if (!isset($options['title'])) {
      $options['title'] = "";
    }    
    if (!isset($options['url'])) {
      $options['url'] = "#";
    } 
    if (!isset($options['urlColor'])) {
      $options['urlColor'] = "success";
    }


    $html = "<div class='box box-".$options['color']."'>";

    if (!isset($options['noheader'])) {
      $html .= "<div class='box-header with-border'>
                 <h3 class='box-title'>".$options['title']."</h3>";
      if (!isset($options['urlAuth']) || Gate::allows($options['urlAuth'])) {             
        if (isset($options['urlText'])) {           
          $html .=   "<div class='pull-right'><a href='".$options['url']."' class='btn btn-".$options['urlColor']."'>".$options['urlText']."</a></div>";
        }
      }

      $html .= "</div><!-- /.box-header -->";
    }
    
    if (!empty($formOptions)) {
      
      if (!isset($formOptions['class'])) {
        $formOptions['class'] = "form-horizontal";
      }

      $html .= "<!-- form start -->".
              Form::open($formOptions);
    }

    $html .= "<div class='box-body'>";

    return $html;

});

Form::macro('boxOpenModel', function($model, array $formOptions = [], $title = "", $color="info")
{
	  if (!isset($formOptions['class'])) {
		  $formOptions['class'] = "form-horizontal";
    }

    return "<div class='box box-$color'>
               <div class='box-header with-border'>
                 <h3 class='box-title'>$title</h3>
               </div><!-- /.box-header -->
               <!-- form start -->".
               Form::model($model, $formOptions).
                 "<div class='box-body'>";

});

Form::macro('boxOnlyClose', function($color="info")
{
    return "  </div><!-- /.box-body -->
             </div><!-- /.box -->";

});

Form::macro('boxClose', function(array $options = [])
{
    if (!isset($options['color'])) {
      $options['color'] = "info";
    }

    $html = "</div><!-- /.box-body -->";

    if (isset($options['buttonText'])) {
      $html .= " <div class='box-footer'>
                   <button type='submit' class='btn btn-".$options['color']." pull-right'>".$options['buttonText']."</button>
                 </div><!-- /.box-footer -->
               </form>";
    }

    $html .= "</div><!-- /.box -->";

    return $html;
});

Form::macro('boxRow', function($label, $type = "text", $inputId = null, $placeholder = null)
{
    return "<div class='form-group'>
                <label for='$inputId' class='col-sm-2 control-label'>$label</label>
                <div class='col-sm-10'>
                  <input type='$type' class='form-control' name='$inputId' id='$inputId' placeholder='$placeholder'>
                </div>
            </div>";
});

Form::macro('boxText', function($label, $name, $value = null, $inputId = null, $placeholder = null)
{
    return "<div class='form-group'>
                <label for='$inputId' class='col-sm-2 control-label'>$label</label>
                <div class='col-sm-10'>".
                	Form::text($name, $value, array('class'=>'form-control', 'placeholder'=>$placeholder, 'id' => $inputId)).
                "</div>
            </div>";
});

Form::macro('boxCheck', function($label, $name, $value = null, $inputId = null, $placeholder = null)
{
    return "<div class='form-group'>
                <div class='col-sm-offset-2 col-sm-10'>
                  <div class='checkbox'>
                    <label>".
                      Form::checkbox($name, $value, true).
                    " $label</label>
                  </div>
                </div>
            </div>";
});

Form::macro('boxTextarea', function($label, $name, $value = null, $inputId = null, $placeholder = null)
{
    return "<div class='form-group'>
                <label for='$inputId' class='col-sm-2 control-label'>$label</label>
                <div class='col-sm-10'>".
                	Form::textarea($name, $value, array('class'=>'form-control', 'size' => '30x3', 'placeholder'=>$placeholder, 'id' => $inputId)).
                "</div>
            </div>";
});

Form::macro('boxDate', function($label, $name, $value = null, $inputId = null, $placeholder = null)
{
    return "<div class='form-group'>
                <label for='$inputId' class='col-sm-2 control-label'>$label</label>
                <div class='col-sm-10'>".
                	Form::text($name, $value, array('class'=>'form-control date-picker', 'placeholder'=>$placeholder, 'id' => $inputId)).
                "</div>
            </div>";

});
                 