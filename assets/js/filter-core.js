/***********************************************************************************************************************
 * ╔═══╗ ╔══╗ ╔═══╗ ╔════╗ ╔═══╗ ╔══╗  ╔╗╔╗╔╗ ╔═══╗ ╔══╗   ╔══╗  ╔═══╗ ╔╗╔╗ ╔═══╗ ╔╗   ╔══╗ ╔═══╗ ╔╗  ╔╗ ╔═══╗ ╔╗ ╔╗ ╔════╗
 * ║╔══╝ ║╔╗║ ║╔═╗║ ╚═╗╔═╝ ║╔══╝ ║╔═╝  ║║║║║║ ║╔══╝ ║╔╗║   ║╔╗╚╗ ║╔══╝ ║║║║ ║╔══╝ ║║   ║╔╗║ ║╔═╗║ ║║  ║║ ║╔══╝ ║╚═╝║ ╚═╗╔═╝
 * ║║╔═╗ ║╚╝║ ║╚═╝║   ║║   ║╚══╗ ║╚═╗  ║║║║║║ ║╚══╗ ║╚╝╚╗  ║║╚╗║ ║╚══╗ ║║║║ ║╚══╗ ║║   ║║║║ ║╚═╝║ ║╚╗╔╝║ ║╚══╗ ║╔╗ ║   ║║
 * ║║╚╗║ ║╔╗║ ║╔╗╔╝   ║║   ║╔══╝ ╚═╗║  ║║║║║║ ║╔══╝ ║╔═╗║  ║║─║║ ║╔══╝ ║╚╝║ ║╔══╝ ║║   ║║║║ ║╔══╝ ║╔╗╔╗║ ║╔══╝ ║║╚╗║   ║║
 * ║╚═╝║ ║║║║ ║║║║    ║║   ║╚══╗ ╔═╝║  ║╚╝╚╝║ ║╚══╗ ║╚═╝║  ║╚═╝║ ║╚══╗ ╚╗╔╝ ║╚══╗ ║╚═╗ ║╚╝║ ║║    ║║╚╝║║ ║╚══╗ ║║ ║║   ║║
 * ╚═══╝ ╚╝╚╝ ╚╝╚╝    ╚╝   ╚═══╝ ╚══╝  ╚═╝╚═╝ ╚═══╝ ╚═══╝  ╚═══╝ ╚═══╝  ╚╝  ╚═══╝ ╚══╝ ╚══╝ ╚╝    ╚╝  ╚╝ ╚═══╝ ╚╝ ╚╝   ╚╝
 *----------------------------------------------------------------------------------------------------------------------
 * @author Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
 * @date 10.09.2020 20:07
 * @copyright  Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 **********************************************************************************************************************/
window.JoomshopingFilterCore = function (){
    /** @var {jQuery} jQuery */
    var $ = jQuery ;
    var self = this ;

    this._selectors = {
        form : '#ShopFilter' ,
        sidebarBlockToggle : 'button.sidebar-block__toggle' ,
        sidebarBlock : '.sidebar-block',
        checkboxFilterLink : '.checkbox-filter__link',
    };
    this.Init = function (){
        self.addEventListeners();
    };

    this.addEventListeners = function (){
        // СОБЫТИЕ : Клик по заголовку блока - свернуть развернуть блок
        $(self._selectors.sidebarBlockToggle).on('click' , function (){
            $(this).closest(self._selectors.sidebarBlock).toggleClass('sidebar-block_state_collapsed')
        });
        // СОБЫТИЕ : Клик по элементу фильтра
        $(self._selectors.checkboxFilterLink).on('click' , self.onCheckboxFilterLink )
    };
    this.onCheckboxFilterLink = function (event){
        event.preventDefault();

        console.log(this)

        var $input = $(this).find('input');
        if ($input.prop('checked')){
            $input.prop('checked' , false );
            $input.attr('checked' ,false)
        }else{
            $input.prop('checked' , true );
            $input.attr('checked' , true )
        }
        console.log( $(self._selectors.form) )

        setTimeout(function (){
           $(self._selectors.form).submit();
        },500)

    }
    this.Init();
}

window.JoomshopingFilterCore.prototype = new GNZ11();
new window.JoomshopingFilterCore();




















