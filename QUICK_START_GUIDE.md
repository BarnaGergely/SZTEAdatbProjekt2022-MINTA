# Így csináld meg gyorsan a KötProgot

## 0. Nézd át a követelményeket és a dokumentáció sablont

- [adatbazisok_kovetelmenyek_TEA_2022.pdf](https://github.com/BarnaGergely/SZTEAdatBProjekt2022-MINTA/blob/main/adatbazisok_kovetelmenyek_TEA_2022.pdf)
   - A szürke részek a kötelező elemek
- [MINTA_Dokumentacio.md](MINTA_Kiss_Jóska_HGKTT_AdatbazisKezeles_Dokumentacio.md)

## 1. Tervezd meg a táblákat és a funkciókat majd rajzold meg az Egyed-kapcsolat diagrammot

1. Józan paraszti ésszel végiggondolod milyen táblákat érdemes tárolni
   - A tábla neve ne legyen többesszámban
2. Kitalálod milyen tulajdonságokat (attribútumok) kellene a táblákhoz
3. Megcsinálod a diagrammot ([draw.io](https://draw.io/))
4. **Még egyszer átnézed a követelményeket, hogy biztos megfelel e!**

- [Egyed-kapcsolat diagram - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka.html)

## 3. Képezd képezd le relációsémákká a táblákat és hozdd létre a dokumentációt

1. Másold le a dokumentáció sablont vagy csinálj saját dokumentációt
1. Másold le a dokumentációba a táblákat és az attribútumokat `TáblaNeve(attributum1, attributum2, attributum3)`
2. Utána a kapcsolatokat is képezd le [puska](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/kapcsolatok_lekpezse_relcismv.html)
3. Jelöld a kulcsokat és a külső kulcsokat
4. Írd fel a funkcionális függőségeket
5. Ha nem lenne 3NF-ben, normalizálj 3NF-ig
   - Ha rögötön 3NF-ben van egy tábla akkor is igazlni kell hogy abban van egy kis leírással. [Normalizálás - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka2.html)-ban van erről szó. 

- [Leképezés - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka0.html)
- [Funkcionális függőség - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka1.html)
- [Normalizálás - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka2.html)

## 3. Hozd létre az adatbázist PHPMYADMIN-ban

1. Telepítsd a XAMPP-ot
2. Hozd létre az adatbázist utf8-hugarian-cli karakterkészlettel
3. Hozd létre a táblákat és az attribútumokat
   - Ne felejsd el jelölni a kulcsot minden táblán
4. Jelöld a külső kulcsot a táblákban

- [PHPMYADMIN - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka3.html)

## 4. Másold le a példa alkamazást

1. A XAMPP mappájában a htdocs mappában csinálj egy mappát a projektednek
2. Másold bele ebbe a [példa programot](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/a_knyvtri_alkalmazs_tovbbfejlesztse_phpben.html)
3. Másold bele a [javítást](PeldaProgram/Javitasok/) is és írd felül az eredetit (hibás a program, amit kaptunk a tanároktól)
4. Nézd át, hogy hogy működik a példa program (ehhez van egy [rövid leírás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/a_knyvtri_alkalmazs_tovbbfejlesztse_phpben.html) is a letöltés oldal bal oldali menüjében (Menü, Könyv felvitele és listázása, stb. menüpontok))

- A localhost/létrehozottmappaneve - url címen érheted el a böngészőből a weblapodat, ha fut az Apache és a MYSQL
- [Példa program leírása](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/a_knyvtri_alkalmazs_tovbbfejlesztse_phpben.html)
   -  a bal oldali menüben találsz róla sok mindent (Menü, Könyv felvitele és listázása, stb. menüpontok alatt)

## 5. Alakítsd át a sablont, hogy a te adatbázisodhoz megfelelő legyen

1. Hozd létre az adatbázis kapcsolatot a db_fuggvenyek connect metódusában
2. Menj végig az oldalakhoz tartozó php fájlokon és alakítsd át a saját témádnak megfelelően
   - Először érdemes a lekérdezéseket megcsinálni, utána térni át az egyéb függvényekre
   - Az adatbázis és form kezelő függvényekről és fájlokról se feletkezz meg

- A CSS-t nem érdemes inline a HTML-be írnod,hanem jobb egy külső pl. style.css fájlban tárolnod és minden oldal head-jében include-olnod
- Nevezd át a változókat, a függvényeket és a fájlokat, hogy a te adatbázisodhoz igazodjanak
- Használj a bekérendő adat formátumának megfelelő Input Type-ot
  - `<input type="text">`, `<input type="number">`, `<input type="date">` , `<input type="datetime-local">`, `<input type="time">`, `<input type="password">`, `<input type="email">`
- A külső kulcsokat érdemes `<select>` vagy `<input type="radio">` -ként bekérned
- A kulcsokat tedd `required`-é még a form-ban és lehetőleg a backend-ben is ellenőrizd, hogy tényleg ki vannak e töltve és jó e az értékük formátuma
- Ne felejtsd el kezelni az esetlegesen üres vagy hibás lekérdezéseket

## 6. Bővítsd a funkciókat: (Törlés, létrehozás, módosítás)

- TODO: link

## 7. Készíts összetett lekérdezéseket

1. TODO: link

## 8. Írd meg a Dokumentációt

- TODO:
