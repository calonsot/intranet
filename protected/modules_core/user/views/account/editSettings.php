<script>
	function set_values()
	{
		var current_value = $('#AccountSettingsForm_tags').val();
		// Quita los espacios en blanco despues o antes de una coma
		var trim_spaces = current_value.replace(", ", ",").replace(" ,", ",");
		var split_value = trim_spaces.split(",");

		if (split_value.length > 0)
		{
			$.each(split_value, function( index, value ) {
				console.log(value);
				$(":input[value='"+ value +"']").prop('checked', true);	  
			});
		}
	}
	
	$(document).ready(function(){
		$( "#tabs" ).tabs();
		set_values();

		$("[id^='tag_']").change(function (){
			var is_checked = $(this).is(':checked');
			var current_value = $('#AccountSettingsForm_tags').val(); 
			
			if (is_checked)
			{
				$('#AccountSettingsForm_tags').val(current_value + ',' + $(this).val());
			} else {
				// Quita los espacios en blanco despues o antes de una coma
				var trim_spaces = current_value.replace(", ", ",").replace(" ,", ",");
				// Quita la cadena de los tags 
				var updated_value = trim_spaces.replace("," + $(this).val() + ",", ",").replace("," + $(this).val(), ",").replace($(this).val() + ",", ",").replace($(this).val(), ",");

				// Para poder quitar el ultimo caracter si es coma
				var last_char = updated_value.slice(-1);

				if(last_char == ",")
					$('#AccountSettingsForm_tags').val(updated_value.replace(/,$/g, ''));
				else
					$('#AccountSettingsForm_tags').val(updated_value);	
			}	
		});
	});
</script>
  

<div class="panel-heading">
    <?php echo Yii::t('UserModule.views_account_editSettings', '<strong>User</strong> settings'); ?>
