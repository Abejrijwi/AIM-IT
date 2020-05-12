
<div class="layout-content">

    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib"><?php echo $title ?></span>
                <a href="<?php echo base_url('dashboard/listQuestions'); ?>"><i class="icon icon-list"></i></a>

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
                    <form class="form form-horizontal" action="<?php echo $action ?>" method="post" id="demo-inputmask"  enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" value="<?php echo $fetch_data->id?>" name="qid"/>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-1">Course Name</label>
                            <div class="col-sm-9">

                                <select id="form-control-1" class="form-control" name="course">
<?php foreach ($course as $val) { ?>
                                        <option <?php if ($fetch_data->course_id == $val->id) {
        echo 'selected';
    } ?> value="<?php echo $val->id ?>"><?php echo $val->Name ?></option>
                                    <?php } ?>
                                </select>
                                <span style="color:red;"><?php echo form_error('course'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-1">Year</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="corceyr" value="<?php echo $fetch_data->course_year ?>" id="corceyr"  placeholder="Enter Date" data-date-autoclose="true">
                                <!--<input class="date-own form-control"  type="text">-->
                                <span style="color:red;"><?php echo form_error('corceyr'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-1">Course Year</label>
                            <div class="col-sm-9">
                                <select id="form-control-1" class="form-control" name="crc_yr">
                                    <option <?php if ($fetch_data->course_part == '1') {
                                        echo 'selected';
                                    } ?> value="1">Part-I</option>
                                    <option <?php if ($fetch_data->course_part == '2') {
                                        echo 'selected';
                                    } ?> value="2">Part-II</option>
                                    <option <?php if ($fetch_data->course_part == '3') {
                                        echo 'selected';
                                    } ?> value="3">Part-III</option>
                                </select>
                                <span style="color:red;"><?php echo form_error('crc_yr'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-1">File</label>
                            <div class="col-sm-9">
                              <a targert="__blank" href="<?php echo base_url("public/questions/") . $fetch_data->file_name; ?>"><span style="font-size: 30px;" class="icon icon-file-pdf-o"></span></a>

                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3" style="margin-left: 172px;">
                                <input class="btn btn-primary btn-block" name="submit" type="submit" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#corceyr').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    })

    $(document).ready(function () {
        $(".successmsg").delay(3200).slideUp(300);
    });

</script>
