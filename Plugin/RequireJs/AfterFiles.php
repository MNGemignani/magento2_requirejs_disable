<?php

namespace Gemig\Requirejs\Plugin\RequireJs;

use Gemig\Requirejs\Helper\Data;

class AfterFiles
{
    /**
     * @var Data
     */
    private $helper;

    /**
     * AfterFiles constructor.
     * @param Data $helper
     */
    public function __construct(Data $helper)
    {
        $this->helper = $helper;
    }

    /**
     *
     * Change the returned modules with requirejs-config.js, excluding the ones set in admin
     *
     * @param \Magento\Framework\RequireJs\Config\File\Collector\Aggregated $subject
     * @param $result
     * @return array
     */
    public function afterGetFiles(
        \Magento\Framework\RequireJs\Config\File\Collector\Aggregated $subject,
        $result
    ){
        $isEnable = $this->helper->isEnabled();
        $arrayModules = $this->helper->arrayModulesToDisable();
        if($isEnable) {
            foreach ($result as $key => &$file) {
                /** @var \Magento\Framework\View\File $file */
                if (in_array($file->getModule(), $arrayModules)) {
                    unset($result[$key]);
                }
            }
        }
        return $result;
    }
}