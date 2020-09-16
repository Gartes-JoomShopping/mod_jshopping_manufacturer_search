/**
 * @package Joomla
 * @subpackage JoomShopping
 * @author Nevigen.com
 * @website https://nevigen.com//
 * @email support@nevigen.com
 * @copyright Copyright © Nevigen.com. All rights reserved.
 * @license Proprietary. Copyrighted Commercial Software
 * @license agreement https://nevigen.com//license-agreement.html
 **/

;var manufacturerSearch = manufacturerSearch || {};

manufacturerSearch.$ = jQuery;

manufacturerSearch.getSelectInputHtml = function (elem) {
    return '<li class="search-choice">' +
		'<span>' +
			manufacturerSearch.$(elem).next('label').text() +
		'</span>' +
		'<a href="javascript:void(0)" class="search-choice-close" onclick="manufacturerSearch.removeSelectInput(\'' + elem.id + '\', this)"></a>' +
		'</li>';
}
 


 
manufacturerSearch.removeSelectInput = function (id, el) {
    var $ = manufacturerSearch.$;
    var input = document.getElementById(id);
    $(input).prop('checked', false).parent().removeClass('uf_hide');
    $(el.parentNode).remove();
}

manufacturerSearch.hideSelectInput = function (elem) {
    if (elem.type === 'checkbox' && elem.checked && manufacturerSearch.$(elem).parent().parent().hasClass('uf_hidecheckbox') && elem.id !== 'uf_sale' && elem.id !== 'uf_review' && elem.id !== 'uf_additional_price')
    {
        manufacturerSearch.$(elem.parentNode).addClass('uf_hide');
        return elem.parentNode.parentNode.parentNode.id;
    } else {
        return false;
    }
}

manufacturerSearch.setSelectInputHtml = function (elem) {
    var parentId = manufacturerSearch.hideSelectInput(elem);
    if (parentId) {
        manufacturerSearch.$('#' + parentId + '_select_options').append(manufacturerSearch.getSelectInputHtml(elem));
    }
}

manufacturerSearch.updateForm = function (elem) {
    alert(' manufacturerSearch.updateForm ')
    // manufacturerSearch.setSelectInputHtml(elem);
    options_id = elem.parentNode.parentNode.parentNode.id;
}


manufacturerSearch.submitForm = function () {
    /** @var {jQuery} jQuery */
    var $ = jQuery,
        // параметры поиска URL {"category_id":0,"searchword":"рация"}
        dataSearch = $('#jshop_unijax_filter').data('search'),
        // форма модуля поиска
        rokajaxsearch = $('#rokajaxsearch');

    // Перебираем всех отмеченных производителей и создаем их в форме модуля поиска
    $('#jshop_unijax_filter input[type=checkbox]:checked').each(function () {
        rokajaxsearch.append('<input type="hidden" name="manufacturer_id[]" value="' + this.value + '" />');
    });
    rokajaxsearch.find('input[name=category_id]').val(dataSearch.category_id);
    rokajaxsearch.find('input[name=searchword]').val(dataSearch.searchword);
    rokajaxsearch.submit();
}

manufacturerSearch.clearForm = function () {
    manufacturerSearch.$('#jshop_unijax_filter input[type=checkbox]:checked').prop('checked', false);
    manufacturerSearch.submitForm();
}











