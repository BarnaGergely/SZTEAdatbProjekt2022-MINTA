# AdatB kötprog how-to:

1. Választasz egy témát a félév elején

   - pl.: Hotel, Webshop, pizzéria, kávézó, "dvd" kölcsönző, linux iso torrent oldal, leltár, Kv fogyasztási szokás követése, etc.

2. Józan paraszti ésszel végiggondolod milyen táblákat érdemes a kiválasztott témában tárolni 

   - pl.: Diák, Tanár, Óra, Termék, Rendelés, Felhasználó, stb.).

   - Ezeket akár már bele is írhatod a projekttervbe. Lényegében táblákat találtál most ki

3. Kitalálod milyen tulajdonságokat (attribútumok) kellene az adott táblához tárolnunk.

   - pl.: usernév, email, kv minősége, Watt fogyasztás, etc..

4. Ezen a ponton elvileg megvannak a "modellek", hogy miket akarsz tárolni. Ideje őket átírnod Adatbázis kapcsolat diakgrammba (DRAW.IO)

   - Protipp: A modell (/tábla) neve ne legyen többesszámban.
  
5. A modellek alapján megnézed miket lehet összekapcsolni. Ez természetesen téma függő.

   - Itt esetleg olyan is bejöhet, hogy funkció szerint gondolkodik az ember pl.: webshop: kosár funkció: user-termék kapcsolat.
   - Az összekapcsoláshoz mindig azonosítani kell az egyedeket a modellben/táblában, ehhez az egyik legjobb dolog ha egy ID tulajdonságot felveszünk az elemhez. Ezen ID alapján tudjuk majd kapcsolni az egyik modellből származó egyedet egy másik modellbeli egyeddel.

6.  Ha megvannak a kapcsolatok, akkor meg kell vizsgálni a kapcsolódó modellek viszonyát (1:1, 1:N, N:1, N:M).

   - Ehhez célszerű lehet kérdéseket feltenni és megválaszolni.
   - pl: leltárs: user-eszköz kapcsolat: egy user-hez hány eszköz tartozhat? És egy eszközhöz hány user tartozhat?
   - Amit érdemes figyelembe venni még az az "időbeliség", pl.: hotelben foglaló személy-szoba kapcsolat: egy szoba egy foglaló személyhez lehet kiadva adott pillanatban, de a hotel élettartama alatt egy szoba több személyhez lehet kiadva, csak más időpontokba. Így ez már nem 1:1 kapcsolat hanem egyből egy N:1 -es kapcsolat sőt tovább gondolva egy N:M-es kapcsolat (ennek belátása az olvasó feladata).
   - Protipp template: "egy (modelname A) -hez hány (modelname B) tartozhat?" ahol (modelname A) és (modelname B) között kapcsolat van.
   - Extra: 1:1 -es kapcsolat azért kicsit érdekes, ott meg kell nagyon gondolni miért jött elő. Személyes véleményem szerint ez elég ritka.

   Figyelem! Eddig mindig csak kettő modellt kapcsoltunk össze.
   Való életben ez nem mindig így van, de plusz egy modellt hozzákapcsolni egy meglévő kapcsolathoz mindig feladatfüggő, hogy kell-e vagy hogy hova kell kötni.

11. 1:N és N:1 -es kapcsolat esetén azon az oldalon ahol van az "N" ott egy extra mező/oszlop/attribútum lesz a táblában/modellben. Ez az extra mező a külső kulcsod. Nevezd el ennek megfelelően!
   pl.:
   Protipp template: "(other modelname B)\ id".

11. Amennyiben van N:M-es kapcsolatod azt jelenti, hogy a kapcsolatot tényét egy külön táblában kell tárolni majd.
    Itt felmerülhet olyan, hogy a kapcsolathoz valami infót is jó lenne tárolni.
    pl: kv szokások: user-kv tipus táblák kapcsolat extra infó: mikor itta a kv-t.
    Igy kialakulhat egy ilyen kapcsolati tábla: "KVFogyasztás(int user_id, int kv_type, datetime time_of_consumtion)"
    Protipp template a táblához: "(TableConnection A) (int (Table A)\ id, int (Table B)\ id,....)".

12. Elméletben ezen a pontod már elég sok infód van mit, hogyan, és milyen táblában tárolsz.
    Fel kell rajzolni az egészet valamilyen random ábrára. Az ábra mutassa a modelleket, a modellekben található tulajdonságokat és a modellek közötti kapcsolatot.

13. Megvizsgálod, hogy egy E-K ábrán miket hogyan lehet felrajzolni.
    Ezek alapján a saját rajzodat átalakítod E-K formátumra.

