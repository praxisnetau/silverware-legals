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

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TextField;
use SilverWare\Extensions\Model\TokenMappingExtension;
use SilverWare\Forms\PageDropdownField;
use Page;

/**
 * An extension of the page class for the abstract parent class of legal pages.
 *
 * @package SilverWare\Legals\Pages
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-legals
 */
class LegalPage extends Page
{
    /**
     * Human-readable singular name.
     *
     * @var string
     * @config
     */
    private static $singular_name = 'Legal Page';
    
    /**
     * Human-readable plural name.
     *
     * @var string
     * @config
     */
    private static $plural_name = 'Legal Pages';
    
    /**
     * Defines the table name to use for this object.
     *
     * @var string
     * @config
     */
    private static $table_name = 'SilverWare_LegalPage';
    
    /**
     * Maps field names to field types for this object.
     *
     * @var array
     * @config
     */
    private static $db = [
        'EntityName' => 'Varchar(255)'
    ];
    
    /**
     * Defines the has-one associations for this object.
     *
     * @var array
     * @config
     */
    private static $has_one = [
        'ContactPage' => Page::class
    ];
    
    /**
     * Maps field and method names to the class names of casting objects.
     *
     * @var array
     * @config
     */
    private static $casting = [
        'ProcessedContent' => 'HTMLFragment'
    ];
    
    /**
     * Defines the extension classes to apply to this object.
     *
     * @var array
     * @config
     */
    private static $extensions = [
        TokenMappingExtension::class
    ];
    
    /**
     * Maps token names to properties and methods for this object.
     *
     * @var array|string
     * @config
     */
    private static $token_mappings = [
        'entity' => [
            'property' => 'Entity'
        ],
        'contact-link' => [
            'property' => 'ContactLink'
        ]
    ];
    
    /**
     * Defines the list item details to show for this object.
     *
     * @var array
     * @config
     */
    private static $list_item_details = [
        'date' => false
    ];
    
    /**
     * Defines the URL segments used to locate the contact page.
     *
     * @var array
     * @config
     */
    private static $contact_page_url_segments = [
        'contact',
        'contact-us'
    ];
    
    /**
     * Answers a list of field objects for the CMS interface.
     *
     * @return FieldList
     */
    public function getCMSFields()
    {
        // Obtain Field Objects (from parent):
        
        $fields = parent::getCMSFields();
        
        // Create Main Fields:
        
        $fields->addFieldsToTab(
            'Root.Main',
            [
                TextField::create(
                    'EntityName',
                    $this->fieldLabel('EntityName')
                ),
                PageDropdownField::create(
                    'ContactPageID',
                    $this->fieldLabel('ContactPageID')
                )
            ],
            'Content'
        );
        
        // Answer Field Objects:
        
        return $fields;
    }
    
    /**
     * Answers the labels for the fields of the receiver.
     *
     * @param boolean $includerelations Include labels for relations.
     *
     * @return array
     */
    public function fieldLabels($includerelations = true)
    {
        // Obtain Field Labels (from parent):
        
        $labels = parent::fieldLabels($includerelations);
        
        // Define Field Labels:
        
        $labels['EntityName'] = _t(__CLASS__ . '.ENTITYNAME', 'Entity name');
        $labels['ContactPageID'] = _t(__CLASS__ . '.CONTACTPAGE', 'Contact page');
        
        // Define Relation Labels:
        
        if ($includerelations) {
            $labels['ContactPage'] = _t(__CLASS__ . '.has_one_ContactPage', 'Contact Page');
        }
        
        // Answer Field Labels:
        
        return $labels;
    }
    
    /**
     * Answers the meta content for the receiver.
     *
     * @return DBHTMLText
     */
    public function getMetaContent()
    {
        return $this->obj('ProcessedContent');
    }
    
    /**
     * Answers the entity for the template.
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->EntityName ? $this->EntityName : $this->getSiteConfig()->Title;
    }
    
    /**
     * Answers the link to the contact page.
     *
     * @return string
     */
    public function getContactLink()
    {
        if ($this->ContactPageID) {
            return $this->ContactPage()->Link();
        }
        
        if ($page = $this->findContactPage()) {
            return $page->Link();
        }
        
        return '#';
    }
    
    /**
     * Answers the processed content for the template.
     *
     * @return string
     */
    public function getProcessedContent()
    {
        return $this->replaceTokens($this->Content);
    }
    
    /**
     * Attempts to locate and answer the contact page for the site.
     *
     * @return Page
     */
    protected function findContactPage()
    {
        $segments = $this->config()->contact_page_url_segments;
        
        return SiteTree::get()->filter('URLSegment', $segments)->filterByCallback(function ($item) {
            return ($item instanceof Page);
        })->first();
    }
}
