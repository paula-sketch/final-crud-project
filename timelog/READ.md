# Employee Timelog System

🕒 A PHP CRUD app for tracking employee time-in and time-out records.

## Features
- Add new timelogs
- View all records
- Update log details (type, time, etc.)
- Delete a log

## Database
- Name: `company_db`
- Table: `timelogs`
  - `id` INT AUTO_INCREMENT PRIMARY KEY
  - `employee_name` VARCHAR
  - `log_date` DATE
  - `log_time` TIME
  - `type` ENUM('IN', 'OUT')
