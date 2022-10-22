# CODE DOCUMENTATION

# ROUTE and CONTROLLER
The request of GET /products is handled by the index method in ProductAPIController, that is only responsible for handlig the HTTP request

# Service Class
 I created a Service class to handle the logic behind the request, in this case to fetch the data, and check for discounts.

# Repository and Model
I've putted the dataset in a colletion becasue it would be quicker for me than putting in a DB and I think you are not trying to evaulate the connection to database.
First, if the user have filters we will do a query to only fetch those results, so we don't load all the data if we don't need.
Then I add the extra price fields and create a collection with all the Products Model (in theroy the repository should only handle DB queries and not create the object here, but since I have not created a database I did it here)

# Discounts
In the Product Service Class, after fetching the data I check for all discounts that may be applied to the products.

For the Discounts I created a seperated Class where we have a method with the list of all discounts that might be applied.

The business logic behind those discounts are then in the their own methods so we can create the methods for all the discounts we might need.

all the result are then return in json by the controller.

# api-requirements

## Description
We want you to implement a REST API endpoint that given a list of products, applies some
discounts to them and can be filtered.
You are free to choose whatever language and tools you are most comfortable with, but, we value you to use laravel since our main platform is also on laravel / php.
We will value your ability to apply the following rules on the corresponding layers following Domain Driven Design. 
Please add instructions on how to run it and publish it on your fork.

## Deliverable 

Fork the project, work on the solution and send us back a link to your forked GitHub project to examine your answer to this test.

## Conditions 


The prices are integers for example, 100.00€ would be 10000.
  
1. [x] You can store the products as you see fit (json file, in memory, rdbms of choice)
2. [x] Products in the "insurance" category have a 30% discount.
3. [x] The product with sku = 000003 has a 15% discount.
4. [x] Provide a single endpoint. GET /products.
5. [x] Can be filtered by category as a query string parameter.
6. [x] (optional) Can be filtered by price as a query string parameter, this filter applies before discounts are applied.
7. [x] Returns a list of Products with the given discounts applied when necessary Product model.
8. [x] price.currency is always EUR.
9. [x] When a product does not have a discount, price.final and price.original should be the same number and discount_percentage should be null.
10. [x] When a product has a discount, price.original is the original price, price.final is the amount with the discount applied and discount_percentage represents the applied discount with the % sign.

Example product with a discount of 30% applied:  
`    {
      "sku": "000001",
      "name": "Full coverage insurance",
      "category": "insurance",
      "price": {
          "original": 89000,
          "final": 62300,
          "discount_percentage": "30%",
          "currency": "EUR"
      }
    }`
  
  Example product without a discount:
  
      `{
        "sku": "000002",
        "name": "Compact Car X3",
        "category": "vehicle",
        "price": {
            "original": 89000,
            "final": 89000,
            "discount_percentage": null,
            "currency": "EUR"
        }
      }`
      
## Dataset.       
The following dataset is the only dataset you need to be able to serve on the API: 

`{
    "products": [
      {
        "sku": "000001",
        "name": "Full coverage insurance",
        "category": "insurance",
        "price": 89000
      },
      {
        "sku": "000002",
        "name": "Compact Car X3",
        "category": "vehicle",
        "price": 99000
      },
      {
        "sku": "000003",
        "name": "SUV Vehicle, high end",
        "category": "vehicle",
        "price": 150000
      },
      {
        "sku": "000004",
        "name": "Basic coverage",
        "category": "insurance",
        "price": 20000
      },
      {
        "sku": "000005",
        "name": "Convertible X2, Electric",
        "category": "vehicle",
        "price": 250000
      }
    ]
  }`
