#
# Table structure for table 'tx_readinglist_domain_model_book'
#
CREATE TABLE tx_readinglist_domain_model_book (

	name varchar(255) DEFAULT '' NOT NULL,
	isbn int(11) DEFAULT '0' NOT NULL,
	category int(11) unsigned DEFAULT '0',
	author int(11) unsigned DEFAULT '0',
	status int(11) unsigned DEFAULT '0'

);

#
# Table structure for table 'tx_readinglist_domain_model_category'
#
CREATE TABLE tx_readinglist_domain_model_category (

	category_name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_readinglist_domain_model_author'
#
CREATE TABLE tx_readinglist_domain_model_author (

	name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_readinglist_domain_model_readingstatus'
#
CREATE TABLE tx_readinglist_domain_model_readingstatus (

	status smallint(5) unsigned DEFAULT '0' NOT NULL

);
