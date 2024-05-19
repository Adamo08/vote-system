<?php 



class View 
{
    protected $view_file;
    protected $view_data;

    /**
     * defining view file and data was that comming 
     * @param string $view  => name of file 
     * @param array $data => data sent to the file 
     */
    public function __construct($view,$data=[])
    {
        $this->view_file = $view;
        $this->view_data = $data;
        $this->render();
    }




    private function render()
    {
        $file = VIEWS.$this->view_file.'.php';
        if(file_exists($file))
        {
            ob_start();
                extract($this->view_data);
                require_once($file);
            ob_end_flush();
        }
        else 
        {
            echo "this file : " .$this->view_file ." doesn't exist ";
        }
    }
}