<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goutte\Client;

class WebScrapController extends Controller
{
    
	
    public function webScrap(){
    	session_start();

    	$clientobj = new Client();

    	$webscrap = $clientobj->request("GET", "https://stackoverflow.com/?tab=week");

    	$_SESSION['count_c'] = 0;
    	$_SESSION['count_java'] = 0;
    	$_SESSION['count_python'] = 0;
    	$_SESSION['count_javascript'] = 0;
    	$_SESSION['count_php'] = 0;
    	

    	$webscrap->filter("a.post-tag")->each(function($node){
    		if($node->text() == 'c'){
    				$_SESSION['count_c'] = $_SESSION['count_c'] + 1;
    		}
    		if($node->text() == 'php'){
    				$_SESSION['count_php'] = $_SESSION['count_php'] + 1;
    		}
    		if($node->text() == 'java'){
    				$_SESSION['count_java'] = $_SESSION['count_java'] + 1;
    		}
    		if($node->text() == 'javascript'){
    				$_SESSION['count_javascript'] = $_SESSION['count_javascript'] + 1;
    		}
    		if($node->text() == 'python'){
    				$_SESSION['count_python'] = $_SESSION['count_python'] + 1;
    		}
    	});

    	$count_c 			= $_SESSION['count_c'];
    	$count_java 		= $_SESSION['count_java'];
    	$count_python 		= $_SESSION['count_python'];
    	$count_javascript 	= $_SESSION['count_javascript'];
    	$count_php 			= $_SESSION['count_php'];

    	$total = $count_c + $count_php + $count_javascript + $count_python+ $count_java;
    	$count_c = 42*$count_c/100;
    	$count_java = 42*$count_java/100;
    	$count_python = 42*$count_python/100;
    	$count_javascript = 42*$count_javascript/100;
    	$count_php = 42*$count_php/100;


    	//echo $count_c;

    	return view("graph",compact('count_c','count_java','count_python','count_javascript','count_php'));
    	
    }

}
