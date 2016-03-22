-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- 호스트: localhost
-- 처리한 시간: 15-11-08 13:12 
-- 서버 버전: 5.1.41
-- PHP 버전: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `findroom`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `r_num` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '방주인',
  `r_area` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '지역(솔뫼,논골)',
  `r_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '방이름',
  `r_address` text COLLATE utf8_unicode_ci NOT NULL COMMENT '방주소',
  `r_loc_x` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'x좌표',
  `r_loc_y` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'y좌표',
  `r_rent_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '임대방식',
  `r_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '방종류',
  `r_deposit` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '보증금',
  `r_pay_month` varchar(10) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '월세',
  `r_pay_year` varchar(10) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '사글세',
  `r_pay_jun` varchar(10) COLLATE utf8_unicode_ci DEFAULT '0',
  `r_size` varchar(20) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '방사이즈',
  `r_midnight` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n' COMMENT '심야전기유무',
  `r_tax_gas` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n' COMMENT '가스비 유무',
  `r_tax_boiler` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n' COMMENT '난방비 유무',
  `r_tax_elec` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n' COMMENT '전기세 유무',
  `r_tax_water` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n' COMMENT '수도세 유무',
  `r_tax_internet` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n' COMMENT '인터넷 유무',
  `r_photo` text COLLATE utf8_unicode_ci NOT NULL,
  `r_photo_k` text COLLATE utf8_unicode_ci,
  `r_photo_b` text COLLATE utf8_unicode_ci,
  `r_photo_r` text COLLATE utf8_unicode_ci,
  `r_comment` text COLLATE utf8_unicode_ci NOT NULL COMMENT '한줄설명',
  `r_detail` text COLLATE utf8_unicode_ci,
  `r_state` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`r_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=117 ;

--
-- 테이블의 덤프 데이터 `room`
--

