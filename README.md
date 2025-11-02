# E-Commerce Product Manager (ApexPlanet Internship)

This project is a secure, role-based web application for managing an e-commerce product catalog. It was built as the final project submission for the 45-day Web Development (PHP & MySQL) Internship at **ApexPlanet Software Pvt Ltd**.

The application provides a complete dashboard to perform all **CRUD (Create, Read, Update, Delete)** operations. It features a full user authentication system and is secured against common web vulnerabilities.

---

## ✅ Internship Tasks Fulfilled

This project successfully integrates all 5 tasks from the internship guide:

* **Task 1: Setting Up the Environment** 
    * Project developed on a local XAMPP server (Apache & MySQL).
    * Version controlled using Git and hosted on this GitHub repository.

* **Task 2: Basic CRUD Application** 
    * Full **CRUD** functionality: Admins can create, read, update, and delete products.
    * **User Authentication**: Secure user registration and login system.
    * **Password Hashing**: Passwords are securely hashed using `password_hash()`.
    * **Session Management**: `$_SESSION` is used to maintain user login states.

* **Task 3: Advanced Features Implementation**
    * **Search Functionality**: A search bar allows filtering products by name or description .
    * **Pagination**: The main product list is paginated to handle a large number of entries .
    * **UI Improvements**: The entire application is styled with **Bootstrap 5** for a responsive, modern user interface .

* **Task 4: Security Enhancements**
    * **Prepared Statements**: All SQL queries use **MySQLi prepared statements** to prevent SQL injection attacks.
    * **Form Validation**: Includes both client-side (`required`) and server-side (PHP) validation for all forms .
    * **Role-Based Access Control (RBAC)**:
        * `admin` role: Has full CRUD access.
        * `user` role: Has read-only access (cannot see "Add", "Edit", or "Delete" buttons) .

* **Task 5: Final Project and Certification**
    * All features are fully integrated, tested, and debugged into this single, cohesive application.

---

## 🛠️ Technologies Used

* **Backend:** PHP
* **Database:** MySQL
* **Frontend:** HTML5, CSS3, Bootstrap 5
* **Server:** XAMPP (Apache)
* **Version Control:** Git & GitHub