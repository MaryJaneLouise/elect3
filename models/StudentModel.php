<?php


namespace models;

class StudentModel {
    private string $studentId;
    private string $lastName;
    private string $firstName;
    private string $prelims;
    private string $midterms;
    private string $finals;
    private string $finalGrade;

    /**
     * @param String $studentId
     * @param String $lastName
     * @param String $firstName
     * @param String $prelims
     * @param String $midterms
     * @param String $finals
     * @param String $finalGrade
     */
    public function __construct(string $studentId, string $lastName, string $firstName, string $prelims, string $midterms, string $finals, string $finalGrade) {
        $this->studentId = $studentId;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->prelims = $prelims;
        $this->midterms = $midterms;
        $this->finals = $finals;
        $this->finalGrade = $finalGrade;
    }

    public function getStudentId(): string {
        return $this->studentId;
    }

    public function setStudentId(string $studentId): void {
        $this->studentId = $studentId;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    public function getPrelims(): string {
        return $this->prelims;
    }

    public function setPrelims(string $prelims): void {
        $this->prelims = $prelims;
    }

    public function getMidterms(): string {
        return $this->midterms;
    }

    public function setMidterms(string $midterms): void {
        $this->midterms = $midterms;
    }

    public function getFinals(): string {
        return $this->finals;
    }

    public function setFinals(string $finals): void {
        $this->finals = $finals;
    }

    public function getFinalGrade(): string {
        return $this->finalGrade;
    }

    public function setFinalGrade(string $finalGrade): void {
        $this->finalGrade = $finalGrade;
    }
}