</div>
<div class="panel-body">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php //echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'tags'); ?>
        <br>
        <?php echo Yii::t('UserModule.models_User', 'tags_description'); ?>
        <?php echo $form->textArea($model, 'tags', array('class' => 'form-control', 'rows' => '5')); ?>
        <?php echo $form->error($model, 'tags'); ?>
    </div>
    
	<h5><strong>Listas de etiquetas</strong></h5>
	
	<div id="tabs">
  		<ul>
  			<li><a href="#generales">Generales</a></li>
    		<li><a href="#musica-baile">Música / Baile</a></li>
    		<li><a href="#deportes">Deportes</a></li>
    		<li><a href="#instrumento">Instrumento</a></li>
    		<li><a href="#lectura">Lectura</a></li>
  		</ul>
  		
  		<div id="generales">
  			<div class="form-group">
				<?php echo CHtml::label('baile', 'tag_baile'); ?>
				<?php echo CHtml::checkBox('tag_baile', false, array('value' => 'baile')); ?>
			</div>
			
  			<div class="form-group">
				<?php echo CHtml::label('cine', 'tag_cine'); ?>
				<?php echo CHtml::checkBox('tag_cine', false, array('value' => 'cine')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('cocina', 'tag_cocina'); ?>
				<?php echo CHtml::checkBox('tag_cocina', false, array('value' => 'cocina')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('deportes', 'tag_deportes'); ?>
				<?php echo CHtml::checkBox('tag_deportes', false, array('value' => 'deportes')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('fotografía', 'tag_fotografia'); ?>
				<?php echo CHtml::checkBox('tag_fotografia', false, array('value' => 'fotografía')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('lectura', 'tag_lectura'); ?>
				<?php echo CHtml::checkBox('tag_lectura', false, array('value' => 'lectura')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('manualidades', 'tag_manualidades'); ?>
				<?php echo CHtml::checkBox('tag_manualidades', false, array('value' => 'manualidades')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('música', 'tag_musica'); ?>
				<?php echo CHtml::checkBox('tag_musica', false, array('value' => 'música')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('teatro', 'tag_teatro'); ?>
				<?php echo CHtml::checkBox('tag_teatro', false, array('value' => 'teatro')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('viajar', 'tag_viajar'); ?>
				<?php echo CHtml::checkBox('tag_viajar', false, array('value' => 'viajar')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('videojuegos', 'tag_videojuegos'); ?>
				<?php echo CHtml::checkBox('tag_videojuegos', false, array('value' => 'videojuegos')); ?>
			</div>
  		</div>
  		
  		<div id="musica-baile">
  			<div class="form-group">
				<?php echo CHtml::label('baile de salón', 'tag_baile_salon'); ?>
				<?php echo CHtml::checkBox('tag_baile_salon', false, array('value' => 'baile de salón')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('banda', 'tag_banda'); ?>
				<?php echo CHtml::checkBox('tag_banda', false, array('value' => 'banda')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('cumbia', 'tag_cumbia'); ?>
				<?php echo CHtml::checkBox('tag_cumbia', false, array('value' => 'cumbia')); ?>
			</div>
			
		    <div class="form-group">
				<?php echo CHtml::label('danza', 'tag_danza'); ?>
				<?php echo CHtml::checkBox('tag_danza', false, array('value' => 'danza')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('electrónica', 'tag_electronica'); ?>
				<?php echo CHtml::checkBox('tag_electronica', false, array('value' => 'electrónica')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('hip hop', 'tag_hip_hop'); ?>
				<?php echo CHtml::checkBox('tag_hip_hop', false, array('value' => 'hip hop')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('house', 'tag_house'); ?>
				<?php echo CHtml::checkBox('tag_house', false, array('value' => 'house')); ?>
			</div>

			<div class="form-group">
				<?php echo CHtml::label('metal', 'tag_metal'); ?>
				<?php echo CHtml::checkBox('tag_metal', false, array('value' => 'metal')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('música clásica', 'tag_musica_clasica'); ?>
				<?php echo CHtml::checkBox('tag_musica_clasica', false, array('value' => 'música clásica')); ?>
			</div>
						
			<div class="form-group">
				<?php echo CHtml::label('rock', 'tag_rock'); ?>
				<?php echo CHtml::checkBox('tag_rock', false, array('value' => 'rock')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('salsa', 'tag_salsa'); ?>
				<?php echo CHtml::checkBox('tag_salsa', false, array('value' => 'salsa')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('tango', 'tag_tango'); ?>
				<?php echo CHtml::checkBox('tag_tango', false, array('value' => 'tango')); ?>
			</div>
  		</div>
  		
  		<div id="deportes">
  			<div class="form-group">
				<?php echo CHtml::label('atletismo', 'tag_atletismo'); ?>
				<?php echo CHtml::checkBox('tag_atletismo', false, array('value' => 'atletismo')); ?>
			</div>
			
  			<div class="form-group">
				<?php echo CHtml::label('basquetbol', 'tag_basquetbol'); ?>
				<?php echo CHtml::checkBox('tag_basquetbol', false, array('value' => 'basquetbol')); ?>
			</div>

			<div class="form-group">
				<?php echo CHtml::label('beisbol', 'tag_beisbol'); ?>
				<?php echo CHtml::checkBox('tag_beisbol', false, array('value' => 'beisbol')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('boxeo', 'tag_boxeo'); ?>
				<?php echo CHtml::checkBox('tag_boxeo', false, array('value' => 'boxeo')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('canotaje', 'tag_canotaje'); ?>
				<?php echo CHtml::checkBox('tag_canotaje', false, array('value' => 'canotaje')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('ciclismo', 'tag_ciclismo'); ?>
				<?php echo CHtml::checkBox('tag_ciclismo', false, array('value' => 'ciclismo')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('clavados', 'tag_clavados'); ?>
				<?php echo CHtml::checkBox('tag_clavados', false, array('value' => 'clavados')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('escalada', 'tag_escalada'); ?>
				<?php echo CHtml::checkBox('tag_escalada', false, array('value' => 'escalada')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('espeleo', 'tag_espeleo'); ?>
				<?php echo CHtml::checkBox('tag_espeleo', false, array('value' => 'espeleo')); ?>
			</div>
			
  			<div class="form-group">
				<?php echo CHtml::label('fútbol', 'tag_futbol'); ?>
				<?php echo CHtml::checkBox('tag_futbol', false, array('value' => 'fútbol')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('fútbol americano', 'tag_futbol_americano'); ?>
				<?php echo CHtml::checkBox('tag_futbol_americano', false, array('value' => 'fútbol americano')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('natación', 'tag_natacion'); ?>
				<?php echo CHtml::checkBox('tag_natacion', false, array('value' => 'natación')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('taekwondo', 'tag_taekwondo'); ?>
				<?php echo CHtml::checkBox('tag_taekwondo', false, array('value' => 'taekwondo')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('tenis', 'tag_tenis'); ?>
				<?php echo CHtml::checkBox('tag_tenis', false, array('value' => 'tenis')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('voleibol', 'tag_voleibol'); ?>
				<?php echo CHtml::checkBox('tag_voleibol', false, array('value' => 'voleibol')); ?>
			</div>
  		</div>
  		
  		<div id="instrumento">
  			<div class="form-group">
				<?php echo CHtml::label('bajo', 'tag_bajo'); ?>
				<?php echo CHtml::checkBox('tag_bajo', false, array('value' => 'bajo')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('bateria', 'tag_bateria'); ?>
				<?php echo CHtml::checkBox('tag_bateria', false, array('value' => 'bateria')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('flauta', 'tag_flauta'); ?>
				<?php echo CHtml::checkBox('tag_flauta', false, array('value' => 'flauta')); ?>
			</div>
			
  			<div class="form-group">
				<?php echo CHtml::label('guitarra', 'tag_guitarra'); ?>
				<?php echo CHtml::checkBox('tag_guitarra', false, array('value' => 'guitarra')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('piano', 'tag_piano'); ?>
				<?php echo CHtml::checkBox('tag_piano', false, array('value' => 'piano')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('violín', 'tag_violin'); ?>
				<?php echo CHtml::checkBox('tag_violin', false, array('value' => 'violín')); ?>
			</div>
  		</div>
  		
  		<div id="lectura">
  			<div class="form-group">
				<?php echo CHtml::label('ensayo', 'tag_ensayo'); ?>
				<?php echo CHtml::checkBox('tag_ensayo', false, array('value' => 'lectura ensayo')); ?>
			</div>
			
  			<div class="form-group">
				<?php echo CHtml::label('ficción', 'tag_ficcion'); ?>
				<?php echo CHtml::checkBox('tag_ficcion', false, array('value' => 'lectura ficción')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('narrativa', 'tag_narrativa'); ?>
				<?php echo CHtml::checkBox('tag_narrativa', false, array('value' => 'lectura narrativa')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('novela', 'tag_novela'); ?>
				<?php echo CHtml::checkBox('tag_novela', false, array('value' => 'lectura novela')); ?>
			</div>
			
			<div class="form-group">
				<?php echo CHtml::label('poesía', 'tag_poesia'); ?>
				<?php echo CHtml::checkBox('tag_poesia', false, array('value' => 'lectura poesía')); ?>
			</div>
  		</div>
	</div>


    <div class="form-group">
        <?php echo $form->labelEx($model, 'language'); ?>
        <?php echo $form->dropDownList($model, 'language', Yii::app()->params['availableLanguages'], array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'language'); ?>
    </div>

    <strong><?php echo Yii::t('UserModule.views_account_editSettings', 'Getting Started'); ?></strong>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <?php echo $form->checkBox($model, 'show_introduction_tour'); ?> <?php echo $model->getAttributeLabel('show_introduction_tour'); ?>
            </label>
        </div>
    </div>

    <hr>

    <?php echo CHtml::submitButton(Yii::t('UserModule.views_account_editSettings', 'Save'), array('class' => 'btn btn-primary')); ?>

    <!-- show flash message after saving -->
    <?php $this->widget('application.widgets.DataSavedWidget'); ?>

    <?php $this->endWidget(); ?>
</div>



