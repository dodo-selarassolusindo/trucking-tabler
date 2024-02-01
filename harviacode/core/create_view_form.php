<?php

$string = "
<div class=\"col-12\">
    <form action=\"<?php echo \$action; ?>\" method=\"post\" class=\"card\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "
            <div class=\"form-group\">
                <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
            </div>";
    } else
    {
    $string .= "
            <div class=\"form-group\">
                <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
            </div>";
    }
}
$string .= "
            <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "
            <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
$string .= "
            <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";
$string .= "
        </form>
    </body>
</html>";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>
