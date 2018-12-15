# Magento2 Module that disables selected requirejs-config.js files from other modules

## Description

 You can set the modules to disable it whole requirejs in the magento2 backend, under `Store > Configuration > Advanced > Development > RequireJs Configuration`.
 
 You can enable the module, and select for which module the requirejs should be disabled.
 
 Clear cache after saving the new configuration.
 
 Be careful to not disable essential requirejs without given an alternative.

## Installation
   
   Just run from your magento2 root directory (or clone this repo to `app/code/Gemig/Requirejs`):
    
    composer require gemig/requirejs
  
    bin/magento module:enable Gemig_Requirejs
    
    bin/magento setup:upgrade
    
    bin/magento setup:di:compile
    
## Notes

 This module was created after a question posted in stack overflow and it comments.
    https://magento.stackexchange.com/q/139869/74078       

    
    