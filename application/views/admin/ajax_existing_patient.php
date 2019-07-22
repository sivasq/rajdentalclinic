<?php foreach ($patient_info as $p_info) { ?>
    <tr>
        <td><?php echo $p_info->p_id ?></td>
        <td><?php echo $p_info->p_name ?></td>
        <td><?php echo $p_info->p_phone ?></td>
        <td>
            <a href="<?php echo base_url() . 'admin/patient_details/' . $p_info->p_id ?>"
               class="btn violet btn-info btn-icon icon-left">View Details</a></td>
        <td>
            <button class="btn btn-danger btn-icon icon-left"
                    onclick=archive('<?php echo $p_info->p_id ?>//');>Archive
            </button>
        </td>
    </tr>
<?php } ?>

<?php echo $this->ajax_pagination->create_links(); ?>
