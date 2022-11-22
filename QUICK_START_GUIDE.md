# Így csináld meg gyorsan a KötProgot

## 0. Nézd át a követelményeket és a dokumentáció sablont

- [adatbazisok_kovetelmenyek_TEA_2022.pdf](https://github.com/BarnaGergely/SZTEAdatBProjekt2022-MINTA/blob/main/adatbazisok_kovetelmenyek_TEA_2022.pdf)
  - Figyelj a kötelező elemekre!
- [MINTA_Dokumentacio.md](MINTA_Kiss_Jóska_HGKTT_AdatbazisKezeles_Dokumentacio.md)

## 1. Tervezd meg a táblákat és a funkciókat majd rajzold meg az Egyed-kapcsolat diagrammot

1. Józan paraszti ésszel végiggondolod milyen táblákat érdemes tárolni
   - A tábla neve ne legyen többesszámban
2. Kitalálod milyen tulajdonságokat (attribútumok) kellene a táblákhoz
3. Megcsinálod a diagrammot ([draw.io](https://draw.io/))
4. Kitalálod milyen kapcsolat van a táblák között
5. **Még egyszer átnézed a hogy szintaktikailag és logikailag helyes e és hogy biztos megfelel e a követelményeknek!**

- [Egyed-kapcsolat diagram - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka.html)

## 2. Képezd le relációsémákká a táblákat és hozdd létre a dokumentációt

1. Másold le a [Minta_Dokumentációt ](MINTA_Kiss_Jóska_HGKTT_AdatbazisKezeles_Dokumentacio.md) vagy csinálj saját dokumentációt
2. Képezd le a dokumentációba a táblákat és az attribútumokat `TáblaNeve(attributum1, attributum2, attributum3)`
3. Utána a kapcsolatokat is képezd le [puska](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/kapcsolatok_lekpezse_relcismv.html)
4. Jelöld a kulcsokat és a külső kulcsokat
5. Írd fel a funkcionális függőségeket
6. Ha nem lenne 3NF-ben, normalizálj 3NF-ig
   - Ha rögötön 3NF-ben van egy tábla akkor is igazlni kell hogy abban van egy kis leírással. [Normalizálás - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka2.html)-ban van erről szó.

- [Leképezés - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka0.html)
- [Funkcionális függőség - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka1.html)
- [Normalizálás - Példa megoldás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka2.html)

## 3. Hozd létre az adatbázist PHPMYADMIN-ban

1. Telepítsd és indítsd el a XAMPP-ot (Apache, MySQL fog kelleni)
2. Hozd létre az adatbázist utf8mb4-hugarian-cli karakterkészlettel
3. Hozd létre a táblákat és az attribútumokat
   - Ne felejsd el jelölni a kulcsot minden táblán
4. Jelöld a külső kulcsokat a táblákban (Relational View)
   - Ne feledd, a gyerekből (amiben a külső kulcs van) hivatkozunk a szülő kulcsára
   - Delete and Update Rules (ON DELETE, ON UPDATE):
     - CASCADE: Ha a szülőt töröljök, a gyerek is törlődit
     - RESTRICT: Ha a szülőt megprobáljuk törölni és van hozzá kapcsolt gyerek, hibával elszáll
     - Set NULL? Ga a szülöt törlöd a rá hivatkozó gyerek hivatkozása NULL lesz

- [phpMyAdmin Adatbázis létrehozáa - Példa program - TUTORIAL VIDEÓ](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka3.html)

## 4. Másold le a példa alkamazást

1. A XAMPP mappájában a htdocs mappában csinálj egy mappát a projektednek
2. Másold bele ebbe a [példaprogramot](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/a_knyvtri_alkalmazs_tovbbfejlesztse_phpben.html)
3. Másold bele a [javítást](PeldaProgram/Javitasok/) (db_fuggvenyek.php fájl) és írd felül az eredetit (hibás a program, amit kaptunk a tanároktól)
4. Nézd át, hogy hogy működik a példaprogram (ehhez van egy [rövid leírás](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/a_knyvtri_alkalmazs_tovbbfejlesztse_phpben.html) is a letöltés oldal bal oldali menüjében (Menü, Könyv felvitele és listázása, stb. menüpontok))

- A localhost/létrehozottmappaneve - url címen érheted el a böngészőből a weblapodat, ha fut az Apache és a MYSQL
- [Példaprogram leírása](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/a_knyvtri_alkalmazs_tovbbfejlesztse_phpben.html)
  - a bal oldali menüben találsz róla sok mindent (Menü, Könyv felvitele és listázása, stb. menüpontok alatt)
- [PHP rövid áttekintése (by AdatB tanárok)](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/a_php_nyelvi_elemeinek_rvid_ttekintse.html)
- [PHP érthetően (WebTerv gyak. 6-12. fejezet)](https://okt.inf.szte.hu/webtervezes/gyakorlat/fejezet6/)
- [Adatbázis kezelés mysqli-vel](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/a_csatlakozs_menete_mysqli__fggvnyekkel.html)
- [Rövid PHP oktató videó a nagyon alapokról](https://youtu.be/6mO1UA1r-6Q)

## 5. Alakítsd át a sablont, hogy a te adatbázisodhoz megfelelő legyen

1. Hozd létre az adatbázis kapcsolatot a db_fuggvenyek connect metódusában
2. Menj végig az oldalakhoz tartozó php fájlokon és alakítsd át a saját témádnak megfelelően
   - Először érdemes egy oldalon lekérdezéseket megcsinálni
   - Az adatbázis és form kezelő függvényekről és fájlokról se feletkezz meg

- **Ne hasonlítson programod nagy mértékben példaprogramokra** vagy bármire, amit a repo-ban találsz! ;) - ez is kötelező követelmény
  - Nevezd át a változókat, a függvényeket és a fájlokat, hogy a te adatbázisodhoz **igazodjanak**
- A CSS-t nem érdemes inline a HTML-be írnod, hanem jobb egy külső pl. [style.css](PeldaProgram/Bovitesek/style.css) fájlban tárolnod és minden oldal head-jében include-olnod `<link rel="stylesheet" href="style.css" />`
- Használj a bekérendő adat formátumának megfelelő Input Type-ot
  - `<input type="text">`, `<input type="number">`, `<input type="date">` , `<input type="datetime-local">`, `<input type="time">`, `<input type="password">`, `<input type="email">`
- A kulcsokat tedd `required`-é még a form-ban és lehetőleg a backend-ben is ellenőrizd, hogy tényleg ki vannak e töltve és jó e az értékük formátuma
- A külső kulcsokat érdemes `<select>` vagy `<input type="radio">` -ként bekérned. pl. választható lista az adatbázisban lévő olvasók közül:

      <select name="olvaso">
      <?php
         $olvasok = olvasolistatLeker();
         while( $egySor = mysqli_fetch_assoc($olvasok) ) {
            echo '<option value="'.$egySor["olvasojegy"].'">'.
                  $egySor["olvasojegy"]. ' - '.
                  $egySor["nev"]. ', ' .
                  $egySor["lakcim"] .'</option>';
         }
         mysqli_free_result($olvasok);

      ?>
      </select>

- Hogy tudj tesztelni már ekkor szükséged lehet pár rekordra az adatbázisban, de nagy mennyiségű adatot itt még nem vinnék fel
- Ne felejtsd el kezelni az esetlegesen üres vagy hibás lekérdezéseket

- [Példaprogram leírása](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/a_knyvtri_alkalmazs_tovbbfejlesztse_phpben.html)
  - a bal oldali menüben találsz róla sok mindent (Menü, Könyv felvitele és listázása, stb. menüpontok alatt)
- [Lekérdezések - Példa program - TUTORIAL VIDEÓ](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka5.html)

## 6. Bővítsd a funkciókat: (Törlés, létrehozás, módosítás, stb.)

- **Ne hasonlítson programod nagy mértékben példaprogramokra** vagy bármire, amit a repo-ban találsz! ;)
- Minden táblához legalább egy de inkább több funkciót meg kell valósítanod. - [követelményekben](https://github.com/BarnaGergely/SZTEAdatBProjekt2022-MINTA/blob/main/adatbazisok_kovetelmenyek_TEA_2022.pdf) írnak erről bővebben
- [Adatbeszúrás, módosítás és törlés - Példa program - TUTORIAL VIDEÓ](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka4.html)

## 7. Készíts demó adatokat

- Akár PHPMyAdmin is tudsz fel vinni új rekordokat felvinni, de akár saját programodon keresztül vagy fájlból importálva (CSV vagy SQL) is feltöltheted az adatbázisod demó adatokkal
- Figyelj rá, hogy minden táblában legyen rekord és összesen legalább 50 demó adat legyen fenn (100 felett akár plusz pont is járhat)

## 8. Készíts összetett lekérdezéseket

- Figyelj a követelményekre! - Legyen leg. 3db különböző összetett (nem triviális) lekérdezés. Legyen bennük csoportosítás, al lekérdezés, tábla összevonás, stb.
- [Lekérdezések - Példa program - TUTORIAL VIDEÓ](http://www.inf.u-szeged.hu/~gnemeth/kurzusok/adatbgyak/exe/AdatbazisokGyakorlat2020/projektmunka5.html)

## 9. Írd meg a Dokumentációt

- Végül ellenőrizd, hogy a dokumentációd minden kötelező eleme megvan e. A [Minta Dokumentáció](MINTA_Kiss_Jóska_HGKTT_AdatbazisKezeles_Dokumentacio.md) vagy a [követelmények](https://github.com/BarnaGergely/SZTEAdatBProjekt2022-MINTA/blob/main/adatbazisok_kovetelmenyek_TEA_2022.pdf) sokat segítenek ebben.
