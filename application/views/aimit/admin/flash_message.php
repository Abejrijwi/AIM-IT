
<div class="layout-content">

    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib"><?php echo $title ?></span>
                <a href="<?php echo base_url('dashboard/listflash_message'); ?>"><i class="icon icon-list"></i></a>

            </h1>
            </br>
            <p class="title-bar-description">
                <?php
                if ($this->session->flashdata('msg')) {
                    ?>
                <div class="alert alert-info successmsg"><?php echo $this->session->flashdata('msg'); ?></div>                
                <div class="clearfix"></div>
    <?php
}
?>
            </p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="demo-form-wrapper">
                    <form class="form form-horizontal" action="<?php echo $action ?>" method="post" id="demo-inputmask" >
                        <!--<input type="hidden" name="<?php // echo $this->security->get_csrf_token_name();  ?>" value="<?php // echo $this->security->get_csrf_hash();  ?>" />-->


                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-1">Message</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="msg" value="" id="msg"  placeholder="Your Message" >

                                <span style="color:red;"><?php echo form_error('msg'); ?></span>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3" style="margin-left: 172px;">
                                <input class="btn btn-primary btn-block" name="submit" type="submit" value="Set Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".successmsg").delay(3200).slideUp(300);
    });

//     $(function () {
//        $("#demo-inputmask").submit(function (event) {
//            // if ($(this).valid()) {
//                event.preventDefault();
//                var formData = new FormData(this);
//                $.ajax({
//                    type: 'POST',
//                    url: "<?php echo $action ?>",
//                    data: formData,
//                    cache: false,
//                    contentType: false,
//                    processData: false,
//                    success: function (response) {
//                        $("#demo-inputmask")[0].reset();
//
//                        var obj = JSON.parse(response);
//                        var msg = "";
//                        var msg_type = "";
//                        if (obj.st == 1) {
//                            msg_type = '<div class="alert alert-success alert-dismissable">';
//                            msg = "File Uploaded Successfuly.";
//                        } else if (obj.st == 0) {
//                            msg_type = '<div class="alert alert-danger alert-dismissable">';
//                            msg = "Unable to upload.";
//                        }
//                        else if (obj.st == 2) {
//                            msg_type = '<div class="alert alert-danger alert-dismissable">';
//                            msg = "Problem in Uploading File.";
//                        }
//
//                        var successmsg = '<div class="box-body">';
//                        successmsg += msg_type;
//                        successmsg += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
//                        successmsg += '<h4>	<i class="icon fa fa-check"></i> Alert!</h4>';
//                        successmsg += msg;
//                        successmsg += '</div>';
//                        successmsg += '</div>';
//                        $(".successmsg").delay(3200).fadeOut(300);
//                        $('.successmsg').html(successmsg);
//                    }
//                });
//            // }
//        });
//    });
</script>
