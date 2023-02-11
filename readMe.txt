Database Structure

Tables :
Product Table : ID,Product Name, Product Description, Product Category, Product Sub Category, Created At, Modified At, Status(Soft Delete)
Image List Table : ID, Product ID, Image Path, Status
Category Table : ID, Category Name, Status
Sub Category Table : ID, Category ID, SubCategory ID


// Sub Category Table
CREATE TABLE `product`.`product_sub_category` (
  `ID` INT NOT NULL,
  `category_ID` INT NOT NULL,
  `sub_category_name` VARCHAR(45) NOT NULL,
  `status` INT(1) NULL,
  `createdAt` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  INDEX `category_ID_idx` (`category_ID` ASC) VISIBLE,
  CONSTRAINT `category_ID`
    FOREIGN KEY (`category_ID`)
    REFERENCES `product`.`product_category` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

ALTER TABLE `product`.`product_sub_category` 
CHANGE COLUMN `ID` `ID` INT NOT NULL AUTO_INCREMENT ;

//Product Table
CREATE TABLE `product`.`product_details` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(45) NOT NULL,
  `product_desc` TEXT NOT NULL,
  `status` INT(1) NOT NULL,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`));

