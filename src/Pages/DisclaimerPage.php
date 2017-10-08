<?php

/**
 * This file is part of SilverWare.
 *
 * PHP version >=5.6.0
 *
 * For full copyright and license information, please view the
 * LICENSE.md file that was distributed with this source code.
 *
 * @package SilverWare\Legals\Pages
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-legals
 */

namespace SilverWare\Legals\Pages;

use SilverStripe\Control\Director;

/**
 * An extension of the legal page class for a disclaimer page.
 *
 * @package SilverWare\Legals\Pages
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-legals
 */
class DisclaimerPage extends LegalPage
{
    /**
     * Human-readable singular name.
     *
     * @var string
     * @config
     */
    private static $singular_name = 'Disclaimer Page';
    
    /**
     * Human-readable plural name.
     *
     * @var string
     * @config
     */
    private static $plural_name = 'Disclaimer Pages';
    
    /**
     * Description of this object.
     *
     * @var string
     * @config
     */
    private static $description = 'Shows disclaimer information for the website';
    
    /**
     * Icon file for this object.
     *
     * @var string
     * @config
     */
    private static $icon = 'silverware/legals: admin/client/dist/images/icons/DisclaimerPage.png';
    
    /**
     * Defines an ancestor class to hide from the admin interface.
     *
     * @var string
     * @config
     */
    private static $hide_ancestor = LegalPage::class;
    
    /**
     * Maps token names to properties and methods for this object.
     *
     * @var array|string
     * @config
     */
    private static $token_mappings = [
        'host' => [
            'property' => 'Host'
        ]
    ];
    
    /**
     * Populates the default values for the fields of the receiver.
     *
     * @return void
     */
    public function populateDefaults()
    {
        // Populate Defaults (from parent):
        
        parent::populateDefaults();
        
        // Populate Defaults:
        
        $this->Content = _t(
            __CLASS__ . '.DEFAULTCONTENT', '
            <p>
              The material hosted on <strong>{host}</strong> is provided strictly for information purposes only.
            </p>
            <p>
              {entity} has made this material available on the understanding that users of this site shall
              exercise their own care and diligence in respect to its use. Before relying on the material
              provided by this site in any matter of importance, users should examine the source, accuracy,
              currency, relevance and completeness of the material for their requirements and should seek
              appropriate professional advice for their particular circumstances.
            </p>
            <p>
              The material hosted at this site may include the opinions or recommendations of third parties,
              which do not necessarily reflect the views of {entity}, or indicate its commitment to a particular
              point of view or a certain course of action.
            </p>
            <p>
              Any links to other sites are provided \'as is\', are given for convenience and do not constitute
              an approval or endorsement of the material found at those sites, or any associated organisation,
              service or product. The listing of a company or a person in any section of this site in no way
              implies any form of approval or endorsement by {entity} of the services or products provided by
              that company or person.
            </p>
            <p>
              {entity} has no control or responsibility for any such linked external information sources. Links
              to other sites have been made in good faith and in the expectation that the external content is
              appropriately maintained by the author organisation or agency and is timely and accurate.
            </p>
            <p>
              It is solely the responsibility of users to make their own decisions about the accuracy, currency
              and relevance of the material provided at other sites. {entity} makes no guarantee or warranties
              that external material linked from this site is free of infection by computer viruses, malware
              or any other form of contamination. {entity} accepts no liability whatsoever for any damage or
              interference with a user\'s computer, software or data occurring in connection with or relating
              to this site or its use, or any other site linked to this site.
            </p>
            <p>
              If you use language translation services such as Google Translate with this site, you do so at
              your own risk. Please understand that machine translation is an imperfect service, and {entity}
              accepts no responsibility for incorrect translations of material hosted on this site.
            </p>
            <p>
              By accessing the material at or through this site each user releases and waives {entity} to
              the full extent permitted by law from any and all claims related to the use of the material made
              available through the site. In no event shall {entity} be held liable or responsible for any
              incident or consequential damages resulting from use of the material. {entity} cannot be held
              responsible for the placement or positioning of a link to this site on any other site.
            </p>'
        );
    }
    
    /**
     * Answers the host for the template.
     *
     * @return string
     */
    public function getHost()
    {
        return Director::host();
    }
}
