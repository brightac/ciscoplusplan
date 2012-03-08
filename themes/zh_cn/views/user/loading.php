<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/step0.png" /></br>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-loading-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row" id="email" style="display:block">
		<h2>请输入您的邮箱地址：</h2>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo CHtml::submitButton('Verify'); ?>
		<?php echo $message['email']; ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'是否已有邀请码？'); ?>
		<?php echo $form->radioButtonList($model,'has_code',$model->getHasCodeOptions(),array('onclick'=>'showCode();','separator'=>'','template'=>'<li style="list-style: none outside none;float:left;width:100px;">{input} {label}</li>&nbsp;&nbsp;')); ?>
		<?php echo $message['has_code']; ?>
	</div>
<div style="clear:both"/>
<div class="row" id="code" style="display:block">
		<h2>请输入您的邀请码(格式XXX-XXX-XXX):</h2>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $message['code']; ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
<?php CHtml::ajaxLink('下一个', array('getQuote'),
	array('update' => '#quote-of-the-day'))?>
	<script type="text/javascript">

	function showCode(){
		if ( $("input[name=User[has_code]][value=0]").attr("checked")=="checked" )  {
			//$("#email").hide();
			$("#code").show();
		}else{
			$("#code").hide();
			$("#email").show();
		}

	}
</script>
</div><!-- form -->
