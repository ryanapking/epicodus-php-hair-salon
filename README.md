# _Hair Salon

#### _App that uses a database to track stylists and their clients. 9/13/2016_

#### By _**Ryan Apking**_

## Description

_An application for tracking stylists and their clients. Stylists are all displayed on a main page. Clicking on a stylist name brings up a list of that stylist's clients and an option to add a new client._

## Specifications

_Spec 1: Stylists can be saved to the database._
* _Input: Save new Stylist "Rebecca"_
* _Output: Database stylists table now includes "Rebecca" with a unique ID_

_Spec 2: Stylist names can be retrieved._
* _Input: Get name_
* _Output: "Rebecca"_

_Spec 3: Stylist IDs can be retrieved._
* _Input: Get ID
* _Output: 7_

_Spec 4: Stylist names can be changed._
* _Input: Change Stylist Rebecca's name to "Rebeca"_
* _Output: Object's name now set to "Rebeca"_

_Spec 5: All stylists in the database can be deleted._
* _Input: Delete all stylists_
* _Output: Database stylists table now empty_

_Spec 6: All stylists can be retrieved as Stylist objects._
* _Input: Get all stylists_
* _Output: An array of all stylists currently saved to the database_

_Spec 7: Individual stylists can be found by ID._
* _Input: Find stylist 6_
* _Output: "Rebecca"_

_Spec 8: Individual stylists can be deleted from the database._
* _Input: Delete "Rebecca"_
* _Output: Database stylists table no longer includes Stylist "Rebecca"_

_Spec 9: Stylist objects can be updated in the date base._
* _Input: Update_
* _Output: Stylist's database entry has been updated with all changes_



_Spec 10: Clients can be saved to the database._
* _Input: Save new Client "Frank"_
* _Output: Database stylists table now includes "Frank"_

_Spec 11: Client names can be retrieved._
* _Input: Get name_
* _Output: "Frank"_

_Spec 12: Client names can be changed._
* _Input: Change Client Frank's name to "Frankie"_
* _Output: Client's name now set to "Frankie"_

_Spec 13: A client's stylist ID can be retrieved._
* _Input: Get ID_
* _Output: 5_

_Spec 14: A Client's stylist ID can be changed._
* _Input: Set stylist id to 7_
* _Output: Client's stylist ID now set to 7_

_Spec 15: Client objects can be updated in the date base._
* _Input: Update_
* _Output: Client's database entry has been updated with all changes_

_Spec 16: All Clients in the database can be deleted._
* _Input: Delete all clients_
* _Output: Database clients table now empty_

_Spec 17: All clients can be retrieved as Client objects._
* _Input: Get all clients_
* _Output: An array of all clients currently saved to the database_

_Spec 18: Individual clients can be found by ID._
* _Input: Find client 3_
* _Output: "Frank"_

_Spec 19: Individual clients can be deleted from the database._
* _Input: Delete "Frank"_
* _Output: Database clients table no longer includes Client "Frank"_

_Spec 20: A list of clients can be found by Stylist ID._
* _Input: Find all clients of stylist 4._
* _Return: Client "Frank" and Client "Jill"_

_Spec 21: A stylist's name can be returned from the client._
* _Input: Get name of Jill's stylist_
* _Output: "Anne"_

## Setup/Installation Requirements

_Dependencies: Silex, Twig, PHPUnit_

* _Clone repository from github_
* _While in the project directory, run 'composer install' in the terminal._
* _Start a local server with the web directory as the root._
* _Navigate to localhost in browser window._

## Known Bugs

_None_

## Support and contact details

_Contact me via email with any issues_

## Technologies Used

_HTML, PHP, Silex, Twig_

### License

*This program is licensed under the MIT license.*

Copyright (c) 2016 **_Ryan Apking_**
