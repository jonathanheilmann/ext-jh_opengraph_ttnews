<?php
namespace Heilmann\JhOpengraphTtnews\Hooks;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012-2016 Jonathan Heilmann <mail@jonathan-heilmann.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class OgRenderer
 * @package Heilmann\JhOpengraphpTtnews\Hooks
 */
class OgRenderer {

    /** @var string */
    protected $extKey = 'jh_opengraph_ttnews';

    /**
     * SignalSlotDispatcher
     *
     * @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher
     * @inject
     */
    protected $signalSlotDispatcher;

    /**
     * The extraItemMarkerProcessor function from tt_news
     *
     * @param $markerArray
     * @param $row
     * @param $conf
     * @param $pObj
     * @return array markerArray
     */
    public function extraItemMarkerProcessor($markerArray, $row, $conf, &$pObj) {
        if(GeneralUtility::inList($pObj->conf['tx_jhopengraphttnews.']['enableForWhatToDisplay'], $pObj->config['code'])) {
            $og = array();

            if ($this->signalSlotDispatcher == null) {
                /* @var \TYPO3\CMS\Extbase\Object\ObjectManager */
                $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
                $this->signalSlotDispatcher = $objectManager->get('TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher');
            }

            // Get title
            $og['title'] = $markerArray['###NEWS_TITLE###'] != '' ? $markerArray['###NEWS_TITLE###'] : $row['title'];

            // Get type
            $og['type'] = 'article';

            // Get images
            if($row['image'] != '')
            {
                $images = GeneralUtility::trimExplode(',', $row['image'], true);

                foreach ($images as $image)
                {
                    if(strpos($image , '.pdf'))
                    {
                        $picConf['file'] = 'uploads/pics/' . $image;
                        $picConf['file.']['width'] = 403; // width for Facebook-pics
                        $og['image'][] = $GLOBALS['TSFE']->cObj->IMG_RESOURCE($picConf);
                    } else
                    {
                        $og['image'][] = $GLOBALS['TSFE']->tmpl->getFileName('uploads/pics/' . $image);
                    }
                }
            } else if ($pObj->conf['tx_jhopengraphttnews.']['nopic_path'])
            {
                $og['image'][] = $GLOBALS['TSFE']->tmpl->getFileName($pObj->conf['tx_jhopengraphttnews.']['nopic_path']);
            }

            // Get url
            $og['url'] = htmlentities(GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL')); //now compatibel with CoolURI - thanks to thomas@chaschperli.ch

            // get site_name
            $og['site_name'] = $GLOBALS['TSFE']->tmpl->setup['sitetitle'] != '' ? $GLOBALS['TSFE']->tmpl->setup['sitetitle'] : $GLOBALS['TSFE']->TYPO3_CONF_VARS['SYS']['sitename'];

            // Get description
            $og['description'] = GeneralUtility::fixed_lgd_cs(strip_tags($markerArray['###NEWS_SUBHEADER###'] != '' ? $markerArray['###NEWS_SUBHEADER###'] : $markerArray['###NEWS_CONTENT###']), 100);

            // Get locale
            $localeParts = explode('.', $GLOBALS['TSFE']->tmpl->setup['config.']['locale_all']);
            if (isset($localeParts[0])) {
                $og['locale'] = str_replace('-', '_', $localeParts[0]);
            }

            // Signal to manipulate og-properties before header creation
            $this->signalSlotDispatcher->dispatch(
                __CLASS__,
                'beforeHeaderCreation',
                array(&$og, $markerArray, $row, $conf, $pObj)
            );

            // Render and add header
            $GLOBALS['TSFE']->additionalHeaderData[$this->extKey] = $this->renderHeaderLines($og);
        }

        return $markerArray;
    }

    /**
     * Renders the header lines to be added from array
     *
     * @param	array		$array
     * @return	string
     */
    protected function renderHeaderLines($array)
    {
        $res = array();
        foreach ($array as $key => $value)
        {
            if (!empty($value))
            {
                // Skip empty values to prevent from empty og property
                if (is_array($value))
                {
                    // A op property with multiple values or child-properties
                    if (array_key_exists('0', $value))
                    {
                        // A og property that accepts more than one value
                        foreach ($value as $multiPropertyValue)
                        {
                            // Render each value to a new og property meta-tag
                            if ($key == 'image')
                            {
                                // Add image details
                                $absImagePath = GeneralUtility::getFileAbsFileName($multiPropertyValue);
                                if (file_exists($absImagePath))
                                {
                                    $imageSize = getimagesize($absImagePath);

                                    $res[] = $this->buildProperty($key,
                                        GeneralUtility::locationHeaderUrl($multiPropertyValue));
                                    if ($imageSize['mime'])
                                        $res[] = $this->buildProperty($key . ':type', $imageSize['mime']);
                                    if ($imageSize[0])
                                        $res[] = $this->buildProperty($key . ':width', $imageSize[0]);
                                    if ($imageSize[1])
                                        $res[] = $this->buildProperty($key . ':height', $imageSize[1]);
                                }
                            } else
                            {
                                $res[] = $this->buildProperty($key, $multiPropertyValue);
                            }
                        }
                    } else
                    {
                        // A og property with child-properties
                        $res .= $this->renderHeaderLines($this->remapArray($key, $value));
                    }
                } else
                {
                    // A single og property to be rendered
                    $res[] = $this->buildProperty($key, $value);
                }
            }
        }
        return implode(chr(10), ArrayUtility::flatten($res));
    }

    /**
     * Build meta property tag
     *
     * @param   string  $key
     * @param   string  $value
     * @return  string
     */
    protected function buildProperty($key, $value)
    {
        return '<meta property="og:' . $key . '" content="' . $value . '" />';
    }

    /**
     * Remap an array: Add $prefixKey to keys of $array
     *
     * @param	string	$prefixKey
     * @param	array		$array
     * @return	array
     */
    protected function remapArray($prefixKey, $array)
    {
        $res = array();
        foreach ($array as $key => $value)
            $res[$prefixKey.':'.$key] = $value;

        return $res;
    }
}
