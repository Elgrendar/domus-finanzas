# Domus Finanzas

> Domus Finanzas is a web application built with Laravel, designed to help manage household finances. This is a **free and non-profit** project, created as a development practice and ideal for those looking to learn and manage their finances in a simple and organized way.

This project is in **active development**, and suggestions and improvements are welcome. Feel free to try it out!

---

## 🌟 Main Features

- Dashboard with quick access to categories, incomes, and expenses.
- Full CRUD for Categories (typed as "income" or "expense").
- Active/inactive state control for categories.
- Custom color picker and icon assignment.
- Active category filtering for subcategories.
- Responsive design with adaptive sidebar.
- Success messages and form validation.
- Clean Bootstrap-based interface.
- Cash management and movement tracking (in progress).
- PDF report generation with DomPDF (in progress).
- Light/dark theme toggle accessible from the navigation bar (in progress).
- Full CRUD for Establishments with active/inactive control.
- Full CRUD for Payment Methods with validation and state control.
- Tag system for categories (planned).
- Data import/export system (planned).
- Authentication system (login/logout) (planned).

---

## 🧪 Features in development

- 📄 Show view for complete transaction details.
- 🔐 Authentication and roles system (login/logout).
- 🧮 Account management with balances and automatic calculation.
- 📊 Statistics and graphs panel.
- 🧾 PDF report generation with DomPDF.
- 🎨 Light/dark theme with navigation switch.

---

## 🔮 Upcoming improvements

- 🔁 Recurring transactions.
- 🏷️ Category tagging system.
- 📂 Data export and import.
- 🔍 Advanced filters by date, amount, etc.
- 🌐 Multi-user with access management and security.

---

## 🚀 Local Installation (in development)

1. Clone the repository:

   ```bash
   git clone https://github.com/Elgrendar/domus-finanzas.git
   cd domus-finanzas
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```

3. Create the `.env` file:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure your database in `.env`, then run:

   ```bash
   php artisan migrate
   php artisan serve
   ```

---

## 📈 Project Status

This project is under active development. Core features are being implemented progressively. The goal is to build a simple yet powerful tool for personal finance management.

Currently implemented:

- Management of categories, subcategories, establishments, and payment methods.
- Active/inactive status control on all main models.
- Form validation to ensure data integrity.
- Uniform and responsive Bootstrap-based design.
- Flash messages for success and error handling.

✨ Suggestions, corrections, or improvements are welcome. Feel free to open an issue and share your ideas.

---

## ✨ Contributions

Any suggestions, corrections, or improvements are welcome. You can open an issue to share your ideas or submit a pull request.

---

## 🔒 License

This project is licensed under the MIT License with the following additional condition:

Any redistribution of the code, partial or full, must include clear attribution to the original author: @Elgrendar. For more information about the author, visit www.rafacampanero.es.
