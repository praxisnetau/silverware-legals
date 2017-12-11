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

use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\TextField;

/**
 * An extension of the legal page class for a copyright page.
 *
 * @package SilverWare\Legals\Pages
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-legals
 */
class CopyrightPage extends LegalPage
{
    /**
     * Human-readable singular name.
     *
     * @var string
     * @config
     */
    private static $singular_name = 'Copyright Page';
    
    /**
     * Human-readable plural name.
     *
     * @var string
     * @config
     */
    private static $plural_name = 'Copyright Pages';
    
    /**
     * Description of this object.
     *
     * @var string
     * @config
     */
    private static $description = 'Shows copyright information for the website';
    
    /**
     * Icon file for this object.
     *
     * @var string
     * @config
     */
    private static $icon = 'silverware/legals: admin/client/dist/images/icons/CopyrightPage.png';
    
    /**
     * Defines the table name to use for this object.
     *
     * @var string
     * @config
     */
    private static $table_name = 'SilverWare_CopyrightPage';
    
    /**
     * Defines an ancestor class to hide from the admin interface.
     *
     * @var string
     * @config
     */
    private static $hide_ancestor = LegalPage::class;
    
    /**
     * Maps field names to field types for this object.
     *
     * @var array
     * @config
     */
    private static $db = [
        'YearStart' => 'Varchar(8)',
        'YearFinish' => 'Varchar(8)'
    ];
    
    /**
     * Maps token names to properties and methods for this object.
     *
     * @var array|string
     * @config
     */
    private static $token_mappings = [
        'year' => [
            'property' => 'Year'
        ]
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
                FieldGroup::create(
                    $this->fieldLabel('Years'),
                    [
                        TextField::create(
                            'YearStart',
                            ''
                        )->setAttribute('placeholder', $this->fieldLabel('YearStart')),
                        TextField::create(
                            'YearFinish',
                            ''
                        )->setAttribute('placeholder', $this->fieldLabel('YearFinish'))
                    ]
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
        
        $labels['Years'] = _t(__CLASS__ . '.YEARS', 'Years');
        $labels['YearStart'] = _t(__CLASS__ . '.START', 'Start');
        $labels['YearFinish'] = _t(__CLASS__ . '.FINISH', 'Finish');
        
        // Answer Field Labels:
        
        return $labels;
    }
    
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
              <strong>Copyright &copy; {entity} {year}. All Rights Reserved.</strong>
            </p>
            <p>
              <strong>Copyright of all material hosted on this site is owned by {entity}.</strong>
            </p>
            <p>
              You are permitted to download, display, distribute, print and reproduce, any material
              from this site, in an unaltered form only, for your private use, educational use,
              or non-commercial use, provided the copyright to such material is attributed to {entity}.
            </p>
            <p>
              Except as described above, you are not permitted to copy, adapt, publish, distribute or
              commercialise any material hosted on this site without prior written permission from {entity}.
            </p>
            <p>
              If you have an inquiry or a request for authorisation concerning the rights and reproduction
              of any material hosted on this site, you should send your request via the form on our
              <a href="{contact-link}">contact us</a> page.
            </p>
            <p>
              For further information, please refer to the Copyright Act 1968 (Commonwealth).
            </p>
            <p>
              Note that the copyright for materials appearing at other sites linked from this site, lies
              with the author of said materials, or the licensee of the author (subject to the operation of
              the Copyright Act 1968). {entity} suggests that you refer to the copyright statements on
              those sites before you consider using the materials.
            </p>'
        );
    }
    
    /**
     * Answers the year for the template.
     *
     * @return string
     */
    public function getYear()
    {
        if ($this->YearStart && $this->YearFinish) {
            return sprintf('%d-%d', $this->YearStart, $this->YearFinish);
        } elseif ($this->YearStart && !$this->YearFinish) {
            return sprintf('%d-%d', $this->YearStart, date('Y'));
        } elseif (!$this->YearStart && $this->YearFinish) {
            return $this->YearFinish;
        }
        
        return (string) date('Y');
    }
}