14) Az ábra alapján felírod a "CREATE TABLE" sql utasítások. Igen, írd fel kézzel, papírra, vagy akárhova.
    Protipp: Haladj egyesével az ábrán lévő modelleket. Minden modell esetén ha van az adott model beli egyed ID-t rakd előre a táblában (és célszerűen auto increment legyen, nem akarod kézel számolni). Ezek után jönnek a kapcsolatból jövő külső kulcsok ha vannak.

15) Ekkor rájössz, hogy valami nem okés, vagy valamit még jó lenne tárolni.
    Így, egészítsd ki a 4 pontban létrejött csoportosításodat és futtasd onnan újra az algoritmust.
    Egy kis rutinnal nem kell mindig a 4. ponttól újra kezdeni a dolgokat hanem már tudni fogod hova kell közvetlenül "belenyúlni".

16) Remélhetőleg most már megvan minden táblád. Végy egy másik papírt, csinálj annyi táblázatot ahány modelled van.
    Minden modell oszlopai az attribútumokat jelenti, a sorok pedig az abban tárolt egyedeket. Minden sor egy-egy egyed.
    Végezz teszt "beszúrást"/adat feltöltést valamelyik táblából kiindulva az összes táblára.
    pl.: felhasználó felvétele egy User táblába.
    Az adat feltöltés során természetesen előfordul, hogy a kapcsolatot is meg kell csinálni. Nyugodtan nyilazd össze az sorokat, hogy melyik másik sorhoz tartozik/tartoznak. (protipp: színes toll/ceruza/szaggatott, pontozott vonal etc.)
17) 2NF/3NF megvolt?

18) A "feltöltött" demó táblák alapján vizsgáljuk meg miket lehetne egy felhasználónak megjeleníteni.
    pl.: Hány személy van jelenleg a hotelben? Van-e olyan szoba amit csak 4x adtunk ki? Melyik a legjobban fogyó kv?
    A legjobban fogyó kv-ból ki volt a legtöbbet fogyasztó fejlesztő? Egy fejlesztőnél kint lévő eszközök átlagosan mekkora teljesítményűek Watt-ban?
19) Elkezdhetünk programozni. Vegyünk egy tetszőleges programnyelvet. Csináljuk egy egyszerű fgv-t benne ami kapcsolódik egy adatbázis szerverhez.

20) Megvan a kapcsolódás? Csináljuk egy másik fgv-t ami végre tud hajtani egy "CREATE TABLE"-t célszerűen azokkal az adatokkal miket mi szeretnénk majd tárolni.
    Teszteljük! Ehhez kell valami tool, hogy tudjuk csatlakozni a db-hez. Ennek a toolnak a megkeresése az olvasó feladata az adatbázis szerver függvényében.

21) Csináljunk egy fgv-t ami képes egy táblába elemet beleszúrni.
    Hello "INSERT INTO".
    Ellenőrizzük a bevitt adatot a db tool-al.
22) Rakjuk el a kiválasztott db toolt.
    Csináljuk egy fgv-t ami kilistázza a konzolra/fájlba/pirítósra/etc. egy tábla tartalmát (célszerűen azt ahova van insert-ünk).
    Hello "SELECT \*".
    Ezzel a fgv-el vizsgáljuk meg, hogy az előbb insert-el beszúrt elem megjelenik-e.
23) Csináljuk egy fgv-t ami ID(!) alapján képes egy táblában lévő "sor"-t módosítani (valamelyik attribútumot).
    Hello "UPDATE".
    A meglévő select-et végrehajtó fgv-el teszteljük a működést.
    Protipp: ezen a ponton nem kell még általános fgv-t csinálni, csak egy egyszerűt ami egy attribútumot képes módosítani ID alapján.
24) Csináljuk egy fgv-t ami képes ID(!) alapján törölni egy táblában lévő sort.
    Hello "DELETE".
    A meglévő select-et végrehajtó fgv-el teszteljük a működést.
25) Megvan a CRUD (Create-Read-Update-Delete) egy adott táblára.
    Csináljuk meg mindegyikre.
    Figyeljünk arra, hogy az N:M-es kapcsolat egy külön táblát alkotnak így ezekhez is CRUD.
    FYI: nem biztos, hogy mind ilyen formában kell majd a végleges alkalmazásban, de rugalmasságot ad, hogy megvan mindenféle művelet.
    Figyelem!: Eddig nem csináltunk semmi objektumot amiben tudjuk tárolni az adatokat, csak SQL-t hajtottunk végre!

26) Minden táblához csináljuk egy-egy struktúrát/class-t ami képes egy sort tárolni (egy táblabeli sort).
    Ez kb azt jelenti, hogy a modell attribútumai/tábla oszlopai lesznek a class memberjei/property-ei.

27) Alakítsuk át a SELECT -es fgv-eket, hogy listákat adjanak vissza.
    A lista ez előbb megadott struct/class-ból létrejövő objektumokat tudjon tárolni.
    Az objektumokat a SELECT utasításból visszakapott adatokkal töltsd fel.
    Minden sor egy új ilyen struct/class példány.
