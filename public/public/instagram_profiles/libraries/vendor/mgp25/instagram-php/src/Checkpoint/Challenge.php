<?php

namespace InstagramAPI\Checkpoint;

use InstagramAPI\Response;

class Challenge
{   
    protected $_parent;

    public function __construct($parent){
        $this->_parent = $parent;
    } 

    public function send_security_code(
        $apiPath, 
        $choice
    ) {
        if (!is_string($apiPath) || !$apiPath) {
            throw new \InvalidArgumentException('You must provide a valid api path to send_security_code().');
        }

        $apiPath = ltrim($apiPath, "/");
        $response = $this->_parent->request($apiPath)
            ->setNeedsAuth(false)
            ->addPost('choice', $choice)
            ->getDecodedResponse(true);   

        if(is_array($response)){
            $response = json_decode( json_encode($response) );
        }

        return $response;
    }

    public function resend_security_code(
        $username,
        $apiPath, 
        $choice
    ) {
        if (!is_string($apiPath) || !$apiPath) {
            throw new \InvalidArgumentException('You must provide a valid api path to resend_security_code().');
        }

        preg_match("/^\/challenge\/([0-9]+)\/([A-Za-z0-9]+)(\/)?/", $apiPath, $matches);

        if(!isset($matches[1])){
            $apiPath = ltrim($apiPath, "/");
            $response = $this->_parent->request($apiPath)
                ->setNeedsAuth(false)
                ->getDecodedResponse(true);   

            $CI = &get_instance();
            $CI->db->delete("sp_instagram_sessions", [ "username" => $username ]);

            if(isset($response['step_name']) && $response['step_name'] == "change_password"){
                throw new \InvalidArgumentException('Instagram requires you to change your password.');
            }

            throw new \InvalidArgumentException('There is a problem with your account please try again later');
        }
        
        $apiResendPath = "challenge/replay/" . $matches[1] . "/" . $matches[2] . "/";

        $this->_parent->_setUserWithoutPassword($username);

        $response = $this->_parent->request($apiResendPath)
            ->setNeedsAuth(false)
            ->addPost('choice', $choice)
            ->getDecodedResponse(true);

        if(is_array($response)){
            $response = json_decode( json_encode($response) );
        }

        return $response;
    }

    public function confirm_security_code(
        $username, 
        $password,
        $apiPath, 
        $securityCode, 
        $appRefreshInterval = 1800
    ) {
        if (empty($username) || empty($password)) {
            throw new \InvalidArgumentException('You must provide a username and password to confirm_security_code().');
        }

        if (empty($apiPath)) {
            throw new \InvalidArgumentException('You must provide a api path and security code to confirm_security_code().');
        }

        $securityCode = preg_replace('/\s+/', '', $securityCode);

        $this->_parent->_setUser($username, $password);
        $this->_parent->_sendPreLoginFlow();

        $apiPath = ltrim($apiPath, "/");

        $response = $this->_parent->request($apiPath)
            ->setNeedsAuth(false)
            ->addPost('security_code', $securityCode)
            ->getResponse(new Response\LoginResponse());   

        /*if(!$response->getLoggedInUser()){

            $response = $this->_parent->request($apiPath)
                ->setNeedsAuth(false)
                ->getDecodedResponse(true);

            $CI = &get_instance();
            $CI->db->delete("sp_instagram_sessions", [ "username" => $username ]);

            throw new \InvalidArgumentException(__("There is a problem with your account please try again later"));
        }*/

        $this->_parent->_updateLoginState($response);
        $this->_parent->_sendLoginFlow(true, $appRefreshInterval);

        return $response;

    }

}