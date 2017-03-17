<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course, App\Module, App\Exam, App\Post;

class AdminController extends Controller
{
	public function __construct()
	{
		// Admin::where()
		// view()->share('admin', )
	}

    public function index()
    {
    	$variable = array(
			'coursecount' => Course::count(),
			'modulescount' => Module::count(),
			'examcount' => Exam::count(),
			'postcount' => Post::count(),
			'trashcount' => 0
		);

    	return view('admin.index')->with('gvariable', $variable);
    }

    
}
