# The Final Countdown Bundle

This bundle set ups a day count down in the Symfony toolbar.
 
## Installation

1. Add the bundle to your composer.json file as dependency:

  ```bash
  composer require-dev javihgil/the-final-countdown-bundle
  ```

2. Load the bundle in the application kernel:

    ```php
    // app/AppKernel.php
    public function registerBundles()
    {
        // ...
        
        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            // ...
            $bundles[] = new Jhg\TheFinalCountdownBundle\JhgTheFinalCountdownBundle();
        }

        return $bundles;
    }
    ```
    
3. Configure the bundle

    ```yml
    # app/config/config_dev.yml
    jhg_the_final_countdown:
        end_date: 2015/03/02
    ```
