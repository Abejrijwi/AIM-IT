<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib"><?php echo $title ?></span>
                <a href="<?php echo base_url('dashboard/upload_questions'); ?>"><i class="icon icon-plus-circle"></i></a>
            </h1>
            <br><br>

            <p class="title-bar-description">
                <?php
                if ($this->session->flashdata('msg')) {
                    ?>
                <div class="alert alert-info"><?php echo $this->session->flashdata('msg'); ?></div>                
                <div class="clearfix"></div>
                <?php
            }
            ?>
            </p>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #d9230f; color:#fff; font-weight: bold;"><?php echo $title ?></div>
                    <div class="panel-body panel-collapse table-flip-scroll">


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Part</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <?php if (!empty($questions)) { ?>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($questions as $val) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $val->Name ?></td>
                                            <td><?php echo $val->course_year ?></td>
                                            <td><?php echo $val->course_part ?></td>
                                            <td>
                                                <div class="btn-group dropdown">
                                                    <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" type="button">
                                                        <span class="icon icon-cog"></span>
                                                        Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">


                                                        <li>
                                                            <a href="<?php echo base_url("dashboard/delete_questions/") . $val->id; ?>">
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <span class="icon icon-trash"></span>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <span class="d-b">Delete</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="<?php echo base_url("dashboard/edit_questions/") . $val->id; ?>">
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <span class="icon icon-edit"></span>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <span class="d-b">Edit</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a targert="__blank" href="<?php echo base_url("public/questions/") . $val->file_name; ?>">
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <span class="icon icon-download"></span>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <span class="d-b">Download</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>



                                                    </ul>
                                                </div>
                                            </td>

                                        </tr>
                                <?php } ?>
                                </tbody>
<?php } ?>
                        </table>


                    </div>
                </div>
            </div>
        </div>






    </div>
</div>
<script>
    $(document).ready(function () {
        $(".successmsg").delay(3200).slideUp(300);
    });
</script>