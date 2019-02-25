<?php

namespace Gemig\Requirejs\Plugin\RequireJs;

use Magento\Framework\View\Design\ThemeInterface;

class AroundFiles
{
    /** @var \Magento\Framework\View\ConfigInterface */
    protected $viewConfig;

    public function __construct(
        \Magento\Framework\View\ConfigInterface $viewConfig)
    {
        $this->viewConfig = $viewConfig;
    }

    /**
     *
     * Change the returned modules with requirejs-config.js, excluding the ones set in admin
     *
     * @see \Magento\Framework\RequireJs\Config\File\Collector\Aggregated::getFiles
     * @param \Magento\Framework\RequireJs\Config\File\Collector\Aggregated $subject
     * @param $result
     * @param ThemeInterface $theme
     * @param string $filePath
     * @return array
     */
    public function aroundGetFiles(
        \Magento\Framework\RequireJs\Config\File\Collector\Aggregated $subject,
        callable $proceed,
        ThemeInterface $theme,
        $filePath
    ){
        $result = $proceed($theme, $filePath);

        $viewConfig = $this->viewConfig->getViewConfig([
            'area' => $theme->getArea(),
            'themeModel' => $theme,
        ]);

        $arrayModules = explode(',', $viewConfig->getVarValue('Gemig_Requirejs', 'disable_list'));

        foreach ($result as $key => &$file) {
            /** @var \Magento\Framework\View\File $file */
            if (in_array($file->getModule(), $arrayModules)) {
                unset($result[$key]);
            }
        }

        return $result;
    }
}