<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('get_hash'))
{
    
    function get_hash($PlainPassword)
    {

    	$option=[
                'cost'=>5,// proses hash sebanyak: 2^5 = 32x
    	        ];
    	return password_hash($PlainPassword, PASSWORD_DEFAULT, $option);

   }
}

if(!function_exists('hash_verified'))
{
    
    function hash_verified($PlainPassword,$HashPassword)
    {

    	return password_verify($PlainPassword,$HashPassword) ? true : false;

   }
}

//== IDENTITY APPS ==//

if (!function_exists('get_title_name')){
	function get_title_name(){
		// return "Monitoring KYG";
		return "NMS-SMS";
	}
}

if (!function_exists('get_app_name')){
	function get_app_name(){
		// return "Monitoring KYG";
		return "PT. NEUTRON MITRA ABADI";
	}
}


if (!function_exists('get_company_name')){
	function get_company_name(){
		// return "PERUMNAS";
		return "PT. NEUTRON MITRA ABADI";
	}
}

if (!function_exists('get_koperasi_name')){
	function get_koperasi_name(){
		return "X";
	}
}
if (!function_exists('get_koperasi_address')){
	function get_koperasi_address(){
		return "Y";
	}
}
if (!function_exists('get_koperasi_phone')){
	function get_koperasi_phone(){
		return "021-123456789";
	}
}
if (!function_exists('get_koperasi_email')){
	function get_koperasi_email(){
		return "xyz@gmail.com";
	}
}


if (!function_exists('get_folder_template')){
	function get_folder_template(){
		return "asset/ace/";
	}
}



if (!function_exists('get_company_address1')){
	function get_company_address1(){
		return "Jalan D. I. Panjaitan";
	}
}
if (!function_exists('get_company_address2')){
	function get_company_address2(){
		return "Jakarta Timur";
	}
}
if (!function_exists('get_company_address3')){
	function get_company_address3(){
		return "JAKARTA";
	}
}
if (!function_exists('get_company_telp')){
	function get_company_telp(){
		return "021-8194807";
	}
}
if (!function_exists('get_company_fax')){
	function get_company_fax(){
		return "021-8194807";
	}
}
if (!function_exists('get_company_email')){
	function get_company_email(){
		return "pkbl@perumnas.co.id";
	}
}


if (!function_exists('get_header_report')){
	function get_header_report(){
		return "P";
	}
}

if (!function_exists('is_in_periode')){
	function is_in_periode($date, $min, $max){
		$sReturn = false;
		$counter = $min;
		
		for($i=1; $i<=31; $i++){
			
			if($counter>31){
				$counter=1;				
			}
			if($counter==$max){
				break;
			}
			if($counter==$date){
				$sReturn = true;
				break;
			}
			// echo "OK " . $counter . "<br>";
			$counter++;
		}
		
		return $sReturn;
	}
}

if (!function_exists('textboxlist')){
	function textboxlist(&$param){				
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");
		$options 			= $param["options"];

		
		$sReturn = '';
		$sReturn .= '<div class="'.$class_column.'" id="div_' . $name . '">';
			
		if($title!=""){
			$sReturn .= '<div class="form-group">';
			$sReturn .= '<label>' . $title . '</label>';
		}
		$sReturn .= '<input type="text" list="list' . $name . '" ' . $required . ' ' . $disabled . ' ' . $readonly . ' class="form-control input-sm android ' . $class_column . '" id="' . $name . '" name="' . $name . '" placeholder="' . $title . '" value="' . $value . '">';
		$sReturn .= '<datalist id="list' . $name . '">';
						
		foreach ($options as $index => $data) {
			$sReturn .= '<option value="' . $data . '">';
		}
		
		$sReturn .= '</datalist>';
		
		if($title!=""){
			$sReturn .= '</div>';
		}
		
		$sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
	}
}



//== OBJECT APPS ==//
if (!function_exists('combobox')){
	function combobox(&$param){				
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-xs-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");
		$options 			= $param["options"];

		$sReturn = '';
		$sReturn = '<div class="form-group">';
		if($title!=""){
			$sReturn .= '<label class="col-sm-2 control-label no-padding-right" for="form-field-1">' . $title . '</label>';			
		}
		$sReturn .= '<div class="' . $class_column . '">';			
		
		$sReturn .= '<select class="form-control chosen-select" style="width: 100%;" id="' . $name . '" name="' . $name . '" ' . $required . ' ' . $readonly . ' ' . $disabled . ' onchange="'.$onchange.'">';
						
		foreach ($options as $index => $data) {
			$sReturn .= '<option value="' . $index . '" ' . iif($value==$index, 'selected="selected"', '') . '>'.$data.'</option>';
		}
		
		$sReturn .= '</select>';
		
		$sReturn .= '</div>';					
		$sReturn .= '</div>';	
		
		
		// $sReturn = '';
		// $sReturn .= '<div class="'.$class_column.'" id="div_' . $name . '">';
			
		// if($title!=""){
			// $sReturn .= '<div class="form-group">';
			// $sReturn .= '<label>' . $title . '</label>';
		// }
		
		
		// if($title!=""){
			// $sReturn .= '</div>';
		// }
		
		// $sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
	}
}

