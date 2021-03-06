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
 * @category       Lemonway
 * @package        Magento_Lemonway_Ecommerce
 * @copyright      Copyright (c) 2015
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Wallet admin block
 *
 * @category    Lemonway
 * @package     Magento_Lemonway_Ecommerce
 * @author Kassim Belghait kassim@Lemonway.com
 */
class Lemonway_Lemonway_Block_Adminhtml_Moneyout extends Mage_Adminhtml_Block_Template
{
    protected $_walletDetails = null;


    protected function _prepareLayout()
    {
        $this->setChild(
            'submit_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')->setData(array(
                'label' => Mage::helper('lemonway_lemonway')->__('Pay'),
                'class' => 'save submit-button',
                'onclick' => 'moneyoutForm.submit()',
            ))
        );
    }

    /**
     * Get page header text
     *
     * @return string
     */
    protected function getHeader()
    {
        return $this->__("Money out");
    }

    /**
     * Get html code of pay button
     *
     * @return string
     */
    protected function getPayButtonHtml()
    {
        return $this->getChildHtml('pay_button');
    }

    /**
     * Get process pay url
     *
     * @return string
     */
    public function getPayFormAction()
    {
        return $this->getUrl('*/*/payPost');
    }

    /**
     * Check if main wallet is configured and if Iban is present
     * @TODO check validation (wallet exist and have a positive balance,iban exist and status is ok)
     * @return bool
     */
    public function canPayMoneyOut()
    {
        return !$this->getWalletDetails()->lwError && count($this->getWalletDetails()->wallet->getIbans());
    }

    public function formatPrice($price)
    {
        return Mage::helper('core')->formatPrice($price);
    }


    /**
     * @return Lemonway_Lemonway_Model_Apikit_Apiresponse
     */
    public function getWalletDetails()
    {
        if (is_null($this->_walletDetails)) {
            /* @var $_helper Lemonway_Lemonway_Helper_Data */
            $_helper = $this->helper('lemonway_lemonway');
            $params = array("wallet" => $_helper->getConfig()->getWalletMerchantId());
            $this->_walletDetails = Mage::getSingleton('lemonway_lemonway/apikit_kit')->GetWalletDetails($params);
        }
        return $this->_walletDetails;
    }
}
