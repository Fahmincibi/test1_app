<?php
$url = base_url()."management/boat";
?>
<div class="x_panel">
    <div class="x_title">
        <!-- Main title here -->
        <h2><?php print lang('boat_listing'); ?></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <!-- Main content here -->

        <table id="my_table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th><?php print lang('name'); ?></th>
                  <th><?php print lang('price'); ?></th>
                  <th><?php print lang('color'); ?></th>
                  <th><?php print lang('last_student_change'); ?></th>
                  <th><?php print lang('students'); ?></th>
                  <th><?php print lang('books'); ?></th>
                  <th><?php print 'Skipair'; ?></th>
                  <th width="32%">Action</th>
                </tr>
              </thead>


              <tbody>
                <?php
                    if($rows)
                    {
                        foreach ($rows as $row) 
                        {
                            print "<tr>";
                            print "<td>$row->name</td>";
                            print "<td align='center'>$row->price</td>";
                            print "<td> <b style='color:".$row->color.";'>$row->color<b></td>";
                            print "<td>".date('Y-m-d', strtotime($row->last_student_change))."</td>";
                            print "<td align='center'> <b>$row->students_count<b></td>";
                            print "<td align='center'> <b>$row->books_count<b></td>";
                            print "<td align='center'> <b>$row->students_has_skipair_count<b></td>";
                            print "<td>";
                            print '<a href="'.$url.'/books/'.$row->id.'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> '.lang("books").' </a>';
                               print '<a href="'.$url.'/students/'.$row->id.'" class="btn btn-success btn-xs"><i class="fa fa-users"></i> '.lang("students").' </a>';
                            print '<a href="'.$url.'/edit/'.$row->id.'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> '.lang("edit").' </a>';
                            print '<a  href="#" data-target="#my_modal" data-toggle="modal" class="delete_action btn btn-danger btn-xs" data-id="'.$row->id.'"><i class="fa fa-trash-o"></i> '.lang("delete").' </a>';
                            print "</td>";
                            print "</tr>";
                        }
                    }
                    else
                    {
                        print "<tr>";
                        print "<td align='center' colspan='5'>";
                        print lang('no_data_found');
                        print "</td>";
                        print "</tr>";
                    }
                ?>
              </tbody>
            </table>
    </div>
</div>



<!-- /modals -->
<!-- jQuery -->
<script src="<?php print base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
//triggered when modal is about to be shown

$(function () {
        $(".delete_action").click(function () {
            var my_id_value = $(this).data('id');
            $(".delete_modal_body #hiddenValue").val(my_id_value);
        })
    });
</script>


<!-- <a href="#" data-target="#my_modal" data-toggle="modal" class="identifyingClass" data-id="my_id_value">Open Modal</a> -->

<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="my_modalLabel">
    <div class="modal-dialog modal-sm" role="dialog">
        <div class="modal-content">
            <form method='POST' action="<?php print $url.'/post_delete'; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php print lang('delete'); ?></h4>
                </div>
                <div class="delete_modal_body modal-body">
                    <?php print lang('delete_confirm_message'); ?>
                    <input type="hidden" name="id" id="hiddenValue" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php print lang('cancel'); ?></button>
                    <input type="submit" class="btn btn-danger" value="<?php print lang('delete'); ?>" >
                </div>
            </form>
        </div>
    </div>
</div>