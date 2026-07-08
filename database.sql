-- AutoHub database

DROP DATABASE IF EXISTS autohub;
CREATE DATABASE autohub CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE autohub;

CREATE TABLE cars (
  id INT AUTO_INCREMENT PRIMARY KEY,
  make VARCHAR(60) NOT NULL,
  model VARCHAR(80) NOT NULL,
  year INT NOT NULL,
  price DECIMAL(12,2) NOT NULL,
  mileage INT NOT NULL,
  fuel VARCHAR(30) NOT NULL,
  transmission VARCHAR(30) NOT NULL,
  body_type VARCHAR(40) NOT NULL,
  image VARCHAR(120) NOT NULL,
  description TEXT NOT NULL,
  featured TINYINT(1) NOT NULL DEFAULT 0,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE enquiries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL,
  phone VARCHAR(40) NOT NULL,
  message TEXT NOT NULL,
  car_id INT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO cars (make, model, year, price, mileage, fuel, transmission, body_type, image, description, featured) VALUES
('Toyota','Axio',2018,1450000,65000,'Petrol','Automatic','Sedan','car1.jpg','A reliable, fuel-efficient sedan that is perfect for city driving and daily commutes.',1),
('Mazda','Demio',2017,950000,78000,'Petrol','Automatic','Hatchback','car2.jpg','A compact, nimble hatchback with low fuel consumption and easy parking.',0),
('Subaru','Forester',2016,2300000,92000,'Petrol','Automatic','SUV','car3.jpg','A rugged all-wheel-drive SUV built for both the city and the open road.',1),
('Nissan','X-Trail',2015,1850000,110000,'Petrol','Automatic','SUV','car4.jpg','A spacious family SUV with comfortable seating and a smooth, quiet ride.',0),
('Toyota','Hilux',2019,3200000,70000,'Diesel','Manual','Pickup','car5.jpg','A tough, dependable pickup that is ready for both work and adventure.',1),
('Honda','Fit',2016,890000,85000,'Petrol','Automatic','Hatchback','car6.jpg','A practical hatchback with surprising interior space and great economy.',0),
('Mercedes-Benz','C200',2014,2600000,98000,'Petrol','Automatic','Sedan','car7.jpg','A refined executive sedan combining comfort, style, and performance.',1),
('Toyota','Land Cruiser Prado',2013,4800000,130000,'Diesel','Automatic','SUV','car8.jpg','A premium diesel SUV with serious off-road capability and luxury comfort.',1),
('Volkswagen','Golf',2017,1350000,72000,'Petrol','Automatic','Hatchback','car9.jpg','A sporty, well-built hatchback that is fun to drive and easy to own.',0),
('Toyota','Vitz',2018,780000,60000,'Petrol','Automatic','Hatchback','car10.jpg','An affordable, economical hatchback that is ideal for first-time buyers.',0),
('Isuzu','D-Max',2018,2900000,88000,'Diesel','Manual','Pickup','car11.jpg','A hardworking diesel pickup with strong towing and payload capacity.',0),
('Mazda','CX-5',2017,2450000,95000,'Petrol','Automatic','SUV','car12.jpg','A stylish crossover SUV with a premium interior and confident handling.',0);
