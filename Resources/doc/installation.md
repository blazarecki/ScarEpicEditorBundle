# Installation

Require the bundle in your composer.json file:

``` json
{
    "require": {
        "benjaminlazarecki/scarepiceditor-bundle": "0.1.*",
    }
}
```

Register the bundle:

``` php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        new Scar\EpicEditorBundle\ScarEpicEditorBundle(),
        // ...
    );
}
```

Install the bundle:

``` bash
$ composer update benjaminlazarecki/scarepiceditor-bundle
```

Enjoy!
