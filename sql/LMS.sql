
CREATE DATABASE lms;

CREATE TABLE user_type (
  user_type_id int(11) NOT NULL AUTO_INCREMENT,
  user_type_name varchar(50) NOT NULL,
  PRIMARY KEY (user_type_id)
);
/*
INSERT INTO lms.user_type(user_type_id, user_type_name) VALUES
(1, 'HR');
INSERT INTO lms.user_type(user_type_id, user_type_name) VALUES
(2, 'Manager');
INSERT INTO lms.user_type(user_type_id, user_type_name) VALUES
(3, 'Default User');
*/

CREATE TABLE user (
  user_id int(11) NOT NULL AUTO_INCREMENT,
  user_name varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  ref_user_type_id int(11) NOT NULL,
  ref_emp_id int(11) NOT NULL,
  PRIMARY KEY (user_id)
);

/*
INSERT INTO lms.user(user_id, user_name, password, ref_user_type_id, ref_emp_id) VALUES
(1, 'hr', 'hr123', 1, 1);
INSERT INTO lms.user(user_id, user_name, password, ref_user_type_id, ref_emp_id) VALUES
(2, 'manager', 'manager123', 2, 2);
INSERT INTO lms.user(user_id, user_name, password, ref_user_type_id, ref_emp_id) VALUES
(3, 'user', 'user123', 3, 3);
*/

CREATE TABLE employee (
  emp_id int(11) NOT NULL AUTO_INCREMENT,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  manager_id int(11) DEFAULT NULL,
  PRIMARY KEY (emp_id)
);

CREATE TABLE leave_type (
  leave_type_id int(11) NOT NULL AUTO_INCREMENT,
  leave_type_name varchar(255) NOT NULL,
  PRIMARY KEY (leave_type_id)
);

/*
INSERT INTO lms.leave_type(leave_type_id, leave_type_name) VALUES
(1, 'Paid Leave');
INSERT INTO lms.leave_type(leave_type_id, leave_type_name) VALUES
(2, 'Sick Leave');
*/

CREATE TABLE leave_entitlement (
  id int(11) NOT NULL AUTO_INCREMENT,
  ref_emp_id int(11) NOT NULL,
  ref_leave_type_id int(11) NOT NULL,
  entitlement int(11) DEFAULT 0, 
  PRIMARY KEY (id)
);

CREATE TABLE leave_request (
  request_id int(11) NOT NULL AUTO_INCREMENT,
  ref_emp_id int(11) NOT NULL,
  ref_leave_type_id int(11) NOT NULL,
  amount int(11) NOT NULL, 
  approver_id int(11) DEFAULT NULL,
  approval_status int(1) DEFAULT 1 COMMENT "1 - Pending, 2 - Approved, 3 - Rejected",
  PRIMARY KEY (request_id)
);

