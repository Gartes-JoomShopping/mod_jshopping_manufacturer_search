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
 * @date 11.09.2020 00:56
 * @copyright  Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 **********************************************************************************************************************/

namespace ShopFilter\Helpers;
defined('_JEXEC') or die; // No direct access to this file

use Exception;
use JDatabaseDriver;
use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Factory;

/**
 * Class Categories
 * @package ShopFilter\Helpers
 * @since 3.9
 * @auhtor Gartes | sad.net79@gmail.com | Skype : agroparknew | Telegram : @gartes
 * @date 11.09.2020 00:56
 *
 */
class Categories
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
     * @var Categories
     * @since  1.6
     */
    public static $instance;
    /**
     * @var array товары результат поиска
     * @since 3.9
     */
    private $resArrRows;
    /**
     * @var array список категорий
     * @since 3.9
     */
    private $categorys = [] ;

    /**
     * Categories constructor.
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
     * @return Categories
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

    public function getCategoriesAllByWord(){

        $manufacturers_ids = $this->app->input->get('manufacturer_id', array(), 'array');

        $category_ids = $this->app->input->get('category_ids', array(), 'array');

//        echo'<pre>';print_r( $manufacturers_ids );echo'</pre>'.__FILE__.' '.__LINE__;
//        echo'<pre>';print_r( $category_ids );echo'</pre>'.__FILE__.' '.__LINE__;

        $this->query = $this->plgSearchJoomshopping_two_lang->saveQuery ;
//        echo'<pre>';print_r( $this->query->dump() );echo'</pre>'.__FILE__.' '.__LINE__;
        $this->db->setQuery( $this->query  );
        $resArrRows = $this->db->loadObjectList();


//        echo'<pre>';print_r( $resArrRows );echo'</pre>'.__FILE__.' '.__LINE__;

//        echo'<pre>';print_r( count( $resArrRows ) );echo'</pre>'.__FILE__.' '.__LINE__;

        $CategoriesAll = [] ;
        foreach ( $resArrRows as $result)
        {
            if ($result->section_id == 1203 && $result->manufacturer_id == 28 )
            {
//                echo'<pre>';print_r( $result );echo'</pre>'.__FILE__.' '.__LINE__;
//
//                die(__FILE__ .' '. __LINE__ );

            }#END IF
            
            
            # Не показывать в фильтре пустые значения
            if (!empty($manufacturers_ids) && !in_array( $result->manufacturer_id , $manufacturers_ids))
            {
                continue ;
            }#END IF
            
//            echo'<pre>';print_r( $result );echo'</pre>'.__FILE__.' '.__LINE__;

            
            $id = $result->section_id ;
            $name = $result->section ;

            $active = in_array( $id , $category_ids) ;




            if (!isset($CategoriesAll[$name]->count))
            {
                $CategoriesAll[$name] = new \stdClass() ;
                $CategoriesAll[$name]->count = 0 ;
                $CategoriesAll[$name]->id = $id ;
                $CategoriesAll[$name]->name = $name  ;
                $CategoriesAll[$name]->active = $active  ;
            }#END IF
            if (!count($manufacturers_ids) )
            {
                $CategoriesAll[$name]->count++ ;
            }else{
                if (in_array( $result->manufacturer_id , $manufacturers_ids))
                {
//                    echo'<pre>';print_r( $result->manufacturer_name );echo'</pre>'.__FILE__.' '.__LINE__;

                    $CategoriesAll[$name]->count++ ;
                }#END IF
            }#END IF


//            echo'<pre>';print_r( $result );echo'</pre>'.__FILE__.' '.__LINE__;
        }#END FOREACH



//        [manufacturer_id] => 28
//       [catslug] => 1213
//        [slug] => 3911

//die(__FILE__ .' '. __LINE__ );

        

         ksort($CategoriesAll );

        return $CategoriesAll ;

        /*
        $this->resArrRows = $this->app->get('joomshopping_categorys_search' , []  );


//        echo'<pre>';print_r( $this->resArrRows );echo'</pre>'.__FILE__.' '.__LINE__;
//        die(__FILE__ .' '. __LINE__ );


        foreach ( $this->resArrRows as $category ){

            $this->categorys[$category->name] = $category ;
        }
        ksort($this->categorys );

        return $this->categorys ;*/



        
    }


}