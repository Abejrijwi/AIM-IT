<?php

require_once('Authcontroller.php');

class Dashboard extends Authcontroller {

    public function index() {
        $this->load->view('aimit/admin/template/header');
        $this->load->view('aimit/admin/dashboard');
        $this->load->view('aimit/admin/template/footer');
    }

    public function upload_questions() {
        $data['title'] = 'Upload Questions';
        $data['action'] = base_url() . 'dashboard/questions_uploaded';
        $data['course'] = $this->db->get('course')->result();
        $this->load->view('aimit/admin/template/header', $data);
        $this->load->view('aimit/admin/upload_questions');
        $this->load->view('aimit/admin/template/footer');
    }

    public function questions_uploaded() {
        $store = "questions/";
        if (!file_exists("public/" . $store)) {
            @mkdir("public/" . $store, 0777);
        }

//upload file

        $config['upload_path'] = './public/questions/';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = TRUE;

//        $upload_data = $this->upload->data();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('quesfile')) {
            $error = array('error' => $this->upload->display_errors());
//            echo json_encode(array('st' => 0, 'msg' => "", "upload_msg" => $error));
//            echo json_encode(array('st' => 2));
        } else {
            $upload_data = $this->upload->data();
            $arr_image = array('upload_data' => $this->upload->data());
            $filenm = $upload_data['file_name'];
        }
//insert into database

        $data = array(
            'course_id' => $this->input->post('course'),
            'file_name' => $filenm,
            'course_year' => $this->input->post('corceyr'),
            'course_part' => $this->input->post('crc_yr')
        );
        if ($this->db->insert('questions', $data)) {
            $this->session->set_flashdata('msg', 'File Uploaded Successfully');
        } else {
            $this->session->set_flashdata('msg', 'Something went wrong');
        }

//            } else {
//                $this->session->set_flashdata('msg', 'Please fill all the fields');
//                
//            }
        redirect('dashboard/upload_questions');
    }

    public function listQuestions() {
        $data['title'] = 'Questions List';
        $data['questions'] = $this->db->query("select course.Name,questions.* from course,questions where course.id = questions.course_id order by questions.id")->result();
        $this->load->view('aimit/admin/template/header', $data);
        $this->load->view('aimit/admin/questions_list');
        $this->load->view('aimit/admin/template/footer');
    }

    public function delete_questions($id) {
        $del = $this->db->query("delete from questions where id = $id");
        if ($del) {
            $this->session->set_flashdata('msg', 'Deleted Successfully');
        } else {
            $this->session->set_flashdata('msg', 'Something went wrong');
        }
        redirect('dashboard/listQuestions');
    }

    public function edit_questions($id) {
        $data['title'] = 'Edit Questions';
        $data['course'] = $this->db->get('course')->result();
        $data['action'] = base_url() . 'dashboard/update_questions';
        $data['fetch_data'] = $this->db->query("select course.Name,questions.* from course,questions where course.id = questions.course_id and  questions.id = $id")->row();
        $this->load->view('aimit/admin/template/header', $data);
        $this->load->view('aimit/admin/edit_questions');
        $this->load->view('aimit/admin/template/footer');
    }

    public function update_questions() {
        $qid = $this->input->post('qid');
        $data = array(
            'course_id' => $this->input->post('course'),
            'course_year' => $this->input->post('corceyr'),
            'course_part' => $this->input->post('crc_yr'),
            'file_type' => 'ques'
        );
        $this->db->where('id', $qid);
        $upd_ques = $this->db->update('questions', $data);

        if ($upd_ques) {
            $this->session->set_flashdata('msg', 'Updated Successfully');
        } else {
            $this->session->set_flashdata('msg', 'Something went wrong');
        }

 
        redirect('dashboard/listQuestions');
    }

    public function flash_message() {
        $data['title'] = 'Flash Message';
        $data['action'] = base_url() . 'dashboard/set_flash_message';
        $this->load->view('aimit/admin/template/header', $data);
        $this->load->view('aimit/admin/flash_message');
        $this->load->view('aimit/admin/template/footer');
    }

    public function set_flash_message() {
        $this->form_validation->set_rules('msg', 'Message', 'required|xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'message' => $this->input->post('msg')
            );
            if ($this->db->insert('flash_message', $data)) {
                $this->session->set_flashdata('msg', 'Message Set Successfully');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong');
            }
        } else {
            $this->session->set_flashdata('msg', 'Please write the message.');
        }
        redirect('dashboard/flash_message');
    }

    public function listflash_message() {
        $data['title'] = 'Flash Message List';
        $data['msgdata'] = $this->db->query("select * from flash_message order by id desc")->result();
        $this->load->view('aimit/admin/template/header', $data);
        $this->load->view('aimit/admin/list_flash_message');
        $this->load->view('aimit/admin/template/footer');
    }

    public function delete_flash_message($id) {
        $del = $this->db->query("delete from flash_message where id = $id");
        if ($del) {
            $this->session->set_flashdata('msg', 'Message Deleted Successfully');
        } else {
            $this->session->set_flashdata('msg', 'Something went wrong');
        }
        redirect('dashboard/listflash_message');
    }

    public function results() {
        $data['title'] = 'Results';
        $data['action'] = base_url() . 'dashboard/upload_result';
        $data['course'] = $this->db->get('course')->result();
        $this->load->view('aimit/admin/template/header', $data);
        $this->load->view('aimit/admin/upload_result');
        $this->load->view('aimit/admin/template/footer');
    }

    public function upload_result() {
        $store = "result/";
        if (!file_exists("public/" . $store)) {
            @mkdir("public/" . $store, 0777);
        }

//upload file

        $config['upload_path'] = './public/result/';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = TRUE;

//        $upload_data = $this->upload->data();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('quesfile')) {
            $error = array('error' => $this->upload->display_errors());
//            echo json_encode(array('st' => 0, 'msg' => "", "upload_msg" => $error));
//            echo json_encode(array('st' => 2));
        } else {
            $upload_data = $this->upload->data();
            $arr_image = array('upload_data' => $this->upload->data());
            $filenm = $upload_data['file_name'];
        }
//insert into database

        $data = array(
            'course_id' => $this->input->post('course'),
            'file_name' => $filenm,
            'course_year' => $this->input->post('corceyr'),
            'course_part' => $this->input->post('crc_yr'),
            'description' => $this->input->post('descrption'),
            'file_type' => 'result'
        );
        if ($this->db->insert('questions', $data)) {
            $this->session->set_flashdata('msg', 'Results Uploaded Successfully');
        } else {
            $this->session->set_flashdata('msg', 'Something went wrong');
        }

        redirect('dashboard/results');
    }

}
