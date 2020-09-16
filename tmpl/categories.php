<?php
/***********************************************************************************************************************
 * ╔═══╗ ╔══╗ ╔═══╗ ╔════╗ ╔═══╗ ╔══╗  ╔╗╔╗╔╗ ╔═══╗ ╔══╗   ╔══╗  ╔═══╗ ╔╗╔╗ ╔═══╗ ╔╗   ╔══╗ ╔═══╗ ╔╗  ╔╗ ╔═══╗ ╔╗ ╔╗ ╔════╗
 * ║╔══╝ ║╔╗║ ║╔═╗║ ╚═╗╔═╝ ║╔══╝ ║╔═╝  ║║║║║║ ║╔══╝ ║╔╗║   ║╔╗╚╗ ║╔══╝ ║║║║ ║╔══╝ ║║   ║╔╗║ ║╔═╗║ ║║  ║║ ║╔══╝ ║╚═╝║ ╚═╗╔═╝
 * ║║╔═╗ ║╚╝║ ║╚═╝║   ║║   ║╚══╗ ║╚═╗  ║║║║║║ ║╚══╗ ║╚╝╚╗  ║║╚╗║ ║╚══╗ ║║║║ ║╚══╗ ║║   ║║║║ ║╚═╝║ ║╚╗╔╝║ ║╚══╗ ║╔╗ ║   ║║
 * ║║╚╗║ ║╔╗║ ║╔╗╔╝   ║║   ║╔══╝ ╚═╗║  ║║║║║║ ║╔══╝ ║╔═╗║  ║║─║║ ║╔══╝ ║╚╝║ ║╔══╝ ║║   ║║║║ ║╔══╝ ║╔╗╔╗║ ║╔══╝ ║║╚╗║   ║║
 * ║╚═╝║ ║║║║ ║║║║    ║║   ║╚══╗ ╔═╝║  ║╚╝╚╝║ ║╚══╗ ║╚═╝║  ║╚═╝║ ║╚══╗ ╚╗╔╝ ║╚══╗ ║╚═╗ ║╚╝║ ║║    ║║╚╝║║ ║╚══╗ ║║ ║║   ║║
 * ╚═══╝ ╚╝╚╝ ╚╝╚╝    ╚╝   ╚═══╝ ╚══╝  ╚═╝╚═╝ ╚═══╝ ╚═══╝  ╚═══╝ ╚═══╝  ╚╝  ╚═══╝ ╚══╝ ╚══╝ ╚╝    ╚╝  ╚╝ ╚═══╝ ╚╝ ╚╝   ╚╝
 *----------------------------------------------------------------------------------------------------------------------
 * @author Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
 * @date 10.09.2020 16:24
 * @copyright  Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 **********************************************************************************************************************/
defined('_JEXEC') or die; // No direct access to this file
/**
 *
 * @var $displayCategories array
 */




# разобрать массив по первым буквам
$CategoriesAllLetters = [] ;
foreach ($displayCategories as $item)
{
    $firstLetter = mb_substr($item->name, 0, 1);
    $CategoriesAllLetters[$firstLetter][] = $item;

}#END FOREACH







?>
<div cdkaccordionitem="" class="sidebar-block" data-filter-name="producer">
    <button class="sidebar-block__toggle" type="button">
        <span class="sidebar-block__toggle-title">Категории
            <span class="sidebar-block__toggle-quantity"> <?= count( $displayCategories ) ?> </span>
        </span>
        <svg class="sidebar-block__toggle-icon" height="16" width="16">
            <use xlink:href="#icon-angle-left" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </button>

    <div class="sidebar-block__inner scroll-special-style" style="overflow-x: hidden;">


        <div class="js-app-scrollbar scrollbar " style="max-height: 400px;">
            <div class="scrollbar__layout ">
                <div class="scrollbar__inner " style="width: calc(100% + 18px);">
                    <div rzdynamicfilterholder="">
                        <rz-filter-section-checkbox _nghost-c124="">
                            <ul _ngcontent-c124="" class="checkbox-filter">
                                <?php
                                foreach ($CategoriesAllLetters as $fLetter => $categoriesAllLetter)
                                {
                                    ?>
                                <li _ngcontent-c124="" class="checkbox-filter__item">
                                    <p _ngcontent-c124="" class="checkbox-filter__glyph"><?= $fLetter ?></p>
                                    <ul _ngcontent-c124="" class="checkbox-filter">
                                        <?php
                                        foreach ($categoriesAllLetter as $item)
                                        {
                                            $inputClass = '';
                                            $inputState = '';
                                            $block__quantity = '('. ($activeIn?'+':'') .$item->count .')' ;
                                            if ( $item->active )
                                            {
                                                $inputState = 'checked="checked"';
                                                $block__quantity = null;
                                            }
                                            
                                            ?>
                                            <li _ngcontent-c124="" class="checkbox-filter__item">
                                                <a _ngcontent-c124="" class="checkbox-filter__link"
                                                   href="">
                                                    <input id="uf_category_id_<?php echo $item->id ?>" type="checkbox"
                                                           name="category_ids[]"
                                                           value="<?php echo $item->id ?>" <?php echo $inputState ?> />
                                                    <label _ngcontent-c124="" for="uf_category_id_<?php echo $item->id ?>">
                                                        <?=$item->name?>
                                                        <span _ngcontent-c124="" class="sidebar-block__quantity">
                                                            <?=$item->count?>
                                                        </span>
                                                    </label>
                                                </a>
                                            </li>
                                            <?php
                                        }#END FOREACH
                                        ?>
                                    </ul>
                                </li>
                                    <?php
                                }#END FOREACH
                                /*echo'<pre>';print_r( $ManufacturerAllLetters );echo'</pre>'.__FILE__.' '.__LINE__;
                                
                                die(__FILE__ .' '. __LINE__ );*/

                                ?>


                            </ul>
                        </rz-filter-section-checkbox>
                    </div>
                </div> 
                <div class="scrollbar__holder ">
                    <div class="scrollbar__path ">
                        <div class="scrollbar__slider " style="top: 0px; height: 37.0199px;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
/*

<!-- Поиск +  Алфавитный указатель   -->
        <rz-filter-searchline _ngcontent-c124="" _nghost-c123="">
            <div _ngcontent-c123="" class="sidebar-search">
                <input _ngcontent-c123="" class="sidebar-search__input ng-untouched ng-pristine ng-valid"
                                                                  name="searchline" type="search" placeholder="Поиск">
            </div>
            <div _ngcontent-c123="" cdkaccordionitem="" class="sidebar-alphabet">
                <button _ngcontent-c123="" class="button button_type_link sidebar-alphabet__toggle" type="button">
                    <span _ngcontent-c123="" class="link-dotted"> Алфавитный указатель </span>
                </button>
            </div>
        </rz-filter-searchline>

 */
















