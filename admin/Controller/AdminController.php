<?php
namespace Admin\Controller;
use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller
{
    protected $auth;
    public $data = [];

    /**
     * Constructor
     */
    public function __construct($di)
    {
        parent::__construct($di);
        $this->auth = new Auth();

        if($this->auth->hashUser() == null)
        {
            header('Location: /admin/login/');
            exit;
        }
    }

    /**
     * Check Auth
     */
    public function checkAuthorization()
    {
        
    }

    public function logout()
    {
        $this->auth->unAuthorize();
        header( 'Location: /admin/login/');
        exit;
    }
}