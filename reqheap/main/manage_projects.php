<table border="0" width="100%">
    <tr valign="top">
        <td>
            <form method="post" name="projects" action="">
                <table border="1" cellpadding="2" cellspacing="2" class="content" width="100%">
                    <!-- title -->
                    <?php dbprojects_table_title(); ?>
                    <!-- records -->
                    <?php dbprojects_table_data(); ?>
                </table>
                <input type="button" onclick="submit();" value="<?php print $lng[9][7]?>">
            </form>	
        </td> 	 
    </tr>
</table>
