-- registration
CREATE TABLE Passengers (
   passenger_id INT PRIMARY KEY AUTO_INCREMENT,
   first_name VARCHAR(50) NOT NULL,
   last_name VARCHAR(50) NOT NULL,
   email VARCHAR(100) UNIQUE NOT NULL,
   phone VARCHAR(20)
);
-- bookings
CREATE TABLE Bookings (
   booking_id INT PRIMARY KEY AUTO_INCREMENT,
   passenger_id INT NOT NULL,                
   flight_number VARCHAR(10) NOT NULL,       
   route_origin VARCHAR(100) NOT NULL,       
   route_destination VARCHAR(100) NOT NULL, 
   assigned_seat VARCHAR(5) NOT NULL,       
   ticket_price DECIMAL(10, 2) NOT NULL,
   booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (passenger_id) REFERENCES Passengers(passenger_id) ON DELETE RESTRICT
);