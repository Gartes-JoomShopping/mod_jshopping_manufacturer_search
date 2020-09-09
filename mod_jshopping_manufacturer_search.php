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

if (!file_exists(JPATH_SITE.'/components/com_jshopping/jshopping.php')){
    return;
}

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base(true).'/modules/mod_jshopping_unijax_filter/css/default.css');
$document->addScript(JUri::base(true).'/modules/mod_jshopping_unijax_filter/js/default.js');

$document->addStyleSheet(JUri::root(true) . '/modules/mod_jshopping_manufacturer_search/assets/style.css');
$document->addScript(JUri::root(true) . '/modules/mod_jshopping_manufacturer_search/assets/script.js');

JHtml::_('script', 'jui/chosen.jquery.min.js', false, true, false, false, false);
JHtml::_('stylesheet', 'jui/chosen.css', false, true);

$app = JFactory::getApplication();

$displayManufacturers = $app->get('joomshopping_manufacturers_search', array());

$activeManufacturers = array();
foreach ($displayManufacturers as $manufacturer) {
	if ($manufacturer->active) {
		$activeManufacturers[$manufacturer->id] = $manufacturer->id;
	}
}

$labelClass = count($activeManufacturers) ? ' uf_label_selected' : '';

$dataSearch = array(
	'category_id' => $app->input->getInt('category_id', 0),
	'searchword' => $app->input->getString('searchword', ''),
);

require JModuleHelper::getLayoutPath($module->module, $params->get('layout', 'default'));