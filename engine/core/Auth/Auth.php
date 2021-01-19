<?php

namespace Engine\Core\Auth;
use Engine\Helper\Cookie;

class Auth implements AuthInterface
{
    protected $authorized = false;
    protected $hash_user;

    /**
     * @return bool
     */
    public function authorized()
    {
        return $this->authorized;
    }

    /**
     * @return mixed
     */
    public function hashUser()
    {
        return Cookie::get('auth_user');
    }

    /**
     * User authorization
     * @param $user
     */
    public function authorize($user)
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);
    }

    /**
     * User logout
     * @return void
     */
    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
    }

    /**
     * Generates password salt
     */
    public static function salt()
    {
        return (string) rand(10000000, 99999999);
    }

    /**
     * Generates hash
     * @param string $password
     * @param string $salt
     * @return string
     */
    public static function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password . $salt);
    }
}