-- Insert the following new client to the clients table (Note: The clientId and clientLevel fields should handle their own values and do not need to be part of this query.):
-- Tony, Stark, tony@starkent.com, Iam1ronM@n, "I am the real Ironman"
INSERT INTO clients (clientFirstname, clientLastName, clientEmail, clientPassword, clientLevel, comment) 
Values("Tony", "Stark", "tiny@starkent.com", "IamIronm@an", 1, "I am the real Ironman");


-- Modify the Tony Stark record to change the clientLevel to 3. The previous insert query will have to have been stored in the database for the update query to work.
UPDATE `clients` SET `clientLevel` = '3' WHERE `clients`.`clientld` = 1


-- Modify the "GM Hummer" record to read "spacious interior" rather than "small interior" using a single query. Explore the SQL Replace function. It needs to be part of an Update query as shown in the code examples of the SQL Reading - Read Ch. 1, section 3.
UPDATE `inventory` SET `invDescription` = 
'Do you have 6 kids and like to go off-roading? The Hummer gives you the spacious interior with an engine to get you out of any muddy or rocky situation.' 
WHERE `inventory`.`invId` = 12


-- Use an inner join to select the invModel field from the inventory table and the classificationName field from the carclassification table for inventory items that belong to the "SUV" category.
SELECT
    inv.invModel, cc.classificationName
FROM inventory inv
INNER JOIN carclassification cc ON inv.classificationId = cc.classificationId
WHERE cc.classificationName = 'SUV';


-- Delete the Jeep Wrangler from the database. [Note: You can restore the Inventory table by importing the SQL file that was used to create it again].
DELETE FROM inventory WHERE invModel = "Wrangler"; 


-- Update all records in the Inventory table to add "/phpmotors" to the beginning of the file path in the invImage and invThumbnail columns using a single query. These references may prove helpful
UPDATE inventory SET invImage = CONCAT("/phpmotors",invImage), invThumbnail = CONCAT("/phpmotors",invThumbnail);