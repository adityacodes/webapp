<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TemplateController extends Controller
{

	public function template($name)
	{
		if ($name=='index')
			return view('template.index');

		elseif ($name=='mailbox-compose')
			return view('template.mailbox-compose');

		elseif ($name=='mailbox-email')
			return view('template.mailbox-email');

		elseif ($name=='mailbox-folder')
			return view('template.mailbox-folder');

		elseif ($name=='maps-google-maps-builder')
			return view('template.maps-google-maps-builder');

		elseif ($name=='maps-google-maps')
			return view('template.maps-google-maps');

		elseif ($name=='maps-vector')
			return view('template.maps-vector');
 	
	}

	public function templatelayouts($layout)
	{
			return view('template.layouts-'.$layout);
	}

	public function templateforms($formname)
	{
			return view('template.forms-'.$formname);

	}

	public function templatepages($page)
	{
		return view('template.pages-'.$page);
	}

	public function templatetables($table)
	{
		return view('template.tables-'.$table);
	}

	public function templateuielements($element)
	{
		return view('template.ui-elements-'.$element);
	}


}
