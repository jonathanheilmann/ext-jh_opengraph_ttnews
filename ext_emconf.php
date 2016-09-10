<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "jh_opengraph_ttnews".
 *
 * Auto generated 10-05-2016 10:34
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Open Graph Protocol for tt_news',
    'description' => 'Generates the facebook Open Graph Protocol parameters from tt_news item in single-view and adds them to the html-header.',
    'category' => 'plugin',
    'version' => '1.0.0',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearcacheonload' => true,
    'author' => 'Jonathan Heilmann',
    'author_email' => 'mail@jonathan-heilmann.de',
    'author_company' => '',
    'constraints' =>
        array(
            'depends' =>
                array(
                    'typo3' => '6.2.0-7.6.99',
                    'tt_news' => '3.5.2-',
                ),
            'conflicts' =>
                array(
                    'jh_opengraphprotocol' => '0.0.0-1.2.0'
                ),
            'suggests' =>
                array(
                    'jh_opengraphprotocol' => '1.2.1-'
                ),
        ),
);

