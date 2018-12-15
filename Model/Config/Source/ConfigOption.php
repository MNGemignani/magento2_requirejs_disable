<?php

namespace Gemig\Requirejs\Model\Config\Source;

use Magento\Framework\Module\ModuleList;


class ConfigOption implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var ModuleList
     */
    private $moduleList;

    /**
     * ConfigOption constructor.
     * @param ModuleList $moduleList
     */
    public function __construct(ModuleList $moduleList)
    {
        $this->moduleList = $moduleList;
    }

    public function toOptionArray()
    {
        $moduleListArray = $this->getAllModules();
        $arrayMultiSelect = array();
        foreach($moduleListArray as $module){
            $arrayMultiSelect[] = ['value' => $module, 'label' => $module];
        }
        return $arrayMultiSelect;
    }

    public function getAllModules()
    {
        return $this->moduleList->getNames();
    }
}