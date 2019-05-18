CREATE TABLE foodStorage (
    Food_item       varchar(80),   
    category_Name   varchar(80),   -- stores the product category
    Description     varchar(80),   -- Describes the product
    food_Unit       varchar(80),   -- is a fruit or vegetable
    Count           int           
);
CREATE TABLE foodCategory (
    category_id     int,           -- it will give and id 
    category_Name   varchar(80)    -- stores the product category
);
CREATE TABLE measureUnit(
    measure_id       int,          -- it will give and id 
    food_Unit        varchar(80),  -- it will give a short of the measure unit
    Unit_Description varchar(80)   -- it will give the full measure Unit   
);

INSERT INTO foodcategory VALUES (1, 'Fruit');
INSERT INTO foodcategory VALUES (2, 'Vegetable');
INSERT INTO foodcategory VALUES (3, 'Bread');
INSERT INTO foodcategory VALUES (4, 'Produce');
INSERT INTO foodcategory VALUES (5, 'Dairy');
INSERT INTO foodcategory VALUES (6, 'Eggs');
INSERT INTO foodcategory VALUES (7, 'Meats');
INSERT INTO foodcategory VALUES (8, 'Pultry');
INSERT INTO foodcategory VALUES (9, 'Seafood');
INSERT INTO foodcategory VALUES (10, 'Condiments');
INSERT INTO foodcategory VALUES (11, 'Spices');
INSERT INTO foodcategory VALUES (12, 'can');
INSERT INTO measureunit  VALUES (1,  'gal',   'Gallon');
INSERT INTO measureunit  VALUES (2,  'qt',    'Quart');
INSERT INTO measureunit  VALUES (3,  'pt',    'Pint');
INSERT INTO measureunit  VALUES (4,  'cup',   'Cup');
INSERT INTO measureunit  VALUES (5,  'oz',    'Ounces');
INSERT INTO measureunit  VALUES (6,  'lb',    'Pounds');
INSERT INTO measureunit  VALUES (7,  'kl',    'Kilogram');
INSERT INTO measureunit  VALUES (8,  'fl oz', 'Fluid Ounce');
INSERT INTO measureunit  VALUES (9,  'l',     'Litre');
INSERT INTO measureunit  VALUES (10, 'g',     'Gram');
INSERT INTO measureunit  VALUES (11, 'mg',    'Milligram');
INSERT INTO foodstorage  VALUES ('can apple', 'Can', 'can of apples', 'g', 20);