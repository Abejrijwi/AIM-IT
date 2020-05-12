
<!-- Start Banner -->
<div class="inner-banner blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h1>Download Questions</h1>
                    <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner --> 

<!-- Start Privacy -->
<section class="privacy-wrapper padding-lg">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 padding-top">

                <div class="col-sm-3">
                    <select class="form-control">
                        <?php foreach ($course as $val) { ?>
                            <option value="<?php echo $val->id ?>"><?php echo $val->Name ?></option>

                        <?php } ?>

                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="corceyr" class="form-control"  id="corceyr"  placeholder="Enter Date" data-date-autoclose="true">
                </div>
                <div class="col-sm-3">
                    <select class="form-control">
                        <option vlaue="1">Part-I</option>
                        <option vlaue="2">Part-II</option>
                        <option vlaue="3">Part-III</option>

                    </select>
                </div>
<!--                <div class="col-sm-3">
                    <button class="form-control btn btn-info btn-sm ">Go</button>
                </div>-->

            </div>
        </div>
        <hr>

        <div class="row">

            <div class="col-sm-12">

                <table class="table table-responsive table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Part</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($questions as $val){?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $val->Name?></td>
                            <td><?php echo $val->course_year?></td>
                            <td><?php echo $val->course_part?></td>
                            <td><a style="color:red;"  href="<?php echo base_url('public/questions/').$val->file_name;?>"><i onclick="countDownload(<?php echo $val->id?>)" class="fa fa-file-pdf-o fa-2x"></i></a></td>
                        </tr>
                        <?php }?>
                    </tbody>

                </table>

            </div>

        </div>

    </div>
</section>
<!-- End Privacy --> 
<script>
    $('#corceyr').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    })
    
    function countDownload(id){
        window.open("<?php echo site_url('college/countDownload/'); ?>/"+ id );
//        $.ajax({
//            url: "<?php echo base_url('college/countDownload'); ?>"+'/'+id
//        });
    }
</script>