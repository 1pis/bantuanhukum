<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/***************************************************************************************
 *                       			MY_Controller.php
 ***************************************************************************************
 *      Author:     	Topidesta as Shabiki <m.desta.fadilah@hotmail.com>
 *      Website:    	http://www.topidesta.my.id/
 *
 *      File:          	MY_Controller.php
 *      Created:   		2022 - 13.49.22 WIB
 *      Copyright:  	(c) 2022 - desta
 *                  	DON'T BE A DICK PUBLIC LICENSE
 * 						Version 1, December 2022
 *						Copyright (C) 2009 Philip Sturgeon
 *		
 *		Original: 		https://github.com/Riyadhahmed/Modular-CI-ION-Auth-Grocery-AdminLte/blob/137529bf6c9ca97ca01bc638a159762f811c6222/application/core/MY_Controller.php
 *
 ****************************************************************************************/
 

define("TEMPLATE", 10);
define("NORMAL", 11);

class MY_Controller extends CI_Controller
{

    var $data;
    private $template_file; //single php file in the template folder
    private $template;      //the template folder
    private $output_mode;

    const TEMPLATE = 10;
    const NORMAL = 11;

    function __construct()
    {
        parent::__construct();
        $this->load->library("parser");
        $this->parser->set_delimiters("{{", "}}");
        $controller_name = get_class($this);
        $this->data = array();
        $this->template_file = "normal_view";
        $this->template = "templates";
        $this->output_mode = self::TEMPLATE;
        $this->output->cache(10);
        $this->diffthink = '';

        // $this->output->enable_profiler(TRUE);
    }

    function _remap($method)
    {
        $segments = $this->uri->rsegments;
        $offset = array_search($method, $segments);
        if (!$offset && $method == "index") {
            $offset = count($segments);
        }
        if (method_exists($this, $method)) {
            call_user_func_array(array($this, $method), array_slice($segments, $offset));
        } else {
            $this->show_404();
        }
    }

    /**
     *  Overloaded output function to channel generated output through a selected template
     *
     * @param type $output
     */
    final function _output($output)
    {

        switch ($this->output_mode) {
            //Use the template
            case self::TEMPLATE:
                $data['CONTENT'] = $output;
                if ($this->diffthink != '') {
                    $data['TEMPLATE'] = $this->getTemplatePathCustom($this->template_file);
                    $template = '../' . $data['TEMPLATE'];
                } else {
                    $data['TEMPLATE'] = $this->getTemplatePath(true) . "/";
                    $template = $this->getTemplatePath() . "/" . $this->template_file;
                }
                $data = array_merge($this->data, $data);  //supplied data is merged with common data
                $out = $this->parser->parse($template, $data, true);
                echo $out;
                break;

            case self::NORMAL:
            default:
                echo str_replace('{{TEMPLATE}}', $this->getTemplatePath(true) . "/", $output);
                break;
        }
    }

    /**
     *Set the template folder name inside views/templates/ for use as selected template
     *
     * @param type $template_name
     */
    protected function setTemplate($template_name)
    {
        $this->template = $template_name;
    }

    /**
     *Set the template file name inside views/templates/{selected template folder} for use as selected template
     *
     * @param type $template_file
     */
    protected function setTemplateFile($template_file)
    {
        $this->template_file = $template_file;

    }


    protected function setTemplateFileCustom($template)
    {
        $this->template_file = $template;
        $this->diffthink = 'customFlavour';

    }


    /**
     * get the generated template path excluding the template filename without trailing slash
     *
     * @param type $full_path
     * if the $full_path is set to true then return will be a path based on index.php file
     * else the return will be based on the current modules view folder
     *
     * @return string
     */
    function getTemplatePath($full_path = false)
    {

        $template_path = "/" . $this->template;

        if ($full_path) {
            $template_path = APPPATH . "/views/" . $template_path;
        }

        return $template_path;
    }


    public function getTemplatePathCustom($template)
    {
        $template_path = APPPATH . "/views/".$template."/custom/";

        return $template_path;
    }

    /**
     * Set the current output mode
     *
     * @param type $mode [NORMAL,TEMPLATE]
     *                   NORMAL -> The output will not be channeled through any template, raw output
     *                   TEMPLATE -> Output will be channeled through a selected template
     */
    protected function setOutputMode($mode)
    {
        $this->output_mode = $mode;
    }

    protected function show_404()
    {
        //$this->setTitle("404 Page not found");
        //$data = array();
        //$this->parser->parse("errors/error_404", $data);
        show_error("The page you are looking for is not available.");
    }

}