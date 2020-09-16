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

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

defined('_JEXEC') or die;
JLoader::registerNamespace( 'GNZ11' , JPATH_LIBRARIES . '/GNZ11' , $reset = false , $prepend = false , $type = 'psr4' );
JLoader::registerNamespace( 'ShopFilter' , JPATH_ROOT . '/modules/mod_jshopping_manufacturer_search' , $reset = false , $prepend = false , $type = 'psr4' );

$app = Factory::getApplication();
$doc = Factory::getDocument();

if (!defined('V_MOD_JSHOPPING_MANUFACTURER_SEARCH')){
    $xml_file = JPATH_ROOT . '/modules/mod_jshopping_manufacturer_search/mod_jshopping_manufacturer_search.xml';
    $dom = new DOMDocument("1.0", "utf-8");
    $dom->load($xml_file);
    $version = $dom->getElementsByTagName('version')->item(0)->textContent;
    define('V_MOD_JSHOPPING_MANUFACTURER_SEARCH', $version );
}

$doc->addStyleSheet( Uri::root() . '/modules/mod_jshopping_manufacturer_search/assets/css/filter-style.css?'.V_MOD_JSHOPPING_MANUFACTURER_SEARCH );
//$doc->addScript(JUri::base(true).'/modules/mod_jshopping_unijax_filter/js/default.js');
$doc->addScript(Uri::root(true) . '/modules/mod_jshopping_manufacturer_search/assets/script.js?'.V_MOD_JSHOPPING_MANUFACTURER_SEARCH);



$Jpro = $doc->getScriptOptions('Jpro') ;
$Jpro['load'][] = [
    'u' => Uri::root(true) . '/modules/mod_jshopping_manufacturer_search/assets/js/filter-core.js?'.V_MOD_JSHOPPING_MANUFACTURER_SEARCH , // Путь к файлу
    't' => 'js' ,
    'c' => '' ,
];
$doc->addScriptOptions('Jpro' , $Jpro ) ;

$HelperManufacturer = \ShopFilter\Helpers\Manufacturer::instance();
$displayManufacturers = $HelperManufacturer->getManufacturerAllByWord();

$HelperCategories = \ShopFilter\Helpers\Categories::instance();
$displayCategories  = $HelperCategories->getCategoriesAllByWord();




$activeIn = (count( $app->input->get('manufacturer_id', array(), 'array') ) ? true : false );
//$activeIn = (count( $app->input->get('manufacturer_id', array(), 'array') ) ? true : false );

$arrInp = [
    'start' =>  'INT',
    'category_id' =>  'ARRAY' ,
    'searchphrase' => 'WORD' ,
    'ordering' => 'WORD' ,
    'limit' => 'INT' ,
    'searchword' => 'STRING' ,
//            'areas' => 'ARRAY' ,
];
# Параметры запроса
$inputParams  = $app->input->getArray($arrInp);

$paramsAction = ['option' => 'com_search' ,'view'=>'search' ] ;
$formAction =  \GNZ11\Joomla\Uri\Uri::createLink( $paramsAction ,  1 );










//$displayManufacturers = $app->get('joomshopping_manufacturers_search', array());


/*echo'<pre>';print_r( $displayManufacturers );echo'</pre>'.__FILE__.' '.__LINE__;
die(__FILE__ .' '. __LINE__ );*/



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




require \Joomla\CMS\Helper\ModuleHelper::getLayoutPath($module->module, $params->get('layout', 'default'));



























