<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Readinglist.Readinglist',
            'Bookfilter',
            'bookFilter'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('readinglist', 'Configuration/TypoScript', 'readinglist');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_readinglist_domain_model_book', 'EXT:readinglist/Resources/Private/Language/locallang_csh_tx_readinglist_domain_model_book.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_readinglist_domain_model_book');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_readinglist_domain_model_category', 'EXT:readinglist/Resources/Private/Language/locallang_csh_tx_readinglist_domain_model_category.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_readinglist_domain_model_category');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_readinglist_domain_model_author', 'EXT:readinglist/Resources/Private/Language/locallang_csh_tx_readinglist_domain_model_author.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_readinglist_domain_model_author');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_readinglist_domain_model_readingstatus', 'EXT:readinglist/Resources/Private/Language/locallang_csh_tx_readinglist_domain_model_readingstatus.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_readinglist_domain_model_readingstatus');

    }
);
