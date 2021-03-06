# DMSTwigExtensionBundle

This bundle leverages a collection of Fabien Potencier's Twig Extensions for use in your application.

## Extensions

### Fabien's "Twig Extensions"

Available at [Fabien's repository](https://github.com/fabpot/Twig-extensions) these extensions are considered useful but do not belong in the Core of Twig, so they have been moved to this separate repository, they are:

* Text: truncate and wordwrap filter
* Debug: retrieves the token parser
* Intl: localized date filter
* i18n: trans filter and block (this extension conflicts with standard Symfony translator, so it is off by default, see Usage below.)

Further [documentation](https://github.com/fabpot/Twig-extensions/blob/master/doc/index.rst) is available in the repository.

### DMS Extensions

These are custom extensions which I find myself writing over and over for new projects.

* Textual Date: converts timestamp into dates like: `2 days ago` ([docs](/Resources/doc/textual_date.md))

## Installing

Simply run this

```
composer require dms/twig-extension-bundle
```
    
Load the bundle in your AppKernel

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new DMS\Bundle\TwigExtensionBundle\DMSTwigExtensionBundle(),
        );
    }
    
## Usage

To control which extensions should be enabled, you can optionally add configuration settings in app/config.yml:

    # Default settings
    dms_twig_extension:
        fabpot:
            array: true
            date: true
            i18n: false
            intl: true
            text: true
        dms:
            textual_date: true
            pad_string: true
        
Extensions set to `false` will not be loaded. Please refer to the extensions documentation for detailed usage on each one.

