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

/**
 * An extension of the legal page class for a privacy page.
 *
 * @package SilverWare\Legals\Pages
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-legals
 */
class PrivacyPage extends LegalPage
{
    /**
     * Human-readable singular name.
     *
     * @var string
     * @config
     */
    private static $singular_name = 'Privacy Page';
    
    /**
     * Human-readable plural name.
     *
     * @var string
     * @config
     */
    private static $plural_name = 'Privacy Pages';
    
    /**
     * Description of this object.
     *
     * @var string
     * @config
     */
    private static $description = 'Shows privacy information for the website';
    
    /**
     * Icon file for this object.
     *
     * @var string
     * @config
     */
    private static $icon = 'silverware/legals: admin/client/dist/images/icons/PrivacyPage.png';
    
    /**
     * Defines the table name to use for this object.
     *
     * @var string
     * @config
     */
    private static $table_name = 'SilverWare_PrivacyPage';
    
    /**
     * Defines an ancestor class to hide from the admin interface.
     *
     * @var string
     * @config
     */
    private static $hide_ancestor = LegalPage::class;
    
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
              {entity} has provided this privacy policy to demonstrate our firm commitment to protecting your
              personal information and privacy. The following discloses our data gathering and dissemination
              practices for this site.
            </p>
            <p>
              If you have any inquiries about this privacy policy or our data collection practices, please
              <a href="{contact-link}">contact us</a>.
            </p>
            <h3>
              Information Collected
            </h3>
            <p>
              When you use our website, our system will automatically make a record of your visit and log the
              following information for analytical purposes:
            </p>
            <ul>
              <li>Your device\'s internet address (i.e. IP address)</li>
              <li>The top-level domain name (e.g. .com, .net, .org, .au etc.)</li>
              <li>The type of web browser and operating system you used</li>
              <li>The type of device you used</li>
              <li>The date and time of your visit</li>
              <li>The previous site visited</li>
              <li>Which pages are accessed</li>
              <li>Which files were downloaded</li>
              <li>The time spent on individual pages and the site overall</li>
            </ul>
            <p>
              We will make no attempt to identify individual users or their browsing activities except in the
              unlikely event of an investigation where a law enforcement agency (e.g. Australian Federal Police)
              makes use of a warrant to examine our service provider\'s log files.
            </p>
            <p>
              We collect no personal information about you unless you voluntarily choose to participate in an
              activity that requests such information, for example:
            </p>
            <ul>
              <li>Sending an email</li>
              <li>Registering as a member</li>
              <li>Participating in a survey</li>
              <li>Subscribing to a newsletter</li>
              <li>Making a payment or other transaction</li>
            </ul>
            <p>
              If you choose not to participate in activities such as these, your choice will in no way affect
              your ability to use this site.
            </p>
            <h3>
              Use of Collected Personal Information
            </h3>
            <p>
              Any personal information you choose to provide will be used solely for the purpose for which it was
              provided and will not be disclosed to other organisations or persons without your prior consent.
            </p>
            <p>
              The internet is an insecure medium and users must be aware that there are inherent risks when
              transmitting information across the internet. Any information which is submitted unencrypted
              via email or web forms may be at risk of being intercepted, read or modified.
            </p>
            <h3>
              Other Sites
            </h3>
            <p>
              This site may contain links to external sites. {entity} is not responsible for the content or
              privacy practices of these sites. For more information, please refer to our disclaimer statement.
            </p>
            <h3>
              Cookies
            </h3>
            <p>
              Cookies are small pieces of data that are stored by your browser on your device\'s internal storage.
            </p>
            <p>
              We may use cookies to track users as they browse through the site - for instance,
              we might use cookies to count the total number of unique users who are accessing the site over a
              particular period of time. This information will never be shared with a third party, except for the
              purposes of monitoring the site\'s usage statistics (e.g. Google Analytics).
            </p>'
        );
    }
}
