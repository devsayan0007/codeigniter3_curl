<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profile_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function userEdit($userdata)
    {       
            // // echo "model";
            // print_r($userdata);
            // exit;
            if (!empty($userdata)) {
                // print_r($userdata);
                // exit;
                $str = http_build_query($userdata);
                $ch = curl_init();
                $url = "http://localhost/api/api/edit_profile/";
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                $output = curl_exec($ch);
                curl_close($ch);
                $result = json_decode($output,true);
                // print_r($result);
                // exit;
                if (!empty($result)) {
                    return $result;
                }else{
                    return false;
                }
            }else{
                return false;
            }
    }

}


?>