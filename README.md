# 🧁 BakeLoaf

BakeLoaf is a full-stack web-based online bakery goods ordering system developed using **PHP**, **JavaScript**, and **MySQL**. It allows users to browse bakery items, place orders, and provides an admin panel for managing users, orders, and inventory.

---

## 🚀 Features

- 👥 User authentication (Sign Up / Sign In)
- 🛒 Product listing, cart, and checkout
- 🧾 Order confirmation and purchase history
- 📧 Feedback and contact form
- 📍 Location tracking via Google Maps
- 🛠️ Admin panel for product and user management
- 📦 Email integration for order updates

---

## 🧰 Technologies Used

| Layer         | Technologies                                 |
|---------------|----------------------------------------------|
| Frontend      | HTML5, CSS3, JavaScript                      |
| Backend       | PHP (Vanilla PHP, no framework)              |
| Database      | MySQL (Managed via HeidiSQL/phpMyAdmin)      |
| UI Framework  | Bootstrap                                    |
| Email Service | PHPMailer                                    |

---

## 💾 Database Structure

The database is exported as `bakeloaf.sql`.

### Main Tables:
- `users` – Stores customer and admin credentials.
- `products` – Bakery item details.
- `orders` – All order records.
- `feedback` – Customer feedback.
- `deliverers` – Delivery personnel details.
- `locations` – Customer locations for delivery.
- `history`, `cart`, etc. – Session and purchase data.

> 📂 You’ll find the exported SQL dump in `/database/bakeloaf.sql`

---

## 🤖 Key Functionalities

- Dynamic cart total update
- Spinner loading animations
- Form validation and alerts
- Order email notifications via PHPMailer
- Location tracking with Google Maps API

---

## 📄 License

This project is licensed under the **MIT License**.  
You are free to use, distribute, and modify with attribution.

