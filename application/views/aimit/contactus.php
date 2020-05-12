<!-- Start Banner -->
<div class="inner-banner contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-lg-9">
                <div class="content">
                    <h1>Contact Us</h1>
                    <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                </div>
            </div>
            <div class="col-sm-4 col-lg-3"> <a href="#" class="apply-online clearfix">
                    <div class="left clearfix"> <span class="icon"><img src="<?php echo base_url("public/"); ?>images/apply-online-sm-ico.png" class="img-responsive" alt=""></span> <span class="txt">Apply Online</span> </div>
                    <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                </a></div>
        </div>
    </div>
</div>
<!-- End Banner --> 

<!-- Start Contact Us -->
<section class="form-wrapper padding-lg">
    <div class="container">
        <div id="successmessage"></div><br><br>
        <form name="contact-form" id="ContactForm">
            <div class="row input-row">
                <div class="col-sm-6">
                    <input name="first_name" type="text" placeholder="First Name">
                </div>
                <div class="col-sm-6">
                    <input name="last_name" type="text" placeholder="Last Name">
                </div>
            </div>
            <div class="row input-row">
                <div class="col-sm-6">
                    <input name="cus_email" type="email" placeholder="Email">
                </div>
                <div class="col-sm-6">
                    <input name="phone_number" type="text" placeholder="Phone Number">
                </div>
            </div>
            <div class="row input-row">
                <div class="col-sm-6">
                    <input name="addrs" type="text" placeholder="Address">
                </div>
                <div class="col-sm-6">
                    <input name="mesg" type="text" cols="66"  placeholder="Your Message">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button  type="submit" class="btn">Send <span class="icon-more-icon"></span></button>
                    <div class="msg"></div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- end Contact Us --> 

<!-- Start Google Map -->
<section class="google-map">
    <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d899.5363986476721!2d85.15349872917136!3d25.60007780843317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f2a786aaaaaaab%3A0x1b5297f720162b4!2sAdidas!5e0!3m2!1sen!2sin!4v1555389454846!5m2!1sen!2sin" style="border:none;"></iframe></div>
    <div class="container">
        <div class="contact-detail">
            <div class="address">
                <div class="inner">
                    <h3>AIMIT</h3>
                    <p>Asian Institute of Management & Information Technology</p>
                </div>
                <div class="inner">
                    <h3>7480993595</h3>
                    <h3>9801227611</h3>
                </div>
                <div class="inner"> <a href="#">info@aim-it.co.in</a> </div>
            </div>
            <div class="contact-bottom">
                <ul class="follow-us clearfix">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Google Map --> 

<!-- Start Have Questions -->
<section class="our-impotance have-question padding-lg">
    <div class="container">
        <h2>Still have questions?</h2>
        <ul class="row">
            <li class="col-sm-4 equal-hight">
                <div class="inner"> <img src="<?php echo base_url("public/"); ?>images/help-center-ico.jpg" alt="Malleable Study Time">
                    <h3>Help Center</h3>
                    <p>Study material available online 24/7. Study in your free time, no time management issues, perfect balance between work and study time.</p>
                </div>
            </li>
            <li class="col-sm-4 equal-hight">
                <div class="inner"> <img src="<?php echo base_url("public/"); ?>images/faq-ico.jpg" alt="Placement Assistance">
                    <h3>Faq’s</h3>
                    <p>Edumart University Online has access to all of Edumart Group’s placement resources and alumni network, through which thousands of job opportunities are generated.</p>
                </div>
            </li>
            <li class="col-sm-4 equal-hight">
                <div class="inner"> <img src="<?php echo base_url("public/"); ?>images/document-ico.jpg" alt="Easy To Access">
                    <h3>Technical Documents</h3>
                    <p>There is easy accessibility to online help in terms of online teachers and online forums. Teachers can be contacted with the help of video chats and e-mails.</p>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- End Have Questions --> 
<script>

    $(function () {
        $("#ContactForm").submit(function (event) {
//            if ($(this).valid()) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('college/sendMessage'); ?>",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#ContactForm")[0].reset();

                        var obj = JSON.parse(response);
                        var msg = "";
                        var msg_type = "";
                        if (obj.st == 1) {
                            msg_type = '<div class="alert alert-success alert-dismissable">';
                            msg = "Thank You for your message! We will contact you soon.";
                        } else if (obj.st == 0) {
                            msg_type = '<div class="alert alert-danger alert-dismissable">';
                            msg = "Oops Sorry! Something wrong happen. Please try again";
                        }

                        var successmsg = '<div class="box-body">';
                        successmsg += msg_type;
                        successmsg += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                        successmsg += msg;
                        successmsg += '</div>';
                        successmsg += '</div>';
                        $('#successmessage').html(successmsg);
                    }
                });
//            }
        });
    });

</script>