28) Alakítsuk át az INSERT -es fgv-eket, hogy az előbb létrehozott struct/class-ból kapjon egy példányt mint input paraméter.
    Ebből vegyük ki a szükséges membereket és adjuk meg az "INSERT INTO" sql utasításnak mint végrehajtandó parancs.
    FYI: For the love of every holy and godly! NEM, NEM, és NEM szabad string konkatenálással megoldani az "INSERT INTO"-t végrehajtását. Minden nyelven/db-hez van olyan API ami képes behelyettesíteni paramétereket az SQL-be.
    Read the docs/examples. Amennyiben ezt nem teszed meg: hello sql injection.

29) Alakítsuk át az UPDATE -es fgv-t, hogy képes legyen struct/class-ból létrehozott példányt fogadni, és az ebben
    található ID(!) alapján frissíteni végrehajtani az SQL-t.
    Remember "hello sql injection"!

30) Alakítsuk át a DELETE -es fgv-t, hogy képes legyen struct/class-ból létrehozott példányt fogadni, és az ebben
    található ID(!) alapján törölni az elemet a táblából.

31) Ezen a ponton ha minden jól ment akkor van egy halmaz fgv-ed ami képes listázni/beszúrni/törölni/frissíteni bármely
    táblához. Kicsit kényelmetlen lehet használni a kapcsolatokat jelen esetben, de ettől eltekintve ha megfelelő sorrendben adjuk meg a fgv hívásokat akkor bármilyen adatot fel tudunk tölteni a db-be (vagy csinálni vele valamit).

32) Menjünk bele a komplexebb lekérdezésebe. Emlékezz vissza a 17 pontra mikor papíron teszteltük miket lehet lekérdezni.
    Minden ilyen lekérdezéshez csinálj egy fgv-t. Ebben a fgv-ekeben add meg az SQL-é fordított logikát.
    Nyugodtan lehet lépésenként haladni az SQL-ek összerakásában.
    pl.: Elsőre sima "SELECT" SQL írunk, majd bővítjük feltételekkel, aggregációval éppen mi kell.
    Célszerű lehet simán csak a konzolra/fájlba kiíratni a lekérdezés által visszaadott eredményeket.
    Valamint ismét elő lehet venni a db tool-t hogy gyorsan lehessen tesztelni a lekérdezéseket.
    Protipp: Csináltunk akár egy olyan fgv-t is ami csak egy SQL string-et vár amit végrehajt, kidobja az eredményét valahova és ezzel teszteljük a lekérdezést.
    Protipp #2: Miután megvan a végleges SQL vizsgáld meg mit/mennyi adatot ad vissza. Ha csak egy számot akkor a fgv azzal térjen vissza, ha több sornyi elemet akkor listát (és a listában tárolt adatot lehet be kell csomagolni egy új struct/class típusú példányba)
33) Megvan a CRUD, megvan a komplex lekérdezések egy halmaza. Innen már "csak" UI-t kell elé rakni, hogy milyet
    az a választott technológiától függ, webes vagy desktop. Ez fogja a legtöbb időt elvinni.
    A UI összerakás során célszerű elsőre nagyon egyszerű felületet csinálni és inkább minden műveletet kivezetni
    oda, hogy csak pár kattintás legyen tesztelni a dolgokat.
34) Fusd végig még egyszer az SQL-es fgv-eket: Ugye nem string műveletekkel raktad össze azokat?
    Ha a "nem" a válasz erre a kérdésre mehetsz tovább. Egyéb esetben lépj vissza és használd az API-t amivel
    tudsz behelyettesíteni értékeket az SQL utasításokba.
    FYI: az adatbázis API-k biztosan adnak olyan fgv-eket amik képesek a behelyettesítést elvégezni.
35) öööö Profit? Szépítsd, javítsd teszteld az alkalmazást.

Extra tippek:
#1) Ne akarj egyszerre mindent megcsinálni ha nincs még meg a rutinod benne. Kis lépésekkel, sok teszteléssel haladj.
#2) NE STRING MŰVELETEKKEL RAKD ÖSSZE AZ SQL UTASÍTÁSOKAT!
#3) A UI-ba végtelen időd bele lehet ölni. Ezért elsőre mindig a funkcionalitás legyen meg.
#4) NE STRING MŰVELETEKKEL RAKD ÖSSZE AZ SQL UTASÍTÁSOKAT!
#5) Majdnem minden nyelvhez van DB API. Érdemes rákeresni és példákat megnézni.
#6) Maguk az SQL utasítások amit itt írsz 90%-ban DB-től függetlenül működni fognak (feltehetően :D).
#7) Amennyiben olyan technológiát használsz ami ad fejlettebb DB réteged ad, akkor olvasd el a doksit és legalább egy example-t csinálj meg benne. Ha nincs hozzá doksit akkor ne válaszd elsőre azt.
