<?php 
use Illuminate\Support\Str;

if(! function_exists('active'))
{
	
	function active($route)
	{
		if(Str::is($route,\Route::current()->getName())){
			return 'active';
		}
		return '';
	}	
}
