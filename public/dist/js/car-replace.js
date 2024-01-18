//copyright lexilogos.com
var car;

function transcrire() {

    car = document.invitations.mrs.value;
    car = car.replace(/h/g, "х");
    car = car.replace(/a/g, "а");
    car = car.replace(/b/g, "б");
    car = car.replace(/v/g, "в");
    car = car.replace(/g/g, "г");
    car = car.replace(/d/g, "д");
    car = car.replace(/ǵ/g, "ѓ");
    car = car.replace(/ѓ/g, "ѓ");
    car = car.replace(/г=/g, "ѓ");
    car = car.replace(/ѓ=/g, "г");
    car = car.replace(/e/g, "е");
    car = car.replace(/ž/g, "ж");
    car = car.replace(/z/g, "з");
    car = car.replace(/зх/g, "ж");
    car = car.replace(/з=/g, "ж");
    car = car.replace(/ж=/g, "з");
    car = car.replace(/дз/g, "ѕ");
    car = car.replace(/i/g, "и");
    car = car.replace(/ì/g, "ѝ");
    car = car.replace(/и=/g, "ѝ");
    car = car.replace(/ѝ=/g, "и");
    car = car.replace(/j/g, "ј");
    car = car.replace(/k/g, "к");
    car = car.replace(/l/g, "л");
    car = car.replace(/лј/g, "љ");
    car = car.replace(/m/g, "м");
    car = car.replace(/n/g, "н");
    car = car.replace(/нј/g, "њ");
    car = car.replace(/o/g, "о");
    car = car.replace(/p/g, "п");
    car = car.replace(/r/g, "р");
    car = car.replace(/s/g, "с");
    car = car.replace(/t/g, "т");
    car = car.replace(/ḱ/g, "ќ");
    car = car.replace(/ќ/g, "ќ");
    car = car.replace(/к=/g, "ќ");
    car = car.replace(/ќ=/g, "к");
    car = car.replace(/u/g, "у");
    car = car.replace(/f/g, "ф");
    car = car.replace(/c/g, "ц");
    car = car.replace(/č/g, "ч");
    car = car.replace(/ц=/g, "ч");
    car = car.replace(/ч=/g, "ц");
    car = car.replace(/цх/g, "ч");
    car = car.replace(/ѕ=/g, "џ");
    car = car.replace(/џ=/g, "ѕ");
    car = car.replace(/ѕх/g, "џ");
    car = car.replace(/š/g, "ш");
    car = car.replace(/с=/g, "ш");
    car = car.replace(/ш=/g, "с");
    car = car.replace(/сх/g, "ш");

    car = car.replace(/H/g, "Х");
    car = car.replace(/A/g, "А");
    car = car.replace(/B/g, "Б");
    car = car.replace(/V/g, "В");
    car = car.replace(/G/g, "Г");
    car = car.replace(/D/g, "Д");
    car = car.replace(/Ǵ/g, "Ѓ");
    car = car.replace(/Ѓ/g, "Ѓ");
    car = car.replace(/Г=/g, "Ѓ");
    car = car.replace(/Ѓ=/g, "Г");
    car = car.replace(/E/g, "Е");
    car = car.replace(/Ž/g, "Ж");
    car = car.replace(/Z/g, "З");
    car = car.replace(/ЗХ/g, "Ж");
    car = car.replace(/Зх/g, "Ж");
    car = car.replace(/З=/g, "Ж");
    car = car.replace(/Ж=/g, "З");
    car = car.replace(/ДЗ/g, "Ѕ");
    car = car.replace(/Дз/g, "Ѕ");
    car = car.replace(/I/g, "И");
    car = car.replace(/Ì/g, "Ѝ");
    car = car.replace(/И=/g, "Ѝ");
    car = car.replace(/Ѝ=/g, "И");
    car = car.replace(/J/g, "Ј");
    car = car.replace(/K/g, "К");
    car = car.replace(/L/g, "Л");
    car = car.replace(/ЛЈ/g, "Љ");
    car = car.replace(/Лј/g, "Љ");
    car = car.replace(/M/g, "М");
    car = car.replace(/N/g, "Н");
    car = car.replace(/НЈ/g, "Њ");
    car = car.replace(/Нј/g, "Њ");
    car = car.replace(/O/g, "О");
    car = car.replace(/P/g, "П");
    car = car.replace(/R/g, "Р");
    car = car.replace(/S/g, "С");
    car = car.replace(/T/g, "Т");
    car = car.replace(/Ḱ/g, "Ќ");
    car = car.replace(/Ќ/g, "Ќ");
    car = car.replace(/К=/g, "Ќ");
    car = car.replace(/Ќ=/g, "К");
    car = car.replace(/U/g, "У");
    car = car.replace(/F/g, "Ф");
    car = car.replace(/C/g, "Ц");
    car = car.replace(/Č/g, "Ч");
    car = car.replace(/Ц=/g, "Ч");
    car = car.replace(/Ч=/g, "Ц");
    car = car.replace(/ЦХ/g, "Ч");
    car = car.replace(/Цх/g, "Ч");
    car = car.replace(/Ѕ=/g, "Џ");
    car = car.replace(/Џ=/g, "Ѕ");
    car = car.replace(/ЅХ/g, "Џ");
    car = car.replace(/Ѕх/g, "Џ");
    car = car.replace(/Š/g, "Ш");
    car = car.replace(/С=/g, "Ш");
    car = car.replace(/Ш=/g, "С");
    car = car.replace(/СХ/g, "Ш");
    car = car.replace(/Сх/g, "Ш");

// ajout dzh
    car = car.replace(/дј/g, "џ");
    car = car.replace(/ДЈ/g, "Џ");
    car = car.replace(/Дј/g, "Џ");

    car = car.replace(/è/g, "ѐ");
    car = car.replace(/е=/g, "ѐ");
    car = car.replace(/ѐ=/g, "е");
    car = car.replace(/È/g, "Ѐ");
    car = car.replace(/Е=/g, "Ѐ");
    car = car.replace(/Ѐ=/g, "Е");

    startPos = document.invitations.mrs.selectionStart;
    endPos = document.invitations.mrs.selectionEnd;

    beforeLen = document.invitations.mrs.value.length;
    afterLen = car.length;
    adjustment = afterLen - beforeLen;

    document.invitations.mrs.value = car;

    document.invitations.mrs.selectionStart = startPos + adjustment;
    document.invitations.mrs.selectionEnd = endPos + adjustment;

    var obj = document.invitations.mrs;
    obj.focus();
    obj.scrollTop = obj.scrollHeight;
}



