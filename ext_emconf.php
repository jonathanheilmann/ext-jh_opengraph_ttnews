<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "jh_opengraph_ttnews".
 *
 * Auto generated 23-02-2015 18:21
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Open Graph Protocol for tt_news',
	'description' => 'Generates the facebook Open Graph Protocol parameters from tt_news item in single-view and adds them to the html-header.',
	'category' => 'plugin',
	'version' => '0.1.4',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearcacheonload' => 0,
	'author' => 'Jonathan Heilmann',
	'author_email' => 'mail@jonathan-heilmann.de',
	'author_company' => '',
	'constraints' =>
	array (
		'depends' =>
		array (
			'typo3' => '4.5.0-6.2.99',
			'tt_news' => '3.5.2-'
		),
		'conflicts' =>
		array (
		),
		'suggests' =>
		array (
		),
	),
);

