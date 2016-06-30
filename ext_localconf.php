<?php
if (!defined ('TYPO3_MODE'))
     die ('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['extraItemMarkerHook'][] =  'Heilmann\\JhOpengraphTtnews\\Hooks\\OgRenderer';
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['sViewSelectConfHook']['jh_opengraph_ttnews'] = 'Heilmann\\JhOpengraphTtnews\\Hooks\\DisplaySingle';