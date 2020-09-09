<?php
/**
* @package Joomla
* @subpackage JoomShopping
* @author Nevigen.com
* @website http://nevigen.com/
* @email support@nevigen.com
* @copyright Copyright © Nevigen.com. All rights reserved.
* @license Proprietary. Copyrighted Commercial Software
* @license agreement http://nevigen.com/license-agreement.html
**/

defined('_JEXEC') or die;
?>
<div id="jshop_unijax_filter" data-search="<?php echo htmlspecialchars(json_encode($dataSearch, JSON_UNESCAPED_UNICODE)) ?>">
	<div class="uf_buttons">
		<button type="button" class="groupbtnleft" onclick="manufacturerSearch.submitForm()"> <?php echo 'Показать' ?></button>
		<button type="button" class="groupbtnright" onclick="manufacturerSearch.clearForm()"> <?php echo 'Сбросить' ?> </button>
	</div>
	<div class="uf_wrappers">
		<div class="uf_wrapper uf_wrapper_manufacturers">
			<div id="uf_manufacturers_label" class="uf_label_manufacturers <?php echo $labelClass ?>">
				<span class="uf_trigon"></span>
				<span><?php echo 'Бренд' ?></span>
			</div>
			<div id="uf_manufacturers" class="uf_options <?php echo $optionsClass ?>">
				<div class="uf_select_options chzn-container-multi">
					<ul id="uf_manufacturers_select_options" class="chzn-choices"></ul>
				</div>
				<div class="uf_options_manufacturer uf_hidecheckbox">
					<?php
					foreach($displayManufacturers as $v){
						$inputClass = '';
						if (in_array($v->id, $activeManufacturers)) {
							$inputState = 'checked="checked"';
						} else {
							$inputState = '';
						}
					?>
					<div class="uf_input">
						<input id="uf_manufacturer_<?php echo $v->id ?>" type="checkbox" name="manufacturers[]" value="<?php echo $v->id ?>" <?php echo $inputState ?> onclick="manufacturerSearch.updateForm(this)" />
						<label class="uf_manufacturer" for="uf_manufacturer_<?php echo $v->id ?>"><span><?php echo $v->name ?></span></label>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<div class="uf_buttons">
		<button type="button" class="groupbtnleft" onclick="manufacturerSearch.submitForm()"> <?php echo 'Показать' ?></button>
		<button type="button" class="groupbtnright" onclick="manufacturerSearch.clearForm()"> <?php echo 'Сбросить' ?> </button>
	</div>
</div>