if (!function_exists('combobox2')){
	function combobox2(&$param){				
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");
		$options 			= $param["options"];


		$sReturn = '';
		$sReturn = '<div class="form-group">';
		if($title!=""){
			$sReturn .= '<label class="col-sm-2 control-label no-padding-right" for="form-field-1">' . $title . '</label>';			
		}
		$sReturn .= '<div class="' . $class_column . '">';			
		
		$sReturn .= '<select class="form-control" id="' . $name . '" name="' . $name . '" ' . $required . ' ' . $readonly . ' ' . $disabled . ' onchange="'.$onchange.'">';
						
		foreach ($options as $index => $data) {
			$sReturn .= '<option value="' . $index . '" ' . iif($value==$index, 'selected="selected"', '') . '>'.$data.'</option>';
		}
		
		$sReturn .= '</select>';
		
		$sReturn .= '</div>';					
		$sReturn .= '</div>';
		
		
		
				
		
		$param = array();
		return $sReturn;
	}
}

if (!function_exists('radio')){
	function radio(&$param){						
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");
		$options 			= $param["options"];

		
		$sReturn = '';
		$sReturn .= '<div class="'.$class_column.'" id="div_' . $name . '">';
			
		if($title!=""){
			$sReturn .= '<div class="form-group">';
			$sReturn .= '<label>' . $title . '</label>';
		}
						
		foreach ($options as $index => $data) {
			$sReturn .= '<div class="radio">
							<label>
								<input name="' . $name . '" type="radio" class="ace input-lg ' . $name . '" value="' . $index . '" ' . iif($value==$index, 'checked="checked"', '') . '/>
								<span class="lbl"> ' . $data . '</span>
							</label>
						</div>';
		}
		
		if($title!=""){
			$sReturn .= '</div>';
		}
		
		$sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
	}
}

if (!function_exists('numericbox')){
	function numericbox(&$param){
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$class_object 	= iif(nvl($param["class_object"], "")!="", $param["class_object"], "");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");

		$sReturn = '';
		$sReturn = '<div class="form-group">';
		// if($title!=""){
		// 	$sReturn .= '<label class="col-sm-2 control-label no-padding-right" for="form-field-1">' . $title . '</label>';			
		// }
		$sReturn .= '<div class="' . $class_column . '">';			
		$sReturn .= '<input type="text" style="text-align:right;" step="any" ' . $required . ' ' . $disabled . ' ' . $readonly . ' class="form-control numericbox '. $class_object .'" id="' . $name . '" name="' . $name . '" placeholder="' . $title . '" value="' . $value . '">';
		$sReturn .= '</div>';					
		$sReturn .= '</div>';					

		
		$param = array();
		return $sReturn;
		
	}
}

if (!function_exists('textpassword')){
	function textpassword(&$param){
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");

		
		$sReturn = '';
		$sReturn .= '<div class="'.$class_column.'" id="div_' . $name . '">';
			
		if($title!=""){
			$sReturn .= '<div class="form-group">';
			$sReturn .= '<label>' . $title . '</label>';
		}
		
		$sReturn .= '<input type="password" ' . $required . ' ' . $readonly . ' class="form-control" id="' . $name . '" name="' . $name . '" placeholder="' . $title . '" value="' . $value . '">';
		
		if($title!=""){
			$sReturn .= '</div>';
		}
		
		$sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
	}
}


if (!function_exists('textarea')){
	function textarea(&$param){
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");
		
		$sReturn = '';
		$sReturn = '<div class="form-group">';
		// if($title!=""){
		// 	$sReturn .= '<label class="col-sm-2 control-label no-padding-right" for="form-field-1">' . $title . '</label>';			
		// }
		$sReturn .= '<div class="' . $class_column . '">';			
		$sReturn .= '<textarea ' . $required . ' ' . $disabled . ' ' . $readonly . ' class="form-control" id="' . $name . '" name="' . $name . '" placeholder="' . $title . '" minlength="6">' . $value . '</textarea>';
		$sReturn .= '</div>';					
		$sReturn .= '</div>';	
		
		
		$param = array();
		return $sReturn;
		
	}
}


