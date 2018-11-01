/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50096
Source Host           : localhost:3306
Source Database       : tpp

Target Server Type    : MYSQL
Target Server Version : 50096
File Encoding         : 65001

Date: 2018-05-03 13:13:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `add_money`
-- ----------------------------
DROP TABLE IF EXISTS `add_money`;
CREATE TABLE `add_money` (
  `add_money_id` int(11) NOT NULL auto_increment,
  `time` datetime default NULL,
  `User_name` varchar(100) default '',
  `money_add` int(11) default NULL,
  PRIMARY KEY  (`add_money_id`),
  KEY `User_nam` (`User_name`),
  CONSTRAINT `User_nam` FOREIGN KEY (`User_name`) REFERENCES `user_info` (`User_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of add_money
-- ----------------------------
INSERT INTO `add_money` VALUES ('1', '2018-04-30 20:17:13', 'pjw', '50');
INSERT INTO `add_money` VALUES ('2', '2018-04-30 20:19:06', 'pjw', '12');
INSERT INTO `add_money` VALUES ('3', '2018-04-30 20:19:43', 'pjw', '50');
INSERT INTO `add_money` VALUES ('4', '2018-04-30 20:19:59', 'pjw', '100');

-- ----------------------------
-- Table structure for `area_info`
-- ----------------------------
DROP TABLE IF EXISTS `area_info`;
CREATE TABLE `area_info` (
  `Area_id` int(11) NOT NULL auto_increment,
  `Area_name` varchar(30) default NULL,
  PRIMARY KEY  (`Area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of area_info
-- ----------------------------
INSERT INTO `area_info` VALUES ('1', '滨江区');
INSERT INTO `area_info` VALUES ('2', '淳安县');
INSERT INTO `area_info` VALUES ('3', '富阳县');
INSERT INTO `area_info` VALUES ('4', '拱墅区');
INSERT INTO `area_info` VALUES ('5', '建德市');
INSERT INTO `area_info` VALUES ('6', '江干区');
INSERT INTO `area_info` VALUES ('7', '临安区');
INSERT INTO `area_info` VALUES ('8', '上城区');
INSERT INTO `area_info` VALUES ('9', '桐庐县');
INSERT INTO `area_info` VALUES ('10', '下城区');
INSERT INTO `area_info` VALUES ('11', '萧山区');
INSERT INTO `area_info` VALUES ('12', '下沙经济开发区');
INSERT INTO `area_info` VALUES ('13', '西湖区');
INSERT INTO `area_info` VALUES ('14', '余杭区');

-- ----------------------------
-- Table structure for `dyy_info`
-- ----------------------------
DROP TABLE IF EXISTS `dyy_info`;
CREATE TABLE `dyy_info` (
  `dyy_id` int(11) NOT NULL auto_increment,
  `dyy_name` varchar(50) default NULL,
  `Area_id` int(11) default NULL,
  `Address` varchar(50) default NULL COMMENT '详细地址',
  `Telephone` varchar(15) default NULL,
  `dyy_image_path` varchar(30) default NULL,
  PRIMARY KEY  (`dyy_id`),
  KEY `Area_id` (`Area_id`),
  CONSTRAINT `Area_id` FOREIGN KEY (`Area_id`) REFERENCES `area_info` (`Area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dyy_info
-- ----------------------------
INSERT INTO `dyy_info` VALUES ('1', '中影国际影城杭州星光大道店', '1', '滨江区江南大道228号星光国际广场2号楼4层(近滨江区政府)', '0571-88924988', '1');
INSERT INTO `dyy_info` VALUES ('2', '金字塔千岛湖店', '2', '淳安县新安北路41号四楼', '0571-65087798', '2');
INSERT INTO `dyy_info` VALUES ('3', '中影国线巨幕影城新登店', '3', '富阳区新登镇登城北路69号富春·港商业中心四楼影城', '0571-63219828', '3');
INSERT INTO `dyy_info` VALUES ('4', '杭州比高电影院（大河路）', '4', '拱墅区小河路488号运河天地4幢', '0571-28066699', '4');
INSERT INTO `dyy_info` VALUES ('5', '丽星影院', '5', '建德市梅城镇西门街58号二楼', '0571-64744810', '5');
INSERT INTO `dyy_info` VALUES ('6', '泰禾影城-杭州江和美店', '6', '江干区杭海路601号江和美海洋生活广场4楼', '0571-87096070', '6');
INSERT INTO `dyy_info` VALUES ('7', '临安星汇时代影城', '7', '临安区青山湖街道大园路123号', '0571-61099076', '7');
INSERT INTO `dyy_info` VALUES ('8', '浙江胜利剧院', '8', '上城区延安路279号', '0571-87080142', '8');
INSERT INTO `dyy_info` VALUES ('9', '桐庐时代金球影城', '9', '桐庐县迎春南路666号利时百货5楼', '0571-64606288', '9');
INSERT INTO `dyy_info` VALUES ('10', '浙江新远国际影城（西湖文化广场店）', '10', '下城区西湖文化广场8号（C区）', '0571-85001088', '10');
INSERT INTO `dyy_info` VALUES ('11', '杭州大地影院萧山加州阳光广场店', '11', '萧山区金城路333号开元加州阳光商场4楼', '0571-82687991', '11');
INSERT INTO `dyy_info` VALUES ('12', '新远下沙影城', '12', '下沙经济开发区文泽路99号福雷德广场B座', '0571-88285470', '12');
INSERT INTO `dyy_info` VALUES ('13', '三墩华夏影城', '13', '西湖区三墩镇同仁家园同仁汇三楼华夏国际影城', '0571-86773001', '13');
INSERT INTO `dyy_info` VALUES ('14', '杭州中影铂金影院', '14', '余杭区临平新天地15号楼', '0571-88625888', '14');
INSERT INTO `dyy_info` VALUES ('15', '成功后变成', '1', '是否', '4564', '15');

-- ----------------------------
-- Table structure for `film_info`
-- ----------------------------
DROP TABLE IF EXISTS `film_info`;
CREATE TABLE `film_info` (
  `Film_id` int(11) NOT NULL auto_increment,
  `Film_name` varchar(50) default NULL,
  `Director` varchar(50) default NULL,
  `Actors` varchar(100) default NULL,
  `Type` varchar(20) default NULL,
  `Language` varchar(20) default NULL,
  `Film_image_path` varchar(50) default NULL,
  `Film_Video_path` varchar(50) default NULL,
  `End_data` datetime default NULL,
  `Hot` double(11,1) default NULL,
  `chuntry` varchar(100) default NULL,
  `produce` varchar(800) default NULL,
  `time` int(11) default NULL,
  `data` date default NULL,
  `film_time` int(11) default NULL,
  PRIMARY KEY  (`Film_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of film_info
-- ----------------------------
INSERT INTO `film_info` VALUES ('1', '头号玩家', '史蒂文·斯皮尔伯格', '泰伊·谢里丹,奥利维亚·库克,本·门德尔森,西蒙·佩吉,马克·里朗斯', '动作,科幻,冒险', '英语', '\"image/1.jpg\"', null, null, '9.0', '美国', '在2045年，现实世界衰退破败，人们沉迷于VR(虚拟现实)游戏“绿洲(OASIS)”的虚幻世界里寻求慰藉。马克·里朗斯饰演的“绿洲”的创始人临终前宣布，将亿万身家全部留给寻获他隐藏的彩蛋的游戏玩家，史上最大规模的寻宝冒险就此展开，由泰伊·谢里丹饰演的男主角韦德·沃兹(Wade Watts/Parzival)和数十亿竞争者踏上奇妙而又危机重重的旅途。', '1', '2018-03-13', '120');
INSERT INTO `film_info` VALUES ('2', '狂暴巨兽', '布拉德·佩顿', '道恩·强森,娜奥米·哈里斯,杰弗里·迪恩·摩根,玛琳·阿克曼', '动作,冒险,科幻', '英语', '\"image/2.jpg\"', null, null, '9.0', '美国', '巨石强森饰演的灵长类动物学家一直与人类保持距离, 却跟极为聪明的银背大猩猩乔治有着深厚的感情。但是一次基因实验出错, 让这只温驯的大猩猩变成狂怒难驯的庞然巨兽。更可怕的是, 其他动物也发生了同样基因异变。他必须阻止这场全球性的灾难, 更重要是要拯救他的好友乔治。', '1', '2018-04-13', '120');
INSERT INTO `film_info` VALUES ('3', '湮灭', '亚力克斯·嘉兰', '娜塔莉·波特曼,詹妮弗·杰森·李,吉娜·罗德里格兹,泰莎·汤普森,奥斯卡·伊萨克', '科幻,动作,剧情', '英语', '\"image/3.jpg\"', null, null, '7.5', '美国,英国', '某生物学家(波特曼)为调查丈夫(伊萨克饰)的失踪，参加了神秘组织Southern Reach组织的科学考察，4名女性组队，去研究美国领土内一块被检疫隔离的生态灾害区域“X地区”。她发现那里是原生态的荒野，隐藏着神秘的黑暗力量。这已经是对该地区的第12次考察，前11次全都失败，比如第二次考察终结于去的考察队员集体自杀，第三次考察队拔枪互相残杀，第11次队员全体失去神志，回来后不久都死于癌症……', '1', '2018-04-13', '120');
INSERT INTO `film_info` VALUES ('4', '起跑线', '萨基特·乔杜里', '伊尔凡·可汗,萨巴·卡玛尔,内哈·迪胡皮阿,迪帕克·迪布里亚尔,蒂希塔·塞加尔,阿莫瑞塔·金格', '剧情,喜剧', '印地语,英语', '\"image/4.jpg\"', null, null, '8.9', '印度', '一对印度的中产阶级夫妇服装店老板拉吉(伊尔凡·可汗 饰)与太太米塔(萨巴·卡玛尔 饰)为了让女儿皮娅(蒂希塔·塞加尔 饰)接受更好的教育想尽了各种办法。而当他们费劲心思终于要将女儿送进名校时，事情却又发生了意想不到的变化......', '1', '2018-04-04', '120');
INSERT INTO `film_info` VALUES ('5', '寻找罗麦', '王超', '韩庚,杰瑞米·埃尔卡伊姆,菅纫姿', '爱情,剧情', '汉语普通话,英语,藏语,法语', '\"image/5.jpg\"', null, null, '7.6', '中国大陆,法国', '赵捷和罗麦相识已久，在经历过一次导致少年意外死亡的车祸之后，二人逐渐产生罅隙。事后，罗麦去了西藏，却全然未知等待他的是一场不测风云。罗麦走后，赵捷也踏入这段象征涅槃与救赎的莲花之旅，一直在路上的他，始终在寻找着一个模糊的身影。', '1', '2018-04-13', '120');
INSERT INTO `film_info` VALUES ('6', '西北风云', '黄璜', '余男,任达华,高捷,彭敬慈', '剧情,犯罪', '汉语普通话', '\"image/6.jpg\"', null, null, '6.3', '中国大陆', '本片讲述了女缉毒队长侦破跨境走私贩毒案的故事。在一次追捕行动中，高桥（余男 饰）因与毒贩搏斗致脑部受伤，失去了味觉。不久后，高桥与砂锅粥店老板陆鸿（任达华 饰）因一起车祸，在救人时相识。陆鸿的一碗砂锅粥让高桥尝到了久违的味道，她成了砂锅粥店的常客。他是厨师，也是毒师；她爱破案，也爱吃饭。随着调查的深入，陆鸿的真实身份浮出水面，一心想退隐江湖的他将何去何从？眼看收网在即，一系列杀人案又让高桥陷入了一个巨大的复仇计划中……', '1', '2018-04-13', '120');
INSERT INTO `film_info` VALUES ('7', '冰雪女王3：火与冰', '阿列克谢·特斯蒂斯林', 'Laurie Hymes,杰森·格里菲斯', '动画,家庭,冒险', '俄罗斯语', '\"image/7.jpg\"', null, null, '8.1', '俄罗斯', '不断遇到麻烦可算是凯与格尔达这对姐弟的特点了，毕竟他们是在冰雪的国度被矮人们养大的。随着他们长大成人，等待他们的麻烦也升级了。这一次，格尔达与新认识的小伙伴罗兰去寻找传说中的许愿球，不想却召唤出封印在许愿球中的邪恶力量，这对姐弟是否能够逢凶化吉，还世界一个和平？', '1', '2018-04-05', '120');
INSERT INTO `film_info` VALUES ('8', '毕业作品', '许斌', '张一山,丁丁,朱泳腾', '剧情,冒险,爱情', '汉语普通话', '\"image/8.jpg\"', null, null, '7.4', '中国大陆', '警校学生殷浩（张一山 饰）和自己的女朋友——电影编导系学生小暖（丁丁 饰）为完成小暖的毕业作品登上了隔离岛拍摄纪录片。', '1', '2018-04-13', '120');
INSERT INTO `film_info` VALUES ('9', '暴裂无声', '忻钰坤', '宋洋,姜武,袁文康', '犯罪,悬疑,剧情', '汉语普通话', '\"image/9.jpg\"', null, null, '8.3', '中国大陆', '北方凛冽的冬天，一个牧羊少年带着自家的羊群在山里行走，路过浅浅的河沟，他停下脚步低头注目。 两天后，矿工张保民得知儿子失踪的消息，急切赶回家中，三天后，律师徐文杰的女儿失踪，他拿起电话打给他能想到的唯一嫌疑人。山林，荒野，寻找孩子的人们迷失在其中。', '1', '2018-04-04', '120');
INSERT INTO `film_info` VALUES ('10', '夺命来电', '托德·威廉姆斯', '约翰·库萨克,塞缪尔·杰克逊,伊莎贝拉·弗尔曼', '灾难,恐怖', '英语,汉语普通话', '\"image/10.jpg\"', null, null, '5.7', '美国', '丧尸来了！！！亿万小说销量作家、全球惊悚大师斯蒂芬•金翻拍作品首度来华，丧尸题材首次登陆大银幕，比《釜山行》更刺激，比《行尸走肉》更重口。手机成为杀人机器，世界将变成什么样？灾难降临，丧尸围城，末日警告，全球自危。当“凶铃”不止在午夜响起，你，是否够胆接听？', '1', '2018-04-13', '120');
INSERT INTO `film_info` VALUES ('11', '壹号别墅 ', '王保国', '项洪,关健,侯宇航', '剧情,悬疑', '汉语普通话', '\"image/11.jpg\"', null, null, null, '中国大陆', '为躲避灾祸，年轻妈妈雨婷带着女儿毛豆，住进了壹号别墅。这里曾是贪官会所，过去辉煌无比，如今门可罗雀。女主人梅姨是一位善煲靓汤的厨娘，她拥有多重性格，神秘莫测。', '0', '2018-04-19', '120');

-- ----------------------------
-- Table structure for `fyt_info`
-- ----------------------------
DROP TABLE IF EXISTS `fyt_info`;
CREATE TABLE `fyt_info` (
  `Fyt_id` int(11) NOT NULL auto_increment,
  `Dyy_id` int(11) default NULL,
  `Fyt_name` varchar(50) default NULL,
  `seat` varchar(200) default NULL,
  PRIMARY KEY  (`Fyt_id`),
  KEY `Dyy_id` (`Dyy_id`),
  CONSTRAINT `Dyy_id` FOREIGN KEY (`Dyy_id`) REFERENCES `dyy_info` (`dyy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fyt_info
-- ----------------------------
INSERT INTO `fyt_info` VALUES ('1', '1', '1号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,__aaaaaaaaaaa_,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('2', '2', '2号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('3', '3', '3号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('4', '4', '4号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('5', '5', '5号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('6', '6', '6号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('7', '7', '7号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('8', '8', '8号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('9', '9', '9号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('10', '10', '10号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('11', '11', '11号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('12', '12', '12号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('13', '13', '13号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('14', '14', '14号厅', 'aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('15', '1', '14号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('16', '2', '13号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('17', '3', '12号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('18', '4', '11号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('19', '5', '10号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('20', '6', '9号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('21', '7', '8号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('22', '8', '7号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('23', '9', '6号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('24', '10', '5号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('25', '11', '4号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('26', '12', '3号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('27', '13', '2号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('28', '14', '1号厅', '___aaaaaaaaaaa,aaaaaaaaaaa___,aaaaaaaaaaaaaa,___aaaaaaaaaaa,___aaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa,_aaaaaaaaaaaaa');
INSERT INTO `fyt_info` VALUES ('29', '1', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('30', '2', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('31', '3', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('32', '4', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('33', '5', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('34', '6', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('35', '7', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('36', '8', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('37', '9', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('38', '10', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('39', '11', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('40', '12', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('41', '13', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('42', '14', '0号厅', null);
INSERT INTO `fyt_info` VALUES ('43', '1', '头号玩家', null);

-- ----------------------------
-- Table structure for `fyt_plan`
-- ----------------------------
DROP TABLE IF EXISTS `fyt_plan`;
CREATE TABLE `fyt_plan` (
  `fyt_plan_id` int(11) NOT NULL auto_increment,
  `Fyt_id` int(11) default NULL,
  `Film_id` int(11) default NULL,
  `Plans` int(11) default NULL,
  `Film_price` int(11) default NULL,
  `Length` int(11) default NULL,
  `Version` varchar(20) default NULL,
  `Status` int(11) default NULL,
  `Starttime` time default NULL,
  `data` date default NULL,
  PRIMARY KEY  (`fyt_plan_id`),
  KEY `Fyt_id` (`Fyt_id`),
  KEY `Film_id` (`Film_id`),
  CONSTRAINT `Film_id` FOREIGN KEY (`Film_id`) REFERENCES `film_info` (`Film_id`),
  CONSTRAINT `Fyt_id` FOREIGN KEY (`Fyt_id`) REFERENCES `fyt_info` (`Fyt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fyt_plan
-- ----------------------------
INSERT INTO `fyt_plan` VALUES ('1', '1', '2', null, '30', null, '原版3D', '1', '20:27:55', '2018-05-03');
INSERT INTO `fyt_plan` VALUES ('2', '2', '2', null, '30', null, '原版3D', '1', null, '2018-05-01');
INSERT INTO `fyt_plan` VALUES ('3', '3', '2', null, '30', null, '原版3D', '1', null, '2018-05-02');
INSERT INTO `fyt_plan` VALUES ('4', '4', '2', null, '30', null, '原版3D', '1', null, '2018-05-02');
INSERT INTO `fyt_plan` VALUES ('5', '5', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('6', '6', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('7', '7', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('8', '8', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('9', '9', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('10', '10', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('11', '11', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('12', '12', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('13', '13', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('14', '14', '2', null, '30', null, '原版3D', '1', null, '2018-04-26');
INSERT INTO `fyt_plan` VALUES ('15', '15', '2', null, '30', null, '原版3D', '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('16', '16', '2', null, '30', null, '原版3D', '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('17', '17', '2', null, '30', null, '原版3D', '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('18', '18', '2', null, '30', null, '原版3D', '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('19', '19', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('20', '20', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('21', '21', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('22', '22', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('23', '23', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('24', '24', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('25', '25', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('26', '26', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('27', '27', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('28', '28', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('29', '29', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('30', '30', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('31', '31', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('32', '32', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('33', '33', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('34', '34', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('35', '35', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('36', '36', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('37', '37', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('38', '38', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('39', '39', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('40', '40', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('41', '41', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('42', '42', '2', null, null, null, null, '2', null, '2018-04-27');
INSERT INTO `fyt_plan` VALUES ('43', '43', '1', null, null, null, null, '2', null, '2018-04-26');

-- ----------------------------
-- Table structure for `sale_info`
-- ----------------------------
DROP TABLE IF EXISTS `sale_info`;
CREATE TABLE `sale_info` (
  `sale_id` int(11) NOT NULL auto_increment,
  `fyt_plan_id` int(11) default NULL,
  `Pos_x_y` varchar(50) default NULL,
  `actual_price` double(11,0) default NULL,
  `QrCode` varchar(50) default NULL,
  `Telephone` varchar(11) default NULL,
  `User_name` varchar(100) default NULL,
  `time` datetime default NULL,
  PRIMARY KEY  (`sale_id`),
  KEY `fyt_plan_id` (`fyt_plan_id`),
  KEY `Telephone` (`Telephone`),
  KEY `User_name` (`User_name`),
  CONSTRAINT `fyt_plan_id` FOREIGN KEY (`fyt_plan_id`) REFERENCES `fyt_plan` (`fyt_plan_id`),
  CONSTRAINT `User_name` FOREIGN KEY (`User_name`) REFERENCES `user_info` (`User_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sale_info
-- ----------------------------
INSERT INTO `sale_info` VALUES ('1', '1', '4_8,5_9', '60', null, '13857777868', 'pjw', '2018-04-30 16:49:10');
INSERT INTO `sale_info` VALUES ('2', '1', '3_6', '30', null, '13857777868', 'pjw', '2018-04-30 16:49:35');
INSERT INTO `sale_info` VALUES ('3', '1', '3_12,3_13', '60', null, '13857777868', 'pjw', '2018-04-30 16:49:46');
INSERT INTO `sale_info` VALUES ('4', '1', '4_11,5_12,6_11', '90', null, '45646', 'pjw', '2018-04-30 17:19:41');
INSERT INTO `sale_info` VALUES ('5', '1', '7_11,7_10', '60', null, '7486456', 'pjw', '2018-04-30 17:20:35');
INSERT INTO `sale_info` VALUES ('6', '1', '6_13', '30', null, '4', 'pjw', '2018-04-30 17:34:25');
INSERT INTO `sale_info` VALUES ('7', '1', '2_8,2_9,2_10,2_11,2_12,2_13,2_14', '210', null, '4564', 'pjw', '2018-04-30 17:34:36');
INSERT INTO `sale_info` VALUES ('8', '1', '7_14', '30', null, '11', 'pjw', '2018-04-30 20:24:01');
INSERT INTO `sale_info` VALUES ('9', '1', '6_14', '30', null, '121312', 'pjw', '2018-04-30 20:29:44');
INSERT INTO `sale_info` VALUES ('10', '1', '7_7', '30', null, '12345', 'pjw', '2018-04-30 20:29:52');
INSERT INTO `sale_info` VALUES ('11', '1', '6_10', '30', null, '46456456456', 'pjw', '2018-04-30 20:32:17');
INSERT INTO `sale_info` VALUES ('12', '1', '5_7', '30', null, '12313213212', 'pjw', '2018-04-30 20:34:58');
INSERT INTO `sale_info` VALUES ('13', '1', '2_4', '30', null, '12312313212', 'pjw', '2018-04-30 20:37:18');
INSERT INTO `sale_info` VALUES ('14', '1', '1_10', '30', null, '45646578978', 'pjw', '2018-04-30 20:37:46');

-- ----------------------------
-- Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `User_name` varchar(100) NOT NULL default '',
  `Pwd` varchar(16) default NULL,
  `Telephone` varchar(11) default NULL,
  `money` int(11) default NULL,
  PRIMARY KEY  (`User_name`),
  KEY `Telephone` (`Telephone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('pjw', '111111', '15158657651', '817');
