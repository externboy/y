<?php  
//使用小物件生成form元素  
$form=$this->beginWidget('CActiveForm');  
?>  
  
<!--用户名-->  
<?php echo $form->labelEx($model,'account_name');?>  
<?php echo $form->textField($model,'account_name');?>  
<?php echo $form->error($model,'account_name');?>  
<br>  
  
<!--密码-->  
<?php echo $form->labelEx($model,'password');?>  
<?php echo $form->passwordField($model,'password');?>  
<?php echo $form->error($model,'password');?>  
<br>  
  
<!--确认密码-->  
<?php echo $form->labelEx($model,'password2');?>  
<?php echo $form->passwordField($model,'password2');?>  
<?php echo $form->error($model,'password2');?>  
<br>  
   
<!--邮箱-->  
<?php echo $form->labelEx($model,'email');?>  
<?php echo $form->textField($model,'email');?>  
<?php echo $form->error($model,'email');?>  
<br>  
  
<?php $this->widget('CCaptcha'); ?>    
<?php echo $form->textField($model,'verifyCode'); ?>
<div class="hint">请输入上图看到的验证码。<br/>字母不区分大小写。</div>    
<?php echo $form->textField($model,'verifyCode');?>  
<?php echo $form->error($model,'verifyCode');?>   
<br />   
<!--提交-->  
<?php echo CHtml::submitButton('提交');?>  
<?php  
$this->endWidget();  
?>