<?php

declare(strict_types=1);

namespace Guidance\Tests\Project\Test\Project;

class DemoCest extends \Guidance\Tests\Project\Test\BaseAbstract
{
    // ########################################

    protected function processStateAndPreconditions(): void
    {
        /**
         * ========================================
         *               EXAMPLE USE
         * ========================================
         */

        // ========================================Data registry

        $city1 = $this->dataGenerator->getCity();
        $city2 = $this->dataGenerator->getCity();

        $email         = $this->dataGenerator->getEmail();
        $country       = $this->dataGenerator->getCountry();
        $streetAddress = $this->dataGenerator->getStreetAddress();

        // ========================================Data provider

        $testIndividualData = $this->dataSetProviderIndividual->getData('/city_chic/PDP/id/');
        $testIndividualFile = $this->dataSetProviderIndividual->getFile('guid.png');

        $testGeneralData = $this->dataSetProviderGeneral->getData('/browser/chrome/extension/store/');
        $testGeneralFile = $this->dataSetProviderGeneral->getFile('/browser/chrome/extension/watermark.png');
    }

    // ########################################


    public function PopCultcha(\Guidance\Tests\Project\Actor $I)
    {

        $I->amOnUrl('https://www.popcultcha.com.au/');
        $I->maximizeWindow();
        $I->wait(5);
        // $I->waitForText('cart', 30); // secs

        // Get rid of uses cookies
        $I->click(['css' => '.cc-btn']);
        $I->wait(5);

        // ****************************
        // Sign In
        //  *******************************

        //$I->click(['css' => 'body > div.cc-window.cc-floating.cc-type-default.cc-theme-edgeless.cc-bottom.cc-left.cc-color-override-2042708126 > div > a']);
        //$I->wait(3);

        /**
        $I->amOnPage('/customer/account/');
        $I->fillField(['css' => 'fieldset.fieldset:nth-child(2) > div:nth-child(1) > div:nth-child(2) > input:nth-child(1)'], 'wayne.hazle@guidance.com');
        $I->wait(1);
        $I->fillField(['css' => 'fieldset.fieldset:nth-child(2) > div:nth-child(2) > div:nth-child(2) > input:nth-child(1)'], '@Jwjw5050');
        $I->wait(3);
        $I->click(['css' => '.recaptcha-checkbox-border']);
        $I->wait(4);
        $I->click(['css' => 'button.login > span:nth-child(1)']);
        $I->wait(4);
        */


        // *****************************************************************************
        //  GO TO PLP - Editor's Pick & Test Sorting
        // ***********************************************************
        // 2. Go to Simple SHOP ALL PLP page----------------------------------------------------------------------------
        $I->amOnPage('/statues-and-replicas/statues-and-replicas/shop-all.html');
        $I->waitForText('DC', 30); // secs
        $I->see('DC');

        // Use Sorter
        $I->click(['id' => 'sorter']);
        $I->wait(1);
        $I->click(['css' => '#sorter > option:nth-child(3)']);
        $I->wait(5);


        // *****************************************************************************
        //  Go to a PDP and Add to Cart
        // ***********************************************************
        $I->amOnPage('/batman-batgirl-adult-costume.html');
        $I->waitForText('Batgirl', 30); // secs
        $I->see('Batgirl');
        //  Choose Medium
        $I->wait(2);
        $I->click(['css' => '#option-label-tee_size-302-item-13102']);
        //  Change QTY
        $I->wait(2);
        $I->click(['css' => 'button.qty-button:nth-child(3)']);

        // Click Add to Cart
        $I->see('Add to Cart');
        $I->click(['css' => '#product-addtocart-button-clone > span:nth-child(1)']);
        //$I->waitForText('Added to cart!');
        $I->wait(5);


        // *****************************************************************************
        //  Go to Shopping Cart
        // ***********************************************************
        $I->amOnPage('/checkout/cart/');
        $I->waitForText('Shipping', 30); // secs
        $I->see('Shipping');

    }


    // ########################################
}