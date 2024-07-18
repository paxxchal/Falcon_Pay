# Falcon Pay

## Introduction

![Falcon Pay](https://falconpay.kriativetec.com/assets/logo.png)

Falcon Pay is a cutting-edge financial application developed to address the challenges of making payments and managing multiple currencies in Nigeria. Our goal is to provide an intuitive, user-friendly platform that simplifies financial transactions and improves the overall payment experience.

Explore Falcon Pay at [Falcon Pay](https://falconpay.kriativetec.com/).

Read our final project blog article: [Introducing Falcon Pay: Simplifying Financial Transactions in Nigeria](https://www.linkedin.com/pulse/introducing-falcon-pay-simplifying-financial-nigeria-paschal-nnamani-gnvic).

### Authors

- Paschal Nnamani - [LinkedIn](https://www.linkedin.com/in/paschalnnamani/)
- Nwakego Obagha - [LinkedIn](https://www.linkedin.com/in/nwakego-obagha-5b34282b6/)

## Inspiration

My journey with Falcon Pay began earlier this year when I was eager to work on a digital product independently. I had written down several project ideas, constantly searching for real-world problems that needed solving. One issue that stood out was the inefficiency of payment systems in Nigeria. 

Often, I found myself queuing in stores or waiting for cashiers to confirm my payments. Additionally, managing multiple apps for different currencies (USD, Naira, and crypto) was cumbersome. This experience motivated me to create Falcon Pay, a solution designed to streamline payments and currency management in Nigeria. Although the MVP stage doesn't solve all these problems, the main aim is to achieve an easy-to-use interface before expanding the feature set. Transitioning from a UI/UX designer to a full-stack developer, this project represents my dedication to solving real-world problems through technology.

## Timeline and Team Members

- **Paschal Nnamani** - Fullstack Developer
- **Nwakego Obagha** - Project Manager

## Target Audience

Falcon Pay is designed for Nigerian users who need a seamless way to manage multiple currencies and make payments without the hassle of using multiple apps.

## Personal Focus

My primary focus was on developing the backend system, user authentication, and ensuring a smooth user interface that simplifies the user experience.

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


## Accomplishments

### Features

1. **User Authentication:** Implemented secure user authentication with sessions and proper data validation.
2. **Beneficiary Management:** Users can manage and transact with saved beneficiaries.
3. **Intuitive Dashboard:** A user-friendly dashboard that simplifies the management of transactions and account settings.

### Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript
  - We chose to use plain HTML, CSS, and JavaScript to focus on building a solid foundation and understanding the core technologies.
- **Backend:** PHP
  - PHP was selected for its elegant syntax and robust features, which helped streamline the development process.
- **Database:** MySQL
  - MySQL was used for its reliability and performance, ensuring smooth data management.
- **Version Control:** Git, GitHub
  - We used Git and GitHub for version control and collaboration, allowing us to manage changes efficiently and work together seamlessly.

## Technical Challenges

### Most Difficult Technical Challenge

One of the most significant challenges was understanding sessions and implementing user authentication during login and registration, especially while learning PHP.

**Situation:** Early in the development process, I decided to implement a secure user authentication system to manage user sessions effectively.

**Task:** The task was to create a robust authentication system that would securely handle user login and registration, ensuring data integrity and security.

**Action:** I started by researching various authentication methods and chose to implement sessions in PHP. This involved learning about PHP session management, secure data handling, and integrating these concepts into the Laravel framework. I encountered several hurdles, such as session timeout issues and data validation errors. To overcome these, I reached out to online communities, consulted documentation, and experimented with different solutions.

**Result:** After numerous iterations and extensive testing, I successfully implemented a secure authentication system. This not only enhanced the security of the application but also provided a seamless user experience during login and registration. This experience taught me the importance of perseverance and the value of reaching out for help when faced with complex technical challenges.

## Lessons Learned

- **Technical Takeaways:** Gained a deep understanding of session management and user authentication in PHP.
- **Collaboration:** Realized the value of working with others and how collaborative problem-solving can lead to better solutions.
- **Self-Discovery:** Learned that I can overcome any technical issue if I persevere and remain confident in my abilities.
- **Future Engineering Path:** This project reinforced my interest in solving real-world problems through technology, showing me that I am more driven by creating impactful solutions than merely meeting deadlines.
- **Beliefs Confirmed:** Emacs and Vim are indeed challenging, and I prefer using more user-friendly tools like VSCode for development.

## About Me

I'm a passionate tech optimist who loves creating solutions for my immediate society. As an entrepreneur by nature, I enjoy tackling real-world problems and turning ideas into functional applications.

- [GitHub Repository](https://github.com/paxxchal/Falcon_Pay)
- [Deployed Project](https://falconpay.kriativetec.com/)
- [Project Landing Page](https://paschalgabrielacj8.wixsite.com/falcon-pay)
- [LinkedIn](https://www.linkedin.com/in/paschalnnamani/)

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