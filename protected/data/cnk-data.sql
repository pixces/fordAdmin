--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `last_login_time`, `date_created`, `date_modified`) VALUES
(11, 'Zainul', 'zainul@cnk.com', '6d808ecfd24037ca31db96e3cb1d1e1e', NULL, '2014-02-16 00:00:00', '2014-02-16 14:21:19'),
(12, 'Sadik', 'sadik@cnk.com', 'b0ae3e73eca81a45081fab4f3682a9a7', NULL, '2014-02-16 00:00:00', '2014-02-16 14:21:19'),
(13, 'Uttam', 'uttam@cnk.com', 'b1cc8b464f6298bd94bbb69b0e15cc9a', NULL, '2014-02-16 00:00:00', '2014-02-16 14:21:29'),
(14, 'Roshan', 'roshan@cnk.com', '4534344e975e9af0132fcad81a550b27', NULL, '2014-02-16 00:00:00', '2014-02-16 14:21:29'),
(15, 'Vikrant', 'vikrant@cnk.com', 'db520639be2e1027971003730fe43199', NULL, '2014-02-16 21:44:59', '2014-02-16 16:14:59');

-- --------------------------------------------------------
--
-- Dumping data for table `config`
--

INSERT INTO `config` (`key`, `value`) VALUES
('site_url', 'http://localhost:8888/coxnkings'),
('encryption_seed', '3782adf93db49e7239836bb23072f31'),
('environment', 'development'),
('youtube_api_url', 'https://gdata.youtube.com/feeds/api/videos/'),
('thumb_width', '125'),
('thumb_height', '90'),
('partners_thumb_width', '140'),
('partners_thumb_height', '42'),
('associates_thumb_width', '140'),
('associates_thumb_height', '70');