INSERT INTO `room` (`r_num`, `u_id`, `r_area`, `r_name`, `r_address`, `r_loc_x`, `r_loc_y`, `r_rent_type`, `r_type`, `r_deposit`, `r_pay_month`, `r_pay_year`, `r_pay_jun`, `r_size`, `r_midnight`, `r_tax_gas`, `r_tax_boiler`, `r_tax_elec`, `r_tax_water`, `r_tax_internet`, `r_photo`, `r_photo_k`, `r_photo_b`, `r_photo_r`, `r_comment`, `r_detail`, `r_state`) VALUES
(65, 'ug9945', 's', '카카오플러스원룸', '경상북도 안동시 송천동 867', '128.7926264', '36.5430057', 'y', 'o', '300000', '0', '3700000', '0', '입력안함', 'n', 'n', 'n', 'y', 'n', 'n', 'ug9945_20151103021444_thum.jpg', 'ug9945_20151103021444_kitchen.jpg', 'ug9945_20151103021444_bathroom.jpg', 'ug9945_20151103021444_room.jpg', '좋습니다', '', 'y'),
(62, 'ug9945', 'n', '베이스캠프 원룸', '경상북도 안동시 송천동 478-9', '128.7966377', '36.5407864', 'y', 'o', '150000', '0', '2400000', '0', '입력안함', 'n', 'n', 'n', 'y', 'n', 'n', 'ug9945_20151103014759_thum.jpg', 'ug9945_20151103014759_kitchen.jpg', 'ug9945_20151103014759_bathroom.jpg', '', '좋습니다.', '', 'y'),
(59, 'ug9945', 's', '한아름 원룸', '경상북도 안동시 송천1길  55', '128.7904041', '36.5446181', 'y', 'o', '50000', '0', '2300000', '0', '입력안함', 'n', 'n', 'n', 'y', 'n', 'n', 'ug9945_20151103014207_thum.jpg', 'ug9945_20151103014207_kitchen.jpg', 'ug9945_20151103014207_bathroom.jpg', 'ug9945_20151103014207_room.jpg', '좋습니다.', '', 'y'),
(60, 'ug9945', 's', '동광빌', '경상북도 안동시 송천1길  42-1', '128.7896978', '36.5446785', 'y', 'o', '200000', '0', '2500000', '0', '입력안함', 'y', 'n', 'n', 'y', 'n', 'n', 'ug9945_20151103014337_thum.jpg', 'ug9945_20151103014337_kitchen.jpg', 'ug9945_20151103014337_bathroom.jpg', 'ug9945_20151103014337_room.jpg', '좋습니다.', '관리비 월 20,000원', 'y'),
(57, 'ug9945', 's', '포스빌', '경상북도 안동시 송천2길  59-10', '128.7918898', '36.5437409', 'y', 'o', '0', '0', '3500000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151103013731_thum.jpg', 'ug9945_20151103013731_kitchen.jpg', 'ug9945_20151103013731_bathroom.jpg', 'ug9945_20151103013731_room.jpg', '좋습니다.', '', 'y'),
(56, 'ug9945', 's', '깜닥깜닭', '경상북도 안동시 송천2길  72-24', '128.7932288', '36.5429644', 'm', 'o', '300000', '250000', '00000', '0', '입력안함', 'y', 'n', 'n', 'y', 'n', 'y', 'ug9945_20151103013530_thum.jpg', 'ug9945_20151103013530_kitchen.jpg', 'ug9945_20151103013530_bathroom.jpg', 'ug9945_20151103013530_room.jpg', '좋습니다.', '', 'n'),
(84, 'PM', 's', '밀레니엄', '경상북도 안동시 송천1길  146-16', '128.7948283', '36.5447678', 'y', 'o', '200000', '0', '2600000', '0', '2', 'y', 'y', 'n', 'y', 'y', 'y', 'PM_20151105031545_thum.jpg', 'PM_20151105025953_kitchen.jpg', 'PM_20151105025953_bathroom.jpg', '', '몰랑', '', 'y'),
(55, 'ug9945', 's', '다인원룸', '경상북도 안동시 송천2길  88-18', '128.7934284', '36.5440256', 'y', 'o', '200000', '0', '2700000', '0', '8', 'n', 'n', 'n', 'y', 'y', 'y', 'ug9945_20151103012534_thum.jpg', 'ug9945_20151103012534_kitchen.jpg', 'ug9945_20151103012534_bathroom.jpg', 'ug9945_20151103012534_room.jpg', '좋습니다', '계약 시 기름 400L 지급', 'y'),
(52, 'PM', 's', '한그늘', '경상북도 안동시 송천1길  138', '128.7942607', '36.5446239', 'y', 'o', '300000', '0', '3300000', '0', '5', 'n', 'y', 'n', 'y', 'n', 'y', 'PM_20151103082834_thum.jpg', 'PM_20151103082834_kitchen.jpg', 'PM_20151103082834_bathroom.jpg', 'PM_20151103082834_room.jpg', '-', '', 'y'),
(53, 'PM', 's', '성균관', '경상북도 안동시 송천동 879-5', '128.7919874', '36.54406', 'y', 'o', '500000', '0', '4400000', '0', '5', 'n', 'y', 'n', 'y', 'y', 'y', 'PM_20151103083023_thum.jpg', 'PM_20151103083023_kitchen.jpg', 'PM_20151103083023_bathroom.jpg', 'PM_20151103083023_room.jpg', '2명 살면 10만원 더 비쌈', '', 'y'),
(63, 'ug9945', 's', '빨간벽돌집 원룸', '경상북도 안동시 송천1길  145-4', '128.7940263', '36.5453905', 'y', 'o', '200000', '0', '3500000', '0', '입력안함', 'y', 'n', 'n', 'y', 'n', 'n', 'ug9945_20151103015810_thum.jpg', 'ug9945_20151103015810_kitchen.jpg', 'ug9945_20151103015810_bathroom.jpg', 'ug9945_20151103015810_room.jpg', '좋습니다', '', 'y'),
(64, 'ug9945', 's', '승지원룸', '경상북도 안동시 송천1길  145-5', '128.7937724', '36.5452152', 'y', 'o', '200000', '0', '2800000', '0', '입력안함', 'y', 'n', 'n', 'y', 'n', 'n', 'ug9945_20151103020053_thum.jpg', 'ug9945_20151103020053_kitchen.jpg', 'ug9945_20151103020053_bathroom.jpg', 'ug9945_20151103020053_room.jpg', '좋습니다', '', 'y'),
(69, 'ug9945', 's', '스마일 하우스', '경상북도 안동시 송천동 345-6', '128.7955033', '36.5456355', 'y', 'o', '100000', '0', '2900000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151103035427_thum.jpg', 'ug9945_20151103035427_kitchen.jpg', '', 'ug9945_20151103035427_room.jpg', '좋습니다', '', 'y'),
(68, 'ug9945', 's', '스웨덴원룸', '경상북도 안동시 송천1길  145-11', '128.7934245', '36.5453677', 'y', 'o', '200000', '0', '3400000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151103031927_thum.jpg', 'ug9945_20151103031927_kitchen.jpg', 'ug9945_20151103031927_bathroom.jpg', '', '좋습니다', '', 'n'),
(70, 'ug9945', 's', '솔뫼 오피스텔', '경상북도 안동시 송천동 683-1', '128.7913615', '36.5418018', 'y', 'o', '0', '0', '2400000', '0', '입력안함', 'y', 'y', 'n', 'y', 'n', 'n', 'ug9945_20151103041140_thum.jpg', 'ug9945_20151103041140_kitchen.jpg', 'ug9945_20151103041140_bathroom.jpg', 'ug9945_20151103041140_room.jpg', '좋습니다.', '', 'y'),
(73, 'PM', 's', '핀란드', '경상북도 안동시 송천1길  145-15', '128.7932121', '36.5452408', 'y', 'o', '200000', '0', '3400000', '0', '3', 'n', 'y', 'n', 'y', 'n', 'y', 'PM_20151103074821_thum.jpg', 'PM_20151103074821_kitchen.jpg', 'PM_20151103074821_bathroom.jpg', 'PM_20151103074821_room.jpg', '방마다 구조와 크기가 다름.', '', 'y'),
(76, 'PM', 's', '경래원룸', '경상북도 안동시 송천1길  135', '128.7937241', '36.5449287', 'y', 'o', '100000', '0', '2300000', '0', '3', 'y', 'y', 'n', 'y', 'n', 'n', 'PM_20151104102755_thum.jpg', 'PM_20151104102755_kitchen.jpg', 'PM_20151104102755_bathroom.jpg', 'PM_20151104102755_room.jpg', '가스비는 연말에 정산', '', 'y'),
(77, 'PM', 's', '더바삭건물', '경상북도 안동시 송천1길  102', '128.7923448', '36.5444722', 'y', 'o', '200000', '0', '2100000', '0', '2', 'n', 'y', 'y', 'y', 'y', 'y', 'PM_20151104103335_thum.jpg', 'PM_20151104103335_kitchen.jpg', 'PM_20151104103335_bathroom.jpg', 'PM_20151104103335_room.jpg', '절기마다 보일러세가 달라짐', '', 'n'),
(78, 'ymw9801', 's', '호성주택', '경상북도 안동시 송천동 714', '128.7898434', '36.54284', 'y', 't', '310000', '0', '3500000', '0', '입력안함', 'n', 'n', 'y', 'y', 'n', 'n', 'admin_20151105035105_thum.jpg', 'admin_20151105035125_kitchen.jpg', 'ymw9801_20151105015017_bathroom.jpg', 'ymw9801_20151105015017_room.jpg', '넓고 좋은 투룸입니다.', '공유기가 있어서 와이파이가 무료입니다. <br />\r\nCCTV가 각 층과 입구에 설치되어있어 치안이 좋고 자전거 거치대가 있습니다.', 'y'),
(85, 'ug9945', 's', '마이하우스', '경상북도 안동시 송천1길  43-46', '128.7908119', '36.5446156', 'y', 'o', '100000', '0', '3000000', '0', '입력안함', 'n', 'n', 'n', 'y', 'n', 'n', 'ug9945_20151105030359_thum.jpg', 'ug9945_20151105030359_kitchen.jpg', 'ug9945_20151105030359_bathroom.jpg', '', '좋습니다', '', 'y'),
(86, 'ug9945', 's', '에바다하우스', '경상북도 안동시 송천2길  59-12', '128.7916688', '36.5437045', 'y', 't', '200000', '0', '4500000', '0', '입력안함', 'n', 'n', 'y', 'y', 'y', 'y', 'ug9945_20151105030930_thum.jpg', 'ug9945_20151105030930_kitchen.jpg', 'ug9945_20151105030930_bathroom.jpg', 'ug9945_20151105030930_room.jpg', '좋습니다', '', 'y'),
(88, 'ug9945', 's', 'E 하우스', '경상북도 안동시 송천1길  7', '128.7883482', '36.5456271', 'y', 'o', '300000', '0', '3300000', '0', '입력안함', 'n', 'y', 'n', 'y', 'n', 'n', 'ug9945_20151105031751_thum.jpg', 'ug9945_20151105031751_kitchen.jpg', 'ug9945_20151105031751_bathroom.jpg', 'ug9945_20151105031751_room.jpg', '좋습니다', '', 'y'),
(89, 'ug9945', 's', '프랑스원룸', '경상북도 안동시 송천1길  145-19', '128.7931692', '36.5455359', 'y', 'o', '200000', '0', '3300000', '0', '입력안함', 'n', 'y', 'n', 'y', 'n', 'n', 'ug9945_20151105033406_thum.jpg', 'ug9945_20151105033406_kitchen.jpg', 'ug9945_20151105033406_bathroom.jpg', 'ug9945_20151105033406_room.jpg', '좋습니다.', '', 'y'),
(91, 'ug9945', 's', '녹색원룸', '경상북도 안동시 송천1길  85', '128.7912318', '36.5447111', 'y', 'o', '0', '0', '2100000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106100751_thum.jpg', 'ug9945_20151106100751_kitchen.jpg', 'ug9945_20151106100751_bathroom.jpg', 'ug9945_20151106100751_room.jpg', '좋습니다', '', 'y'),
(92, 'ug9945', 'n', '오디션 노래방 위', '경상북도 안동시 논골길  47', '128.7967233', '36.5406062', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106101107_thum.jpg', '', '', 'ug9945_20151106101107_room.jpg', '좋습니다.', '', 'y'),
(93, 'ug9945', 'n', '에이플러스 원룸', '경상북도 안동시 논골길  46', '128.7970215', '36.5403023', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106101427_thum.jpg', '', '', 'ug9945_20151106101427_room.jpg', '굿', '', 'y'),
(94, 'ug9945', 'n', '포토원룸', '경상북도 안동시 논골길  37', '128.7965212', '36.5401948', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106101533_thum.jpg', '', '', 'ug9945_20151106101533_room.jpg', '굿', '', 'y'),
(95, 'ug9945', 'n', '어제 그집 위 원룸', '경상북도 안동시 논골길  37-2', '128.7966232', '36.5402729', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106101649_thum.jpg', '', '', 'ug9945_20151106101649_room.jpg', '굿', '', 'y'),
(96, 'ug9945', 'n', '학사원룸', '경상북도 안동시 논골길  34', '128.796651', '36.5399569', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106101820_thum.jpg', '', '', 'ug9945_20151106101820_room.jpg', '굿', '', 'y'),
(97, 'ug9945', 'n', '코스모빌', '경상북도 안동시 논골길  26', '128.7961842', '36.5396712', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106101946_thum.jpg', '', '', 'ug9945_20151106101946_room.jpg', '굿', '', 'y'),
(98, 'ug9945', 'n', '추억이야기 원룸', '경상북도 안동시 논골길  21', '128.795891', '36.5397657', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102035_thum.jpg', '', '', 'ug9945_20151106102035_room.jpg', '굿', '', 'y'),
(99, 'ug9945', 'n', '스위트하우스', '경상북도 안동시 논골길  19', '128.7957589', '36.5396553', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102134_thum.jpg', '', '', '', '굿', '', 'y'),
(100, 'ug9945', 'n', '써니원룸', '경상북도 안동시 논골길  17', '128.7956712', '36.5395714', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102213_thum.jpg', '', '', 'ug9945_20151106102213_room.jpg', '굿', '', 'y'),
(101, 'ug9945', 'n', '골든벨 원룸', '경상북도 안동시 논골길  18', '128.7959313', '36.5395632', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102335_thum.jpg', '', '', 'ug9945_20151106102335_room.jpg', '굿', '', 'y'),
(102, 'ug9945', 'n', '대영이네집', '경상북도 안동시 논골길  16', '128.7958409', '36.5394122', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102419_thum.jpg', '', '', 'ug9945_20151106102419_room.jpg', '굿', '', 'y'),
(103, 'ug9945', 'n', '고운별 원룸', '경상북도 안동시 논골길  12', '128.7957778', '36.53932', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102454_thum.jpg', '', '', 'ug9945_20151106102454_room.jpg', '굿', '', 'y'),
(104, 'ug9945', 'n', '포에버빌', '경상북도 안동시 논골길  8', '128.7958464', '36.5391815', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102531_thum.jpg', '', '', '', '굿', '', 'y'),
(105, 'ug9945', 's', '창빛원룸', '경상북도 안동시 논골길  5', '128.7953557', '36.5391518', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102612_thum.jpg', '', '', 'ug9945_20151106102612_room.jpg', '굿', '', 'y'),
(106, 'ug9945', 'n', '해오름빌', '경상북도 안동시 논골길  110', '128.7963403', '36.5391395', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102644_thum.jpg', '', '', '', '굿', '', 'y'),
(107, 'ug9945', 'n', '파인빌', '경상북도 안동시 논골길  104', '128.7964182', '36.5393153', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102715_thum.jpg', '', '', '', '굿', '', 'y'),
(108, 'ug9945', 's', '송일원룸', '경상북도 안동시 논골길  97', '128.7966708', '36.539508', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102804_thum.jpg', '', '', 'ug9945_20151106102804_room.jpg', '굿', '', 'y'),
(109, 'ug9945', 'n', '파란원룸', '경상북도 안동시 논골길  89-4', '128.7970284', '36.5396537', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106102842_thum.jpg', '', '', '', '굿', '', 'y'),
(110, 'ug9945', 'n', '한누리 원룸', '경상북도 안동시 논골길  71-1', '128.7979573', '36.5400964', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106103001_thum.jpg', '', '', 'ug9945_20151106103001_room.jpg', '굿', '', 'y'),
(113, 'ug9945', 's', 'PD원룸', '경상북도 안동시 송천2길  52', '128.7915702', '36.5430087', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106103852_thum.jpg', '', '', '', '굿', '', 'y'),
(112, 'ug9945', 's', '해피하우스', '경상북도 안동시 송천2길  45', '128.7912688', '36.5431882', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106103611_thum.jpg', '', '', '', '굿', '', 'y'),
(114, 'ug9945', 's', '낙원빌', '경상북도 안동시 송천2길  56', '128.7917277', '36.5430502', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106104010_thum.jpg', '', '', '', '굿', '', 'y'),
(115, 'ug9945', 's', '고우원룸', '경상북도 안동시 송천2길  53', '128.7916071', '36.5432213', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106104537_thum.jpg', '', '', '', '굿', '', 'y'),
(116, 'ug9945', 's', '다온원룸', '경상북도 안동시 송천동 979-5', '128.7910253', '36.5476813', 'y', 'o', '0', '0', '0000', '0', '입력안함', 'n', 'n', 'n', 'n', 'n', 'n', 'ug9945_20151106104928_thum.jpg', '', '', '', '굿', '', 'y');

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` text COLLATE utf8_unicode_ci NOT NULL,
  `u_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_lv` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'c',
  `u_qes` text COLLATE utf8_unicode_ci NOT NULL COMMENT '분실 질문',
  `u_ans` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`u_id`, `u_pw`, `u_name`, `u_email`, `u_phone`, `u_lv`, `u_qes`, `u_ans`) VALUES
('admin', '*69A518E7F2D3BBDA99BF0F376CBB002D38A74115', '관리자', 'ymw9801@naver.com', '01055169801', 'm', '', ''),
('test1111', '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1', '방주인', '123', '123123', 's', '초등학교 가장 기억에 남는 선생님 성함은?', 'test'),
('ug9945', '*AF0B32D7D7A86E133A2F3DBB9E8A086231B65BC7', '솔뫼갑부', 'ug9945@naver.com', '01029889945', 's', '보물 1호는?', '가족'),
('PM', '*E9859132828954430432D4BAA058762C01B8DC03', '엄성호', 'neda1990@PM.com', '01012341234', 's', '', ''),
('test1', '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1', 'test계쩡', 'test@test.com', '010010', 's', '초등학교 가장 기억에 남는 선생님 성함은?', '이민수'),
('test11', '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1', '테스트계정', 'test@test.com', '01055169801', 's', '보물 1호는?', '오르골'),
('ymw9801', '*27D5D1505711DF1AB89C8F1EDB1035D14FF07866', '윤민우', 'ymw9801@naver.com', '01055169801', 's', '가장 소중하게 생각하는 친구 이름은?', '허신행'),
('test1123', '*E56A114692FE0DE073F9A1DD68A00EEB9703F3F1', '방주인', 'test@naver.com', '01000001111', 's', '초등학교 가장 기억에 남는 선생님 성함은?', 'test');