<?php

namespace Gemig\Requirejs\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_REQUIREJS = 'dev/general_requirejs/';

    /**
     * Check if requirejs config is enabled in backend
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->getConfigValue('enable');
    }

    /**
     * Return an array of modules to be disabled it requirejs
     * 
     * @return array
     */
    public function arrayModulesToDisable()
    {
        $modulesString = $this->getConfigValue('moduleselection');
        return explode(",", $modulesString);
    }

    public function getConfigValue($code, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_REQUIREJS  . $code, ScopeInterface::SCOPE_STORE, $storeId
        );
    }
}