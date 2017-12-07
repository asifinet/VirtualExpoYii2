Virtual Exposition Web application.

The major goal of the project is to deliver a web application, allowing companies to book their place in virtual expositions in different exposition events. Fully Featured FrontEnd Application as well as Backend Managment system.

Functional Description

Companies will choose from available events the one they want to take place in, then they will choose their stand within the exposition hall from a map and finally they will receive a report about the users who visited their stand on the event after it is over.

The home screen displays a map with different event places highlighted on it.
Selecting an event on the map displays the event details (name, location, event dates) right below the map and the “Book your place” button become active.
Clicking “Book your place” will take the user to the exposition hall map, it is a virtual map for the exposition hall with different stands, which he can navigate through it and book his stand.
Booked stands is highlighted as booked, the logo of the booking company will be displayed on top of the stand, below it the marketing documents (could be downloaded) and the contact details.
Free stands is highlighted as free, and on top of it the price.
The user can select any empty stand to book; clicking on an empty stand shows a popup with details of the stand, a real image of it and a “Reserve” button.
Clicking on reserve takes the user to the registration page where he supposed to provide: contact details, upload marketing documents, company admin and company logo.
Clicking on “Confirm Reservation” reserves the stand for the user, takes him to the exposition hall screen viewing the booked stand with the user’s company details on it.
Finally the company admin receives a report by mail about the users of the stand after the event is over.
Technology Used/Features of web app.

Cross platform works on Laptop/PC also works on mobile devices,responsive design.

Apache server v2.4.23 PHP v5.6.25 mysql v5.7.14 yi2 framework v2.0.6 html5/dhtml, JQUERY
Bootstrap 3.0 Angular JS V1.5.8 Google Map API RESTfull API JSON

Browser Support IE,Chrome,Firefox. Devices supported IOS,Android,Windows PCs/Laptop.

Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
