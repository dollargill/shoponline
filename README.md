
# ShopOnline Project

## Project Overview
The Shop Online Project is a web-based application that allows users to list items for auction, place bids, and purchase items outright through a "Buy It Now" option. The project is structured into several key components, including user login/registration, item listing, bidding, and maintenance functionalities. It utilizes a mix of HTML, CSS, JavaScript, PHP, and XML, with a focus on client-server interaction via Ajax. This README details the functionalities provided by each component and the project's structure.

### Detailed Component Descriptions

#### 1. Login/Registration
- **register.htm**: This interface facilitates user registration. It collects essential information such as name, date of birth, email, and password. The client-side validation ensures data integrity before submission, while server-side checks prevent duplicate email registrations. Successful registration redirects users to the login page.

#### 2. Listing
- **list_item.htm**: Sellers use this form to list items for auction. It captures item details, including name, category, description, and pricing (starting, reserve, and buy-it-now prices). The form validates inputs client-side and submits them to the server for addition to `auction.xml`.

#### 3. Bidding
- **bidding_interface.htm**: This page displays all items available for bidding, updating the list every 5 seconds to ensure real-time data accuracy. Users can place bids or opt for the "Buy It Now" feature. Actions on this page dynamically update `auction.xml` to reflect the current bidding status of each item.

#### 4. Maintenance
- **maintenance.htm**: Aimed at administrators, this page offers functionalities to process expired or sold auction items and generate performance reports. It supports operations like cleaning up old listings and calculating revenue from successful sales.

#### 5. Password Reset
- **forgot_password.htm** and **reset_password_ui.htm**: These pages guide users through the password reset process. After verifying their identity through email and date of birth, users can set a new password.

#### 6. XML Documents
- **customer.xml** and **auction.xml**: These XML files act as the data backbone of the project, storing user and item data, respectively. They are manipulated programmatically to add, update, or query information.

## Submission Requirements
- Ensure proper placement of all files within the `Project2` directory structure.
- Submit the project as a ZIP file, including the `www` folder and its contents.

## Development Environment
- **Local Server**: XAMPP is required for development and testing.
- **Code Editing**: Use a text editor or IDE such as Visual Studio Code or Sublime Text.
- **Browser Testing**: Test the application in modern web browsers like Chrome or Firefox.

## Technologies Used
- HTML, CSS for structuring and styling.
- JavaScript for client-side scripting.
- PHP for server-side logic.
- XML for data storage.
- Ajax and XMLHttpRequest for asynchronous communication between client and server.
- DOM, XPath, and XSLT for XML manipulation.

## Project Goals
This project aims to assess the developer's ability to create a functional web application that simulates an online auction environment. It tests knowledge in web development fundamentals, client-server interaction, and data management practices.


© 2024 Dollar Karan Preet Singh. All rights reserved. COS80021-Web Application Development
