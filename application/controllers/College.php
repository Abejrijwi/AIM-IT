<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class College extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data['flash_msg'] = $this->db->query("select * from flash_message  where status = 1 order by id desc")->result();
    }

    public function index() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/template/header',$data);
        $this->load->view('aimit/home');
        $this->load->view('aimit/template/footer');
    }

    public function contactus() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/template/header',$data);
        $this->load->view('aimit/contactus');
        $this->load->view('aimit/template/footer');
    }

    public function about() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/template/header',$data);
        $this->load->view('aimit/about_us');
        $this->load->view('aimit/template/footer');
    }

    public function rules_polices() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/rules_policies',$data);
        $this->load->view('aimit/template/footer');
    }

    public function bca() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/template/header',$data);
        $this->load->view('aimit/bca');
        $this->load->view('aimit/template/footer');
    }

    public function bba() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/template/header',$data);
        $this->load->view('aimit/bba');
        $this->load->view('aimit/template/footer');
    }

    public function bjmc() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/template/header',$data);
        $this->load->view('aimit/bjmc');
        $this->load->view('aimit/template/footer');
    }

    public function blis() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/template/header',$data);
        $this->load->view('aimit/blis');
        $this->load->view('aimit/template/footer');
    }

    public function admission_form() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/admission_form',$data);
    }

    public function sendMessage() {
        $msg = $this->input->post('mesg');
        $mobile = $this->input->post('phone_number');
        $visitorMailId = $this->input->post('cus_email');
        $name = $this->input->post('first_name') . $this->input->post('last_name');

        $contactArray = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'mobile' => $mobile,
            'emailid' => $visitorMailId,
            'message' => $msg,
        );
        if ($this->db->insert('contactus', $contactArray)) {
            $to_mail = 'kumaradityamanu@gmail.com';
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
            $headers .= 'From: aim-it.co.in <donotreply@aim-it.co.in>' . "\r\n";
            $subject = 'Website Visitor Enquiry Message';


            $emailcontent = "<head>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
    </head>

	<body style='font-family:Verdana;background:#f2f2f2;color:#606060;'>

		<style>
			h2 {
				color: #6534ff;
			}
			a {
				color: #FFFFFF;
				text-decoration: none;
			}
			p {
				line-height:1.5;
	            font-size: 14px;
			}
		</style>

		<table cellpadding='0' width='100%' cellspacing='0' border='0'>
			<tr>
				<td>
					<table cellpadding='0' cellspacing='0' border='0' align='center' width='100%' style='border-collapse:collapse;'>
						<tr>
							<td>

								<div>
									<table cellpadding='0' cellspacing='0' border='0' align='center'  style='width: 100%;max-width:600px;background:#FFFFFF;margin:0 auto;border-radius:5px;padding:50px 30px'>
										<tr>
											<td width='100%' colspan='3' align='center' style='padding-bottom:10px;'>
												<div>
                                                                                                <img src=" . base_url("public/images/aimlogo.png") . "/>
													<h2 > <img src=" . base_url("public/images/logoaimi.png") . "/></h2>
												</div>
											</td>
										</tr>
										<tr>
											<td width='100'>&nbsp;</td>
											
											
											<td width='100'>&nbsp;</td>
										</tr>
										<tr>
											<td width='100'>&nbsp;</td>
											<td align='center' style='padding-top:25px;'>
												<table cellpadding='0' cellspacing='0' border='0' align='left' width='100%' height='50'>
													<tr>
														<td bgcolor='#7448ff' align='center' style='border-radius:4px;padding:25px;color:#FFFFFF'  width='100%'>
															<div>
                                                                                                                        Thank for your interest in AIMIT. We will contact you soon.
															</div>

														</td>
													</tr>
												</table>
											</td>
											<td width='100'>&nbsp;</td>
										</tr>
									</table>
								</div>

								<div style='margin-top:30px;text-align:center;color:#b3b3b3'>
	                                <p style='font-size:12px;'>src: http://aim-it.co.in/</p>
	                            </div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>";

            $Mailsending = @mail($to_mail, $subject, $emailcontent, $headers);

            if ($Mailsending) {
                echo json_encode(array('st' => 1));
            } else {
                echo json_encode(array('st' => 0));
            }
        }
    }

    public function questions() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $data['course'] = $this->db->get('course')->result();
        $data['questions'] = $this->db->query("select course.Name,questions.* from course,questions where course.id = questions.course_id order by questions.id")->result();
        $this->load->view('aimit/template/header', $data);
        $this->load->view('aimit/questions');
        $this->load->view('aimit/template/footer');
    }

    public function resuts() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/template/header',$data);
        $this->load->view('aimit/result');
        $this->load->view('aimit/template/footer');
    }
    public function registration() {
        $data['msg_flash'] = $this->data['flash_msg'];
        $this->load->view('aimit/template/header',$data);
        $this->load->view('aimit/admission_form');
        $this->load->view('aimit/template/footer');
    }
    public function countDownload($id){
        echo $id;
    }

}
