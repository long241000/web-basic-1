CREATE DATABASE SHOPPINGONLINE;
USE SHOPPINGONLINE;
CREATE TABLE `category` (
  `cateId` int(50) NOT NULL AUTO_INCREMENT,
  `cateName` varchar(50) NOT NULL DEFAULT '',
  `isShow` tinyint(1) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `modifyDate` date DEFAULT NULL,
  PRIMARY KEY (`cateId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `customer` (
  `customerId` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

CREATE TABLE `order` (
  `orderId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customerId` int(11) DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `orderCostTotal` double DEFAULT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `order_detail` (
  `orderId` int(11) NOT NULL,
  `proId` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `orderDetailCost` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderId`,`proId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `product` (
  `proId` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `proCateID` int(30) NOT NULL,
  `proImage` varchar(50) DEFAULT NULL,
  `proName` varchar(30) NOT NULL DEFAULT '',
  `proDesc` varchar(500) DEFAULT NULL,
  `proContent` text,
  `proMadeIn` varchar(50) DEFAULT NULL,
  `proCost` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `isShow` tinyint(1) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `modifyDate` date DEFAULT NULL,
  `proOrdered` int(11) DEFAULT NULL,
  PRIMARY KEY (`proId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;