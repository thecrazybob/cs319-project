![Health Center Light Logo](/public/img/logo.png#gh-light-mode-only)
![Health Center Dark Logo](/public/img/logo-dark.png#gh-dark-mode-only)

# About BilHeal

BilHeal is a proposed web app for Bilkent University's Health Center that aims to ease the interaction between patients and the health center's staff.

![Dashboard Screenshot](/public/img/dashboard.png)

## Table of contents

- [Live Demo](#demo)
- [Requirements](#requirements)
- [Installation](#installation)
- [Development Workflow](#development-workflow)
- [Packages Used](#packages-used)
- [Features](#features)
- [Team Members](#team-members)
- [Reports](#reports)

## Demo

The project is hosted live on https://www.bilheal.com

The develop branch is reflected on https://staging.bilheal.com

## Requirements

Before using this repository, make sure you have the following installed:
* PHP 8.1
* Composer 2
* A web server (NGINX/Apache)
* MySQL 8
* Node 17
* NPM 8

## Installation

Clone the GitHub repository:
```
git clone https://github.com/thecrazybob/cs319-project.git
```

Install Composer's dependencies:
```
composer install
```

Install NPM's dependencies:
```
npm install
```

Copy .env.example to .env:
```
cp .env.example .env
```

Generate encryption key:
```
php artisan key:generate
```

Next, create a database in your local MySQL and then fill the following values in .env
```
DB_DATABASE=cs319_project_app
DB_USERNAME=root
DB_PASSWORD=
```

Run the demo migrations & seeders:
```
php artisan migrate:fresh --seed
```

You should be able to see the website in your browser! 🥳

## Development Workflow

There are two essential branches on the repository. The `main` and `develop` branch.
* `main` branch reflects the production version of the website
* `develop` branch reflects the staging version of the website

The rest of the branches are created as part of feature development. A modified version of GitFlow pattern was used where every task/feature was separated into a branch and then merged into `develop` using a PR.

From the requirement analysis and design reports, a list of tasks were made on Linear. All of the tasks had a priority, category, difficulty level and an assignee. Linear automatically created a GitHub branch name for each task. Once the task was completed, a PR was created from the branch, reviewed by someone else from the team and merged into develop.

Once the `develop` branch is stable, it is merged into `main`.

## Packages Used

The following Composer packages were used during the development of the web app:

* filament/forms
* filament/tables
* graham-campbell/markdown
* kiritokatklian/nova-permission
* laravel/jetstream
* laravel/nova
* laravel/sanctum
* livewire/livewire
* spatie/laravel-ignition
* spatie/laravel-permission
* usernotnull/tall-toasts

All of them are available on https://packagist.org/

## Features
### Main Features:
* Authentication System
* Dashboard
* User roles (Doctors, Patients, Nurses, Receptionists)
* Appointment Scheduling Feature

### Patient Dashboard
* Initial registration form to obtain Medical History
* Patient Profile
	* Basic info (Name, Age, Date of Birth, Nationality)
	* Blood donation preference
* Patient's Tests
* Patient's Diagnosis
* Patient's Reports
* Patient’s Documents
* Patient’s Vaccines
* Previous Visits
* Messaging Feature
* Announcements / Notifications
* Blood Request
* Online Payment Feature
	* Patient’s Invoices
	* Patient’s Transactions

### Staff Dashboard (Doctors, Nurses, Receptionists)
* List of Doctors
* Doctor Schedules
* Create/edit/view reports
* Create/edit/view announcements
* Reply to messages
* View patient’s diagnosis

## Team Members
* Abdullah Riaz (22001296)
* Ahmet Faruk Ulutaş (21803717)
* Dilay Yiğit (21602059)
* Mohammed Sohail (22001513)
* Mostafa Khaled A. Mohamed Higazy (22001062)

## Reports

* [Requirement Analysis - Iteration 1](reports/ChickenNuggets_RequirementAnalysis_Iteration1.pdf)
* [Requirement Analysis - Iteration 2](reports/ChickenNuggets_RequirementAnalysis_Iteration2.pdf)
* [Design Report - Iteration 1](reports/ChickenNuggets_DesignReport_Iteration1.pdf)
* [Design Report - Iteration 2](reports/ChickenNuggets_DesignReport_Iteration2.pdf)
* [Final Report](reports/ChickenNuggets_FinalReport.pdf)
