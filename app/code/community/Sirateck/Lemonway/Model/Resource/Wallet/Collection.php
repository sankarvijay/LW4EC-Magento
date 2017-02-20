<?php
/**
 * Magento_Lemonway_Ecommerce extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Sirateck
 * @package        Magento_Lemonway_Ecommerce
 * @copyright      Copyright (c) 2015
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Wallet collection resource model
 *
 * @category    Sirateck
 * @package     Magento_Lemonway_Ecommerce
 * @author Kassim Belghait kassim@sirateck.com
 */
class Sirateck_Lemonway_Model_Resource_Wallet_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected $_joinedFields = array();

    /**
     * constructor
     *
     * @access public
     * @return void
     * @author Kassim Belghait kassim@sirateck.com
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('sirateck_lemonway/wallet');
    }

    /**
     * get wallets as array
     *
     * @access protected
     * @param string $valueField
     * @param string $labelField
     * @param array $additional
     * @return array
     * @author Kassim Belghait kassim@sirateck.com
     */
    protected function _toOptionArray($valueField='entity_id', $labelField='wallet_id', $additional=array())
    {
        return parent::_toOptionArray($valueField, $labelField, $additional);
    }

    /**
     * get options hash
     *
     * @access protected
     * @param string $valueField
     * @param string $labelField
     * @return array
     * @author Kassim Belghait kassim@sirateck.com
     */
    protected function _toOptionHash($valueField='entity_id', $labelField='wallet_id')
    {
        return parent::_toOptionHash($valueField, $labelField);
    }

    /**
     * Get SQL for get record count.
     * Extra GROUP BY strip added.
     *
     * @access public
     * @return Varien_Db_Select
     * @author Kassim Belghait kassim@sirateck.com
     */
    public function getSelectCountSql()
    {
        $countSelect = parent::getSelectCountSql();
        $countSelect->reset(Zend_Db_Select::GROUP);
        return $countSelect;
    }
}
