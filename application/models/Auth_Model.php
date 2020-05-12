<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {

    public function ProcessAuthentication($user,$password) {
        $result = $this->db->get_where('tbl_user', array('email' => $user));
        if ($result->num_rows() > 0) {//step 1
            $row = $result->row();
            if ($row->locked == 1) {
//                1 = locked and 0 = unlocked
                $this->session->set_flashdata('msg', 'Account is locked. Contact system administrator.');
                redirect('login');
            }
            if ($row->attemps < 4) {//step 2
                if ($row->password == md5($password)) {//step 3
                    date_default_timezone_set("Asia/Kolkata");
                    $last_login = date('Y-m-d h:i:s a');
                    $this->db->query("update tbl_user set attemps=0 where email='" . $user . "'"); // step 4
                    $this->db->query("update tbl_user set last_login = '$last_login'  where email='" . $user . "'");
                    $session = array(
                        'name' => $row->first_name . ' ' . $row->last_name,
                        'uid' => $row->id,
                        'email' => $row->email,
                        'utype' => $row->utype,
                        'last_login' => $row->last_login,
                        'ipadrs' => $row->ip_address,
                        'user_location' => $row->ip_address,
                    );
                    $this->session->set_userdata('logged_in', $session);
                    redirect('dashboard');
                } else { //step 5
                    $this->db->query("update tbl_user set attemps=(attemps+1) where email='" . $user . "'");
                    $m = 'Invalid user name / password combination for ' . $user . '. You have only two attemps more.';
                    if ($row->attemps == 1) {
                        $m = 'Invalid user name / password combination for ' . $user . '. You have only one attemps more.';
                    } elseif ($row->attemps == 2) {
                        $m = 'Invalid user name / password combination for ' . $user . '. Account locked, please contact system administrator.';
                        $this->db->query("update tbl_user set locked=1 where email='" . $user . "'"); // step 4
                    }
                    $this->session->set_flashdata('msg', $m);
                    redirect('login');
                }
            } else { // step 7
                $this->session->set_flashdata('msg', 'Invalid user name / password combination for ' . $user . '. Account locked, please contact system administrator.');
                redirect('login');
            }
        } else { // step 6
            $this->session->set_flashdata('msg', 'Invalid user name / password combination for ' . $user);
            redirect('login');
        }
    }

}