if (!function_exists('checkbox')){
	function checkbox(&$param){
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$checked 			= iif(nvl($param["value"], "")=="1", "checked", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		// $value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");

		
		$sReturn = '';
		$sReturn .= '<div class="'.$class_column.'" id="div_' . $name . '">';
			
		if($title!=""){
			$sReturn .= '<div class="form-group">';
			// $sReturn .= '<label>' . $title . '</label><br>';
		}
		
		$sReturn .= '<input type="checkbox" class="flat"  name="' . $name . '" value="1" ' . $disabled . ' ' . $checked . ' ' . $readonly . ' > ' . $title . ' ';
		
		if($title!=""){
			$sReturn .= '</div>';
		}
		
		$sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
		
	}
}

if (!function_exists('textbox')){
	function textbox(&$param){
		
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$checked 			= iif(nvl($param["checked"], "")=="Y", "checked", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");	
		$class 				= iif(nvl($param["class"], "")!="", $param["class"], "");	
		$modulsupport 		= iif(nvl($param["modulsupport"], "")!="", $param["modulsupport"], "");	

		$sReturn = '';
		$sReturn = '<div class="form-group">';
		// if($title!=""){
		// 	$sReturn .= '<label class="col-sm-2 control-label no-padding-right" for="form-field-1">' . $title . '</label>';			
		// }
		$sReturn .= '<div class="' . $class_column . '">';			
		$sReturn .= '<input type="text" ' . $required . ' ' . $disabled . ' ' . $readonly . ' class="form-control input-sm android ' . $class . '" id="' . $name . '" name="' . $name . '" placeholder="' . $title . '" value="' . $value . '" minlength="1">';
		$sReturn .= '</div>';					
		$sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
	}
}

if (!function_exists('textbox2')){
	function textbox2(&$param){
		
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$checked 			= iif(nvl($param["checked"], "")=="Y", "checked", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");	
		$class 				= iif(nvl($param["class"], "")!="", $param["class"], "");	
		$modulsupport 		= iif(nvl($param["modulsupport"], "")!="", $param["modulsupport"], "");	

		$sReturn = '';
		$sReturn = '<div class="form-group">';
		//if($title!=""){
			//$sReturn .= '<label class="col-sm-2 control-label no-padding-right" for="form-field-1">' . $title . '</label>';			
		//}
		$sReturn .= '<div class="' . $class_column . '">';			
		$sReturn .= '<input type="text" ' . $required . ' ' . $disabled . ' ' . $readonly . ' class="form-control input-sm android ' . $class . '" id="' . $name . '" name="' . $name . '" placeholder="' . $title . '" value="' . $value . '">';
		$sReturn .= '</div>';					
		$sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
	}
}


if (!function_exists('textread')){
	function textread(&$param){
		
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$checked 			= iif(nvl($param["checked"], "")=="Y", "checked", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");	
		$class 				= iif(nvl($param["class"], "")!="", $param["class"], "");	

		
		$sReturn = '';
		$sReturn .= '<div class="'.$class_column.'" id="div_' . $name . '">';
			
		if($title!=""){			
			$sReturn .= '<b>' . $title . '</b> : ';
		}
		$sReturn .= '' . $value . '';
		$sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
	}
}

if (!function_exists('datepicker')){
	function datepicker(&$param){
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$checked 			= iif(nvl($param["checked"], "")=="Y", "checked", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");
		$date_format 	= iif(nvl($param["date_format"], "")!="", $param["date_format"], "dd M yyyy");

		
		$sReturn = '';
		$sReturn = '<div class="form-group">';
		if($title!=""){
			$sReturn .= '<label class="col-sm-2 control-label no-padding-right" for="form-field-1">' . $title . '</label>';			
		}
		$sReturn .= '<div class="' . $class_column . '">';			
		$sReturn .= '<input type="text" ' . $required . ' ' . $disabled . ' class="form-control date-picker" data-date-format="' . $date_format . '" id="' . $name . '" name="' . $name . '" placeholder="' . $title . '" value="' . $value . '">';
		$sReturn .= '</div>';					
		$sReturn .= '</div>';
		
		
		$param = array();
		return $sReturn;
	}
}

if (!function_exists('datetimepicker')){
	function datetimepicker(&$param){
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$checked 			= iif(nvl($param["checked"], "")=="Y", "checked", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");

		
		$sReturn = '';
		$sReturn .= '<div class="'.$class_column.'" id="div_' . $name . '">';
			
		if($title!=""){
			$sReturn .= '<div class="form-group">';
			$sReturn .= '<label>' . $title . '</label>';
		}
		
		$sReturn .= '<div class="input-group">';
		$sReturn .= '<div class="input-group-addon">';
		$sReturn .= '<i class="fa fa-calendar"></i>';
		$sReturn .= '</div>';
		$sReturn .= '<input type="text" ' . $required . ' ' . $disabled . ' class="form-control date-timepicker" name="' . $name . '" placeholder="' . $title . '" value="' . $value . '">';
		$sReturn .= '</div>';
					
		if($title!=""){
			$sReturn .= '</div>';
		}
		
		$sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
		
	}
}

if (!function_exists('timepicker')){
	function timepicker(&$param){
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$checked 			= iif(nvl($param["checked"], "")=="Y", "checked", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");
		$date_format 	= iif(nvl($param["date_format"], "")!="", $param["date_format"], "dd M yyyy");

		
		$sReturn = '';
		$sReturn .= '<div class="'.$class_column.'" id="div_' . $name . '">';
			
		if($title!=""){
			$sReturn .= '<div class="form-group">';
			$sReturn .= '<label>' . $title . '</label>';
		}
		
		$sReturn .= '<div class="input-group">';
		$sReturn .= '<div class="input-group-addon">';
		$sReturn .= '<i class="fa fa-clock-o"></i>';
		$sReturn .= '</div>';
		$sReturn .= '<input type="text" ' . $required . ' class="form-control timepicker" name="' . $name . '" placeholder="' . $title . '" value="' . $value . '">';
		$sReturn .= '</div>';
					
		if($title!=""){
			$sReturn .= '</div>';
		}
		
		$sReturn .= '</div>';					
		
		$param = array();
		return $sReturn;
	}
}

if (!function_exists('daterangepicker')){
	function daterangepicker(&$param){
		$disabled 			= iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		$required 			= iif(nvl($param["required"], "")=="Y", "required", "");
		$readonly 			= iif(nvl($param["readonly"], "")=="Y", "readonly", "");
		$checked 			= iif(nvl($param["checked"], "")=="Y", "checked", "");
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$placeholder		= iif(nvl($param["placeholder"], "")!="", $param["placeholder"], "");
		$name				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$class_column 	= iif(nvl($param["class_column"], "")!="", $param["class_column"], "col-lg-12");
		$value 				= iif(nvl($param["value"], "")!="", $param["value"], "");
		$onchange 		= iif(nvl($param["onchange"], "")!="", $param["onchange"], "");
		$date_format 	= iif(nvl($param["date_format"], "")!="", $param["date_format"], "dd M yyyy");
		$name_start 		= iif(nvl($param["name_start"], "")!="", $param["name_start"], "");
		$name_end 		= iif(nvl($param["name_end"], "")!="", $param["name_end"], "");
		$value_start 		= iif(nvl($param["value_start"], "")!="", $param["value_start"], "");
		$value_end 		= iif(nvl($param["value_end"], "")!="", $param["value_end"], "");
		
		
		$sReturn = '';
		$sReturn .= '<div class="'.$class_column.'" id="div_' . $name . '">';
			
		if($title!=""){
			$sReturn .= '<div class="form-group">';
			$sReturn .= '<label>' . $title . '</label>';
		}
		
		$sReturn .= '<div class="input-group">';
		$sReturn .= '<div class="input-group-addon">';
		$sReturn .= '<i class="fa fa-calendar"></i>';
		$sReturn .= '</div>';
		$sReturn .= '<div class="input-daterange input-group">';
		$sReturn .= '<input type="text" class="input-sm form-control" name="' . $name_start . '" value="' . $value_start . '"/>';
		$sReturn .= '<span class="input-group-addon">';
		$sReturn .= '<i class="fa fa-exchange"></i>';
		$sReturn .= '</span>';
		$sReturn .= '<input type="text" class="input-sm form-control" name="' . $name_end . '" value="' . $value_end . '"/>';
		$sReturn .= '</div>';
		$sReturn .= '</div>';
					
		if($title!=""){
			$sReturn .= '</div>';
		}
		
		$sReturn .= '</div>';					
		// debug($sReturn);
		$param = array();
		return $sReturn;
		
	}
}

if (!function_exists('texthidden')){
	function texthidden($name, $value){
		$sReturn = '<input type="hidden" name="'.$name.'" id="'.$name.'" value="'.$value.'">';
		return $sReturn;
	}
}


				
if (!function_exists('modulbox')){
	function modulbox(&$param){
		
		
		$title 				= iif(nvl($param["title"], "")!="", $param["title"], "");
		$name 				= iif(nvl($param["name"], "")!="", $param["name"], "");
		$tableheader		= iif(nvl($param["tableheader"], "")!="", $param["tableheader"], array());	
		$aValue				= iif(nvl($param["aValue"], "")!="", $param["aValue"], array());	
		$action				= iif(nvl($param["action"], "")!="", $param["action"],'');	
		$realValue			= iif(nvl($param["realValue"], "")!="", $param["realValue"],'');
		
		$sReturn = '';
		$sReturn .= '<!-- Modal -->
			<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog  modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$sReturn .= '<h4 class="modal-title" id="myModalLabel">'.$title.'</h4>';
		$sReturn .= '</div>
				  <div class="modal-body">
					<table class="table table-striped table-bordered table-hover modalpk">
							<thead>
								<tr>';
		
		foreach($tableheader as $thead){
			$sReturn .= '<th>'. $thead .'</th>';
		}
		
		$sReturn .= '</thead>
					<tbody>';
		
		$nodata = true;
		$i = 0;
		foreach ($aValue as $result){
			$nodata = false;
			$intersect = array_intersect_key($result, $tableheader);
			$sReturn .= '<tr class="clickable-row" data-href="url://" style="cursor: pointer; cursor: hand;" onclick="modalact'.$name.'([';
			
			$paramCount = 0;
			$xy=1;
			foreach($action as $text_value => $text_id){
				if($paramCount == $xy){
					$xy++;
					$sReturn .= ',';
				}
				$sReturn .= "'".$result[$text_value]."'";
				
				$paramCount++;
			}
			$sReturn .= "])\">";
			
			
			foreach ($intersect as $key => $val) {
			   $sReturn .= '<td>'. $val .'</td>';
			}
			$sReturn .= '</tr>';
			$i++;
		}
		if($nodata){
			$sReturn .= '<tr>
							<td class="center" colspan=4>
								No Data Found`s
							</td>
						</tr>';
		}
		
		$sReturn .= '</tbody>
							</table>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="modalclose'.$name.'">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<!-- END OF Modal -->';
		$sReturn .= texthidden($name, $realValue);
		$sReturn .= '
					<script>
						function modalact'. $name .'(arrayParam){';
		$m = 0;			
		foreach($action as $text_value){
			$sReturn .= "
				$('#$text_value').val(arrayParam[$m])
			";
			$m++;
		}

		$sReturn .= '
		$("#modalclose'.$name.'").click();
		}
					</script>
		';
		
		$param = array();
		return $sReturn;
	}
}
		



//== STRING FUNCTION ==//
if (!function_exists('instr')){
	function instr($my_string, $find){
		$pos = strpos($my_string, $find);

		if ($pos === false) {
			return false;
		} else {
			return true;
		}
	}
}

if (!function_exists('trim_text')){
    function trim_text($string, $length = 50){
        $string = strip_tags($string);
		if (strlen($string) > $length) {
			// truncate string
			$stringCut = substr($string, 0, $length);
			// make sure it ends in a word so assassinate doesn't become ass...
			// $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="/this/story">Read More</a>'; 
			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).' [...] '; 
		}
		return $string;                   
    }
}

if (!function_exists('html_encode')){
	function html_encode($s){
		return htmlentities($s);
	}
}

if (!function_exists('debug')){
	function debug($data) {
		ob_end_clean();
		if (is_array($data)) {
			echo "<pre>";
			var_dump($data);
		} else {
			echo html_encode($data);
		}
		exit;
	}
}

if (!function_exists('addzero')){
	function addzero($value, $length){
		return str_pad($value, $length, '0', STR_PAD_LEFT); 
	}
}


if (!function_exists('format_datetime')){
	function format_datetime($value){
		$sReturn = "";
		
		if(is_date($value)){
			$sReturn = date ("d M Y H:i:s",strtotime($value));
		}
		return $sReturn;
	}
}

// if (!function_exists('format_number')){
	// function format_number($value, $decimal = 0){
		// $sReturn = "";
		
		// if(is_numeric($value)){
			// $sReturn = number_format($value, $decimal, ",", ".");			
		// }
		
		// if($value < 0){
			// $sReturn = "(" . str_replace("-", "", $sReturn) . ")";
		// }
		// return $sReturn;
	// }
// }

if (!function_exists('format_number')){
	function format_number($value, $decimal = 0){
		$sReturn = "0";
		
		if(is_numeric($value)){
			$sReturn = number_format($value, $decimal);
		}
		
		if($value < 0){
			$sReturn = "(" . str_replace("-", "", $sReturn) . ")";
		}
		return $sReturn;
	}
}


if (!function_exists('format_date')){
	function format_date($value){
		$sReturn = "";			
		
		if(is_date($value)){
			$sReturn = date ("d M Y",strtotime($value));
		}
		return $sReturn;
	}
}

if (!function_exists('long_format_date')){
	function long_format_date($value){
		$sReturn = "";			
		
		if(is_date($value)){
			// $sReturn = date ("d F Y",strtotime($value)); // versi bhs inggris
			$sReturn = tgl_indo($value); // versi bhs indonesia
		}
		return $sReturn;
	}
}

if (!function_exists('is_date')){
	function is_date($value){
		if(validateDate($value, 'Y-m-d H:i:s')){
			return true;
		} elseif (validateDate($value, 'Y-m-d')) {
			return true;
		} else {
			return false;
		}
	}
}

if (!function_exists('validateDate')){
	function validateDate($date, $format = 'Y-m-d H:i:s'){
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
}

//untuk mengetahui bulan bulan
if ( ! function_exists('bulan')){
    function bulan($bln) {
        switch ($bln)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

if ( ! function_exists('get_month_int')){
    function get_month_int($bln){
        switch ($bln)
        {
            case "Jan":                
                return 1;
                break;
            case "Feb":                
                return 2;
                break;
            case "Mar":                
                return 3;
                break;
            case "Apr":                
                return 4;
                break;
            case "May":                
                return 5;
                break;
            case "Jun":                
                return 6;
                break;
            case "Jul":                
                return 7;
                break;
            case "Aug":                
                return 8;
                break;
            case "Sep":                
                return 9;
                break;
            case "Oct":                
                return 10;
                break;
            case "Nov":                
                return 11;
                break;
            case "Dec":                
                return 12;
                break;            
        }
    }
}

if ( ! function_exists('get_romawi')){
    function get_romawi($bln){
        switch ($bln)
        {
            case 1:return "I";break;
            case 2:return "II";break;
            case 3:return "III";break;
            case 4:return "IV";break;
            case 5:return "V";break;
            case 6:return "VI";break;
            case 7:return "VII";break;
            case 8:return "VIII";break;
            case 9:return "IX";break;
            case 10:return "X";break;
            case 11:return "XI";break;
            case 12:return "XII";break;
        }
    }
}

if ( ! function_exists('get_month_name'))
{
    function get_month_name($bln)
    {
        switch ($bln)
        {
            case 1:return "Jan";break;
            case 2:return "Feb";break;
            case 3:return "Mar";break;
            case 4:return "Apr";break;
            case 5:return "May";break;
            case 6:return "Jun";break;
            case 7:return "Jul";break;
            case 8:return "Aug";break;
            case 9:return "Sep";break;
            case 10:return "Oct";break;
            case 11:return "Nov";break;
            case 12:return "Dec";break;            
        }
    }
}

//format tanggal yyyy-mm-dd
if ( ! function_exists('tgl_indo'))
{
    function tgl_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
        $tanggal = (int)$pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun; //hasil akhir
    }
}

if (!function_exists('ListCount')){
	function ListCount($strvalue, $char) {
		$strCount = substr_count($strvalue, $char); 
		return $strCount + 1 ;
	}
}

if (!function_exists('ListItem')){
	function ListItem($strvalue, $char, $index) {
		$i=1;
		$strCount = ListCount($strvalue, $char); 
		$strvalue = $char . $strvalue . $char;
		$strreturn = explode($char, $strvalue);
		
		return $strreturn[$index];
	}
}

if (!function_exists('IIF')){
	function IIF($condition, $true, $false ) {
		return ($condition ? $true : $false);
	}
}

if (!function_exists('NVL')){
	function NVL(&$var, $default = "")
	{
		if(!isset($var)){ 
			$sReturn = $default;
			return $sReturn;
		} else {
			$sReturn = $var;
			return $sReturn;
		}
			
		if( $var == "" || $var == 0){ 
			$sReturn = $default;						
		} else {
			$sReturn = $var;
		}
		
		return $sReturn;
	}
}

if (!function_exists('add_date')){
	
	function add_date($givendate,$day=0,$mth=0,$yr=0) {
		$cd = strtotime($givendate);
		// $newdate = date('Y-m-d H:i:s', mktime(date('H',$cd),
		$newdate = date('Y-m-d', mktime(date('H',$cd),
		date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
		date('d',$cd)+$day, date('Y',$cd)+$yr));
		return $newdate;
	}
}

if (!function_exists('add_second')){
	function add_second($date, $second) {		
		$adate=$date;
		$duration=$second;
		$dateinsec=strtotime($adate);
		$newdate=$dateinsec+$duration;			
		return date('Y-m-d H:i:s',$newdate);
	}
}


if (!function_exists('minus_second')){
	function minus_second($date, $second) {		
		$adate=$date;
		$duration=$second;
		$dateinsec=strtotime($adate);
		$newdate=$dateinsec-$duration;			
		return date('Y-m-d H:i:s',$newdate);
	}
}


//== DB FUNCTION ==//
if (!function_exists('db_string')){
	function db_string($string){
		// $validate = '/^[a-z]+[a-z0-9]*[.-_]*$/i';
		
		// if(preg_match($validate , $string)==true){
			return "'" . $string . "'";			
		// } else {
			// echo "karakter not allowed!";
			// die();
		// }
	}
}

if (!function_exists('db_numeric')){
	function db_numeric($numeric){
		$numeric = str_replace(",","",$numeric);
		// $validate = '/^[a-z]+[a-z0-9]*[.-_]*$/i';
		
		// if(preg_match($validate , $string)==true){
			return $numeric;
		// } else {
			// echo "karakter not allowed!";
			// die();
		// }
	}
}


if (!function_exists('db_date')){
	function db_date($value){
		$sReturn = "";
		if($value==""){
			return "0000-00-00";
		}
		if($value=="Invalid Date"){
			return "0000-00-00";
		}
		// debug($value);
		// if(is_date($value) == false){
			// return "";
		// }
		$tempDate = explode(" ", $value);
		// var_dump($tempDate);
		if(strlen($tempDate[2])==2){
			$tempDate[2] = "20" . $tempDate[2];
		}
		$value = $tempDate[2] . "-" . addzero(get_month_int($tempDate[1]), 2) . "-" . addzero($tempDate[0], 2);
		// echo is_date($value);
		// echo $value;
		if(is_date($value)){
			$sReturn = date ("Y-m-d",strtotime($value));
		}
		return $sReturn;
	}
}

if (!function_exists('db_datetime')){
	function db_datetime($value){
		$sReturn = "";
		$tempDate = explode(" ", $value);
		// var_dump($tempDate);
		$value = $tempDate[2] . "-" . addzero(get_month_int($tempDate[1]), 2) . "-" . addzero($tempDate[0], 2) . " " . $tempDate[3];
		// echo is_date($value);
		// echo $value;
		// die();
		if(is_date($value)){
			$sReturn = date ("Y-m-d H:i:s",strtotime($value));
			// echo $value;
		// die();
		}
		return $sReturn;
	}
}


if (!function_exists('get_value')){
	function get_value($sql){
		// return $sql;
		// exit();
		// Get a reference to the controller object
		$CI = get_instance();

		// You may need to load the model if it hasn't been pre-loaded
		$CI->load->model('m_ajax');

		// Call a function of the model
		$data = $CI->m_ajax->get_data_by_sql2($sql);
				
		return $data;
	}
}

if (!function_exists('get_value2')){
	function get_value2($table, $column, $filter_column, $value_column){
		// return $sql;
		// exit();
		// Get a reference to the controller object
		$CI = get_instance();

		// You may need to load the model if it hasn't been pre-loaded
		$CI->load->model('m_ajax');

		// Call a function of the model
		$data = $CI->m_ajax->get_value($table, $column, $filter_column, $value_column);
				
		return $data;
	}
}

if (!function_exists('get_last_counter')){
	function get_last_counter($code){
		// return $code;
		// exit();
		$last_counter = 0;
		$sql = "SELECT last_counter FROM counter WHERE code='" . $code . "' ";
		$sql_insert = "INSERT counter (code, last_counter) VALUES ('" . $code . "', 1)";
		$sql_update = "UPDATE counter SET last_counter=last_counter+1  WHERE code='" . $code . "' ";
		
		$CI = get_instance();

		// You may need to load the model if it hasn't been pre-loaded
		$CI->load->model('m_ajax');

		// Call a function of the model
		$data = $CI->m_ajax->get_data_by_sql2($sql);
		
		if(count($data)>0){
			$last_counter = nvl($data[0]["last_counter"], 0);
		} else {
			$last_counter = 0;			
		}
		
		// echo $last_counter;
		// die();
		
		if($last_counter==""){
			$data = $CI->m_ajax->run_query_by_sql($sql_insert);
			$last_counter = 1;
		} else {
			$data = $CI->m_ajax->run_query_by_sql($sql_update);
			$last_counter = $last_counter+1;
		}
		
		return $last_counter;
	}

}
// if (!function_exists('input_pic')){
	// function input_pic($param){
		// $title = $param["title"];
		// $name = $param["name"];
// // debug($param["class_column"]);
		// $class_column = nvl($param["class_column"], "");
// // debug($class_column);
		// $disabled = iif(nvl($param["disabled"], "")=="Y", "disabled", "");
		// $required = iif(nvl($param["required"], "")=="Y", "required", "");
		// $value = $param["value"];
		
		// $sReturn = '
			// <div class="'.$class_column.'">
				// <div class="form-group">
					// <label for="' . $name . '">' . $title . ' :</label>
					// <br>
					// <a data-toggle="tooltip" data-placement="right" title="Click untuk mengganti gambar!">
					// <img src="' . iif($value != "", $value, base_url() . "asset/img/no-image.png") . '" data-fancybox-type="iframe"  href="' . base_url() . 'asset/filemanager/dialog.php?type=1&field_id=' . $name . '" alt="Gambar Lokasi" title="" id="prev_' . $name . '" class="prev_img fancy" /></a>					
					// <br>					
					// <a class="btn btn-xs btn-danger" id="clear" onclick="clear_img_'.$name.'()"><i class="fa fa-close"></i> Remove</a>
					// <input type="hidden" value="' . iif($value != "", $value, "") . '" class="form-control" id="' . $name . '" name="' . $name . '" placeholder="' . $title . '">
				// </div>
			// </div>
			
			// <script>
				// $(document).ready(function(){
					// $(".fancy").fancybox();
				// })
				
				// function responsive_filemanager_callback(field_id){								
					// var image = $("#"+field_id).val();
					// $("#prev_"+field_id).attr("src", image);
				// }
				
				// function clear_img_'.$name.'(){
					// var image = "' . base_url() . 'asset/img/no-image.png";
					// $("#prev_' . $name . '").attr("src", image);
					// $("#' . $name . '").val("");
				// }
			// </script>
		// ';
		
		// return $sReturn;
	// }
// }



//== OTHER CONTROL ==//
if (!function_exists('restricted_area')){
	function restricted_area($text = ""){
		if($text == ""){
			$text = "Cannot Access This Modul!";
		}
		echo $text . " <a href='javascript:history.back()'>Go Back</a>";
		exit();
	}
}


if (!function_exists('user_access_modul')){
	function user_access_modul($id_user, $id_modul, $access_field){
		$return = false;
		
		if($id_user==1){
			$return = true;						
		} else {
			$sql = "SELECT id ";
			$sql .= "FROM modul_access ";
			$sql .= "WHERE id_user=" . nvl($id_user, 0) . " ";
			$sql .= "AND id_modul=" . nvl($id_modul, 0) . " ";
			$sql .= "AND " . nvl($access_field, "0") . " = 1 ";
			// echo $sql;
			// die();
			$result = get_value($sql);
			
			if(count($result)>0){
				$return = true;			
			}
		}
				
		return $return;
	}
}

if (!function_exists('get_setting')){
	function get_setting($code){
				
		$sql = "SELECT nilai ";
		$sql .= "FROM setting ";
		$sql .= "WHERE code='" . nvl($code, 0) . "' ";
		// die();
		$result = get_value($sql);
		// debug($result[0]["nilai"]);
		
		return $result[0]["nilai"];
	}
}


if (!function_exists('draw_menu')){
	function draw_menu($url_menu, $favicon, $title_menu, $badge = ""){
		$return = "";
		$return .= "<li ";
		$return .= iif(instr(base_url(uri_string()), base_url($url_menu)), "class='active'", "");
		$return .= ">";
		$return .= "<a href='" . base_url($url_menu) . "'>";
		$return .= "<i class='menu-icon fa fa " . $favicon . "'>";
		$return .= "</i><span class='menu-text'> " . $title_menu . " " . $badge . " </span></a></li>";
					
		return $return;
	}
}

if (!function_exists('can_access')){
	function can_access($user_id, $jabatan){
		$return = false;
		$sql = "";
				
		if($user_id==1){
			$return = true;						
		} else {
			$sql = "SELECT id FROM web_user WHERE id=" . nvl($user_id, 0) . " AND id_jabatan IN (SELECT id FROM jabatan WHERE jabatan='" . $jabatan . "') ";
			// echo $sql;
			// die();
			$result = get_value($sql);
			
			if(count($result)>0){
				$return = true;			
			}
		}
				
		return $return;
	}
}

function db_tanggal($tanggal){
	if($tanggal==""){
		return "";
	}
	$tanggal = ListItem($tanggal, "/", 3) . "-" . addzero(ListItem($tanggal, "/", 2),2) . "-" . addzero(ListItem($tanggal, "/", 1),2);
	return $tanggal;
}

function db_tanggal_csv($tanggal){
	if($tanggal==""){
		return "";
	}
	$tanggal = ListItem($tanggal, "/", 2) . " " . get_month_name(ListItem($tanggal, "/", 1)) . " " . addzero(ListItem($tanggal, "/", 3),2);
	return $tanggal;
}

function db_harga($harga){
	if($harga==""){
		return "";
	}
	$harga = str_replace(",", "", $harga); 
	$harga = str_replace(".", "", $harga); 
	return $harga;
}


if (!function_exists('terbilang_inggris')){
	function terbilang_inggris($n) {
	  if ($n < 0) return 'minus ' . terbilang_inggris(-$n);
	  else if ($n < 10) {
		switch ($n) {
		  case 0: return 'zero';
		  case 1: return 'one';
		  case 2: return 'two';
		  case 3: return 'three';
		  case 4: return 'four';
		  case 5: return 'five';
		  case 6: return 'six';
		  case 7: return 'seven';
		  case 8: return 'eight';
		  case 9: return 'nine';
		}
	  }
	  else if ($n < 100) {
		$kepala = floor($n/10);
		$sisa = $n % 10;
		if ($kepala == 1) {
		  if ($sisa == 0) return 'ten';
		  else if ($sisa == 1) return 'eleven';
		  else if ($sisa == 2) return 'twelve';
		  else if ($sisa == 3) return 'thirteen';
		  else if ($sisa == 5) return 'fifteen';
		  else if ($sisa == 8) return 'eighteen';
		  else return terbilang_inggris($sisa) . 'teen';
		}
		else if ($kepala == 2) $hasil = 'twenty';
		else if ($kepala == 3) $hasil = 'thirty';
		else if ($kepala == 5) $hasil = 'fifty';
		else if ($kepala == 8) $hasil = 'eighty';
		else $hasil = terbilang_inggris($kepala) . 'ty';
	  }
	  else if ($n < 1000) {
		$kepala = floor($n/100);
		$sisa = $n % 100;
		$hasil = terbilang_inggris($kepala) . ' hundred';
	  }
	  else if ($n < 1000000) {
		$kepala = floor($n/1000);
		$sisa = $n % 1000;
		$hasil = terbilang_inggris($kepala) . ' thousand';
	  }
	  else if ($n < 1000000000) {
		$kepala = floor($n/1000000);
		$sisa = $n % 1000000;
		$hasil = terbilang_inggris($kepala) . ' million';
	  }
	  else return false;

	  if ($sisa > 0) $hasil .= ' ' . terbilang_inggris($sisa);
	  return $hasil;
	}
}

if (!function_exists('my_date_diff')){	
	function my_date_diff( $str_interval, $dt_menor, $dt_maior, $relative=false){

		if( is_string( $dt_menor)) $dt_menor = date_create( $dt_menor);
		if( is_string( $dt_maior)) $dt_maior = date_create( $dt_maior);

		$diff = date_diff( $dt_menor, $dt_maior, ! $relative);

		switch( $str_interval){
			case "y":
			$total = $diff->y + $diff->m / 12 + $diff->d / 365.25; break;
			case "m":
			$total= $diff->y * 12 + $diff->m + $diff->d/30 + $diff->h / 24;
			break;
			case "d":
			$total = $diff->y * 365.25 + $diff->m * 30 + $diff->d + $diff->h/24 + $diff->i / 60;
			break;
			case "h":
			$total = ($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h + $diff->i/60;
			break;
			case "i":
			$total = (($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i + $diff->s/60;
			break;
			case "s":
			$total = ((($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i)*60 + $diff->s;
			break;
		}
		if( $diff->invert)
			return -1 * $total;
		else    
			return $total;
	}
}

if (!function_exists('hitung_jumlah_bayar')){	
	function hitung_jumlah_bayar($jumlah_pinjaman, $tenor, $bunga, $bayar_ke, $jenis = "FLAT"){
		
		$i = 0;
		$sisa_pokok = 0;
		$total_bunga = 0;
		$total_bayar = 0;
		
		$angsuran_pokok = $jumlah_pinjaman / $tenor;
		
		if($jenis == "FLAT"){
			$total_bunga = ($jumlah_pinjaman * $bunga / 100);
			$total_bunga = $total_bunga / 12;		
			$total_bayar = $angsuran_pokok + $total_bunga;
		}
		
		if($jenis == "EFEKTIF"){
			$sisa_pokok = $jumlah_pinjaman;
			
			$total_bunga = ($sisa_pokok * $bunga / 100);
			$total_bunga = $total_bunga / 12;		
			$total_bayar = $angsuran_pokok + $total_bunga;
			
			for($i=1; $i<=$tenor; $i++){
				
				$sisa_pokok = $sisa_pokok - $angsuran_pokok;
				
				if($sisa_pokok <= 0){
					$total_bayar = 0;
					break;
				}
				
				if($i%12 == 0){
					$total_bunga = ($sisa_pokok * $bunga / 100);
					$total_bunga = $total_bunga / 12;		
					$total_bayar = $angsuran_pokok + $total_bunga;
				}
				
				
				if($i>=($bayar_ke-1)){
					break;
				}
			}
		}
		
		return $total_bayar;
	}
}

// if (!function_exists('terbilang')){	
	// function terbilang($satuan){
		// $huruf = array ("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		// if ($satuan < 12)
			// return " ".$huruf[$satuan];
		// elseif ($satuan < 20)
		 // return Terbilang($satuan - 10)." belas";
		// elseif ($satuan < 100)
		 // return Terbilang($satuan / 10)." puluh".
		 // Terbilang($satuan % 10);
		// elseif ($satuan < 200)
		 // return "seratus".Terbilang($satuan - 100);
		// elseif ($satuan < 1000)
		 // return Terbilang($satuan / 100)." ratus".
		 // Terbilang($satuan % 100);
		// elseif ($satuan < 2000)
		 // return "seribu".Terbilang($satuan - 1000); 
		// elseif ($satuan < 1000000)
		 // return Terbilang($satuan / 1000)." ribu".
		 // Terbilang($satuan % 1000); 
		// elseif ($satuan < 1000000000)
		 // return Terbilang($satuan / 1000000)." juta".
		 // Terbilang($satuan % 1000000); 
		// elseif ($satuan >= 1000000000)
		 // echo "Angka terlalu Besar";
	// }
// }

function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}


function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }
	
	$hasil = str_replace("  ", " ", $hasil);
    return $hasil;
}

function check_hak_akses($id_user, $path_name) {
	$return = 0;
	
	$sql = "SELECT a.* 
			FROM web_user_menu_list a 
			INNER JOIN web_user_menu b ON a.id=b.id_menu
			WHERE nama='" . nvl($path_name, 0) . "' 
			AND id_user='" . nvl($id_user, 0) . "' ";
	// echo $sql;
	// die();
	$result = get_value($sql);
	// debug($result);
	if(count($result)>0){
		$return = 1;
	}
	return $return;
}

function get_qty_real($id_product, $id_satuan, $qty){
	$return = 0;
	
	$sql = "SELECT a.* 
			FROM view_satuan_konversi a 
			WHERE id='" . nvl($id_product, 0) . "' 
			AND id_satuan_konv='" . nvl($id_satuan, 0) . "' ";
	// echo $sql;
	// die();
	$result = get_value($sql);
	//debug($result);
	if(count($result)>0){
		$return = 1 / $result[0]["satuan_isi"] * $qty;
	} else {
		$return = $qty;
	}
	return $return;
}

function get_qty_real_2($id_product, $id_satuan, $qty){
	$return = 0;
	
	$sql = "SELECT a.* 
			FROM view_satuan_konversi a 
			WHERE id='" . nvl($id_product, 0) . "' 
			AND id_satuan_konv='" . nvl($id_satuan, 0) . "' ";
	// echo $sql;
	// die();
	$result = get_value($sql);
	//debug($result);
	if(count($result)>0){
		$return = $qty;
	} else {
		$return = $qty;
	}
	return $return;
}
?>
