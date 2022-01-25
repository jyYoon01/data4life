use data4life;
DROP TABLE PATIENTS;
DROP TABLE DOCTORS;
DROP TABLE APPOINTMENTS;

CREATE TABLE IF NOT EXISTS PATIENTS (
  PatientId varchar(255) NOT NULL,
  PatientName varchar(255) NOT NULL,
  PatientAge int(10) NOT NULL,
  PatientGender char NOT NULL,
  PRIMARY KEY  (PatientId)
); 

CREATE TABLE IF NOT EXISTS DOCTORS (
  DoctorId varchar(255) NOT NULL,
  DoctorName varchar(255) NOT NULL,
  PRIMARY KEY  (DoctorId)
);

CREATE TABLE IF NOT EXISTS APPOINTMENTS (
  DoctorId varchar(255) NOT NULL,
  DoctorName varchar(255) NOT NULL,
  PatientId varchar(255) NOT NULL,
  PatientName varchar(255) NOT NULL,
  PatientAge int NOT NULL,
  PatientGender char NOT NULL,
  AppointmentId varchar(255) NOT NULL,
  AppointmentDate datetime NOT NULL,
  PRIMARY KEY (AppointmentId),
  FOREIGN KEY (DoctorId) REFERENCES DOCTORS(DoctorId),
  FOREIGN KEY (DoctorName) REFERENCES DOCTORS(DoctorName),
  FOREIGN KEY (PatientId) REFERENCES PATIENTS(PatientId),
  FOREIGN KEY (PatientName) REFERENCES PATIENTS(PatientName),
  FOREIGN KEY (Patientage) REFERENCES PATIENTS(Patientage),
  FOREIGN KEY (PatientGender) REFERENCES PATIENTS(PatientGender)
);

INSERT INTO PATIENTS
VALUES ('P1', 'P1Name', 12, 'M'), ('P2', 'P2Name', 22, 'F'), ('P3', 'P3Name', 32, 'M');

INSERT INTO DOCTORS
VALUES ('D1', 'D1Name'), ('D2', 'D2Name');

INSERT INTO APPOINTMENTS
VALUES ('D1', 'D1Name', 'P1', 'P1Name', 12, 'M', 'A1', '2018-03-08 09:00:00'),
('D1', 'D1Name', 'P1', 'P1Name', 12, 'M', 'A2', '2018-04-08 10:00:00'),
('D1', 'D1Name', 'P2', 'P2Name', 22, 'F', 'A3', '2018-03-08 10:00:00'),
('D1', 'D1Name', 'P1', 'P1Name', 12, 'M', 'A4', '2018-04-08 11:00:00'),
('D2', 'D2Name', 'P1', 'P1Name', 12, 'M', 'A5', '2018-03-18 08:00:00'),
('D2', 'D2Name', 'P1', 'P1Name', 12, 'M', 'A6', '2018-04-18 09:00:00'),
('D2', 'D2Name', 'P3', 'P3Name', 32, 'M', 'A7', '2018-03-18 09:00:00'),
('D2', 'D2Name', 'P3', 'P3Name', 32, 'M', 'A8', '2018-04-18 10:00:00');
