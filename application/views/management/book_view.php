<?php
$url = base_url()."management/student";
?>
<div class="x_panel">
    <div class="x_title">
        <!-- Main title here -->
        <h2><?php print lang('student_info'); ?></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
       <?php
            print $row ? $row->first_name:"";
            print "<br>";
            print $row ? $row->last_name:"";
            print "<br>";
            print $row->has_skipair ? $this->lang->line('has_skipair'):$this->lang->line('has_no_skipair');
            print "<br>";
        ?>
            <div class="ln_solid"></div>
            <a href="<?php print $url.'/index/'; ?>"  class="btn btn-info btn-sm"><?php print lang('return'); ?></a>
            <a href="<?php print $url.'/edit/'.$row->id; ?>"  class="btn btn-success btn-sm"><?php print lang('edit'); ?></a>

      </div>
    </div>
</div>