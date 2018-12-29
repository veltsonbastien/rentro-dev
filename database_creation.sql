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

CREATE TABLE rentro_prdoucts(
   productID varchar(255) NOT NULL,
   ownerID varchar(255) NOT NULL
); 


CREATE TABLE rentro_orders(
    productID varchar(255) NOT NULL,
    ownerID varchar(255) NOT NULL, 
    buyerID varchar(255) NOT NULL, 
    orderID varchar(255) NOT NULL 
);


