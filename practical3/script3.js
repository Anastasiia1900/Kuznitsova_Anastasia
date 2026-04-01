class Student {
    constructor(name, age) {
        this.name = name;
        this.age = age;
        this.grades = [];
    }

    addGrade(grade) {
        this.grades.push(grade);
    }

    getAverage() {
        if (this.grades.length === 0) return 0;
        let sum = this.grades.reduce((acc, curr) => acc + curr, 0);
        return sum / this.grades.length;
    }
}

let s1 = new Student("Олексій", 20);
s1.addGrade(95); s1.addGrade(88);
let s2 = new Student("Марія", 19);
s2.addGrade(100); s2.addGrade(98);
let s3 = new Student("Іван", 21);
s3.addGrade(70); s3.addGrade(85);

let students = [s1, s2, s3];
for (let student of students) {
    console.log(student.name + ": " + student.getAverage());
}