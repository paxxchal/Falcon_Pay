# Falcon Pay

## Introduction

Falcon Pay is an innovative financial application designed to simplify payments in the Nigerian market. Our project aims to streamline the process of managing multiple currencies and making payments, offering an intuitive interface that enhances user experience.

Explore Falcon Pay at [Falcon Pay](https://falconpay.kriativetec.com/).

Read our final project blog article: [Introducing Falcon Pay: Simplifying Financial Transactions in Nigeria](https://www.linkedin.com/pulse/introducing-falcon-pay-simplifying-financial-nigeria-paschal-nnamani-gnvic).

### Authors

- Paschal Nnamani - [LinkedIn](https://www.linkedin.com/in/paschalnnamani/)

## Installation

To run Falcon Pay locally, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/paxxchal/Falcon_Pay.git
   cd Falcon_Pay
   ```

2. Set up your environment:

   - Install dependencies:
     ```bash
     composer install
     ```

   - Configure your database in the `.env` file:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=falcon_pay
     DB_USERNAME=root
     DB_PASSWORD=your_password
     ```

3. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

4. Start the development server:
   ```bash
   php artisan serve
   ```

5. Access the application in your browser:
   ```
   http://localhost:8000
   ```

## Usage

Falcon Pay offers a user-friendly platform for managing multiple currencies and making payments. The current features include:

- User registration and login
- Easy-to-use dashboard for managing transactions
- Beneficiary management


## Contributing

We welcome contributions to Falcon Pay! To contribute:

1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. Make your changes and commit them:
   ```bash
   git commit -m "Add your message here"
   ```
4. Push to your branch:
   ```bash
   git push origin feature/your-feature-name
   ```
5. Open a Pull Request and describe your changes.

For more details, please read our [contributing guidelines](CONTRIBUTING.md).

## Related Projects

Here are some related projects that might interest you:

- [Paystack](https://github.com/PaystackHQ/paystack-php)
- [Flutterwave](https://github.com/Flutterwave/Flutterwave-node)

## Licensing

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

---

Thank you for checking out Falcon Pay! If you have any questions or feedback, feel free to reach out to us on LinkedIn.