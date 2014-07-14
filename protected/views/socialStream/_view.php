<?php
/* @var $this SocialStreamController */
/* @var $data SocialStream */
?>
<tr id="socialstream-<?=$data->id; ?>">
    <td class="column-mini"><input type="checkbox" name="stream_id[]" value="<?=$data->id; ?>" ></td>
    <td class="column-title">
        <?php echo CHtml::encode($data->keyword); ?>
    </td>
    <td class="column-small">
        <span class="badge badge-info">0</span>
    </td>
    <td class="column-small">
        <?php if ($data->is_profile) { echo "Profile";
        } else if ($data->is_phrase) { echo "Exact Match";
        } else { echo "-"; } ?>
    </td>
    <td class="column-small">
        <?php if ($data->is_twitter) { ?><i class="icon-twitter"></i><?php } ?>
        <?php if ($data->is_facebook) { ?><i class="icon-facebook"></i><?php } ?>
        <?php if ($data->is_gplus) { ?><i class="icon-gplus"></i><?php } ?>
    </td>
    <td class="column-mini">
        <?php $btnType = ($data->status == 'active') ? 'btn-success' : 'btn-warning'; ?>
        <button class="stream-action btn btn-small <?=$btnType; ?>" type="button" data-type="socialstream" data-action="change-status" id="<?=$data->id; ?>" data-value="<?=$data->status; ?>" title="Click to Change Status"><?=ucwords(strtolower($data->status)); ?></button>
        <a class="stream-action btn btn-mini" href="javascript:void(0);" data-type="socialstream" id="<?=$data->id; ?>" data-value="<?=$data->keyword; ?>" data-action="delete" title="Delete search term <?=$data->keyword; ?>"><i class="icon-trash"></i></a>
    </td>
</tr>