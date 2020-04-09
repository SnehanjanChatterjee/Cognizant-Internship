create database irctc;

use irctc;

CREATE TABLE `train_info` (
  `train_no` int(4) NOT NULL,
  `train_name` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `s_station_id` int(4) DEFAULT NULL,
  `d_station_id` int(4) DEFAULT NULL,
  `distance` int(5) DEFAULT NULL,
  `mon` char(1) DEFAULT NULL,
  `tue` char(1) DEFAULT NULL,
  `wed` char(1) DEFAULT NULL,
  `thu` char(1) DEFAULT NULL,
  `fri` char(1) DEFAULT NULL,
  `sat` char(1) DEFAULT NULL,
  `sun` char(1) DEFAULT NULL,
  PRIMARY KEY (`train_no`)
);

INSERT INTO `train_info` VALUES (1234,'UDYAN','ORDINARY',100,104,560,'Y','Y','Y','Y','Y','Y','Y'),(4321,'KK','EXPRESS',101,107,1500,'Y','Y','Y','Y','Y','N','N'),(6000,'CAUVERY','EXPRESS',103,108,820,'Y','Y','Y','Y','Y','Y','Y'),(6138,'POORVA','EXPRESS',103,106,450,'Y','Y','Y','Y','Y','Y','Y');


CREATE TABLE `route` (
  `station_id` int(4) NOT NULL,
  `station_name` char(30) DEFAULT NULL,
  `km` int(5) DEFAULT NULL,
  PRIMARY KEY (`station_id`)
);

INSERT INTO `route` VALUES (100,'MYSORE',0),(101,'BANGALORE',150),(102,'PUNE',650),(103,'MUMBAI',700),(104,'RAJKOT',1150),(105,'DELHI',1500),(106,'KOLKATA',0),(107,'AHMEDABAD',150),(108,'KOTA',250),(109,'SELAM',350),(110,'CHENNAI',450),(111,'HYDERABAD',260),(112,'KOCHI',480),(113,'VISHAKAPATNAM',250),(114,'RANCHI',200),(115,'BHOPAL',680);

-- CREATE TABLE `route_main` (
--   `route_id` int(3) NOT NULL AUTO_INCREMENT,
--   `s_station_id` int(5) DEFAULT NULL,
--   `s_station_name` char(30) DEFAULT NULL,
--   `d_station_id` int(5) DEFAULT NULL,
--   `d_station_name` char(30) DEFAULT NULL,
--   PRIMARY KEY (`route_id`)
-- );

-- INSERT INTO `route_main` VALUES (1,100,'MYSORE',199,'DELHI'),(2,200,'MYSORE',299,'CHENNAI');


CREATE TABLE `train_schedule` (
  `train_no` int(4) DEFAULT NULL,
  `station_id` int(4) DEFAULT NULL,
  `arv_time` varchar(10) DEFAULT NULL,
  `dep_time` varchar(10) DEFAULT NULL,
  KEY `train_no` (`train_no`),
  KEY `station_id` (`station_id`),
  CONSTRAINT `train_schedule_ibfk_1` FOREIGN KEY (`train_no`) REFERENCES `train_info` (`train_no`),
  CONSTRAINT `train_schedule_ibfk_2` FOREIGN KEY (`station_id`) REFERENCES `route` (`station_id`)
);

INSERT INTO `train_schedule` VALUES 
(1234,100,'02:10','02:20'),(1234,101,'06:00','06:10'),(1234,102,'23:05','23:15'),(1234,103,'01:15','01:30'),(1234,104,'18:00','18:30'),
(4321,101,'02:10','02:20'),(4321,102,'06:00','06:10'),(4321,103,'23:05','23:15'),(4321,104,'01:15','01:30'),(4321,105,'18:00','18:30'),(4321,106,'23:00','00:00'),(4321,107,'2:00','4:40'),
(6000,103,'13:05','13:30'),(6000,104,'16:00','16:05'),(6000,105,'17:00','17:05'),(6000,106,'18:05','18:10'),(6000,107,'19:15','00:00'),(6000,108,'1:15','3:00'),
(6138,103,'12:05','14:25'),(6138,104,'16:35','21:15'),(6138,105,'2:05','4:25'),(6138,106,'6:00','9:45');

select ti.train_no as 'TRAIN NO.',ti.train_name as 'TRAIN NAME',ti.type as 'TRAIN TYPE',ti.s_station_id as 'SOURCE STATION CODE',ti.d_station_id as 'DESTINATION STATION CODE',ti.distance as 'DISTANCE(IN KM)',ti.mon,ti.tue,ti.wed,ti.thu,ti.fri,ti.sat,ti.sun,ts.arv_time as 'ARRIVAL TIME',ts.dep_time as 'DEPARTURE TIME' from train_info ti,train_schedule ts where s_station_id<= (select station_id from route where station_name like 'PUNE') and d_station_id >=(select station_id from route where station_name like 'MUMBAI') and ti.train_no=ts.train_no and ts.station_id>=(select station_id from route where station_name like 'PUNE') and ts.station_id<(select station_id from route where station_name like 'MUMBAI');
