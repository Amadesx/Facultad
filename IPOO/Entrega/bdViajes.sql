CREATE DATABASE bdviajes; 
USE bdviajes;

CREATE TABLE empresa (
    idempresa bigint,
    enombre varchar(150),
    edireccion varchar(150),
    PRIMARY KEY (idempresa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE responsable (
    rnumeroempleado bigint,
    rnumerolicencia bigint,
    rnombre varchar(150), 
    rapellido varchar(150), 
    PRIMARY KEY (rnumeroempleado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE viaje (
    idviaje bigint,
    vdestino varchar(150),
    vcantmaxpasajeros int,
    idempresa bigint,
    rnumeroempleado bigint,
    vimporte float,
    PRIMARY KEY (idviaje),
    FOREIGN KEY (idempresa) REFERENCES empresa (idempresa) ON UPDATE CASCADE,
    FOREIGN KEY (rnumeroempleado) REFERENCES responsable (rnumeroempleado) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;

CREATE TABLE pasajero (
    rdocumento varchar(15),
    pnombre varchar(150), 
    papellido varchar(150), 
    ptelefono int, 
    idviaje bigint,
    PRIMARY KEY (rdocumento),
    FOREIGN KEY (idviaje) REFERENCES viaje (idviaje) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
