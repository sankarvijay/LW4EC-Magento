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
 * Moneyout model
 *
 * @category    Sirateck
 * @package     Magento_Lemonway_Ecommerce
 * @author Kassim Belghait kassim@sirateck.com
 */
class Sirateck_Lemonway_Model_Moneyout extends Mage_Core_Model_Abstract
{
    /**
     * Entity code.
     * Can be used as part of method name for entity processing
     */
    const ENTITY    = 'sirateck_lemonway_moneyout';
    const CACHE_TAG = 'sirateck_lemonway_moneyout';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'sirateck_lemonway_moneyout';

    /**
     * Parameter name in event
     *
     * @var string
     */
    protected $_eventObject = 'moneyout';

    /**
     * constructor
     *
     * @access public
     * @return void
     * @author Kassim Belghait kassim@sirateck.com
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('sirateck_lemonway/moneyout');
    }

    /**
     * before save moneyout
     *
     * @access protected
     * @return Sirateck_Lemonway_Model_Moneyout
     * @author Kassim Belghait kassim@sirateck.com
     */
    protected function _beforeSave()
    {
        parent::_beforeSave();
        $now = Mage::getSingleton('core/date')->gmtDate();
        if ($this->isObjectNew()) {
            $this->setCreatedAt($now);
        }
        $this->setUpdatedAt($now);
        return $this;
    }

    /**
     * save moneyout relation
     *
     * @access public
     * @return Sirateck_Lemonway_Model_Moneyout
     * @author Kassim Belghait kassim@sirateck.com
     */
    protected function _afterSave()
    {
        return parent::_afterSave();
    }
    
}
