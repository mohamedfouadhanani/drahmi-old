# Drahmi <!-- omit in toc -->

- [Description](#description)
- [Features](#features)
  - [Authentication, authorization \& account management](#authentication-authorization--account-management)
  - [Accounts management](#accounts-management)
  - [Targets management](#targets-management)
  - [Transactions management](#transactions-management)
- [Technologies](#technologies)
- [Implementation details](#implementation-details)

## Description

Drahmi is a user-friendly web-based budgeting application designed to empower individuals and households in their financial journey. With Drahmi, managing your accounts, setting and tracking financial targets, and handling transactions has never been easier. Whether you're a budgeting novice or a financial guru, Drahmi is here to streamline your financial management experience.

## Features

### Authentication, authorization & account management

Drahmi offers a comprehensive suite of essential user account management functions, including secure login, registration, email verification, and password reset capabilities. These features are thoughtfully designed to enhance the overall user experience and bolster account security within the platform.

### Accounts management

Drahmi's account management functionality provides users with the ability to create and manage accounts akin to those traditionally offered by financial institutions. This robust feature empowers users to establish a diversified financial portfolio within the platform, mirroring the versatility and convenience of traditional bank accounts. Users can configure these accounts to suit their specific financial needs, facilitating efficient tracking, categorization, and management of their assets, just as they would with traditional bank accounts.

### Targets management

Within Drahmi's intuitive platform, users can seamlessly set and manage financial targets, which act as predefined goals associated with specific accounts. These targets empower users to work towards achieving their financial aspirations, whether it's saving for a vacation, creating an emergency fund, or paying off debt.

### Transactions management

Drahmi's transaction management functionality offers users a comprehensive toolset to oversee various financial activities seamlessly. Transactions can encompass a wide range of financial actions, including income, expenses, and transfers between accounts. This feature mirrors the versatile nature of real-world financial transactions, enabling users to record, categorize, and track each financial event with precision.

## Technologies

-   Docker
-   Postgresql
-   Mailpit
-   PHP
-   Laravel
-   Laravel Sail
-   Laravel/Fortify
-   TailwindCSS

## Implementation details

-   [x] Implement the `Account.balance` method.
-   [x] Implement the `Target.is_reached` method.
-   [x] Extract the **UserController** from the **User** folder.
-   [x] Remove the `welcome.blade.php` template.
-   [x] Implement the `HOME` route.
-   [ ] Fix the bug when updating a resource ignore all unique columns.
-   [x] Fix the bug when viewing a resource it has to be owner.
-   [ ] Fix balance computing method.
-   [ ] Implement the user interface.
