CREATE database rentro_db; 

CREATE TABLE rentro_accounts(
    accountID varchar(255) NOT NULL, 
    accountFN varchar(255) NOT NULL,
    accountLN varchar(255) NOT NULL,
    accountEM varchar(255) NOT NULL, 
    accountPN varchar(255) NOT NULL, 
    accountPW varchar(128) NOT NULL, 
    accountPN varchar(128) NOT NULL
); 

CREATE TABLE rentro_products_review(
   accountID varchar(255) NOT NULL, 
   productID varchar(255) NOT NULL,
   productName varchar(255) NOT NULL, 
   productDesc text(8000) NOT NULL, 
   productRP int(255) NOT NULL, 
   productLS int(255) NOT NULL, 
   productTN varchar(255),
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 

CREATE TABLE rentro_products_saved(
   accountID varchar(255) NOT NULL, 
   productID varchar(255) NOT NULL,
   productName varchar(255) NOT NULL, 
   productDesc text(8000) NOT NULL, 
   productRP int(255) NOT NULL, 
   productLS int(255) NOT NULL, 
   productTN varchar(255),  
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 


CREATE TABLE rentro_products(
   accountID varchar(255) NOT NULL, 
   productID varchar(255) NOT NULL,
   productName varchar(255) NOT NULL, 
   productDesc text(8000) NOT NULL, 
   productRP int(255) NOT NULL, 
   productLS int(255) NOT NULL, 
   productTN varchar(255),
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
); 

CREATE TABLE rentro_products_images(
   productID varchar(255) NOT NULL,
   imageSrc varchar(255) NOT NULL 
); 


CREATE TABLE rentro_orders(
    orderID varchar(255) NOT NULL,
    productID varchar(255) NOT NULL, 
    buyerID varchar(255) NOT NULL, 
    buyerADDR text(8000) NOT NULL
);


