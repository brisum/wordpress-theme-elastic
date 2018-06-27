Feature: Create Order via CheckoutOneClick
    In order to buy products
    As a customer
    I need to be able to create order in one click

    @javascript
    Scenario: CheckoutOneClick with Simple product
        Given "simple" product with name "simple-product"
        Given Customer:
            | name  | phone         | email           |
            | test  | 093 610 67 14 | test.ci@dsrv.in |
        When I am on a page of product "simple-product"
        And press "Checkout 1 click" button on product page
        And wait for popup
        And fill form on CheckoutOneClick popup
        And press "Submit" button on CheckoutOneClick popup
        And get order ID from success message on CheckoutOneClick popup
        Then go to Order page on backend
        Then assert that product "simple-product" present in order items on Backend Order page

    @javascript
    Scenario: CheckoutOneClick with Variable product
        Given "variable" product with name "variable-product"
        Given Customer:
            | name  | phone         | email           |
            | test  | 093 610 67 14 | test.ci@dsrv.in |
        When I am on a page of product "variable-product"
        When Choose "1,34x0,80" for option "Габаритный размер"
        When Choose "1,95x1,30" for option "Спальное место"
        And press "Checkout 1 click" button on product page
        And wait for popup
        And fill form on CheckoutOneClick popup
        And press "Submit" button on CheckoutOneClick popup
        And get order ID from success message on CheckoutOneClick popup
        Then go to Order page on backend
        Then assert that product "variable-product" present in order items on Backend Order page
