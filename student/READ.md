# Student Attendance Tracker

📋 A CRUD application to manage classroom attendance using PHP and PDO.

## Features
- Add attendance records
- View all entries
- Edit or update student attendance
- Delete records

## Database
- Name: `school`
- Table: `attendance`
  - `id` INT AUTO_INCREMENT PRIMARY KEY
  - `student_name` VARCHAR
  - `date` DATE
  - `status` ENUM ('Present', 'Absent', 'Late')
