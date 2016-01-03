CREATE TABLE IF NOT EXISTS `Caranille_Accounts` 
(
  `Account_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Account_Pseudo` varchar(50) NOT NULL,
  `Account_Email` varchar(50) NOT NULL,
  `Account_Password` varchar(255) NOT NULL,
  `Account_Access` int(11) NOT NULL,
  `Account_Last_Connection` datetime NOT NULL,
  `Account_Last_IP` varchar(50) NOT NULL,
  `Account_Status` int(11) NOT NULL,
  `Account_Reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Battles_List` 
(
  `Battle_List_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Battle_List_Character_ID` int(11) NOT NULL,
  `Battle_List_Chapter_ID` int(11) NOT NULL,
  `Battle_List_Mission_ID` int(11) NOT NULL,
  `Battle_List_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Battles_Monsters` 
(
  `Battle_Monster_Battle_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Battle_Monster_Monster_ID` int(11) NOT NULL,
  `Battle_Monster_Monster_Picture` text NOT NULL,
  `Battle_Monster_Monster_Name` varchar(30) NOT NULL,
  `Battle_Monster_Monster_Description` text NOT NULL,
  `Battle_Monster_Monster_Level` int(11) NOT NULL,
  `Battle_Monster_Monster_HP` int(11) NOT NULL,
  `Battle_Monster_Monster_MP` int(11) NOT NULL,
  `Battle_Monster_Monster_Strength` int(11) NOT NULL,
  `Battle_Monster_Monster_Magic` int(11) NOT NULL,
  `Battle_Monster_Monster_Agility` int(11) NOT NULL,
  `Battle_Monster_Monster_Defense` int(11) NOT NULL,
  `Battle_Monster_Monster_Experience` int(11) NOT NULL,
  `Battle_Monster_Monster_Gold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Chapters` 
(
  `Chapter_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Chapter_Number` int(5) NOT NULL,
  `Chapter_Name` varchar(30) NOT NULL,
  `Chapter_Opening` text NOT NULL,
  `Chapter_Ending` text NOT NULL,
  `Chapter_Defeate` text NOT NULL,
  `Chapter_Monster` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Characters` 
(
  `Character_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Character_Account_ID` int(11) NOT NULL,
  `Character_Picture` text NOT NULL,
  `Character_Last_Name` varchar(30) NOT NULL,
  `Character_First_Name` varchar(30) NOT NULL,
  `Character_Level` int(11) NOT NULL,
  `Character_HP_Current` int(11) NOT NULL,
  `Character_HP_Level` int(11) NOT NULL,
  `Character_HP_SP` int(11) NOT NULL,
  `Character_HP_Equipment` int(11) NOT NULL,
  `Character_HP_Parchment` int(11) NOT NULL,
  `Character_HP_Total` int(11) NOT NULL,
  `Character_MP_Current` int(11) NOT NULL,
  `Character_MP_Level` int(11) NOT NULL,
  `Character_MP_SP` int(11) NOT NULL,
  `Character_MP_Equipment` int(11) NOT NULL,
  `Character_MP_Parchment` int(11) NOT NULL,
  `Character_MP_Total` int(11) NOT NULL,
  `Character_Strength_Level` int(11) NOT NULL,
  `Character_Strength_SP` int(11) NOT NULL,
  `Character_Strength_Equipment` int(11) NOT NULL,
  `Character_Strength_Parchment` int(11) NOT NULL,
  `Character_Strength_Total` int(11) NOT NULL,
  `Character_Magic_Level` int(11) NOT NULL,
  `Character_Magic_SP` int(11) NOT NULL,
  `Character_Magic_Equipment` int(11) NOT NULL,
  `Character_Magic_Parchment` int(11) NOT NULL,
  `Character_Magic_Total` int(11) NOT NULL,
  `Character_Agility_Level` int(11) NOT NULL,
  `Character_Agility_SP` int(11) NOT NULL,
  `Character_Agility_Equipment` int(11) NOT NULL,
  `Character_Agility_Parchment` int(11) NOT NULL,
  `Character_Agility_Total` int(11) NOT NULL,
  `Character_Defense_Level` int(11) NOT NULL,
  `Character_Defense_SP` int(11) NOT NULL,
  `Character_Defense_Equipment` int(11) NOT NULL,
  `Character_Defense_Parchment` int(11) NOT NULL,
  `Character_Defense_Total` int(11) NOT NULL,
  `Character_Wisdom_Level` int(11) NOT NULL,
  `Character_Wisdom_SP` int(11) NOT NULL,
  `Character_Wisdom_Equipment` int(11) NOT NULL,
  `Character_Wisdom_Parchment` int(11) NOT NULL,
  `Character_Wisdom_Total` int(11) NOT NULL,
  `Character_Experience` bigint(255) NOT NULL,
  `Character_Skill_Point` bigint(255) NOT NULL,
  `Character_Gold` int(11) NOT NULL,
  `Character_Town_ID` int(11) NOT NULL,
  `Character_Chapter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Chat` 
(
  `Chat_Message_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Chat_Character_ID` int(5) NOT NULL,
  `Chat_Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Configuration` 
(
  `Configuration_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Configuration_RPG_Name` varchar(30) NOT NULL,
  `Configuration_Presentation` text NOT NULL,
  `Configuration_Access` varchar(10) NOT NULL,
  `Configuration_Skill_Point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Equipments` 
(
  `Equipment_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Equipment_Picture` text NOT NULL,
  `Equipment_Type` varchar(30) NOT NULL,
  `Equipment_Level_Required` int(11) NOT NULL,
  `Equipment_Name` varchar(30) NOT NULL,
  `Equipment_Description` text NOT NULL,
  `Equipment_HP_Effect` int(11) NOT NULL,
  `Equipment_MP_Effect` int(11) NOT NULL,
  `Equipment_Strength_Effect` int(11) NOT NULL,
  `Equipment_Magic_Effect` int(11) NOT NULL,
  `Equipment_Agility_Effect` int(11) NOT NULL,
  `Equipment_Defense_Effect` int(11) NOT NULL,
  `Equipment_Sagesse_Effect` int(11) NOT NULL,
  `Equipment_Purchase_Price` int(11) NOT NULL,
  `Equipment_Sale_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Inventory_Equipments` 
(
  `Inventory_Equipment_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Inventory_Equipment_Character_ID` int(5) NOT NULL,
  `Inventory_Equipment_Equipment_ID` int(5) NOT NULL,
  `Inventory_Equipment_Quantity` int(5) NOT NULL,
  `Inventory_Equipment_Equipped` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Inventory_Invocations` 
(
  `Inventory_Invocation_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Inventory_Invocation_Character_ID` int(11) NOT NULL,
  `Inventory_Invocation_Invocation_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Inventory_Items` 
(
  `Inventory_Item_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Inventory_Item_Character_ID` int(11) NOT NULL,
  `Inventory_Item_Item_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Inventory_Magics` 
(
  `Inventory_Magic_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Inventory_Magic_Character_ID` int(11) NOT NULL,
  `Inventory_Magic_Magic_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Invocations` 
(
  `Invocation_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Invocation_Image` text NOT NULL,
  `Invocation_Name` varchar(30) NOT NULL,
  `Invocation_Description` text NOT NULL,
  `Invocation_Damage` int(11) NOT NULL,
  `Invocation_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Items` 
(
  `Item_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Item_Picture` text NOT NULL,
  `Item_Type` varchar(30) NOT NULL,
  `Item_Level_Required` int(11) NOT NULL,
  `Item_Name` varchar(30) NOT NULL,
  `Item_Description` text NOT NULL,
  `Item_HP_Effect` int(11) NOT NULL,
  `Item_MP_Effect` int(11) NOT NULL,
  `Item_Strength_Effect` int(11) NOT NULL,
  `Item_Magic_Effect` int(11) NOT NULL,
  `Item_Agility_Effect` int(11) NOT NULL,
  `Item_Defense_Effect` int(11) NOT NULL,
  `Item_Sagesse_Effect` int(11) NOT NULL,
  `Item_Purchase_Price` int(11) NOT NULL,
  `Item_Sale_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Levels` 
(
  `Level_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Level_Number` int(11) NOT NULL,
  `Level_Experience` bigint(255) NOT NULL,
  `Level_HP` int(11) NOT NULL,
  `Level_MP` int(11) NOT NULL,
  `Level_Strength` int(11) NOT NULL,
  `Level_Magic` int(11) NOT NULL,
  `Level_Agility` int(11) NOT NULL,
  `Level_Defense` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Magics` 
(
  `Magic_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Magic_Picture` text NOT NULL,
  `Magic_Name` varchar(30) NOT NULL,
  `Magic_Description` text NOT NULL,
  `Magic_Type` varchar(30) NOT NULL,
  `Magic_Effect` int(11) NOT NULL,
  `Magic_MP_Cost` int(11) NOT NULL,
  `Magic_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Missions` 
(
  `Mission_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Mission_Town` int(5) NOT NULL,
  `Mission_Number` int(5) NOT NULL,
  `Mission_Name` varchar(30) NOT NULL,
  `Mission_Introduction` text NOT NULL,
  `Mission_Victory` text NOT NULL,
  `Mission_Defeate` text NOT NULL,
  `Mission_Monster` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Missions_Successful` 
(
  `Mission_Successful_Mission_ID` INT NOT NULL PRIMARY KEY,
  `Mission_Successful_Character_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Monsters` 
(
  `Monster_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Monster_Picture` text NOT NULL,
  `Monster_Name` varchar(30) NOT NULL,
  `Monster_Description` text NOT NULL,
  `Monster_Level` int(11) NOT NULL,
  `Monster_HP` int(11) NOT NULL,
  `Monster_MP` int(11) NOT NULL,
  `Monster_Strength` int(11) NOT NULL,
  `Monster_Magic` int(11) NOT NULL,
  `Monster_Agility` int(11) NOT NULL,
  `Monster_Defense` int(11) NOT NULL,
  `Monster_Experience` int(11) NOT NULL,
  `Monster_Gold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Monsters_Drops`
(
  `Monster_Drop_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Monster_Drop_Monster_ID` int(11) NOT NULL,
  `Monster_Drop_Item_ID` int(11) NOT NULL,
  `Monster_Drop_Luck` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_News` 
(
  `News_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `News_Title` varchar(30) NOT NULL,
  `News_Message` text NOT NULL,
  `News_Account_Pseudo` varchar(15) NOT NULL,
  `News_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Private_Messages` 
(
  `Private_Message_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Private_Message_Transmitter` int(5) NOT NULL,
  `Private_Message_Receiver` int(5) NOT NULL,
  `Private_Message_Subject` text NOT NULL,
  `Private_Message_Message` text NOT NULL,
  `Private_Message_Parent_ID` int(11) NOT NULL,
  `Private_Message_Lu` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Towns` 
(
  `Town_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Town_Picture` text NOT NULL,
  `Town_Name` varchar(30) NOT NULL,
  `Town_Description` text NOT NULL,
  `Town_Price_INN` int(10) NOT NULL,
  `Town_Chapter` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Towns_Equipments` 
(
  `Town_Equipment_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Town_Equipment_Equipment_ID` int(11) NOT NULL,
  `Town_Equipment_Town_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Towns_Invocations` 
(
  `Town_Invocation_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Town_Invocation_Invocation_ID` int(11) NOT NULL,
  `Town_Invocation_Town_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Towns_Items` 
(
  `Town_Item_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Town_Item_Item_ID` int(11) NOT NULL,
  `Town_Item_Town_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Towns_Magics` 
(
  `Town_Magic_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Town_Magic_Magic_ID` int(11) NOT NULL,
  `Town_Magic_Town_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Towns_Monsters` 
(
  `Town_Monster_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Town_Monster_Monster_ID` int(11) NOT NULL,
  `Town_Monster_Town_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Caranille_Warnings` 
(
  `Warning_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Warning_Type` varchar(15) NOT NULL,
  `Warning_Message` text NOT NULL,
  `Warning_Transmitter` int(11) NOT NULL,
  `Warning_Receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;