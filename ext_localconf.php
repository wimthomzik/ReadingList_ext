<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Readinglist.Readinglist',
            'Bookfilter',
            [
                'Book' => 'filter'
            ],
            // non-cacheable actions
            [
                'Book' => 'filter'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        bookfilter {
                            iconIdentifier = readinglist-plugin-bookfilter
                            title = LLL:EXT:readinglist/Resources/Private/Language/locallang_db.xlf:tx_readinglist_bookfilter.name
                            description = LLL:EXT:readinglist/Resources/Private/Language/locallang_db.xlf:tx_readinglist_bookfilter.description
                            tt_content_defValues {
                                CType = list
                                list_type = readinglist_bookfilter
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'readinglist-plugin-bookfilter',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:readinglist/Resources/Public/Icons/user_plugin_bookfilter.svg']
			);
		
    }
);
