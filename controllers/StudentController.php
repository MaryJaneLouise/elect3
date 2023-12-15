<?php
namespace controllers;

require_once ('../database/DatabaseConnection.php');
require_once ('../database/Constants.php');
require_once ('../models/StudentModel.php');

use database\DatabaseConnection;
use models\StudentModel;

class StudentController {
    public function getStudents(): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl")->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsAscendingByName(): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl ORDER BY first_name ASC")->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsDescendingByFinalGrade(): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl ORDER BY final_grade DESC")->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualOrGreaterThanPrelim($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE prelim >= ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualOrLessThanPrelim($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE Prelim <= ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualPrelim($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE final_grade = ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualOrGreaterThanMidterm($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE midterm >= ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualOrLessThanMidterm($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE midterm <= ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualMidterm($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE midterm = ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualOrGreaterThanFinals($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE finals >= ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualOrLessThanFinals($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE finals <= ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualFinals($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE finals = ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualOrGreaterThanFinalGrade($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE final_grade >= ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualOrLessThanFinalGrade($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE final_grade <= ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function getStudentsByEqualFinalGrade($inputGrade): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $studentData = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE final_grade = ?", [$inputGrade . '%'])->fetchAll();
        $result = array();
        foreach($studentData as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }

    public function addStudent(
        String $lastName,
        String $firstName,
        String $prelim,
        String $midterm,
        String $finals) {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $result = $dbCon->run("INSERT INTO studentrecord_tbl(last_name, first_name, prelim, midterm, finals) VALUES (?, ?, ?, ?, ?)",[$lastName,$firstName,$prelim,$midterm, $finals]);
        if($dbCon->pdo->lastInsertId()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteStudent(String $studentId) {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $result = $dbCon->run("DELETE FROM studentrecord_tbl WHERE id = ?", [$studentId]);
        if($result->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function updateStudent(
        String $studentId,
        String $lastName,
        String $firstName,
        String $prelim,
        String $midterm,
        String $finals) {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $result = $dbCon->run("UPDATE studentrecord_tbl SET last_name = ?, first_name = ?, prelim = ?, midterm = ?, finals = ? WHERE id = ?", [$lastName, $firstName, $prelim, $midterm, $finals, $studentId]);
        if($result->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function getStudentByDetails(String $search): array {
        $dbCon = new DatabaseConnection(DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOST,DB_PORT);
        $searchStudent = $dbCon->run("SELECT * FROM studentrecord_tbl WHERE last_name LIKE ? OR first_name LIKE ? OR prelim LIKE ? OR midterm LIKE ? OR finals LIKE ? OR final_grade LIKE ?", [$search . '%', $search . '%', $search . '%', $search . '%', $search . '%', $search . '%'])->fetchAll();
        $result = array();
        foreach($searchStudent as $data){
            $student = new StudentModel(
                $data['id'],
                $data['last_name'],
                $data['first_name'],
                $data['prelim'],
                $data['midterm'],
                $data['finals'],
                $data['final_grade']);
            $result[] = $student;
        }
        return $result;
    }
}