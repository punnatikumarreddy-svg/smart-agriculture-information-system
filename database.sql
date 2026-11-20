CREATE DATABASE IF NOT EXISTS agriculture_db;
USE agriculture_db;

CREATE TABLE farmers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE crops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    season VARCHAR(100),
    soil VARCHAR(100),
    water VARCHAR(100),
    duration VARCHAR(100),
    description TEXT
);

CREATE TABLE fertilizers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    type VARCHAR(100),
    nutrients VARCHAR(200),
    description TEXT
);

CREATE TABLE tips (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150),
    description TEXT
);

INSERT INTO crops
(name, season, soil, water, duration, description)
VALUES
('Rice', 'Kharif', 'Clay soil', 'High', '120-150 days',
 'Rice is an important food crop that requires sufficient water.'),
('Wheat', 'Rabi', 'Loamy soil', 'Moderate', '110-130 days',
 'Wheat is commonly cultivated during the cooler season.'),
('Maize', 'Kharif', 'Well-drained loamy soil', 'Moderate', '90-120 days',
 'Maize is used for food, feed and several other purposes.'),
('Tomato', 'Rabi and suitable seasons', 'Sandy loam', 'Moderate', '70-100 days',
 'Tomato is a widely grown vegetable crop.'),
('Groundnut', 'Kharif', 'Sandy loam', 'Moderate', '100-120 days',
 'Groundnut is an important oilseed crop.');

INSERT INTO fertilizers
(name, type, nutrients, description)
VALUES
('Urea', 'Nitrogen fertilizer', 'Nitrogen',
 'Supports plant growth. Apply according to crop and soil requirements.'),
('DAP', 'Phosphorus fertilizer', 'Nitrogen and Phosphorus',
 'Helps supply important nutrients for crop development.'),
('Potash', 'Potassium fertilizer', 'Potassium',
 'Provides potassium for crop growth and development.'),
('Vermicompost', 'Organic fertilizer', 'Organic matter',
 'Helps improve soil structure and soil fertility.');

INSERT INTO tips (title, description)
VALUES
('Use quality seeds',
 'Choose suitable, certified seeds for your region and season.'),
('Test your soil',
 'Soil testing helps identify nutrient requirements.'),
('Water properly',
 'Avoid unnecessary irrigation and monitor soil moisture.'),
('Practice crop rotation',
 'Growing different crops in rotation can support soil health.'),
('Check your crops',
 'Regularly monitor crops for pests, disease and water stress.');