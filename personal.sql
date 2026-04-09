CREATE TABLE personal (
    personalID INT AUTO_INCREMENT PRIMARY KEY,
    personalName VARCHAR(100),
    Genero VARCHAR(20),
    personalCalendario VARCHAR(255)
);

//não usei deu preguiça
CREATE TABLE treino (
    treinoID INT AUTO_INCREMENT PRIMARY KEY,
    treinoName VARCHAR(100),
    personalID INT,
    FOREIGN KEY (personalID) REFERENCES personal(personalID)
);

CREATE TABLE aluno (
    alunoID INT AUTO_INCREMENT PRIMARY KEY,
    alunoName VARCHAR(100),
    alunoMeta VARCHAR(10),
    Genero VARCHAR(20),
    personalAluno INT,
    mensalidadeAluno decimal(6,2),
    qntMensalidade int,
    FOREIGN KEY (personalAluno) REFERENCES personal(personalID)
);

//não usei deu preguiça
CREATE TABLE treino_aluno (
    treinoAlunoID INT AUTO_INCREMENT PRIMARY KEY,
    treinoID INT,
    alunoID INT,
    FOREIGN KEY (treinoID) REFERENCES treino(treinoID),
    FOREIGN KEY (alunoID) REFERENCES aluno(alunoID)
);

//não usei deu preguiça
CREATE TABLE exercicio (
    exercicioID INT AUTO_INCREMENT PRIMARY KEY,
    exercicioName VARCHAR(100),
    corpoExercicio VARCHAR(100),
    treinoID INT, 
    FOREIGN KEY (treinoID) REFERENCES treino(treinoID)
);