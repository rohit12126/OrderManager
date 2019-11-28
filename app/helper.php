<?php 
use Route;
use Illuminate\Support\Str;

if(! function_exists('is_current'))
{
	
	function active($route)
	{
		if(Str::is($route,Route::current()->getName())){
			return 'active';
		}
		return '';
	}	
}
