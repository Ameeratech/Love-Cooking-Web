-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 04:58 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `love_cooking`
--
CREATE DATABASE `love_cooking` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `love_cooking`;

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE IF NOT EXISTS `chefs` (
  `chef_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chef_name` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`chef_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`chef_id`, `chef_name`, `image`) VALUES
(1, 'Miki Shemo', 'http://taraprofessional.co.il/wp-content/uploads/2014/11/Shemo-Page1.jpg'),
(3, 'luzan zedan', 'https://www.thenational.ae/image/policy:1.771139:1537859569/Manal-Al-Alem.jpg?f=16x9&w=1200&$p$f$w=2'),
(4, 'Moshik', 'https://images1.calcalist.co.il/PicServer2/20122005/440874/YE1655194.jpg_L.jpg'),
(5, 'Jamie Oliver', 'https://cdn.jamieoliver.com/library/images/Jamie-Social.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_content` mediumtext NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL,
  `user_name` varchar(30) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `recipe_id`, `user_name`) VALUES
(8, 'Looks so delicious', 1, 'Eyal'),
(9, 'Wowwww', 1, 'Liran'),
(10, 'Yummyyyy', 1, 'Yossi'),
(13, 'I just cooked this recipe to my family', 4, 'Eyal'),
(14, 'its really good', 6, 'Liran'),
(15, 'yummmm!!', 8, 'Yossi'),
(16, 'its a Nice idea', 8, 'Ameer'),
(17, 'my family liked this very much', 8, 'Eve'),
(20, 'Love it', 4, 'Luzan'),
(21, 'my favorite recipe', 6, 'Nir'),
(22, 'woow ', 1, 'Ameer'),
(23, 'woow ', 1, 'Ameer'),
(24, 'woow ', 1, 'Ameer'),
(25, 'woow ', 1, 'Ameer');

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE IF NOT EXISTS `employes` (
  `employee_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`employee_name`, `password`, `email`) VALUES
('avi', '12345678', 'avi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_types`
--

CREATE TABLE IF NOT EXISTS `kitchen_types` (
  `kitchen_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kitchen_type_name` varchar(25) NOT NULL,
  PRIMARY KEY (`kitchen_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `kitchen_types`
--

INSERT INTO `kitchen_types` (`kitchen_type_id`, `kitchen_type_name`) VALUES
(1, 'asian '),
(2, 'italian'),
(4, 'chinese'),
(5, 'mexican'),
(6, 'indian'),
(7, 'greek'),
(8, 'french'),
(9, 'japanese'),
(10, 'moroccan'),
(11, 'turkish'),
(12, 'thai'),
(13, 'spanish'),
(14, 'american'),
(15, 'british'),
(16, 'caribbean');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `recipe_id` int(10) unsigned NOT NULL,
  `user_name` varchar(30) NOT NULL,
  PRIMARY KEY (`recipe_id`,`user_name`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`recipe_id`, `user_name`) VALUES
(1, 'Ameer'),
(6, 'Ameer'),
(8, 'Ameer'),
(4, 'Ameera'),
(6, 'Eve'),
(6, 'Liran'),
(1, 'Mor');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` varchar(10) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_types`
--

CREATE TABLE IF NOT EXISTS `recipe_types` (
  `recipe_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_type_name` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`recipe_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `recipe_types`
--

INSERT INTO `recipe_types` (`recipe_type_id`, `recipe_type_name`, `image`) VALUES
(1, 'salads', 'salad.jpeg'),
(2, 'soups', 'soups.jpg'),
(3, 'desserts', 'desserts.jpg'),
(4, 'cake & bake', 'cakes.jpg'),
(5, 'events', 'events.jpg'),
(6, 'kitchens', 'kitchen.jpg'),
(7, 'drinks', 'drinks.jpg'),
(8, 'vegeterian', 'vegeterian.jpg'),
(9, 'healthy', 'healthy.jpeg'),
(10, 'dishes', 'dishes.jpg'),
(11, 'family & kids', 'family & kids.jpg'),
(12, 'ingredients', 'ingredients.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `recipe_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_name` varchar(25) NOT NULL,
  `recipe_type` int(10) unsigned NOT NULL,
  `kitchen_type` int(10) unsigned NOT NULL,
  `ingredients` mediumtext NOT NULL,
  `preparation` mediumtext NOT NULL,
  `level` tinyint(1) NOT NULL,
  `chef_id` int(10) unsigned DEFAULT NULL,
  `picture` varchar(500) NOT NULL,
  `equipment` longtext NOT NULL,
  `time` smallint(6) NOT NULL,
  `people_quantity` tinyint(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `video` varchar(500) NOT NULL,
  PRIMARY KEY (`recipe_id`),
  KEY `recipe_type` (`recipe_type`),
  KEY `kitchen_type` (`kitchen_type`),
  KEY `chef_id` (`chef_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6790 ;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `recipe_name`, `recipe_type`, `kitchen_type`, `ingredients`, `preparation`, `level`, `chef_id`, `picture`, `equipment`, `time`, `people_quantity`, `description`, `video`) VALUES
(1, 'Pukka yellow curry', 2, 4, '2 onions\r\n4 cloves of garlic\r\n5 cm piece of ginger\r\n2 yellow peppers\r\n1 organic chicken stock cube\r\n1-2 fresh red chillies\r\n½ a bunch of fresh coriander , (15g)\r\n1 teaspoon runny honey\r\n1 level teaspoon ground tumeric\r\n2 teaspoons curry powder\r\n8 free-range chicken drumsticks\r\nolive oil\r\n1 x 400 g tin of chickpeas\r\n1 teaspoon tomato purée\r\n1 mug of basmati rice , (320g)\r\n1 lemon\r\nfat-free natural yoghurt , optional', '1.Peel the onions, garlic and ginger and deseed the peppers.\r\n2.Put 1 onion, 1 pepper, the garlic and ginger into a food processor.\r\n3.Crumble in the stock cube and add the chilli (deseed it first, if you prefer a milder curry), the coriander stalks, honey and spices, then blitz to a paste.\r\n4.Place a large casserole pan on a medium-high heat and fry the chicken drumsticks (pull the skin off first, if you prefer) with a splash of oil for 10 minutes, or until golden, turning occasionally with tongs.\r\n5.Remove the chicken to a plate, leaving the pan on the heat.\r\n6.Roughly chop the remaining onion and pepper and add to the pan to cook for a few minutes, then tip in the paste and let it cook down for around 5 minutes.\r\n7.Pour in 500ml of boiling water. Drain the chickpeas and add along with the tomato purée and a pinch of sea salt and black pepper, then stir well.\r\n8.Return the chicken to the pan, pop the lid on, reduce the heat and simmer gently for around 45 minutes, or until the sauce darkens and thickens.\r\n9.With 15 minutes to go, put 1 mug (320g) of rice and 2 mugs of boiling water into a pan with a pinch of salt and simmer with the lid on for 12 minutes, or until all the liquid has been absorbed.\r\n10.Serve the curry in the middle of the table with a few dollops of yoghurt (if using) and a scattering of coriander leaves, with lemon wedges for squeezing over and the fluffy rice on the side.', 3, 5, 'https://img.jamieoliver.com/jamieoliver/recipe-database/oldImages/xtra_med/1100_1_1436875132.jpg?tr=w-430', 'big pot-\r\nspoon-\r\nbowl', 60, 6, '“This budget-friendly chicken drumstick recipe is great value and tastes phenomenal.', ''),
(4, 'aaa', 1, 1, 'bbb', 'ccc', 1, 1, 'https://img.jamieoliver.com/jamieoliver/recipe-database/oldImages/xtra_med/1100_1_1436875132.jpg?tr=w-430', 'ddd', 0, 0, '', ''),
(6, 'asdasd', 1, 1, 'sadasd', 'asdasdas', 1, 1, 'https://img.jamieoliver.com/jamieoliver/recipe-database/oldImages/xtra_med/1100_1_1436875132.jpg?tr=w-430', 'dasdas', 0, 0, '', ''),
(8, 'luzan', 1, 1, 'sadasd', 'asdasdas', 1, 1, '', 'dasdas', 0, 0, '', ''),
(1221, 'Cheese & pesto whirls', 4, 4, '450g strong white bread flour, plus a little for dusting\r\n7g sachet fast-action dried yeast\r\n1 tsp golden caster sugar\r\n2 tbsp olive oil\r\n\r\n, plus a drizzle\r\n150g tub fresh pesto\r\n\r\n\r\n240g tub semi-dried tomatoes, drained and roughly chopped\r\n100g grated mozzarella (ready-grated is best for this, as it is drier than fresh)\r\n50g parmesan\r\n\r\n (or vegetarian alternative), grated\r\nhandful basil\r\n\r\n leaves', 'Combine the flour, yeast, sugar and 1 1/2 tsp fine salt in a large mixing bowl, or the bowl of a tabletop mixer. Measure out 300ml warm water and add roughly 280ml to the flour, along with the olive oil, and start mixing until the ingredients start to clump together as a dough. If the dough seems a little dry, add the remaining water. Once combined, knead for 10 mins by hand on your work surface, or for 5 mins on a medium speed in a mixer. The dough is ready when it feels soft, springy and elastic. Clean the bowl, drizzle in a little oil, then pop the dough back in, turning it over and coating the sides of the bowl in oil. Cover with some oiled cling film and set aside in a warm place to double in size – this will take 1-3 hrs, depending on the temperature.\r\n\r\nLine a baking tray with parchment. Uncover the dough and punch it down a couple of times with your fist, knocking out all the air bubbles. Tip out onto a floured work surface and dust the top with a little flour too, if it is sticky. Roll the dough out to a rectangle, roughly 40 x 30cm. Spread the pesto over the dough, then scatter over the tomatoes, both cheeses and the basil. Roll the dough up from one of the longer sides, into a long sausage.\r\n\r\nUse a sharp knife to cut the dough into 12 even pieces. Place on the baking tray, cut-side up, in a 3-by-4 formation, making sure the open end of each roll is tucked in towards the centre on the arrangement – this will prevent them from uncoiling during cooking. Leave a little space between each roll as they will grow and touch as they prove. Loosely cover with oiled cling film and leave to prove for 30 mins–1 hr until almost doubled in size again. Heat oven to 200C/180C fan/gas 6.\r\n\r\nUncover the bread when it is puffed up. Bake on the middle shelf in the oven for 35-40 mins until golden brown and the centre looks dry and not doughy. Remove from the oven and leave to cool for at least 10 mins.', 3, 4, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe_images/cheese-pesto-whirls.jpg?itok=PJph2ncD', ' large mixing bowl\r\n bowl of a tabletop mixer\r\nfood Measure\r\nparchment\r\nRoller\r\nbaking tray\r\nsharp knife \r\noven\r\n', 40, 12, 'These herby tear-and-share bread rolls have mozzarella and sun-dried tomatoes baked into them - perfect for a picnic or for dipping into soup', ''),
(1222, 'Easy vegan chocolate cake', 8, 12, 'a little dairy-free sunflower spread, for greasing\r\n1 large, ripe avocado\r\n\r\n (about 150g)\r\n300g light muscovado sugar\r\n350g gluten-free plain flour\r\n50g good quality cocoa powder\r\n1 tsp bicarbonate of soda\r\n\r\n2 tsp gluten-free baking powder\r\n400ml unsweetened soya milk\r\n150ml vegetable oil\r\n2 tsp vanilla extract\r\nFor the frosting\r\n85g ripe avocado\r\n\r\n flesh, mashed\r\n85g dairy-free sunflower spread\r\n200g dairy-free chocolate\r\n\r\n, 70% cocoa, broken into chunks\r\n25g cocoa powder\r\n125ml unsweetened soya milk\r\n200g icing sugar, sifted\r\n1 tsp vanilla extract\r\ngluten-free and vegan sprinkles, to decorate', 'Heat oven to 160C/140C fan/gas 3. Grease two 20cm sandwich tins with a little dairy-free sunflower spread, then line the bases with baking parchment.\r\n\r\nPut 1 large avocado and 300g light muscovado sugar in a food processor and whizz until smooth. \r\n\r\nAdd 350g gluten-free plain flour, 50g cocoa powder, 1 tsp bicarbonate of soda, 2 tsp gluten-free baking powder, 400ml unsweetened soya milk, 150ml vegetable oil and 2 tsp vanilla extract to the bowl with ½ tsp fine salt and process again to a velvety, liquid batter.\r\n\r\nDivide between the tins and bake for 25 mins or until fully risen and a skewer inserted into the middle of the cakes comes out clean.\r\n\r\nCool in the tins for 5 mins, then turn the cakes onto a rack to cool completely.\r\n\r\nWhile you wait, start preparing the frosting. Beat together 85g ripe avocado flesh and 85g dairy-free sunflower spread with electric beaters until creamy and smooth. Pass through a sieve and set aside. \r\n\r\nMelt 200g dairy-free chocolate, either over a bowl of water or in the microwave, then let it cool for a few mins.\r\n\r\nSift 25g cocoa powder into a large bowl. Bring 125ml unsweetened soya milk to a simmer, then gradually beat into the cocoa until smooth. Cool for a few mins.\r\n\r\nTip in the avocado mix, 200g sifted icing sugar, melted chocolate and 1 tsp vanilla, and keep mixing to make a shiny, thick frosting. Use this to sandwich and top the cake.\r\n\r\nCover with sprinkles or your own decoration, then leave to set for 10 mins before slicing. Can be made 2 days ahead. ', 1, 3, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe_images/chocolate-avocado-cake.jpg?itok=XyZVRZkK', 'oven \r\nbaking parchment\r\nmicrowave\r\nmixer\r\nknife', 30, 12, 'This indulgent, fudgy vegan bake is topped with a rich frosting – you''d never guess that it''s free from dairy, eggs, wheat and nuts', ''),
(1223, 'Hazelnut latte cake', 4, 13, '100g unsalted butter, plus extra for greasing\r\n100g bag chopped toasted hazelnuts\r\n300g light brown soft sugar\r\n\r\n6 tbsp semi-skimmed milk\r\n1 tsp fine instant coffee powder (see tip)\r\n6 large eggs\r\n\r\n, at room temperature\r\n2 tbsp cornflour\r\n175g plain flour\r\nFor the coffee syrup\r\n50g light brown soft sugar\r\n\r\n1 tsp fine instant coffee powder\r\n1 tbsp Frangelico (hazelnut) liqueur, or use Kahlua or Tia Maria\r\nFor the frosting and nuts\r\n400g mascarpone\r\n300g hazelnut chocolate spread (Nutella has the best texture for this)\r\n1 tbsp fine instant coffee powder\r\n50g chopped toasted hazelnuts\r\nFor the latte topping\r\n150ml pot double cream\r\n4 tsp icing sugar\r\n3 tbsp semi-skimmed milk\r\n1 tbsp fine instant coffee powder, dissolved in 1 tsp boiling water', 'Heat the oven to 180C/160C fan/gas 4. Generously butter two 20cm sandwich tins (ideally about 4.5cm deep or deeper) and line the bases with baking parchment. Put the hazelnuts into a food processor with 2 tbsp of the sugar, then pulse until finely chopped. Don’t expect them to go as fine as ground almonds and avoid over-processing, as this can make the nuts greasy.\r\n\r\nPut the butter, milk and coffee powder into a small pan and heat gently until the butter has melted. Set aside.\r\n\r\nNow start the sponge. Crack the eggs into the bowl of a tabletop mixer, add the rest of the sugar and beat for 5-10 mins (or beat with an electric hand mixer in a large deep bowl for 15-20 mins) or until thick and billowy, and the mixture leaves a trail that holds for a couple of seconds. It is really important that the mixture has thickened, almost doubling in size, in order to achieve a light sponge.\r\n\r\nMix the cornflour, plain flour and 1/2 tsp salt, and sift onto the whisked mixture. Using a large metal spoon, fold in very carefully. Sprinkle in the ground nuts, then fold these in too. Pour the warm milk mix around the edge of the bowl, and fold this in. Don’t rush the folding, and continue with a light lifting and cutting motion until ribbons of liquid stop appearing. Divide the batter between the tins, then bake for 25 mins until risen to the middle and a burnished gold.\r\n\r\nLoosen the sides of the cakes with a palette knife, then cool in the tins on a rack for 20 mins (the cakes will level off, and possibly go a bit wrinkly, but that’s normal). Carefully remove from the tins and cool, paper-side down.\r\n\r\nMake the syrup and the frosting while you wait. Put the sugar and 4 tbsp water into a small pan. Bring to the boil and leave for 1 min then take off the heat. Stir in the coffee and alcohol. Beat the mascarpone, hazelnut chocolate spread and coffee together with a wooden spoon, until silky and even.\r\n\r\nTo assemble, cut the cold cakes horizontally across the middle, using a long serrated knife. With a pastry brush, dampen the cut surfaces all over with the syrup. Use it all. Put one cake layer onto a plate or stand, cut-side up. Spoon on 3 generous dollops of the frosting, then spread to the edges with a palette knife. The frosting should be about 5mm deep. Repeat with the next two layers. When you come to the final layer, place it cut-side down, so that the top of the cake is smooth. Paddle the rest of the frosting over the top and sides of the cake. The layer on the top can be thin. Clean the knife then use it to press a neat ring of nuts into the frosting on the side of the cake. Brush any excess away.\r\n\r\nFor the topping, put 3 tbsp of the cream, 1 tsp icing sugar and 1 tbsp milk into a small bowl. Put the rest of the cream, milk and sugar, plus most of the dissolved coffee into a larger bowl. Whip the white cream, then the coffee cream, until they look like soft cappuccino froth, thick but still able to flow from a spoon. Pour most of the coffee cream onto the cake and push it out to cover the top. Whisk a little more coffee into what is left, so that it turns a few shades darker.\r\n\r\nTo decorate with a characteristic latte ‘tree’ shape, load a pointy teaspoon with a little of the white cream. Start at the base of the tree, just right of the centre of the cake. Push the spoon into the coffee cream and let the white cream flow slowly. As it flows, drag the spoon then pull it gently away, to make a leaf-like shape. Repeat with more white cream on the left to make another leaf, then repeat 3-4 times, working up the cake top graduating from large to small leaves. Use the same technique to sweep a couple of arc shapes around the edge of the pattern.\r\n\r\nUse the dark cream to add detail to each leaf – you can paint this on with the tip of a teaspoon or a clean cocktail stick. Use a cocktail stick to drag the points of each leaf up and outwards. Draw a line down from the top of the ‘tree’ to the bottom to finish. The cake will keep for up to 2 days. Loosely cover any cut edges but avoid covering the cake directly as you could damage the decoration. Serve from the fridge or at cool room temperature', 3, 1, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe_images/hazelnut-latte-cake.jpg?itok=C4XnZ7_x', 'oven\r\nbaking parchment\r\nfood processor\r\nsmall pan\r\n tabletop mixer\r\nelectric hand mixer\r\n large deep bowl\r\n palette knife', 90, 16, 'Give coffee cake the ultimate upgrade - layer with chocolate hazelnut frosting, add a creamy topping and sprinkle with crushed nuts', ''),
(1224, 'Festive filled brioche', 4, 10, '4 large eggs\r\n20ml milk\r\n\r\n350g strong white bread flour\r\n7g sachet fast-action dried yeast\r\n30g caster sugar\r\n5g salt\r\n½ tsp mixed spice\r\n200g unsalted butter, cubed and softened\r\n1 egg\r\n\r\n, beaten with a pinch of salt\r\nscattering of poppy seed\r\n1 whole 250g camembert in a wooden, stapled carton\r\n2-3 sprigs thyme\r\n\r\nFor the fillings\r\n1 garlic\r\n\r\n bulb\r\n1 tbsp quince paste (membrillo), mashed\r\n5 cooked chestnut\r\n\r\n halves\r\n½ tbsp dried, chopped cranberry\r\n\r\n mixed with ½ tbsp cranberry sauce\r\n1 tbsp mushroom pâté\r\nFor the decoration\r\n30g fresh cranberry\r\n\r\nrosemary\r\n\r\n springs or bay leaves', 'Day before: whisk together the eggs and milk in a jug. Put the flour, yeast, sugar, salt and spice in the bowl of a kitchen mixer fitted with a dough hook. Stir to combine.\r\n\r\nOn a medium setting, slowly pour in the egg mixture in a steady stream, continuing to stir until incorporated into a very soft, wet dough. Add the butter and increase the speed, kneading for 8-10 minutes. The dough will be ready when it clings around the dough hook. At this stage it will look more like a thick cake batter than bread dough. Cover with cling film and refrigerate overnight.\r\n\r\nYou can also roast the garlic the day before: heat the oven to 200C/fan 180C/gas 6. Line a baking sheet with foil. Remove any loose outer skins from the garlic bulbs. With a sharp knife, cut off the stem and uppermost part of the cloves. Place on the foil, drizzle over a little olive oil and season. Bring up the edges of the foil and seal to form a fairly tight parcel. Bake in the top of the oven for 35-45 minutes. Remove from the oven and leave the parcel sealed until the garlic is cool enough to handle. Remove the cloves by either squeezing the bulb upwards from the base or by teasing them out with a toothpick. Mash the garlic with a fork. Wrap well (to avoid the garlic smell transferring to other foods) and refrigerate.\r\n\r\nOn the day: line a baking tray with baking parchment. Remove the cheese from its wooden carton and put the cheese back in the fridge until later. Put the carton in the centre of the lined tray.\r\n\r\nTip the dough out onto a well-floured surface. Divide into 5 large equal-sized pieces - it can help to roll the dough into an even sausage shape and mark with a knife first to get equal pieces.\r\n\r\nTake one piece and divide into 5 again. One at a time, roll each of these 5 pieces gently into a ball, flour your index finger and make a small, deep indent in the middle. Fill with half a teaspoon of the roasted garlic, pinching the dough over the top to seal and placing the sealed side down onto the floured surface. Cup your hand over the bun and rotate a little to get an even shape. Repeat until you have filled all 5.\r\n\r\nRepeat step 6 using the remaining 4 fillings.\r\n\r\nArrange the buns around the wooden carton, you’ll need 10 for the inner ring and 15 for the outer ring. Leave around 0.5cm between each bun, giving them room to rise. Cover with oiled cling film and leave in a warm place for 30-40 minutes or until nearly doubled in size.\r\n\r\nHeat oven to 190C/170C fan/gas 5. Remove any plastic wrapping or stickers from the cheese. With a small knife, make an incision in the top rim and remove the top layer of rind. Sprinkle with thyme leaves and place in the carton, cut side up. Brush the buns with the beaten egg and scatter with poppy seeds. Bake for 15-20 minutes until golden brown. Slide onto a serving platter. Decorate with the herbs and fresh cranberries. Serve the extra cheese alongside if using', 2, 4, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe_images/kimberley-wreath.jpg?itok=w922UrZo', ' jug\r\n bowl of a kitchen mixer\r\ndough hook\r\noven\r\n fridge\r\nwooden carton\r\n plastic wrapping or stickers\r\n small knife', 50, 8, 'Great British Bake Off''s Kimberley Wilson has created this stunning celebration bread with individually filled buns and a melting cheese middle – made for sharing', ''),
(1226, 'Black Forest loaf cake', 4, 7, '175g butter\r\n\r\n, chopped\r\n75g dark chocolate\r\n\r\n, chopped\r\n300g self-raising flour\r\n375g golden caster sugar\r\n30g cocoa\r\n2 large eggs\r\n\r\n60ml milk\r\n\r\n240g natural yogurt\r\n1 jar or tin of pitted cherries (about 600g), syrup reserved\r\n400ml double cream', 'Heat the oven to 180C/160C fan/gas 4. Butter and line a 1.5kg loaf tin. \r\n\r\nMelt the butter and chocolate together in the microwave until smooth. Sieve the flour into a bowl, then stir in the sugar and cocoa. Add the chocolate mixture, eggs, milk and 200g yogurt and blend until smooth.\r\n\r\nSpoon the mixture into the loaf tin and make eight dips in the surface. Top each dip with 1 tsp yogurt and a cherry. Put the loaf in the oven and bake for 1 hr, or until a skewer inserted into the middle of the cake comes out clean. Cool in the tin for 20 mins, then transfer to a wire rack and leave to cool completely.\r\n\r\nJust before serving, use a balloon whisk or electric whisk to beat the cream until stiff. Spoon the cream onto the cake in dollops, top with the remaining cherries and drizzle over some of the cherry syrup. Serve straightaway. Leftovers will keep for up to three days in the fridge.', 1, 1, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe/recipe-image/2018/11/black-forest-loaf-cake.jpg?itok=BK9s6-yd', 'oven \r\nmicrowave\r\nbowl\r\n wire rack\r\nballoon whisk-electric whisk\r\n', 25, 12, 'Make this black forest cake ahead if you’re expecting lots of guests this Christmas. It can be frozen, un-iced, then defrosted when you need it and decorated on the day', ''),
(1234, 'Watermelon granita', 2, 5, '1 small watermelon , (1.8kg)\r\n60 g stem ginger in syrup\r\n2 limes\r\n½ a bunch of fresh mint , (15g)\r\n8 tablespoons natural yoghurt', 'Cut off the watermelon rind, then chop the flesh into chunks, picking out any seeds. Roughly chop the ginger and place in a large sealable freezer bag with the watermelon chunks. Finely grate in the lime zest, squeeze in all the juice, then freeze flat for at least 8 hours, or until super-hard.\r\n\r\nWhen ready to serve, pick and reserve the baby mint leaves, then pick the rest into a food processor. Tip in the frozen watermelon mixture and blitz to a pink snow (in batches, if you need to). Serve 2 heaped tablespoons of granita per person, with 1 tablespoon of yoghurt, a drizzle of ginger syrup from the jar and a few baby mint leaves. It’s nice to use chilled plates, bowls or glasses here.', 1, 4, 'images/cake1.jpg', 'knife \r\nbowl \r\nmixer \r\nfreezer bag\r\n', 25, 2, 'WITH GINGER SYRUP, COOL NATURAL YOGHURT & MINT', ''),
(1235, 'Eggnog Cake ', 3, 7, 'Cake:1/2 cup butter, room temperature\r\n1 1/4 cups white sugar\r\n3 eggs, room temperature\r\n1 teaspoon vanilla extract\r\n1/4 teaspoon finely grated lemon peel\r\n2 cups all-purpose flour\r\n2 teaspoons baking powder\r\n1 teaspoon salt\r\n1 cup prepared eggnog (or see notes for recipe)\r\n2 tablespoons bourbon whiskey\r\nFrosting:\r\n1/4 cup all-purpose flour\r\n1/4 teaspoon salt\r\n1 1/2 cups prepared eggnog (or see notes for recipe)\r\n1 cup butter, room temperature\r\n1 1/2 cups white sugar\r\n1 1/2 teaspoons vanilla extract\r\n1/4 teaspoon rum-flavored extract\r\n1/8 teaspoon finely grated lemon peel\r\n1/2 cup finely chopped toasted pecans (optional)', 'Preheat oven to 350 degrees F (175 degrees C). Grease and flour two 9-inch round baking pans.\r\nBeat 1/2 cup butter and 1 1/4 cups sugar with an electric mixer in a large bowl until light and fluffy. Mixture should be noticeably lighter in color. Add eggs, one at a time, allowing each egg to blend into butter mixture before adding the next. Stir in 1 teaspoon vanilla extract and 1/4 teaspoon lemon peel, mixing well.\r\nCombine 2 cups flour, baking powder, and 1 teaspoon salt in a bowl. Pour flour mixture into the batter alternately with 1 cup eggnog, mixing until just incorporated. Stir in bourbon. Divide batter evenly between prepared pans.\r\nBake in preheated oven until cake springs back when touched lightly with a fingertip or a toothpick inserted in the centers comes out clean, 30 to 35 minutes (test both cake layers). Cool in pans for 10 minutes before inverting on a wire rack to cool completely.\r\nTo make frosting, combine 1/4 cup flour and 1/4 teaspoon salt in a saucepan. Gradually whisk in 1 1/2 cups eggnog, whisking until smooth.\r\nBring to a boil over medium heat, stirring frequently. When mixture boils, cook for 2 minutes, whisking constantly, until thickened. Remove from heat and let cool completely to room temperature.\r\nBeat 1 cup butter and 1 1/2 cups sugar in a bowl until light and fluffy. Mix in cooled eggnog mixture, 1 1/2 teaspoon vanilla extract, rum extract, and 1/8 teaspoon grated lemon peel. Beat on high speed until mixture is fully incorporated and frosting is fluffy.\r\nSpread cake with plain frosting between cake layers, over the top and on the sides. Coat the sides with toasted pecans, pressing the nuts onto sides in small handfuls. Refrigerate until serving time.', 2, 5, 'https://images.media-allrecipes.com/userphotos/720x405/1082030.jpg', 'oven \r\nknife \r\nbowel \r\nmixer \r\nfreezer \r\n', 40, 7, '"You can really taste the eggnog in this lovely, rich, moist cake. No eggnog? No problem. You can make enough for the recipe in a jiffy. Nothing says Southern hospitality like this impressive cake. If you like, set aside and tint 1/4 cup of the frosting t', ''),
(1236, 'Chocolate peanut butter ', 3, 7, '150g golden icing sugar\r\n225g butter\r\n\r\n, at room temperature\r\n300g plain flour, sifted, plus extra for dusting\r\n55g cocoa powder, sifted\r\nFor the peanut buttercream\r\n300g golden icing sugar\r\n50g butter\r\n\r\n, at room temperature\r\n100g smooth peanut butter\r\n\r\n2-3 tbsp milk', 'Put everything for the shortbread in a food processor with a pinch of salt and pulse until the mixture comes together to form a dough. If it won’t come together, take it out of the processor and bring it together with your hands. Tip onto a lightly floured work surface and shape into a log about 5cm in diameter. Wrap in cling film and chill for 1 hr.\r\n\r\nHeat oven to 140C/120C fan/gas 2. Line two large baking sheets with baking parchment. Cut the log into about 32 rounds 6mm thick and line them up on the sheets. Bake for 22-25 mins. Leave to cool a little, then carefully remove and put on a wire rack to cool completely.\r\n\r\nTo make the buttercream, blitz all the ingredients in a food mixer or beat with an electric whisk, adding enough of the milk to make a soft mixture. Sandwich the shortbread together with the buttercream.', 2, 4, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe/recipe-image/2017/09/chocolate-peanut-butter-shortbread-sandwiches.jpg?itok=lDGRsZ4G', 'diameter\r\noven\r\nknife \r\nfood mixer\r\nelectric whisk', 25, 16, 'If you love peanut butter, what could be better than peanut buttercream slathered between two chocolate shortbread biscuits? Sure to go down a treat', ''),
(1237, 'Florentine biscuits', 3, 7, '175g slightly salted butter, softened\r\n85g golden caster sugar\r\n½ tsp vanilla extract\r\n225g plain flour, plus extra for dusting\r\n¼ tsp ground cinnamon\r\nFor the Florentine topping\r\n50g butter\r\n50g light brown soft sugar\r\n50g golden syrup\r\n½ tsp salt\r\n50g plain flour\r\n75g glacé cherries, chopped\r\n75g flaked almonds\r\n150g dark chocolate, chopped', 'To make the biscuits, put the butter, sugar and vanilla in a bowl and beat with an electric whisk until creamy. Add the flour and cinnamon, and combine with a spatula to make a soft dough. Form into a ball, wrap in cling film and chill for at least 1 hr.\r\n\r\nIn a saucepan, melt the butter, sugar, golden syrup and salt. Remove from the heat and whisk in the flour, then stir in the cherries and almonds. Set aside to cool and firm up a little. Heat oven to 180C/160C fan/gas 4 and line a baking sheet with parchment.\r\n\r\nTip the dough onto a floured work surface and roll out to the thickness of a £1 coin. Using a 6cm fluted cookie cutter, stamp out as many circles as you can, then scrunch up the trimmings, re -roll and stamp out some more. Transfer to the baking sheet, and spoon some of the Florentine mixture onto each biscuit until it’s all used up. Bake on the middle shelf for 12-15 mins until the biscuits are golden and the topping has melted. Leave to cool on the sheet for at least 15 mins.\r\n\r\nWhile the biscuits cool, melt the chocolate in a small heatproof bowl suspended over a pan of gently simmering water, or in short bursts in the microwave. Stir every 30 secs or so to ensure it doesn’t burn. Dip each biscuit about a third of the way into the chocolate, then return to the sheet to set. You may need to spoon the chocolate over the final few. Will keep for up to four days in a sealed container.', 1, 1, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe/recipe-image/2016/10/li-359186520160902_95_gf7.jpg?itok=Q2fal1Iz', ' saucepan\r\nelectric whisk\r\nbaking sheet \r\nheatproof bowl\r\noven microwave ', 55, 36, ' We''ve given the classic Florentine a chocolate covered biscuity base so they''re perfect for dunking. Enjoy yourself or give as a homemade gift', ''),
(1238, 'Strawberry cheesecake', 4, 14, '250g digestive biscuits\r\n100g butter\r\n\r\n, melted\r\n1 vanilla pod\r\n600g cream cheese\r\n100g icing sugar\r\n284ml pot of double cream\r\nFor the topping\r\n400g punnet of strawberries\r\n\r\n, halved\r\n25g icing sugar', 'To make the base, butter and line a 23cm loose-bottomed tin with baking parchment. Put the digestive biscuits in a plastic food bag and crush to crumbs using a rolling pin. Transfer the crumbs to a bowl, then pour over the melted butter. Mix thoroughly until the crumbs are completely coated. Tip them into the prepared tin and press firmly down into the base to create an even layer. Chill in the fridge for 1 hr to set firmly.\r\n\r\nSlice the vanilla pod in half lengthways, leaving the tip intact, so that the two halves are still joined. Holding onto the tip of the pod, scrape out the seeds using the back of a kitchen knife.\r\n\r\nPlace the cream cheese, icing sugar and the vanilla seeds in a bowl, then beat with an electric mixer until smooth. Tip in the double cream and continue beating until the mixture is completely combined. Now spoon the cream mixture onto the biscuit base, starting from the edges and working inwards, making sure that there are no air bubbles. Smooth the top of the cheesecake down with the back of a dessert spoon or spatula. Leave to set in the fridge overnight.\r\n\r\nBring the cheesecake to room temperature about 30 mins before serving. To remove it from the tin, place the base on top of a can, then gradually pull the sides of the tin down. Slip the cake onto a serving plate, removing the lining paper and base. Purée half the strawberries in a blender or food processor with the icing sugar and 1 tsp water, then sieve. Pile the remaining strawberries onto the cake, and pour the purée over the top.', 1, 3, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/user-collections/my-colelction-image/2015/12/recipe-image-legacy-id--1028453_10.jpg?itok=6bXgXisy', ' plastic food bag\r\n rolling pin\r\nbowl\r\nfridge\r\n electric mixer\r\n spatula\r\n food processor- blender \r\n', 30, 14, 'Follow our step-by-step recipe for this easy no-cook cheesecake – a delicious summer dessert for all occasions', ''),
(1239, 'Cardamom buns', 4, 2, '35 cardamom pods\r\n350ml full-fat milk\r\n\r\n200g butter\r\n\r\n, cubed\r\n500g strong white bread flour, plus extra for dusting\r\n225g golden caster sugar\r\n7g sachet fast-action dried yeast\r\n½ tsp ground cinnamon\r\nvegetable oil or sunflower oil, for greasing\r\n1 large egg, beaten\r\n2 tbsp pearl sugar (available from ocado.com)', 'Crack open 10 of the cardamom pods with a pestle and mortar, and tip into a saucepan. Add the milk and warm until steaming but not boiling. Add 50g butter (leave the remaining butter at room temperature to soften) and set aside to cool until lukewarm, swirling the pan from time to time to encourage the butter to melt.\r\n\r\nPut the flour, 75g of the sugar, the yeast, cinnamon and 1 /2 tsp salt into a large bowl, or the bowl of a freestanding mixer. Mix until well combined. When the milk has cooled, strain it through a sieve into the flour, discarding the cardamom. Using a wooden spoon or dough hook, mix to form a soft dough. Tip onto a work surface and knead for 10 mins, or run the freestanding mixer for 5 mins, until the dough is smooth and stretchy. Clean the bowl, lightly grease with oil, then return the dough to the bowl and turn it over until well coated in oil. Cover the bowl with a tea towel or cling film and leave to rise for 2 hrs or until doubled in size (you could prove it in the fridge overnight).\r\n\r\nCrack the remaining cardamom pods using a pestle and mortar. Prise them open and tip the seeds back into the mortar, discarding the pods. Crush the seeds to a powder, then combine with 150g sugar. In a bowl, mix the remaining butter with all but 2 tbsp of the cardamom sugar.\r\n\r\nLine two baking trays with parchment. Punch the dough down to knock out the air, then roll to a rectangle roughly 35 x 45cm, with the longer edge facing you. Spread the cardamom butter over the surface, right to the edges. Fold the top third down to the middle and the bottom third up, like an envelope, so you have three layers of dough. Score, then cut into 12 equal strips, measuring about 3.5 x 11cm each. Cut each strip down the centre, leaving it attached at the top. Twist each strip away from the centre two or three times, then tie the dough in a knot and tuck the ends underneath the bun. Put each on the tray when done.\r\n\r\nCover both trays with a sheet of lightly oiled cling film and leave somewhere warm to rise for 30 mins - 1 hr, or until almost doubled in size. Heat oven to 190C/170C fan/gas 5.\r\n\r\nUncover the buns and brush all over with the beaten egg, then sprinkle with the pearl sugar. Bake for 20-25 mins until golden brown – swap the trays halfway through if they’re browning unevenly.\r\n\r\nTip the remaining cardamom sugar into a pan and add 50ml water. Bring to a boil, then remove from the heat and set aside to cool, swirling to dissolve the sugar. Brush the syrup over the buns two or three times as they cool, leave them to soak for 20 mins before eating. Will keep for 2 days in a sealed container, or freeze for 2 months. Defrost at room temperature and reheat for 5 mins in the oven before eating.', 3, 5, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe/recipe-image/2016/06/cardamom-buns.jpg?itok=_ySztUN_', 'pestle and mortar\r\nsaucepan\r\nwooden spoon -dough hook\r\nbowl\r\noven \r\n', 40, 12, 'This spiced Swedish bun has an intense floral perfume from cardamom seeds, which works its way into the dough during cooking', ''),
(6782, 'Raspberry& fruit martini', 7, 4, '100ml vodka\r\n\r\n1 tbsp raspberry liqueur\r\n50ml passion fruit juice (we used Rubicon)\r\nhandful of ice\r\n½ passion fruit (optional)', 'Put 2 martini glasses in the freezer for 5 mins to chill. Mix the vodka, raspberry liqueur, passion fruit juice and a handful of ice in a jug or cocktail shaker.\r\n\r\nStrain into the glasses and float ½ a passion fruit on the top of each, if you like.', 1, 3, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe_images/flirtini-cocktail.jpg?itok=2fs9PSKm', 'glasses\r\nfreezer', 5, 2, 'This fruity vodka cocktail for two is perfect for a romantic Valentine''s meal - float half a passion fruit on top for an extra special touch', ''),
(6783, 'Aperol & limoncello ', 7, 9, '100ml vodka\r\n\r\n100ml limoncello\r\n1 tbsp triple sec\r\n200ml Aperol or Campari\r\n300ml orange juice\r\nTo serve\r\nsliced oranges\r\n\r\nlemons\r\n\r\n on skewers', 'Mix together all the ingredients in a jug. Chill until ready to serve. Pour into 4 highball glasses with ice. Decorate with citrus skewers.', 1, 5, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/user-collections/my-colelction-image/2015/12/aperol-limoncello-cocktail.jpg?itok=INbtMOSI', 'jug\r\ncitrus skewers\r\n highball glasses ', 5, 4, 'Mix vodka, limoncello, Aperol and orange juice for this punchy citrus party drink - make with Campari if you prefer', ''),
(6784, 'Triple choc hot chocolate', 7, 11, '50ml double cream\r\n150ml whole milk\r\n50g chopped milk chocolate\r\n\r\n25g chopped dark chocolate\r\n\r\nfew mini white chocolate buttons', 'Whip the double cream until it holds its shape then set aside until needed.\r\n\r\nPut the milk in a small saucepan and heat gently until simmering. Add the milk chocolate and dark chocolate, then stir until melted. Pour into a mug and top with a dollop of the double cream and scatter over a few mini white chocolate buttons to decorate.', 1, 1, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe/recipe-image/2017/10/triple-choc-hot-chocolate.jpg?itok=f8PCJfd_', 'small saucepan\r\nmug \r\nmicrowave', 5, 1, 'Take a hot mug of cocoa to the heights of luxury with this super decadent recipe that combines double cream and whole milk with three types of chocolate', ''),
(6785, 'Cappuccino', 7, 6, '18g ground espresso (or 1 espresso pod)\r\n150ml milk\r\n\r\nTo serve\r\ncocoa powder (optional)\r\nYou will also need\r\nthe right cup, 200-250ml capacity', 'Make around 35ml espresso using a coffee machine and pour it into the base of your cup.\r\n\r\nSteam the milk with the steamer attachment so that it has around 4-6cm of foam on top. Hold the jug so that the spout is about 3-4cm above the cup and pour the milk in steadily. As the volume within the cup increases, bring the jug as close to the surface of the drink as possible whilst aiming to pour into the centre. Once the milk jug is almost touching the surface of the coffee, tilt the jug to speed up the rate of pour. As you accelerate, the milk will hit the back of the cup and start naturally folding in on itself to create a pattern on the top. Dust the surface with a little cocoa powder if you like.', 1, 3, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe/recipe-image/2018/03/cappucino.jpg?itok=fkRSpWgc', 'coffee machine\r\ncup\r\njug\r\n', 3, 1, 'Make your favourite morning coffee from scratch – it''s easy with the right equipment. We love a creamy cappuccino topped with a sprinkling of cocoa powder', ''),
(6786, 'Rosé punch', 7, 6, '1 orange\r\n\r\n1 lemon\r\n\r\n300g punnet strawberries, hulled and halved\r\n1 tbsp honey\r\n\r\n750ml rosé wine\r\n250ml dry fino sherry\r\nice', 'Chop the unpeeled orange and lemon into chunks and put them in a very large bowl. Add all of the other ingredients and plenty of ice. Stir really well to mix all of the flavours together. Ladle into glasses.', 1, 4, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe/recipe-image/2017/08/rose-punch.jpg?itok=hTowbgfu', 'large bowl\r\nglasses.', 5, 6, 'Serve this super simple punch with plenty of ice at a picnic or barbecue. The combination of rosé, sherry, fruit and honey is a perfect taste of summer', ''),
(6787, 'Apple berry mulled wine', 7, 16, '2 x 75cl bottles red wine (such as Merlot; better quality wine makes all the difference)\r\n1l good-quality cloudy apple juice\r\n115g caster sugar\r\n1 long cinnamon stick, snapped in half\r\n2 star anise\r\n\r\n3 tbsp orange Curaçao or Cointreau\r\na handful or so (about 100g/4oz) frozen mulled fruit or fruits of the forest or Black Forest fruits\r\n3 small red-skinned apples\r\n\r\n, sliced into rings', 'Pour the wine and apple juice into a large saucepan and add the sugar, cinnamon stick and star anise. Heat gently, stirring once or twice, until the sugar has dissolved, then continue heating gently for another 15 minutes.\r\n\r\nJust before serving, swirl in the Curaçao or Cointreau, throw in the frozen fruits and add the apple slices.', 1, 5, 'https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/user-collections/my-colelction-image/2015/12/recipe-image-legacy-id--1268_12.jpg?itok=wqiydMWR', 'large saucepan\r\n Curaçao or Cointreau', 30, 12, 'This mulled wine recipe is packed with cinnamon and berry flavours - a real winter warmer', ''),
(6788, 'sdfsd', 1, 1, 'dsfsdf', 'sdfsdf', 1, 1, 'https://www.theleangreenbean.com/wp-content/uploads/2015/07/foodprep1.jpg', 'dssdfd', 12, 3, 'sdfsdf', 'https://www.youtube.com/watch?v=6qpqaIaVcQU'),
(6789, 'xzczx', 1, 1, 'cxzczx', 'xczxc', 1, 1, 'https://dingo.care2.com/pictures/greenliving/1190/1189535.large.jpg', 'xczxc', 56, 8, 'fghgh', 'https://www.youtube.com/embed/KCiuvvyMstA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`, `email`) VALUES
('Ameer', '12345678', 'lovecooking122@gmail.com'),
('Ameera', '12345678', 'lovecooking155@gmail.com'),
('Eve', '321654', 'eve3@gmail.com'),
('Eyal', '74185296', 'eyal7@hotmail.co.il'),
('Liran', '963963', 'liran9@walla.co.il'),
('Luzan', '12345678', 'lovecooking1888@gmail.com'),
('Luzanzedan', '123luzan', 'luzanz24@gmail.com'),
('Mor', '548721', 'Mor5@hotmail.com'),
('Nir', '654987', 'nir6@walla.com'),
('Yossi', '55555', 'yossi5@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`recipe_type`) REFERENCES `recipe_types` (`recipe_type_id`),
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`kitchen_type`) REFERENCES `kitchen_types` (`kitchen_type_id`),
  ADD CONSTRAINT `recipes_ibfk_3` FOREIGN KEY (`chef_id`) REFERENCES `chefs` (`chef_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
