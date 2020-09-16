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
/**
 * @var $activeIn int - Есть ли выбранные производители
 * @var $displayManufacturers array  - Массив с производителями
 * @var $inputParams array  - Параметры запроса
 */
?>
<svg style="display: none;">
    <defs id="symbols">
        <symbol viewBox="0 0 24 24" id="icon-angle-left">
            <path clip-rule="evenodd" d="m16.726 21.6877c-.3799.401-1.0128.4181-1.4137.0383l-10.26633-9.726 10.26633-9.72595c.4009-.37984 1.0338-.36273 1.4137.0382.3798.40094.3627 1.03387-.0383 1.4137l-8.73367 8.27405 8.73367 8.274c.401.3799.4181 1.0128.0383 1.4137z" fill-rule="evenodd"></path>
        </symbol>
    </defs>
</svg>


<div id="jshop_unijax_filter"
     data-search="<?php echo htmlspecialchars(json_encode($dataSearch, JSON_UNESCAPED_UNICODE)) ?>">
    <!--<div class="uf_buttons">
        <button type="button" class="groupbtnleft"
                onclick="manufacturerSearch.submitForm()"> <?php /*echo 'Показать' */?></button>
        <button type="button" class="groupbtnright"
                onclick="manufacturerSearch.clearForm()"> <?php /*echo 'Сбросить' */?> </button>
    </div>-->
    <form name="ShopFilter" id="ShopFilter" class="blue" action="<?= $formAction ?>" method="get"
          autocomplete="off">

        <?php
        # Фильтр производители
        include(JModuleHelper::getLayoutPath('mod_jshopping_manufacturer_search', 'categories'));
        include(JModuleHelper::getLayoutPath('mod_jshopping_manufacturer_search', 'manufacturers'));


        ?>
        <input type="hidden" name="searchword" value="<?=$inputParams['searchword']?>">
        <input type="hidden" name="ordering" value="popular">
        <input type="hidden" name="searchphrase" value="exact">
        <input type="hidden" name="view" value="search">
        <input type="hidden" name="option" value="com_search">

        <?php
        /*if ( !empty( $dataSearch['category_id'] ) )
        {
            foreach ( $dataSearch['category_id'] as $category_id )
            {
             */?><!--
                <input type="hidden" name="category_id[]" value="<?/*=$category_id*/?>">
                --><?php
/*            }#END FOREACH
        }#END IF*/
        ?>


<?php
        // &category_id[]=1193&category_id[]=1195
        // &category_id[]=1195
//        echo'<pre>';print_r( $dataSearch );echo'</pre>'.__FILE__.' '.__LINE__;




        ?>
    </form>


    <!--<div class="uf_wrappers">
        <div class="uf_wrapper uf_wrapper_manufacturers">
            <div id="uf_manufacturers_label" class="uf_label_manufacturers <?php /*echo $labelClass */?>">
                <span class="uf_trigon"></span>
                <span>Бренд</span>
            </div>
            <div id="uf_manufacturers" class="uf_options <?php /*echo $optionsClass */?> scroll-special-style">
                <div class="uf_select_options chzn-container-multi ">
                    <ul id="uf_manufacturers_select_options" class="chzn-choices"></ul>
                </div>
                <div class="uf_options_manufacturer uf_hidecheckbox scroll-special-style">
                    <?php
/*
                    foreach ($displayManufacturers['ManufacturerAll'] as $v)
                    {

                        $inputClass = '';
                        $inputState = '';
                        $block__quantity = '('. ($activeIn?'+':'') .$v->count .')' ;
                        if ( $v->active )
                        {
                            $inputState = 'checked="checked"';
                            $block__quantity = null;

                        }


                        */?>
                        <div class="uf_input">
                            <input id="uf_manufacturer_<?php /*echo $v->id */?>" type="checkbox" name="manufacturers[]"
                                   value="<?php /*echo $v->id */?>" <?php /*echo $inputState */?>
                                   onclick="manufacturerSearch.updateForm(this)"/>
                            <label data-mame="<?/*= $v->name */?>" class="uf_manufacturer"
                                   for="uf_manufacturer_<?php /*echo $v->id */?>">
                                <?/*= $v->name */?>
                                <span _ngcontent-c32="" class="sidebar-block__quantity"> <?/*= $block__quantity */?> </span>
                            </label>

                        </div>
                        <?php
/*                    } */?>
                </div>
            </div>
        </div>
    </div>
    <div class="uf_buttons">
        <button type="button" class="groupbtnleft"
                onclick="manufacturerSearch.submitForm()"> <?php /*echo 'Показать' */?></button>
        <button type="button" class="groupbtnright"
                onclick="manufacturerSearch.clearForm()"> <?php /*echo 'Сбросить' */?> </button>
    </div>-->
</div>
