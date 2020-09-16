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
 * @date 09.09.2020 20:44
 * @copyright  Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 **********************************************************************************************************************/

namespace ShopFilter\Helpers;
//namespace ShopFilter;
defined('_JEXEC') or die; // No direct access to this file

use Exception;
use JDatabaseDriver;
use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Factory;

/**
 * Class Manufacturer
 * @package ShopFilter
 * @since 3.9
 * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
 * @date 09.09.2020 20:44
 *
 */
class Manufacturer
{

    /**
     * @var CMSApplication|null
     * @since 3.9
     */
    private $app;
    /**
     * @var JDatabaseDriver|null
     * @since 3.9
     */
    private $db;
    /**
     * Array to hold the object instances
     *
     * @var Manufacturer
     * @since  1.6
     */
    public static $instance;
    /**
     * @var joomshopping_two_lang|null
     * @since 3.9
     */
    private $plgSearchJoomshopping_two_lang;

    /**
     * Manufacturer constructor.
     * @param $params array|object
     * @throws Exception
     * @since 3.9
     */
    public function __construct($params)
    {
        $this->app = Factory::getApplication();
        $this->db = Factory::getDbo();

        $this->plgSearchJoomshopping_two_lang = clone $this->app->get('joomshopping_two_lang'  ) ;


        return $this;
    }

    /**
     * @param array $options
     *
     * @return Manufacturer
     * @throws Exception
     * @since 3.9
     */
    public static function instance($options = array())
    {
        if (self::$instance === null)
        {
            self::$instance = new self($options);
        }
        return self::$instance;
    }

    /**
     * Получить список всех производителей для отобранных товаров по поисковому слову
     * @return array[]
     * @since 3.9
     * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
     * @date 10.09.2020 15:57
     *
     */
    public function getManufacturerAllByWord(){

        $manufacturers_ids = $this->app->input->get('manufacturer_id', array(), 'array');
        $category_ids = $this->app->input->get('category_ids', array(), 'array');


            // Code that may throw an Exception or Error.

/*
            $total = count( $plgSearchJoomshopping_two_lang->resArrRows ) ;
            $this->_pagination = new \Joomla\CMS\Pagination\Pagination($total, 0 , 10  );
            echo $this->_pagination->getPagesLinks() ;
*/



            // throw new Exception('Code Exception '.__FILE__.':'.__LINE__) ;





        $this->query = $this->plgSearchJoomshopping_two_lang->saveQuery ;
//        echo'<pre>';print_r( $this->query->dump() );echo'</pre>'.__FILE__.' '.__LINE__;


        $this->db->setQuery( $this->query  );
        $resArrRows = $this->db->loadObjectList( );





        /*echo'<pre>';print_r( $category_ids );echo'</pre>'.__FILE__.' '.__LINE__;
        echo'<pre>';print_r( $manufacturers_ids );echo'</pre>'.__FILE__.' '.__LINE__;
        echo'<pre>';print_r( $resArrRows );echo'</pre>'.__FILE__.' '.__LINE__;

        die(__FILE__ .' '. __LINE__ );*/



//        echo'<pre>';print_r( count( $resArrRows ) );echo'</pre>'.__FILE__.' '.__LINE__;
        


        $ManufacturerAll = [] ;
        foreach ( $resArrRows as $result)
        {

            if ($result->section_id == 1203 && $result->manufacturer_id == 28 )
            {
//                echo'<pre>';print_r( $result );echo'</pre>'.__FILE__.' '.__LINE__;
//
//                die(__FILE__ .' '. __LINE__ );

            }#END IF


            # Если нет названия manufacturer
            if (!$result->manufacturer_name)
            {
//                $this->app->enqueueMessage('');
                continue ;
            }#END IF

            # Не показывать в фильтре пустые значения
            if (!empty($category_ids) && !in_array( $result->section_id , $category_ids))
            {
                continue ;
            }#END IF

            $id = $result->manufacturer_id ;
            $name = $result->manufacturer_name ;

            $active = in_array( $id , $manufacturers_ids) ;




            if (!isset($ManufacturerAll[$name]->count))
            {
                $ManufacturerAll[$name] = new \stdClass() ;
                $ManufacturerAll[$name]->count = 0 ;
                $ManufacturerAll[$name]->id = $id ;
                $ManufacturerAll[$name]->name = $result->manufacturer_name  ;
                $ManufacturerAll[$name]->active = $active  ;
            }#END IF
            if (!count($category_ids) )
            {
                $ManufacturerAll[$name]->count++ ;
            }else{
                if (in_array( $result->section_id , $category_ids))
                {
//                    echo'<pre>';print_r( $result->manufacturer_name );echo'</pre>'.__FILE__.' '.__LINE__;

                    $ManufacturerAll[$name]->count++ ;
                }#END IF
            }#END IF

            if ( !$id || !$name  )
            {
//                echo'<pre>';print_r( $result );echo'</pre>'.__FILE__.' '.__LINE__;
//                die(__FILE__ .' '. __LINE__ );
            }#END IF
//            echo'<pre>';print_r( $result );echo'</pre>'.__FILE__.' '.__LINE__;
        }#END FOREACH

        ksort($ManufacturerAll );









        return $ManufacturerAll ;
    }




}






