function transcrireMr() {

    car = document.invitations.mr.value;
    car = car.replace(/h/g, "х");
    car = car.replace(/a/g, "а");
    car = car.replace(/b/g, "б");
    car = car.replace(/v/g, "в");
    car = car.replace(/g/g, "г");
    car = car.replace(/d/g, "д");
    car = car.replace(/ǵ/g, "ѓ");
    car = car.replace(/ѓ/g, "ѓ");
    car = car.replace(/г=/g, "ѓ");
    car = car.replace(/ѓ=/g, "г");
    car = car.replace(/e/g, "е");
    car = car.replace(/ž/g, "ж");
    car = car.replace(/z/g, "з");
    car = car.replace(/зх/g, "ж");
    car = car.replace(/з=/g, "ж");
    car = car.replace(/ж=/g, "з");
    car = car.replace(/дз/g, "ѕ");
    car = car.replace(/i/g, "и");
    car = car.replace(/ì/g, "ѝ");
    car = car.replace(/и=/g, "ѝ");
    car = car.replace(/ѝ=/g, "и");
    car = car.replace(/j/g, "ј");
    car = car.replace(/k/g, "к");
    car = car.replace(/l/g, "л");
    car = car.replace(/лј/g, "љ");
    car = car.replace(/m/g, "м");
    car = car.replace(/n/g, "н");
    car = car.replace(/нј/g, "њ");
    car = car.replace(/o/g, "о");
    car = car.replace(/p/g, "п");
    car = car.replace(/r/g, "р");
    car = car.replace(/s/g, "с");
    car = car.replace(/t/g, "т");
    car = car.replace(/ḱ/g, "ќ");
    car = car.replace(/ќ/g, "ќ");
    car = car.replace(/к=/g, "ќ");
    car = car.replace(/ќ=/g, "к");
    car = car.replace(/u/g, "у");
    car = car.replace(/f/g, "ф");
    car = car.replace(/c/g, "ц");
    car = car.replace(/č/g, "ч");
    car = car.replace(/ц=/g, "ч");
    car = car.replace(/ч=/g, "ц");
    car = car.replace(/цх/g, "ч");
    car = car.replace(/ѕ=/g, "џ");
    car = car.replace(/џ=/g, "ѕ");
    car = car.replace(/ѕх/g, "џ");
    car = car.replace(/š/g, "ш");
    car = car.replace(/с=/g, "ш");
    car = car.replace(/ш=/g, "с");
    car = car.replace(/сх/g, "ш");

    car = car.replace(/H/g, "Х");
    car = car.replace(/A/g, "А");
    car = car.replace(/B/g, "Б");
    car = car.replace(/V/g, "В");
    car = car.replace(/G/g, "Г");
    car = car.replace(/D/g, "Д");
    car = car.replace(/Ǵ/g, "Ѓ");
    car = car.replace(/Ѓ/g, "Ѓ");
    car = car.replace(/Г=/g, "Ѓ");
    car = car.replace(/Ѓ=/g, "Г");
    car = car.replace(/E/g, "Е");
    car = car.replace(/Ž/g, "Ж");
    car = car.replace(/Z/g, "З");
    car = car.replace(/ЗХ/g, "Ж");
    car = car.replace(/Зх/g, "Ж");
    car = car.replace(/З=/g, "Ж");
    car = car.replace(/Ж=/g, "З");
    car = car.replace(/ДЗ/g, "Ѕ");
    car = car.replace(/Дз/g, "Ѕ");
    car = car.replace(/I/g, "И");
    car = car.replace(/Ì/g, "Ѝ");
    car = car.replace(/И=/g, "Ѝ");
    car = car.replace(/Ѝ=/g, "И");
    car = car.replace(/J/g, "Ј");
    car = car.replace(/K/g, "К");
    car = car.replace(/L/g, "Л");
    car = car.replace(/ЛЈ/g, "Љ");
    car = car.replace(/Лј/g, "Љ");
    car = car.replace(/M/g, "М");
    car = car.replace(/N/g, "Н");
    car = car.replace(/НЈ/g, "Њ");
    car = car.replace(/Нј/g, "Њ");
    car = car.replace(/O/g, "О");
    car = car.replace(/P/g, "П");
    car = car.replace(/R/g, "Р");
    car = car.replace(/S/g, "С");
    car = car.replace(/T/g, "Т");
    car = car.replace(/Ḱ/g, "Ќ");
    car = car.replace(/Ќ/g, "Ќ");
    car = car.replace(/К=/g, "Ќ");
    car = car.replace(/Ќ=/g, "К");
    car = car.replace(/U/g, "У");
    car = car.replace(/F/g, "Ф");
    car = car.replace(/C/g, "Ц");
    car = car.replace(/Č/g, "Ч");
    car = car.replace(/Ц=/g, "Ч");
    car = car.replace(/Ч=/g, "Ц");
    car = car.replace(/ЦХ/g, "Ч");
    car = car.replace(/Цх/g, "Ч");
    car = car.replace(/Ѕ=/g, "Џ");
    car = car.replace(/Џ=/g, "Ѕ");
    car = car.replace(/ЅХ/g, "Џ");
    car = car.replace(/Ѕх/g, "Џ");
    car = car.replace(/Š/g, "Ш");
    car = car.replace(/С=/g, "Ш");
    car = car.replace(/Ш=/g, "С");
    car = car.replace(/СХ/g, "Ш");
    car = car.replace(/Сх/g, "Ш");

// ajout dzh
    car = car.replace(/дј/g, "џ");
    car = car.replace(/ДЈ/g, "Џ");
    car = car.replace(/Дј/g, "Џ");

    car = car.replace(/è/g, "ѐ");
    car = car.replace(/е=/g, "ѐ");
    car = car.replace(/ѐ=/g, "е");
    car = car.replace(/È/g, "Ѐ");
    car = car.replace(/Е=/g, "Ѐ");
    car = car.replace(/Ѐ=/g, "Е");

    startPos = document.invitations.mr.selectionStart;
    endPos = document.invitations.mr.selectionEnd;

    beforeLen = document.invitations.mr.value.length;
    afterLen = car.length;
    adjustment = afterLen - beforeLen;

    document.invitations.mr.value = car;

    document.invitations.mr.selectionStart = startPos + adjustment;
    document.invitations.mr.selectionEnd = endPos + adjustment;

    var obj = document.invitations.mr;
    obj.focus();
    obj.scrollTop = obj.scrollHeight;
}
