
<table border="0" width="100%">
    <tr valign="top">
        <td>
            <form method="post" name="f" action="">
	            <table border="1" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <!-- title -->
	                <?php dbuser_table_title(); ?>
                    <!-- records -->
                    <?php dbuser_table_data(); ?>
	            </table>
                <input type="hidden" name="inc" value="manage_users">
                <input type="hidden" name="order" value="">
            </form>	
        </td> 	 
    </tr>
</table>
