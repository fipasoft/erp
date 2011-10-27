<div>
<?php echo CHtml::beginForm($this->createUrl('//rbac/assignment'), 'get') ?>
	<table style="width:70%">
		<tr>
			<th><?php echo CHtml::textField('s1', $getVars['s1'], array('size'=>'10', 'onChange'=>'this.form.submit()')) ?></th>
			<th><?php echo CHtml::textField('s2', $getVars['s2'], array('size'=>'10', 'onChange'=>'this.form.submit()')) ?></th>
			<th><?php echo CHtml::textField('s3', $getVars['s3'], array('size'=>'15', 'onChange'=>'this.form.submit()')) ?></th>
			<th><?php echo CHtml::textField('s4', $getVars['s4'], array('size'=>'10', 'onChange'=>'this.form.submit()')) ?></th>
		</tr>
<?php 
$lastUser='';
$style='style="border-top:1px solid #cdcdcd"';
foreach($users as $user): 
	if($user[$colUserid] == $lastUser) $style='';
?>
	    <tr>
	    	<td <?php echo $style ?> ><?php echo ($lastUser != $user[$colUserid] ? '<a href="'.$this->createUrl('//rbac/assignment/manage', array_merge(array('userid'=>$user[$colUserid]),$getVars)).'">'.CHtml::encode($user[$colUsername]).'</a>' : '&nbsp;')?></td>
	    	<td <?php echo $style ?> ><?php echo '<a href="'.$this->createUrl('//rbac/assignment/edit', array_merge(array('userid'=>$user[$colUserid]),$getVars)).'">'.CHtml::encode($user['itemname']).'</a>' ?></td>
	    	<td <?php echo $style ?> nowrap ><?php echo nl2br(CHtml::encode($user['bizrule'])) ?></td>
	    	<td <?php echo $style ?> ><?php echo CHtml::encode($user['data']) ?></td>
	    </tr>
<?php
	$lastUser=$user[$colUserid];
	$style='style="border-top:1px solid #cdcdcd"';
endforeach;
?>
	</table>
<?php echo CHtml::endForm() ?>
</div>