-- --------------------------------------------------------

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `gallery_id`, `user_id`, `title`, `description`, `source`, `media_id`, `media_url`, `alternate_url`, `type`, `author`, `channel_name`, `authentication`, `notes`, `flags`, `is_ugc`, `thumb_image`, `alternate_image`, `status`, `date_created`, `date_modified`) VALUES
(1, 1, 1, 'Rip Clutchgoneski Micro Drifters Cars Gold Francesco Bernoulli, Miguel Camino, Ramone Sheriff Disney', 'From disney pixar cars 2, here we have 3 brand new packages of micro-drifters with rip clutchgoneski, miguel camino "world grand prix lightning McQueen". Package 2 we have "gold Francesco Bernoulli" "raoul caroule" "jeff gorvette" and Package 3 you get Ramone "doc Hudson" "radiator springs sheriff". Utilizing a unique ball-bearing design, these collectible characters can race, drift, swarm and even self-correct themselves to always face in a forward direction when played with on a track set. \r\n\r\n\r\nAccording to Wiki Pixar the Republic of New Rearendia is desperate to put their name on the map with racecar #10 open-wheeled racer Rip Clutchgoneski. He participated in all 3 World Grand Prix races, as well as in the Radiator Springs Grand Prix. Republic of New Rearendia is a fictional country. The colors of its flag are orange, green & red. Rip is the only racer in WGP that doesn''t have a crew chief, just some pitties.\r\n\r\nHere''s how Cars2 is called in other countries:  Arabalar, Autogrotesky, Аутомобили Cars2 "Arabalar 2" "Auta 2" "Auti 2" "Automobili 2" "Autod 2" "Autot 2" "Bilar 2" "Bilar 2" e "Cars 2" "Carros 2" "Les Bagnoles 2"  "Mankanebi 2" "Masini 2" "Ratai 2" "Тачки 2" e "Tachky 2" "Verdák 2"  "カーズ 2" "Les Bagnoles animées" "汽車總動員 2" "Cars Motori Ruggenti" "Cars Quatre roues" "bujdy na resorach" "Złomka bujdy na resorach"\r\n\r\n\r\nWatch Play-Doh Superheroes Cars Make n Display Spiderman Hulk Stage Show with Disney Pixar Cars Play Doh Batman vs. Superman facing each other. Here you''ll see Marvel Super Heroes Cars the Avengers like Batman as Doc Hudson, Captain America Lightning McQueen, Mater Superman, Mack Truck as Pit Crew Chief with headset and Sally Carrera Pit Crew with Headset, watch only at Toychannel Disneycollector:\r\nhttps://www.youtube.com/watch?v=GVa1foHZ-fU\r\n\r\nCheck out "Play-Doh Doggy Doctor" Playset and take care of play-doh puppies:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch "Play-Doh Octopus" Playset Ocean Animals with Disney Finding Nemo Dory:\r\nhttps://www.youtube.com/watch?v=EwyncHfcRgE\r\n\r\nCheck Out "Play-Doh Coco Nutty Monkey" Playset and watch nutty Monkey eating play doh bananas with Despicable Me action figure Dave singing banana at:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch Play-Doh Trains Planes Cars Trucks Choppers with Play Dough Vehicles set:\r\nhttps://www.youtube.com/watch?v=RuwR1jmFYAM\r\n\r\nCheck out "Play-Doh Star Wars" The Clone Wars R2-D2 playset w/  Darth Mater,Luke Skywalker Lightning McQueen, Frank Tractor Tippin'' Stormtrooper, Jabba the Hutt at:\r\nhttp://www.youtube.com/watch?v=YHkSPgo5hqQ\r\n\r\nWatch Play-Doh Buster Power Crane Wrecking Ball From Tonka Trucks at:\r\nhttps://www.youtube.com/watch?v=wD1rKL8N8R0\r\n\r\nWatch "Play-Doh Mold N Go Speedway" Playset with Disney Pixar Cars Tuners Mater Hot Rod Boost Snot Rod, Wingo with Flames Francesco as Rip Clutchgoneski at:\r\nhttps://www.youtube.com/watch?v=K0wRMSDZbfM\r\n\r\nLearn the Alphabet ABC with "Cookie Monster Eats Cars" Micro Drifters and Play-Doh Letter Lunch Cookie Monster From Sesame Street, watch and learn ABC''s at:\r\nhttps://www.youtube.com/watch?v=W67E90h8GTY\r\n\r\nEnjoy Cookie Monster Pool Party with Disney Pixar Cars Hydro Wheels Underwater toys Mater, Rip Clutchgoneski and K''NEX Building Toys like Lego, watch at:\r\nhttps://www.youtube.com/watch?v=SMbNjTXSpCk', '', '0fvq8YY28qI', 'http://youtu.be/0fvq8YY28qI', '', 'video', 'BluCollection', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/0fvq8YY28qI/default.jpg', 'https://i1.ytimg.com/vi/0fvq8YY28qI/hqdefault.jpg', 'active', '2014-03-02 01:25:10', '2014-03-17 21:36:56'),
(2, 1, 1, 'Disney Cars 2 Holiday Edition + Hot Wheels Easter Egg Speedsters Toy Surprise Lightning McQueen Toys', 'From disney pixar cars, here we have 4 easter eggs from cars2 holiday edition in 1:55 scale die-cast as well as 6 easter eggs speedsters and a super awesome 6-pack of hot wheels holiday edition, perfect present for your 2013 easter.\r\n\r\nLightning McQueen is also called in other countries: "Bliksem Mcqueen" "Saetta mcqueen" "Lynet McQueen" "Rayo McQueen" "Flash Mcqueen" "Blixten McQueen" e "Faísca McQueen" e "Blesk McQueen" "Молния МакКуин" "Relâmpago Mcqueen" e "Zygzaka McQueen" "Şimsek mcqueen" ライトニング・マックィーン\r\n\r\nWatch Play-Doh Superheroes Cars Make n Display Spiderman Hulk Stage Show with Disney Pixar Cars Play Doh Batman vs. Superman facing each other. On this PlayDoh Superheroes cars video you''ll see Marvel Super Heroes the Avengers like Batman as Doc Hudson, Captain America Lightning McQueen, Mater Superman and Spider-Man. Sally Carrera and Mack Truck as Pit Crew Chief with headset watch at:\r\nhttps://www.youtube.com/watch?v=GVa1foHZ-fU\r\n\r\nCheck out "Play-Doh Doggy Doctor" Playset and take care of play-doh puppies:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch "Play-Doh Octopus" Playset Ocean Animals with Disney Finding Nemo Dory:\r\nhttps://www.youtube.com/watch?v=EwyncHfcRgE\r\n\r\nCheck Out "Play-Doh Coco Nutty Monkey" Playset and watch nutty Monkey eating play doh bananas with Despicable Me action figure Dave singing banana at:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch Play-Doh Trains Planes Cars Trucks Choppers with Play Dough Vehicles set:\r\nhttps://www.youtube.com/watch?v=RuwR1jmFYAM\r\n\r\nCheck out "Play-Doh Star Wars" The Clone Wars R2-D2 playset w/  Darth Mater,Luke Skywalker Lightning McQueen, Frank Tractor Tippin'' Stormtrooper, Jabba the Hutt at:\r\nhttp://www.youtube.com/watch?v=YHkSPgo5hqQ\r\n\r\nWatch Play-Doh Buster Power Crane Wrecking Ball From Tonka Trucks at:\r\nhttps://www.youtube.com/watch?v=wD1rKL8N8R0\r\n\r\nWatch "Play-Doh Mold N Go Speedway" Playset with Disney Pixar Cars Tuners Mater Hot Rod Boost Snot Rod, Wingo with Flames Francesco as Rip Clutchgoneski at:\r\nhttps://www.youtube.com/watch?v=K0wRMSDZbfM\r\n\r\nPlayDoh Chomper The Excavator Playset Tonka Truck from Chuck & Friends\r\nhttps://www.youtube.com/watch?v=O-f4ZK9EWXA#t=295\r\n\r\nEnjoy Cookie Monster Pool Party with Disney Pixar Cars Hydro Wheels Underwater toys Mater, Rip Clutchgoneski and K''NEX Building Toys like Lego, watch at:\r\nhttps://www.youtube.com/watch?v=SMbNjTXSpCk', '', 'ZIfFR_e8bOI', 'http://youtu.be/ZIfFR_e8bOI', '', 'video', 'BluCollection', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/ZIfFR_e8bOI/default.jpg', 'https://i1.ytimg.com/vi/ZIfFR_e8bOI/hqdefault.jpg', 'active', '2014-03-02 01:25:27', '2014-03-17 21:36:56'),
(3, 1, 1, '6 Color Changers CARS 2 Boost, Wingo, Darrell Cartrip, Brand New Mater, Lightning Mcqueen water toys', 'Unboxing 6 color changers cars shifters from Disney Pixar collection, 1:55 scale with:\r\n\r\n01) Boost Color Changers\r\n02) Darrell Cartrip Color Changers\r\n03) Mater Color Changers\r\n04) Wingo Color Changers\r\n05) Lightning Mcqueen Radiator Springs\r\n06) Lightning Mcqueen Dinoco racer.\r\n\r\nLightning McQueen is also called in other countries: "Bliksem Mcqueen" "Saetta mcqueen" "Lynet McQueen" "Rayo McQueen" "Flash Mcqueen" "Blixten McQueen" e "Faísca McQueen" e "Blesk McQueen" "Молния МакКуин" "Relâmpago Mcqueen" e "Zygzaka McQueen" "Şimsek mcqueen" ライトニング・マックィーン\r\n\r\nTow Mater catchphrases are "Dad gum!" and "Git-R-Done!" - He''s also called Mate, Cricchetto, Bill, Burák, Takel, Złomek, Мэтр, Bärgarn, Bucsă, Hook, メーター, Martin and "Carl Attrezzi" or "Carl Attrezzi Cricchetto"\r\n\r\nHere''s how Cars2 is called in other countries:  Arabalar, Autogrotesky, Аутомобили Cars2 "Arabalar 2" "Auta 2" "Auti 2" "Automobili 2" "Autod 2" "Autot 2" "Bilar 2" "Bilar 2" e "Cars 2" "Carros 2" "Les Bagnoles 2"  "Mankanebi 2" "Masini 2" "Ratai 2" "Тачки 2" e "Tachky 2" "Verdák 2"  "カーズ 2" "Les Bagnoles animées" "汽車總動員 2" "Cars Motori Ruggenti" "Cars Quatre roues" "bujdy na resorach" "Złomka bujdy na resorach"\r\n\r\nWatch Play-Doh Superheroes Cars Make n Display Spiderman Hulk Stage Show with Disney Pixar Cars Play Doh Batman vs. Superman facing each other. On this PlayDoh Superheroes cars video you''ll see Marvel Super Heroes the Avengers like Batman as Doc Hudson, Captain America Lightning McQueen, Mater Superman and Spider-Man. Sally Carrera and Mack Truck as Pit Crew Chief with headset watch at:\r\nhttps://www.youtube.com/watch?v=GVa1foHZ-fU\r\n\r\nCheck out "Play-Doh Doggy Doctor" Playset and take care of play-doh puppies:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch "Play-Doh Octopus" Playset Ocean Animals with Disney Finding Nemo Dory:\r\nhttps://www.youtube.com/watch?v=EwyncHfcRgE\r\n\r\nCheck Out "Play-Doh Coco Nutty Monkey" Playset and watch nutty Monkey eating play doh bananas with Despicable Me action figure Dave singing banana at:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch Play-Doh Trains Planes Cars Trucks Choppers with Play Dough Vehicles set:\r\nhttps://www.youtube.com/watch?v=RuwR1jmFYAM\r\n\r\nCheck out "Play-Doh Star Wars" The Clone Wars R2-D2 playset w/  Darth Mater,Luke Skywalker Lightning McQueen, Frank Tractor Tippin'' Stormtrooper, Jabba the Hutt at:\r\nhttp://www.youtube.com/watch?v=YHkSPgo5hqQ\r\n\r\nWatch Play-Doh Buster Power Crane Wrecking Ball From Tonka Trucks at:\r\nhttps://www.youtube.com/watch?v=wD1rKL8N8R0\r\n\r\nWatch "Play-Doh Mold N Go Speedway" Playset with Disney Pixar Cars Tuners Mater Hot Rod Boost Snot Rod, Wingo with Flames Francesco as Rip Clutchgoneski at:\r\nhttps://www.youtube.com/watch?v=K0wRMSDZbfM\r\n\r\nPlayDoh Chomper The Excavator Playset Tonka Truck from Chuck & Friends\r\nhttps://www.youtube.com/watch?v=O-f4ZK9EWXA#t=295\r\n\r\nEnjoy Cookie Monster Pool Party with Disney Pixar Cars Hydro Wheels Underwater toys Mater, Rip Clutchgoneski and K''NEX Building Toys like Lego, watch at:\r\nhttps://www.youtube.com/watch?v=SMbNjTXSpCk', '', 'W5hfHSJD94Y', 'http://youtu.be/W5hfHSJD94Y', '', 'video', 'BluCollection', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/W5hfHSJD94Y/default.jpg', 'https://i1.ytimg.com/vi/W5hfHSJD94Y/hqdefault.jpg', 'active', '2014-03-02 01:25:42', '2014-03-17 21:48:10'),
(4, 1, 1, 'Color Changers Cars Flo, Snot Rod, Chick Hicks & Tow Truck Colour changing Underwater toys', 'Hello Disney fans, today we''re unboxing 4 packages of color changers cars from Disney Pixar Cars. Here we have Flo, Snot Rod, Chick Hicks and race tow truck Tom. Also gonna be showing other color changer cars like lightning mcqueen, finn mcmissile, ramone, sheriff, boost, sally, dj, mater, martin., bob cutlass, wingo.\r\n\r\nCars color changer Flo.\r\nUPC 027084916881\r\nCars color changer Snot Rod.\r\nUPC 027084916867\r\nCars color changer Chick Hicks.\r\nUPC 027084889802\r\nCars color changer Tow Truck Tom.\r\nUPC 027084954807\r\n\r\nMusic by Kevin MacLeod\r\n\r\nHere''s how Cars2 is called in other countries:  Arabalar, Autogrotesky, Аутомобили Cars2 "Arabalar 2" "Auta 2" "Auti 2" "Automobili 2" "Autod 2" "Autot 2" "Bilar 2" "Bilar 2" e "Cars 2" "Carros 2" "Les Bagnoles 2"  "Mankanebi 2" "Masini 2" "Ratai 2" "Тачки 2" e "Tachky 2" "Verdák 2"  "カーズ 2" "Les Bagnoles animées" "汽車總動員 2" "Cars Motori Ruggenti"  "Cars Quatre roues" "bujdy na resorach" "Złomka bujdy na resorach"\r\n\r\nWatch Play-Doh Superheroes Cars Make n Display Spiderman Hulk Stage Show with Disney Pixar Cars Play Doh Batman vs. Superman facing each other. On this PlayDoh Superheroes cars video you''ll see Marvel Super Heroes the Avengers like Batman as Doc Hudson, Captain America Lightning McQueen, Mater Superman and Spider-Man. Sally Carrera and Mack Truck as Pit Crew Chief with headset watch at:\r\nhttps://www.youtube.com/watch?v=GVa1foHZ-fU\r\n\r\nCheck out "Play-Doh Doggy Doctor" Playset and take care of play-doh puppies:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch "Play-Doh Octopus" Playset Ocean Animals with Disney Finding Nemo Dory:\r\nhttps://www.youtube.com/watch?v=EwyncHfcRgE\r\n\r\nCheck Out "Play-Doh Coco Nutty Monkey" Playset and watch nutty Monkey eating play doh bananas with Despicable Me action figure Dave singing banana at:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch Play-Doh Trains Planes Cars Trucks Choppers with Play Dough Vehicles set:\r\nhttps://www.youtube.com/watch?v=RuwR1jmFYAM\r\n\r\nCheck out "Play-Doh Star Wars" The Clone Wars R2-D2 playset w/  Darth Mater,Luke Skywalker Lightning McQueen, Frank Tractor Tippin'' Stormtrooper, Jabba the Hutt at:\r\nhttp://www.youtube.com/watch?v=YHkSPgo5hqQ\r\n\r\nWatch Play-Doh Buster Power Crane Wrecking Ball From Tonka Trucks at:\r\nhttps://www.youtube.com/watch?v=wD1rKL8N8R0\r\n\r\nWatch "Play-Doh Mold N Go Speedway" Playset with Disney Pixar Cars Tuners Mater Hot Rod Boost Snot Rod, Wingo with Flames Francesco as Rip Clutchgoneski at:\r\nhttps://www.youtube.com/watch?v=K0wRMSDZbfM\r\n\r\nPlayDoh Chomper The Excavator Playset Tonka Truck from Chuck & Friends\r\nhttps://www.youtube.com/watch?v=O-f4ZK9EWXA#t=295\r\n\r\nEnjoy Cookie Monster Pool Party with Disney Pixar Cars Hydro Wheels Underwater toys Mater, Rip Clutchgoneski and K''NEX Building Toys like Lego, watch at:\r\nhttps://www.youtube.com/watch?v=SMbNjTXSpCk', '', 'lC9cgeEhWxs', 'http://youtu.be/lC9cgeEhWxs', '', 'video', 'BluCollection', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/lC9cgeEhWxs/default.jpg', 'https://i1.ytimg.com/vi/lC9cgeEhWxs/hqdefault.jpg', 'active', '2014-03-02 01:25:52', '2014-03-17 21:48:10'),
(5, 1, 1, '5 Color Changers Cars 2 Raoul Caroule Rusteze Mcqueen Dinoco Bob Cutlass colour water toys', 'Here''s the unboxing of FOUR packages from Disney Pixar cars and Cars 2 Color Changers shifters called Lightning Mcqueen rust-eze, Lightning Mcqueen Dinoco, Tex Dinoco, Bob Cutlass and from Cars2 racer from France Raoul Caroule.\r\n\r\n\r\nHere''s how Cars2 is called in other countries:  Arabalar, Autogrotesky, Аутомобили Cars2 "Arabalar 2" "Auta 2" "Auti 2" "Automobili 2" "Autod 2" "Autot 2" "Bilar 2" "Bilar 2" e "Cars 2" "Carros 2" "Les Bagnoles 2"  "Mankanebi 2" "Masini 2" "Ratai 2" "Тачки 2" e "Tachky 2" "Verdák 2"  "カーズ 2" "Les Bagnoles animées" "汽車總動員 2" "Cars Motori Ruggenti" "Cars Quatre roues" "bujdy na resorach" "Złomka bujdy na resorach"\r\n\r\nWatch Play-Doh Superheroes Cars Make n Display Spiderman Hulk Stage Show with Disney Pixar Cars Play Doh Batman vs. Superman facing each other. On this PlayDoh Superheroes cars video you''ll see Marvel Super Heroes the Avengers like Batman as Doc Hudson, Captain America Lightning McQueen, Mater Superman and Spider-Man. Sally Carrera and Mack Truck as Pit Crew Chief with headset watch at:\r\nhttps://www.youtube.com/watch?v=GVa1foHZ-fU\r\n\r\nCheck out "Play-Doh Doggy Doctor" Playset and take care of play-doh puppies:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch "Play-Doh Octopus" Playset Ocean Animals with Disney Finding Nemo Dory:\r\nhttps://www.youtube.com/watch?v=EwyncHfcRgE\r\n\r\nCheck Out "Play-Doh Coco Nutty Monkey" Playset and watch nutty Monkey eating play doh bananas with Despicable Me action figure Dave singing banana at:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch Play-Doh Trains Planes Cars Trucks Choppers with Play Dough Vehicles set:\r\nhttps://www.youtube.com/watch?v=RuwR1jmFYAM\r\n\r\nCheck out "Play-Doh Star Wars" The Clone Wars R2-D2 playset w/  Darth Mater,Luke Skywalker Lightning McQueen, Frank Tractor Tippin'' Stormtrooper, Jabba the Hutt at:\r\nhttp://www.youtube.com/watch?v=YHkSPgo5hqQ\r\n\r\nWatch Play-Doh Buster Power Crane Wrecking Ball From Tonka Trucks at:\r\nhttps://www.youtube.com/watch?v=wD1rKL8N8R0\r\n\r\nWatch "Play-Doh Mold N Go Speedway" Playset with Disney Pixar Cars Tuners Mater Hot Rod Boost Snot Rod, Wingo with Flames Francesco as Rip Clutchgoneski at:\r\nhttps://www.youtube.com/watch?v=K0wRMSDZbfM\r\n\r\nPlayDoh Chomper The Excavator Playset Tonka Truck from Chuck & Friends\r\nhttps://www.youtube.com/watch?v=O-f4ZK9EWXA#t=295\r\n\r\nEnjoy Cookie Monster Pool Party with Disney Pixar Cars Hydro Wheels Underwater toys Mater, Rip Clutchgoneski and K''NEX Building Toys like Lego, watch at:\r\nhttps://www.youtube.com/watch?v=SMbNjTXSpCk', '', 'rPNbc8DKG50', 'http://youtu.be/rPNbc8DKG50', '', 'video', 'BluCollection', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/rPNbc8DKG50/default.jpg', 'https://i1.ytimg.com/vi/rPNbc8DKG50/hqdefault.jpg', 'active', '2014-03-02 01:26:04', '2014-03-17 21:36:56'),
(6, 1, 1, 'Monster Truck Gear Up n Go Lightning McQueen CARS 2 Buildable Toy From Disney Pixar Toys', 'Hello cars fans, this is the gear up and go lightning mcqueen monster truck with big wheels from Disney Pixar Cars 2 and Mattel. Similar to "change-up mcqueen" and "Mcqueen gear and go". Comes with 15 parts to mix and match. Hours of fun. Up to 48 combinations. Monster truck McQueen, triple hood scoop McQueen, foglights McQueen, Radiator Springs Mcqueen, Tongue McQueen, nightvision, turbo monster truck, foglights monster truck and many others. You can pimp you lightning McQueen car anyway you like.  Its even cooler than ridemakerz. \r\n\r\nClick to watch the new cars2 gear up n go mcqueen.\r\nhttp://www.youtube.com/watch?v=sYLLxOE5GoM\r\n\r\nMusic by Kevin MacLeod\r\n\r\nWatch Play-Doh Superheroes Cars Make n Display Spiderman Hulk Stage Show with Disney Pixar Cars Play Doh Batman vs. Superman facing each other. On this PlayDoh Superheroes cars video you''ll see Marvel Super Heroes the Avengers like Batman as Doc Hudson, Captain America Lightning McQueen, Mater Superman and Spider-Man. Sally Carrera and Mack Truck as Pit Crew Chief with headset watch at:\r\nhttps://www.youtube.com/watch?v=GVa1foHZ-fU\r\n\r\nCheck out "Play-Doh Doggy Doctor" Playset and take care of play-doh puppies:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch "Play-Doh Octopus" Playset Ocean Animals with Disney Finding Nemo Dory:\r\nhttps://www.youtube.com/watch?v=EwyncHfcRgE\r\n\r\nCheck Out "Play-Doh Coco Nutty Monkey" Playset and watch nutty Monkey eating play doh bananas with Despicable Me action figure Dave singing banana at:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch Play-Doh Trains Planes Cars Trucks Choppers with Play Dough Vehicles set:\r\nhttps://www.youtube.com/watch?v=RuwR1jmFYAM\r\n\r\nCheck out "Play-Doh Star Wars" The Clone Wars R2-D2 playset w/  Darth Mater,Luke Skywalker Lightning McQueen, Frank Tractor Tippin'' Stormtrooper, Jabba the Hutt at:\r\nhttp://www.youtube.com/watch?v=YHkSPgo5hqQ\r\n\r\nWatch Play-Doh Buster Power Crane Wrecking Ball From Tonka Trucks at:\r\nhttps://www.youtube.com/watch?v=wD1rKL8N8R0\r\n\r\nWatch "Play-Doh Mold N Go Speedway" Playset with Disney Pixar Cars Tuners Mater Hot Rod Boost Snot Rod, Wingo with Flames Francesco as Rip Clutchgoneski at:\r\nhttps://www.youtube.com/watch?v=K0wRMSDZbfM\r\n\r\nPlayDoh Chomper The Excavator Playset Tonka Truck from Chuck & Friends\r\nhttps://www.youtube.com/watch?v=O-f4ZK9EWXA#t=295\r\n\r\nEnjoy Cookie Monster Pool Party with Disney Pixar Cars Hydro Wheels Underwater toys Mater, Rip Clutchgoneski and K''NEX Building Toys like Lego, watch at:\r\nhttps://www.youtube.com/watch?v=SMbNjTXSpCk', '', 'oQiGfOjFpls', 'http://youtu.be/oQiGfOjFpls', '', 'video', 'BluCollection', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/oQiGfOjFpls/default.jpg', 'https://i1.ytimg.com/vi/oQiGfOjFpls/hqdefault.jpg', 'active', '2014-03-02 01:26:25', '2014-03-17 21:48:10'),
(7, 1, 1, 'Play Doh Transformers Autobot Workshop Playset Transform Lightning McQueen in Autobots Disney Cars', 'This is play doh Transformers Autobot Workshop play set from Dark of the Moon with bumblebee, Ironhide, Megatron and Optimus Prime. Roll cars into the workshop and watch as they transform into robots! This playset comes with 4 cans, 4 car molds and sculpting tools to help build your favorite Transformers Best of all with this set you can transform your Disney Pixar play-doh cars into autobots. In this video i''m transforming Cars 2 Lightning McQueen, Raoul Caroule and Francesco Bernoulli into robots. Thanks for watching my car-toys reviews by blucollection.\r\n\r\nThe Autobots also known as Cybertrons are the heroes in the Transformers toyline and related spin-off comics and cartoons. Their main leader is Optimus Prime. They are constantly at war with the Decepticons. Dark side of the Moon is the third film from the seriesin which the Decepticons unveil a plan to enslave humanity in order to bring back Cybertron, the home planet of the Transformers.\r\n\r\nAccording to wiki pixar racer #95 Mcqueen  is sponsored by Rust-eze racing. He also appears in Cars Toons Mater''s Tall Tales. He''s also called in other countries: Bliksem, Saetta, Lynet, El Rayo, Flash, Blixten, Faísca, Blesk, Şimsek, Relâmpago, Zygzaka McQueen" "Молния МакКуин" ライトニング・マックィーン.\r\n\r\nWatch Play-Doh Superheroes Cars Make n Display Spiderman Hulk Stage Show with Disney Pixar Cars Play Doh Batman vs. Superman facing each other. Here you''ll see Marvel Super Heroes Cars the Avengers like Batman as Doc Hudson, Captain America Lightning McQueen, Mater Superman, Mack Truck as Pit Crew Chief with headset and Sally Carrera Pit Crew with Headset, watch only at Toychannel Disneycollector:\r\nhttps://www.youtube.com/watch?v=GVa1foHZ-fU\r\n\r\nCheck out "Play-Doh Doggy Doctor" Playset and take care of play-doh puppies:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch "Play-Doh Octopus" Playset Ocean Animals with Disney Finding Nemo Dory:\r\nhttps://www.youtube.com/watch?v=EwyncHfcRgE\r\n\r\nCheck Out "Play-Doh Coco Nutty Monkey" Playset and watch nutty Monkey eating play doh bananas with Despicable Me action figure Dave singing banana at:\r\nhttps://www.youtube.com/watch?v=DOW-9LUcrPo\r\n\r\nWatch Play-Doh Trains Planes Cars Trucks Choppers with Play Dough Vehicles set:\r\nhttps://www.youtube.com/watch?v=RuwR1jmFYAM\r\n\r\nCheck out "Play-Doh Star Wars" The Clone Wars R2-D2 playset w/  Darth Mater,Luke Skywalker Lightning McQueen, Frank Tractor Tippin'' Stormtrooper, Jabba the Hutt at:\r\nhttp://www.youtube.com/watch?v=YHkSPgo5hqQ\r\n\r\nWatch Play-Doh Buster Power Crane Wrecking Ball From Tonka Trucks at:\r\nhttps://www.youtube.com/watch?v=wD1rKL8N8R0\r\n\r\nWatch "Play-Doh Mold N Go Speedway" Playset with Disney Pixar Cars Tuners Mater Hot Rod Boost Snot Rod, Wingo with Flames Francesco as Rip Clutchgoneski at:\r\nhttps://www.youtube.com/watch?v=K0wRMSDZbfM\r\n\r\nLearn the Alphabet ABC with "Cookie Monster Eats Cars" Micro Drifters and Play-Doh Letter Lunch Cookie Monster From Sesame Street, watch and learn ABC''s at:\r\nhttps://www.youtube.com/watch?v=W67E90h8GTY\r\n\r\nEnjoy Cookie Monster Pool Party with Disney Pixar Cars Hydro Wheels Underwater toys Mater, Rip Clutchgoneski and K''NEX Building Toys like Lego, watch at:\r\nhttps://www.youtube.com/watch?v=SMbNjTXSpCk', '', 'wZINpnFAiUA', 'http://youtu.be/wZINpnFAiUA', '', 'video', 'BluCollection', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/wZINpnFAiUA/default.jpg', 'https://i1.ytimg.com/vi/wZINpnFAiUA/hqdefault.jpg', 'active', '2014-03-02 01:26:36', '2014-03-17 21:36:56'),
(8, 1, 1, 'Hello Kitty full episode   Paradise Part 3', 'Hello Kitty (ハローキティ Harō Kiti?)[3] (full name Kitty White (キティ・ホワイト Kiti howaito?))[2] is a fictional character produced by the Japanese company Sanrio, first designed by Yuko Shimizu. She is portrayed as a female white Japanese bobtail cat with a red bow.[1] The character''s first appearance on an item, a vinyl coin purse, was introduced in Japan in 1974 and brought to the United States in 1976.[4][5] The character is a staple of the kawaii segment of Japanese popular culture.[6] At age 36 as of 2010, Sanrio has groomed Hello Kitty into a global marketing phenomenon worth $5 billion a year.[7]\r\n\r\nOriginally aimed at pre-adolescent females, Hello Kitty''s market has broadened to include adult consumers. She can be found on a variety of products ranging from school supplies to fashion accessories and high-end consumer products. Several Hello Kitty TV series, targeted towards young children, have been produced. Hello Kitty is also the main character at the two Japanese Sanrio theme parks, Harmonyland and the indoor Sanrio Puroland.\r\n\r\nHello Kitty is originaly Japanese, "Hello Kitty" refers to the group of related characters, while the main character herself is known as Kitty White (キティ・ホワイト Kiti Howaito?), or affectionately as Kitty-chan (キティちゃん Kiti-chan?). According to the official character profile, she was born in the suburbs of London, England on November 1. Her height is described as five apples and her weight as three apples. She is portrayed as a bright and kind-hearted girl, very close to her twin sister Mimmy. She is good at baking cookies and loves Mama''s homemade apple pie. She likes to collect cute things and her favorite subjects in school are English, music and art.[2][8]\r\n\r\nHello Kitty is portrayed surrounded by a large family who all possess the surname ''White.'' Her twin sister Mimmy is described as "shy and very girly," interested in sewing and dreaming of marriage. While Hello Kitty wears a bow on her left ear, Mimmy wears hers on the right. Also Hello Kitty''s dresses are normally red, whereas Mimmy''s are normally yellow. Their Papa, George, is described as dependable, humorous but also absent-minded. Mama, Mary, is portrayed as a good cook who loves doing housework. Grandpa Anthony likes to tell stories and Grandma Margaret likes sewing.[8] Dear Daniel is Hello Kitty''s childhood friend. His character profile describes him as born in London on May 3 with the real name Daniel Starr. He travelled with his parents and was away from Hello Kitty for a long time. He is portrayed as fashionable and sensitive, good at dancing and playing the piano, with an interest in photography and dreams of being a celebrity.[9] Charmmy Kitty is Hello Kitty''s pet, a white Persian. She is described as docile, obedient and fond of shiny things. Her necklace holds the key to Hello Kitty''s jewelry box.[10] Hello Kitty also has a pet hamster named Sugar, who was a gift from Dear Daniel', '', 'cnUi1ii30Ek', 'http://youtu.be/cnUi1ii30Ek', '', 'video', 'HeIIo Kitty', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/cnUi1ii30Ek/default.jpg', 'https://i1.ytimg.com/vi/cnUi1ii30Ek/hqdefault.jpg', 'active', '2014-03-02 01:26:47', '2014-03-17 21:36:56'),
(9, 1, 1, 'X-MEN: DAYS OF FUTURE PAST - Official Trailer (2014)', 'The ultimate X-Men ensemble fights a war for the survival of the species across two time periods in X-MEN: DAYS OF FUTURE PAST. The beloved characters from the original "X-Men" film trilogy join forces with their younger selves from "X-Men: First Class," in an epic battle that must change the past -- to save our future.\r\n\r\nFOLLOW on Facebook: www.facebook.com/XMenMovies\r\nwww.x-menmovies.com\r\nwww.youtube.com/xmenmovies', '', 'pK2zYHWDZKo', 'http://youtu.be/pK2zYHWDZKo', '', 'video', 'X-Men Movies', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/pK2zYHWDZKo/default.jpg', 'https://i1.ytimg.com/vi/pK2zYHWDZKo/hqdefault.jpg', 'active', '2014-03-02 01:39:47', '2014-03-06 19:31:25'),
(10, 1, 1, 'Hercules: The Legend Begins Trailer 2014 Movie - Official [HD]', 'Hercules: The Legend Begins Trailer 2014 - Official 2014 movie trailer in HD - starring Kellan Lutz, Scott Adkins, Liam McIntyre, Liam Garrigan - directed by Renny Harlin - the story behind one of the greatest myths is revealed in this action-packed epic.\r\n\r\n"Hercules: The Legend Begins" movie hits theaters January 10, 2014.\r\n\r\nIn Ancient Greece 1200 B.C., a queen succumbs to the lust of Zeus to bear a son promised to overthrow the tyrannical rule of the king and restore peace to a land in hardship. But this prince, Hercules, knows nothing of his real identity or his destiny. He desires only one thing: the love of Hebe, Princess of Crete, who has been promised to his own brother. When Hercules learns of his greater purpose, he must choose: to flee with his true love or to fulfill his destiny and become the true hero of his time. The story behind one of the greatest myths is revealed in this action-packed epic - a tale of love, sacrifice and the strength of the human spirit. Hercules: The Legend Begins trailer 2014 is presented in full HD 1080p high resolution.\r\n\r\nHercules: The Legend Begins 2014 Movie\r\nGenre: Action, Adventure\r\nDirector: Renny Harlin\r\nActors: Kellan Lutz, Scott Adkins, Liam McIntyre, Liam Garrigan, Johnathon Schaech, Roxanne McKee, Gaia Weiss, Rade Serbedzija\r\n\r\nHercules: The Legend Begins official movie trailer courtesy Millennium Films.\r\n\r\nStreaming Trailer is your daily dose of new movies. Our passionate team of producers bring you the best of officially licensed movie trailers and movie clips.\r\n\r\nTags: "hercules the legend begins trailer" hercules the legend begins trailer 2014 official hd 2013 movie "hercules the legend begins" "hercules the legend begins 2014" "hercules the legend begins"  "the legend begins trailer" "the legend begins" "hercules 2014" "hercules 2013" "hercules 2013 trailer" "hercules trailer" "hercules trailer 2014" "movie trailer" "film trailer" "official trailer" "trailer 2013" "trailer 2014" "2014 trailer" movies trailers film films new today this week this month theatrical teaser "trailer 2" "hercules legend begins" "hercules legend begins trailer"', '', 'eBq1AupSrLI', 'http://youtu.be/eBq1AupSrLI', '', 'video', 'StreamingTrailer', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/eBq1AupSrLI/default.jpg', 'https://i1.ytimg.com/vi/eBq1AupSrLI/hqdefault.jpg', 'active', '2014-03-02 01:41:54', '2014-03-06 19:31:25'),
(11, 1, 1, 'Chnda Mama Door Ke', 'my favourite lori and in fact of every  child', '', '5g6ouMYl4XY', 'http://youtu.be/5g6ouMYl4XY', '', 'video', 'SHARAD KUMAR DUTTA', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/5g6ouMYl4XY/default.jpg', 'https://i1.ytimg.com/vi/5g6ouMYl4XY/hqdefault.jpg', 'active', '2014-03-02 01:43:25', '2014-03-17 21:36:56'),
(12, 1, 1, '"Bhoothnath Returns" Trailer (Official) | Amitabh Bachchan, Boman Irani | Releasing 11 April, 2014', 'T-Series and B.R Chopra proudly brings to you "Bhootnath Returns" - the most awaited trailer of Amitabh Bachchan starrer movie , directed by Nitesh Tiwari and is produced by Bhushan Kumar ,Krishan Kumar and Renu Ravi Chopra. The film is set to release on 11 April, 2014 \r\n\r\nEnjoy and stay connected with us!!\r\n\r\nSUBSCRIBE T-Series channel for unlimited entertainment\r\nhttp://www.youtube.com/tseries\r\n\r\nCircle us on G+ \r\nhttp://www.google.com/+tseriesmusic\r\n\r\nLike us on Facebook\r\nhttp://www.facebook.com/tseriesmusic\r\n\r\nFollow us on\r\nhttp://www.twitter.com/tseries\r\n\r\nFind us on\r\nhttp://pinterest.com/tseries\r\n\r\n\r\n\r\n-----------------------------------------------\r\n"bhootnath 2 trailer" "bhootnath 2" "bhootnath 2 movie" "new hindi movies" "hindi films 2014"', '', 'BpC-Owk5MNY', 'http://youtu.be/BpC-Owk5MNY', '', 'video', 'T-Series', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/BpC-Owk5MNY/default.jpg', 'https://i1.ytimg.com/vi/BpC-Owk5MNY/hqdefault.jpg', 'active', '2014-03-02 02:04:59', '2014-03-06 19:31:25'),
(13, 1, 1, '"Maine Khud Ko" Ragini MMS 2 Video Song | Sunny Leone | Mustafa Zahid', 'Song: MAINE KHUD KO\r\nMovie: RAGINI MMS 2\r\nSinger: MUSTAFA ZAHID\r\nLyrics: KUMAAR\r\nMusic: PRANAY RIJIA\r\nMusic on T-SERIES\r\n\r\nBuy from iTunes: https://itunes.apple.com/in/album/ragini-mms-2-original-motion/id830243480\r\n\r\nReleasing on 21st March, 2014\r\n\r\nEnjoy and stay connected with us!!\r\n\r\nSUBSCRIBE T-Series channel for unlimited entertainment\r\nhttp://www.youtube.com/tseries\r\n\r\nCircle us on G+ \r\nhttp://www.google.com/+tseriesmusic\r\n\r\nLike us on Facebook\r\nhttp://www.facebook.com/tseriesmusic\r\n\r\nFollow us on\r\nhttp://www.twitter.com/tseries\r\n\r\n--------------------------------------------------------------\r\n\r\nSet "Maine Khud Ko" as your callertune - SMS RMMS8 to 54646\r\nSet "Maine Khud Ko - Reprise" as your callertune - SMS RMMS14 to 54646\r\n\r\nOperators Codes:\r\n\r\n1. Maine Khud Ko\r\n\r\nVodafone Subscribers Dial 5374989872\r\nAirtel Subscribers Dial 5432114047852\r\nReliance Subscribers Dial 595016164\r\nIdea Subscribers Dial 567894989872\r\nTata DoCoMo Subscribers Dial 59090446569\r\nAircel Subscribers sms DT 2169072  To 53000\r\nTata Indicom Subscribers sms WT1268271 To12800\r\nBSNL (South / East) Subscribers sms 4989872 To 56700\r\nBSNL (North / West) Subscribers sms 2169072 To 56700\r\nVirgin Subscribers sms TT 4989872 To 58475\r\nMTS Subscribers Dial 52222628659\r\nUninor Subscribers Dial 522226140594\r\nMTNL Subscribers SMS PT 4989872 To 56789\r\n\r\n2. Maine Khud Ko - Reprise\r\n\r\nVodafone Subscribers Dial 5374989877\r\nAirtel Subscribers Dial 5432114047825\r\nReliance Subscribers Dial 595016170\r\nIdea Subscribers Dial 567894989877\r\nTata DoCoMo Subscribers Dial 59090446575\r\nAircel Subscribers sms DT 2169073  To 53000\r\nTata Indicom Subscribers sms WT1268277 To12800\r\nBSNL (South / East) Subscribers sms 4989877 To 56700\r\nBSNL (North / West) Subscribers sms 2169073 To 56700\r\nVirgin Subscribers sms TT 4989877 To 58475\r\nMTS Subscribers Dial 52222628665\r\nUninor Subscribers Dial 522226140600\r\nMTNL Subscribers SMS PT 4989877 To 56789', '', 'yJiVTol_G-Q', 'http://youtu.be/yJiVTol_G-Q', '', 'video', 'T-Series', 'youtube', '', '', '', 0, 'https://i1.ytimg.com/vi/yJiVTol_G-Q/default.jpg', 'https://i1.ytimg.com/vi/yJiVTol_G-Q/hqdefault.jpg', 'active', '2014-03-18 03:12:20', '2014-03-17 21:42:20');

-- --------------------------------------------------------

--
-- Dumping data for table `content_views`
--

INSERT INTO `content_views` (`content_id`, `date`, `views`, `environment_id`) VALUES
(1, '2014-03-02', 19391712, 3),
(2, '2014-03-02', 14479870, 3),
(3, '2014-03-02', 13923316, 3),
(4, '2014-03-02', 13086068, 3),
(5, '2014-03-02', 27485654, 3),
(6, '2014-03-02', 23377389, 3),
(7, '2014-03-02', 21292383, 3),
(8, '2014-03-02', 113279, 3),
(9, '2014-03-02', 24897465, 3),
(10, '2014-03-02', 7705017, 3),
(11, '2014-03-02', 8663833, 3),
(12, '2014-03-02', 1319452, 3),
(13, '2014-03-18', 894269, 3);

-- --------------------------------------------------------

--
-- Dumping data for table `environments`
--

INSERT INTO `environments` (`id`, `name`, `shortcode`, `is_active`) VALUES
(1, 'Microsite', 'bs', 1),
(2, 'Facebook', 'fb', 1),
(3, 'YouTube', 'yt', 1),
(4, 'twitter', 'tw', 0);

-- --------------------------------------------------------

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `thumb`, `description`, `order_id`, `title`, `status`, `is_ugc`, `voting_enabled`, `is_moderated`, `date_created`, `date_modified`) VALUES
(1, 'GalleryCurtainRaiser', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/gallery_1393702308_thumb.jpg', 'Gallery for the curtain raiser phase. Updated description', NULL, 'Curtain Raiser', 'active', 0, 0, 0, '2014-03-02 01:00:04', '2014-03-17 20:20:24'),
(2, 'gallery2', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/gallery_1393702279_thumb.jpg', 'Gallery for the about us page', NULL, 'About us', 'inactive', 0, 0, 0, '2014-03-02 01:01:19', '2014-03-17 20:20:25');

-- --------------------------------------------------------

--
-- Dumping data for table `geolocation_countries`
--

INSERT INTO `geolocation_countries` (`country_id`, `abbreviation`, `display_name`) VALUES
(1, 'af', 'Afghanistan'),
(2, 'ax', 'Åland Islands'),
(3, 'al', 'Albania'),
(4, 'dz', 'Algeria'),
(5, 'as', 'American Samoa'),
(6, 'ad', 'Andorra'),
(7, 'ao', 'Angola'),
(8, 'ai', 'Anguilla'),
(9, 'aq', 'Antarctica'),
(10, 'ag', 'Antigua and Barbuda'),
(11, 'ar', 'Argentina'),
(12, 'am', 'Armenia'),
(13, 'aw', 'Aruba'),
(14, 'au', 'Australia'),
(15, 'at', 'Austria'),
(16, 'az', 'Azerbaijan'),
(17, 'bs', 'Bahamas'),
(18, 'bh', 'Bahrain'),
(19, 'bd', 'Bangladesh'),
(20, 'bb', 'Barbados'),
(21, 'by', 'Belarus'),
(22, 'be', 'Belgium'),
(23, 'bz', 'Belize'),
(24, 'bj', 'Benin'),
(25, 'bm', 'Bermuda'),
(26, 'bt', 'Bhutan'),
(27, 'bo', 'Bolivia, Plurinational State of'),
(28, 'ba', 'Bosnia and Herzegovina'),
(29, 'bw', 'Botswana'),
(30, 'bv', 'Bouvet Island'),
(31, 'br', 'Brazil'),
(32, 'io', 'British Indian Ocean Territory'),
(33, 'bn', 'Brunei Darussalam'),
(34, 'bg', 'Bulgaria'),
(35, 'bf', 'Burkina Faso'),
(36, 'bi', 'Burundi'),
(37, 'kh', 'Cambodia'),
(38, 'cm', 'Cameroon'),
(39, 'ca', 'Canada'),
(40, 'cv', 'Cape Verde'),
(41, 'ky', 'Cayman Islands'),
(42, 'cf', 'Central African Republic'),
(43, 'td', 'Chad'),
(44, 'cl', 'Chile'),
(45, 'cn', 'China'),
(46, 'cx', 'Christmas Island'),
(47, 'cc', 'Cocos (Keeling) Islands'),
(48, 'co', 'Colombia'),
(49, 'km', 'Comoros'),
(50, 'cg', 'Congo'),
(51, 'cd', 'Congo, the Democratic Republic of the'),
(52, 'ck', 'Cook Islands'),
(53, 'cr', 'Costa Rica'),
(54, 'ci', 'Côte d''Ivoire'),
(55, 'hr', 'Croatia'),
(56, 'cu', 'Cuba'),
(57, 'cy', 'Cyprus'),
(58, 'cz', 'Czech Republic'),
(59, 'dk', 'Denmark'),
(60, 'dj', 'Djibouti'),
(61, 'dm', 'Dominica'),
(62, 'do', 'Dominican Republic'),
(63, 'ec', 'Ecuador'),
(64, 'eg', 'Egypt'),
(65, 'sv', 'El Salvador'),
(66, 'gq', 'Equatorial Guinea'),
(67, 'er', 'Eritrea'),
(68, 'ee', 'Estonia'),
(69, 'et', 'Ethiopia'),
(70, 'fk', 'Falkland Islands (Malvinas)'),
(71, 'fo', 'Faroe Islands'),
(72, 'fj', 'Fiji'),
(73, 'fi', 'Finland'),
(74, 'fr', 'France'),
(75, 'gf', 'French Guiana'),
(76, 'pf', 'French Polynesia'),
(77, 'tf', 'French Southern Territories'),
(78, 'ga', 'Gabon'),
(79, 'gm', 'Gambia'),
(80, 'ge', 'Georgia'),
(81, 'de', 'Germany'),
(82, 'gh', 'Ghana'),
(83, 'gi', 'Gibraltar'),
(84, 'gr', 'Greece'),
(85, 'gl', 'Greenland'),
(86, 'gd', 'Grenada'),
(87, 'gp', 'Guadeloupe'),
(88, 'gu', 'Guam'),
(89, 'gt', 'Guatemala'),
(90, 'gg', 'Guernsey'),
(91, 'gn', 'Guinea'),
(92, 'gw', 'Guinea-Bissau'),
(93, 'gy', 'Guyana'),
(94, 'ht', 'Haiti'),
(95, 'hm', 'Heard Island and McDonald Islands'),
(96, 'va', 'Holy See (Vatican City State)'),
(97, 'hn', 'Honduras'),
(98, 'hk', 'Hong Kong'),
(99, 'hu', 'Hungary'),
(100, 'is', 'Iceland'),
(101, 'in', 'India'),
(102, 'id', 'Indonesia'),
(103, 'ir', 'Iran, Islamic Republic of'),
(104, 'iq', 'Iraq'),
(105, 'ie', 'Ireland'),
(106, 'im', 'Isle of Man'),
(107, 'il', 'Israel'),
(108, 'it', 'Italy'),
(109, 'jm', 'Jamaica'),
(110, 'jp', 'Japan'),
(111, 'je', 'Jersey'),
(112, 'jo', 'Jordan'),
(113, 'kz', 'Kazakhstan'),
(114, 'ke', 'Kenya'),
(115, 'ki', 'Kiribati'),
(116, 'kp', 'Korea, Democratic People''s Republic of'),
(117, 'kr', 'Korea, Republic of'),
(118, 'kw', 'Kuwait'),
(119, 'kg', 'Kyrgyzstan'),
(120, 'la', 'Lao People''s Democratic Republic'),
(121, 'lv', 'Latvia'),
(122, 'lb', 'Lebanon'),
(123, 'ls', 'Lesotho'),
(124, 'lr', 'Liberia'),
(125, 'ly', 'Libyan Arab Jamahiriya'),
(126, 'li', 'Liechtenstein'),
(127, 'lt', 'Lithuania'),
(128, 'lu', 'Luxembourg'),
(129, 'mo', 'Macao'),
(130, 'mk', 'Macedonia, the former Yugoslav Republic of'),
(131, 'mg', 'Madagascar'),
(132, 'mw', 'Malawi'),
(133, 'my', 'Malaysia'),
(134, 'mv', 'Maldives'),
(135, 'ml', 'Mali'),
(136, 'mt', 'Malta'),
(137, 'mh', 'Marshall Islands'),
(138, 'mq', 'Martinique'),
(139, 'mr', 'Mauritania'),
(140, 'mu', 'Mauritius'),
(141, 'yt', 'Mayotte'),
(142, 'mx', 'Mexico'),
(143, 'fm', 'Micronesia, Federated States of'),
(144, 'md', 'Moldova, Republic of'),
(145, 'mc', 'Monaco'),
(146, 'mn', 'Mongolia'),
(147, 'me', 'Montenegro'),
(148, 'ms', 'Montserrat'),
(149, 'ma', 'Morocco'),
(150, 'mz', 'Mozambique'),
(151, 'mm', 'Myanmar'),
(152, 'na', 'Namibia'),
(153, 'nr', 'Nauru'),
(154, 'np', 'Nepal'),
(155, 'nl', 'Netherlands'),
(156, 'an', 'Netherlands Antilles'),
(157, 'nc', 'New Caledonia'),
(158, 'nz', 'New Zealand'),
(159, 'ni', 'Nicaragua'),
(160, 'ne', 'Niger'),
(161, 'ng', 'Nigeria'),
(162, 'nu', 'Niue'),
(163, 'nf', 'Norfolk Island'),
(164, 'mp', 'Northern Mariana Islands'),
(165, 'no', 'Norway'),
(166, 'om', 'Oman'),
(167, 'pk', 'Pakistan'),
(168, 'pw', 'Palau'),
(169, 'ps', 'Palestinian Territory, Occupied'),
(170, 'pa', 'Panama'),
(171, 'pg', 'Papua New Guinea'),
(172, 'py', 'Paraguay'),
(173, 'pe', 'Peru'),
(174, 'ph', 'Philippines'),
(175, 'pn', 'Pitcairn'),
(176, 'pl', 'Poland'),
(177, 'pt', 'Portugal'),
(178, 'pr', 'Puerto Rico'),
(179, 'qa', 'Qatar'),
(180, 're', 'Réunion'),
(181, 'ro', 'Romania'),
(182, 'ru', 'Russian Federation'),
(183, 'rw', 'Rwanda'),
(184, 'bl', 'Saint Barth?lemy'),
(185, 'sh', 'Saint Helena'),
(186, 'kn', 'Saint Kitts and Nevis'),
(187, 'lc', 'Saint Lucia'),
(188, 'mf', 'Saint Martin (French part)'),
(189, 'pm', 'Saint Pierre and Miquelon'),
(190, 'vc', 'Saint Vincent and the Grenadines'),
(191, 'ws', 'Samoa'),
(192, 'sm', 'San Marino'),
(193, 'st', 'Sao Tome and Principe'),
(194, 'sa', 'Saudi Arabia'),
(195, 'sn', 'Senegal'),
(196, 'rs', 'Serbia'),
(197, 'sc', 'Seychelles'),
(198, 'sl', 'Sierra Leone'),
(199, 'sg', 'Singapore'),
(200, 'sk', 'Slovakia'),
(201, 'si', 'Slovenia'),
(202, 'sb', 'Solomon Islands'),
(203, 'so', 'Somalia'),
(204, 'za', 'South Africa'),
(205, 'gs', 'South Georgia and the South Sandwich Islands'),
(206, 'es', 'Spain'),
(207, 'lk', 'Sri Lanka'),
(208, 'sd', 'Sudan'),
(209, 'sr', 'Suriname'),
(210, 'sj', 'Svalbard and Jan Mayen'),
(211, 'sz', 'Swaziland'),
(212, 'se', 'Sweden'),
(213, 'ch', 'Switzerland'),
(214, 'sy', 'Syrian Arab Republic'),
(215, 'tw', 'Taiwan, Province of China'),
(216, 'tj', 'Tajikistan'),
(217, 'tz', 'Tanzania, United Republic of'),
(218, 'th', 'Thailand'),
(219, 'tl', 'Timor-Leste'),
(220, 'tg', 'Togo'),
(221, 'tk', 'Tokelau'),
(222, 'to', 'Tonga'),
(223, 'tt', 'Trinidad and Tobago'),
(224, 'tn', 'Tunisia'),
(225, 'tr', 'Turkey'),
(226, 'tm', 'Turkmenistan'),
(227, 'tc', 'Turks and Caicos Islands'),
(228, 'tv', 'Tuvalu'),
(229, 'ug', 'Uganda'),
(230, 'ua', 'Ukraine'),
(231, 'ae', 'United Arab Emirates'),
(232, 'gb', 'United Kingdom'),
(233, 'us', 'United States'),
(234, 'um', 'United States Minor Outlying Islands'),
(235, 'uy', 'Uruguay'),
(236, 'uz', 'Uzbekistan'),
(237, 'vu', 'Vanuatu'),
(238, 've', 'Venezuela, Bolivarian Republic of'),
(239, 'vn', 'Viet Nam'),
(240, 'vg', 'Virgin Islands, British'),
(241, 'vi', 'Virgin Islands, U.S.'),
(242, 'wf', 'Wallis and Futuna'),
(243, 'eh', 'Western Sahara'),
(244, 'ye', 'Yemen'),
(245, 'zm', 'Zambia'),
(246, 'zw', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `seo_title`, `is_default`, `environment_id`, `status`, `title`, `description`, `thumb`, `share_text`, `theater_share_text`, `share_url`, `header`, `footer`, `partners`, `date_created`, `date_modified`) VALUES
(4, 'Curtain Raiser', 'curtain-raiser', 1, 1, 'active', 'The Curtain Raiser', 'curtain raiser landing page', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1393744427_thumb.jpg', '', '', '', 1, 1, 1, '2014-03-02 12:43:47', '2014-03-06 19:28:51'),
(5, 'About', 'about', 0, 1, 'active', 'About Us', 'details for the about us page', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1393744475_thumb.jpg', '', '', '', 1, 1, 1, '2014-03-02 12:44:36', '2014-03-06 19:50:41'),
(6, 'How It Works', 'how-it-works', 0, 1, 'active', 'How it works', 'contest details and working procedure', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1393744573_thumb.jpg', '', '', '', 1, 1, 1, '2014-03-02 12:46:13', '2014-03-06 19:28:51'),
(7, 'Rules', 'rules', 0, 1, 'active', 'Rules', 'details of rules of the game', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1393744799_thumb.jpg', '', '', '', 1, 1, 0, '2014-03-02 12:49:59', '2014-03-06 19:28:51'),
(8, 'privacy policy', 'privacy-policy', 0, 1, 'active', 'Privacy Policy', 'Privacy rules for the content uploaded during the contest', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1394883918_thumb.jpg', '', '', '', 1, 1, 1, '2014-03-15 17:15:18', '2014-03-15 11:45:25'),
(9, 'terms & conditions', 'terms-conditions', 0, 1, 'active', 'Terms & Conditions', '', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1394883962_thumb.jpg', '', '', '', 1, 1, 1, '2014-03-15 17:16:02', '2014-03-15 11:46:59'),
(10, 'user agreement', 'user-agreement', 0, 1, 'active', 'User Agreement', '', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1394884037_thumb.jpg', '', '', '', 1, 1, 1, '2014-03-15 17:16:50', '2014-03-15 11:47:17'),
(11, 'Submission Start', 'submission-start', 1, 1, 'active', 'Submission Starts', 'Default page for the Submission phase.\r\nThis will mark the begining of the submission.', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1395438471_thumb.jpg', '', '', '', 1, 1, 0, '2014-03-22 03:17:53', '2014-03-21 21:48:05'),
(12, 'Participate', 'participate', 0, 1, 'pending', 'Participate landing page', '', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1395554485_thumb.jpg', '', '', '', 0, 0, 0, '2014-03-23 11:31:26', '2014-03-23 06:01:26'),
(13, 'Registration', 'registration', 0, 1, 'pending', 'UGC Registration', '', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1395554544_thumb.jpg', '', '', '', 0, 0, 0, '2014-03-23 11:32:24', '2014-03-23 06:02:24'),
(14, 'thank you', 'thank-you', 0, 1, 'pending', 'Registration Thank you Page', '', 'http://localhost:8888/cnkAdmin/uploadedImages/thumb/page_1395554577_thumb.jpg', '', '', '', 0, 0, 0, '2014-03-23 11:32:57', '2014-03-23 06:02:57');

-- --------------------------------------------------------

--
-- Dumping data for table `page_galleries`
--

INSERT INTO `page_galleries` (`page_id`, `gallery_id`, `order_id`) VALUES
(4, 1, 0),
(5, 1, 0),
(6, 1, 0),
(7, 1, 0),
(11, 1, 0);

-- --------------------------------------------------------

--
-- Dumping data for table `page_widgets`
--

INSERT INTO `page_widgets` (`page_id`, `widget_id`, `order_id`) VALUES
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 1),
(10, 1, 1),
(11, 1, 1),
(12, 1, 1),
(13, 1, 1),
(14, 1, 1),
(4, 2, 2),
(5, 2, 2),
(6, 2, 2),
(7, 2, 2),
(8, 2, 2),
(9, 2, 2),
(10, 2, 2),
(11, 2, 2),
(12, 2, 2),
(13, 2, 2),
(14, 2, 2),
(4, 3, 3),
(5, 3, 3),
(11, 3, 3),
(4, 4, 4),
(11, 4, 4),
(5, 5, 4),
(6, 6, 3),
(7, 7, 3);

-- --------------------------------------------------------

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`id`, `phase_name`, `page_id`, `page_name`, `page_label`, `link_type`, `status`, `date_modified`) VALUES
(1, 'curtain_raiser', 4, 'curtain-raiser', 'home', 'landing', 'active', '2014-03-02 15:49:05'),
(2, 'curtain_raiser', 5, 'about', 'About', 'associate', 'active', '2014-03-02 15:49:05'),
(3, 'curtain_raiser', 6, 'how-it-works', 'How It Works', 'associate', 'active', '2014-03-02 15:49:05'),
(4, 'curtain_raiser', 7, 'rules', 'Rules', 'associate', 'active', '2014-03-02 15:49:05'),
(5, 'curtain_raiser', 8, 'privacy-policy', 'Privacy Policy', 'associate', 'active', '2014-03-15 11:54:05'),
(6, 'curtain_raiser', 9, 'terms-conditions', 'Terms & Conditions', 'associate', 'active', '2014-03-15 11:54:05'),
(7, 'curtain_raiser', 10, 'user-agreement', 'User Agreement', 'associate', 'active', '2014-03-15 11:55:55'),
(8, 'submission', 11, 'submission-start', 'Submission Starts', 'landing', 'inactive', '2014-03-23 06:06:03'),
(9, 'submission', 5, 'about', 'About', 'associate', 'inactive', '2014-03-22 18:22:14'),
(10, 'submission', 6, 'how-it-works', 'How It Works', 'associate', 'inactive', '2014-03-22 18:22:14'),
(11, 'submission', 7, 'rules', 'Rules', 'associate', 'inactive', '2014-03-22 18:22:14'),
(12, 'submission', 8, 'privacy-policy', 'Privacy Policy', 'associate', 'inactive', '2014-03-22 18:22:14'),
(13, 'submission', 9, 'terms-conditions', 'Terms & Conditions', 'associate', 'inactive', '2014-03-22 18:22:14'),
(14, 'submission', 10, 'user-agreement', 'User Agreement', 'associate', 'inactive', '2014-03-22 18:22:14'),
(15, 'submission', 12, 'participate', 'Participate landing page', 'associate', 'inactive', '2014-03-23 06:08:23'),
(16, 'submission', 13, 'registration', 'UGC Registration', 'associate', 'inactive', '2014-03-23 06:08:23'),
(17, 'submission', 14, 'thank-you', 'Registration Thank you Page', 'associate', 'inactive', '2014-03-23 06:08:23');

-- --------------------------------------------------------

--
-- Dumping data for table `social_auths`
--

INSERT INTO `social_auths` (`id`, `user_id`, `social`, `identifier`, `first_name`, `last_name`, `display_name`, `email`, `location`, `access_token`, `access_secret`, `token_expiry`, `date_added`, `profile_url`, `profile_photo`) VALUES
(1, NULL, 'twitter', '54500373', 'Zainul', 'abdeen', 'pixces', NULL, 'Bangalore', '54500373-zO7lhekUGXugfzgYuZcyuPylfR35YUqz6q7nr6mPD', 'V6ylBzbyUA9zXUMQcCkb8m6G4A28fA6fuFq1SJGOZGk', NULL, '0000-00-00 00:00:00', 'http://twitter.com/pixces', 'http://pbs.twimg.com/profile_images/301483745/Image0203_normal.jpg'),
(2, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(3, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(4, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(5, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(6, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(7, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(8, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(9, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(10, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(11, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(12, NULL, 'twitter', '23915432', 'Mohammed', 'Sadik', 'mohammed_sadik_', NULL, 'Bangalore', '23915432-6m1Y0KnVFA5HRL0ExEoZ8LuayZDELgRB6Ojmeo6Zl', 'WlU2FSiG4oIGwlYc1lYx08JpC6RZYK0nALBnDZzfm5hmp', NULL, '0000-00-00 00:00:00', 'http://twitter.com/mohammed_sadik_', 'http://pbs.twimg.com/profile_images/3595462458/d6375dcec1fdf9758f37a42d404017b0_normal.jpeg'),
(13, NULL, 'twitter', '54500373', 'Zainul', 'abdeen', 'pixces', NULL, 'Bangalore', '54500373-zO7lhekUGXugfzgYuZcyuPylfR35YUqz6q7nr6mPD', 'V6ylBzbyUA9zXUMQcCkb8m6G4A28fA6fuFq1SJGOZGk', NULL, '0000-00-00 00:00:00', 'http://twitter.com/pixces', 'http://pbs.twimg.com/profile_images/301483745/Image0203_normal.jpg'),
(14, NULL, 'twitter', '54500373', 'Zainul', 'abdeen', 'pixces', NULL, 'Bangalore', '54500373-zO7lhekUGXugfzgYuZcyuPylfR35YUqz6q7nr6mPD', 'V6ylBzbyUA9zXUMQcCkb8m6G4A28fA6fuFq1SJGOZGk', NULL, '2014-03-19 03:40:16', 'http://twitter.com/pixces', 'http://pbs.twimg.com/profile_images/301483745/Image0203_normal.jpg'),
(15, NULL, 'twitter', '54500373', 'Zainul', 'abdeen', 'pixces', NULL, 'Bangalore', '54500373-zO7lhekUGXugfzgYuZcyuPylfR35YUqz6q7nr6mPD', 'V6ylBzbyUA9zXUMQcCkb8m6G4A28fA6fuFq1SJGOZGk', NULL, '2014-03-19 03:41:43', 'http://twitter.com/pixces', 'http://pbs.twimg.com/profile_images/301483745/Image0203_normal.jpg'),
(16, NULL, 'twitter', '54500373', 'Zainul', 'abdeen', 'pixces', NULL, 'Bangalore', '54500373-zO7lhekUGXugfzgYuZcyuPylfR35YUqz6q7nr6mPD', 'V6ylBzbyUA9zXUMQcCkb8m6G4A28fA6fuFq1SJGOZGk', NULL, '2014-03-19 03:43:31', 'http://twitter.com/pixces', 'http://pbs.twimg.com/profile_images/301483745/Image0203_normal.jpg'),
(17, NULL, 'twitter', '54500373', 'Zainul', 'abdeen', 'pixces', NULL, 'Bangalore', '54500373-zO7lhekUGXugfzgYuZcyuPylfR35YUqz6q7nr6mPD', 'V6ylBzbyUA9zXUMQcCkb8m6G4A28fA6fuFq1SJGOZGk', NULL, '2014-03-19 03:50:13', 'http://twitter.com/pixces', 'http://pbs.twimg.com/profile_images/301483745/Image0203_normal.jpg');

-- --------------------------------------------------------

--
-- Dumping data for table `social_calls`
--

INSERT INTO `social_calls` (`id`, `stream_id`, `source`, `keyword_string`, `base_api_url`, `post_count`, `frequency`, `last_call_time`, `next_call_time`, `date_created`) VALUES
(17, 9, 'twitter', '%40CoxnKingsIndia', 'https://api.twitter.com/1.1/search/tweets.json', 25, 3600, '1393359174', '1393362774', '2014-02-25 11:55:35'),
(18, 10, 'twitter', '%22Cox+n+kings+india%22', 'https://api.twitter.com/1.1/search/tweets.json', 25, 3600, '1393359174', '1393362774', '2014-02-25 11:55:41'),
(19, 10, 'facebook', '%22Cox+n+kings+india%22', 'https://graph.facebook.com/search', 25, 3600, '1393359174', '1393362774', '2014-02-25 11:55:41'),
(20, 10, 'googleplus', '%22Cox+n+kings+india%22', 'https://plus.google.com/search', 25, 3600, '1393359174', '1393362774', '2014-02-25 11:55:41'),
(21, 11, 'twitter', 'CoxnKingsIndia', 'https://api.twitter.com/1.1/search/tweets.json', 25, 3600, '', '', '2014-02-25 11:55:47'),
(22, 11, 'facebook', 'CoxnKingsIndia', 'https://graph.facebook.com/search', 25, 3600, '', '', '2014-02-25 11:55:47'),
(23, 11, 'googleplus', 'CoxnKingsIndia', 'https://plus.google.com/search', 25, 3600, '', '', '2014-02-25 11:55:47'),
(24, 12, 'twitter', 'india', 'https://api.twitter.com/1.1/search/tweets.json', 25, 3600, '1393532672', '1393536272', '2014-02-26 02:41:34');

-- --------------------------------------------------------

--
-- Dumping data for table `social_posts`
--

INSERT INTO `social_posts` (`id`, `stream_id`, `source`, `post_id`, `post_hash`, `post_text`, `post_lang`, `post_source`, `post_url`, `post_type`, `post_story_text`, `post_picture`, `post_link`, `post_name`, `post_caption`, `post_description`, `user_category`, `user_profile_image`, `user_name`, `user_screen_name`, `user_id`, `user_lang`, `user_location`, `user_followers_count`, `user_friend_count`, `user_status_count`, `post_likes`, `post_comments`, `user_url`, `post_status`, `date_published`, `date_published_ts`, `date_created`, `date_modified`) VALUES
(1, 12, 'twitter', '439128719517843456', '48be17555fde42fc6292ec0fa0e7cb6d', '@blakehounshell My piece on rulers who use the social media they ban: http://t.co/u19P0GrKcA #netfreedom #Iran #Azerbaijan #India #Turkey', 'en', 'web', 'https://twitter.com/cyrusrassool/status/439128719517843456', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/436999665473445889/Hcz3zR8d_normal.jpeg', 'Cyrus Rassool', 'cyrusrassool', '258673342', 'en', 'Washington, DC', 118, 170, 775, 0, 0, NULL, 'new', 'Thu Feb 27 20:03:40 +0000 2014', '1393531420', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(2, 12, 'twitter', '439128719186075648', '99640562e28e6ee4aa8847470ad3d5dc', 'India: Parrot Helps Cops Solve Murder Mystery http://t.co/WGn4guMV5r via @IBTimesUK #parrotsolvesmurder', 'de', 'Tweet Button', 'https://twitter.com/Pascalstil/status/439128719186075648', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/1153854025/35fb4d7f-d3c9-4d38-903c-c3cdbc4c790d_normal.png', 'Pascal Stil', 'Pascalstil', '130095781', 'en', 'Belfast', 256, 923, 12151, 0, 0, 'http://t.co/X8yOOLjfUG', 'new', 'Thu Feb 27 20:03:39 +0000 2014', '1393531419', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(3, 12, 'twitter', '439128713415114753', '61e0058781e479678b66ebbac9d755f0', 'Good night India...', 'en', 'Twitter for Android', 'https://twitter.com/imbasab/status/439128713415114753', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/439127367538065408/NKCGfCS6_normal.jpeg', 'Basab Datta', 'imbasab', '2344832420', 'en', 'Burdwan', 1, 65, 11, 0, 0, NULL, 'new', 'Thu Feb 27 20:03:38 +0000 2014', '1393531418', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(4, 12, 'twitter', '439128712605630464', 'a84a421c687a8d73497f658a3d1b8a0c', '#MamaFradia break record of Gandhi of 84 yr mama ko chaye k MissingPerson ka b india se puchy http://t.co/7vOjb0c9LJ #MamaQadeer', 'en', 'Web Social', 'https://twitter.com/BiaAli234567/status/439128712605630464', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/422018059310608384/BRIY-Bir_normal.jpeg', 'BIA ALI ', 'BiaAli234567', '2172375482', 'en', 'Islamabad', 212, 154, 4891, 0, 0, NULL, 'new', 'Thu Feb 27 20:03:38 +0000 2014', '1393531418', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(5, 12, 'twitter', '439128706259632128', '66ef94c61c8c12da6175262ea5ba06e4', 'India needs hand incident: xTMTf', 'en', 'twitterfeed', 'https://twitter.com/OakmanRebecca/status/439128706259632128', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/3343784971/f38780b89d64ebc64fa5f1dff65d8619_normal.jpeg', 'OakmanRebecca', 'OakmanRebecca', '1220073337', 'en', '', 26, 0, 19163, 0, 0, NULL, 'new', 'Thu Feb 27 20:03:36 +0000 2014', '1393531416', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(6, 12, 'twitter', '439128703356764160', '901aff9d945f327aad0e50d440080087', 'I just closed my eyes, and All i saw was YOU! @Sagar0307 :* \n\n#ASOT652 @garethemery @arminvanbuuren @asot @ASOT700_INDIA', 'en', 'web', 'https://twitter.com/CoffeeMonsterr_/status/439128703356764160', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/434217209880010752/8RM_AUCn_normal.jpeg', 'Charvi Bastikar ', 'CoffeeMonsterr_', '312561029', 'en', 'Mumbai, India. ', 428, 792, 5080, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:36 +0000 2014', '1393531416', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(7, 12, 'twitter', '439128690598100992', 'da7dea96f597d4eb51988438ecd79fcf', 'RT @DrRaoSGU: His Excellency G.S. Gupta #HighCommissioner of #India to #TnT visits my office and highly impressed with @StGeorgesU http://t…', 'en', 'web', 'https://twitter.com/dr4world/status/439128690598100992', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/898729865/bs-Ind_normal.jpg', 'kmandalaneni', 'dr4world', '136822738', 'en', '', 5, 60, 3, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:33 +0000 2014', '1393531413', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(8, 12, 'twitter', '439128687347134464', 'dfb4e9c020e67d5adeb1c93c217635e7', 'RT @A_PrettyQueen: IF I could be Someone els I''d be India Haynes @TheyLoveIndy', 'en', 'Twitter for Android', 'https://twitter.com/ItsAquaaFuu/status/439128687347134464', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/436745497533890560/BX9MAIk1_normal.jpeg', 'Mm''k ✌', 'ItsAquaaFuu', '621815256', 'en', 'At The Crib ', 1734, 1674, 12410, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:32 +0000 2014', '1393531412', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(9, 12, 'twitter', '439128685644632064', 'a209d50ac23a2bcc32574b0048d0f73d', '#3: Wake Up: Revoke the ''Chi'' Energy Wake Up: Revoke the ''Chi'' EnergySensei Sandeep Desa... http://t.co/K1UbCayp6M http://t.co/esJF0yDAY9', 'en', 'IFTTT', 'https://twitter.com/India_IN/status/439128685644632064', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/417944556420595712/qbYrRV2I_normal.png', 'India Indian', 'India_IN', '112685695', 'en', 'India', 2802, 100, 268568, 0, 0, 'http://t.co/LPf5GAHJ', 'approved', 'Thu Feb 27 20:03:31 +0000 2014', '1393531411', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(10, 12, 'twitter', '439128685049024512', '8557952e9d8e13dccef9d4004034e5fd', 'RT @mediacrooks: The only way India''s defence and military power can be restored is if Modi becomes PM.. Under anyone else.. expect more "s…', 'en', 'Twitter for iPhone', 'https://twitter.com/MadAtma/status/439128685049024512', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/378800000613236756/65c64b7a7412cc715d45ff4bd81536f6_normal.jpeg', 'Mad', 'MadAtma', '1968685862', 'en', '', 21, 315, 1924, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:31 +0000 2014', '1393531411', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(11, 12, 'twitter', '439128682859597824', '2625dd38221d60d36842cc688cefb2de', 'Paid Media is helping #MamaFradia on behalf of agencies of #India #MamaFradia. #FakelongMarch https://t.co/t8rtgivw7j #Terrorism', 'en', 'Android Social Media', 'https://twitter.com/MohsinNaqvi0/status/439128682859597824', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/378800000538171126/679cf7fa85e7dbd958236b128455b3e4_normal.jpeg', 'Mohsin Naqvi', 'MohsinNaqvi0', '1926987302', 'en', 'Islamabad ', 29, 21, 17964, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:31 +0000 2014', '1393531411', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(12, 12, 'twitter', '439128677578981376', '002247804dac586c493d1f8c8f0ad95c', '#4: The Very Best of Western Classical The Very Best of Western ClassicalBach (Artist), ... http://t.co/kzYYo2EUPs http://t.co/lpcVPBkQTC', 'en', 'IFTTT', 'https://twitter.com/India_IN/status/439128677578981376', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/417944556420595712/qbYrRV2I_normal.png', 'India Indian', 'India_IN', '112685695', 'en', 'India', 2802, 100, 268568, 0, 0, 'http://t.co/LPf5GAHJ', 'approved', 'Thu Feb 27 20:03:30 +0000 2014', '1393531410', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(13, 12, 'twitter', '439128674110291968', 'ee2648dd6f0d7545a1084bf97e438a96', 'Coming back from India is always the hardest. Just wanna go back! ', 'en', 'Twitter for iPhone', 'https://twitter.com/Roopster27/status/439128674110291968', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/413491233734938624/3rnVa9LB_normal.jpeg', 'Roopi Sidhu', 'Roopster27', '776649632', 'en', '', 94, 186, 601, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:29 +0000 2014', '1393531409', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(14, 12, 'twitter', '439128671559770112', '0a762a28b98e90184e88dd4c064dc622', 'RT @Farid_Senzai: Most foreign students in US from:\n1 China \n2 India\n3 S Korea\n4 S Arabia\n5 Canada\n6 Japan\n7 Taiwan http://t.co/lt5m3WdFyD …', 'en', 'Twitter for Android', 'https://twitter.com/AsiaPacificCC/status/439128671559770112', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/437709684569432064/b3U6Ws1__normal.jpeg', 'AsiaPacificCultrlCtr', 'AsiaPacificCC', '2345797494', 'en', 'Tacoma, Washington, US ', 81, 896, 14, 0, 0, 'http://t.co/ge5BipHr5N', 'approved', 'Thu Feb 27 20:03:28 +0000 2014', '1393531408', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(15, 12, 'twitter', '439128669668532225', '84f66a4b9194e0b2bae1444ec6646f57', '@pacosevillista @FormulaUno_ESP Si no tiene presiones como con el A1Ring de RedBull apuesta por Asia.Suele salir mal (India, China, Turquia)', 'es', 'Twitter for Android', 'https://twitter.com/YoSeDeFormula1/status/439128669668532225', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/378800000505968741/bbfe344f215e5de9b88c945bb947353f_normal.png', 'Yo Sé De Formula1', 'YoSeDeFormula1', '1635822518', 'es', 'España', 425, 233, 2459, 0, 0, 'http://t.co/akjUwwJanj', 'approved', 'Thu Feb 27 20:03:28 +0000 2014', '1393531408', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(16, 12, 'twitter', '439128659358908416', 'a4e144e0331f0d920dc03b050e17049c', 'Mama Qadir is caught up with #BLA #RAW #INDIA http://t.co/fpvlCZMvU4 #MamaFradia  https://t.co/Sc5VKQ5cDn #BLAGeoBhaiBhai', 'en', 'Web Social', 'https://twitter.com/QaziHussain4/status/439128659358908416', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/424641723164147713/-FiRV3hI_normal.jpeg', 'Qazi Hussain', 'QaziHussain4', '2298482330', 'en', 'Karachi Pakistan', 73, 115, 4459, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:25 +0000 2014', '1393531405', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(17, 12, 'twitter', '439128659031773185', '6dc95f92469c00b1657c1fbc080b091f', 'RT @AJEnglish: Feature: Gulabi Gang: #India''s women warrriors http://t.co/yADj0o1G5D #AJIndia', 'en', 'Twitter for iPhone', 'https://twitter.com/MrA88AS/status/439128659031773185', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/437987568823447553/8DlLy1k5_normal.jpeg', 'ツAbbas Sahab™✌', 'MrA88AS', '531634473', 'en', 'Hyderabad', 227, 182, 9669, 0, 0, 'https://t.co/1c85mPelZs', 'rejected', 'Thu Feb 27 20:03:25 +0000 2014', '1393531405', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(18, 12, 'twitter', '439128658419384320', '8bf995e7e62e1923f9491b148ad2ab67', 'RT @saikatd: After the INS Sindhurakshak accident, when Adm Joshi was asked by reporters where the seamen were from, he had a succinct repl…', 'en', 'Twitter for Android', 'https://twitter.com/kalkalpawan/status/439128658419384320', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/426375123667402752/kgKb66Fj_normal.jpeg', 'Kaptaan', 'kalkalpawan', '75981727', 'en', 'Gurgaon', 77, 220, 602, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:25 +0000 2014', '1393531405', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(19, 12, 'twitter', '439128658331312129', '21031a059a0a678254684b88caeb6472', 'RT @WithCongress: Modi wants to transform something in India! And there are 12 Lakh youth in Guj who applied for 1500 jobs #Fekunomics http…', 'en', 'Mobile Web (M2)', 'https://twitter.com/sjpandya/status/439128658331312129', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/378800000770447831/f5197a8c7420d62d92c09b119e26d75e_normal.jpeg', 'Sandip Pandya', 'sjpandya', '629667549', 'en', '', 11, 23, 725, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:25 +0000 2014', '1393531405', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(20, 12, 'twitter', '439128656770658305', '4bf56fded18468d8c37bfd73db55d6da', 'Mai Chae Bechta tha, Mai Pakode Bechta tha, Abhi Maine Taraqqi Kar li hai, Ab mai InsaanoN k khoon ka sauda karta hoon,\n\n#India is Shining#', 'et', 'web', 'https://twitter.com/tzaidijm/status/439128656770658305', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/434362091999219713/MNTGSjw2_normal.jpeg', 'Tahir Zaidi', 'tzaidijm', '288085574', 'en', 'India', 86, 297, 2512, 0, 0, NULL, 'approved', 'Thu Feb 27 20:03:25 +0000 2014', '1393531405', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(21, 12, 'twitter', '439128653394620416', 'ff7d634daa315f963b56b059869f3361', 'RT @aulia_te: Film india, teks nya bahasa inggris -_-', 'in', 'Twitter for Android', 'https://twitter.com/Wahyu_94x/status/439128653394620416', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/421882066339233793/JZVUiBTV_normal.jpeg', 'JELANGKUNGESOT', 'Wahyu_94x', '749191272', 'id', 'Atjeh Kingdom', 148, 134, 3206, 0, 0, 'http://t.co/wXbt5nnJ2P', 'rejected', 'Thu Feb 27 20:03:24 +0000 2014', '1393531404', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(22, 12, 'twitter', '439128650772779008', 'daecbde733f0fb67e690e6052fa139d0', 'RT @AJEnglish: Feature: Gulabi Gang: #India''s women warrriors http://t.co/lQdHrAp2bK #AJIndia', 'en', 'Twitter for iPhone', 'https://twitter.com/MrA88AS/status/439128650772779008', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/437987568823447553/8DlLy1k5_normal.jpeg', 'ツAbbas Sahab™✌', 'MrA88AS', '531634473', 'en', 'Hyderabad', 227, 182, 9669, 0, 0, 'https://t.co/1c85mPelZs', 'rejected', 'Thu Feb 27 20:03:23 +0000 2014', '1393531403', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(23, 12, 'twitter', '439128646213992448', 'f5d18a89aa96e2400315bb7abb018c0b', '#smithsonian #india #islam #protest #pretty #art #artistic #bollywood #mural #muslim #washingtondc http://t.co/I0mPHqdjqb', 'en', 'Instagram', 'https://twitter.com/ShakirGhazi/status/439128646213992448', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/378800000115273166/ffb41f510522c44e4b66907f512d5248_normal.jpeg', 'Shakir Ghazi', 'ShakirGhazi', '1055631390', 'en', 'Washington, DC', 16, 22, 194, 0, 0, 'http://t.co/G9aqBt1O', 'approved', 'Thu Feb 27 20:03:22 +0000 2014', '1393531402', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(24, 12, 'twitter', '439128641272700928', 'c9382168bcc51fccd0273a6c694f204e', '@INCIndia A radical view to a zero tax Indian economy.. Please give your critique.. http://t.co/0o8rOTuTvG', 'en', 'Twitter for iPhone', 'https://twitter.com/Vikram_Monika/status/439128641272700928', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/701824739/Picture-001_normal.jpg', 'Vikram Kumar', 'Vikram_Monika', '83453263', 'en', 'नयी दिल्ली, Delhi, India', 154, 176, 3007, 0, 0, 'http://t.co/gYk51My69z', 'approved', 'Thu Feb 27 20:03:21 +0000 2014', '1393531401', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(25, 12, 'twitter', '439128640182558721', '5c00b1afd761ca90608c75c068e60c17', 'RT @AHSANHANIF11: #JabTakSoorajChandRahyGa Pak india dosti ka drama chalta rahy ga', 'in', 'web', 'https://twitter.com/Aabia_/status/439128640182558721', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/439089988404117504/Kv8rCgUx_normal.jpeg', 'Aabia', 'Aabia_', '454996089', 'en', 'City of Lights  ', 1868, 376, 27915, 0, 0, 'http://t.co/9ptP6dSbvj', 'approved', 'Thu Feb 27 20:03:21 +0000 2014', '1393531401', '2014-02-28 01:34:00', '2014-03-12 18:18:09'),
(27, 12, 'twitter', '439133925433413632', '54d3a5c899b03994b4c5a09c94704108', 'Ping @DALupton @ RT @LancetGH Campaign based on emotional drivers  increases handwashing with soap in India:  http://t.co/3Vrq47W2q6', 'en', 'Plume for Android', 'https://twitter.com/trentyarwood/status/439133925433413632', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/433530048105021440/iMBgS-ov_normal.jpeg', 'Trent', 'trentyarwood', '11897552', 'en', 'Cairns', 440, 409, 19251, 0, 0, 'http://t.co/2cdYVbXrAL', 'approved', 'Thu Feb 27 20:24:21 +0000 2014', '1393532661', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(28, 12, 'twitter', '439133920605777920', 'b07682807ee944fcaa0b856295c288e7', 'CM dashes to rain-hit areas in Sehore, offers slew of reliefs - Times of India: CM dashes to rain-hit areas in... http://t.co/GGDDKNdgiv', 'en', 'twitterfeed', 'https://twitter.com/_MPnews_/status/439133920605777920', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://abs.twimg.com/sticky/default_profile_images/default_profile_0_normal.png', 'Madhya Pradesh News', '_MPnews_', '282103437', 'en', '', 191, 0, 6505, 0, 0, NULL, 'approved', 'Thu Feb 27 20:24:20 +0000 2014', '1393532660', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(29, 12, 'twitter', '439133917191618560', '80fc23cd35bb8c502b1a27198d44c5f9', 'Mama Qadir is caught up with #BLA #RAW #INDIA http://t.co/rD14FEHxfB #MamaFradia https://t.co/kwtIA3PBFM #MamaQadeer', 'en', 'Android Social Media', 'https://twitter.com/Ibrahim_4Ali/status/439133917191618560', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/429150331025383424/Q1JEjhnG_normal.jpeg', 'Ibrahim Ali', 'Ibrahim_4Ali', '1907012588', 'en', 'Islamabad, Pakistan', 38, 129, 19241, 0, 0, NULL, 'approved', 'Thu Feb 27 20:24:19 +0000 2014', '1393532659', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(30, 12, 'twitter', '439133912166834176', '56e26ead43f47d9b46c15c30ba15ef63', '@Youzeekay sunday ko India sy Pakistan jeet saky ga? Wht u say', 'tl', 'Twitter for iPhone', 'https://twitter.com/usmanjadon/status/439133912166834176', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/435105334798344192/4NP7UlFs_normal.jpeg', 'usman khan jadoon', 'usmanjadon', '573903537', 'en', '', 104, 769, 2790, 0, 0, NULL, 'approved', 'Thu Feb 27 20:24:18 +0000 2014', '1393532658', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(31, 12, 'twitter', '439133910195523584', 'af7a887f640c697d4746d29edf0d9a25', 'RT @ratanmaitra: #YoGujSoDeveloped Govt hid corruption by delaying Lokayukta for 10 years till SC forced it http://t.co/P9atPglIln …\n&gt; http…', 'en', 'Twitter for iPhone', 'https://twitter.com/JavedKarbari/status/439133910195523584', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/432044745708158976/y3LLPaLU_normal.jpeg', '#JoinAAP', 'JavedKarbari', '1085391758', 'en', 'Dubai', 290, 350, 11444, 0, 0, 'http://t.co/1q3oPLtDYv', 'approved', 'Thu Feb 27 20:24:17 +0000 2014', '1393532657', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(33, 12, 'twitter', '439133902813560832', '8747656e96f9a868243dcb0e7fcfa5d1', 'Striking Photographs Explore The Lives Of India’s Holy Men http://t.co/zaYNbnD1cs', 'en', 'iOS', 'https://twitter.com/DaryaImas/status/439133902813560832', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/378800000821600745/34ee14a1fa23bc67b0c54fbcf36cd663_normal.jpeg', 'Darya Imas', 'DaryaImas', '63272106', 'en', 'NYC', 91, 363, 1602, 0, 0, NULL, 'approved', 'Thu Feb 27 20:24:15 +0000 2014', '1393532655', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(39, 12, 'twitter', '439133887869243392', 'd5fa1866ef73ad4b1371beb94490bae9', '#MamaFradia is bank rolled by India, watch his reality how MamaBanaGyaMamoo https://t.co/dTcQCt4DZN #SeeTheTraitor', 'en', 'Web Social', 'https://twitter.com/UmerZaman20/status/439133887869243392', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/430714215116992512/1AD5ftxq_normal.jpeg', 'Umer Zaman', 'UmerZaman20', '2327229852', 'en', 'Karachi', 50, 104, 2467, 0, 0, NULL, 'approved', 'Thu Feb 27 20:24:12 +0000 2014', '1393532652', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(40, 12, 'twitter', '439133875663822848', '49f24f434616a76734a7ed33c799b12e', 'RT @India_Business: #india #business : Barack Obama''s image tarnished in new poll: The survey, by CBS News and the NYT, also found... http:…', 'en', 'Twitter for iPad', 'https://twitter.com/nan_rag/status/439133875663822848', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/439133260351025152/lEy9IEcm_normal.jpeg', 'Nancy García ', 'nan_rag', '2369698630', 'es', '', 0, 7, 82, 0, 0, NULL, 'approved', 'Thu Feb 27 20:24:09 +0000 2014', '1393532649', '2014-02-28 01:54:44', '2014-02-27 20:24:44'),
(41, 12, 'twitter', '439133862925713408', '4851e5fcdf1e13136cf0cda393b1e0c7', '@amaya_arbo mi madre no viene...voy de india?', 'es', 'Twitter for Android', 'https://twitter.com/paulamarcos12/status/439133862925713408', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/378800000214181573/43b2297ec6adb7668b3bb34cbff528dd_normal.png', 'PAULA', 'paulamarcos12', '789329376', 'es', '', 508, 443, 3998, 0, 0, NULL, 'approved', 'Thu Feb 27 20:24:06 +0000 2014', '1393532646', '2014-02-28 01:54:44', '2014-02-27 20:24:44'),
(42, 12, 'twitter', '439133862648504321', 'ce21c24dd7dd2393970f79532524b26f', 'RT @sardesairajdeep: August 2013: Paswan says BJP was Bharat Jalao Party! Now says its the party which will rule India! All fair at electio…', 'en', 'Twitter for Android', 'https://twitter.com/EqbalEram/status/439133862648504321', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/430737146454884352/X4BSE3gj_normal.jpeg', 'eram eru', 'EqbalEram', '2309635116', 'en', 'jia sarai, new delhi', 5, 32, 125, 0, 0, 'http://t.co/YdnXqqBaBP', 'approved', 'Thu Feb 27 20:24:06 +0000 2014', '1393532646', '2014-02-28 01:54:44', '2014-02-27 20:24:44'),
(43, 12, 'twitter', '439133861482864641', '65957a8e6b07ed1fea9ce2b5df88661d', 'تم تحديد الوجه شهر ٧ : USA  ', 'ar', 'Twitter for iPhone', 'https://twitter.com/Al_Der3a/status/439133861482864641', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/438817152607731713/a6EGV8rn_normal.jpeg', 'بقلم/ بدر الدرعــــه', 'Al_Der3a', '744642530', 'en', 'Kuwait-Dubai', 540, 61, 4335, 0, 0, NULL, 'new', 'Thu Feb 27 20:24:05 +0000 2014', '1393532645', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(44, 12, 'twitter', '439133860476239872', '0b518da2924e4c4adb535540286971df', 'RT @timesofindia: Subrata Roy apologizes to SC, wants NBW recalled http://t.co/v7LQRFbY2n', 'en', 'web', 'https://twitter.com/atul3004/status/439133860476239872', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/439133397646970880/2c59aRq5_normal.jpeg', 'Atul Sinha', 'atul3004', '2337647364', 'en', 'New Delhi', 15, 78, 90, 0, 0, 'http://t.co/Ufe473UMxE', 'new', 'Thu Feb 27 20:24:05 +0000 2014', '1393532645', '2014-02-28 01:54:44', '2014-02-27 20:24:44'),
(45, 12, 'twitter', '439133856885923840', '9216a002a54659b442f1f09f1265595e', '2nd March Pakistan vs India ', 'en', 'Twitter for iPhone', 'https://twitter.com/hassanfarooq97/status/439133856885923840', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/437425677911203840/ez_S6MUv_normal.jpeg', '.', 'hassanfarooq97', '193392453', 'en', '', 120, 80, 1362, 0, 0, NULL, 'approved', 'Thu Feb 27 20:24:04 +0000 2014', '1393532644', '2014-02-28 01:54:44', '2014-02-27 20:24:44'),
(46, 12, 'twitter', '439133856206438401', '199ba7211646363fd6e023cd669fd5aa', 'Leavin'' on a jet plane... - Drinking a Ranger India Pale Ale (IPA) by @newbelgium at @denairport  — http://t.co/Jptn0Z3F8C', 'en', 'Untappd', 'https://twitter.com/rachel_jo/status/439133856206438401', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/2621915018/image_normal.jpg', 'Rachel Jo', 'rachel_jo', '16499213', 'en', 'Boulder', 79, 531, 1587, 0, 0, NULL, 'approved', 'Thu Feb 27 20:24:04 +0000 2014', '1393532644', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(47, 12, 'twitter', '439133856096993280', 'bfad3a6cb1a57cf9be067a5c0b1fa32c', 'Using cloud computing to solve Bangalore’s garbage problem - http://t.co/og6cXM4tg7', 'en', 'Post with Klout', 'https://twitter.com/tenhagen/status/439133856096993280', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/2698517082/41ee0ec43ad4a83616467720797ad672_normal.png', 'Laurens ten Hagen', 'tenhagen', '14710655', 'nl', 'Ochten, Netherlands', 8149, 8591, 11342, 0, 0, 'http://t.co/VehgkTx5S1', 'approved', 'Thu Feb 27 20:24:04 +0000 2014', '1393532644', '2014-02-28 01:54:44', '2014-02-27 20:24:44'),
(48, 12, 'twitter', '439133852393820160', 'cd43969c8bfafafdb08437b9df0be2d1', 'RT @GirlsNotBrides: Meet the "Wedding crashers", girls who avoided #childmarriage &amp; now stop #childmarriages in India http://t.co/gw3pJpdwD…', 'en', 'web', 'https://twitter.com/OperaPoet/status/439133852393820160', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/3551426556/db5dedbb8a456628660af92a319fe25e_normal.jpeg', 'Diana North', 'OperaPoet', '383010278', 'en', '', 20, 50, 379, 0, 0, 'http://t.co/uCTd8eNejv', 'approved', 'Thu Feb 27 20:24:03 +0000 2014', '1393532643', '2014-02-28 01:54:44', '2014-02-27 20:24:44'),
(49, 12, 'twitter', '439133850963152896', 'e22ba01fe2598e1c28ddde347aa8a835', 'RT @rahulkanwal: Lots of ex-IAS, IPS officers, professionals on BJP''s 1st list. More parties realise importance of credentials of candidate…', 'en', 'Twitter for iPad', 'https://twitter.com/shyamalmitra23/status/439133850963152896', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/432836674515509248/d5FGi8Rm_normal.jpeg', 'AAP ka Shyamal', 'shyamalmitra23', '314752496', 'en', 'New Delhi', 176, 300, 12684, 0, 0, NULL, 'new', 'Thu Feb 27 20:24:03 +0000 2014', '1393532643', '2014-02-28 01:54:44', '2014-02-27 20:24:44'),
(50, 12, 'twitter', '439133849764003841', 'a1a6f06d0302c954f90472841081b32e', 'RT @sujojohn: We are excited to announce the launch of our new @youcanfreeus safehouse in Mumbai,India. 100k girls in one red light area . …', 'en', 'Twitter for iPhone', 'https://twitter.com/JoshuaAHouston/status/439133849764003841', 'tweet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://pbs.twimg.com/profile_images/2264152012/39udjk9vkr79s83rfkru_normal.jpeg', 'Joshua Houston', 'JoshuaAHouston', '399868917', 'en', 'Dallas, Tx', 181, 149, 1277, 0, 0, NULL, 'new', 'Thu Feb 27 20:24:03 +0000 2014', '1393532643', '2014-02-28 01:54:44', '2014-03-12 18:18:09'),
(52, -1, 'facebook', '-1', '912a6d5a20fd54d656caa12541372c42', 'This is a new conversation', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture?width=150&height=150', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', 'Lucknow, India', 0, 0, 0, 0, 0, 'https://www.facebook.com/zainul.abdeen.127', 'new', '2014-03-19T00:16:07+05:30', '1395168367', '2014-03-19 12:16:07', '0000-00-00 00:00:00'),
(53, -1, 'facebook', '-1', 'ebe930e7c3c4bd8eecc67c1e4c00666e', 'This is a new conversation', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture?width=150&height=150', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', 'Lucknow, India', 0, 0, 0, 0, 0, 'https://www.facebook.com/zainul.abdeen.127', 'new', '2014-03-19T00:18:57+05:30', '1395168537', '2014-03-19 12:18:57', '2014-03-19 06:48:57'),
(54, -1, 'facebook', '-1', '557a2a2e5411709a59cf7a9acabb4f41', 'This is a new conversation  testimng', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture?width=150&height=150', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', 'Lucknow, India', 0, 0, 0, 0, 0, 'https://www.facebook.com/zainul.abdeen.127', 'new', '2014-03-19T00:21:43+05:30', '1395168703', '2014-03-19 12:21:43', '2014-03-19 06:51:43'),
(55, -1, 'facebook', '-1', 'aa79144f5e80e20e75366d5fea3cd137', 'This is a new conversation  testimng', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture?width=150&height=150', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', 'Lucknow, India', 0, 0, 0, 0, 0, 'https://www.facebook.com/zainul.abdeen.127', 'new', '2014-03-19T00:22:20+05:30', '1395168740', '2014-03-19 12:22:20', '2014-03-19 06:52:20'),
(56, -1, 'facebook', '-1', '2edb02fb78ee9644566a97cd4ec0a855', 'HELLO WORLD', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture?width=150&height=150', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', 'Lucknow, India', 0, 0, 0, 0, 0, 'https://www.facebook.com/zainul.abdeen.127', 'approved', '2014-03-19T00:27:40+05:30', '1395169060', '2014-03-19 12:27:40', '2014-03-19 06:57:40'),
(57, -1, 'facebook', '-1', '49d79e46f9ace948f79ab96d8587dc31', 'test it', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture?width=150&height=150', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', 'Lucknow, India', 0, 0, 0, 0, 0, 'https://www.facebook.com/zainul.abdeen.127', 'new', '2014-03-19T03:09:51+05:30', '1395178791', '2014-03-19 03:09:51', '2014-03-18 21:39:51'),
(58, -1, 'facebook', '-1', '49a6c0f787d2efcb13731ec4079f054c', 'testsss', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture?width=150&height=150', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', 'Lucknow, India', 0, 0, 0, 0, 0, 'https://www.facebook.com/zainul.abdeen.127', 'new', '2014-03-19T03:14:54+05:30', '1395179094', '2014-03-19 03:14:54', '2014-03-18 21:44:54'),
(59, -1, 'facebook', '-1', '6a2492e1c246f7aa966c2ea8f4faa042', 'My new post is about muself. Lets learn ourselves', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'approved', '2014-03-19T04:04:43+05:30', '1395182083', '2014-03-19 04:04:43', '2014-03-18 22:34:43'),
(60, -1, 'facebook', '-1', '57807461b374106ab99fc518e6db8b0d', 'my new page', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'new', '2014-03-19T14:31:29+05:30', '1395219689', '2014-03-19 02:31:29', '2014-03-18 21:01:29'),
(61, -1, 'facebook', '-1', '097e06fa79dea56017c96c48f57c4807', 'My mew development on the page', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'new', '2014-03-19T14:46:50+05:30', '1395220610', '2014-03-19 02:46:50', '2014-03-18 21:16:50'),
(62, -1, 'facebook', '-1', 'e98059fc39b9387cf085fe2b6f8a9f60', 'Posting now', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', 'Lucknow, India', 0, 0, 0, 0, 0, NULL, 'new', '2014-03-19T15:02:55+05:30', '1395221575', '2014-03-19 03:02:55', '2014-03-18 21:32:55'),
(63, -1, 'facebook', '-1', 'eaee27816e0ef3c253998c0d4c7b09a5', 'new posting', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'new', '2014-03-19T15:23:08+05:30', '1395222788', '2014-03-19 03:23:08', '2014-03-18 21:53:08'),
(64, -1, 'facebook', '-1', 'dd39c5efbae44d63ad7079c14439839a', 'Posting now', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'new', '2014-03-19T15:40:29+05:30', '1395223829', '2014-03-19 03:40:29', '2014-03-18 22:10:29'),
(65, -1, 'facebook', '-1', 'bd96d33359c6c4e10fa936cbbf8da81c', 'I am posting from facebook now!!!!!', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'new', '2014-03-19T15:51:44+05:30', '1395224504', '2014-03-19 03:51:44', '2014-03-18 22:21:44'),
(66, -1, 'facebook', '-1', '0c1a2be11eb0560d3c10a38c3b037717', 'test', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://pbs.twimg.com/profile_images/301483745/Image0203_normal.jpg', 'Zainul abdeen', 'Zainul abdeen', '54500373', 'en', 'Bangalore', 0, 0, 0, 0, 0, 'http://twitter.com/pixces', 'new', '2014-03-19T20:31:54+05:30', '1395241314', '2014-03-19 08:31:54', '2014-03-19 03:01:54'),
(67, -1, 'facebook', '-1', '7d8e203018bced76d35654d5062a3596', 'Test post for Facebook. Auto appear', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'approved', '2014-03-19T21:00:25+05:30', '1395243025', '2014-03-19 09:00:25', '2014-03-19 03:30:25'),
(68, -1, 'facebook', '-1', 'c7c6dc4c819b86b92693ad10fbd8737a', 'Second test post | hopefully it appears too', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'approved', '2014-03-19T21:01:24+05:30', '1395243084', '2014-03-19 09:01:24', '2014-03-19 03:31:24'),
(69, -1, 'twitter', '-1', 'a7c59dd363f69ee61924dcfa5db3a101', 'hurray!', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://pbs.twimg.com/profile_images/301483745/Image0203_normal.jpg', 'Zainul abdeen', 'Zainul abdeen', '54500373', 'en', 'Bangalore', 0, 0, 0, 0, 0, 'http://twitter.com/pixces', 'approved', '2014-03-19T21:13:41+05:30', '1395243821', '2014-03-19 09:13:41', '2014-03-19 03:43:41'),
(70, -1, 'twitter', '-1', '020e0d52b09e18c9069063ad78ed7ca4', 'Do what every you want. It is all approved', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://pbs.twimg.com/profile_images/301483745/Image0203_normal.jpg', 'Zainul abdeen', 'Zainul abdeen', '54500373', 'en', 'Bangalore', 0, 0, 0, 0, 0, 'http://twitter.com/pixces', 'approved', '2014-03-19T21:20:26+05:30', '1395244226', '2014-03-19 09:20:26', '2014-03-19 03:50:26'),
(71, -1, '', '-1', '9d30b9cfdd548d51e162e2ab04493999', 'hola', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://lh5.googleusercontent.com/-3kkDGt-wvvo/AAAAAAAAAAI/AAAAAAAAAAA/u57CcVKlfpE/photo.jpg?sz=50', 'Zainul Aabdeen', 'Zainul Aabdeen', '108574297546537713609', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'approved', '2014-03-20T01:30:17+05:30', '1395259217', '2014-03-20 01:30:17', '2014-03-19 20:00:17'),
(72, -1, 'facebook', '-1', '04cf8e48c6e8607f13a0885df7d76ee2', 'Posting from the post box', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'approved', '2014-03-21T00:31:18+05:30', '1395342078', '2014-03-21 12:31:18', '2014-03-21 07:01:18'),
(73, -1, 'facebook', '-1', '858693f693688224efb7d30fd3c6e26b', 'Posting from the post box', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'approved', '2014-03-21T00:34:51+05:30', '1395342291', '2014-03-21 12:34:51', '2014-03-21 07:04:51'),
(74, -1, 'facebook', '-1', '77bf4d1f6a9fde7d3a7b34bda3e021eb', 'Posting from the post box', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'approved', '2014-03-21T00:35:36+05:30', '1395342336', '2014-03-21 12:35:36', '2014-03-21 07:05:36'),
(75, -1, 'facebook', '-1', '2220ffb9a43513fdec8f2436e8d133c1', 'Posting from the post box5', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'approved', '2014-03-21T00:36:35+05:30', '1395342395', '2014-03-21 12:36:35', '2014-03-21 07:06:35'),
(76, -1, 'facebook', '-1', '06f6018eafd9b85b16bdcc978ca802bf', 'Posting from the post box', 'en', NULL, NULL, 'post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://graph.facebook.com/100000746135429/picture', 'Zainul Abdeen', 'Zainul Abdeen', '100000746135429', 'en', NULL, 0, 0, 0, 0, 0, NULL, 'approved', '2014-03-21T00:37:14+05:30', '1395342434', '2014-03-21 12:37:14', '2014-03-21 07:07:14');

-- --------------------------------------------------------

--
-- Dumping data for table `social_streams`
--

INSERT INTO `social_streams` (`id`, `title`, `keyword`, `is_phrase`, `is_profile`, `is_twitter`, `is_facebook`, `is_gplus`, `status`, `date_created`, `date_modified`) VALUES
(9, '', '@CoxnKingsIndia', 0, 1, 1, 0, 0, 'deleted', '2014-02-25 11:55:35', '2014-02-25 18:25:35'),
(10, '', 'Cox n kings india', 1, 0, 1, 1, 1, 'deleted', '2014-02-25 11:55:41', '2014-02-25 18:25:41'),
(11, '', 'CoxnKingsIndia', 0, 0, 1, 1, 1, 'deleted', '2014-02-25 11:55:47', '2014-02-25 18:25:47'),
(12, '', 'india', 0, 0, 1, 0, 0, 'deleted', '2014-02-26 02:41:34', '2014-02-25 21:11:34');

-- --------------------------------------------------------

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `name`, `email`, `page_title`, `user_ip`, `date_created`) VALUES
(1, 'Zainul', 'pixces@yahoo.com', 'curtain raiser', '127.0.0.1', '2014-02-27 21:04:13'),
(2, 'Zainul Abdeen', 'pixces@gmail.com', 'about us', '127.0.0.1', '2014-02-27 21:04:43'),
(3, 'Zainul Abdeen', '123@gmail.com', '', '', '2014-03-13 17:40:02'),
(4, 'Zainul Abdeen', 'pixces@yahoo.com', 'curtain-raiser', '::1', '2014-03-13 18:46:36'),
(5, 'Zainul Abdeen', 'pixces@gmail.com', 'curtain-raiser', '::1', '2014-03-13 18:47:17'),
(6, 'Anju Abdeen', 'anju@position2.com', 'curtain-raiser', '::1', '2014-03-13 19:14:42'),
(7, 'zoya', 'zoya@yahoo.com', 'curtain-raiser', '::1', '2014-03-13 19:17:09'),
(8, 'Zainul', 'pixces@yahoo.com', 'about', '::1', '2014-03-13 19:18:30'),
(9, 'pixces', 'zoya@12356.com', 'curtain-raiser', '::1', '2014-03-20 18:12:49'),
(10, 'pixces', 'rohit@shetty.com', 'curtain-raiser', '::1', '2014-03-20 18:35:40');

-- --------------------------------------------------------

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `verification_code`, `is_verified`, `role`, `last_login_time`, `date_created`, `date_modified`) VALUES
(1, 'Uttam', 'Mohanty', 'uttam@emporia.com', 'b1cc8b464f6298bd94bbb69b0e15cc9a', 'active', NULL, 1, 'admin', NULL, '2014-02-28 11:38:45', '2014-03-23 09:36:56'),
(2, 'Zainul', 'Abdeen', 'zainul@emporia.com', '6d808ecfd24037ca31db96e3cb1d1e1e', 'active', NULL, 1, 'superadmin', '2014-03-23 11:30:16', '2014-02-27 00:00:00', '2014-03-23 09:36:56'),
(3, 'Sherin', 'Jacob', 'sherin@emporia.com', '937f2fb111d320e228d45e05cc560ac4', 'active', NULL, 1, 'superadmin', NULL, '2014-02-28 00:00:00', '2014-03-23 09:36:56'),
(4, 'Sadik', NULL, 'sadik@emporia.com', 'b0ae3e73eca81a45081fab4f3682a9a7', 'active', NULL, 1, 'admin', '2014-03-18 22:36:29', '2014-02-28 00:00:00', '2014-03-23 09:36:56'),
(5, 'Roshan', NULL, 'roshan@emporia.com', '5c7908f0f74c483080280a74f4c3d1e5', 'active', NULL, 1, 'admin', NULL, '2014-02-28 00:00:00', '2014-03-23 09:36:56'),
(6, 'Vikrant', NULL, 'vikrant@emporia.com', 'db520639be2e1027971003730fe43199', 'active', NULL, 1, 'superadmin', NULL, '2014-02-28 00:00:00', '2014-03-23 09:36:56'),
(7, 'Vicky', 'Khanna', 'vicky@emporia.com', '0d0b3b487d310e0fd048dcdfc7bc7b69', 'active', NULL, 1, 'user', '2014-03-17 00:36:36', '2014-02-28 00:00:00', '2014-03-23 09:36:56');

-- --------------------------------------------------------

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `widget_type_id`, `data`, `status`, `date_created`, `date_modified`) VALUES
(1, 'site_footer', 2, '{"social_facebook":"http:\\/\\/facebook.com","social_twitter":"http:\\/\\/twitter.com","social_gplus":"http:\\/\\/gplus.com","social_instagram":"http:\\/\\/instagram.com","social_pinterest":"http:\\/\\/pinterest.com","social_youtube":"http:\\/\\/youtube.com","label":["Terms & Conditions","Privacy Policy","User Agreement"],"link_url":["http:\\/\\/localhost:8888\\/cnk\\/pages\\/display?site=cnk&lang=in-en&env=microsite&view=terms-conditions","http:\\/\\/localhost:8888\\/cnk\\/pages\\/display?site=cnk&lang=in-en&env=microsite&view=privacy-policy","http:\\/\\/localhost:8888\\/cnk\\/pages\\/display?site=cnk&lang=in-en&env=microsite&view=user-agreement"]}', 'active', '2014-03-02 02:10:17', '2014-03-15 12:02:23'),
(2, 'site_partners', 3, '{"image":"http:\\/\\/localhost:8888\\/cnkAdmin\\/uploadedImages\\/thumb\\/widget_1393706529_image_thumb.jpg","image1":"http:\\/\\/localhost:8888\\/cnkAdmin\\/uploadedImages\\/thumb\\/widget_1393706529_image1_thumb.jpg","image2":"http:\\/\\/localhost:8888\\/cnkAdmin\\/uploadedImages\\/thumb\\/widget_1393706529_image2_thumb.jpg","image3":"http:\\/\\/localhost:8888\\/cnkAdmin\\/uploadedImages\\/thumb\\/widget_1393706529_image3_thumb.jpg","image4":"http:\\/\\/localhost:8888\\/cnkAdmin\\/uploadedImages\\/thumb\\/widget_1393706529_image4_thumb.jpg","link_url":["http:\\/\\/amazing-thailand.com","http:\\/\\/jet-airways.com","http:\\/\\/nikon.com","http:\\/\\/visa.com","http:\\/\\/malasiya-tourism.com"]}', 'active', '2014-03-02 02:12:09', '2014-03-06 19:32:26'),
(3, 'cr_how_it_works', 4, '{"title":"How It Works?","content":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ","label":"Know more","link_url":"\\/pages\\/display?view=how_it_works"}', 'active', '2014-03-02 02:13:27', '2014-03-06 18:32:05'),
(4, 'cr_countdownTimer', 5, '{"countdown_time":"2014\\/03\\/20 00:00"}', 'active', '2014-03-02 02:14:38', '2014-03-01 20:44:38'),
(5, 'about_us_content', 7, '{"title":"About Grab Your Dream","content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem.\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem"}', 'active', '2014-03-02 02:17:34', '2014-03-01 20:47:34'),
(6, 'how_it_works_content', 6, '{"title":["Register","Upload","Submitting and Voting","Interviews","Final Decision & Journey"],"content":["Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. "]}', 'active', '2014-03-02 02:19:13', '2014-03-01 20:49:13'),
(7, 'ar_rules_content', 6, '{"title":["Eligibility","Overview and Contest","Contest Preload","To Enter","Skillsets you are looking for"],"content":["Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. "]}', 'active', '2014-03-02 12:49:13', '2014-03-02 07:19:13');

-- --------------------------------------------------------

--
-- Dumping data for table `widget_types`
--

INSERT INTO `widget_types` (`id`, `name`, `display_name`, `form_name`, `description`, `status`, `date_created`, `date_modified`) VALUES
(1, 'header', 'site header', 'header_form', 'Site header with logo and multiple partner logos', 'active', '2014-02-21 01:32:20', '2014-02-20 20:02:20'),
(2, 'footer', 'site footer', 'footer_form', 'Footer element of site with links and social icons', 'active', '2014-02-21 01:32:20', '2014-02-20 20:02:20'),
(3, 'partners', 'partner', 'partners_form', 'Logos of various partners and their hyperlinks. Displayed as slider on the bottom of page', 'active', '2014-02-21 01:26:36', '2014-02-20 20:02:20'),
(4, 'small_content', 'small content module', 'small_content_form', 'Content with title, small text and hyperlink', 'active', '2014-02-21 01:26:36', '2014-03-02 19:57:29'),
(5, 'timer', 'Countdown Timer ', 'countdown_timer_form', 'Count down time widget to display time in decreasing order', 'active', '2014-02-21 01:28:25', '2014-03-02 19:57:18'),
(6, 'accrodian', 'accrodian', 'accrodian_form', 'Text to be displayed as accrodian with title and small description', 'active', '2014-02-21 01:28:25', '2014-02-20 20:02:20'),
(7, 'content', 'Static Content', 'content_form', 'full text with title and large descriptions. No hyperlink', 'active', '2014-02-21 01:29:13', '2014-03-02 19:57:37');
