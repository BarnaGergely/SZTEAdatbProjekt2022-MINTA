#Mi a külső kulcs (foreign key, idegen kulcs) és hogy kell megadni?

### Külső kulcs

* jelölése: dőlt betűvel

Ábra (két tábla egymásra mutató kulcsokkal)

### Gyerek tábla

### Szülő tábla

### Tulajdonság

CASCADE

RESTRICT

SET NULL

SET DEFAULT

## Külső kulcs SQL-ben

```
CREATE TABLE child_Table (
    column_1 datatype ( NULL |NOT NULL ),
    column_2 datatype ( NULL |NOT NULL ),
    ...
  CONSTRAINT F_key
  FOREIGN KEY (child_column1, child_column2, ... child_column_n)
  REFERENCES parent_Table (parent_column1, parent_column2, ... parent_column_n) ( 
    ON DELETE ( NO ACTION |CASCADE |RESTRICT |SET NULL |SET DEFAULT ) ) ( 
    ON UPDATE ( NO ACTION |CASCADE |RESTRICT |SET NULL |SET DEFAULT ) ) 
);
```

## Külső kulcs beállítása PHPMYADMIN-ban

