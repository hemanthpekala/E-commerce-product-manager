# E-Commerce Product Manager (ApexPlanet Internship)

This project is a secure, role-based web application for managing an e-commerce product catalog. It was built as the final project submission for the 45-day Web Development (PHP & MySQL) Internship at **ApexPlanet Software Pvt Ltd**.

The application provides a complete dashboard to perform all **CRUD (Create, Read, Update, Delete)** operations. It features a full user authentication system and is secured against common web vulnerabilities.

---

## ✅ Internship Tasks Fulfilled

This project successfully integrates all 5 tasks from the internship guide:

* [cite_start]**Task 1: Setting Up the Environment** [cite: 50]
    * Project developed on a local XAMPP server (Apache & MySQL).
    * [cite_start]Version controlled using Git and hosted on this GitHub repository[cite: 62].

* [cite_start]**Task 2: Basic CRUD Application** [cite: 52]
    * Full **CRUD** functionality: Admins can create, read, update, and delete products.
    * [cite_start]**User Authentication**: Secure user registration and login system[cite: 86].
    * [cite_start]**Password Hashing**: Passwords are securely hashed using `password_hash()`[cite: 98].
    * [cite_start]**Session Management**: `$_SESSION` is used to maintain user login states[cite: 99].

* **Task 3: Advanced Features Implementation**
    * [cite_start]**Search Functionality**: A search bar allows filtering products by name or description [cite: 112-114].
    * [cite_start]**Pagination**: The main product list is paginated to handle a large number of entries [cite: 115-116].
    * [cite_start]**UI Improvements**: The entire application is styled with **Bootstrap 5** for a responsive, modern user interface [cite: 119-121].

* **Task 4: Security Enhancements**
    * [cite_start]**Prepared Statements**: All SQL queries use **MySQLi prepared statements** to prevent SQL injection attacks[cite: 137].
    * [cite_start]**Form Validation**: Includes both client-side (`required`) and server-side (PHP) validation for all forms [cite: 139-140].
    * **Role-Based Access Control (RBAC)**:
        * `admin` role: Has full CRUD access.
        * [cite_start]`user` role: Has read-only access (cannot see "Add", "Edit", or "Delete" buttons) [cite: 141-143].

* **Task 5: Final Project and Certification**
    * [cite_start]All features are fully integrated, tested, and debugged into this single, cohesive application[cite: 150].

---

## 🛠️ Technologies Used

* **Backend:** PHP
* **Database:** MySQL
* **Frontend:** HTML5, CSS3, Bootstrap 5
* **Server:** XAMPP (Apache)
* **Version Control:** Git & GitHub